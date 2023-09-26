<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiTester;

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

    Route::post('/reverse-me', function (Request $request) {
        $reversed = strrev($request->input('reverse_this'));
        return $reversed;
    });
    Route::get('/hello', function () {
    return "Hello World!";
  });
Route::get('testData',[apiTester::class,'fetchRawdata'])->name('api.test_data');;
