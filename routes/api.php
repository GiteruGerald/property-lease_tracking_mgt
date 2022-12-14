<?php

// use App\Http\Controllers\API\PropertyController;
// use Illuminate\Http\Request;

// use App\Http\Controllers\LeaseController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('properties', PropertyController::class); 
Route::apiResource('locations', LocationController::class); 
Route::apiResource('leases', LeaseController::class); 
Route::get('get-lease/{id}', 'LeaseController@getlease');
Route::get('filter', 'PropertyController@getPropertyByType');
Route::get('search', 'PropertyController@searchProperty');
