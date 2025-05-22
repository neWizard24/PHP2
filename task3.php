<?php
function calculate_y($x) {
    try {
        $sqrt_x = sqrt($x);
        $cos_sqrt = cos($sqrt_x);
        $denominator = pow($cos_sqrt, 2) + 7;
        $frac = $cos_sqrt / $denominator;
        
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arcsin вне допустимого диапазона");
        }
        
        $arcsin_val = asin($frac);
        $term1 = sqrt($arcsin_val / $arcsin_val); 

        $lg_x = log10($x);
        $term2 = pow(log10(pow(2, $x) + pow(abs($x), 2 * $lg_x)), 5);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return (abs($x) + abs($y)) <= 2 * sqrt(2);
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