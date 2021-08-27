<form method="POST" id="empleados" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-12 center">
                <h3>Datos Generales</h3>
            </div>
            <div class="row">
                <input type="text" id="idempleado" name="idempleado" hidden>
                <div class="col-md-6 form-group">
                    <label class="">Nombre<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nombre" name="Nombre" id="Nombre" maxlength="40" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Apellido Paterno<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Apellido Paterno" name="ApellidoP" id="ApellidoP" maxlength="40" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Apellido Materno<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Apellido Materno" name="ApellidoM" id="ApellidoM" maxlength="40" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Sexo<span class="text-danger">*</span></label>
                    <select name="sexo" id="sexo" class="form-control select2 col-xs-12 col-md-12" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($sexo) ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Fecha Nacimiento<span class="text-danger">*</span></label>
                    <input class="form-control datepicker" placeholder="Fecha Nacimiento" name="fechanacimiento" id="fechanacimiento" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Numero Empleado<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="Numero Empleado" name="numeroempleado" id="numeroempleado" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Numero Pension</label>
                    <input type="number" class="form-control" placeholder="Numero Pension" name="numeropension" id="numeropension"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Fotografia</label>
                    <input type="file" placeholder="Foto" name="fotografia" id="fotografia" onchange="previewImage(event)"></input>
                    <input type="text" name="noeditimg" id="noeditimg" hidden>
                </div>
                <div class="col-md-6 form-group" style="text-align: center;">
                    <img src="img/silueta.png" style="width: 150px; height: 150;" id="imagefield">
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-12 center">
                <h3>Datos Adicionales</h3>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">CURP<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="CURP" name="curp" id="curp" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">RFC<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="RFC" name="rfc" id="rfc" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Estado Civil<span class="text-danger">*</span></label>
                    <select name="estadocivil" id="estadocivil" class="form-control select2 col-xs-12 col-md-12" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($estadocivil) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Tipo Sangre<span class="text-danger">*</span></label>
                    <select name="tiposangre" id="tiposangre" class="form-control select2 col-xs-12 col-md-12" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($tiposangre) ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Estatura (cm)<span class="text-danger">*</span></label>
                    <input type="number" max="300" class="form-control" placeholder="Estatura" name="estatura" id="estatura" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Peso (kg)<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="Peso" name="peso" id="peso" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Complexion<span class="text-danger">*</span></label>
                    <select name="complexion" id="complexion" class="form-control select2 col-xs-12 col-md-12" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($complexion) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Discapacidad</label>
                    <select name="discapacidad" id="discapacidad" class="form-control select2 col-xs-12 col-md-12">
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($discapacidad) ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-12 form-group center">
                <h3>Domicilio</h3>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Pais<span class="text-danger">*</span></label>
                    <select name="pais" id="pais" class="form-control select2 col-xs-12 col-md-12" onchange="getestados()" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($paises) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Estado<span class="text-danger">*</span></label>
                    <select name="estado" id="estado" class="form-control select2 col-xs-12 col-md-12" onchange="getmunicipios()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Municipio<span class="text-danger">*</span></label>
                    <select name="municipio" id="municipio" class="form-control select2 col-xs-12 col-md-12" onchange="getlocalidad()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Localidad<span class="text-danger">*</span></label>
                    <select name="localidad" id="localidad" class="form-control select2 col-xs-12 col-md-12" onchange="getColonia()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Colonia<span class="text-danger">*</span></label>
                    <select name="colonia" id="colonia" class="form-control select2 col-xs-12 col-md-12" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Tipo Vialidad<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Tipo Vialidad" name="tipovialidad" id="tipovialidad" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Nombre Vialidad<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Nombre Vialidad" name="nombrevialidad" id="nombrevialidad" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Numero Exterior<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" placeholder="Numero Exterior" name="numeroexterior" id="numeroexterior" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Numero Interior</label>
                    <input type="text" class="form-control" placeholder="Numero Interior" name="numerointenrior" id="numerointenrior" type="text" maxlength="5"></input>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-12 form-group center">
                <h3>Estudios</h3>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Escuela<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Escuela" id="escuela"></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="col-xs-12">Grado Estudio<span class="text-danger">*</span></label>
                    <select id="gradoestudio" name="gradoestudio" class="form-control col-xs-12 col-md-12">
                            <option value="">Seleccionar...</option>                            
                                <?php echo llenarSelect($estudios) ?>                            
                        </select>
                    </div>
                </div>
                <div class=" row">
                        <div class="col-md-6 form-group">
                            <label class="">Fecha de Inicio<span class="text-danger">*</span></label>
                            <input class="form-control datepicker1" placeholder="Fecha de Inicio" id="fechainicio"></input>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="">Fecha fin<span class="text-danger">*</span></label>
                            <input class="form-control datepicker2" placeholder="Fecha fin" id="fechafin"></input>
                        </div>
                </div>
            </div>
            <div class="col-md-12" style="text-align: left;margin-bottom: inherit;">
                <button type="button" id="addEstudio" class="btn btn-primary" onclick="agregarEstudio()">Agregar estudios</button>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Escuela</th>
                        <th>Grado Estudio</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Fin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 sbmt" style="text-align: right;">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>