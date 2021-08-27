$(document).ready(function () {
    $('.select2').select2();
    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        onSelect: function (dateText, inst) {
            $(inst).val(dateText);
        }
    });
    $("#fechainicio").datepicker({
        dateFormat: 'dd-mm-yy',
        onSelect: function (dateText, inst) {
            $("#fechafin").datepicker("option", "minDate",
                $("#fechainicio").datepicker("getDate"));
        }
    });
    $("#fechafin").datepicker({
        dateFormat: 'dd-mm-yy',
    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    let idEmpleado = getParameterByName('IdEmpleado');
    if (idEmpleado) {
        $('#idempleado').val(idEmpleado);
        abrir_txt(idEmpleado);
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
            A: { pattern: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/ },
        });
    $('#numerointenrior').mask('0000A',
        {
            placeholder: "0000A"
        },
        {
            A: { pattern: /"^\d{3,4}[a-zA-Z]?$"/ },
        });
});

let estudios = [];
let i = 0;

function getestados() {
    let idpais = $('#pais').val()
    let data = {
        'pais': idpais,
        'tipo': 'pais'
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
        'estado': idestado,
        'tipo': 'estado'
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
        'municipio': idmunicipio,
        'tipo': 'municipio'
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
        'localidad': idlocalidad,
        'tipo': 'localidad'
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
    let escuela = $('#escuela').val();
    let gradoestudio = $('#gradoestudio option:selected').text();
    let fechainicio = $('#fechainicio').val();
    let fechafin = $('#fechafin').val();

    if (escuela && gradoestudio && fechainicio && fechafin) {
        $('#tablebody').append(
            '<tr id="estudio_' + i + '">' +
            '<td>' + escuela + '</td>' +
            '<td>' + gradoestudio + '</td>' +
            '<td>' + fechainicio + '</td>' +
            '<td>' + fechafin + '</td>' +
            '<td style="text-align:center"><span class="btn btn-danger glyphicon glyphicon-trash" onclick="quitarEstudio(' + i + ')"></span></td>' +
            '</tr>'
        );
        var data = {
            'Escuela': escuela,
            'GradoEstudio': gradoestudio,
            'FechaInicio': fechainicio,
            'FechaFin': fechafin
        }
        estudios.push(data);
        i++;
        $('#escuela').val('');
        $('#gradoestudio').val(0);
        $('#fechainicio').val('');
        $('#fechafin').val('');
    } else {
        Swal.fire({
            title: 'Error',
            text: "Es necesario llenar todos los campos de estudios",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
        }).then((result) => {
        })
    }
}
function quitarEstudio(num) {
    delete estudios[num];
    $('#estudio_' + num).empty();
}
$("#empleados").submit(function (event) {
    event.preventDefault();
    let formatEstudios = []
    $.each(estudios, (e, v) => {
        if (v) {
            formatEstudios.push(v);
        }
    })
    if (formatEstudios.length > 0) {
        let formulario = $(this).serializeArray();

        let objeto = {};
        for (var i = 0; i < formulario.length; i++) {
            objeto[formulario[i]['name']] = formulario[i]['value']
        }

        let fd = new FormData(this);
        fd.append('estudios', JSON.stringify(formatEstudios));

        $.ajax({
            url: 'library/creartxt.php',
            type: 'post',
            data: fd,
            method: "post",
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                Swal.fire({
                    title: 'Guardado',
                    text: "El empleado fue guardado correctamente con ID "+response.idEmpleado,
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                }).then((result) => {
                    window.location = 'index.php?IdEmpleado='+response.idEmpleado;
                })
            }
        });

    } else {
        Swal.fire({
            title: 'Error',
            text: "Favor de llenar almenos un dato de estudios",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
        }).then((result) => {
        })
    }

});

function abrir_txt(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'empleados/' + id + '.txt');
    xhttp.send();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            var datos = JSON.parse(this.responseText);
            $('#Nombre').val(datos['datosgenerales'].Nombre);
            $('#ApellidoP').val(datos['datosgenerales'].ApellidoP);
            $('#ApellidoM').val(datos['datosgenerales'].ApellidoM);
            // $('#sexo').val(datos['datosgenerales'].sexo);
            $('#sexo').select2("val",datos['datosgenerales'].sexo);
            $('#fechanacimiento').val(datos['datosgenerales'].fechanacimiento);
            $('#numeroempleado').val(datos['datosgenerales'].numeroempleado);
            $('#numeropension').val(datos['datosgenerales'].numeropension);
            $('#noeditimg').val(datos['datosgenerales'].fotografia);
            if (datos['datosgenerales'].fotografia != "") {
                $('#imagefield').attr('src', "img/" + datos['datosgenerales'].fotografia);
            }

            $('#curp').val(datos['datosadicionales'].curp);
            $('#rfc').val(datos['datosadicionales'].rfc);
            $('#estadocivil').select2("val",datos['datosadicionales'].estadocivil);
            $('#tiposangre').select2("val",datos['datosadicionales'].tiposangre);
            $('#estatura').val(datos['datosadicionales'].estatura);
            $('#peso').val(datos['datosadicionales'].peso);
            $('#complexion').select2("val",datos['datosadicionales'].complexion);
            $('#discapacidad').select2("val",datos['datosadicionales'].discapacidad);
            
            $('#pais').select2("val",datos['domicilio'].pais);
            getestados();
            $('#estado').val(datos['domicilio'].estado)
            getmunicipios();
            $('#municipio').val(datos['domicilio'].municipio)
            getlocalidad();
            $('#localidad').val(datos['domicilio'].localidad)
            getColonia();
            $('#colonia').val(datos['domicilio'].colonia);
            $('#tipovialidad').val(datos['domicilio'].tipovialidad);
            $('#nombrevialidad').val(datos['domicilio'].nombrevialidad);
            $('#numeroexterior').val(datos['domicilio'].numeroexterior);
            $('#numerointenrior').val(datos['domicilio'].numerointenrior);

            estudios = datos['estudios'];
            $.each(datos['estudios'], function (e, v) {
                if (v) {
                    $('#tablebody').append(
                        '<tr id="estudio_' + i + '">' +
                        '<td>' + v.Escuela + '</td>' +
                        '<td>' + v.GradoEstudio + '</td>' +
                        '<td>' + v.FechaInicio + '</td>' +
                        '<td>' + v.FechaFin + '</td>' +
                        '<td style="text-align:center"><span class="btn btn-danger glyphicon glyphicon-trash" onclick="quitarEstudio(' + i + ')"></span></td>' +
                        '</tr>'
                    );
                }
                i++;
            });

        }
    }
}