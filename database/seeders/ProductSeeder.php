<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['product_name'=>'iphone 14','product_type'=>1,'price'=>47400.50]);        
        Product::create(['product_name'=>'iphone 13','product_type'=>1,'price'=>37400.50]);        
        Product::create(['product_name'=>'iphone 12','product_type'=>1,'price'=>27400.50]);        
        Product::create(['product_name'=>'Galaxy S20','product_type'=>1,'price'=>25900]);        
        Product::create(['product_name'=>'LG Smart TV','product_type'=>2,'price'=>30900]);        
        Product::create(['product_name'=>'Samsung Smart TV','product_type'=>2,'price'=>40900]); 
       
        
    }
}
