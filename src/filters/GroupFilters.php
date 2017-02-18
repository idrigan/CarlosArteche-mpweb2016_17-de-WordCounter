<?php

namespace WordCounter\Filters;

class GroupFilters{

    private $groupFilters;

    public function __construct($filters)
    {
        $this->groupFilters = $filters;
    }

    public function getFilters(){
        return $this->groupFilters;
    }

}