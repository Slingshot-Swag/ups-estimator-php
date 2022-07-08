<?php

namespace Jamiehoward\UpsEstimator\Providers;

use Jamiehoward\UpsEstimator\Drivers\Driver;

class UPSServiceProvider
{
    // The driver to use for the HTTP requests.
    protected $driver;

    // The URL for the UPS country service
    const BASE_URL = "https://www.ups.com/cac/cacws/cacService/getLabelsandLayout";

    /**
     * Set the driver to use for the HTTP request.
     * 
     * @param Driver $driver The driver to use for the request.
     * @return UPSServiceProvider
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
}