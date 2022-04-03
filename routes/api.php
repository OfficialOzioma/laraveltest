<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::group(['middleware' => ['cors', 'json.response']], function () {

        Route::get('/articles', [ArticleController::class, 'index']);
        Route::get('/articles/{id}', [ArticleController::class, 'show']);
        Route::get('/articles/{id}/comment', [ArticleController::class, 'getArticleComments']);
        Route::get('/articles/{id}/like', [ArticleController::class, 'getArticleLikes']);
        Route::get('/articles/{id}/view', [ArticleController::class, 'getArticleViews']);
    });
});