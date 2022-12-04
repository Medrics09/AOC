<?php

include 'TwentyTwentyTwo/One/One.php';
include 'TwentyTwentyTwo/One/Two.php';
include 'TwentyTwentyTwo/Two/One.php';
include 'TwentyTwentyTwo/Two/Two.php';
// include 'TwentyTwentyTwo/Three/One.php';
// include 'TwentyTwentyTwo/Three/Two.php';
// include 'TwentyTwentyTwo/Four/One.php';
// include 'TwentyTwentyTwo/Four/Two.php';
// include 'TwentyTwentyTwo/Five/One.php';
// include 'TwentyTwentyTwo/Five/Two.php';

use AOC\TwentyTwentyTwo\One;
use AOC\TwentyTwentyTwo\Two;
// use AOC\TwentyTwentyTwo\Three;
// use AOC\TwentyTwentyTwo\Four;
// use AOC\TwentyTwentyTwo\Five;

$tttOneOne = new One\One('One');
$tttOneTwo = new One\Two('Two');

$tttTwoOne = new Two\One('One');
$tttTwoTwo = new Two\Two('Two');

// $tttThreeOne = new Three\One('One');
// $tttThreeTwo = new Three\Two('Two');

// $tttFourOne = new Four\One('One');
// $tttFourTwo = new Four\Two('Two');

// $tttFiveOne = new Five\One('One');
// $tttFiveTwo = new Five\Two('Two');
echo '-----------------------  1   ---------------------------'. PHP_EOL;

$tttOneOne->runTask();
$tttOneTwo->runTask();

echo '-----------------------  2   ---------------------------'. PHP_EOL;

$tttTwoOne->runTask();
$tttTwoTwo->runTask();

// echo '-----------------------  3   ---------------------------'. PHP_EOL;

// $tttThreeOne->runTask();
// $tttThreeTwo->runTask();

// echo '-----------------------  4   ---------------------------'. PHP_EOL;

// $tttFourOne->runTask();
// $tttFourTwo->runTask();

// echo '-----------------------  5   ---------------------------'. PHP_EOL;

// $tttFiveOne->runTask();
// $tttFiveTwo->runTask();

?>