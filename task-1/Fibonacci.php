<?php
/**
 * PHP version 7.3.6
 * 
 * @category Mathematics
 * @package  Task-1
 * @author   Display Name <gishmg97@gmail.com>
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
    if ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    }
    $result = (fibonacci($n - 2) + fibonacci($n - 1));

    return $result;
}

// Рекомендуется уменьшить количество чисел Фибоначи желательно до 30 так,
// как для подсчета дальнейших чисел требуется огромное количество времени. 
$n = 64;
for ($i = 0; $i <= $n; $i++) { 
    echo fibonacci($i) . "\n";
}