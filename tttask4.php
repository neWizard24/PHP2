<?php
function calculate_y($x) {
    if ($x <= 2) {
        // y(x) = log5((x-4)^x) + 2^(|x|^(1/4))
        if ($x <= 4) return null; // логарифм не определен
        $term1 = log(pow($x - 4, $x), 5);
        $term2 = pow(2, pow(abs($x), 0.25));
        return $term1 + $term2;
    } elseif ($x > 2 && $x < 8) {
        // y(x) = sqrt(x/(1+x^2))
        $arg = $x / (1 + pow($x, 2));
        if ($arg < 0) return null;
        return sqrt($arg);
    } else {
        // y(x) = arcsin(x/(x^3+1))
        $arg = $x / (pow($x, 3) + 1);
        if (abs($arg) > 1) return null;
        return asin($arg);
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
