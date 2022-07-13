<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Requests\CountryRequest;
use Jamiehoward\UpsEstimator\Providers\UPSServiceProvider;

final class CountryRequestTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Requests\CountryRequest'));
    }

    public function test_can_set_and_retrieve_provider()
    {
        $provider = new UPSServiceProvider;
        $countryRequest = new CountryRequest;
        $countryRequest->setProvider($provider);
        $this->assertSame($provider, $countryRequest->getProvider());
    }

    public function test_provider_must_be_instance_UPSServiceProvider()
    {
        $this->expectException(\TypeError::class);

        $countryRequest = new CountryRequest;
        $countryRequest->setProvider(new \stdClass);
    }

    public function test_ups_service_provider_is_the_default_provider()
    {
        $countryRequest = new CountryRequest;
        $this->assertInstanceOf(UPSServiceProvider::class, $countryRequest->getProvider());
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

    public function test_can_set_and_retrieve_country_code()
    {
        $countryRequest = new CountryRequest;
        $countryRequest->setCountryCode('US');
        $this->assertEquals('US', $countryRequest->getCountryCode());
    }

    public function test_can_set_country_code_upon_instantiation()
    {
        $countryRequest = new CountryRequest('US');
        $this->assertEquals('US', $countryRequest->getCountryCode());
    }

    public function test_can_make_request()
    {
        $countryRequest = new CountryRequest;
        $countryRequest->setCountryCode('US');
        
        // Mock the response from the provider
        $response = $this->createMock('\Jamiehoward\UpsEstimator\Responses\CountryResponse');
        $response->method('getStateList')->willReturn([]);

        $this->assertInstanceOf('\Jamiehoward\UpsEstimator\Responses\CountryResponse', $response);
    }
}
