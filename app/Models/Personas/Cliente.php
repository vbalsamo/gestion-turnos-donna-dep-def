<?php

namespace App\Models\Personas;

class Cliente
{

    private $nombre;

    private $telefono;

    private $adeuda;

    private $profesionalPreferido;

    private $turnos;

    private $IDusuario;

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
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getAdeuda()
    {
        return $this->adeuda;
    }

    /**
     * @param mixed $adeuda
     */
    public function setAdeuda($adeuda): void
    {
        $this->adeuda = $adeuda;
    }

    /**
     * @return mixed
     */
    public function getProfesionalPreferido()
    {
        return $this->profesionalPreferido;
    }

    /**
     * @param mixed $profesionalPreferido
     */
    public function setProfesionalPreferido($profesionalPreferido): void
    {
        $this->profesionalPreferido = $profesionalPreferido;
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

    /**
     * @return mixed
     */
    public function getIDusuario()
    {
        return $this->IDusuario;
    }

    /**
     * @param mixed $IDusuario
     */
    public function setIDusuario($IDusuario): void
    {
        $this->IDusuario = $IDusuario;
    }


}
