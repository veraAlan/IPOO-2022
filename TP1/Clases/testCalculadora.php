<?php
include "Calculadora.php";
$calculadora = new Calculadora(8, 2);

$calculadora->suma();
echo "Suma: " . $calculadora . "\n";
$calculadora->resta();
echo "Resta: " . $calculadora . "\n";
$calculadora->multiplicacion();
echo "Multiplicación: " . $calculadora . "\n";
$calculadora->division();
echo "División: " . $calculadora . "\n";
