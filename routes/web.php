<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


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

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home'])->name('website.home');
Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'about'])->name('website.about');
Route::get('/category{slug}', [App\Http\Controllers\FrontEndController::class, 'category'])->name('website.category');
Route::get('/post/{slug}', [App\Http\Controllers\FrontEndController::class, 'post'])->name('website.post');
Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact'])->name('website.contact');



// Route::get('/', function(){
//  return view('website.home');
// })->name('website');

// Route::get('/about', function(){
//  return view('website.about');
// });

// Route::get('/category', function(){
//  return view('website.category');
// });

// Route::get('/post', function(){
//  return view('website.post');
// });

// Route::get('/contact', function(){
//  return view('website.contact');
// });


// admin panet routes

Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard.index');
    });
    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');

    // user route
    Route::resource('user','UserController');
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class,'profile_update'])->name('user.profile.update');

    // Route::resource('category', App\Http\Controllers\CategoryController::class);
    // Route::get('/catcontroller', [CategoryController::class,'index'])->name('category.index');

});



Auth::routes();

