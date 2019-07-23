<?php

$n = 64;
$fibonacci[0] = 0;
$fibonacci[1] = 1;
echo "Fibonacci Number 0 is ". $fibonacci[0]."\n";
echo "Fibonacci Number 1 is ". $fibonacci[1]."\n";

for ($i = 2; $i <= $n; $i++) { 
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2]; 
    echo "Fibonacci Number ".$i ." is ". $fibonacci[$i]."\n";
} 
