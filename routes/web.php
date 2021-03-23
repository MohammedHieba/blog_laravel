<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteGroup;

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

Route::group(['middleware'=>'auth'],function(){

//index
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');



//delete
Route::DELETE('/posts/{post}' , [PostController::class , 'destroy'])->name('posts.destroy');

//create || store
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');

//show
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');




//edit || update
Route::get('/posts/{post}/edit' , [PostController::class , 'edit'])->name('posts.edit');
Route::post('/posts/{post}' ,[PostController::class , 'update'])->name('posts.update');


});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
