<?php

namespace Tests\Unit\Faker;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Faker\ScoreBuilder;
use App\Twitter\Request;

class ScoreBuilderTest extends TestCase
{
    public function testGetData()
    {
        $request = new Request();

        $scoreBuilder = new ScoreBuilder($request);
    }
}
