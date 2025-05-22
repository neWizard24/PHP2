<?php
function calculate_y($x) {
    if ($x <= 8) {
        // y(x) = arccos(e^-|x|)
        $arg = exp(-abs($x));
        if (abs($arg) > 1) return null;
        return acos($arg);
    } elseif ($x > 8 && $x < 9) {
        // y(x) = cos(x^5/(7+x^2))
        $denominator = 7 + pow($x, 2);
        if ($denominator == 0) return null;
        return cos(pow($x, 5) / $denominator);
    } else {
        // y(x) = x^8 + x^(x-10)
        return pow($x, 8) + pow($x, $x - 10);
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
