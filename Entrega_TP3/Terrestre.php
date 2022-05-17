<?php
class Terrestre extends Viaje {
    /**
     * Constructor
     */
    public function __construct($destino, $codigo, $cantMaxPasajeros, $responsable, $importe, $idavuelta)
    {
        parent::__construct($destino, $codigo, $cantMaxPasajeros, $responsable, $importe, $idavuelta);
    }

    // Getter
    public function getComodidadAsiento()
    {
        return $this->comodidadAsiento;
    }

    // Setter
    public function setComodidadAsiento($comodidadAsiento)
    {
        $this->comodidadAsiento = $comodidadAsiento;
    }

    // Metodos
    /**
     * Vende pasaje y retorna el importe a pagar.
     * @param string $comodidadAsiento
     * @return float
     */
    public function venderPasaje($comodidadAsiento)
    {
        $importe = $this->getImporte();
        if (strtolower($comodidadAsiento) == "cama") {
            $importe *= 1.4;
        } else if (strtolower($comodidadAsiento) != "semicama") {
            throw new Exception("Categoria de asiento no valida");
        }

        return $importe;
    }
}