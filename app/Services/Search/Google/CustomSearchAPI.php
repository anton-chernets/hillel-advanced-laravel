<?php


namespace App\Services\Search\Google;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class CustomSearchAPI
{
    public string $searchRequest = '';
    /**
     * @var Client
     */
    protected Client $client;
    protected $app_key;
    protected $auth_key;
    protected $api_uri;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('services.google.api_url')]);
        $this->app_key = config('services.google.app_key');
        $this->auth_key = config('services.google.api_secret_key');
        $this->api_uri = config('services.google.api_uri');
    }

    public function getTotalSearchResults()
    {
        return $this->getResponseSearchInformation()['totalResults'];
    }

    private function getResponseSearchInformation()
    {
        return $this->searchContentsArray()['searchInformation'];
    }

    private function searchContentsArray()
    {
        return json_decode($this->getSearchContents(), true);
    }

    private function getSearchContents(): string
    {
        return $this->getSearchResponse()->getBody()->getContents();
    }

    private function getSearchResponse(): Response
    {
        /** @var Response $response */
        $response = $this->client->get($this->api_uri, [
            'query' => [
                'key' => $this->auth_key,
                'cx' => $this->app_key,
                'q' => $this->searchRequest,
            ]
        ]);

        return $response;
    }
}
