<?php
function calculate_y($x) {
    try {
        $frac = pow($x, 2) / (pow($x, 2) + 1);
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arcsin вне допустимого диапазона");
        }
        $term1 = pow(asin($frac), 7);

        $term2 = pow(sqrt(2 * abs($x + 3)), 1/3) + 4;

        // Третье слагаемое: log7(3^(deg x) + |x|^cos x)
        $deg_x = deg2rad($x);
        $term3 = log(pow(3, $deg_x) + pow(abs($x), cos($x)), 7);

        return $term1 + $term2 + $term3;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return ($x >= 0) && ($y >= 0) && ($x + $y <= 1);
}

function main() {
    echo "Введите значение x: ";
    $x = trim(fgets(STDIN));
    $x = floatval($x);
    
    $y = calculate_y($x);
    
    if ($y === null) return;
    
    $in_region = is_in_region_D($x, $y);
    
    echo "\nРезультаты:\n";
    printf("y = %.4f, Принадлежит D: %s\n", $y, $in_region ? 'True' : 'False');
}

main();
?>