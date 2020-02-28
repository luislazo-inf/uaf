<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Listador UAF</title>
        {!! Html::style('assets/css/datatable-bootstrap.css') !!}
        <link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.3/normalize.css">
        <link rel="stylesheet" href="css/jquery.idealforms.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
                    <a class="nav-item nav-link" href="formulario">Formulario UAF</a>
                    <a class="nav-item nav-link" href="imprimirpdf">Mostrar el PDF</a>
                </nav>
            </div>
        </div>
    </div>

    <h1 align="Center">"Lista UAF"</h1>
    <table class="table table-bordered" id="table">
            <thead>
               <tr>
                  <th>Codigo</th>
                  <th>numero</th>
                  <th>lugar de firma</th>
                  <th>fecha declarado</th>
                  <th>tipo de formulario</th>
               </tr>
            </thead>
         </table>
      </div>
    <script type="text/javascript">
      $(document).ready(function() {
            aTable = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.tasks') }}",
            "columns": [
                     { data: 'id', name: 'id' },
                     { data: 'numero_form', name: 'numero_form' },
                     { data: 'lugar_firma', name: 'lugar_firma' },
                     { data: 'fecha_decla', name: 'fecha_decla' },
                     { data: 'tipo_formulario_id', name: 'tipo_formulario_id' }
                  ]
         });
      });
      </script>
        </body>
</html>
