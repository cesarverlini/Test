<?php
include('../model/Empleado.php');
include('../model/Estudios.php');

if ($_POST['Nombre'] != "" && $_POST['ApellidoP'] != "" && $_POST['ApellidoM'] != "" && $_POST['sexo'] != "" && $_POST['fechanacimiento'] != "" && $_POST['numeroempleado'] != "" && $_POST['curp'] != "" && $_POST['rfc'] != "" && $_POST['estadocivil'] != "" && $_POST['tiposangre'] != "" && $_POST['estatura'] != "" && $_POST['peso'] != "" && $_POST['complexion'] != "" && $_POST['pais'] != "" && $_POST['estado'] != "" && $_POST['municipio'] != "" && $_POST['localidad'] != "" && $_POST['colonia'] != "" && $_POST['tipovialidad'] != "" && $_POST['nombrevialidad'] != "" && $_POST['numeroexterior'] != "") {
    $datos = new Empleado();
    $esc = new Estudios();

    $idEmpleado = $_POST['idempleado'];
    $id_aleatorio = rand(1, 9999);
    $datos->setFoto($_POST['noeditimg']);

    if ($_FILES) {
        $permitidos = array("image/jpg", "image/jpeg", "image/png");
        $nombre = "";
        $extension = "";
        $idFoto = "";

        // $limite_kb = 200;
        // in_array($_FILES['image']['size'] <= $limite_kb * 1024
        if (in_array($_FILES['fotografia']['type'], $permitidos)) {
            $nombre = explode(".", $_FILES['fotografia']['name']);
            $extension = end($nombre);
            if ($idEmpleado > 0) {
                $idFoto = $idEmpleado;
            } else {
                $idFoto = $id_aleatorio;
            }
            move_uploaded_file($_FILES["fotografia"]["tmp_name"], "../img/" . $idFoto . "." . $extension);
            $datos->setFoto($idFoto . "." . $extension);
        }
    }

    $datos->setNombre($_POST['Nombre']);
    $datos->setApellidoP($_POST['ApellidoP']);
    $datos->setApellidoM($_POST['ApellidoM']);
    $datos->setSexo($_POST['sexo']);
    $datos->setFechaNacimiento($_POST['fechanacimiento']);
    $datos->setNumEmpleado($_POST['numeroempleado']);
    $datos->setNumPension($_POST['numeropension']);
    $datos->setCurp($_POST['curp']);
    $datos->setRFC($_POST['rfc']);
    $datos->setEstadoCivil($_POST['estadocivil']);
    $datos->setSangre($_POST['tiposangre']);
    $datos->setEstatura($_POST['estatura']);
    $datos->setPeso($_POST['peso']);
    $datos->setComplexion($_POST['complexion']);
    $datos->setDiscapacidad($_POST['discapacidad']);
    $datos->setPais($_POST['pais']);
    $datos->setEstado($_POST['estado']);
    $datos->setMunicipio($_POST['municipio']);
    $datos->setLocalidad($_POST['localidad']);
    $datos->setColonia($_POST['colonia']);
    $datos->setTipoVialidad($_POST['tipovialidad']);
    $datos->setNombreVialidad($_POST['nombrevialidad']);
    $datos->setNumeroExterior($_POST['numeroexterior']);
    $datos->setNumeroInterior($_POST['numerointenrior']);

    $DatosArray = $datos->DatosArray();
    $DatosArray['estudios'] = json_decode($_POST['estudios']);
    var_dump($DatosArray);
    // Creamos el JSON
    $json_string = json_encode($DatosArray);
    if ($idEmpleado > 0) {
        $file = $idEmpleado + '.txt';
    } else {
        $file = $id_aleatorio + '.txt';
    }
    $datos_json = file_put_contents($file, $json_string);
    header('Location: ' . '../Index.php');
} else {
    echo "<span style='color: red;'>Por favor, Ingrese los datos requeridos. </span></br></br>";
}




// $datos->setNombre($_POST['empleado']['Nombre']);
//     $datos->setApellidoP($_POST['empleado']['ApellidoP']);
//     $datos->setApellidoM($_POST['empleado']['ApellidoM']);
//     $datos->setSexo($_POST['empleado']['sexo']);
//     $datos->setFechaNacimiento($_POST['empleado']['fechanacimiento']);
//     $datos->setNumEmpleado($_POST['empleado']['numeroempleado']);
//     $datos->setNumPension($_POST['empleado']['numeropension']);
//     $datos->setCurp($_POST['empleado']['curp']);
//     $datos->setRFC($_POST['empleado']['rfc']);
//     $datos->setEstadoCivil($_POST['empleado']['estadocivil']);
//     $datos->setSangre($_POST['empleado']['tiposangre']);
//     $datos->setEstatura($_POST['empleado']['estatura']);
//     $datos->setPeso($_POST['empleado']['peso']);
//     $datos->setComplexion($_POST['empleado']['complexion']);
//     $datos->setDiscapacidad($_POST['empleado']['discapacidad']);
//     $datos->setPais($_POST['empleado']['pais']);
//     $datos->setEstado($_POST['empleado']['estado']);
//     $datos->setMunicipio($_POST['empleado']['municipio']);
//     $datos->setLocalidad($_POST['empleado']['localidad']);
//     $datos->setColonia($_POST['empleado']['colonia']);
//     $datos->setTipoVialidad($_POST['empleado']['tipovialidad']);
//     $datos->setNombreVialidad($_POST['empleado']['nombrevialidad']);
//     $datos->setNumeroExterior($_POST['empleado']['numeroexterior']);
//     $datos->setNumeroInterior($_POST['empleado']['numerointenrior']);
    
//     $DatosArray = $datos->DatosArray();
//     $DatosArray['estudios'] = $_POST['estudios'];
