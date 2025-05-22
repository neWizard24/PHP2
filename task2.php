<?php
function calculate_y($x) {
    try {
        $sqrt_x = sqrt($x);
        $cos_sqrt = cos($sqrt_x);
        $denominator = pow($cos_sqrt, 2) + 5;
        if ($denominator == 0 || $cos_sqrt / $denominator < 0) {
            throw new Exception("Недопустимое значение под корнем");
        }
        $term1 = sqrt($cos_sqrt / $denominator);

        $deg_4x = deg2rad(4 * $x);
        $term2 = log(pow(4, $deg_4x) + 5, 2);

        return $term1 + $term2;
    } catch (Exception $e) {
        echo "Ошибка вычисления: " . $e->getMessage() . "\n";
        return null;
    }
}

function is_in_region_D($x, $y) {
    return (abs($x) <= 1.5) && (abs($y) <= 1.5);
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