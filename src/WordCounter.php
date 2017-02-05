<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 16:18
 */

namespace WordCounter;


class WordCounter
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function countWords(){

        return count(explode(" ",$this->string));
    }


}