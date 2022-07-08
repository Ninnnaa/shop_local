<?php
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\EventController;

//all routes in one controller
//Route::resource('/products', ProductController::class);

//public routes

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/users', [AuthControler::class, 'index']);
Route::get('/users/{id}', [AuthControler::class, 'show']);
Route::delete('/users/{id}', [AuthControler::class, 'destroy']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/producer-products/{id}', [ProductController::class, 'appProductsByProducer']);


// auth routes
Route::post('/register', [AuthControler::class, 'register']);
Route::post('/login', [AuthControler::class, 'login']);

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthControler::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// events
Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'store']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);
Route::get('/events/{id}', [EventController::class, 'show']);

