<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Id;

abstract class AbstractApiController extends Controller
{
    use Id;

    public function response(int $code, array $response)
    {
        return response()->json($response, $code);
    }
}
