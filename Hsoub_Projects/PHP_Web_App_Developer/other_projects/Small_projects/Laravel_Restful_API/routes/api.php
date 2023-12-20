<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Tag;
// use App\Http\Controllers\API\LessonController;

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

Route::group(['prefix' => '/v1'], function () {

    Route::apiResource('lessons', 'App\Http\Controllers\API\LessonController');

    Route::apiResource('users', 'App\Http\Controllers\API\UserController');

    Route::apiResource('tags', 'App\Http\Controllers\API\TagController');

    Route::any('lesson', function () {
        $message = "Please make sure to update your code to use the newer version of our API.
        You should use lessons instead of lesson";
        return Response::json([
            'data' => $message,
            'link' => url('documentation/api'),
        ], 404);
    });

    //Route::redirect('lesson', 'lessons');

    Route::get('users/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@userLessons');

    Route::get('lessons/{id}/tags', 'App\Http\Controllers\API\RelationshipController@lessonTags');

    Route::get('tags/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@tagLessons');

    Route::get('/login', 'App\Http\Controllers\API\LoginController@login')->name('login');
});
