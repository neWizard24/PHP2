<?php
function quadratic_equation_from_roots($x1, $x2) {
    // Коэффициенты приведенного квадратного уравнения: x² + bx + c = 0
    $b = -($x1 + $x2);
    $c = $x1 * $x2;
    
    return [$b, $c];
}

function main() {
    echo "Введите первый корень: ";
    $x1 = trim(fgets(STDIN));
    $x1 = floatval($x1);
    
    echo "Введите второй корень: ";
    $x2 = trim(fgets(STDIN));
    $x2 = floatval($x2);
    
    list($b, $c) = quadratic_equation_from_roots($x1, $x2);
    
    echo "Квадратное уравнение с корнями $x1 и $x2:\n";
    echo "x² " . ($b >= 0 ? "+ " : "- ") . abs($b) . "x " . ($c >= 0 ? "+ " : "- ") . abs($c) . " = 0\n";
}

main();
?>