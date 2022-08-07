<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//shop api start
Route::group(['middleware' => ['json.response']], function () {
    Route::get('fetch_category','ShopController@get_category');
    Route::post('fetch_product','ShopController@fetch_product');

});

//shop api end







