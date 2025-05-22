<?php
function calculate_y($x) {
    if ($x <= -0.5) {
        // y(x) = -x^5 + lg(3^x - |x|^x)
        $term = pow(3, $x) - pow(abs($x), $x);
        if ($term <= 0) return null;
        return -pow($x, 5) + log10($term);
    } elseif ($x > -0.5 && $x < 0.5) {
        // y(x) = lg(x/(1-x^2))
        $denominator = 1 - pow($x, 2);
        if ($denominator == 0) return null;
        $arg = $x / $denominator;
        if ($arg <= 0) return null;
        return log10($arg);
    } else {
        // y(x) = arccos(1/(4x))
        $arg = 1 / (4 * $x);
        if (abs($arg) > 1) return null;
        return acos($arg);
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
