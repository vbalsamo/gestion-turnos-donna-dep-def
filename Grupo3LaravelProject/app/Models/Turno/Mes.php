<?php

namespace App\Models\Turno;

class Mes
{
    private $año;

    private $mes;

    private $dias;

    private $pasado;

    /**
     * @return mixed
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * @param mixed $año
     */
    public function setAño($año): void
    {
        $this->año = $año;
    }

    /**
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $mes
     */
    public function setMes($mes): void
    {
        $this->mes = $mes;
    }

    /**
     * @return mixed
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @param mixed $dias
     */
    public function setDias($dias): void
    {
        $this->dias = $dias;
    }

    /**
     * @return mixed
     */
    public function getPasado()
    {
        return $this->pasado;
    }

    /**
     * @param mixed $pasado
     */
    public function setPasado($pasado): void
    {
        $this->pasado = $pasado;
    }


}
