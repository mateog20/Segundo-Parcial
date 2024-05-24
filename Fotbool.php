<?php
// Si se trata de un partido de fútbol, se deben gestionar 
// el valor de 3 coeficientes que serán aplicados según la
// categoría del partido (coef_Menores,coef_juveniles,coef_Mayores)
class Fotbool extends Partido
{
    private $coefMenores;
    private $coefJuvenil;
    private $coefMayores;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuvenil = 0.19;
        $this->coefMayores = 0.27;
    }

    public function getCoefMenores()
    {
        return $this->coefMenores;
    }
    public function setCoefMenores($coefMenores)
    {
        $this->coefMenores = $coefMenores;
    }

    public function getCoefJuvenil()
    {
        return $this->coefJuvenil;
    }
    public function setCoefJuvenil($coefJuvenil)
    {
        $this->coefJuvenil = $coefJuvenil;
    }

    public function getCoefMayores()
    {
        return $this->coefMayores;
    }
    public function setCoefMayores($coefMayores)
    {
        $this->coefMayores = $coefMayores;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena;
    }
    /**
     * Metodo de la clase partido redefinido en la clase hija
     */
    public function coeficientePartido()
    {
        $coeficienteBase = parent::coeficientePartido();
        //el valor de 3 coeficientes que serán aplicados según la categoría del partido 
        //(coef_Menores,coef_juveniles,coef_Mayores) 
        if ($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores") {
            $coeficiente = $coeficienteBase * $this->coefMenores;
        }
        if ($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Juveniles") {
            $coeficiente = $coeficienteBase * $this->coefJuvenil;
        }
        if ($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Mayores") {
            $coeficiente = $coeficienteBase * $this->coefMayores;
        }
        return $coeficiente;
    }
}
