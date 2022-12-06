<?php

namespace AOC\TwentyTwentyTwo\Six;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Six';

    protected function buildGift(array $components): string
    {
        $dataChars = str_split($components[0][0]);

        for ($index = 14; $index < count($dataChars); $index++) {
            $dataStream = array_slice($dataChars, $index-14, 14);
            $compare    = array_unique($dataStream);

            if ($compare === $dataStream) {
                break;
            }
        }

        return $index;
    }
}

?>