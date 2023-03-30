<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Cviebrock\EloquentSluggable\Services\SlugService;

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


Route::post('/register', [UserController::class, 'register']);
//login user
Route::post('/login', [UserController::class, 'login']);




/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['prefix' => '/projects'], function()  
    {     


        Route::post('/create', [ProjectController::class, 'create']);
        Route::get('/all', [ProjectController::class, 'all']);
        Route::get('/show/{slug}', [ProjectController::class, 'show']);

    });
  
  Route::post('/logout', [UserController::class, 'logout']);
  });

