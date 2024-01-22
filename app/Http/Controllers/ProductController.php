<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return json_encode(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $res_create =  Product::create(['product_name'=>$request->name,'product_type'=>$request->type,'price'=>$request->price]);
        if($res_create){
            return json_encode(['success'=>'ใส่ลง']);
        }else{
            return json_encode(['err'=>'ใส่ไม่ลง']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        return json_encode(Product::find($product));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
