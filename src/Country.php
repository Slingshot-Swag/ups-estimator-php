<?php

namespace Jamiehoward\UpsEstimatorPhp;

class Country
{
    // The country code.
    protected $countryCode;

    // The states/provinces in the country.
    protected $states = [];

    // The field labels.
    protected $fieldLabels = [];

    /**
     * @param string $countryCode   The alpha2 country code, e.g. 'US'
     * 
     * @return Jamiehoward\UpsEstimatorPhp\Country
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string  The alpha2 country code, e.g. 'US'
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param array $states   An array of state codes, e.g. ['CA', 'US']
     * 
     * @return Jamiehoward\UpsEstimatorPhp\Country
     */
    public function setStates($states = [])
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return array  An array of state codes, e.g. ['CA', 'US']
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param array $fieldLabels   An array of field labels, e.g. ['city' => 'Locality', 'state' => 'Province', 'postalCode' => 'Postal Code']
     * 
     * @return Jamiehoward\UpsEstimatorPhp\Country
     */
    public function setFieldLabels($fieldLabels = [])
    {
        $this->fieldLabels = $fieldLabels;

        return $this;
    }

    /**
     * @return array  An array of field labels, e.g. ['city' => 'Locality', 'state' => 'Province', 'postalCode' => 'Postal Code']
     */
    public function getFieldLabels()
    {
        return $this->fieldLabels;
    }
}