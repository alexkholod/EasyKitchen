<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', 'ProductController@makeMainView')
        ->name('home');

    Route::get('/search', 'ProductController@search')
        ->name('search');

    Route::get('/storages', function () {
        return view('storage-select');
    })->name('storages');

    Route::get('/settings', function () {
        $totalProducts = \App\Models\Product::count();
        return view('settings', compact('totalProducts'));
    })->name('settings');

    Route::get('storage/{id}', 'ProductController@storageView')
        ->name('storage');

    Route::get('/product/{id}', 'ProductController@viewSingleProduct')
        ->name('single');

    Route::post('/delete-product/deleted/{id}', 'ProductController@delete')
        ->name('deleted');

    Route::get('/add-product', 'ProductController@makeAddView')
        ->name('add-product');

    Route::post('/add-product/added', 'ProductController@add')
        ->name('added');

    Route::put('/product/{id}/update', 'ProductController@update')
        ->name('update-product');
});
