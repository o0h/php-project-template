<?php
// Help to test your IDE config, development environment(docker container) etc.

declare(strict_types=1);

echo date('c');

foreach (range(1, 4) as $k) {
    var_dump($k);
    if(empty($k)) echo 'empty!!', PHP_EOL;
}

$a = 'aaa';

    function hogehoge($v) { return null;}
