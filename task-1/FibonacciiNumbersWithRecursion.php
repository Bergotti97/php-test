<?php
$n = 64;
$fibonacci[0] = 0;
$fibonacci[1] = 1;
for ($i = 2; $i <= $n; $i++) { 
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2]; 
} 
echo 'Fibonacci number ', $n, " is " , $fibonacci[$n];
?>
