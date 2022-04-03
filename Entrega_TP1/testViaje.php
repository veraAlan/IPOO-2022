<?php
include "Pasajero.php";
include "Viaje.php";
include "menu.php";

main();

// Zona de testeo. Agregando datos predefinidos y mostrandolos por pantalla.
$hw = new Viaje("Hawaii", "hw", "5");
$du = new Viaje("Dubai", "du", "3");
$hw2 = new Viaje("Hawaii", "hw2", "4");
$du2 = new Viaje("Dubai", "du2", "7");


$juan = new Pasajero("Juan", "Perez", "2");
$pedro = new Pasajero("Pedro", "Perez", "3");
$jose = new Pasajero("Jose", "Perez", "4");
$martina = new Pasajero("Martina", "Perez", "5");
$viviana = new Pasajero("Viviana", "Perez", "6");
$franco = new Pasajero("Franco", "Perez", "7");
$rodrigo = new Pasajero("Rodrigo", "Perez", "8");

$hw->agregarPasajero($juan);
$hw->agregarPasajero($pedro);
$hw->agregarPasajero($jose);
$hw->agregarPasajero($martina);
$hw->agregarPasajero($viviana);

$hw2->agregarPasajero($juan);
$hw2->agregarPasajero($pedro);
$hw2->agregarPasajero($jose);
$hw2->agregarPasajero($martina);
$hw2->agregarPasajero($viviana);

$du->agregarPasajero($juan);
$du->agregarPasajero($pedro);
$du->agregarPasajero($jose);
$du->agregarPasajero($martina);
$du->agregarPasajero($viviana);

$du2->agregarPasajero($juan);
$du2->agregarPasajero($pedro);
$du2->agregarPasajero($jose);
$du2->agregarPasajero($martina);
$du2->agregarPasajero($viviana);
$du2->agregarPasajero($franco);
$du2->agregarPasajero($rodrigo);

