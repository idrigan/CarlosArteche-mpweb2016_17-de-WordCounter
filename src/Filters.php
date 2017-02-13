<?php

/*

0- Total de palabras
1- Palabras que empiecen por vocal y tengan más de 2 caracteres
2- Total de palabras clave que empiecen por vocal (1)
4- Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0)
Keywors: palabrejas, gañán, hiper-arquitecto, que, eh.
5- Palabras clave y que no empiecen por vocal
6- Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres
 */

namespace WordCounter ;

class Filters implements ActionsFilters
{

    const TOTALWORDS = 0;
    const WORDSSTARTSVOWEL = 1;
    const WORDSMORETWOCHARACTERS = 2;
    const KEYWORDS = 3;
    const WORDSSARTSVOWELANDWORDSMORETWOCHARACTERS = 4;
    const KEYWORDSSTARTSVOWEL = 5;
    const KEYWORDSSTARTSVOWELANDMORETWOCHARACTERS = 6;
    const KEYWORDSANDNOTSTARTSVOWEL = 7;
    const WORDSNOTSTARTSVOWELORWORDSSTARTSVOWELANDMORETWOCHARACTERS = 8;

    const LENGTH_WORD = 2;

    private $array_key_words = ['palabrejas', 'gañán', 'hiper-arquitecto', 'que', 'eh'];
    private $array_symbols = array(",",".",":");


    public function doFilter($type, $setence)
    {

        switch ($type) {
            case self::TOTALWORDS:
                return $this->numWords($setence);
                break;
            case self::WORDSSTARTSVOWEL:
                return $this->startsVowel($setence);
                break;
            case self::WORDSMORETWOCHARACTERS:
                return $this->wordsMoreTwoCharacters($setence);
                break;
            case self::KEYWORDS:
                return $this->numKeyWords($setence);
                break;
            case self::WORDSSARTSVOWELANDWORDSMORETWOCHARACTERS:
                return $this->numKeyWordsStartVowelMoreTwoCharacters();
                break;
            case self::KEYWORDSSTARTSVOWEL:
                return $this->numKeyWordsStartVowel();
                break;
            case self::KEYWORDSSTARTSVOWELANDMORETWOCHARACTERS:
                return $this->numWordsStartsVowelMoreTwoCharacters($setence);
                break;
            case self::KEYWORDSANDNOTSTARTSVOWEL:
                return $this->numKeyWordsNotStartsVowel($setence);
                break;
            case self::WORDSNOTSTARTSVOWELORWORDSSTARTSVOWELANDMORETWOCHARACTERS:
                return ($this->numWords($setence) - $this->startsVowel($setence)) + $this->numWordsStartsVowelMoreTwoCharacters($setence);
                break;
            default:
                break;
        }


    }


    private function numWords($string)
    {
        return count(explode(" ", $string));
    }

    private function startsVowel($string)
    {

        $cont = 0;

        foreach ($this->stringToArray($string) as $word) {
            if ($this->strStartsVowel($word)) {
                $cont++;
            }
        }

        return $cont;
    }

    private function wordsMoreTwoCharacters($string)
    {

        $cont = 0;

        foreach ($this->stringToArray($string) as $word) {
            if ($this->lengthWord($word) > self::LENGTH_WORD) {
                $cont++;
            }
        }

        return $cont;
    }

    private function numWordsStartsVowelMoreTwoCharacters($string)
    {

        $cont = 0;

        foreach ($this->stringToArray($string) as $word) {
            if ($this->strStartsVowel($word) && $this->lengthWord($word) > self::LENGTH_WORD) {
                $cont++;
            }
        }

        return $cont;
    }


    private function numKeyWords($string)
    {
        $cont = 0;

        foreach ($this->stringToArray($string) as $word) {
            foreach ($this->array_key_words as $keyWord) {
                if ($word == $keyWord) {
                    $cont++;
                }
            }
        }

        return $cont;
    }


    private function numKeyWordsStartVowel()
    {

        $cont = 0;

        foreach ($this->array_key_words as $keyWord) {
            if ($this->strStartsVowel($keyWord)) {
                $cont++;
            }
        }

        return $cont;
    }


    private function numKeyWordsStartVowelMoreTwoCharacters()
    {

        $cont = 0;

        foreach ($this->array_key_words as $keyWord) {

            if ($this->strStartsVowel($keyWord) && $this->lengthWord($keyWord) > self::LENGTH_WORD) {
                $cont++;
            }
        }

        return $cont;
    }

    private function numKeyWordsNotStartsVowel($string)
    {
        return $this->numKeyWords($string) - $this->numKeyWordsStartVowel();
    }


    private function lowerCase($text)
    {
        return strtolower($text);
    }


    private function stringToArray($string)
    {
        return explode(" ", $this->removeSymbols($this->lowerCase($string)));
    }

    private function removeSymbols($string)
    {

        return str_replace($this->array_symbols, "", $string);
    }

    private function lengthWord($word)
    {
        return strlen($word);
    }

    private function strStartsVowel($word)
    {
        return preg_match("/^[aeiouáéíóúü]/i", $word);
    }


}