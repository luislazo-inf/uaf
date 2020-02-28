<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Uaf</title>

    <link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.3/normalize.css">
    <link rel="stylesheet" href="css/jquery.idealforms.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <script>

        //almacenar array
        function creararray() {
            var parametros = [];
            $("#mytable tr").each(function (i, e) {

                if (i > 0) {
                    var tr = [];
                    $(this).find("td").each(function (index, element) {
                        var td = {};
                        td["registro" + (index + 1)] = $(this).text();
                        tr.push(td);
                    });
                    parametros.push(tr);
                }


            });

            $("#inputarray").val(JSON.stringify(parametros));
        }

        //Función remever datos de la tabla de beneficiarios
        $(document).ready(function () {

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                var nFilas = $("#mytable tr").length;
                $("#adicionados").append(nFilas - 1);
            });
        });

        //función guardar datos de la tabla
        function guardarDatos() {

            var cedula = document.getElementById("cedulaBF").value;
            var nombre = document.getElementById("nombresBF").value;
            var apellido = document.getElementById("apellidosBF").value;
            var domicilio = document.getElementById("domicilioBF").value;
            var ciudad = document.getElementById("ciudadBF").value;
            var pais = document.getElementById("paisBF").value;
            var porcentaje = document.getElementById("porcentaje").value;
            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr id="row' + i + '"><td>' + cedula + '</td><td>' + nombre + '</td><td>' + apellido + '</td><td>' + domicilio + '</td><td>' +
                ciudad + '</td><td>' + pais + '</td><td>' + porcentaje + '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr> '; //esto seria lo que contendria la fila



            i++;


            $('#mytable tr:first').after(fila);
            $("#adicionados0").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("mytable tr").length;              $("#adicionados").append(nFilas - 1);
            //le resto 1 para no contar la fila del header
            document.getElementById("cedulaBF").value = "";
            document.getElementById("nombresBF").value = "";
            document.getElementById("apellidosBF").value = "";
            document.getElementById("domicilioBF").value = "";
            document.getElementById("ciudadBF").value = "";
            document.getElementById("paisBF").value = "";
            document.getElementById("porcentaje").value = "";
            document.getElementById("cedulaBF").focus();
        }

        function creararray1() {
            var parametros = [];
            $("#mitabla tr").each(function (i, e) {

                if (i > 0) {
                    var tr = [];
                    $(this).find("td").each(function (index, element) {
                        var td = {};
                        td["anotacion" + (index + 1)] = $(this).text();
                        tr.push(td);
                    });
                    parametros.push(tr);
                }


            });

            $("#inputarray1").val(JSON.stringify(parametros));
        }

        $(document).ready(function () {

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados1").text("");
                var nFilas = $("#mitabla tr").length;
                $("#adicionados1").append(nFilas - 1);
            });
        });

        function guardarDatos1() {

            var rut = document.getElementById("rut_numero_gerencia").value;
            var nombre = document.getElementById("nombre").value;
            var cargo = document.getElementById("cargo").value;
            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr id="row' + i + '"><td>' + rut + '</td><td>' + nombre + '</td><td>' + cargo + '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr> '; //esto seria lo que contendria la fila



            i++;


            $('#mitabla tr:first').after(fila);
            $("#adicionados1").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mitabla tr").length;
            $("#adicionados1").append(nFilas - 1);
            //le resto 1 para no contar la fila del header
            document.getElementById("rut_numero_gerencia").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("cargo").value = "";
            document.getElementById("rut_numero_gerencia").focus();
        }
    </script>
    <style>
        body {
            max-width: 980px;
            margin: 2em auto;
            font: normal 15px/1.5 Arial, sans-serif;
            color: #353535;
            overflow-y: scroll;
        }

        .content {
            margin: 0 30px;
        }

        .field.buttons button {
            margin-right: .5em;
        }

        #invalid {
            display: none;
            float: left;
            width: 290px;
            margin-left: 120px;
            margin-top: .5em;
            color: #CC2A18;
            font-size: 130%;
            font-weight: bold;
        }

        .idealforms.adaptive #invalid {
            margin-left: 0 !important;
        }

        .idealforms.adaptive .field.buttons label {
            height: 0;
        }
    </style>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="col-md-6">
                <img id="banner" src="./img/banner agencia.PNG" height="80em" width="350em">
            </div>
            <div class="col-md-6">
                <nav class="nav justify-content-end">
                    <a class="nav-item nav-link" href="https://www.agenciaduran.cl/openNet/">Inicio</a>
                    <a class="nav-item nav-link" href="http://carlosduran.edinet.cl/cmx2005/index.php">Agencia En Línea</a>
                    <a class="nav-item nav-link" href="https://app.agenciaduran.cl/sistad/sistema/login.php">STE</a>
                    <a class="nav-item nav-link" href="https://www.agenciaduran.cl/rsrc/galeria/">Galeria</a>
                    <a class="nav-item nav-link" href="http://www.e-duranage.net/onyx/login/index.php">Intranet</a>
                    <a class="nav-item nav-link" href="mantenedor">Listado</a>
                </nav>
            </div>
        </div>
    </div>

    <h1 align="center">Formulario UAF</h1>

    <div class="content">
        <div class="idealsteps-container">
            <nav class="idealsteps-nav"></nav>
            <form action="formularioGuardar" method="post" role="form" novalidate autocomplete="off" class="idealforms"
                id="myForm">
                <div class="idealsteps-wrap">

                    <!-- Step 1 -->

                    <section class="idealsteps-step ">
                        <legend>
                            <h2>Datos Persona Juridica</h2>
                        </legend>
                        <hr>
                        <div class="field">
                            <label class="main">Rut:</label>
                            <input name="rut" type="text">
                            <span class="error"></span>
                        </div>

                        <div class="field">
                            <label class="main">Razón Social:</label>
                            <input name="razon_social" type="email">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Domicilio:</label>
                            <input name="domicilio" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Ciudad:</label>
                            <input name="ciudad" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">País Constitución:</label>
                            <input name="pais_const" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Teléfono:</label>
                            <input id="telefono" name="telefono" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Rut Rep. Legal: </label>
                            <input name="rep_rut" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Nombre Rep. Legal:</label>
                            <input name="rep_nom" type="text">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Tipo de Entidad:</label>
                            <select name="tipo_entidad" id="tipo_entidad">
                                <option value="default">&ndash; Seleccione una opción &ndash;</option>
                                <option>Anónima</option>
                                <option>Colectiva</option>
                                <option>En comandita</option>
                                <option>Limitada</option>
                                <option>EIRL</option>
                                <option>Otra</option>
                            </select>
                            <span class="error"></span> </div>

                        <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button type="button" class="next">Siguiente &raquo;</button>
                        </div>

                        <div class="field">
                            @if($mensaje !=null)
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ $mensaje }}
                                </div>
                            </div>
                            @endif
                        </div>

                    </section>

                    <!-- Step 2 -->

                    <section class="idealsteps-step">
                        <legend>
                            <h2>Identificación Beneficiarios Finales o de Control Efectivo</h2>
                        </legend>
                        <hr>
                        <div class="field">
                            <label class="main">Cédula:</label>
                            <input id="cedulaBF" name="cedulaBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">Nombres:</label>
                            <input id="nombresBF" name="nombresBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">Apellidos:</label>
                            <input id="apellidosBF" name="apellidosBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">Domicilio:</label>
                            <input id="domicilioBF" name="domicilioBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">Ciudad:</label>
                            <input id="ciudadBF" name="ciudadBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">País:</label>
                            <input id="paisBF" name="paisBF" type="text">
                            <span class="error"></span>
                        </div>
                        <div class="field">
                            <label class="main">% de participación en la PJ declarante:</label>
                            <input id="porcentaje" name="porcentaje" type="text">
                            <span class="error"></span>
                        </div>

                        <div class="field">
                            <input type="hidden" id="inputarray" name="inputarray" placeholder="array creado">
                        </div>

                        <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button type="button" class="prev">&laquo; Anterior</button>
                            <button type="button" class="next">Siguiente &raquo;</button>
                            <button id="adicionar" class="btn-tabla" type="button" onclick="guardarDatos()">Agregar
                                Beneficiario</button>
                            <button class="btn-tabla" type="button" onclick="creararray()">Confirmar Beneficiarios</button>
                        </div>

                        <div class="field">
                            <div>
                                <!-- tabla de beneficiarios-->
                                <p>Elementos en la Tabla:
                                    <div id="adicionados"></div>
                                </p>

                            </div>

                            <table id="mytable" class="table table-bordered table-hover ">

                                <thead>
                                    <tr>
                                        <th>Cédula</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Domicilio</th>
                                        <th>Ciudad</th>
                                        <th>País</th>
                                        <th>Porcentaje</th>
                                        <th>Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- Step 3 -->

                    <section class="idealsteps-step">

                        <legend>
                            <h2>Antecedentes de la persona natural que hace la presente declaración</h2>
                        </legend>
                        <hr>
                        <div class="field">
                            <label class="main">Rut:</label>
                            <input name="rutD" type="text" placeholder="000-000-0000">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Nombres:</label>
                            <input name="nombreD" type="text" placeholder="00000">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Apellido Paterno:</label>
                            <input name="apelP" type="text" placeholder="00000">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Apellido Materno:</label>
                            <input name="apelM" type="text" placeholder="00000">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Lugar de Origen:</label>
                            <input name="lugarOrigen" type="text" placeholder="00000">
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Relación con la persona juridica tratante:</label>
                            <input name="relacion" type="text" placeholder="00000">
                            <span class="error"></span> </div>
                        <div class="field">
                                <label class="main">Lugar De firma</label>
                                <input name="firma" type="text" placeholder="Ciudad Donde Firma">
                                <span class="error"></span>
                        </div>
                        <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button type="button" class="prev">&laquo; Anterior</button>
                            <button type="button" class="next">Siguiente &raquo;</button>
                            @csrf

                        </div>
                    </section>

                    <!-- Step 4-->

                    <section class="idealsteps-step">

                        <legend>
                            <h2>Identifique la alta gerencia de la persona o estructura jurídica: </h2>
                        </legend>

                        <div class="field">
                            <label class="main">Rut:</label>
                            <input id="rut_numero_gerencia" name="rut_numero_gerencia" type="text" >
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Nombre completo</label>
                            <input id="nombre" name="nombre" type="text" >
                            <span class="error"></span> </div>
                        <div class="field">
                            <label class="main">Cargo</label>
                            <input id="cargo" name="cargo" type="text">
                            <span class="error"></span> </div>
                                <div class="field">
                                        <input type="hidden" id="inputarray1" name="inputarray1" placeholder="array creado">
                                    </div>
                            <div class="field buttons">
                            <label class="main">&nbsp;</label>
                            <button type="button" class="prev">&laquo; Anterior</button>
                            <button id="enviar" name="enviar" class="submit">Enviar</button>
                            <button id="adicionar1" class="btn-tabla" type="button" onclick="guardarDatos1()">Agregar
                                Estructura Juridica</button>
                            <button class="btn-tabla" type="button" onclick="creararray1()">Confirmar Estructura Juridica</button>
                            @csrf

                        </div>
                        <div class="field">
                            <div>
                                <!-- tabla de beneficiarios-->
                                <p>Elementos en la Tabla:
                                    <div id="adicionados1"></div>
                                </p>

                            </div>

                            <table id="mitabla" class="table table-bordered table-hover ">

                                <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Cargo</th>
                                        <th>Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <span id="invalid"></span>
            </form>

        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/out/jquery.idealforms.js"></script>
    <script>

        function enviar() {

            return 1;
            var formulario = document.getElementById("myForm");
            var dato = formulario[0];

            if (dato.value == "enviar") {
                alert("Enviando el formulario");
                formulario.submit();
                return true;
            } else {
                alert("No se envía el formulario");
                return false;
                return 'formulario.php';
            }
        }
        $('form.idealforms').idealforms({

            silentLoad: false,

            rules: {
                'rut': 'required rut',
                'razon_social': 'required razon_social',
                'domicilio': 'required domicilio',
                'ciudad': 'required ciudad',
                'pais_const': 'required pais_const',
                'telefono': 'required telefono',
                'rep_rut': 'required rep_rut',
                'rep_nom': 'required rep_nom',
                'tipo_entidad': 'select:default',
                'cedulaBF': 'required cedulaBF',
                'nombresBF': 'required nombresBF',
                'apellidosBF': 'required apellidosBF',
                'domicilioBF': 'required domicilioBF',
                'ciudadBF': 'required ciudadBF',
                'paisBF': 'required paisBF',
                'porcentaje': 'required porcentaje',
                'rutD': 'required rutD',
                'nombreD': 'required nombreD',
                'apelP': 'required apelP',
                'apelM': 'required apelM',
                'lugarOrigen': 'required lugarOrigen',
                'relacion': 'required relacion',
                'firma': 'required firma',
                'rut_numero_gerencia': 'required rut_numero_gerencia',
                'nombre': 'required nombre',
                'cargo': 'required cargo',
            },

            errors: {
                'username': {
                    ajaxError: 'Usuario no Disponible'
                }
            },
        });



        $('form.idealforms').find('input, select, textarea').on('change keyup', function () {
            $('#invalid').hide();
        });

        $('form.idealforms').idealforms('addRules', {
            'comments': 'required minmax:50:200'
        });

        $('.prev').click(function () {
            $('.prev').show();
            $('form.idealforms').idealforms('prevStep');
        });
        $('.next').click(function () {
            $('.next').show();
            $('form.idealforms').idealforms('nextStep');
        });

    </script>
</body>

</html>
