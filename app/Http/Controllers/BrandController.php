<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('name','asc')->get();
        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $brand = new Brand();
            $brand-> name = $request->name;
            $brand-> description = $request->description;
            $brand-> save();
            return response()->json(['status'=>true, 'message'=>'La Marca '.$brand->name.'fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la marca: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $brand = Brand::findOrFail($id);
            $brand->name = $request->name;
            $brand->description = $request->description;
            $brand->save();
            return response()->json(['status'=>true, 'message'=>'La Marca '.$brand->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la marca']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $brand = Brand::findOrFail($id);
            $brand->delete();

            return response()->json(['status'=>true, 'message'=>'La Marca '.$brand->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la marca'.$exc]);
        }
    }
}
