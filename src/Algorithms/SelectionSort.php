<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass;

class SelectionSort implements SortingAlgorithm, AlgorithmDebuggable
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

    public function execute(): self
    {
        $this->result = $this->input;

        for ($index = 0; $index < count($this->result); $index++) {
            $min = $this->result[$index];
            $minPosition = $index;
            $this->executionPassesCount++;
            for ($searchIndex = $index + 1; $searchIndex < count($this->result); $searchIndex++) {
                if ($min > $this->result[$searchIndex]) {
                    $min = $this->result[$searchIndex];
                    $minPosition = $searchIndex;
                }
            }

            // move min on current position and current value on min's position
            $currentValue = $this->result[$index];
            $this->result[$index] = $min;
            $this->result[$minPosition] = $currentValue;

            $executionPass = new ExecutionPass();
            $executionPass->line = $this->result;
            $executionPass->highlightedIndexes = [$index];
            $this->executionPasses[$this->executionPassesCount][] = $executionPass;
        }

        return $this;
    }

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
}