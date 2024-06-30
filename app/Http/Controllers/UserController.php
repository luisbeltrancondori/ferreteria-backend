<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return response()->json(['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {   $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
            ]);

            DB::beginTransaction();
            try{

                $users = new User();
                $users-> name = $request->name;
                $users-> email = $request->email;
                $users-> password = Hash::make($request->password);

                $users-> save();

                if($request->has('roles')){
                    $users->syncRoles($request->roles);
                }
                DB::commit();

                return response()->json(['status'=>true, 'message'=>'El usuario '.$users->name.' fue creado correctamente']);
            }catch(\Exception $exc){
                DB::rollBack();
                return response()->json(['status'=>false, 'message'=>'Error al crear el usuario: ']);
            }
    }}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('roles')->where('id','=',$id)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:8'
        ]);
        DB::beginTransaction();
        try {
                $users = User::find($id);
                $users-> name = $request->name;
                $users-> email = $request->email;
                if($request->filled('password')){
                    $users-> password = Hash::make($request->password);
                }


            $users->save();

            //Sincronizar roles si es que se le asigna
            if ($request->has('roles')) {
                $users->syncRoles($request->roles);
            } else {
                $users->syncRoles([]);
            }

            DB::commit();
            return response()->json(['status'=>true, 'message'=>'El usuario '.$users->name.' fue actualizado exitosamente' ]);


        }catch(\Exception $exc){
            DB::rollBack();
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el usuario']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $users = User::findOrFail($id);
            $users->delete();

            return response()->json(['status'=>true, 'message'=>'El usuario '.$users->name. ' fue eliminado exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el usuario'.$exc]);
        }
    }
}
