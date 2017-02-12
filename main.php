<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/vendor/autoload.php';

use WordCounter\WordCounter;
use WordCounter\Filters;

$string = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$wordcounter = new WordCounter($string);

echo "ENTREGA 1" ."\n\n";

echo "Total de palabras: " . $wordcounter->doFilter(Filters::TOTALWORDS) . "\n";

echo "\n\n"."ENTREGA 2" ."\n\n";

echo "Total de palabras que empiecen por vocal: " . $wordcounter->doFilter(Filters::WORDSSTARTSVOWEL) . "\n";
echo "Total de palabras de más de dos caracteres: " . $wordcounter->doFilter(Filters::WORDSMORETWOCHARACTERS) . "\n";
echo "Total de palabras clave: " . $wordcounter->doFilter(Filters::KEYWORDS) . "\n";

echo "\n\n"."ENTREGA 3" ."\n\n";

echo "Total de palabras que empiecen por vocal y tengan más de 2 caracteres: ". $wordcounter->doFilter(Filters::WORDSSARTSVOWELANDWORDSMORETWOCHARACTERS) . "\n";
echo "Total de palabras que empiecen por vocal: ". $wordcounter->doFilter(Filters::KEYWORDSSTARTSVOWEL) . "\n";
echo "Total de palabras clave, que empiecen por vocal y tengan más de dos carácteres: " . $wordcounter->doFilter(Filters::KEYWORDSSTARTSVOWELANDMORETWOCHARACTERS) . "\n";

echo "\n\n" .  "ENTREGA 4" . "\n\n";

echo "Total de palabras clave y que no empiecen por vocal: ". $wordcounter->doFilter(Filters::KEYWORDSANDNOTSTARTSVOWEL) ."\n";
echo "Total de palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres: ". $wordcounter->doFilter(Filters::WORDSNOTSTARTSVOWELORWORDSSTARTSVOWELANDMORETWOCHARACTERS) ."\n";