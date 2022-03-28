<?php
include "Calculadora.php";
/* Prueba con valores y todas las funciones predefinidas.
$calculadora = new Calculadora(8, 2);
$calculadoraN = new Calculadora(51.12, 23.5);

echo "Ejemplo (8, 2): \n";
$calculadora->suma();
echo $calculadora->getValor_x() . " + " . $calculadora->getValor_y() . " = " . $calculadora . "\n";
$calculadora->resta();
echo $calculadora->getValor_x() . " - " . $calculadora->getValor_y() . " = " . $calculadora . "\n";
$calculadora->multiplicacion();
echo $calculadora->getValor_x() . " * " . $calculadora->getValor_y() . " = " . $calculadora . "\n";
$calculadora->division();
echo $calculadora->getValor_x() . " / " . $calculadora->getValor_y() . " = " . $calculadora . "\n";

echo "\nEjemplo (51.12, 23.5): \n";
$calculadoraN->multiplicacion();
echo $calculadoraN->getValor_x() . " * " . $calculadoraN->getValor_y() . " = " . $calculadoraN . "\n";
$calculadoraN->setValor_x(2);
$calculadoraN->setValor_y(5);
echo "Cambiados a (2, 5): \n";
$calculadoraN->suma();
echo $calculadoraN->getValor_x() . " + " . $calculadoraN->getValor_y() . " = " . $calculadoraN . "\n";
 */

$valor_x = readline("\nIngrese el primer valor: ");
$valor_y = readline("Ingrese el segundo valor: ");
$operacion = readline("Ingrese la operación a realizar (suma, resta, multiplicacion, division): ");

$calculadoraUsuario = new Calculadora($valor_x, $valor_y);
$calculadoraUsuario->$operacion();

echo "Resultado: " . $calculadoraUsuario . "\n";
