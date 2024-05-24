<?php
class Partido
{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
    {
        $this->idpartido = $idpartido;
        $this->fecha = $fecha;
        $this->objEquipo1 = $objEquipo1;
        $this->cantGolesE1 = $cantGolesE1;
        $this->objEquipo2 = $objEquipo2;
        $this->cantGolesE2 = $cantGolesE2;
        $this->coefBase = 0.5;
    }

    //OBSERVADORES
    public function setidpartido($idpartido)
    {
        $this->idpartido = $idpartido;
    }

    public function getIdpartido()
    {
        return $this->idpartido;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        return $this->fecha;
    }


    public function setCantGolesE1($cantGolesE1)
    {
        $this->cantGolesE1 = $cantGolesE1;
    }

    public function getCantGolesE1()
    {
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2)
    {
        $this->cantGolesE2 = $cantGolesE2;
    }

    public function getCantGolesE2()
    {
        return $this->cantGolesE2;
    }



    public function setObjEquipo1($objEquipo1)
    {
        $this->objEquipo1 = $objEquipo1;
    }
    public function getObjEquipo1()
    {
        return $this->objEquipo1;
    }


    public function setObjEquipo2($objEquipo2)
    {
        $this->objEquipo2 = $objEquipo2;
    }
    public function getObjEquipo2()
    {
        return $this->objEquipo2;
    }
    public function setCoefBase($coefBase)
    {
        $this->coefBase = $coefBase;
    }
    public function getCoefBase()
    {
        return $this->coefBase;
    }



    public function __toString()
    {
        //string $cadena
        $cadena = "idpartido: " . $this->getIdpartido() . "\n";
        $cadena = $cadena . "Fecha: " . $this->getFecha() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 1> " . "\n" . $this->getObjEquipo1() . "\n";
        $cadena = $cadena . "Cantidad Goles E1: " . $this->getCantGolesE1() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        $cadena = $cadena . "<Equipo 2> " . "\n" . $this->getObjEquipo2() . "\n";
        $cadena = $cadena . "Cantidad Goles E2: " . $this->getCantGolesE2() . "\n";
        $cadena = $cadena . "\n" . "--------------------------------------------------------" . "\n";
        return $cadena;
    }
    /**
     * Metodo solicitado en el punto 3
     * Retorna el equipo ganador en UN partido,en caso de empate debe retornar a los dos equipos
     */
    public function darEquipoGanador()
    {
       $ganador ="";
        if ($this->getCantGolesE1() > $this->getCantGolesE2()) {
           $ganador = "Ganador del partido: ".$this->getObjEquipo1()->getNombre();
        } 
        elseif ($this->getCantGolesE1() < $this->getCantGolesE2()) {
            $ganador = "Ganador del partido: ".$this->getObjEquipo2()->getNombre();
        } 
        else
        {
           $ganador = "Empate entre :".$this->getObjEquipo1()->getNombre()." y ".$this->getObjEquipo2()->getNombre();
        }
        return $ganador;
    }
    /**
     * Metodo solicitado en el punto 5
     * retorna el valor obtenido por el coeficiente base, 
     * multiplicado por la cantidad de goles y la cantidad de jugadores
     * Retorna el coeficiente del partido, metodo que se debe redefinir en las clases hijas
     */
    public function coeficientePartido()
    {
        $coeficiente = $this->getCoefBase() * ($this->getCantGolesE1() + $this->getCantGolesE2());
        return $coeficiente;
    }
} //class partido
