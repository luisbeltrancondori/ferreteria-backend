<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('name','asc')->get();
        return response()->json($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $suppliers = new Supplier();
            $suppliers-> name = $request->name;
            $suppliers-> contact = $request->contact;
            $suppliers-> cell_phone = $request->cell_phone;
            $suppliers->email = $request->email;

            $suppliers-> save();


            return response()->json(['status'=>true, 'message'=>'El proveedor '.$suppliers->name.' fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear el proveedor: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suppliers = Supplier::find($id);
        return response()->json($suppliers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $suppliers = Supplier::findOrFail($id);
            $suppliers->name = $request->name;
            $suppliers->contact = $request->contact;
            $suppliers->cell_phone = $request->cell_phone;
            $suppliers->email = $request->email;

            $suppliers->save();
            return response()->json(['status'=>true, 'message'=>'El proveedor '.$suppliers->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el proveedor']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $suppliers = Supplier::findOrFail($id);
            $suppliers->delete();

            return response()->json(['status'=>true, 'message'=>'El proveedor '.$suppliers->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el proveedor'.$exc]);
        }
    }
}
