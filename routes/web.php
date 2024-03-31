<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 

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
    return view('posts.input');
});

Route::get('/a', function () {
    return view('posts.input_api');
});

Route::post('/posts', [PostController::class, 'tomail']); 

Route::get('/view', [PostController::class, 'view']); 

//Route::post('/b', [PostController::class, 'input']); //httpbin
Route::post('/b', [PostController::class, 'input2']); //API