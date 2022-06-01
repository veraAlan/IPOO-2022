<?php
include "Viaje.php";
include "Nacional.php";
include "Internacional.php";
include "Responsable.php";
include "Empresa.php";
include "Terminal.php";

// Responsable -> Viaje(Nacional/Internacional) -> Empresa -> Terminal.
// Responsables
$resp1 = new Responsable("Juan", "Perez",    245615636, "Calle Falsa 123", "juan.p@gmail.com",   2995537109);
$resp2 = new Responsable("Ricardo", "Rich",  343815326, "Calle Falsa 345", "ric.rich@gmail.com", 2995439329);
$resp3 = new Responsable("Santi", "Acosta",    195925636, "Calle 2", "santi.a@gmail.com",        2995649829);

// Viajes
$viajeNac1 = new Nacional("Bariloche", "15:02", "10:20",            "1", 10000, "15-02-2022", 15, 20, $resp1);
$viajeNac2 = new Nacional("Vaca Muerta", "10:02", "14:20",          "2", 10000, "10-05-2022", 15, 20, $resp2);
$viajeInter1 = new Internacional("Sao Pablo", "14:02", "18:20",     "3", 10000, "20-06-2022", 15, 20, $resp1, "NO");
$viajeInter2 = new Internacional("Puerto Rico", "08:30", "20:20",   "4", 10000, "15-08-2022", 15, 20, $resp3, "NO");
$viajeInter3 = new Internacional("London", "09:20", "22:20",        "5", 10000, "30-03-2022", 15, 20, $resp2, "SI");

// Viajes Economicos Diferentes
$viajeInter2Eco = new Internacional("Puerto Rico Eco", "08:30", "20:20",   "6", 1000, "15-08-2022", 7, 20, $resp1, "SI");
$viajeNac2Eco = new Nacional("Vaca Muerta Eco", "10:02", "14:20",          "7", 1000, "10-05-2022", 5, 20, $resp3);

// Coleccion Viajes
$col_Viajes = [$viajeNac1, $viajeNac2, $viajeInter2Eco, $viajeInter2, $viajeInter3];
$col_Viajes2 = [$viajeNac1, $viajeNac2Eco, $viajeInter1, $viajeInter2Eco, $viajeInter3];

// Empresas
$emp1 = new Empresa("SCL", "Seabourn Cruise Line", $col_Viajes);
$emp2 = new Empresa("PC", "Princess Cruises", $col_Viajes2);

// Coleccion Empresas
$col_Empresas = [$emp1, $emp2];

// Terminal
$terminal = new Terminal("WaterCruises Argentina", "La Plata", $col_Empresas);

// Mostrar por pantalla.
echo $terminal;
echo "Viajes mas Economicos: \n";
print_r($terminal->darViajeMenorValor());