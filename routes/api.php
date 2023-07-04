<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    "prefix" => "auth"
], function(){
    Route::post("register", [ApiAuthController::class, "register"]);
    Route::post("login", [ApiAuthController::class, "login"]);
});

//books
Route::post("/books", [BookApiController::class, "store"]);
Route::get("/books", [BookApiController::class, "index"]);
Route::get("/books/{id}", [BookApiController::class, "show"]);
Route::put("/books/{id}/update", [BookApiController::class, "update"]);
Route::get("/delete/{id}", [BookApiController::class, "destroy"]);

//searchApi
Route::get("/books/search/{search}", [BookApiController::class, "search"]);

//categroy appi
Route::post("/category", [CategoryApiController::class, "store"]);
Route::get("/category", [CategoryApiController::class, "index"]);
Route::put("/category/{id}/update", [CategoryApiController::class, "update"]);
Route::get("/category/delete/{id}", [CategoryApiController::class, "destroy"]);

//authorApi
Route::get("/authors", [AuthorController::class, "index"]);
Route::get("/authors/{id}", [AuthorController::class, "show"]);
Route::post("/authors", [AuthorController::class, "store"]);
Route::put("/authors/{id}", [AuthorController::class, "update"]);

//publisher
Route::get("/publishers", [PublisherController::class, "index"]);
Route::get("/publishers/{id}", [PublisherController::class, "show"]);
Route::post("/publishers", [PublisherController::class, "store"]);
Route::put("/publishers/{id}", [PublisherController::class, "update"]);







