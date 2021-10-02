<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass;

class BubbleSort implements SortingAlgorithm
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

        do {
            $ordered = false;
            $this->executionPassesCount++;
            for ($i = 0; $i < count($this->result); $i++) {
                $currentIndex = $i;
                $nextIndex = $currentIndex + 1;

                // if we reached the end of the array and cannot create a pair, then stop
                if (!isset($this->result[$nextIndex])) {
                    continue;
                }

                $currentValue = $this->result[$currentIndex];
                $nextValue = $this->result[$nextIndex];
                
                if ($currentValue > $nextValue) {
                    // reorder
                    $this->result[$currentIndex] = $nextValue;
                    $this->result[$nextIndex] = $currentValue;
                    $ordered = true;
                }
                $executionPass = new ExecutionPass();
                $executionPass->line = $this->result;
                $executionPass->highlightedIndexes = [$currentIndex, $nextIndex];
                $this->executionPasses[$this->executionPassesCount][] = $executionPass;
            }
        } while ($ordered === true);

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
     * @return array|ExecutionPasses[]
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
