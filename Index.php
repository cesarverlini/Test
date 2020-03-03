<?php
require_once("model/Catalogo.php");

$objeto = new Catalogo();

$paises = $objeto->GetCatPais();
$complexion = $objeto->GetCatComplexion();
$discapacidad = $objeto->GetCatDsicapacidad();
$estadocivil = $objeto->GetCatEstadoCivil();
$estudios = $objeto->GetCatGradoEstudio();
$sexo = $objeto->GetCatSexo();
$tiposangre = $objeto->GetCatTipoSangre();

function llenarSelect($objetos)
{
    $html = "";
    foreach ($objetos as $dato)
        $html .= "<option value=" . $dato['Id'] . ">" . $dato['Descripcion'] . "</option>";
    return $html;
}



?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <!-- Bootstrap 3.3.7 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> 
    <title>Test</title>
</head>

<body>

    <section>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Test</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
    </section>
    <div class="container">
        <div class="starter-template">
            <?php include_once("view/Empleados.php") ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous">
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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