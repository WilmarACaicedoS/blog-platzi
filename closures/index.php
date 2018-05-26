<?php

/*$var2 = 10;

$var = function () use ($var2) {
    echo 'This is a closure <br>';
    echo 'Value: '. $var2;
};

$var2 = 20;

$var();*/

$x = 3;
$numbers = [1, 2, 3, 4, 5];
$closure = function ($n) use ($x) {
    return $n * $x;
};

//$result = $closure(4);

$x = 4;
$result = array_map($closure, $numbers);

var_dump($result); exit();

$x = 10;
$y = 10;

$anonima = function ($z) use($x, $y) {
    //$z = 5;
    echo 'Creando función anónima <br>';
    echo ($x * $y) + $z;
};

$anonima(20);