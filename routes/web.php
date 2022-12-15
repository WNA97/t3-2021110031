<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Models\Author;

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

// Route::get('getAuthor/{id}', function ($id) {
//     $course = App\Models\Author::where('id', $id)->get();
//     return response()->json($course);
// });
Route::get('/setNull', [Author::class, 'setNull'])->name('setNull');
Route::get('/setAuthorId', [Author::class, 'setAuthorId'])->name('setAuthorId');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
