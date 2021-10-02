<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass;

abstract class SortingAlgorithm 
{
    protected $input = [];
    protected $result = [];
    /** @var ExecutionPass[] */
    protected $executionPasses = [];
    protected $executionPassesCount = 0;

    public function __construct(array $input)
    {
        $this->input = $input;
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

    /**
     * @return array|ExecutionPass[]
     */
    public function getExecutionPasses(): array
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

    public function storeExecutionPass(array $highlightedIndexes = []): void
    {
        $executionPass = new ExecutionPass();
        $executionPass->line = $this->result;
        $executionPass->highlightedIndexes = $highlightedIndexes;
        $this->executionPasses[$this->executionPassesCount][] = $executionPass;
    }
}
