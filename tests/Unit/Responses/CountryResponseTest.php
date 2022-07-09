<?php

namespace Tests\Unit\Responses;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Responses\CountryResponse;

final class CountryResponseTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Responses\CountryResponse'));
    }

    public function test_can_set_and_retrieve_selected_country()
    {
        $response = new CountryResponse;
        $response->setSelectedCountry('AU');

        $this->assertSame('AU', $response->getSelectedCountry());
    }

    public function test_can_set_and_retrieve_locale()
    {
        $response = new CountryResponse;
        $response->setLocale('en_US');

        $this->assertSame('en_US', $response->getLocale());
    }

    public function test_can_set_and_retrieve_address_label()
    {
        $response = new CountryResponse;
        $response->setAddressLabel('{\"City\":\"City\",\"State\":\"State/Territory\",\"PostalCode\":\"Postcode\",\"dialCode\":\"Country Dial Code\"}');

        $this->assertSame('{\"City\":\"City\",\"State\":\"State/Territory\",\"PostalCode\":\"Postcode\",\"dialCode\":\"Country Dial Code\"}', $response->getAddressLabel());
    }

    public function test_can_set_and_retrieve_address_layout()
    {
        $response = new CountryResponse;

        $expected = [
            'stateRequired' => false,
            'cityRequired' => true,
            'layoutComponent' => [
                [
                    'name' => 'City',
                    'ordinal' => 2,
                ],
            ],
        ];

        $string = '{\"stateRequired\":false,\"cityRequired\":true,\"layoutComponent\":\"[{\\\"name\\\":\\\"City\\\",\\\"ordinal\\\":2}]\"}';

        $response->setAddressLayout($string);

        $this->assertSame($expected, $response->getAddressLayout());
    }

    public function test_can_set_and_retrieve_state_list()
    {
        $response = new CountryResponse;

        $states = [
            [
                'key' => 'ACT',
                'value' => 'Australian Cap. Ter.',
            ],
            [
                'key' => 'NSW',
                'value' => 'New South Wales',
            ],
            [
                'key' => 'NT',
                'value' => 'Northern Territory',
            ],
        ];

        $stateData = json_encode($states);
        $response->setStateList($stateData);

        $this->assertIsArray($response->getStateList());
        $this->assertSame($states, $response->getStateList());
    }

    public function test_state_list_is_an_array()
    {
        $response = new CountryResponse;
        $response->setStateList('[{\"key\":\"ACT\",\"value\":\"Australian Cap. Ter.\"},{\"key\":\"NSW\",\"value\":\"New South Wales\"},{\"key\":\"NT\",\"value\":\"Northern Territory\"},{\"key\":\"QLD\",\"value\":\"Queensland\"},{\"key\":\"SA\",\"value\":\"South Australia\"},{\"key\":\"TAS\",\"value\":\"Tasmania\"},{\"key\":\"VIC\",\"value\":\"Victoria\"},{\"key\":\"WA\",\"value\":\"Western Australia\"}]');

        $this->assertIsArray($response->getStateList());
    }

    public function test_can_set_and_retrieve_prefix()
    {
        $response = new CountryResponse;
        $response->setPrefix('a1');

        $this->assertSame('a1', $response->getPrefix());
    }

    public function test_can_set_and_retrieve_app_id()
    {
        $response = new CountryResponse;
        $response->setAppId('testing');

        $this->assertSame('testing', $response->getAppId());
    }

    public function test_can_set_and_retrieve_currency_code()
    {
        $response = new CountryResponse;
        $response->setCurrencyCode('AUD');

        $this->assertSame('AUD', $response->getCurrencyCode());
    }

    public function test_properties_can_be_set_through_instantiation()
    {
        $jsonString = file_get_contents(__DIR__ . '/../../example-country-response.json');
        
        $response = new CountryResponse($jsonString);

        $this->assertSame('AU', $response->getSelectedCountry());
        $this->assertSame('en_US', $response->getLocale());
        
        $this->assertIsArray($response->getAddressLayout());
        $this->assertGreaterThan(1, count($response->getAddressLayout()));
        
        $this->assertIsArray($response->getStateList());
        $this->assertGreaterThan(1, count($response->getStateList()));
        $this->assertSame('a1', $response->getPrefix());
        $this->assertSame('testing', $response->getAppId());
        $this->assertSame('AUD', $response->getCurrencyCode());
    }
}