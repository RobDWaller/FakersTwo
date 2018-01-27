<?php

namespace App\Helper;

trait Environment
{
    public function env(string $environmentAttribute)
    {
        return env($environmentAttribute);
    }
}
