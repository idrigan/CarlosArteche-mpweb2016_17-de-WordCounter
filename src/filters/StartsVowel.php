<?php


namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;

class StartsVowel implements Filters, ActionsSetence,ShowResult
{

    private $startsVowel;

    public function __construct($starts = TRUE)
    {
        $this->startsVowel = $starts;
    }

    public function filter($sentence)
    {
        if ($this->startsVowel) {
            return $this->startsVowel($sentence);
        } else {
            return $this->NotStartsVowel($sentence);
        }
    }


    private function startsVowel($sentence)
    {
        $result = array();
        foreach ($this->stringToArray($sentence) as $word) {
            if ($this->stringStartsVowel($word)) {
                $result[] = $word;
            }
        }
        return $result;
    }


    private function NotStartsVowel($sentence)
    {
        $result = array();
        foreach ($this->stringToArray($sentence) as $word) {
            if (!$this->stringStartsVowel($word)) {
                $result[] = $word;
            }
        }
        return $result;
    }

    private function stringStartsVowel($word)
    {
        return preg_match("/^[aeiouáéíóúü]/i", $word);
    }

    public function stringToArray($sentence)
    {
        return explode(" ", $sentence);
    }


    public function getText()
    {
        if ($this->startsVowel){
            return "Palabras que empiezan por vocal";
        }else{
            return "Palabras que no empiezan por vocal";
        }

    }

}