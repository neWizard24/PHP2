<?php
function calculate_y($x) {
    if ($x <= -4) {
        // y(x) = cos(x-1)
        return cos($x - 1);
    } elseif ($x > -4 && $x < 4) {
        // y(x) = arccos(x^6/((1+x^6)/4))
        $denominator = (1 + pow($x, 6)) / 4;
        if ($denominator == 0) return null;
        $arg = pow($x, 6) / $denominator;
        if (abs($arg) > 1) return null;
        return acos($arg);
    } else {
        // y(x) = sqrt(log2(x^5 - x^3 + 10^x))
        $arg = pow($x, 5) - pow($x, 3) + pow(10, $x);
        if ($arg <= 0) return null;
        $log_term = log($arg, 2);
        if ($log_term < 0) return null;
        return sqrt($log_term);
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
