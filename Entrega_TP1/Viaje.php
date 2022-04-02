<?php
class Viaje
{
    private $destino;
    private $codigo;
    private $cantMaxPasajeros;
    private $pasajeros;

    // Constructor
    public function __construct($destino, $codigo, $cantMaxPasajeros)
    {
        $this->setDestino($destino);
        $this->setCodigo($codigo);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->pasajeros = array();
    }

    // Setter
    private function setDestino($destino)
    {
        $this->destino = $destino;
    }

    private function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    private function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    private function setPasajero($pasajero)
    {
        $nuevoPasajero = ["Nombre" => $pasajero->getNombre(), "Apellido" => $pasajero->getApellido(), "DNI" => $pasajero->getDni()];
        array_push($this->pasajeros, $nuevoPasajero);
    }

    // Getter
    public function getDestino()
    {
        return $this->destino;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }

    public function getStringPasajeros()
    {
        if (count($this->pasajeros) > 0) {
            $stringPasajeros = "Pasajeros: \nNombre Apellido DNI\n";
            foreach ($this->pasajeros as $pasajero) {
                $stringPasajeros = $stringPasajeros . $pasajero["Nombre"] . " " . $pasajero["Apellido"] . " " . $pasajero["DNI"] . "\n";
            }
        } else {
            $stringPasajeros = "No hay pasajeros en el viaje";
        }
        return $stringPasajeros;
    }

    // Métodos
    public function agregarPasajero($pasajero)
    {
        if (count($this->pasajeros) < $this->cantMaxPasajeros) {
            $this->setPasajero($pasajero);
        }
    }

    private function existePasajero($dni)
    {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero["DNI"] == $dni) {
                return true;
            }
        }
        return false;
    }

    public function eliminarPasajero($dni)
    {
        if ($this->existePasajero($dni)) {
            foreach ($this->pasajeros as $key => $pasajero) {
                if ($pasajero["DNI"] == $dni) {
                    unset($this->pasajeros[$key]);
                }
            }
            echo "Se ha eliminado el pasajero de DNI: " . $dni . "\n";
        } else {
            echo "No existe el pasajero.\n";
        }
    }

    public function hayCapacidad()
    {
        return count($this->pasajeros) < $this->cantMaxPasajeros;
    }

    // Funciones magicas
    public function __toString()
    {
        return "\n◢=======================================◣" .
            "\nDestino: " . $this->getDestino() .
            "\nCodigo: " . $this->getCodigo() .
            "\nCantidad maxima de pasajeros: " . $this->getCantMaxPasajeros() .
            "\n" . $this->getStringPasajeros() .
            "\n◥=======================================◤\n";
    }

    public function __destruct()
    {
        echo "Instancia de viaje a " . $this->getDestino() . " destruida.\n";
    }
}
