<?php

namespace WordCounter;

use WordCounter\Filters;

class WordCounter implements ActionsFilters
{
    private $string;
    private $filter;

    public function __construct($string)
    {
        $this->string = $string;
        $this->filter = new Filters();

    }

    public function doFilter($type)
    {
        return $this->filter->doFilter($type,$this->string);
    }
}