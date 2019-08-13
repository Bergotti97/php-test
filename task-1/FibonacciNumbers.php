<?php
/**
 * PHP version 7.3.6
 * 
 * @category Mathematics
 * @package  Task-1
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-1/Fibonacci.php 
 */

/** 
 * Функция для подсчета чисел Фибоначчи 
 * 
 * @param int $n Количество чисел Фибоначчи 
 * 
 * @return int
 */
function fibonacci($n) 
{
    $fibonacci = array(0, 1);
    for ( $i = 0; $i < $n-2; $i++ ) {
        $fib = $fibonacci[$i] + $fibonacci[$i+1];
        array_push($fibonacci, $fib);
    }

    foreach ($fibonacci as $key=>$value) {
        echo "Fibonacci number ".$key." = ".$value."\n";
    }    
}

echo fibonacci(64)."\n";
