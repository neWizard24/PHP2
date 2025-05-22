<?php
function calculate_y($x) {
    try {
        $frac = pow($x, 8) / (pow($x, 8) + 3);
        
        if ($frac < -1 || $frac > 1) {
            throw new Exception("Аргумент arcsin вне допустимого диапазона");
        }
        $term1 = sqrt(asin($frac));

        $cos_term = cos(sqrt($x + 1));
        $sin_term = sin(3 * $x + 1);
        $log_arg = pow(2, $cos_term) + pow(abs($x + 1), $sin_term);
        if ($log_arg <= 0) {
            throw new Exception("Логарифм от неположительного числа");
        }
        $term2 = log($log_arg, 4);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return (abs($x) + abs($y)) <= 4 * sqrt(2); 
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