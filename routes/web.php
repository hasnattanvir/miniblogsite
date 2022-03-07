<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home'])->name('website');
Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [App\Http\Controllers\FrontEndController::class, 'category'])->name('website.category');
Route::get('/tag/{slug}', [App\Http\Controllers\FrontEndController::class, 'tag'])->name('website.tag');
Route::get('/post/{slug}', [App\Http\Controllers\FrontEndController::class, 'post'])->name('website.post');
Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact'])->name('website.contact');
Route::post('/contact',[App\Http\Controllers\FrontEndController::class,'send_message'])->name('website.contact');
Route::get('/search/', [App\Http\Controllers\FrontEndController::class,'search'])->name('search');

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
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // Route::get('/dashboard',function(){
    //     return view('admin.dashboard.index');
    // })->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');
    // user route
    Route::resource('user','UserController');
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class,'profile_update'])->name('user.profile.update');
    // setting
    Route::get('settings',[SettingsController::class,'edit'])->name('settings.index');
    Route::post('settings',[SettingsController::class,'update'])->name('settings.update');
    
    //contact
    Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
    Route::get('/contact/show/{id}',[ContactController::class,'show'])->name('contact.show');
    Route::delete('/contact/delete/{id}',[ContactController::class,'destroy'])->name('contact.destroy');


    // Route::resource('category', App\Http\Controllers\CategoryController::class);
    // Route::get('/catcontroller', [CategoryController::class,'index'])->name('category.index');

});



Auth::routes();

