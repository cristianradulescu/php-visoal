<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

final class InsertionSort extends SortingAlgorithm
{
    public function execute(): SortingAlgorithm
    {
        $this->result = $this->input;

        $nbOfElements = count($this->result);
        for ($index = 1; $index < $nbOfElements; $index++) {
            $this->increaseExecutionPassesCount();

            $currentPosition = $index;
            while ($currentPosition > 0 && $this->result[$currentPosition - 1] > $this->result[$currentPosition]) {
                $currentValue = $this->result[$currentPosition];
                $this->result[$currentPosition] = $this->result[$currentPosition - 1];
                $this->result[$currentPosition - 1] = $currentValue;
                $currentPosition--;
            }

            $this->storeExecutionPass([$index]);
        }

        return $this;
    }
}
