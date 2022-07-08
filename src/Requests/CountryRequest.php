<?php

namespace Jamiehoward\UpsEstimator\Requests;

use Jamiehoward\UpsEstimator\Providers\UPSServiceProvider;

class CountryRequest
{
    protected $locale;
    protected $provider;
    protected $countryCode;

    const DEFAULT_LOCALE = 'en_US';

    public function __construct($countryCode = null)
    {
        $this->locale = self::DEFAULT_LOCALE;
        $this->countryCode = $countryCode;
    }

    /**
     * Set the provider to use for the request.
     * 
     * @param UPSServiceProvider $provider The provider to use for the request.
     * @return CountryRequest
     */
    public function setProvider(UPSServiceProvider $provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Retrieve the provider used for the request.
     * 
     * @return UPSServiceProvider The provider used for the request.
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set the locale to use for the request.
     * 
     * @param string $locale The locale to use for the request.
     * @return CountryRequest
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Retrieve the locale used for the request.
     * 
     * @return string The locale used for the request.
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set the country code to use for the request.
     * 
     * @param string $countryCode The country code to use for the request.
     * @return CountryRequest
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Retrieve the country code used for the request.
     * 
     * @return string The country code used for the request.
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
}