<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass;

abstract class SortingAlgorithm
{
    protected array $result = [];
    /** @var ExecutionPass[]|array */
    protected array $executionPasses = [];
    protected int $executionPassesCount = 0;

    public function __construct(protected array $input)
    {

    }

    abstract public function execute(): self;

    public function getInput(): array
    {
        return $this->input;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function getExecutionPasses(): array|ExecutionPass
    {
        return $this->executionPasses;
    }

    public function getExecutionPassesCount(): int
    {
        return $this->executionPassesCount;
    }

    public function increaseExecutionPassesCount(): void
    {
        $this->executionPassesCount++;
    }

    public function storeExecutionPass(array $highlightedIndexes = []): ExecutionPass
    {
        $executionPass = new ExecutionPass();
        $executionPass->line = $this->result;
        $executionPass->highlightedIndexes = $highlightedIndexes;
        $this->executionPasses[$this->executionPassesCount][] = $executionPass;

        return $executionPass;
    }
}
