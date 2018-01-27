<?php

namespace App\Helper;

use Illuminate\Support\Facades\Log as LaravelLog;

trait Log
{
    public function logError($id, $message)
    {
        LaravelLog::error($id . ' ' . $message);
    }
}
