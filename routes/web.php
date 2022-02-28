<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function(){
 return view('website.home');
})->name('website');

Route::get('/about', function(){
 return view('website.about');
});

Route::get('/category', function(){
 return view('website.category');
});

Route::get('/post', function(){
 return view('website.post');
});

Route::get('/contact', function(){
 return view('website.contact');
});


// admin panet routes

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard.index');
    });
    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');


    // Route::resource('category', App\Http\Controllers\CategoryController::class);
    // Route::get('/catcontroller', [CategoryController::class,'index'])->name('category.index');

});



Auth::routes();

