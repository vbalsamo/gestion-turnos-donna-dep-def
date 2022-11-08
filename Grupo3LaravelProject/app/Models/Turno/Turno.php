<?php

namespace App\Models\Turno;

class Turno
{

    private $fecha;

    private $hora;

    private $cliente;

    private $profesional;

    private $tratamiento;

    private $locacion;

    private $proximo;

    private $cancelado;

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
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
