<?php
include "Cuadrado.php";

$v1 = array(1, 1);
$v2 = array(3, 1);
$v3 = array(1, 3);
$v4 = array(3, 3);

$cuadrado = new Cuadrado($v1, $v2, $v3, $v4);

echo $cuadrado;
