<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('name','asc')->get();
        return response()->json($customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $customers = new Customer();
            $customers-> name = $request->name;
            $customers-> last_name = $request->last_name;
            $customers-> mother_last_name = $request->mother_last_name;
            $customers->cell_phone = $request->cell_phone;
            $customers->email = $request->email;

            $customers-> save();


            return response()->json(['status'=>true, 'message'=>'El cliente '.$customers->name.' fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear el cliente: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::find($id);
        return response()->json($customers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $customers = Customer::findOrFail($id);
            $customers->name = $request->name;
            $customers->last_name = $request->last_name;
            $customers->mother_last_name = $request->mother_last_name;
            $customers->cell_phone = $request->cell_phone;
            $customers->email = $request->email;

            $customers->save();
            return response()->json(['status'=>true, 'message'=>'El cliente '.$customers->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el cliente']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $customers = Customer::findOrFail($id);
            $customers->delete();

            return response()->json(['status'=>true, 'message'=>'El cliente '.$customers->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el cliente'.$exc]);
        }
    }
}
