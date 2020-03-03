<?php
require_once('../model/Estudios.php');
    
$study = new Estudios();
$study->setEscuela($_POST['Escuela']);
$study->setGradoEstudio($_POST['GradoEstudio']);
$study->setFechaInicio($_POST['FechaInicio']);
$study->setFechaFin($_POST['FechaFin']);

$comprobacion = $study->validacion();
echo $comprobacion;