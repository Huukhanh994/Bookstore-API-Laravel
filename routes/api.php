<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::apiResource('/authors', AuthorsController::class);
    Route::apiResource('/books', BooksController::class);


    // Show all authors
    Route::get('/authors', [AuthorsController::class, 'index'])->name('authors.index');
    // Show specific author
    Route::get('/authors/{author}', [AuthorsController::class, 'show'])->name('authors.show');

    // Store author
    Route::post('/authors', [AuthorsController::class, 'store'])->name('authors.store');
    // Update author
    Route::put('/authors/{author}', [AuthorsController::class, 'update'])->name('authors.update');
    // Delete author;
    Route::delete('/authors/{author}', [AuthorsController::class, 'destroy'])->name('authors.delete');
});
