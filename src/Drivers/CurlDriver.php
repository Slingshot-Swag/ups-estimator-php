<?php

namespace Jamiehoward\UpsEstimator\Drivers;

class CurlDriver implements Driver
{
    protected $url;
    protected $headers;
    protected $body;
    protected $method;
    
    public function setUrl($url)
    {
        $this->url = $url;
        
        return $this;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        
        return $this;
    }
    
    public function getHeaders()
    {
        return $this->headers;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
        
        return $this;
    }
    
    public function getBody()
    {
        return $this->body;
    }
    
    public function setMethod($method)
    {
        if (!in_array($method, ['GET', 'POST', 'PATCH', 'PUT', 'DELETE'])) {
            throw new \InvalidArgumentException("Invalid request method.", 1);
        }

        $this->method = $method;
        
        return $this;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function get($url, $headers = [])
    {
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setMethod('GET');
        
        return $this->request();
    }
    
    public function post($url, $headers = [], $body = [])
    {
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setBody($body);
        $this->setMethod('POST');
        
        return $this->request();
    }
    
    public function put($url, $headers = [], $body = [])
    {
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setBody($body);
        $this->setMethod('PUT');
        
        return $this->request();
    }
    
    public function patch($url, $headers = [], $body = [])
    {
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setBody($body);
        $this->setMethod('PUT');

        return $this->request();
    }

    public function delete($url, $headers = [])
    {
        $this->setUrl($url);
        $this->setHeaders($headers);
        $this->setMethod('DELETE');
        
        return $this->request();
    }

    public function request()
    {
        $curl = curl_init($this->getUrl());

        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->getMethod());
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getBody());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
    }
}