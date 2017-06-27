<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll(Request $request)
    {
 
        $categories = Category::paginate(12);

        $populars = Product::orderBy('price')->limit(4)->get();
            return view('category.index', compact('categories', 'populars')); 
    }
    public function getCategory($id)
    {
        $products = Category::find($id)->productsCat()->paginate(12);        
        return view('category.show', compact('products'));
    }
}
