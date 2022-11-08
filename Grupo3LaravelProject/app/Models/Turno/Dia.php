<?php

namespace App\Models\Turno;

class Dia
{

    private $diaNum;

    private $diaNom;

    private $horarios;

    private $pasado;

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
    public function getHorarios()
    {
        return $this->horarios;
    }

    /**
     * @param mixed $horarios
     */
    public function setHorarios($horarios): void
    {
        $this->horarios = $horarios;
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
