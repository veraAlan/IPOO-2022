<?php
/**
 * Metodo menu que muestra por pantalla las opciones del programa.
 */
function menu()
{
    echo
    "\n◢==============================◣\n" .
        "|        MENU PRINCIPAL        |\n" .
        "¦==============================¦\n" .
        "| 1. Crear un viaje            |\n" .
        "| 2. Agregar pasajero          |\n" .
        "| 3. Eliminar pasajero         |\n" .
        "| 4. Mostrar datos del viaje   |\n" .
        "| 5. Salir                     |\n" .
        "◥==============================◤\n\n";
}

/**
 * Metodo para visualizar los datos de un viaje.
 * @param object $viaje
 */
function verDatos($codViaje)
{
    echo $codViaje;
}

/**
 * Metodo para agregar un pasajero a un viaje especifico.
 * @param object $codViaje
 */
function agPasajero($codViaje)
{
    echo "\n◢===============================\n";
    $nombre = readline("Ingrese el nombre del pasajero: ");
    $apellido = readline("Ingrese el apellido del pasajero: ");
    $dni = readline("Ingrese el dni del pasajero: ");
    echo "◥===============================\n\n";

    $codViaje->agregarPasajero(new Pasajero($nombre, $apellido, $dni));
}

/**
 * Metodo para eliminar un pasajero de un viaje especifico.
 * @param object $codViaje
 */
function eliminarPasajero($codViaje)
{
    echo "\n◢===============================\n";
    $nombre = readline("Ingrese el DNI del pasajero a eliminar: ");
    $codViaje->eliminarPasajero($nombre);
    echo "◥===============================\n\n";
}

/**
 * Metodo para buscar en el almacenamiento si existe un viaje con el codigo ingresado.
 * @param array $destinosAlmacenados
 * @param object $codViaje
 * @return bool
 */
function destinoExiste($destinosAlmacenados, $codViaje)
{
    foreach ($destinosAlmacenados as $destino) {
        if ($destino->getCodigo() == $codViaje) {
            return true;
        }
    }
    return false;
}

/**
 * Metodo main.
 * Muestra el menu y ejecuta las funciones correspondientes.
 */
function main()
{
    $destinosAlmacenados = [];
    do {
        menu();
        $opcion = readline("Ingrese una opcion: ");
        switch ($opcion) {
            case 1:
                echo "\n◢===============================\n";
                $destino = readline("Ingrese el destino: ");
                $codViaje = readline("Ingrese el codigo: ");
                $cantMaxPasajeros = readline("Ingrese la cantidad maxima de pasajeros: ");
                echo "◥===============================\n\n";
                $$codViaje = new Viaje($destino, $codViaje, $cantMaxPasajeros);
                array_push($destinosAlmacenados, $$codViaje);
                echo "Viaje con destino a " . $destino . " creado.\n";
                break;
            case 2:
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    if ($$codViaje->hayCapacidad()) {
                        agPasajero($$codViaje);
                    } else {
                        echo "Excede el limite de pasajeros.\n";
                    };
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                }
                break;
            case 3:
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    eliminarPasajero($$codViaje);
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                };
                break;
            case 4:
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    verDatos($$codViaje);
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                };
                break;
            case 5:
                echo "Saliendo...\n";
                break;
            default:
                echo "Opcion invalida\n";
        }
    } while ($opcion != 5);

    echo "Destruyendo intancias...\n";
}
