<?php
class Torneo
{
    private $colPartidos;
    private $premio;
    public function __construct($premio)
    {
        $this->colPartidos = array();
        $this->premio = $premio;
    }
    public function getPremio()
    {
        return $this->premio;
    }
    public function setPremio($premio)
    {
        $this->premio = $premio;
    }
    public function getColPartidos()
    {
        return $this->colPartidos;
    }
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }
    public function recorrerColPartidos()
    {
        foreach ($this->colPartidos as $partido) {
            echo $partido;
        }
    }
    public function __toString()
    {
        $mostrar =
            "--------------------------------------------------------" . "\n" .
            "Lista de partidos registrados:". "\n" . $this->recorrerColPartidos() . "\n" ;
            "--------------------------------------------------------" . "\n" .
            "Premio: " . $this->getPremio() . "\n" ;
        return $mostrar;
    }
    /**
     * Metodo solicitado en el punto 4
     * l método debe crear y retornar la instancia de la clase Partido que corresponda 
     * y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser 
     * registrado ese partido en el torneo
     */
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido)
    {
        $equipoRegistrado = 0;
        if (
            $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion() &&
            $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() &&
            $objEquipo1->getNombre() != $objEquipo2->getNombre()
        ) {
            strtoupper($tipoPartido);
            if ($tipoPartido == "FUTBOL") {
                $equipoRegistrado+=2;
                $partido = new Fotbool(1, $fecha, $objEquipo1, 0, $objEquipo2, 0);
                array_push($this->colPartidos, $partido);
                $mostrar = "Se registro el partido" . "\n".
                "La cantidad de equipos registrados es de: ". $equipoRegistrado . "\n";
            } else {
                $equipoRegistrado+=2;
                $partido = new Basket(1, $fecha, $objEquipo1,0 , $objEquipo2, 0, 0);
                array_push($this->colPartidos, $partido);
                $mostrar = "Se registro el partido" . "\n".
                "La cantidad de equipos registrados es de: ". $equipoRegistrado . "\n";
            }
        } else {
            $mostrar = "No se registro el partido" ."\n" .
            "La cantidad de equipos registrados es de: ". $equipoRegistrado . "\n";
        }
        return $mostrar;
    }
    /**
     * Metodo solicitado en el punto 6
     * en base al parámetro busca entre esos partidos los
     * equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
     * objetos de los equipos encontrados
     */
    public function darGanadores($deporte)
    {
        $ganadores = array();

        if ($deporte == "futbol") 
        {
            foreach ($this->colPartidos as $partido) {
                if ($partido->darEquipoGanador() != null) {
                    $ganador = $partido->darEquipoGanador();
                    array_push($ganadores, $ganador);
                }
            }
        }
        if ($deporte == "basquet") 
        {
            foreach ($this->colPartidos as $partido) {
                if ($partido->darEquipoGanador() != null) {
                    $ganador = $partido->darEquipoGanador();
                    array_push($ganadores, $ganador);
                }
            }
        }
        return $ganadores;
    }
    /**
     * Metodo solicitado en el punto 7
     */
    public function calcularPremioPartido($objPartido)
    {
        $coeficiente = $objPartido->coeficientePartido();
        $premioPartido = $coeficiente * $this->getPremio();
        $partido = array(
            'equipoGanador' => $objPartido->darEquipoGanador(),
            'premioPartido' => $premioPartido
        );
        return $partido;
    }
}//class torneo