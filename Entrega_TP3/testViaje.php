<?php
include "Pasajero.php";
include "Viaje.php";
include "ResponsableV.php";
include "Aereo.php";
include "Terrestre.php";

/**
 * Metodo menu que muestra por pantalla las opciones del programa.
 */
function menu()
{
    echo
      "\n+================================+\n" .
        "|         MENU PRINCIPAL         |\n" .
        "¦================================¦\n" .
        "| 1. Crear un viaje              |\n" .
        "| 2. Vender pasaje               |\n" .
        "| 3. Modificar datos de pasajero |\n" .
        "| 4. Eliminar pasajero           |\n" .
        "| 5. Mostrar datos del viaje     |\n" .
        "| 6. Salir                       |\n" .
        "+================================+\n\n";
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
 * Metodo para eliminar un pasajero de un viaje especifico.
 * @param object $codViaje
 */
function eliminarPasajero($codViaje)
{
    echo "\n+===============================\n";
    $nombre = readline("Ingrese el DNI del pasajero a eliminar: ");
    $codViaje->eliminarPasajero($nombre);
    echo "+===============================\n\n";
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
 * Modifica los datos de un pasajero especifico
 * @param object $viaje
 */
function modificarPasajero($viaje)
{
    $pasajeros = $viaje->getPasajeros();

    $indice = 1; // Para mostrar el indice de los pasajeros
    echo "\n+===============================\n";
    echo "Pasajeros:\n";
    foreach ($pasajeros as $pasajero) {
        echo $indice . ". " . $pasajero->getNombre() . 
        " " . $pasajero->getApellido() . 
        " " . $pasajero->getDni() . 
        " " . $pasajero->getTelefono() . "\n";
        $indice++;
    }
    echo "+===============================\n";

    // Ingresar el indice del pasajero en la lista.
    $indice = readline("Ingrese el numero del pasajero a modificar: ");

    echo "\n";
    $nombre = readline("Ingrese el nuevo nombre: ");
    $apellido = readline("Ingrese el nuevo apellido: ");
    $dni = readline("Ingrese el nuevo DNI: ");
    $telefono = readline("Ingrese el nuevo telefono: ");

    $pasajeros[$indice - 1] = new Pasajero($nombre, $apellido, $dni, $telefono);

    $viaje->setPasajeros($pasajeros);
    echo "+===========================================+
    \n|El pasajero se ha modificado correctamente.|
    \n+===========================================+\n";
}

/**
 * Metodo main.
 * Muestra el menu y ejecuta las funciones correspondientes.
 */
function main()
{
    // Incializar datos predefinidos.
    // Crear Pasajeros
    $juan = new Pasajero("Juan",    "Perez",     "12345678",    "2994568778");
    $pedro = new Pasajero("Pedro",  "Gomez",     "87654321",    "2995438721");
    $jose = new Pasajero("Jose",    "Gonzalez",  "98765432",    "2996548732");
    $maria = new Pasajero("Maria",  "Lopez",     "54321678",    "2995168778");
    $martin = new Pasajero("Martin", "Gomez",    "87675321",    "2995438721");
    $toto = new Pasajero("Toto",    "Gomez",     "87234321",    "2995438721");
    $aaron = new Pasajero("Aaron",  "Acosta",    "41837661",    "2995438721");
    $santi = new Pasajero("Santi",  "Yaitul",    "43130803",    "2995438721");
    $alan = new Pasajero("Alan",    "Vera",      "41591948",    "2995438721");

    // Almacenar pasajeros como array
    $pasajeros = array(
        $juan,
        $pedro,
        $jose,
        $maria,
        $martin,
        $toto,
        $aaron,
        $santi,
        $alan
    );

    // Crear Responsables
    $rJuan = new ResponsableV("Juan", "Perez", "1", "2994568778");
    $rAaron = new ResponsableV("Aaron", "Acosta", "666", "2995438721");
    $rSanti = new ResponsableV("Santi", "Yaitul", "69", "2995438721");
    $rAlan = new ResponsableV("Alan", "Vera", "420", "2995438721");

    // Crear Viajes
    $Cor = new Aereo("Cordoba", "Cor", "4", $rJuan, "17000", "ambos", "432", "ArgVuelos", "0");
    $Tuc = new Terrestre("Tucuman", "Tuc", "6", $rAaron, "7400", "ida");
    $BsAs = new Aereo("BuenosAires", "BsAs", "3", $rSanti, "13000", "ida", "765", "Aereolineas Arg", "3");
    $Ros = new Terrestre("Rosario", "Ros", "7", $rAlan, "1800", "ambos");

    // Almacenar viajes como array
    $viajes = array();
    array_push($viajes, $Cor);
    array_push($viajes, $Tuc);
    array_push($viajes, $BsAs);
    array_push($viajes, $Ros);

    // Agregar una cantidad razonable de pasajeros a cada viaje.
    foreach ($viajes as $viaje) {
        $indice = rand(0, count($pasajeros) - ($viaje->getCantMaxPasajeros() + 1));
        do {
            $viaje->agregarPasajero($pasajeros[$indice]);
            $indice++;
        } while ($viaje->hayPasajesDisponible());
    }

    $destinosAlmacenados = $viajes;

    // Menu principal.
    do {
        menu();
        $opcion = readline("Ingrese una opcion: ");
        switch ($opcion) {
            case 1: // Agregra un nuevo viaje.
                echo "\n+===============================\n";
                // Crear Datos basicos del viaje.
                $destino = readline("Ingrese el destino: ");
                $codViaje = readline("Ingrese el codigo del viaje: ");
                $cantMaxPasajeros = readline("Ingrese la cantidad maxima de pasajeros: ");
                $importe = readline("Ingrese el importe: ");
                $idavuelta = readline("Ingrese si el viaje es \"ida\", \"vuelta\" o \"ambos\": ");
                echo "+===============================\n\n";
                // Responsable del viaje.
                $nombre = readline("Ingrese el nombre del responsable: ");
                $apellido = readline("Ingrese el apellido del responsable: ");
                $numeroEmpleado = readline("Ingrese el numero de empleado: ");
                $numeroLicencia = readline("Ingrese el numero de licencia: ");
                $responsableViaje = new responsableV($nombre, $apellido, $numeroEmpleado, $numeroLicencia);
                echo "+===============================\n\n";
                // Especificar datos del viaje segun su tipo.
                $tipoViaje = readline("Ingrese el tipo de viaje (aereo / terrestre): ");
                if (strtolower($tipoViaje) == "aereo") {
                    $numVuelo = readline("Ingrese el numero de vuelo: ");
                    $nomAereolinea = readline("Ingrese el nombre de la aereolinea: ");
                    $cantEscalas = readline("Ingrese la cantidad de escalas: ");
                    $$codViaje = new Aereo($destino, $codViaje, $cantMaxPasajeros, $responsableViaje, $importe, $idavuelta, $numVuelo, $nomAereolinea, $cantEscalas);
                    array_push($destinosAlmacenados, $$codViaje);
                } else if (strtolower($tipoViaje) == "terrestre") {
                    $$codViaje = new Terrestre($destino, $codViaje, $cantMaxPasajeros, $responsableViaje, $importe, $idavuelta);
                    array_push($destinosAlmacenados, $$codViaje);
                } else {
                    echo "Tipo de viaje invalido.\n";
                }
                break;
            case 2: // Vender pasaje.
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    if ($$codViaje->hayPasajesDisponible()) {
                        echo "\n+===============================\n";
                        $nombre = readline("Ingrese el nombre del pasajero: ");
                        $apellido = readline("Ingrese el apellido del pasajero: ");
                        $dni = readline("Ingrese el dni del pasajero: ");
                        $telefono = readline("Ingrese el telefono del pasajero: ");
                        echo "+===============================\n\n";
                        if (get_class($$codViaje) == "Aereo") {
                            $tipoAsiento = readline("Ingrese el tipo de asiento (primera / economico): ");
                            echo "El importe a pagar: " . $$codViaje->venderPasaje(new Pasajero($nombre, $apellido, $dni, $telefono), $tipoAsiento);
                        } else if (get_class($$codViaje) == "Terrestre") {
                            $tipoAsiento = readline("Ingrese el tipo de asiento (cama / semicama): ");
                            echo "El importe a pagar: " . $$codViaje->venderPasaje(new Pasajero($nombre, $apellido, $dni, $telefono), $tipoAsiento);
                        } else {
                            echo "Tipo de viaje invalido.\n";
                        }
                    } else {
                        echo "Excede el limite de pasajeros.\n";
                    }
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                }
                break;
            case 3: // Modificar un pasajero.
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    modificarPasajero($$codViaje);
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                }
                break;
            case 4: // Eliminar un pasajero.
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    eliminarPasajero($$codViaje);
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                };
                break;
            case 5: // Listar viajes y pasajeros de cada uno.
                $codViaje = readline("Ingrese el codigo del viaje: ");
                if (destinoExiste($destinosAlmacenados, $codViaje)) {
                    verDatos($$codViaje);
                } else {
                    echo "\nNo existe el viaje de codigo " . $codViaje . ".\n";
                };
                break;
            case 6:
                time_nanosleep(0, 300000000);
                echo "\n\t◢ ========================◣\n";
                echo "\t‖     Saliendo...         ‖\n";
                echo "\t◥ ========================◤\n\n";
                time_nanosleep(0, 500000000);
                break;
            default:
                echo "Opcion invalida\n";
        }
    } while ($opcion != 6);

    echo "Destruyendo intancias...\n";
}

main();
