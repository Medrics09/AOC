<?php

namespace AOC\TwentyTwentyTwo\Four;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Four';

    protected function buildGift(array $components): int
    {       
        $result = 0;

        foreach ($components[0] as $elfPair) {
            $elves = explode(',', $elfPair);
            $elfOne = explode('-', $elves[0]);
            $elfTwo = explode('-', $elves[1]);

            if (($elfOne[0] >= $elfTwo[0] && $elfOne[0] <= $elfTwo[1])
                || ($elfTwo[0] >= $elfOne[0] && $elfTwo[0] <= $elfOne[1])
            ) {
                $result++;
            }
        }

        return $result;
    }
}

?>