<?php

namespace AOC\TwentyTwentyTwo\Seven;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class One extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Seven';

    const LS_LINE = '$ ls';
    const DIR_LINE = '$ cd ';
    const DIR_CONTENT_LINE = 'dir ';
    const MAX_SIZE = 100000;

    private array $dirs;

    protected function buildGift(array $components): int
    {
        $directoryTotalCount = 0;
        $consoleLines = $components[0];
        $this->dirs = [];
        $this->calculatedDirs = [];

        // get every cd ls block with dir content
        foreach ($consoleLines as $index => $lineInConsole) {
            if (str_starts_with($lineInConsole, self::DIR_LINE) && $consoleLines[$index+1] === self::LS_LINE) {
                $dir = str_replace(self::DIR_LINE, '', $lineInConsole);
                $dirContents = [];

                for ($dirContentIndex = $index+2; $dirContentIndex < count($consoleLines); $dirContentIndex++) {
                    $dirContent = $consoleLines[$dirContentIndex];

                    if (str_starts_with($dirContent, '$')) {
                        break;
                    }

                    // add dir content to dir array
                    $dirContents[] = $dirContent;
                }

                $dirAbsolutePath = $this->getAbsolutePathOfDir($consoleLines, $index+1);
                $this->dirs[$dirAbsolutePath] = $dirContents;
            }
        }

        foreach ($this->dirs as $dirPath => $dir) {
            $dirSize = $this->calculateDirSize($dir, $dirPath);

            if ($dirSize <= self::MAX_SIZE) {
                $directoryTotalCount += $dirSize;
            }
        }

        return $directoryTotalCount;
    }

    private function calculateDirSize(array $dir, string $dirPath): int
    {
        $dirSize = 0;

        foreach ($dir as $dirContent) {
            if (str_starts_with($dirContent, self::DIR_CONTENT_LINE)) {
                $subDirPath = ltrim($dirPath.'/'.str_replace(self::DIR_CONTENT_LINE, '', $dirContent), '/');
                $dirSize += $this->calculateDirSize($this->dirs[$subDirPath], $subDirPath);

                continue;
            }

            $dirSize += (int) explode(' ', $dirContent)[0];
        }

        return $dirSize;
    }

    private function getAbsolutePathOfDir(array $consoleLines, int $activeLine): string
    {
        if ($activeLine === 1) {
            return '/';
        }

        $absolutePath = '';

        $parentLines = array_splice($consoleLines, 0, $activeLine);

        
        $parentCdLines = array_reverse(array_filter($parentLines, function (string $consoleLine) {
            return str_starts_with($consoleLine, self::DIR_LINE);
        }));
        
        $dirUpCount = 0;

        foreach ($parentCdLines as $parentCdLine) {
            if ($parentCdLine === sprintf('%s..', self::DIR_LINE)) {
                $dirUpCount++;

                continue;
            }

            if ($dirUpCount > 0) {
                $dirUpCount--;

                continue;
            }

            $dirName = str_replace(self::DIR_LINE, '', $parentCdLine);

            $absolutePath = sprintf('%s/%s', $dirName, $absolutePath);
        }

        $absolutePath = substr(ltrim($absolutePath, '/'), 0, -1);

        return $absolutePath;
    }
}

?>