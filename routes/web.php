<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Input;

Route::group(['prefix' => 'dashboard','namespace' => 'Admin', 'middleware' => 'auth'],function(){
    // Route::get('/', 'AdminCategoriesController@index');
    Route::resource('categories', 'AdminCategoriesController');
    Route::resource('product', 'AdminProductsController');
});

Route::get('/',array(
    'as' => 'categories_show',
    'uses' => 'CategoriesController@showAll'
));
Route::get('product/{id}', array(
    'as' => 'product_show',
    'uses' => 'ProductsController@getProduct'
));
Route::get('category/{id}',array(
    'as' => 'category_show',
    'uses' => 'CategoriesController@getCategory'
));




Auth::routes();

// Route::get('/dashboard', 'HomeController@index');

Route::any ( '/result', function () {
    $q = Input::get ( 'q' );
    $category = Category::where ( 'name', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $category ) > 0){
        return view ( 'result' )->withDetails ( $category )->withQuery ( $q );
    }
    else{
        return view ( 'result' )->withMessage ( 'No Details found. Try to search again !' );
    }
} );
