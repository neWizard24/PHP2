<?php
function calculate_y($x) {
    if ($x <= -3) {
        // y(x) = arctan(sqrt(x^4 + 3))
        return atan(sqrt(pow($x, 4) + 3));
    } elseif ($x > -3 && $x < 3) {
        // y(x) = cos((x^5 + 2x)/(3 + x^2))
        $denominator = 3 + pow($x, 2);
        if ($denominator == 0) return null;
        return cos((pow($x, 5) + 2 * $x) / $denominator);
    } else {
        // y(x) = x^4 + 3^-x * x^(x-5)
        return pow($x, 4) + pow(3, -$x) * pow($x, $x - 5);
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
