<?php
class Aereo extends Viaje
{
    private $numeroVuelo;
    private $nombreAereolinea;
    private $cantidadEscalas;

    /**
     * Constructor
     * @param string $destino
     * @param string $codigo
     * @param int $cantMaxPasajeros
     * @param object $responsable
     * @param float $importe
     * @param int $idavuelta
     * @param string $numeroVuelo
     * @param string $nombreAereolinea
     * @param int $cantidadEscalas
     */
    public function __construct($destino, $codigo, $cantMaxPasajeros, $responsable, $importe, $idavuelta, $numeroVuelo, $nombreAereolinea, $cantidadEscalas)
    {
        parent::__construct($destino, $codigo, $cantMaxPasajeros, $responsable, $importe, $idavuelta);
        $this->numeroVuelo = $numeroVuelo;
        $this->nombreAereolinea = $nombreAereolinea;
        $this->cantidadEscalas = $cantidadEscalas;
    }

    // Getter
    public function getNumeroVuelo()
    {
        return $this->numeroVuelo;
    }

    public function getNombreAereolinea()
    {
        return $this->nombreAereolinea;
    }

    public function getCantidadEscalas()
    {
        return $this->cantidadEscalas;
    }

    // Setter
    public function setNumeroVuelo($numeroVuelo)
    {
        $this->numeroVuelo = $numeroVuelo;
    }

    public function setNombreAereolinea($nombreAereolinea)
    {
        $this->nombreAereolinea = $nombreAereolinea;
    }

    public function setCantidadEscalas($cantidadEscalas)
    {
        $this->cantidadEscalas = $cantidadEscalas;
    }

    // Metodos
    /**
     * Vende pasaje y retorna el importe a pagar.
     * @param object $pasajero
     * @param string $categoriAsiento
     * @return float
     */
    public function venderPasaje($pasajero, $categoriaAsiento)
    {
        $importe = $this->getImporte();
        if (strtolower($categoriaAsiento) == "primera" && $this->getCantidadEscalas() == 0) {
            $importe *= 1.4;
            $this->agregarPasajero($pasajero);
        } else if (strtolower($categoriaAsiento) == "primera" && $this->getCantidadEscalas() > 0) {
            $importe *= 1.6;
            $this->agregarPasajero($pasajero);
        } else if (strtolower($categoriaAsiento) != "economico") {
            throw new Exception("Categoria de asiento no valida");
        }

        return $importe;
    }

    // Funciones magicas
    public function __toString()
    {
        return parent::__toString() . "\nAereolinea: " . $this->nombreAereolinea . "\nNumero de vuelo: " . $this->numeroVuelo . "\nCantidad de escalas: " . $this->cantidadEscalas . "\n";
    }
}
