<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 5/02/17
 * Time: 16:20
 */

error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/vendor/autoload.php';

use WordCounter\WordCounter;

$string = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";

$wordcounter = new WordCounter($string);

echo "Total words: " . $wordcounter->countWords() . "\n";