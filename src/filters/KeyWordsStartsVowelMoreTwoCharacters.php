<?php


namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;

class KeyWordsStartsVowelMoreTwoCharacters implements Filters,ShowResult
{
    private $keyWordsStartVowel;
    private $twoCharacters;

    public function __construct(KeyWordsStartsVowel $keyWordsStartsVowel,MoreTwoCharacters $moreTwoCharacters)
    {
        $this->keyWordsStartVowel = $keyWordsStartsVowel;
        $this->twoCharacters = $moreTwoCharacters;
    }


    public function filter($sentence)
    {
        $result = array();
        $result = $this->keyWordsStartVowel->filter($sentence);
        return $this->twoCharacters->filter(implode(" ",$result));
    }

    public function getText()
    {
       return "Palabras clave que empiezen por vocal y tengan mas de dos caracteres";
    }
}