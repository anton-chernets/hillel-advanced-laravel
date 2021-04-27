<?php


namespace App\Services\Search\Google;


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
        $result = 'Facade initializes subsystems with result:'. PHP_EOL;
        $result .= 'search total=' . $this->searchSystem->getTotalSearchResults();

        return $result;
    }
}
