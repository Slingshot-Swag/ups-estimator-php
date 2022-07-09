<?php

namespace Tests\Unit\Providers;

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

    public function test_driver_can_be_set_upon_instantiation()
    {
        $driver = new CurlDriver;
        $provider = new UPSServiceProvider($driver);

        $this->assertSame($driver, $provider->getDriver());
    }

    public function test_curl_is_default_driver()
    {
        $provider = new UPSServiceProvider;

        $this->assertInstanceOf(
            \Jamiehoward\UpsEstimator\Drivers\CurlDriver::class, 
            $provider->getDriver()
        );
    }

    public function test_can_make_request_of_the_driver()
    {
        // Mock the driver with the example JSON response
        $response = file_get_contents(__DIR__ . '/../../example-country-response.json');
        $driver = $this->createMock(CurlDriver::class);
        $driver->method('request')->willReturn($response);

        $provider = new UPSServiceProvider($driver);

        $response = $provider->makeRequest('POST', [], []);

        $this->assertInstanceOf(
            \Jamiehoward\UpsEstimator\Responses\CountryResponse::class, 
            $response
        );
    }
}
