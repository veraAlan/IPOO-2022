<?php
include "Persona.php";

$juanito = new Persona("Juanito", 18, 165);
echo $juanito;
$juanito->cumplirAnios();
echo $juanito;


$martina = new Persona("Martina", 22, 175);
echo $martina;
$martina->crecerAltura(3);
echo $martina;

$error = new Persona("Error", null, "Juan");
echo $error;
