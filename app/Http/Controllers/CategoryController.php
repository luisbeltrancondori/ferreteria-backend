<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $categories = new Category();
            $categories-> name = $request->name;
            $categories-> description = $request->description;
            $categories-> save();
            return response()->json(['status'=>true, 'message'=>'La categoria '.$categories->name.'fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear la categoria: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);
        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $categories = Category::findOrFail($id);
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->save();
            return response()->json(['status'=>true, 'message'=>'La categoria '.$categories->name.' fue actualizado exitosamente' ]);

        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar la categoria']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $categories = Category::findOrFail($id);
            $categories->delete();

            return response()->json(['status'=>true, 'message'=>'La categoria '.$categories->name. ' fue eliminada exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar la categoria'.$exc]);
        }
    }

}
