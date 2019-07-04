<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Posts
    /* Route::get('posts', function () {
        $posts = LaraDex\Post::all();
        return response()->json(['posts' => $posts]);
    }); */

    // Tokens Scope
    Route::group(['middleware' => ['scope:get-posts']], function () {
        Route::get('posts', function () {
            $posts = LaraDex\Post::all();
            return response()->json(['posts' => $posts]);
        });
    });

    Route::group(['middleware' => ['scope:get-two-posts']], function () {
        Route::get('posts', function () {
            $posts = LaraDex\Post::limit(2)->get();
            return response()->json(['posts' => $posts]);
        });
    });
});

// Client Credential Grant Tokens
Route::group(['middleware' => ['client']], function () {
    Route::get('clients/posts', function () {
        $posts = LaraDex\Post::all();
        return response()->json(['posts' => $posts]);
    });

    Route::post('clients/posts', function (Request $request) {
        \LaraDex\Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        return ['status' => 200];
    });
});