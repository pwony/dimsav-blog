<?php

namespace Tests;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function timeTravel(Carbon $time)
    {
        Carbon::setTestNow($time);
    }

    protected function assertPositiveInteger($input) {
        $this->assertIsInt($input);
        $this->assertGreaterThan(0, $input);
    }
}
