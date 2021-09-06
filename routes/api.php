<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\BookRequestController;
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
// Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d\-\/_.]+)?');

Route::group(['prefix' => 'auth'], function () {          
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::account();
    Route::impersonate();
    Route::upload();

    /**
     * Tree specific routes
     */
    Route::get('categories/tree', [CategoryController::class, 'tree']);
    Route::get('categories/nodes/{parentId?}', [CategoryController::class, 'nodes']);
    Route::patch('categories/{category}/move', [CategoryController::class, 'move']);

    /**
     * API resources controllers
     */
     // 'posts' => 'App\Http\Controllers\{Post}Controller',
    Route::apiResources([
        'users' => UserController::class,
        'authors' => AuthorController::class,
        'books' => BookController::class,
        'reviews' => ReviewController::class,
        'publishers' => PublisherController::class,
        'categories' => CategoryController::class,
        'posts' => PostController::class,
        'book_requests' => BookrequestController::class,
        'feedback' => FeedbackController::class,
    ]);
});
