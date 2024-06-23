<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unitmeasure;

class UnitmeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitmeasures = Unitmeasure::orderBy('name','asc')->get();
        return response()->json($unitmeasures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $unitmeasures = new Unitmeasure();
            $unitmeasures-> name = $request->name;
            $unitmeasures-> abbreviation = $request->abbreviation;
            $unitmeasures-> save();
            return response()->json(['status'=>true, 'message'=>'La unidad de medida '.$unitmeasures->name.'fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la unidad de medida: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unitmeasures = Unitmeasure::find($id);
        return response()->json($unitmeasures);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $unitmeasures = Unitmeasure::findOrFail($id);
            $unitmeasures->name = $request->name;
            $unitmeasures->abbreviation = $request->abbreviation;
            $unitmeasures->save();
            return response()->json(['status'=>true, 'message'=>'La unidad de medida '.$unitmeasures->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la unidad de medida']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $unitmeasures = Unitmeasure::findOrFail($id);
            $unitmeasures->delete();

            return response()->json(['status'=>true, 'message'=>'La unidad de medida '.$unitmeasures->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la unidad de medida'.$exc]);
        }
    }
}
