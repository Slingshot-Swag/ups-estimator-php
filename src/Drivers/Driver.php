<?php

namespace Jamiehoward\UpsEstimator\Drivers;

interface Driver
{
    public function setUrl($url);
    public function getUrl();

    public function setHeaders($headers);
    public function getHeaders();

    public function setBody($body);
    public function getBody();

    public function setMethod($method);
    public function getMethod();

    public function get($url, $headers = []);
    public function post($url, $headers = [], $body = []);
    public function put($url, $headers = [], $body = []);
    public function patch($url, $headers = [], $body = []);
    public function delete($url, $headers = []);

    public function request();
}