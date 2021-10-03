<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

class SelectionSort extends SortingAlgorithm
{
    public function execute(): self
    {
        $this->result = $this->input;

        $nbOfElements = count($this->result);
        for ($index = 0; $index < $nbOfElements; $index++) {
            $this->increaseExecutionPassesCount();

            $min = $this->result[$index];
            $minPosition = $index;
            for ($searchIndex = $index + 1; $searchIndex < $nbOfElements; $searchIndex++) {
                if ($min > $this->result[$searchIndex]) {
                    $min = $this->result[$searchIndex];
                    $minPosition = $searchIndex;
                }
            }

            // move min on current position and current value on min's position
            $currentValue = $this->result[$index];
            $this->result[$index] = $min;
            $this->result[$minPosition] = $currentValue;

            $this->storeExecutionPass([$index]);
        }

        return $this;
    }
}
