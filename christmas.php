<?php

include 'TwentyTwentyTwo/One/One.php';
include 'TwentyTwentyTwo/One/Two.php';

use AOC\TwentyTwentyTwo\One;

$tttOneOne = new One\One('One');
$tttOneOne->runTask();

$tttOneOne = new One\Two('Two');
$tttOneOne->runTask();

echo '---------------------------------------------------'. PHP_EOL;

?>