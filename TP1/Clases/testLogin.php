<?php
include "Login.php";

// Creando instancia y usando recordar()
$alan = new Login('Alan', 'Mundo', 'Hola');
$alan->recordar();

$alan->cambiarContrasenia('Mundo', 'Woop', 'Wee');
$alan->recordar();

// Setteando las ultimas 4 contrasenias en el array.
$alan->cambiarContrasenia('Woop', 'ASDF', 'QWER');
$alan->cambiarContrasenia('ASDF', 'zxc', 'bnm');
$alan->cambiarContrasenia('zxc', 'love', 'you');
$alan->cambiarContrasenia('love', 'done', 'it');

// Guardando la ultima contrasenia como la actual.
$alan->cambiarContrasenia('done', 'why', 'would you');

// Mostrando el objeto completo por pantalla.
echo $alan;
