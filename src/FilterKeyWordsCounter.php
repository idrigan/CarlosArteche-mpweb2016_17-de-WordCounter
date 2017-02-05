<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 19:12
 */

namespace WordCounter;
/*

Palabras clave (6)
Contar solo palabras clave que empiecen por vocal (1)
Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0)
Keywors: palabrejas, gañán, hiper-arquitecto, que, eh.

Solo palabras clave y que no empiecen por vocal (5)
Solo palabras clave que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres (27)
 */

class FilterKeyWordsCounter extends OperationsWordCounter
{
    private $keyWords;

    public function __construct($keyWords)
    {
        $this->keyWords = $keyWords;
    }

    public function numKeyWords($string){
        $cont =0;

        foreach ($this->stringToArray($string) as $word){
            foreach ($this->keyWords as $keyWord) {
                if ($word == $keyWord){
                    $cont++;
                }
            }
        }

        return $cont;
    }


    public function numKeyWordsStartVowel(){

        $cont = 0;

        foreach ($this->keyWords as $keyWord){
            if ($this->strStartVowel($keyWord)){
                $cont++;
            }
        }

        return $cont;
    }


    public function numKeyWordsStartVowelMoreTwoCharacters(){

        $cont = 0;

        foreach ($this->keyWords as $keyWord){

            if ($this->strStartVowel($keyWord) && $this->lengthWord($keyWord) > FilterWordCounter::LENGTH_WORD){
                $cont++;
            }
        }

        return $cont;
    }

    public function numKeyWordsNotStartVowel($string){
        return $this->numKeyWords($string)-$this->numKeyWordsStartVowel();
    }


}