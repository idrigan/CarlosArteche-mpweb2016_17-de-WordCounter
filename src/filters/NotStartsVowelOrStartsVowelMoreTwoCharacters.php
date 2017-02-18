<?php


namespace WordCounter\Filters;


use WordCounter\ActionsSetence;
use WordCounter\Filters;
use WordCounter\ShowResult;

class NotStartsVowelOrStartsVowelMoreTwoCharacters implements Filters,ShowResult
{
    private $starsVowel;
    private $startsVowelTwoCharacters;


    public function __construct(StartsVowel $startsVowel,StartsVowelTwoCharacters $startsVowelTwoCharacters)
    {
        $this->starsVowel = $startsVowel;
        $this->startsVowelTwoCharacters = $startsVowelTwoCharacters;
    }

    public function filter($sentence)
    {
        $result = array();
        $result = $this->starsVowel->filter($sentence);
        $result = array_merge($result,$this->startsVowelTwoCharacters->filter($sentence));
        return $result;
    }

    public function getText()
    {
        return "Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres";
    }
}