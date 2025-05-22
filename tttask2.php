<?php
function calculate_y($x) {
    if ($x <= 1) {
        // y(x) = log7(7^x - |x-3|^7)
        $term = pow(7, $x) - pow(abs($x - 3), 7);
        if ($term <= 0) return null;
        return log($term, 7);
    } elseif ($x > 1 && $x < 3) {
        // y(x) = ln(x^8/(1+x^2))
        $denominator = 1 + pow($x, 2);
        if ($denominator == 0) return null;
        $arg = pow($x, 8) / $denominator;
        if ($arg <= 0) return null;
        return log($arg);
    } else {
        // y(x) = arcsin(x/(1+x^2))
        $arg = $x / (1 + pow($x, 2));
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
