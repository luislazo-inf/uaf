<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // Refresca Producto: Refresco la Lista de Productos dentro de la Tabla
        // Si es vacia deshabilito el boton guardar para obligar a seleccionar al menos un producto al usuario
        // Sino habilito el boton Guardar para que pueda Guardar
        function RefrescaProducto() {
            var ip = [];
            var i = 0;
            $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
            $('.iProduct').each(function(index, element) {
                i++;
                ip.push({
                    id_pro: $(this).val()
                });
            });
            // Si la lista de Productos no es vacia Habilito el Boton Guardar
            if (i > 0) {
                $('#guardar').removeAttr('disabled', 'disabled');
            }
            var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo al controlador
            $('#ListaPro').val(encodeURIComponent(ipt));
        }

        function agregarProducto() {

            var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
            var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select
            if($productos = null){

                alert('hola');

            }else{

                @foreach($productos as $producto) {
                    {
                        $id = $producto - > id
                    }
                }
                var id = <?php echo json_encode($id); ?>;
                if (sel == id) {
                    var sptext = text.split();

                    var newtr = '<tr class="item"  data-id="' + sel + '">';
                    newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
                    newtr = newtr + '<td> <input  class="form-control" id="1" name="ListaPro" value="{{ $producto->codigo_producto }}" /></td>';
                    newtr = newtr + '<td> <input  class="form-control" id="1" name="ListaPro" value="{{ $producto->descripcion1 }}" /></td>';
                    newtr = newtr + '<td> <input  class="form-control" id="2" name="ListaPro" value="0" required /></td>';
                    newtr = newtr + '<td><input  class="form-control" id="3" name="ListaPro" value="{{ $producto->precio_compra }}" /></td>';
                    newtr = newtr + '<td><input  class="form-control"  id="4" name="ListaPro" value="Suma" required /></td>';
                    newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';
                }
                @endforeach
            }




            $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

            RefrescaProducto(); //Refresco Productos

            $('.remove-item').off().click(function(e) {
                $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
                if ($('#ProSelected tr.item').length == 0)
                    $('#ProSelected .no-item').slideDown(300);
                RefrescaProducto();
            });
            $('.iProduct').off().change(function(e) {
                RefrescaProducto();
            });
        }
    </script>
</head>

<body>

    <div class="container">
        {!! Form::open(['route'=> 'prueba.store', 'method'=>'POST', 'files' => true]) !!}
        <h2>Comprar productos</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button>
        <input type="hidden" id="ListaPro" name="ListaPro" value="" required />
        <table id="TablaPro" class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Codigo de producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="ProSelected">
                <!--Ingreso un id al tbody-->
                <tr>

                </tr>
            </tbody>
        </table>
        <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-default pull-right">Guardar</button>
        </div>
        {!! Form::close() !!}

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar producto a la lista</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Producto</label>
                            <select class="selectpicker form-control" id="pro_id" name="pro_id" data-width='100%'>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}">{{ $producto->codigo_producto.' | '.$producto->descripcion1 }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                        <button type="button" onclick="agregarProducto()" class="btn btn-default" data-dismiss="modal">Agregar</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
