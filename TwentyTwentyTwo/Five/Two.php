<?php

namespace AOC\TwentyTwentyTwo\Five;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Five';

    protected function buildGift(array $components): string
    {
        $startShip = $components[0];

        foreach ($startShip as &$container) {
            $container = str_split($container, 4);
            $container = array_map(function (string $containerLoad) {
                return str_replace([' ', '[', ']'], '', $containerLoad);
            }, $container);
        }

        array_pop($startShip);
        $containers = [];

        for ($index = 0; $index < count($startShip); $index++) {
            for ($secIndex = 0; $secIndex < count($startShip[$index]); $secIndex++) {
                if (empty($startShip[$index][$secIndex])) {
                    continue;
                }
                $containers[$secIndex][] = $startShip[$index][$secIndex];
            }
        }

        ksort($containers);

        $containers = array_map(function (array $container) {
            return array_reverse($container);
        }, $containers);

        $resortingCommands = $components[1];

        foreach ($resortingCommands as &$resortingCommand) {
            $resortingCommand = str_replace(['move ', 'from ', 'to '], '', $resortingCommand);
            $resortingCommand = explode(' ', $resortingCommand);

            // 0 = count
            // 1 = from
            // 2 = to

            $fromContainer = &$containers[$resortingCommand[1] - 1];
            $toContainer = &$containers[$resortingCommand[2] - 1];
            $transferContainerLoad = array_slice($fromContainer, $resortingCommand[0] * -1);

            for ($index = 0; $index < $resortingCommand[0]; $index++) {
                array_pop($fromContainer);
            }

            $toContainer = array_merge($toContainer, $transferContainerLoad);
        }

        $result = '';

        foreach ($containers as $finalContainer) {
            $result = sprintf('%s%s', $result, array_pop($finalContainer));
        }

        return $result;
    }
}

?>