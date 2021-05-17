<?php

namespace Tests\Unit;

use App\Services\DataOperation\DataConverter;
use PHPUnit\Framework\TestCase;

class DataConverterTest extends TestCase
{
    public const TEST_JSON = '{ "id": "1001", "type": "Regular" }';

    /**
     * @var DataConverter
     */
    protected DataConverter $dataConverter;

    public function __construct()
    {
        parent::__construct();
        $this->dataConverter = new DataConverter();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_json_to_XML_converter(): void
    {
        $expectedXML = $this->dataConverter->jsonToXML(self::TEST_JSON);
        $object = simplexml_load_string($expectedXML);
        $this->assertNotFalse($object);
        $this->assertInstanceOf( \SimpleXMLElement::class, $object);
    }
}
