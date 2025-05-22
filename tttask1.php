<?php
function calculate_y($x) {
    if ($x < -1) {
        // y(x) = x^6 * lg(6^x - |x-5|^x)
        $term = pow(6, $x) - pow(abs($x - 5), $x);
        if ($term <= 0) return null;
        return pow($x, 6) * log10($term);
    } elseif ($x >= -1 && $x < 1) {
        // y(x) = sin(x/(1-2x^2))
        $denominator = 1 - 2 * pow($x, 2);
        if ($denominator == 0) return null;
        return sin($x / $denominator);
    } else {
        // y(x) = arcsin(1/x^4)
        $arg = 1 / pow($x, 4);
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
