<?php

namespace AOC\TwentyTwentyTwo\One;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/One';

    protected function buildGift(array $components): int
    {        
        foreach($components as $component) {
            $subResult = 0;

            foreach($component as $calory) {
                $subResult += (int) $calory;
            }

            $resultArray[] = $subResult;
        }

        arsort($resultArray, SORT_NUMERIC);

        return array_shift($resultArray) + array_shift($resultArray) + array_shift($resultArray);
    }
}

?>