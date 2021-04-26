<?php


namespace App\Services\Search\Google;


class GoogleAPI
{
    protected CustomSearchAPI $searchSystem;

    public function __construct(
        CustomSearchAPI $searchSystem
    ) {
        $this->searchSystem = $searchSystem;
    }

    public function operation(): string
    {
        $result = 'Facade initializes subsystems with result:'. PHP_EOL;
        $result .= 'search total=' . $this->searchSystem->getTotalSearchResults();

        return $result;
    }
}
