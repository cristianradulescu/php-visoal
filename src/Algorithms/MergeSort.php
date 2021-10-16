<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

final class MergeSort extends SortingAlgorithm
{
    public function execute(): SortingAlgorithm
    {
        $this->result = $this->input;

        $nbOfElements = count($this->result);
        $this->sortElements(0, $nbOfElements - 1);

        return $this;
    }

    protected function sortElements(int $startPosition, int $endPosition): void
    {
        if ($startPosition >= $endPosition) {
            return;
        }

        $this->increaseExecutionPassesCount();
        /** @var array $highlightedIndexes Used only for visual representation purposes */
        $highlightedIndexes = [];
        for ($i = $startPosition; $i <= $endPosition; $i++) {
            $highlightedIndexes[] = $i;
        }
        $this->storeExecutionPass($highlightedIndexes);

        $nbOfElements = $endPosition - $startPosition;
        $sequencePosition = $startPosition + (int) floor($nbOfElements / 2);

        $this->sortElements($startPosition, $sequencePosition);
        $this->sortElements($sequencePosition + 1, $endPosition);
        $this->mergeElements($startPosition, $sequencePosition, $endPosition);
    }

    protected function mergeElements(int $startPosition, int $sequencePosition, int $endPosition): void
    {
        $leftSequenceEnd = $sequencePosition - $startPosition + 1;
        $rightSequenceEnd = $endPosition - $sequencePosition;

        $leftSequence = [];
        for ($i = 0; $i < $leftSequenceEnd; $i++) {
            $leftSequence[$i] = $this->result[$startPosition + $i];
        }

        $rightSequence = [];
        for ($j = 0; $j < $rightSequenceEnd; $j++) {
            $rightSequence[$j] = $this->result[$sequencePosition + 1 + $j];
        }

        $leftSequenceIndex = 0;
        $rightSequenceIndex = 0;
        $mergeSequenceIndex = $startPosition;

        while ($leftSequenceIndex < $leftSequenceEnd && $rightSequenceIndex < $rightSequenceEnd) {
            /** @var int $replacedElement Used only for visual representation purposes */
            $replacedElement = $this->result[$mergeSequenceIndex];
            if ($leftSequence[$leftSequenceIndex] <= $rightSequence[$rightSequenceIndex]) {
                /** @var int $replacedWithIndex Used only for visual representation purposes */
                $replacedWithIndex = array_search($leftSequence[$leftSequenceIndex], $this->result, true);
                $this->result[$mergeSequenceIndex] = $leftSequence[$leftSequenceIndex];
                $leftSequenceIndex++;
            } else {
                /** @var int $replacedWithIndex Used only for visual representation purposes */
                $replacedWithIndex = array_search($rightSequence[$rightSequenceIndex], $this->result, true);
                $this->result[$mergeSequenceIndex] = $rightSequence[$rightSequenceIndex];
                $rightSequenceIndex++;
            }

            $executionPassLine = $this->result;
            $executionPassLine[$replacedWithIndex] = $replacedElement;
            $executionPass = $this->storeExecutionPass([$mergeSequenceIndex, $replacedWithIndex]);
            $executionPass->line = $executionPassLine;

            $mergeSequenceIndex++;
        }

        while ($leftSequenceIndex < $leftSequenceEnd) {
            $this->result[$mergeSequenceIndex] = $leftSequence[$leftSequenceIndex];
            $leftSequenceIndex++;
            $mergeSequenceIndex++;
        }

        while ($rightSequenceIndex < $rightSequenceEnd) {
            $this->result[$mergeSequenceIndex] = $rightSequence[$rightSequenceIndex];
            $rightSequenceIndex++;
            $mergeSequenceIndex++;
        }
    }
}
