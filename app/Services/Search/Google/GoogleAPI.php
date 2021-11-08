<?php


namespace App\Services\Search\Google;


use App\Helpers\StringHelper;

class GoogleAPI
{
    protected CustomSearchAPI $searchSystem;

    public function __construct(
        CustomSearchAPI $searchSystem = null
    ) {
        $this->searchSystem = $searchSystem ?: new CustomSearchAPI();
    }

    /**
     * @param string $searchRequest
     * @return string
     */
    public function operation(string $searchRequest): string
    {
        $this->searchSystem->searchRequest = $searchRequest;
        $result = StringHelper::lineBreak('Facade initializes subsystems with result:');
        $result .= 'search total=' . $this->searchSystem->getTotalSearchResults();

        return $result;
    }
}
