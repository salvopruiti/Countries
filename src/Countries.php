<?php

namespace SalvatorePruiti;

use GuzzleHttp\Client;

class Countries
{
    private $endpoint = "https://restcountries.eu/rest/v2";

    private $client;
    private $default_options = [
        'verify' => false
    ];

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Search by ISO 3166-1 2-letter or 3-letter country code
     *
     * @param string $code
     * @return array
     */
    public function code(string $code)
    {
        $url = $this->endpoint."/alpha/" . $code;

        $response = $this->request($url);

        return $response;
    }

    /**
     * Search by ISO 4217 currency code
     *
     * @param string $currencyCode
     * @return array
     */
    public function currency(string $currencyCode)
    {
        $url = $this->endpoint."/currency/" . $currencyCode;

        $response = $this->request($url);

        return $response;
    }

    /**
     * Search by ISO 639-1 language code.
     *
     * @param string $code
     * @return array
     */
    public function language(string $code)
    {
        $url = $this->endpoint."/lang/" . $code;

        $response = $this->request($url);

        return $response;
    }


    private function request($url, $options = [])
    {
        try {
            $response = $this->client->get($url, array_merge($this->default_options, $options));

            $json_encoded_body = $response->getBody()->getContents();

            return json_decode($json_encoded_body, true);

        } catch (\Throwable $e) {

        }
    }
}