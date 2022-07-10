<?php

namespace Jamiehoward\UpsEstimator\Responses;

use Jamiehoward\UpsEstimator\Helpers\JSONCleaner;

class CountryResponse
{
    protected $selectedCountry;
    protected $locale;
    protected $addressLabel;
    protected $addressLayout;
    protected $stateList;
    protected $prefix;
    protected $appId;
    protected $currencyCode;

    public function __construct($json = null)
    {
        if (!is_null($json)) {
            $this->setFromJSON($json);
        }
    }

    /**
     * Set the selected country data from the response.
     * 
     * @param string $selectedCountry The selected country from the response.
     * @return CountryResponse
     */
    public function setFromJSON($json)
    {
        $json = json_decode(JSONCleaner::toJson($json),true);

        $this->setSelectedCountry($json['selectedCountry']);
        $this->setLocale($json['locale']);
        $this->setAddressLabel($json['addressLabel']);
        $this->setAddressLayout($json['addressLayout']);
        $this->setStateList($json['stateList']);
        $this->setPrefix($json['prefix']);
        $this->setAppId($json['appId']);
        $this->setCurrencyCode($json['currencyCode']);
    }

    /**
     * Set the selected country.
     * 
     * @return string The selected country.
     */
    public function setSelectedCountry($selectedCountry)
    {
        $this->selectedCountry = $selectedCountry;

        return $this;
    }

    /**
     * Retrieve the selected country.
     * 
     * @return string The selected country.
     */
    public function getSelectedCountry()
    {
        return $this->selectedCountry;
    }

    /**
     * Set the locale.
     * 
     * @return string The locale.
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Retrieve the locale.
     * 
     * @return string The locale.
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set the address label.
     * 
     * @return string The address label.
     */
    public function setAddressLabel($addressLabel)
    {
        $this->addressLabel = $addressLabel;

        return $this;
    }

    /**
     * Retrieve the address label.
     * 
     * @return string The address label.
     */
    public function getAddressLabel()
    {
        return $this->addressLabel;
    }

    /**
     * Set the address layout and cast it to an array.
     * 
     * @return array The address layout.
     */
    public function setAddressLayout($addressLayout)
    {
        switch (gettype($addressLayout)) {
            case 'array':
                $this->addressLayout = $addressLayout;
                break;
            case 'string':
                $json = JSONCleaner::toJson($addressLayout);
                $this->addressLayout = json_decode($json, true);
                break;
            default:
                $this->addressLayout = [];
                break;
        }

        return $this;
    }

    /**
     * Retrieve the address layout.
     * 
     * @return array The address layout.
     */
    public function getAddressLayout()
    {
        return $this->addressLayout;
    }

    /**
     * Set the state list and cast it to an array.
     * 
     * @return array The state list.
     */
    public function setStateList($stateList)
    {
        switch (gettype($stateList)) {
            case 'array':
                $this->stateList = $stateList;
                break;
            case 'string':
                $json = JSONCleaner::toJson($stateList);
                $this->stateList = json_decode($json, true);
                break;
            default:
                $this->stateList = [];
                break;
        }

        return $this;
    }

    /**
     * Retrieve the state list.
     * 
     * @return array The state list.
     */
    public function getStateList()
    {
        return $this->stateList;
    }

    /**
     * Set the prefix. E.g. a1.
     * 
     * @return string The prefix.
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Retrieve the prefix.
     * 
     * @return string The prefix.
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set the app id.
     * 
     * @return string The app id.
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * Retrieve the app id.
     * 
     * @return string The app id.
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Set the currency code.
     * 
     * @return string The currency code. E.g. USD.
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Retrieve the currency code.
     * 
     * @return string The currency code.
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}