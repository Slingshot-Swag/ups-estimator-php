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

    public function setSelectedCountry($selectedCountry)
    {
        $this->selectedCountry = $selectedCountry;

        return $this;
    }

    public function getSelectedCountry()
    {
        return $this->selectedCountry;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setAddressLabel($addressLabel)
    {
        $this->addressLabel = $addressLabel;

        return $this;
    }

    public function getAddressLabel()
    {
        return $this->addressLabel;
    }

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

    public function getAddressLayout()
    {
        return $this->addressLayout;
    }

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

    public function getStateList()
    {
        return $this->stateList;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setAppId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}