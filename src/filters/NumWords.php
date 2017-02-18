<?php

namespace WordCounter\Filters;

use WordCounter\ActionsSetence;
use WordCounter\Filters;

class NumWords implements Filters,ActionsSetence
{

    public function filter($sentence)
    {
        return $this->stringToArray($sentence);
    }

    public function stringToArray($sentence)
    {
       return explode(" ", $sentence);
    }

    public function getText()
    {
        return "Total de palabras";
    }
}