<?php
if(isset($_POST['getEmpleados'])){
    $obj = new Empleado();
    echo json_encode($obj->getEmpleados());
}

class Empleado
{

    private $datos = array();
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidoP()
    {
        return $this->ApellidoP;
    }
    public function getApellidoM()
    {
        return $this->ApellidoM;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getFechaNacimiento()
    {
        return $this->fechanacimiento;
    }
    public function getNumEmpleado()
    {
        return $this->numeroempleado;
    }
    public function getNumPension()
    {
        return $this->numeropension;
    }
    public function getFoto()
    {
        return $this->fotografia;
    }
    public function getCurp()
    {
        return $this->curp;
    }
    public function getRFC()
    {
        return $this->rfc;
    }
    public function getEstadoCivil()
    {
        return $this->estadocivil;
    }
    public function getSangre()
    {
        return $this->tiposangre;
    }
    public function getEstatura()
    {
        return $this->estatura;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getComplexion()
    {
        return $this->complexion;
    }
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getMunicipio()
    {
        return $this->municipio;
    }
    public function getLocalidad()
    {
        return $this->localidad;
    }
    public function getColonia()
    {
        return $this->colonia;
    }
    public function getTipoVialidad()
    {
        return $this->tipovialidad;
    }
    public function getNombreVialidad()
    {
        return $this->nombrevialidad;
    }
    public function getNumeroExterior()
    {
        return $this->numeroexterior;
    }
    public function getNumeroInterior()
    {
        return $this->numerointenrior;
    }
    // public function getEscuela()
    // {
    //     return $this->escuela;
    // }
    // public function getGradoEstudio()
    // {
    //     return $this->gradoestudio;
    // }
    // public function getFechaInicio()
    // {
    //     return $this->fechainicio;
    // }
    // public function getFechaFin()
    // {
    //     return $this->fechafin;
    // }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellidoP($ApellidoP)
    {
        $this->ApellidoP = $ApellidoP;
    }
    public function setApellidoM($ApellidoM)
    {
        $this->ApellidoM = $ApellidoM;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setFechaNacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;
    }
    public function setNumEmpleado($numeroempleado)
    {
        $this->numeroempleado = $numeroempleado;
    }
    public function setNumPension($numeropension)
    {
        $this->numeropension = $numeropension;
    }
    public function setFoto($fotografia)
    {
        $this->fotografia = $fotografia;
    }
    public function setCurp($curp)
    {
        $this->curp = $curp;
    }
    public function setRFC($rfc)
    {
        $this->rfc = $rfc;
    }
    public function setEstadoCivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;
    }
    public function setSangre($tiposangre)
    {
        $this->tiposangre = $tiposangre;
    }
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function setComplexion($complexion)
    {
        $this->complexion = $complexion;
    }
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad = $discapacidad;
    }
    public function setPais($pais)
    {
        $this->pais = $pais;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;
    }
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;
    }
    public function setTipoVialidad($tipovialidad)
    {
        $this->tipovialidad = $tipovialidad;
    }
    public function setNombreVialidad($nombrevialidad)
    {
        $this->nombrevialidad = $nombrevialidad;
    }
    public function setNumeroExterior($numeroexterior)
    {
        $this->numeroexterior = $numeroexterior;
    }
    public function setNumeroInterior($numerointenrior)
    {
        $this->numerointenrior = $numerointenrior;
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
        // $datos = array();
        $this->datos['datosgenerales'] = array(
            'Nombre' => $this->nombre,
            'ApellidoP' => $this->ApellidoP,
            'ApellidoM' => $this->ApellidoM,
            'sexo' => $this->sexo,
            'fechanacimiento' => $this->fechanacimiento,
            'numeroempleado' => $this->numeroempleado,
            'numeropension' => $this->numeropension,
            'fotografia' => $this->fotografia,
        );
        $this->datos['datosadicionales'] = array(
            'curp' => $this->curp,
            'rfc' => $this->rfc,
            'estadocivil' => $this->estadocivil,
            'tiposangre' => $this->tiposangre,
            'estatura' => $this->estatura,
            'peso' => $this->peso,
            'complexion' => $this->complexion,
            'discapacidad' => $this->discapacidad,
        );
        $this->datos['domicilio'] = array(
            'pais' => $this->pais,
            'estado' => $this->estado,
            'municipio' => $this->municipio,
            'localidad' => $this->localidad,
            'colonia' => $this->colonia,
            'tipovialidad' => $this->tipovialidad,
            'nombrevialidad' => $this->nombrevialidad,
            'numeroexterior' => $this->numeroexterior,
            'numerointenrior' => $this->numerointenrior,
        );
        // $this->datos['estudios'] = array(
        //     'escuela' => $this->escuela,
        //     'gradoestudio' => $this->gradoestudio,
        //     'fechainicio' => $this->fechainicio,
        //     'fechafin' => $this->fechafin
        // );

        return $this->datos;
    }
    public function getEmpleados(){
        
        $dir = '../empleados/';
        $respuesta = scandir($dir,1);
        foreach ($respuesta as $key => $v) {            
            if($v != 'index.html' && $v != '..' && $v != '.'){
                $empleado[] = str_replace('.txt','',$v);
            }
        }
        return $empleado;
    }
    function _array($array){
        // echo count($array) . '<br/>';
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        exit();
    }
}
