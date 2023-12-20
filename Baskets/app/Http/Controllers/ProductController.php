<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){ 
        $products = response()->json(Product::all()); 
        return $products; 
    } 
 
    public function show($id){ 
        $product = response()->json(Product::find($id)); 
        return $product; 
    } 
 
    public function store(Request $request){ 
        $product = new Product(); 
        $product->type_id = $request->type_id; 
        $product->date = $request->date; 
        $product->save(); 
    } 
 
    public function update(Request $request, $id){ 
        $product = Product::find($id); 
        $product->type_id = $request->type_id; 
        $product->date = $request->date; 
        $product->save(); 
    } 

 public function destroy($id){  
        product::find($id)->delete(); 
    } 
}
