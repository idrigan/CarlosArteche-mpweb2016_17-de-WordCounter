<?php


namespace WordCounter\Filters;


use WordCounter\Filters;
use WordCounter\ShowResult;

class StartsVowelTwoCharacters implements Filters,ShowResult
{
    private $startsVowel;
    private $moreTwoCharacters;

    public function __construct(StartsVowel $startsVowel,MoreTwoCharacters $moreTwoCharacters){
        $this->startsVowel = $startsVowel;
        $this->moreTwoCharacters = $moreTwoCharacters;
    }


    public function filter($sentence)
    {
        $result = array();
        $result[]  =  array_merge( $this->startsVowel->filter($sentence) , $this->moreTwoCharacters->filter($sentence) );
        return $result;
    }

    public function getText()
    {
        return "Palabras que empiezan por vocal y tienen mas de dos carácteres";
    }
}