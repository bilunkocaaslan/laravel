<?php

use App\HTTP\Controllers\MarkController;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\ProductController;
use App\HTTP\Controllers\SellerController;
use App\HTTP\Controllers\PhotosController;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Photos;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

// Route::get('/index', function () {
//     return view('index');
// });

Route::get('/seller', function () {
    return view('seller');
});




Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('home',[ProductController::class,'getProduct1']);

// Route::resource('index',ProductController::class);
Route::get('index',[ProductController::class,'getProduct']);

Route::resource('mark',MarkController::class);
Route::get('mark',[MarkController::class,'getMark']);

Route::resource('seller',SellerController::class);
Route::get('seller',[SellerController::class,'getSeller']);


Route::resource('mark',MarkController::class);
Route::get('delete/{id}',[MarkController::class,'delete']);

Route::resource('product',ProductController::class);
Route::get('delete1/{id}',[ProductController::class,'delete1']);

Route::resource('seller',SellerController::class);
Route::get('delete2/{id}',[SellerController::class,'delete2']);


Route::resource('deneme',MarkController::class);
Route::get('deneme',[MarkController::class,'getDeneme']);

// Route::resource('deneme',MarkController::class);
// Route::get('delete',[MarkController::class,'deleteMrk']);




Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/product', [
        'as'    =>    'product.index',
        'uses'     =>    'ProductController@index'
    ]);
   
    Route::post('/product', [
        'as'    =>    'product.store',
        'uses'     =>    'ProductController@store'
    ]);
    Route::get('/update/product/{id}', [
        'as'    =>    'product.update',
        'uses'     =>    'ProductController@update'
    ]);
    Route::post('/update/product/{id}', [
        'as'    =>    'product.edit',
        'uses'     =>    'ProductController@edit'
    ]);
    Route::post('/product/delete1/{id}', [
        'as'    =>    'product.delete1',
        'uses'     =>    'ProductController@delete1'
    ]);
});


Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/mark', [
        'as'    =>    'mark.index',
        'uses'     =>    'MarkController@index'
    ]);
    Route::post('/mark', [
        'as'    =>    'mark.store',
        'uses'     =>    'MarkController@store'
    ]);
    Route::get('/update/mark/{id}', [
        'as'    =>    'mark.uppdate',
        'uses'     =>    'MarkController@update'
    ]);
    Route::post('/update/mark/{id}', [
        'as'    =>    'mark.edit',
        'uses'     =>    'MarkController@edit'
    ]);
    // Route::post('/mark/delete/{{$mark->id}}', [
    //     'as'    =>    'mark.delete',
    //     'uses'     =>    'MarkController@delete'
    // ]);

    Route::post('/deneme', [
        'as'    =>    'mark.delete',
        'uses'     =>    'MarkController@deleteMrk'
    ]);
});

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/seller', [
        'as'    =>    'seller.index',
        'uses'     =>    'SellerController@index'
    ]);
    Route::post('/seller', [
        'as'    =>    'seller.store',
        'uses'     =>    'SellerController@store'
    ]);
    Route::get('/update/seller/{id}', [
        'as'    =>    'seller.updateS',
        'uses'     =>    'SellerController@update'
    ]);
    Route::post('/update/seller/{id}', [
        'as'    =>    'seller.edit',
        'uses'     =>    'SellerController@edit'
    ]);
    Route::post('/seller/delete2/{id}', [
        'as'    =>    'seller.delete2',
        'uses'     =>    'SellerController@delete2'
    ]);

});

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', 'HomeController@admin')->name('admin');
});

