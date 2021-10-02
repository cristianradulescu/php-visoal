<?php
declare(strict_types=1);

namespace Visoal\Algorithms;

use Visoal\Output\ExecutionPass;

interface AlgorithmDebuggable
{
    /**
     * @return array|ExecutionPass[]
     */
    public function getExecutionPasses(): array;
    public function getExecutionPassesCount(): int;
}
