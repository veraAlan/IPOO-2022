<?php
include "Cuadrado.php";
include "Punto.php";

$v1 = new Punto(3, 3);
$v2 = new Punto(1, 3);
$v3 = new Punto(3, 1);
$v4 = new Punto(1, 1);

$cuadrado = new Cuadrado($v1, $v3, $v2, $v4);

echo $cuadrado;

$nuevoV1 = new Punto(3, 3);

$cuadrado->desplazar($nuevoV1);
echo $cuadrado;