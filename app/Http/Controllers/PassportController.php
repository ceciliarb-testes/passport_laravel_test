<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class PassportController extends Controller
{
    //

    public function register()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return response()->json(['status' => 201]);
    }


    public function loginPassword()
    {
        // recupera o primeiro cliente do tipo password que aparecer
        $client = DB::table('oauth_clients')->where('password_client', true)->first();

        $data = [
            'grant_type' => 'password',
            // client_id e client_secret nunca chegam a ir para o frontend
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            // username e password vêm do frontend
            'username' => request('username'),
            'password' => request('password'),
        ];

        // a rota '/oauth/token' é gerada por default no Passport
        $request = Request::create('/oauth/token', 'POST', $data);
        // redireciona essa request para a request q recupera o token
        return app()->handle($request);
    }

    public function loginClientCredentials()
    {
        // recupera o primeiro cliente do tipo password que aparecer
        $client = DB::table('oauth_clients')->where('password_client', true)->first();

        $data = [
            'grant_type' => 'client_credentials',
            // client_id e client_secret nunca chegam a ir para o frontend
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => '*'
        ];

        // a rota '/oauth/token' é gerada por default no Passport
        $request = Request::create('/oauth/token', 'POST', $data);
        // redireciona essa request para a request q recupera o token
        return app()->handle($request);
    }

    public function logout()
    {
        $accessToken = auth()->user()->token();
        $refreshToken = DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }
}
