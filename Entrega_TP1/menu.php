<?php
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

function verDatos($obj)
{
    echo $obj;
}

function agPasajero($obj)
{
    echo "\n◢===============================\n";
    $nombre = readline("Ingrese el nombre del pasajero: ");
    $apellido = readline("Ingrese el apellido del pasajero: ");
    $dni = readline("Ingrese el dni del pasajero: ");
    echo "◥===============================\n\n";

    $obj->agregarPasajero(new Pasajero($nombre, $apellido, $dni));
}

function eliminarPasajero($obj)
{
    echo "\n◢===============================\n";
    $nombre = readline("Ingrese el DNI del pasajero a eliminar: ");
    $obj->eliminarPasajero($nombre);
    echo "◥===============================\n\n";
}

function destinoExiste($destinos, $codigo)
{
    foreach($destinos as $destino) {
        if ($destino->getCodigo() == $codigo) {
            return true;
        }
    }
    return false;
}

function main()
{
    $destinos = [];
    do {
        menu();
        $opcion = readline("Ingrese una opcion: ");
        switch ($opcion) {
            case 1:
                echo "\n◢===============================\n";
                $destino = readline("Ingrese el destino: ");
                $codigo = readline("Ingrese el codigo: ");
                $cantMaxPasajeros = readline("Ingrese la cantidad maxima de pasajeros: ");
                echo "◥===============================\n\n";
                $$codigo = new Viaje($destino, $codigo, $cantMaxPasajeros);
                array_push($destinos, $$codigo);
                echo "Viaje con destino a " . $destino . " creado.\n";
                break;
            case 2:
                $codigo = readline("Ingrese el codigo del viaje: ");
                if(destinoExiste($destinos, $codigo)){
                    if ($$codigo->hayCapacidad()) {
                        agPasajero($$codigo);
                    } else {
                        echo "Excede el limite de pasajeros.\n";
                    };
                } else {
                    echo "No existe el viaje de codigo " . $codigo . ".\n";
                }
                break;
            case 3:
                $codigo = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinos, $codigo)) {
                    eliminarPasajero($$codigo);
                } else {
                    echo "No existe el viaje de codigo " . $codigo . ".\n";
                };
                break;
            case 4:
                $codigo = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinos, $codigo)) {
                    verDatos($$codigo);
                } else {
                    echo "No existe el viaje de codigo " . $codigo . ".\n";
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