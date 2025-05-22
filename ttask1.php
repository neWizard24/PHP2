<?php
function calculate_well_depth($t) {
    // Ускорение свободного падения (м/с²)
    $g = 9.81;
    // Скорость звука в воздухе (м/с)
    $v_sound = 343;
    
    // Решаем квадратное уравнение: t = √(2h/g) + h/v_sound
    // Преобразуем к виду: h² + (2*v_sound²/g - 2*v_sound*t)*h + v_sound²*t² = 0
    
    $a = 1;
    $b = (2 * pow($v_sound, 2) / $g) - (2 * $v_sound * $t);
    $c = pow($v_sound * $t, 2);
    
    // Дискриминант
    $D = pow($b, 2) - 4 * $a * $c;
    
    if ($D < 0) {
        return null; // Нет реальных решений
    }
    
    // Два корня уравнения
    $h1 = (-$b + sqrt($D)) / (2 * $a);
    $h2 = (-$b - sqrt($D)) / (2 * $a);
    
    // Выбираем положительный корень
    return max($h1, $h2);
}

function main() {
    echo "Введите время t (в секундах) от момента падения камня до звука удара: ";
    $t = trim(fgets(STDIN));
    $t = floatval($t);
    
    if ($t <= 0) {
        echo "Время должно быть положительным числом!\n";
        return;
    }
    
    $depth = calculate_well_depth($t);
    
    if ($depth === null) {
        echo "Невозможно рассчитать глубину для указанного времени.\n";
    } else {
        printf("Глубина шахты: %.2f метров\n", $depth);
    }
}

main();
?>