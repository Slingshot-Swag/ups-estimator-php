<?php

namespace Jamiehoward\UpsEstimator\Requests;

use Jamiehoward\UpsEstimator\Drivers\Driver;

class CountryRequest
{
    protected $driver;
    protected $locale;

    const DEFAULT_LOCALE = 'en_US';

    /**
     * Set the driver to use for the HTTP request.
     * 
     * @param Driver $driver The driver to use for the request.
     * @return CountryRequest
     */
    public function setDriver(Driver $driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Retrieve the driver used for the HTTP request.
     * 
     * @return Driver The driver used for the request.
     */
    public function getDriver()
    {
        return $this->driver;
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
        if (empty($this->locale)) {
            $this->setLocale(self::DEFAULT_LOCALE);
        }

        return $this->locale;
    }
}