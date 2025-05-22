<?php
function calculate_y($x) {
    if ($x <= 1) {
        // y(x) = arcsin(x/(x^2+1))
        $arg = $x / (pow($x, 2) + 1);
        if (abs($arg) > 1) return null;
        return asin($arg);
    } elseif ($x > 1 && $x < 2) {
        // y(x) = ln(x^4/(1+x^4))
        $denominator = 1 + pow($x, 4);
        if ($denominator == 0) return null;
        $arg = pow($x, 4) / $denominator;
        if ($arg <= 0) return null;
        return log($arg);
    } else {
        // y(x) = lg(2^-x * x^(4-x))
        $arg = pow(2, -$x) * pow($x, 4 - $x);
        if ($arg <= 0) return null;
        return log10($arg);
    }
}

function main() {
    echo "Введите значение x: ";
    $x = trim(fgets(STDIN));
    $x = floatval($x);
    
    $y = calculate_y($x);
    
    if ($y === null) {
        echo "Функция не определена в точке x = $x\n";
    } else {
        printf("y(%.2f) = %.4f\n", $x, $y);
    }
}

main();
?>
