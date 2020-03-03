<?php


?>
<br>
<br>
<form method="POST" id="empleados"  enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 form-group">
                    <h3>Datos Generales</h3>
                </div>
            </div>
            <div class="row">
                <input type="text" id="idempleado" name="idempleado" hidden>
                <div class="col-md-6 form-group">
                    <label class="">Nombre<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Nombre" name="Nombre" id="Nombre" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Apellido Paterno<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Apellido Paterno" name="ApellidoP" id="ApellidoP" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Apellido Materno<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Apellido Materno" name="ApellidoM" id="ApellidoM" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Sexo<span class="text-danger">*</span></label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($sexo) ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Fecha Nacimiento<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Fecha Nacimiento" name="fechanacimiento" id="fechanacimiento" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Numero Empleado<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Numero Empleado" name="numeroempleado" id="numeroempleado" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Numero Pension</label>
                    <input class="form-control" placeholder="Numero Pension" name="numeropension" id="numeropension"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Fotografia</label>
                    <input type="file" placeholder="Foto" name="fotografia" id="fotografia" onchange="previewImage(event)"></input>
                    <input type="text" name="noeditimg" id="noeditimg" hidden>
                </div>
                <div class="col-md-6 form-group">
                    <img src="img/silueta.png" style="width: 100px; height: 100;" id="imagefield">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 form-group">
                    <h3>Datos Adicionales</h3>
                </div>
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
                    <label class="">Estado Civil<span class="text-danger">*</span></label>
                    <select name="estadocivil" id="estadocivil" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($estadocivil) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Tipo Sangre<span class="text-danger">*</span></label>
                    <select name="tiposangre" id="tiposangre" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($tiposangre) ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Estatura<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Estatura" name="estatura" id="estatura" required></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Peso<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Peso" name="peso" id="peso" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Complexion<span class="text-danger">*</span></label>
                    <select name="complexion" id="complexion" class="form-control" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($complexion) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Discapacidad</label>
                    <select name="discapacidad" id="discapacidad" class="form-control">
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($discapacidad) ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 form-group">
                    <h3>Domicilio</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Pais<span class="text-danger">*</span></label>
                    <select name="pais" id="pais" class="form-control" onchange="getestados()" required>
                        <option value="">Seleccionar...</option>
                        <?php echo llenarSelect($paises) ?>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Estado<span class="text-danger">*</span></label>
                    <select name="estado" id="estado" class="form-control" onchange="getmunicipios()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Municipio<span class="text-danger">*</span></label>
                    <select name="municipio" id="municipio" class="form-control" onchange="getlocalidad()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Localidad<span class="text-danger">*</span></label>
                    <select name="localidad" id="localidad" class="form-control" onchange="getColonia()" required>
                        <option value="">Seleccionar...</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Colonia<span class="text-danger">*</span></label>
                    <select name="colonia" id="colonia" class="form-control" required>
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
                    <input class="form-control" placeholder="Numero Exterior" name="numeroexterior" id="numeroexterior" required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Numero Interior</label>
                    <input class="form-control" placeholder="Numero Interior" name="numerointenrior" id="numerointenrior"></input>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 form-group">
                    <h3>Estudios</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="">Escuela<span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Escuela" id="escuela"></input>
                </div>
                <div class="col-md-6 form-group">
                    <label class="">Grado Estudio<span class="text-danger">*</span></label>
                    <select  id="gradoestudio" class="form-control" ">
                            <option value="">Seleccionar...</option>                            
                                <?php echo llenarSelect($estudios) ?>                            
                        </select>
                    </div>
                </div>
                <div class=" row">
                        <div class="col-md-6 form-group">
                            <label class="">Fecha de Inicio<span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Fecha de Inicio"id="fechainicio"></input>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="">Fecha fin<span class="text-danger">*</span></label>
                            <input class="form-control" placeholder="Fecha fin" id="fechafin"></input>
                        </div>
                </div>
            </div>
            <div class="col-md-12" style="text-align: right;margin-bottom: inherit;">
                <button type="button" id="addEstudio" class="btn btn-primary" onclick="agregarEstudio()">Agregar</button>                
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Escuela</th>
                        <th>Grado Estudio</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Fin</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    <!-- <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="col-md-12" style="text-align: right">
            <!-- <input type="button" value="Enviar" class="btn btn-primary" onclick="enviar_dtos()"/> -->
            <button type="submit" class="btn btn-primary">Guardar</button>
            <!-- <button type="button" class="btn btn-primary" id="pruebas" onclick="prueba()">prueba</button> -->
        </div>
</form>