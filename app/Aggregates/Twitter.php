<?php

namespace App\Aggregates;

use Illuminate\Http\Request;
use App\Twitter\OAuth\Auth;
use App\Twitter\OAuth\Factory;
use App\Twitter\TwitterOAuth;

class Twitter
{
    public function buildOAuthAuthenticationUrl(Request $request): string
    {
        $auth = new Auth(env('TWITTER_KEY'), env('TWITTER_SECRET'));

        $twitterOAuth = new TwitterOAuth($auth, new Factory);

        $token = $twitterOAuth->getOAuthRequestToken(['oauth_callback' => url('/authenticate/return')]);

        $request->session()->put('oauth_token', $token['oauth_token']);
        $request->session()->put('oauth_token_secret', $token['oauth_token_secret']);

        return $twitterOAuth->getOAuthUrl(['oauth_token' => $token['oauth_token']]);
    }

    public function getAccessTokens(Request $request): array
    {
        $auth = new Auth(env('TWITTER_KEY'), env('TWITTER_SECRET'));
        $auth->setOAuthToken($request->session()->get('oauth_token'));
        $auth->setOAuthTokenSecret($request->session()->get('oauth_token_secret'));

        $twitterOAuth = new TwitterOAuth($auth, new Factory);

        return $twitterOAuth->getAccessToken(['oauth_verifier' => $request->input('oauth_verifier')]);
    }
}
