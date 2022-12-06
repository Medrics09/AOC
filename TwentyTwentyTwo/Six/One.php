<?php

namespace AOC\TwentyTwentyTwo\Six;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class One extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Six';

    protected function buildGift(array $components): int
    {
        $dataChars = str_split($components[0][0]);

        for ($index = 4; $index < count($dataChars); $index++) {
            $dataStream = array_slice($dataChars, $index-4, 4);
            $compare    = array_unique($dataStream);

            if ($compare === $dataStream) {
                break;
            }
        }

        return $index;
    }
}

?>