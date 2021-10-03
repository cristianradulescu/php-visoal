<?php

namespace Visoal\Output\Functions;

use Visoal\Algorithms\SortingAlgorithm;
use Visoal\Output\ExecutionPass;

function printArrayLine(array $elements)
{
    echo '  ';
    foreach ($elements as $value) {
        $value = sprintf('[%s]', $value);
        echo ' ' . $value;
    }
    echo PHP_EOL;
}

function printLine(string $text)
{
    echo $text . PHP_EOL;
}

function printAlgorithmExecutionPasses(SortingAlgorithm $algorithm)
{
    $highlightPattern = "\e[32m%s\e[39m";

    foreach ($algorithm->getExecutionPasses() as $executionPassCount => $executionPasses) {
        echo PHP_EOL;
        printLine('Pass ' . $executionPassCount);

        /** @var ExecutionPass $executionPass */
        foreach ($executionPasses as $executionPass) {
            $highlightedIndexes = $executionPass->highlightedIndexes;
            $lineToPrint = [];
            foreach ($executionPass->line as $index => $value) {
                $lineToPrint[] = in_array($index, $highlightedIndexes, true)
                    ? sprintf($highlightPattern, $value)
                    : $value;
            }
            printArrayLine($lineToPrint);
        }
    }
}

function printAlgorithmInput(SortingAlgorithm $algorithm): void
{
    echo PHP_EOL;
    printLine('Input');
    printArrayLine($algorithm->getInput());
}

function printAlgorithmResult(SortingAlgorithm $algorithm): void
{
    echo PHP_EOL;
    printLine(sprintf('Output (%d passes)', $algorithm->getExecutionPassesCount()));
    printArrayLine($algorithm->getResult());
}
