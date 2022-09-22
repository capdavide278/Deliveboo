<?php

namespace App\Http\Controllers\Api\Products;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request){
       $dish = Dish::all();
        
       return ProductResource::collection($dish);
    }
}
