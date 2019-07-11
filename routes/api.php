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

Route::post('/register', 'PassportController@register');
Route::post('/login-password', 'PassportController@loginPassword');
Route::post('/login-client-credentials', 'PassportController@loginClientCredentials');

Route::middleware('auth:api_passport')->group(function () {
    Route::post('/logout', 'PassportController@logout');
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/newTokenUrna', function(Request $request) {
        $user= $request->user();
        return $user->createToken('My Token', ['urna'])->accessToken;
    });
    Route::get('/newTokenMesario', function(Request $request) {
        $user= $request->user();
        return $user->createToken('My Token', ['mesario'])->accessToken;
    });
    Route::get('/newTokenEleitor', function(Request $request) {
        $user= $request->user();
        return $user->createToken('My Token', ['eleitor'])->accessToken;
    });
   
});
