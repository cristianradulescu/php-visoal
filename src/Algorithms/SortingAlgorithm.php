<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass\ExecutionPass;

interface SortingAlgorithm 
{
    public function execute(): self;
    public function getInput(): array;
    public function getResult(): array;
    /**
     * @return array|ExecutionPass[]
     */
    public function getExecutionPasses(): array;
    public function getExecutionPassesCount(): int;
}
