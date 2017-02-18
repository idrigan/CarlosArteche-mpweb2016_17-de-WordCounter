<?php

namespace WordCounter;

use WordCounter\Filters;

class WordCounter
{
    private $array_symbols = array(",",".",":");

    public function __construct()
    {
    }

    public function filter( $sentence , Filters\GroupFilters $groupFilters )
    {
        $sentence = $this->lowerCase( $this->removeSymbols($sentence) );
        $filters = $groupFilters->getFilters();
        foreach ($filters as $filter) {
            echo $filter->getText().": ".count($filter->filter($sentence))."\n";
        }
    }

    private function removeSymbols( $sentence )
    {
        return str_replace ( $this->array_symbols, "", $sentence ) ;
    }

    private function lowerCase( $sentence )
    {
        return strtolower( $sentence );
    }

}