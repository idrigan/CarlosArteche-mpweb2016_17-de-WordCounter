<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 16:18
 */

namespace WordCounter;

class WordCounter extends FilterWordCounter
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function countWords(){

        return parent::numWords($this->string);
    }

    public function countStartVowel(){
        return parent::startVowel($this->string);
    }

    public function countWordsMoreTwoCharacters(){
        return parent::wordsMoreTwoCharacters($this->string);
    }

    public function countKeyWords(){
        return parent::numKeyWords($this->string);
    }


}