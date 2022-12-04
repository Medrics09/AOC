<?php

include 'TwentyTwentyTwo/One/One.php';
include 'TwentyTwentyTwo/One/Two.php';
include 'TwentyTwentyTwo/Two/One.php';
include 'TwentyTwentyTwo/Two/Two.php';
include 'TwentyTwentyTwo/Three/One.php';
include 'TwentyTwentyTwo/Three/Two.php';
include 'TwentyTwentyTwo/Four/One.php';
include 'TwentyTwentyTwo/Four/Two.php';
// include 'TwentyTwentyTwo/Five/One.php';
// include 'TwentyTwentyTwo/Five/Two.php';

use AOC\TwentyTwentyTwo\One;
use AOC\TwentyTwentyTwo\Two;
use AOC\TwentyTwentyTwo\Three;
use AOC\TwentyTwentyTwo\Four;
// use AOC\TwentyTwentyTwo\Five;

if (isset($argv) === false || isset($argv[1]) === false) {
    echo 'Please provide correct parameters: [door] [part] -> example: one one'.PHP_EOL;

    die();
}

$door = ucfirst($argv[1]);

if (isset($argv[2]) === false) {
    echo 'Please provide a correct part! example: one'.PHP_EOL;

    die();
}

$part = ucfirst($argv[2]);
$className = 'AOC\TwentyTwentyTwo\\'.$door.'\\'.$part;

$ttt = new $className($part);

echo '----------------------------------- '.$door.' - '.$part.' -----------------------------------------'.PHP_EOL;
$ttt->runTask();

?>