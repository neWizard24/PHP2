<?php
function calculate_y($x) {
    if ($x <= -2) {
        // y(x) = arccos(e^x)
        $arg = exp($x);
        if (abs($arg) > 1) return null;
        return acos($arg);
    } elseif ($x > -2 && $x < 2) {
        // y(x) = lg(5x/(4-x^9))
        $denominator = 4 - pow($x, 9);
        if ($denominator == 0) return null;
        $arg = 5 * $x / $denominator;
        if ($arg <= 0) return null;
        return log10($arg);
    } else {
        // y(x) = (x-2)^x + 1
        return pow($x - 2, $x) + 1;
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
