<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index(){ 
        $productTypes = response()->json(ProductType::all()); 
        return $productTypes; 
    } 
 
    public function show($id){ 
        $productType = response()->json(ProductType::find($id)); 
        return $productType; 
    } 
 
    public function store(Request $request){ 
        $productType = new ProductType(); 
        $productType->name = $request->name; 
        $productType->description = $request->description; 
        $productType->cost = $request->cost; 
        $productType->save(); 
    } 
 
    public function update(Request $request, $id){ 
        $productType = ProductType::find($id); 
        $productType->name = $request->name; 
        $productType->description = $request->description; 
        $productType->cost = $request->cost; 
        $productType->save(); 
    } 

 public function destroy($id){  
        productType::find($id)->delete(); 
    } 
}
