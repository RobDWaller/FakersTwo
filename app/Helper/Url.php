<?php

namespace App\Helper;

trait Url
{
    public function makeUrl(string $url): string
    {
        return url($url);
    }
}
