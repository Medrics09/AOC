<?php

namespace AOC;

include_once 'Elves/Trixi.php';

use AOC\Elves\Trixi;

abstract class AbstractTask {
    const TASK_ID = 'TO SET';

    function __construct(private string $part) {
    }

    public function runTask(): void
    {
        $trixi = new Trixi();

        $components = $trixi->assembleComponents(static::TASK_ID);
        $gift = $this->buildGift($components);
        $trixi->wrapGift(static::TASK_ID.' - '.$this->part, $gift);
    }

    abstract protected function buildGift(array $components): int;
}

?>