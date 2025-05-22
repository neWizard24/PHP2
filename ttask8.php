<?php
function sum_thousands_tens($n) {
    // Проверка на шестизначность
    if ($n < 100000 || $n > 999999) {
        return "Число должно быть шестизначным!";
    }
    
    // Получаем цифру тысяч (4-я цифра)
    $thousands = intval(($n % 100000) / 10000);
    
    // Получаем цифру десятков (2-я цифра)
    $tens = intval(($n % 100) / 10);
    
    return $thousands + $tens;
}

function main() {
    echo "Введите шестизначное число: ";
    $n = trim(fgets(STDIN));
    $n = intval($n);
    
    $sum = sum_thousands_tens($n);
    
    if (is_numeric($sum)) {
        echo "Сумма цифры тысяч и цифры десятков: $sum\n";
    } else {
        echo $sum . "\n";
    }
}

main();
?>