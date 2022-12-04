<?php

namespace AOC\TwentyTwentyTwo\Two;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class One extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Two';

    protected function buildGift(array $components): int
    {   
        $drawCombinations = [
            'A X', // rock
            'B Y', // paper
            'C Z' // scissors
        ];
        $winCombinations = [
            'C X',
            'A Y',
            'B Z'
        ];
        $scissors = 0;
        $paper = 0;
        $rock = 0;
        $wins = 0;
        $draws = 0;

        foreach($components[0] as $rpsGame) {
            if (in_array($rpsGame, $drawCombinations)) {
                $draws++;
            }

            if (in_array($rpsGame, $winCombinations)) {
                $wins++;
            }

            $values = explode(' ', $rpsGame);

            match ($values[1]) {
                'X' => $rock++,
                'Y' => $paper++,
                'Z' => $scissors++,
            };
        }
        
        return $scissors * 3 + $paper * 2 + $rock + $wins * 6 + $draws * 3;
    }
}

?>