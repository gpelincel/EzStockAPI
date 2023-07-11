<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = new Product();
        $products = $product->all();

        return $products;
    }

    public function store(Request $request){
        $product = new Product($request->all());

        $product->timestamps = false;
        $product->save();

        return $product;
    }

    public function show(string $id){
        $product = Product::find($id);
        
        return $product;
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->update($data);
        $product->save();

        return new $product;
    }

    public function destroy(string $id){
        $product = Product::find($id);
        $product->delete();

        return $product;
    }
}
