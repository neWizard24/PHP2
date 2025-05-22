<?php
function product_of_digits($n) {
    // Проверка на четырехзначность
    if ($n < 1000 || $n > 9999) {
        return "Число должно быть четырехзначным!";
    }
    
    // Разделяем число на цифры
    $thousands = intval($n / 1000);
    $hundreds = intval(($n % 1000) / 100);
    $tens = intval(($n % 100) / 10);
    $units = $n % 10;
    
    // Вычисляем произведение
    return $thousands * $hundreds * $tens * $units;
}

function main() {
    echo "Введите четырехзначное число: ";
    $n = trim(fgets(STDIN));
    $n = intval($n);
    
    $product = product_of_digits($n);
    
    if (is_numeric($product)) {
        echo "Произведение цифр числа: $product\n";
    } else {
        echo $product . "\n";
    }
}

main();
?>