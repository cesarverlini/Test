<?php
class Estudios
{
    // private $escuela = "";
    // private $gradoestudio = 0;
    // private $fechainicio = "";
    // private $fechafin = "";

    private $datos = array();

    public function getEscuela()
    {
        return $this->escuela;
    }
    public function getGradoEstudio()
    {
        return $this->gradoestudio;
    }
    public function getFechaInicio()
    {
        return $this->fechainicio;
    }
    public function getFechaFin()
    {
        return $this->fechafin;
    }
    public function setEscuela($escuela)
    {
        $this->escuela = $escuela;
    }
    public function setGradoEstudio($gradoestudio)
    {
        $this->gradoestudio = $gradoestudio;
    }
    public function setFechaInicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
    }
    public function setFechaFin($fechafin)
    {
        $this->fechafin = $fechafin;
    }
    public function DatosArray()
    {
        $this->datos = array(
            'escuela' => $this->escuela,
            'gradoestudio' => $this->gradoestudio,
            'fechainicio' => $this->fechainicio,
            'fechafin' => $this->fechafin
        );
        return $this->datos;
    }

    public function validacion()
    {
        $escuela = $this->getEscuela();
        $gradoestudio = $this->getGradoEstudio();
        $fechainicio = $this->getFechaInicio();
        $fechafin = $this->getFechaFin();

        $data = array(
            'Escuela' => $escuela,
            'GradoEstudio' => $gradoestudio,
            'FechaInicio' => $fechainicio,
            'FechaFin' => $fechafin
        );

        if ($escuela != "" && $gradoestudio != "" && $fechainicio != "" && $fechafin != "") {
            return "true";
        }else{
            return "false";
        }
    }
}
