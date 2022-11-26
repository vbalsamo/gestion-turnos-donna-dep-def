<?php

namespace App\Models\Personas;

class Profesional
{

    private $nombre;

    private $especialidades;

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
    public function getEspecialidades()
    {
        return $this->especialidades;
    }

    /**
     * @param mixed $especialidades
     */
    public function setEspecialidades($especialidades): void
    {
        $this->especialidades = $especialidades;
    }

}
