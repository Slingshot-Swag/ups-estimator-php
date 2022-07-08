<?php

namespace Tests\Unit\Drivers;

use Tests\TestCase;

final class DriverTest extends TestCase
{
    public function test_interface_exists()
    {
        $this->assertTrue(interface_exists('\Jamiehoward\UpsEstimator\Drivers\Driver'));
    }
}
