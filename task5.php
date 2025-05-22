<?php
function calculate_y($x) {
    try {
        $sqrt_x = sqrt($x);
        $cos_sqrt = cos($sqrt_x);
        $denominator = pow($cos_sqrt, 2) + 5;
        $frac = $cos_sqrt / $denominator;
        
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arccos вне допустимого диапазона");
        }
        
        $arccos_val = acos($frac);
        $term1 = sqrt(pow($arccos_val, 3) / pow($arccos_val, 3)); 

        $lg_2x = log10(2 * $x);
        $term2 = log(pow(3, $lg_2x) + 2, 3);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return ($x >= 0) && ($x <= 4) && ($y >= 0) && ($y <= 5);
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