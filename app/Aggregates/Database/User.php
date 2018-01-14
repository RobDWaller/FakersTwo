<?php

namespace App\Aggregates\Database;

use App\User as UserModel;
use App\UserCredential;
use App\UserDetail;
use App\Helper\Password;

class User
{
    use Password;

    private $user;

    private $userCredential;

    private $userDetail;

    public function __construct(UserModel $user, UserCredential $userCredential, UserDetail $userDetail)
    {
        $this->user = $user;

        $this->userCredential = $userCredential;

        $this->userDetail = $userDetail;
    }

    public function saveAccessTokens(array $tokens): UserModel
    {
        if ($this->user->where('twitter_id', $tokens['user_id'])->count() === 0) {
            $this->user->twitter_id = $tokens['user_id'];
            $this->user->password = $this->generatePassword();
            $result = $this->user->save();

            $this->userCredential->token = $tokens['oauth_token'];
            $this->userCredential->secret = $tokens['oauth_token_secret'];
            $this->user->userCredential()->save($this->userCredential);

            $this->userDetail->screen_name = $tokens['screen_name'];
            $this->user->userDetail()->save($this->userDetail);

            return $this->user;
        }

        $user = $this->user->where('twitter_id', $tokens['user_id'])->first();

        $userCredential = $user->userCredential()->first();
        $userCredential->token = $tokens['oauth_token'];
        $userCredential->secret = $tokens['oauth_token_secret'];
        $userCredential->save();

        $userDetail = $user->userDetail()->first();
        $userDetail->screen_name = $tokens['screen_name'];
        $userDetail->save();

        return $user;
    }
}
