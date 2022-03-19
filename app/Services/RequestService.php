<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RequestService 
{

    /** @var $endpoint */
    protected $endpoint;

    /** @var $return_type */
    protected $return_type;
    
    /**
     * Returns the current instance endpoint to do a request.
     * 
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint ?? null;
    }

    /**
     * Performs a GET request using the endpoint and return an Array (json serialized).
     * 
     * @param string $path
     * @param array $params
     * @param array $headers
     * 
     * @return array|collection
     */
    public function get(string $path, array $params = [], $headers = []): array|collection
    {
        return $this->request('GET', $path, $params, $headers);
    }

    /**
     * Performs a POST request using the endpoint and return an Array (json serialized).
     * 
     * @param string $path
     * @param array $params
     * @param array $headers
     * 
     * @return array|collection
     */
    public function post(string $path, array $params = [], array $headers = []): array|collection
    {
        return $this->request('POST', $path, $params, $headers);
    }

    /**
     * Performs a request.
     * 
     * @param string $method
     * @param string $path
     * @param array $params
     * 
     * @return array|collection
     */
    public function request(string $method, string $path, array $params) : array|collection
    {
        info($method . ': ' . $this->getEndpoint() . $path);
        $url = $this->endpoint . $path;
        $request = Http::$method($url, $params);

        return $this->shouldReturnCollection() ? collect($request->json()):$request->json();
    }

    /**
     * Verifies if the class wants a return as a collection instead of JSON (array) serialized.
     * 
     * @return bool
     */
    public function shouldReturnCollection() : bool
    {
        return $this->return_type == 'collection';
    }
}