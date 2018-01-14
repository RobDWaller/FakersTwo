<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Aggregates\Twitter;
use App\Aggregates\Database\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthenticateController extends Controller
{
    public function index(Request $request, Twitter $twitter)
    {
        return redirect($twitter->buildOAuthAuthenticationUrl($request));
    }

    public function return(Request $request, Twitter $twitter, User $user)
    {
        if (!$request->has('oauth_verifier')) {
            $request->session()->flush();
            return redirect(url('/'))->with(
                'error',
                'Login failed or cancelled please connect to Twitter to login.'
            );
        }

        try {
            $tokens = $twitter->getAccessTokens($request);

            $user = $user->saveAccessTokens($tokens);

            $request->session()->flush();

            Auth::login($user);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            $request->session()->flush();
            return redirect(url('/'))->with(
                'error',
                'There was an error with the login process, please try again.'
            );
        }

        return redirect(url('/dashboard'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect(url('/'))->with('error', 'You have logged out.');
    }
}
