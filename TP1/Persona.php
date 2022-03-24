<?php
class Persona{
    private $nombre = "";
    private $edad = 0;
    private $altura = 0;
    private $peso = 0;
    private $sexo = "";

    public function __construct($nombre, $edad, $altura, $peso, $sexo){
        //Metodo constructor de la clase Persona.
        if(is_numeric($altura) && $altura > 0 && is_numeric($peso) && $peso > 0 && is_numeric($edad) && $edad > 0){
            $this->setAltura($altura);
            $this->setEdad($edad);
            $this->setPeso($peso);
            if(is_string($nombre) && is_string($sexo)){
                $this->setSexo($sexo);
                $this->setNombre($nombre);
            } else {
                throw new ErrorException("El sexo y el nombre deben ser cadenas de caracteres.");
            }
        } else {
            throw new ErrorException("Altura, peso y edad deben ser numeros positivos.");
        }
    }

    public function __destruct(){
        //Metodo destructor de la clase Persona.
        "Destruyendo objeto \"Persona\"";
    }

    function cumplirAnios(){
        //Metodo que aumenta la edad de la persona en un año.
        $this->edad++;
    }

    function crecerAltura($centimetros){
        $this->altura += $centimetros;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getEdad(){
        return $this->edad;
    }

    function getAltura(){
        return $this->altura;
    }

    function getPeso(){
        return $this->peso;
    }

    function getSexo(){
        return $this->sexo;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setEdad($edad){
        $this->edad = $edad;
    }

    function setAltura($altura){
        $this->altura = $altura;
    }

    function setPeso($peso){
        $this->peso = $peso;
    }

    function setSexo($sexo){
        $this->sexo = $sexo;
    }

    function __toString(){
        return "Nombre: ".$this->nombre." - Edad: ".$this->edad." - Altura: ".$this->altura." - Peso: ".$this->peso." - Sexo: ".$this->sexo.".\n";
    }
}