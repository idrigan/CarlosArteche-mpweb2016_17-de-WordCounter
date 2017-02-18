<?php
namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;


class KeyWordsStartsVowel extends KeyWords implements Filters,ShowResult
{

    private $keyWordSetence;
    private $startVowel;
    private $isStartsVowel;

    public function __construct(KeyWordsSetence $keyWord,StartsVowel $startsVowel,$starts = TRUE)
    {
        $this->keyWordSetence = $keyWord;
        $this->startVowel = $startsVowel;
        $this->isStartsVowel = $starts;
    }


    public function filter($sentence)
    {
        $result = array();

        $result = $this->keyWordSetence->filter($sentence);

        $result = $this->startVowel->filter(implode(" ",$result));

        return $result;
    }


    public function getText()
    {
        if ( $this->isStartsVowel )
        {
            return "Palabras clave que empiezen por vocal";

        }else
        {
            return "Palabras clave que no empiezen por vocal";
        }
    }
}