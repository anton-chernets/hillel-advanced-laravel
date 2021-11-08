<?php


namespace App\Services\DataOperation;

use SimpleXMLElement;

/**
 * Class DataModification
 * @package App\Services\DataOperation
 */
class DataConverter
{
    /**
     * @param string $json
     * @return string
     */
    public function jsonToXML(string $json): string
    {
        return $this->arrayToXML($this->jsonToArray($json));
    }

    /**
     * @param string $json
     * @return array
     */
    public function jsonToArray(string $json): array
    {
        return json_decode($json, true);
    }

    /**
     * @param array $array
     * @return string
     */
    private function arrayToXML(array $array): string
    {
        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($array, array ($xml, 'addChild'));
        return $xml->asXML();
    }
}
