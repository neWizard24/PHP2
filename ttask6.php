<?php
function sum_of_digits($n) {
    // Проверка на трехзначность
    if ($n < 100 || $n > 999) {
        return "Число должно быть трехзначным!";
    }
    
    // Разделяем число на цифры и суммируем
    $hundreds = intval($n / 100);
    $tens = intval(($n % 100) / 10);
    $units = $n % 10;
    
    return $hundreds + $tens + $units;
}

function main() {
    echo "Введите трехзначное число: ";
    $n = trim(fgets(STDIN));
    $n = intval($n);
    
    $sum = sum_of_digits($n);
    
    if (is_numeric($sum)) {
        echo "Сумма цифр числа: $sum\n";
    } else {
        echo $sum . "\n";
    }
}

main();
?>