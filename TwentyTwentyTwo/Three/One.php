<?php

namespace AOC\TwentyTwentyTwo\Three;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class One extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Three';

    protected function buildGift(array $components): int
    {   
        $priorities = array_merge(range('a', 'z'), range('A', 'Z'));
        $result = 0;

        foreach ($components[0] as $items) {
            $compartments = str_split($items, strlen($items) / 2);
            $itemsA = str_split($compartments[0]);
            
            foreach ($itemsA as $itemA) {
                if (str_contains($compartments[1], $itemA)) {
                    $result += array_search($itemA, $priorities) + 1;

                    break;
                }
            }
        }

        return $result;
    }
}

?>