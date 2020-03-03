$(document).ready(function () {
    $('#estadocivil, #tiposangre, #sexo, #complexion, #discapacidad, #pais, #estado, #municipio, #localidad, #colonia, #gradoestudio').select2();

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var prodId = getParameterByName('IdEmpleado');
    if (prodId) {
        $('#idempleado').val(prodId);
        abrir_txt(prodId);
    }

    $('#rfc').mask('AAAA000000',
        {
            placeholder: "XXXX999999"
        },
        {
            A: { pattern: /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$/ },
        });
    $('#curp').mask('AAAA000000AAAAAA00',
        {
            placeholder: "XXXX999999XXXXXX99"
        },
        {
            A: { pattern: /"^[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]$"/ },
        });
});
var Estudios = [];

function abrir_txt(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'library/' + id);
    xhttp.send();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var datos = JSON.parse(this.responseText);
            // console.log(datos['estudios']);
            $('#Nombre').val(datos['datosgenerales'].Nombre);
            $('#ApellidoP').val(datos['datosgenerales'].ApellidoP);
            $('#ApellidoM').val(datos['datosgenerales'].ApellidoM);
            $('#sexo').val(datos['datosgenerales'].sexo);
            $('#fechanacimiento').val(datos['datosgenerales'].fechanacimiento);
            $('#numeroempleado').val(datos['datosgenerales'].numeroempleado);
            $('#numeropension').val(datos['datosgenerales'].numeropension);
            $('#noeditimg').val(datos['datosgenerales'].fotografia);
            if (datos['datosgenerales'].fotografia != "") {
                $('#imagefield').attr('src', "img/" + datos['datosgenerales'].fotografia);
            }
            $('#curp').val(datos['datosadicionales'].curp);
            $('#rfc').val(datos['datosadicionales'].rfc);
            $('#estadocivil').val(datos['datosadicionales'].estadocivil);
            $('#tiposangre').val(datos['datosadicionales'].tiposangre);
            $('#estatura').val(datos['datosadicionales'].estatura);
            $('#peso').val(datos['datosadicionales'].peso);
            $('#complexion').val(datos['datosadicionales'].complexion);
            $('#discapacidad').val(datos['datosadicionales'].discapacidad);
            $('#pais').val(datos['domicilio'].pais);
            getestados();
            $('#estado').val(datos['domicilio'].estado);
            getmunicipios();
            $('#municipio').val(datos['domicilio'].municipio);
            getlocalidad();
            $('#localidad').val(datos['domicilio'].localidad);
            getColonia();
            $('#colonia').val(datos['domicilio'].colonia);
            $('#tipovialidad').val(datos['domicilio'].tipovialidad);
            $('#nombrevialidad').val(datos['domicilio'].nombrevialidad);
            $('#numeroexterior').val(datos['domicilio'].numeroexterior);
            $('#numerointenrior').val(datos['domicilio'].numerointenrior);
            // $('#escuela').val(datos['estudios'].escuela);
            // $('#gradoestudio').val(datos['estudios'].gradoestudio);
            // $('#fechainicio').val(datos['estudios'].fechainicio);
            // $('#fechafin').val(datos['estudios'].fechafin);
            Estudios = datos['estudios'];
            $.each(datos['estudios'], function (e, v) {
                // console.log(v);
                $('#tablebody').append(
                    '<tr>' +
                    '<td>' + v.Escuela + '</td>' +
                    '<td>' + v.GradoEstudio + '</td>' +
                    '<td>' + v.FechaInicio + '</td>' +
                    '<td>' + v.FechaFin + '</td>' +
                    '</tr>'
                );
            });

        }
    }
}
function getestados() {
    idpais = $('#pais').val();
    data = {
        'pais': idpais
    }

    res = cargar_ajax.run_server_ajax('model/Catalogo.php', data);
    $('#estado').empty();
    $('#estado').append(
        '<option value="">Seleccionar...</option>'
    );
    $.each(res, function (e, v) {
        if (v.IdCatPais == idpais) {
            $('#estado').append(
                '<option value="' + v.Id + '">' + v.Descripcion + '</option>'
            );
        }
    });
}
function getmunicipios() {
    idpais = $('#pais').val();
    idestado = $('#estado').val();

    data = {
        'estado': idestado
    }

    res = cargar_ajax.run_server_ajax('model/Catalogo.php', data);

    $('#municipio').empty();
    $('#municipio').append(
        '<option value="">Seleccionar...</option>'
    );
    $.each(res, function (e, v) {
        if (v.IdCatPais == idpais && v.IdCatEstado == idestado) {
            $('#municipio').append(
                '<option value="' + v.Id + '">' + v.Descripcion + '</option>'
            );
        }
    });
}
function getlocalidad() {
    idpais = $('#pais').val();
    idestado = $('#estado').val();
    idmunicipio = $('#municipio').val();

    data = {
        'municipio': idmunicipio
    }

    res = cargar_ajax.run_server_ajax('model/Catalogo.php', data);

    $('#localidad').empty();
    $('#localidad').append(
        '<option value="">Seleccionar...</option>'
    );
    $.each(res, function (e, v) {
        if (v.IdCatPais == idpais && v.IdCatEstado == idestado && v.IdCatMunicipio == idmunicipio) {
            $('#localidad').append(
                '<option value="' + v.Id + '">' + v.Descripcion + '</option>'
            );
        }
    });
}
function getColonia() {
    idpais = $('#pais').val();
    idestado = $('#estado').val();
    idmunicipio = $('#municipio').val();
    idlocalidad = $('#localidad').val();
    data = {
        'localidad': idlocalidad
    }

    res = cargar_ajax.run_server_ajax('model/Catalogo.php', data);

    $('#colonia').empty();
    $('#colonia').append(
        '<option value="">Seleccionar...</option>'
    );
    $.each(res, function (e, v) {
        if (v.IdCatPais == idpais && v.IdCatEstado == idestado && v.IdCatMunicipio == idmunicipio && v.IdCatLocalidad == idlocalidad) {
            $('#colonia').append(
                '<option value="' + v.Id + '">' + v.Descripcion + '</option>'
            );
        }
    });
}

function previewImage(event) {
    var reader = new FileReader();
    var imagen = document.getElementById('imagefield');

    reader.onload = function () {
        if (reader.readyState == 2) {
            imagen.src = reader.result;
        }
    }

    reader.readAsDataURL(event.target.files[0]);
}

function agregarEstudio() {
    var escuela = $('#escuela').val();
    var gradoestudio = $('#gradoestudio').val();
    var fechainicio = $('#fechainicio').val();
    var fechafin = $('#fechafin').val();

    $('#tablebody').append(
        '<tr>' +
        '<td>' + escuela + '</td>' +
        '<td>' + gradoestudio + '</td>' +
        '<td>' + fechainicio + '</td>' +
        '<td>' + fechafin + '</td>' +
        '</tr>'
    );
    var data = {
        'Escuela': escuela,
        'GradoEstudio': gradoestudio,
        'FechaInicio': fechainicio,
        'FechaFin': fechafin
    }
    res = cargar_ajax.run_server_ajax('model/Escuela.php', data);

    Estudios.push(data);
}
$("#empleados").submit(function (event) {
    if (Estudios.length > 0) {
        var formulario = $(this).serializeArray();

        var objeto = {};
        for (var i = 0; i < formulario.length; i++) {
            objeto[formulario[i]['name']] = formulario[i]['value']
        }

        var fd = new FormData(this);
        console.log(fd);
        fd.append('estudios', JSON.stringify(Estudios));

        // var files = $('#fotografia')[0].files[0];}
        // fd.append('files', files);

        $.ajax({
            url: 'library/creartxt.php',
            type: 'post',
            data: fd,
            method: "post",
            processData: false,
            contentType: false,
            done: function (response) {
                return response;
            }
        });

    } else {
        alert("Favor de llenar los datos Escolares");
    }
    event.preventDefault();
    window.location = 'index.php';

});


