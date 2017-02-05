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
    private $array_key_words = ['palabrejas','gañán','hiper-arquitecto','que','eh'];
    private $filterWordCounter;
    private $filterKeyWordsCounter;

    public function __construct($string)
    {
        $this->string = $string;
        $this->filterWordCounter = new FilterWordCounter();
        $this->filterKeyWordsCounter = new FilterKeyWordsCounter($this->array_key_words);
    }

    public function countWords(){

        return $this->filterWordCounter->numWords($this->string);
    }

    public function countStartVowel(){
        return $this->filterWordCounter->startVowel($this->string);
    }

    public function countWordsMoreTwoCharacters(){
        return $this->filterWordCounter->wordsMoreTwoCharacters($this->string);
    }

    public function countKeyWords(){
        return $this->filterKeyWordsCounter->numKeyWords($this->string);
    }

    public function countWordsStartVowelMoreTwoCharacters(){
        return $this->filterWordCounter->numWordsStartVowelMoreTwoCharacters($this->string);
    }

    public function countKeyWordsStartVowel(){
        return $this->filterKeyWordsCounter->numKeyWordsStartVowel();
    }

    public function countKeyWordsStartVowelMoreTwoCharacters(){
        return $this->filterKeyWordsCounter->numKeyWordsStartVowelMoreTwoCharacters();
    }

    public function  countKeyWordsNotStartVowel(){
        return $this->filterKeyWordsCounter->numKeyWordsNotStartVowel($this->string);
    }

    public function  countKeyWordsNotStartVowelOrStartVowelMoreTwoCharacters(){
       return $this->filterKeyWordsCounter->numKeyWordsNotStartVowel($this->string) + $this->filterWordCounter->numWordsStartVowelMoreTwoCharacters($this->string);
    }
}