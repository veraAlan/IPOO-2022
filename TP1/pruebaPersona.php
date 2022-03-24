<?php
include "Persona.php";

$juanito = new Persona("Juanito", 18, 165, 80, "M");
echo $juanito;
echo "Type: ". gettype($juanito) . "\n";

$martina = new Persona("Martina", 22, 175, 80, "F");
echo $martina;
echo "Type: ". gettype($martina);