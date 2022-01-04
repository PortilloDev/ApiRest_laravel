<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\BookController as BookV1;
use App\Http\Controllers\Api\V2\BookController as BookV2;
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

Route::apiResource('v1/books', BookV1::class)->only(['index','show', 'destroy']);
Route::apiResource('v2/books', BookV2::class)->only(['index','show']);
