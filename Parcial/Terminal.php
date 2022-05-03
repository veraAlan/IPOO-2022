<?php
class Terminal
{
    private $denominacion;
    private $direccion;
    private array $empresas_registradas;

    // Constructor.
    public function __construct($denominacion, $direccion, $empresas_registradas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->empresas_registradas = $empresas_registradas;
    }

    // Getters.
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getEmpresasRegistradas()
    {
        return $this->empresas_registradas;
    }

    // Setters.
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setEmpresasRegistradas($empresas_registradas)
    {
        $this->empresas_registradas = $empresas_registradas;
    }

    // Metodos.
    public function ventaAutomatica($cantAsientos, $fecha, $destino, $empresa)
    {
        $empresas_registradas = $this->getEmpresasRegistradas();
        foreach ($empresas_registradas as $empresa_registrada) {
            if ($empresa_registrada->getIdentificacion() == $empresa->getIdentificacion()) {
                foreach ($empresa_registrada->getColeccion_viajes() as $viaje) {
                    if ($viaje->getDestino() == $destino && $viaje->getFecha() == $fecha) {
                        echo $empresa_registrada->venderViajeADestino($cantAsientos, $destino);
                    }
                }
            }
        }
    }

    public function empresaMayorRecaudacion()
    {
        $mayor_recaudacion = 0;
        $empresa_mayor_recaudacion = null;
        $empresas_registradas = $this->getEmpresasRegistradas();
        foreach ($empresas_registradas as $empresa_registrada) {
            if ($empresa_registrada->montoRecaudado() > $mayor_recaudacion) {
                $mayor_recaudacion = $empresa_registrada->montoRecaudado();
                $empresa_mayor_recaudacion = $empresa_registrada;
            }
        }

        return $empresa_mayor_recaudacion;
    }

    public function responsableViaje($numeroViaje)
    {
        $empresas_registradas = $this->getEmpresasRegistradas();
        foreach ($empresas_registradas as $empresa_registrada) {
            foreach ($empresa_registrada->getColeccion_viajes() as $viaje) {
                if ($viaje->getNumero() == $numeroViaje) {
                    return $viaje->getResponsable();
                }
            }
        }

        return null;
    }

    // Metodos magicos.
    public function __toString()
    {
        return "Denominacion: " . $this->denominacion . "\nDireccion: " . $this->direccion . "\n";
    }
}
