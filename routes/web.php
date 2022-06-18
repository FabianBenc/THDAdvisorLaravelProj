<?php

use Illuminate\Support\Facades\Route;
use App\Models\Reply;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\RepliesController;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post(
    '/replies/like/{reply_id}',
    [RepliesController::class, 'liker']
)->name('like');

Route::post(
    '/replies/dislike/{reply_id}',
    [RepliesController::class, 'disliker']
)->name('dislike');

Route::resource('threads',ThreadsController::class);
Route::resource('replies',RepliesController::class);

Route::get('replies/{id}/download', [App\Http\Controllers\RepliesController::class, 'fileDownload'])->name('files.download');


