<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Drivers\CurlDriver;
use Jamiehoward\UpsEstimator\Providers\UPSServiceProvider;

final class UPSServiceProviderTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Providers\UPSServiceProvider'));
    }

    public function test_driver_can_be_set_and_retrieved()
    {
        $driver = new CurlDriver;

        $provider = new UPSServiceProvider;

        $provider->setDriver($driver);
        $this->assertSame($driver, $provider->getDriver());
    }

    public function test_driver_must_be_instance_of_driver()
    {
        $this->expectException(\TypeError::class);

        $provider = new UPSServiceProvider;
        $provider->setDriver(new \stdClass);
    }
}
