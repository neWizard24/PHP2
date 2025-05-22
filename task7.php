<?php
function calculate_y($x) {
    try {
        $sqrt_x = sqrt($x);
        $sin_term = sin(3 * $sqrt_x);
        $denominator = pow($sin_term, 2) + 7;
        
        if ($denominator == 0 || $sin_term / $denominator < 0) {
            throw new Exception("Недопустимое значение под корнем");
        }
        $term1 = sqrt($sin_term / $denominator);

        $sin_arg = sin(2 * $x + 1);
        $log_arg = pow(2, $sin_arg) + 2;
        if ($log_arg <= 0) {
            throw new Exception("Логарифм от неположительного числа");
        }
        $term2 = pow(log($log_arg, 3), 8);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return ($y >= 0) && ($y <= 1 - $x) && ($y <= 1 + $x);
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