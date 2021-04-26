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
        $result = "Facade initializes subsystems with result search total:\n";
        $result .= $this->searchSystem->getTotalSearchResults();

        return $result;
    }
}
