<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 17:42
 */

namespace WordCounter;

/*
 * Los filtros serán (entre paréntesis la solución):

Palabras que empiecen por vocal (5)
Palabras de más de dos caracteres (18)
Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1)

    */




class FilterWordCounter extends OperationsWordCounter
{

    const LENGTH_WORD = 2;

    public function __construct()
    {
    }

    public function numWords($string)
    {
        return count(explode(" ", $string));
    }

    public function startVowel($string){

        $cont=0;

        foreach ($this->stringToArray($string) as $word){
            if ($this->strStartVowel($word)){
                    $cont++;
            }
        }

        return $cont;
    }

    public function wordsMoreTwoCharacters($string){

        $cont = 0;

        foreach ($this->stringToArray($string) as $word){
            if ($this->lengthWord($word) > FilterWordCounter::LENGTH_WORD){
                $cont++;
            }
        }

        return $cont;
    }

    public function numWordsStartVowelMoreTwoCharacters($string){

        $cont =0;

        foreach ($this->stringToArray($string) as $word){
            if ($this->strStartVowel($word) && $this->lengthWord($word) > FilterWordCounter::LENGTH_WORD){
                $cont ++;
            }
        }

        return $cont;
    }



}