<?php

namespace Tests\Unit\Requests;

use Jamiehoward\UpsEstimator\Drivers\CurlDriver;
use Tests\TestCase;
use Jamiehoward\UpsEstimator\Requests\CountryRequest;

final class CountryRequestTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Requests\CountryRequest'));
    }

    public function test_driver_can_be_set_and_retrieved()
    {
        $driver = new CurlDriver;

        $countryRequest = new CountryRequest;

        $countryRequest->setDriver($driver);
        $this->assertSame($driver, $countryRequest->getDriver());
    }

    public function test_driver_must_be_instance_of_driver()
    {
        $this->expectException(\TypeError::class);

        $countryRequest = new CountryRequest;
        $countryRequest->setDriver(new \stdClass);
    }

    public function test_can_set_and_retrieve_locale()
    {
        $countryRequest = new CountryRequest;
        $countryRequest->setLocale('en_US');
        $this->assertEquals('en_US', $countryRequest->getLocale());
    }

    public function test_english_is_default_locale()
    {
        $countryRequest = new CountryRequest;
        $this->assertEquals('en_US', $countryRequest->getLocale());
    }
}
