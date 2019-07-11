<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/teste', function () {
    return "oi!";
});
Route::get('/teste2', function () {
    return "oi!sdsadfasdfasdfadsf";
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://localhost:8000/callback',
        'response_type' => 'code',
        'scope' => '*',
    ]);

    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
    $data = [
        'grant_type' => 'authorization_code',
        'client_id' => '3',
        'client_secret' => 'fMobmlwhDo98vnB9Ubm4vGF2BbFrHFGNWdPnMvtB',
        'redirect_uri' => 'http://localhost:8000/callback',
        'code' => $request->code,
    ];
    $request->request->add($data);
    $tokenRequest = Request::create(url('oauth/token'), 'post');
    $response = Route::dispatch($tokenRequest);

    if($response->getStatusCode() == 200){
        return $response->getContent();
    }
    return $response;
});

Route::get('/redirectImplicit', function () {
    $query = http_build_query([
        'client_id' => '4',
        'redirect_uri' => 'http://localhost:8000/callbackImplicit',
        'response_type' => 'token',
        'scope' => '*',
    ]);
    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/callbackImplicit', function (Request $request) {
    dd($request);
    return $request;
});