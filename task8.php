<?php
function calculate_y($x) {
    try {
        $root5_x = pow($x, 1/5);
        $frac = $root5_x / ($root5_x + 1);
        
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arccos вне допустимого диапазона");
        }
        $term1 = pow(acos($frac), 9);

        $sqrt_term = sqrt(3 * $x - 1);
        if (3 * $x - 1 < 0) $sqrt_term = 0; 
        
        $log_arg = pow(4, 18 * $x) + $sqrt_term + pow(abs($x), sin(2 * $x));
        if ($log_arg <= 0) {
            throw new Exception("Логарифм от неположительного числа");
        }
        $term2 = pow(log($log_arg, 5), 2);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {

    return (pow($x, 2) + pow($y, 2) <= 25) && ($y <= 0);
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