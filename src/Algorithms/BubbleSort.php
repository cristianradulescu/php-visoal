<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

final class BubbleSort extends SortingAlgorithm
{
    public function execute(): self
    {
        $this->result = $this->input;

        do {
            $this->increaseExecutionPassesCount();

            $ordered = false;
            $nbOfElements = count($this->result);
            for ($i = 0; $i < $nbOfElements; $i++) {
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

                $this->storeExecutionPass([$currentIndex, $nextIndex]);
            }
        } while ($ordered === true);

        return $this;
    }
}
