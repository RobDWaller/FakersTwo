<?php

namespace App\Helper;

trait Id
{
    public function getId()
    {
        return uniqid('fa_');
    }
}
