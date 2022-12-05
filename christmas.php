<?php

include 'TwentyTwentyTwo/One/One.php';
include 'TwentyTwentyTwo/One/Two.php';
include 'TwentyTwentyTwo/Two/One.php';
include 'TwentyTwentyTwo/Two/Two.php';
include 'TwentyTwentyTwo/Three/One.php';
include 'TwentyTwentyTwo/Three/Two.php';
include 'TwentyTwentyTwo/Four/One.php';
include 'TwentyTwentyTwo/Four/Two.php';
include 'TwentyTwentyTwo/Five/One.php';
include 'TwentyTwentyTwo/Five/Two.php';
//include 'TwentyTwentyTwo/Six/One.php';
//include 'TwentyTwentyTwo/Six/Two.php';
//include 'TwentyTwentyTwo/Seven/One.php';
//include 'TwentyTwentyTwo/Seven/Two.php';
//include 'TwentyTwentyTwo/Eight/One.php';
//include 'TwentyTwentyTwo/Eight/Two.php';

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