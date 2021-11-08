<?php


namespace App\Console\Commands;


use App\Helpers\StringHelper;
use App\Services\FakeData\JsonData;
use Illuminate\Console\Command;

class JsonToXMLWriteFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'write:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write XML data from Json to file';

    /**
     * Execute the console command.
     *
     * @param JsonData $jsonData
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(JsonData $jsonData): void
    {
        $result = StringHelper::lineBreak('Write result API XML:');
        $result .= $jsonData->writeSearchInformationToXMLFile() ? 'success' : 'error';

        $this->info($result);
    }
}
