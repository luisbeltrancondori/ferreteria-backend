<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name','asc')->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $products = new Product();
            $products-> name = $request->name;
            $products-> description = $request->description;
            $products-> price = $request->price;
            $products->category_id = $request->category_id;
            $products->brand_id = $request->brand_id;
            $products->unitmeasurement_id = $request->unitmeasurement_id;

            $products-> save();

            $image_name =$this->loadImage($request);
            if($image_name != ''){
                $products->image()->create(['url'=>'images/'.$image_name]);
            }

            return response()->json(['status'=>true, 'message'=>'El producto '.$products->name.'fue creado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al crear el producto: ']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);

        $image = null;
        if($products->image){
            $image = Storage::url($products->image['url']);
        }

        return response()->json(['products'=>$products, 'image'=>$image]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

            $products = Product::findOrFail($id);
            $products-> name = $request->name;
            $products-> description = $request->description;
            $products-> price = $request->price;
            $products->category_id = $request->category_id;
            $products->brand_id = $request->brand_id;
            $products->unitmeasurement_id = $request->unitmeasurement_id;

            $products-> save();

            $image_name = $this->loadImage($request);
            if($image_name != ''){
                $products->image()->update(['url'=>'images/'.$image_name]);
            }

            return response()->json(['status'=>true, 'message'=>'El producto '.$products->name.'fue actualizado correctamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al actualizar el producto: ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $products = Product::findOrFail($id);
            $products->delete();

            return response()->json(['status'=>true, 'message'=>'El producto '.$products->name. ' fue eliminado exitosamente']);
        }catch(\Exception $exc){
            return response()->json(['status'=>false, 'message'=>'Error al eliminar el producto'.$exc]);
        }
    }

    public function loadImage($request){
        $image_name = '';
        if($request->hasFile('image')){
            $destination_patch = 'public/images';
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $request->file('image')->storeAs($destination_patch, $image_name);
        }
        return $image_name;
    }


}
