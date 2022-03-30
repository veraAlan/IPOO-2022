<?php
include "Fecha.php";

$fecha = new Fecha(15, 12, 2019);
echo $fecha . "\n";

$fecha->incremento(27, 28, 3, 2022);
echo $fecha . "\n";

$fecha->incremento(75, 28, 3, 2022);
echo $fecha . "\n";

$fecha->incremento(3250, 28, 3, 2022);
echo $fecha . "\n";