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
    protected $appKey;
    protected $authKey;
    protected $apiUri;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('services.google.api_url')]);
        $this->appKey = config('services.google.app_key');
        $this->authKey = config('services.google.api_secret_key');
        $this->apiUri = config('services.google.api_uri');
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
        $response = $this->client->get($this->apiUri, [
            'query' => [
                'key' => $this->authKey,
                'cx' => $this->appKey,
                'q' => $this->searchRequest,
            ]
        ]);

        return $response;
    }
}
