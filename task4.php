<?php
function calculate_y($x) {
    try {
        $frac = pow($x, 3) / (pow($x, 3) + 1);
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arccos вне допустимого диапазона");
        }
        $term1 = pow(acos($frac), 3);

        $term2 = pow(sqrt($x) + 1, 1/3);

        $lg_x = log10($x);
        $term3 = pow(log(pow(5, $lg_x) + pow(abs($x), sin($x)), 5), 2);

        return $term1 + $term2 + $term3;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return ($x >= 0) && ($y >= 0) && (pow($x, 2) + pow($y, 2) <= 25);
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