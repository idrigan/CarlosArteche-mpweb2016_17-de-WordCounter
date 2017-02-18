<?php

namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;


class KeyWordsSetence  extends KeyWords implements Filters,ActionsSetence,ShowResult
{


    public function filter($sentence)
    {
        $result = array();
        foreach ($this->stringToArray($sentence) as $word) {
            foreach ($this->array_key_words as $keyWord) {
                if ($word == $keyWord) {
                    $result[] = $word;
                }
            }
        }
        return $result;
    }


    public function stringToArray($sentence)
    {
        return explode(" ", $sentence);
    }


    public function getText()
    {
        return "Palabras clave";
    }
}