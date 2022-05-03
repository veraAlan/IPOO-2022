<?php
include "Responsable.php";
include "Viaje.php";
include "Empresa.php";
include "Terminal.php";

echo "\n----- 1 -----\n";
echo "Creando Empresas...\n";
$seabourne = new Empresa("SCL", "Seabourn Cruise Line");
$princess = new Empresa("PC", "Princess Cruises");
$titanic = new Empresa("TC", "Titanic Corp");

echo "Creando Coleccion de Empresas...\n";
$coleccion_empresas = [$seabourne, $princess, $titanic];

echo "\n----- 2 -----\n";
echo "Creando Viajes...\n";
$dubai = new Viaje("Dubai", "10:00", "12:00", "1", "33000", "2022-05-01", "30", "30", new Responsable("Juan", "Perez", "41789504", "Calle falsa 123", "29945678"));
$miami = new Viaje("Miami", "10:00", "12:00", "2", "50000", "2022-04-30", "25", "25", new Responsable("Pucho", "Gomez", "39776504", "Calle real 567", "29987678"));
$londres = new Viaje("Londres", "10:00", "12:00", "3", "75000", "2022-05-01", "30", "30", new Responsable("Maria", "Puchi", "41456504", "Independencia 2334", "29946512"));
$madrid = new Viaje("Madrid", "10:00", "12:00", "4", "20000", "2022-06-03", "30", "30", new Responsable("Felicia", "Rockefeller", "42649500", "Olascoaga 560", "29965234"));

echo "Agregando Viajes a las Empresas...\n";
$coleccion_empresas[0]->incorporarViaje($dubai);
$coleccion_empresas[0]->incorporarViaje($miami);

$coleccion_empresas[1]->incorporarViaje($londres);
$coleccion_empresas[1]->incorporarViaje($madrid);

$coleccion_empresas[2]->incorporarViaje($miami);
$coleccion_empresas[2]->incorporarViaje($londres);

echo "\n----- 3 -----\n";
echo "Creando Terminal...\n";
$terminal = new Terminal("Cruise to Your Dreams", "Bartolome Mitre 1250", $coleccion_empresas);

echo "\n----- 4 -----\n";
$terminal->ventaAutomatica(3, "2022-05-01", "Londres", $princess);

echo "----- 5 -----\n";
echo $terminal->empresaMayorRecaudacion();

echo "----- 6 -----\n";
echo $terminal->responsableViaje(3);