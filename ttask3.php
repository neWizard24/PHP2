<?php
function derivative_x_pow_x($x, $h = 0.000001) {
    // Численное вычисление производной с использованием симметричной разностной схемы
    if ($x <= 0) {
        return null;
    }
    
    // Функция для вычисления x^x
    $f = function($x) {
        return pow($x, $x);
    };
    
    // Симметричная производная
    return ($f($x + $h) - $f($x - $h)) / (2 * $h);
}

function main() {
    echo "Введите точку a (a > 0) для вычисления производной: ";
    $a = trim(fgets(STDIN));
    $a = floatval($a);
    
    if ($a <= 0) {
        echo "Точка a должна быть положительной!\n";
        return;
    }
    
    $derivative = derivative_x_pow_x($a);
    
    printf("Производная функции y = x^x в точке a = %.2f: %.6f\n", $a, $derivative);
    
    // Аналитическая формула для сравнения: dy/dx = x^x * (1 + ln(x))
    $analytic = pow($a, $a) * (1 + log($a));
    printf("Аналитическое значение (для проверки): %.6f\n", $analytic);
}

main();
?>