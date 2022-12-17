<?php

namespace App\Models\Turno;

class Turno
{

    private $diaId;
    private $hora;
    private $cliente;

    private $profesional;

    private $tratamiento;

    private $locacion;

    private $proximo;

    private $cancelado;

    /**
     * @param $fecha
     * @param $hora
     * @param $cliente
     * @param $profesional
     * @param $tratamiento
     * @param $locacion
     */
    public function __construct($diaID, $hora, $cliente, $profesional, $tratamiento, $locacion)
    {
        $this->diaId = $diaID;
        $this->hora = $hora;
        $this->cliente = $cliente;
        $this->profesional = $profesional;
        $this->tratamiento = $tratamiento;
        $this->locacion = $locacion;
        $this->proximo = true;
        $this->cancelado = false;
    }

    /**
     * @return mixed
     */
    public function getDiaId()
    {
        return $this->diaId;
    }

    public function getFecha(){
        return DB::selectOne("SELECT * FROM dia WHERE id = {{$this->diaId}}");
    }

    /**
     * @param mixed $diaId
     */
    public function setDiaId($diaId): void
    {
        $this->diaId = $diaId;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora): void
    {
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getProfesional()
    {
        return $this->profesional;
    }

    /**
     * @param mixed $profesional
     */
    public function setProfesional($profesional): void
    {
        $this->profesional = $profesional;
    }

    /**
     * @return mixed
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * @param mixed $tratamiento
     */
    public function setTratamiento($tratamiento): void
    {
        $this->tratamiento = $tratamiento;
    }

    /**
     * @return mixed
     */
    public function getLocacion()
    {
        return $this->locacion;
    }

    /**
     * @param mixed $locacion
     */
    public function setLocacion($locacion): void
    {
        $this->locacion = $locacion;
    }

    /**
     * @return mixed
     */
    public function getProximo()
    {
        return $this->proximo;
    }

    /**
     * @param mixed $proximo
     */
    public function setProximo($proximo): void
    {
        $this->proximo = $proximo;
    }

    /**
     * @return mixed
     */
    public function getCancelado()
    {
        return $this->cancelado;
    }

    /**
     * @param mixed $cancelado
     */
    public function setCancelado($cancelado): void
    {
        $this->cancelado = $cancelado;
    }


}
