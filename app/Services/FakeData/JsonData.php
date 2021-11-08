<?php


namespace App\Services\FakeData;


use App\Services\DataOperation\DataConverter;
use App\Services\Files\FileHandler;
use GuzzleHttp\Client;

class JsonData
{
    /**
     * @var Client
     */
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function writeSearchInformationToXMLFile(): bool
    {
        $response = $this->sendRequest();

        $dataXML = (new DataConverter())->jsonToXML(
            $this->getResponseContents($response)
        );

        return (new FileHandler)->writingToFile($dataXML);
    }

    /**
     * @param $json
     * @return string
     */
    public function getResponseContents($json): string
    {
        return $json->getBody()->getContents();
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendRequest(): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->get(config('services.fake_json.api_url'));
    }
}
