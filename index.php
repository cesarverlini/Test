<?php
require_once("model/Catalogo.php");

$catalogo = new Catalogo();

$paises = $catalogo->GetCatPais();
$complexion = $catalogo->GetCatComplexion();
$discapacidad = $catalogo->GetCatDsicapacidad();
$estadocivil = $catalogo->GetCatEstadoCivil();
$estudios = $catalogo->GetCatGradoEstudio();
$sexo = $catalogo->GetCatSexo();
$tiposangre = $catalogo->GetCatTipoSangre();

function llenarSelect($objetos)
{
    $html = "";
    foreach ($objetos as $dato)
        $html .= "<option value=" . $dato['Id'] . ">" . $dato['Descripcion'] . "</option>";
    return $html;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="js/sweetAlert/dist/sweetalert2.css">
    <link rel="stylesheet" href="js/sweetAlert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Examen STJ</title>
</head>

<body>
    <section class="marginNavBar">
        <nav class="navbar navbar-dark bg-primary navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand titulo" href="index.php">Agregar o Editar empleado</a>
                    <a class="navbar-brand titulo" href="#"> | </a>                    
                    <a class="navbar-brand titulo" href="verEmpleados.php">Ver Empleados</a>
                </div>
            </div>
        </nav>
    </section>
    <div class="container">
        <div class="starter-template">
            <?php include_once("view/Empleados.php") ?>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="js/sweetAlert/dist/sweetalert2.all.min.js"></script>
    <script src="js/sweetAlert/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/Empleados.js"></script>
    <script type="text/javascript">
        // FUNCIONES PARA CARGAR AJAX DESDE CUALQUIER ARCHIVO JS o <script> DEL SISTEMA
        var cargar_ajax = {
            run_server_ajax: function(_url, _data = null) {
                var json_result = $.ajax({
                    url: '' + _url,
                    dataType: "json",
                    method: "post",
                    async: false,
                    type: 'post',
                    data: _data,
                    done: function(response) {
                        return response;
                    }
                }).responseJSON;
                return json_result;
            }
        }
    </script>

</body>

</html>