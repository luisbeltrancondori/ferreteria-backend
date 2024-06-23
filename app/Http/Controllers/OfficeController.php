<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::orderBy('name','asc')->get();
        return response()->json($offices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $offices = new Office();
            $offices-> name = $request->name;
            $offices-> address = $request->address;
            $offices->cell_phone = $request->cell_phone;
            $offices->latitude = $request->latitude;
            $offices->longitude = $request->longitude;

            $offices-> save();


            return response()->json(['status'=>true, 'message'=>'La sucursal '.$offices->name.' fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la sucursal: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offices = Office::find($id);
        return response()->json($offices);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $offices = Office::findOrFail($id);
            $offices->name = $request->name;
            $offices->address = $request->address;
            $offices->cell_phone = $request->cell_phone;
            $offices->latitude = $request->latitude;
            $offices->longitude = $request->longitude;

            $offices->save();
            return response()->json(['status'=>true, 'message'=>'La sucursal '.$offices->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la sucursal']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $offices = Office::findOrFail($id);
            $offices->delete();

            return response()->json(['status'=>true, 'message'=>'La sucursal '.$offices->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la sucursal'.$exc]);
        }
    }
}
