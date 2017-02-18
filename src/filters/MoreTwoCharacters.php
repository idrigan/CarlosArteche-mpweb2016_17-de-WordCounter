<?php


namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;

class MoreTwoCharacters implements Filters, ActionsSetence,ShowResult
{

    const LENGTH_WORD = 2;

    public function filter($sentence)
    {
        $result = array();
        foreach ($this->stringToArray($sentence) as $word) {
            if ($this->lengthWord($word) > self::LENGTH_WORD) {
                $result[] = $word;
            }
        }
        return $result;
    }

    public function stringToArray($sentence)
    {
        return explode(" ", $sentence);
    }

    public function lengthWord($word)
    {
        return strlen($word);
    }

    public function getText()
    {
        return "Palabras que tengan más de dos carácteres";
    }
}