<?php
function calculate_mixture($V1, $t1, $V2, $t2) {
    // Удельная теплоемкость воды (Дж/(кг·°C)), предполагаем одинаковой для обеих порций
    $c = 4184;
    
    // Плотность воды (кг/л), предполагаем одинаковой
    $rho = 1;
    
    // Массы воды
    $m1 = $V1 * $rho;
    $m2 = $V2 * $rho;
    
    // Температура смеси (формула смешения)
    $t_mix = ($m1 * $t1 + $m2 * $t2) / ($m1 + $m2);
    
    // Общий объем
    $V_mix = $V1 + $V2;
    
    return [
        'volume' => $V_mix,
        'temperature' => $t_mix
    ];
}

function main() {
    echo "Введите объем V1 (литры): ";
    $V1 = trim(fgets(STDIN));
    $V1 = floatval($V1);
    
    echo "Введите температуру t1 (°C): ";
    $t1 = trim(fgets(STDIN));
    $t1 = floatval($t1);
    
    echo "Введите объем V2 (литры): ";
    $V2 = trim(fgets(STDIN));
    $V2 = floatval($V2);
    
    echo "Введите температуру t2 (°C): ";
    $t2 = trim(fgets(STDIN));
    $t2 = floatval($t2);
    
    if ($V1 <= 0 || $V2 <= 0) {
        echo "Объемы должны быть положительными!\n";
        return;
    }
    
    $result = calculate_mixture($V1, $t1, $V2, $t2);
    
    printf("\nРезультат смешения:\n");
    printf("Объем смеси: %.2f литров\n", $result['volume']);
    printf("Температура смеси: %.2f °C\n", $result['temperature']);
}

main();
?>