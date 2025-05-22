<?php
function calculate_landing_time($h, $m, $s, $flight_seconds) {
    // Преобразуем время взлета в секунды
    $takeoff = $h * 3600 + $m * 60 + $s;
    
    // Добавляем продолжительность полета
    $landing = $takeoff + $flight_seconds;
    
    // Учитываем переход через сутки (86400 секунд в сутках)
    $landing %= 86400;
    
    // Переводим обратно в часы, минуты, секунды
    $hours = intval($landing / 3600);
    $remaining = $landing % 3600;
    $minutes = intval($remaining / 60);
    $seconds = $remaining % 60;
    
    return [$hours, $minutes, $seconds];
}

function main() {
    echo "Введите время взлета (часы): ";
    $h = trim(fgets(STDIN));
    $h = intval($h);
    
    echo "Введите время взлета (минуты): ";
    $m = trim(fgets(STDIN));
    $m = intval($m);
    
    echo "Введите время взлета (секунды): ";
    $s = trim(fgets(STDIN));
    $s = intval($s);
    
    echo "Введите продолжительность полета (секунды): ";
    $flight = trim(fgets(STDIN));
    $flight = intval($flight);
    
    // Проверка корректности ввода
    if ($h < 0 || $h > 23 || $m < 0 || $m > 59 || $s < 0 || $s > 59 || $flight < 0) {
        echo "Некорректные входные данные!\n";
        return;
    }
    
    list($land_h, $land_m, $land_s) = calculate_landing_time($h, $m, $s, $flight);
    
    printf("Время приземления: %02d:%02d:%02d\n", $land_h, $land_m, $land_s);
}

main();
?>