<?php

namespace Jamiehoward\UpsEstimator\Providers;

use Jamiehoward\UpsEstimator\Drivers\CurlDriver;
use Jamiehoward\UpsEstimator\Drivers\Driver;
use Jamiehoward\UpsEstimator\Responses\CountryResponse;

class UPSServiceProvider
{
    // The driver to use for the HTTP requests.
    protected $driver;

    // The URL for the UPS country service
    const BASE_URL = "https://www.ups.com/cac/cacws/cacService/getLabelsandLayout";

    public function __construct(Driver $driver = null)
    {
        if (!is_null($driver)) {
            $this->driver = $driver;
        }
    }

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
        if (is_null($this->driver)) {
            $this->driver = new CurlDriver;
        }

        return $this->driver;
    }

    /**
     * Make a request to the UPS service.
     * 
     * @param string $method The HTTP method to use for the request.
     * @param array $headers The headers to use for the request.
     * @param array $data The data to use for the request.
     * @return CountryResponse The response from the request.
     */
    public function makeRequest(string $method, $headers = [], $body = [])
    {
        $this->driver->setMethod($method);
        $this->driver->setHeaders($headers);
        $this->driver->setBody($body);
        $this->driver->setUrl(self::BASE_URL);

        $response = new CountryResponse($this->driver->request());

        return $response;
    }
}