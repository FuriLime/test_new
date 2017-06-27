<?php


namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\ProductInfo;
use DB;
use File;
use Illuminate\Support\Facades\Input;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(12);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::paginate(12);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try
        {
        $this->validate($request, [
            'product_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
         ]);
            $product_info = new ProductInfo();
            $product_info->product_id = $product->id;
            $product_info->size = Input::get('size');
            $product_info->cpu = Input::get('cpu');
            $product_info->memory = Input::get('memory');
            $product_info->amount = Input::get('amount');
        
        if (Input::hasFile('image'))
            {
            $file = Input::file('image');

            $destinationPath = public_path().'/images/';
            $filename = $product->id . '.' . $file->getClientOriginalName();

            $file->move($destinationPath, $filename);
            $product->image = $filename;

            $product->save();
            $product_info->save();
            }

        return redirect()->route('product.index')->with('success', "The product $product->product_name has successfully been created.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productory  $productory
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productory  $productory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try
        {
            $categories = Category::all();
            // $product_info =Product::find($id)->infos()->first();
            // dd($product_info);
            $product = Product::findOrFail($id);
            return view('admin.products.edit', compact('categories', 'product'));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productory  $productory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try
        {
            $this->validate($request, [
                'product_name' => 'required',
                'description' => 'required',
                'category_id' => 'required',
            ]);
            $product = Product::findOrFail($id);
            $product->product_name = $request->input('image');
            $product->product_name = $request->input('product_name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');


            $product_info = Product::find($id)->infos()->first();
            $product_info->amount = Input::get('amount');
            $product_info->cpu = Input::get('cpu');
            $product_info->size = Input::get('size');
            $product_info->memory = Input::get('memory');
            // $product->save();
            if (Input::hasFile('image'))
            {
                File::delete(public_path() . '/images/'. $product->image); //REMOVE OLD FILE
                $file = Input::file('image');
                $destinationPath = public_path().'/images';
                $filename = $product->id . '.' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $product->image = $filename;
            }
            $product->save();
            $product_info->save();
            return redirect()->route('product.index')->with('success', "The product {$product->product_name} has successfully been updated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productory  $productory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail( $id );
        if ( $request->ajax() ) {
            $product->delete( $request->all() );
            return response(['msg' => 'Product deleted', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the Product', 'status' => 'failed']);
    }


}
