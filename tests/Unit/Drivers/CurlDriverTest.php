<?php

namespace Tests\Unit\Drivers;

use Tests\TestCase;
use Jamiehoward\UpsEstimator\Drivers\CurlDriver;

final class CurlDriverTest extends TestCase
{
    public function test_class_exists()
    {
        $this->assertTrue(class_exists('\Jamiehoward\UpsEstimator\Drivers\CurlDriver'));
    }

    public function test_can_set_and_retrieve_url()
    {
        $curlDriver = new CurlDriver;
        $curlDriver->setUrl('http://example.com');
        $this->assertEquals('http://example.com', $curlDriver->getUrl());
    }

    public function test_can_set_and_retrieve_headers()
    {
        $curlDriver = new CurlDriver;
        $curlDriver->setHeaders(['Accept: application/json']);
        $this->assertEquals(['Accept: application/json'], $curlDriver->getHeaders());
    }

    public function test_can_set_and_retrieve_body()
    {
        $curlDriver = new CurlDriver;
        $curlDriver->setBody(['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], $curlDriver->getBody());
    }

    public function test_can_set_and_retrieve_method()
    {
        $curlDriver = new CurlDriver;
        $curlDriver->setMethod('GET');
        $this->assertEquals('GET', $curlDriver->getMethod());
    }

    public function test_shortcut_methods_exist()
    {
        $requestMethods = ['get', 'post', 'put', 'patch', 'delete'];

        foreach ($requestMethods as $method) {
            $this->assertTrue(method_exists(CurlDriver::class, $method));
        }
    }
}
