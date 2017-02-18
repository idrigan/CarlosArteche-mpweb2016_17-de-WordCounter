<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/vendor/autoload.php';

use WordCounter\WordCounter;
use WordCounter\Filters;

$string = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";


$wordcounter = new WordCounter();

echo "ENTREGA WORDCOUNTER" . "\n\n";

$numWords = new Filters\NumWords();
$startsVowel = new Filters\StartsVowel();
$keyWordsSetence = new Filters\KeyWordsSetence();
$moreTwoCharactes = new Filters\MoreTwoCharacters();
$notStartVowel = new Filters\StartsVowel (false);
$starsVowelTwoCharacters = new Filters\StartsVowelTwoCharacters($startsVowel, $moreTwoCharactes);
$keyWordsStartVowel = new Filters\KeyWordsStartsVowel($keyWordsSetence, $startsVowel);
$keyWordsStartVowelMoreTwoCharacters = new Filters\KeyWordsStartsVowelMoreTwoCharacters( $keyWordsStartVowel, $moreTwoCharactes);
$keyWordsNotStartVowel = new Filters\KeyWordsStartsVowel ($keyWordsSetence, $notStartVowel,false);
$notStartVowelOrStartVowelMoreTwoCharacters = new Filters\NotStartsVowelOrStartsVowelMoreTwoCharacters($notStartVowel, $starsVowelTwoCharacters);

$groupFilters = new Filters\GroupFilters( array ( $numWords, $startsVowel, $moreTwoCharactes, $keyWordsSetence, $starsVowelTwoCharacters, $keyWordsStartVowel,
    $keyWordsStartVowelMoreTwoCharacters, $keyWordsNotStartVowel, $notStartVowelOrStartVowelMoreTwoCharacters ) );



$wordcounter->filter($string, $groupFilters);
