<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

interface SortingAlgorithm 
{
    public function execute(): self;
    public function getInput(): array;
    public function getResult(): array;
}
