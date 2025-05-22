<?php
function calculate_y($x) {
    try {
        $sqrt_x = sqrt($x);
        $cos_term = cos(3 * $sqrt_x);
        $denominator = pow($cos_term, 2) + 7;
        
        if ($denominator == 0 || $cos_term / $denominator < 0) {
            throw new Exception("Недопустимое значение под корнем");
        }
        $term1 = sqrt($cos_term / $denominator);

        $sin_term = sin(3 * $x - 1);
        $log_arg = pow(2, $sin_term) + pow(3, 18 * $x);
        if ($log_arg <= 0) {
            throw new Exception("Логарифм от неположительного числа");
        }
        $term2 = log10($log_arg);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return ($x >= 0) && ($x <= 6) && ($y <= 0) && ($y >= -6);
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