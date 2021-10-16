<?php

require_once __DIR__.'/vendor/autoload.php';

use Visoal\Algorithms\MergeSort;

use function \Visoal\Output\Functions\{printAlgorithmExecutionPasses, printAlgorithmInput, printAlgorithmResult};

$input = explode(',', $argv[1]);
$input = array_map(function($element) { return (int) $element; }, $input);
$unorderedInput = $input;

$algorithm = new MergeSort($input);
$orderedOutput = $algorithm->execute()->getResult();

printAlgorithmExecutionPasses($algorithm);
printAlgorithmInput($algorithm);
printAlgorithmResult($algorithm);
