<?php

namespace App\Models\Turno;

class Dia
{

    private $diaNum;

    private $diaNom;

    private $turnos;

    private $activo;

    /**
     * @param $diaNum
     * @param $diaNom
     */
    public function __construct($diaNum, $diaNom)
    {
        $this->diaNum = $diaNum;
        $this->diaNom = $diaNom;
        $this->activo = true;
    }


    /**
     * @return mixed
     */
    public function getDiaNum()
    {
        return $this->diaNum;
    }

    /**
     * @param mixed $diaNum
     */
    public function setDiaNum($diaNum): void
    {
        $this->diaNum = $diaNum;
    }

    /**
     * @return mixed
     */
    public function getDiaNom()
    {
        return $this->diaNom;
    }

    /**
     * @param mixed $diaNom
     */
    public function setDiaNom($diaNom): void
    {
        $this->diaNom = $diaNom;
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
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo): void
    {
        $this->activo = $activo;
    }



}
