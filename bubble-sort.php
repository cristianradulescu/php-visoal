<?php

require_once __DIR__.'/vendor/autoload.php';

use Visoal\Algorithms\BubbleSort;
use function \Visoal\Output\Functions\{printAlgorithmExecutionPasses, printAlgorithmInput, printAlgorithmResult};

$input = explode(',', $argv[1]);
$input = array_map(function($element) { return (int) $element; }, $input);
$unorderedInput = $input;

$algorithm = new BubbleSort($input);
$orderedOutput = $algorithm->execute()->getResult();

printAlgorithmExecutionPasses($algorithm);
printAlgorithmInput($algorithm);
printAlgorithmResult($algorithm);
