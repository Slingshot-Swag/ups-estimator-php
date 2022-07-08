<?php

namespace Tests\Unit;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Models\Country;

final class CountryTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Models\Country'));
    }

    public function test_can_set_and_retrieve_country_code()
    {
        $country = new Country();
        $country->setCountryCode('US');
        $this->assertEquals('US', $country->getCountryCode());
    }

    public function test_can_set_and_retrieve_states()
    {
        $country = new Country();
        $country->setStates(['CA', 'US']);
        $this->assertEquals(['CA', 'US'], $country->getStates());
    }

    public function test_can_set_and_retrieve_field_labels()
    {
        $country = new Country();
        
        $fieldLabels = [
            'city' => 'Locality',
            'state' => 'Province',
            'postalCode' => 'Postal Code',
        ];

        $country->setFieldLabels($fieldLabels);
        $this->assertEquals($fieldLabels, $country->getFieldLabels());
    }
}
