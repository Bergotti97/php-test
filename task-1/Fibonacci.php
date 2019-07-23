<?php

function fibonacci($n) 
{
    if ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    }
    $result = (fibonacci($n-2) + fibonacci($n-1));
    return $result;
}

// Рекомендуется уменьшить количество чисел Фибоначи желательно до 30 так,
// как для подсчета дальнейших чисел требуется огромное количество времени. 
$n = 64;
for ($i = 0; $i <= $n; $i++) { 
    echo fibonacci($i)."\n";
}