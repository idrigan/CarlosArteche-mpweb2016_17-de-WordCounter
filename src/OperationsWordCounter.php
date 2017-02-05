<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 19:16
 */

namespace WordCounter;


abstract class OperationsWordCounter
{
    private $array_symbols = array(",",".",":");


    protected function lowerCase($text){
        return strtolower($text);
    }


    protected function stringToArray($string){
        return   explode(" ",$this->removeSymbols($this->lowerCase($string)));
    }

    protected function removeSymbols($string){

        return str_replace($this->array_symbols,"",$string);
    }

    protected function lengthWord($word){
        return strlen($word);
    }

    protected function strStartVowel($word){
        return  preg_match("/^[aeiouáéíóúü]/i",$word);
    }
}