<?php

namespace AOC\Elves;

class Trixi {
    public function assembleComponents(string $filePath): array 
    {
        $content = file_get_contents(__DIR__ . '/../' . $filePath . '/input.txt');
        $array = explode(PHP_EOL, $content);
        $newKey = 0;
        $result = [];

        for ($key = 0; $key < count($array); $key++) {
            $element = $array[$key];

            if (empty($element) === false) {
                $result[$newKey][] = $element;
                
                continue;
            }
            
            $newKey++;
        }

        return $result;
    }

    public function wrapGift(string $task, string $gift) {
        echo $task . ': ' . $gift;
        echo PHP_EOL;
    }
}

?>