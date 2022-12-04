<?php

namespace AOC\TwentyTwentyTwo\Three;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Three';

    protected function buildGift(array $components): int
    {       
        $priorities = array_merge(range('a', 'z'), range('A', 'Z')); 
        $result = 0;
        $elfGroups = array_chunk($components[0], 3);

        foreach ($elfGroups as $elfGroup) {
            foreach ($priorities as $priority) {
                if (str_contains($elfGroup[0], $priority)
                    && str_contains($elfGroup[1], $priority)
                    && str_contains($elfGroup[2], $priority)
                ) {
                    $result += array_search($priority, $priorities) + 1;

                    break;
                }
            }
        }

        return $result;
    }
}

?>