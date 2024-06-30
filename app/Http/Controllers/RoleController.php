<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $roles = Role::with('permissions')->get();

        return response()->json(['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   $request->validate([
        'name' => 'required'

        ]);
        DB::beginTransaction();
        try{

            $roles = new Role();
            $roles-> name = $request->name;
            $roles-> save();

            if($request->has('permissions')){
                $roles->syncPermissions($request->permissions);
            }
            DB::commit();

            return response()->json(['status'=>true, 'message'=>'El rol '.$roles->name.' fue creado correctamente']);
        }catch(\Exception $exc){
            DB::rollBack();
            return response()->json(['status'=>false, 'message'=>'Error al crear el rol: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::with('permissions')->where('id','=',$id)->first();
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $roles = Role::find($id);
            $roles->name = $request->name;
            $roles->save();


            if ($request->has('permissions')) {
                $roles->syncPermissions($request->permissions);
            } else {
                $roles->syncPermissions([]);
            }
            DB::commit();
            return response()->json(['status'=>true, 'message'=>'El rol '.$roles->name.' fue actualizado exitosamente' ]);


        }catch(\Exception $exc){
            DB::rollBack();
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el rol']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $roles = Role::findOrFail($id);
            $roles->delete();

            return response()->json(['status'=>true, 'message'=>'El rol '.$roles->name. ' fue eliminado exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el rol'.$exc]);
        }
    }
}
