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
Palabras clave (6)
palabrejas, gañán, hiper-arquitecto, que, eh.
 * */

abstract class FilterWordCounter
{

    private $array_key_words = ['palabrejas','gañán','hiper-arquitecto','que','eh'];
    private $array_symbols = array(",",".",":");

    public function numWords($string)
    {
        count(explode(" ", $string));
    }

    public function startVowel($string){

        $cont=0;

        foreach ($this->stringToArray($string) as $word){
            if (preg_match("/^[aeiouáéíóúü]/i",$word)){
                    $cont++;
            }
        }

        return $cont;
    }

    public function wordsMoreTwoCharacters($string){

        $cont = 0;

        foreach ($this->stringToArray($string) as $word){
            if (strlen($word)>2){
                $cont++;
            }
        }

        return $cont;
    }

    public function numKeyWords($string){
        $cont =0;

        foreach ($this->stringToArray($string) as $word){
            foreach ($this->array_key_words as $keyWord) {
                if ($word == $keyWord){
                    $cont++;
                }
            }
        }

        return $cont;
    }


    private function lowerCase($text){
        return strtolower($text);
    }


    private function stringToArray($string){
        return   explode(" ",$this->removeSymbols($this->lowerCase($string)));
    }

    private function removeSymbols($string){

        return str_replace($this->array_symbols,"",$string);
    }
}