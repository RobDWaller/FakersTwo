<?php

namespace App\Helper;

trait Password
{
    public function generatePassword()
    {
        return substr(bin2hex(random_bytes(60)), 0, 60);
    }
}
