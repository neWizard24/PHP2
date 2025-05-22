<?php
function reverse_number($n) {
    // Проверка на трехзначность
    if ($n < 100 || $n > 999) {
        return "Число должно быть трехзначным!";
    }
    
    // Разделяем число на цифры
    $hundreds = intval($n / 100);
    $tens = intval(($n % 100) / 10);
    $units = $n % 10;
    
    // Собираем число в обратном порядке
    return $units * 100 + $tens * 10 + $hundreds;
}

function main() {
    echo "Введите трехзначное число N: ";
    $n = trim(fgets(STDIN));
    $n = intval($n);
    
    $reversed = reverse_number($n);
    
    if (is_numeric($reversed)) {
        echo "Число в обратном порядке: $reversed\n";
    } else {
        echo $reversed . "\n";
    }
}

main();
?>