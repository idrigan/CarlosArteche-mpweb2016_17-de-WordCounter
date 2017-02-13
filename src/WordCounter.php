<?php

namespace WordCounter;

use WordCounter\Filters;

class WordCounter
{
    private $string;
    private $interfaceFilter;

    public function __construct($string,ActionsFilters $filter)
    {
        $this->string = $string;
        $this->interfaceFilter = $filter;

    }

    public function doFilter($type)
    {
        return $this->interfaceFilter->doFilter($type,$this->string);
    }
}