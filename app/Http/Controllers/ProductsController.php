<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\ProductInfo;
use DB;
use File;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        $products = Category::findOrFail($product->category->id)->productsCat()->orderByRaw("RAND()")->limit(4)->get();
        return view('product.index', compact('product','products'));
    }
}
