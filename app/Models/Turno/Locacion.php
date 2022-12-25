<?php

namespace App\Models\Turno;

class Locacion
{

    private $nombre;

    private $turnos;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTurnos()
    {
        return $this->turnos;
    }

    /**
     * @param mixed $turnos
     */
    public function setTurnos($turnos): void
    {
        $this->turnos = $turnos;
    }



}
