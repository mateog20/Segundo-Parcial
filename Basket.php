<?php
// si se trata de un partido de basquetbol se almacena la cantidad de infracciones de manera tal que
// al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la
// cantidad de infracciones
class Basket extends Partido
{
    private $infracciones;
    private $coefPenalizacion;
    
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->setInfracciones($infracciones);
        $this->coefPenalizacion = 0.75;
    }
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($coefPenalizacion){
        $this->coefPenalizacion = $coefPenalizacion;
    }
    public function getInfracciones(){
        return $this->infracciones;
    }
    public function setInfracciones($infracciones){
        $this->infracciones = $infracciones;
    }
    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= "Infracciones: " . $this->infracciones . "\n";
        return $cadena;
    }
    /**
     * Metodo de la clase partido redefinido en la clase hija
     */
    public function coeficientePartido()
    {
        $coeficienteBase = parent::coeficientePartido();
        //coef = coeficiente_base_partido - (coef_penalización*cant_infracciones)
        $coeficiente = $coeficienteBase - ($this->coefPenalizacion * $this->infracciones);
        return $coeficiente;
    }
}
