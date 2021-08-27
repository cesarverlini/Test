$(document).ready(function () {
    let data = {
        'getEmpleados': 1
    }
    res = cargar_ajax.run_server_ajax('model/Empleado.php', data);
    if (res) {
        $('#noEmpleados').css('display', 'none');
        $('#tablaEmpleados').empty();
        $.each(res, (e, v) => {
            abrir_txt(v);
        });
    }
    
    let idEmpleado = getParameterByName('IdEmpleado');
    if (idEmpleado) {
        window.location = 'index.php?IdEmpleado=' + idEmpleado;
    }


});
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
function abrir_txt(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'empleados/' + id + '.txt');
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var datos = JSON.parse(this.responseText);
            let Nombre = datos['datosgenerales'].Nombre;
            let ApellidoP = datos['datosgenerales'].ApellidoP;
            let ApellidoM = datos['datosgenerales'].ApellidoM;
            let fechanacimiento = datos['datosgenerales'].fechanacimiento;
            let estatura = datos['datosadicionales'].estatura;
            let peso = datos['datosadicionales'].peso;

            let data = {
                'sexoTxt': datos['datosgenerales'].sexo,
                'tipoSangreTxt': datos['datosadicionales'].tiposangre
            };
            let res = cargar_ajax.run_server_ajax('model/Catalogo.php', data);
            let sexo = res.sexo;
            let tiposangre = res.tipoSangre;
            $('#tablaEmpleados').append(
                '<tr>' +
                '<td>' + id + '</td>' +
                '<td>' + Nombre + ' ' + ApellidoP + ' ' + ApellidoM + '</td>' +
                '<td>' + sexo + '</td>' +
                '<td>' + fechanacimiento + '</td>' +
                '<td>' + tiposangre + '</td>' +
                '<td>' + estatura + '</td>' +
                '<td>' + peso + '</td>' +
                '<td style="text-align:center"><span class="btn btn-info glyphicon glyphicon-pencil" onclick="editarEmpleado(' + id + ')"></span></td>' +
                '</tr>'
            );
        }

    }
}
function editarEmpleado(id) {
    window.location = 'index.php?IdEmpleado=' + id;
}
