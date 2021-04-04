<?php //encabezado()
if (!@$_SESSION['validada'] == "SI") {
    if (@$_SESSION['tipo'] == "Administrador") {
        include_once 'Menu.php';
    } else {
        include_once 'MenuCliente.php';
    }
} else {
    echo "Not Found 404";
}

include_once '../Modelos/Ventas.php';
$ventas = new Ventas();
if (isset($_POST)) {
    $buscar    = @$_POST['form1'];
    $resultado = $ventas->buscarProducto(number_format($buscar));
} else {
    $resultado = $ventas->listar();
}
function agregarProducto($codigo)
{
    $conexion = new mysqli('localhost', 'root', '', 'samec');

    if ($conexion->connect_errno) {
        exit($conexion->connect_errno . ': ' . $conexion->connect_error);
    }

    $codigom   = $codigo;
    $consulta  = "SELECT producto FROM productos WHERE codigo =$codigom ";
    $resultado = $conexion->query($consulta) or exit($conexion->error);

    if ($resultado->num_rows) {
        $registro = $resultado->fetch_assoc();
        echo 'Producto: ' . $registro['producto'];
        $resultado->free();
    } else {
        echo 'No se encontró nada';
    }

    $conexion->close();
}
?>
<script language="javascript">
$(document).ready(function(){
    $("#category").on('change', function () {
        $("#category option:selected").each(function () {
            var id_category = $(this).val();
            $.post("SubServicios.php", { id_category: id_category }, function(data) {
                $("#SubServicios").html(data);
            });
        });
   });
});
</script>
<!-- Begin Page Content -->

<script src="../Estilos/js/Funciones.js"></script>
<div class="full-box dashboard-contentPage">
    <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
                <li class="pull-left">
                    <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                </li>
                <li>
                    <a href="search.html" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
              <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i></i> Ventas <small>Y Servicios</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="breadcrumb breadcrumb-tabs">
                <li>
                    <a href="?cargar=AdministrativaRegistrarEquipo" class="btn btn">
                        <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA VENTA
                    </a>
                </li>
                <li>
                    <a href="?cargar=AdministrativaListarEquipo" class="btn btn-success">
                        <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR VENTAS
                    </a>
                </li>
                <li>
                    <a href="?cargar=AdministrativaBuscarEquipo" class="btn btn-primary">
                        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR VENTA
                    </a>
                </li>
            </ul>
        </div>
    <section>
        <?php $row = mysqli_fetch_assoc($resultado);?>
        <div class="container-fluid">
            <!--form   method="post" id="buscar" class="row" autocomplete="off"-->
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="buscar">Cógigo de Servicios</label>
                        <input type="hidden" id="id" name="id">
                    <select  class="form-control" name="encargado" id="encargado" autofocus required>
                    <option onchange="cargaDatos();" value="">Selecciona el servicio</option>
                    <?php
include_once 'conexion.php';
$con     = new conexion();
$sql1    = "SELECT idtipo,nombre FROM tiposervicio;";
$result1 = $con->consultaRetorno($sql1);
while ($row = mysqli_fetch_array($result1)) {
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/
    $id             = $row["idtipo"];
    $nombreCompleto = $row["nombre"];
    echo "<option id='idtipo' value=$id>
                                        $nombreCompleto
                                        </option>";
}
?>
                                    </select>


                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>

                </div>
                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="buscar">Cógigo de barras</label>
                        <input type="hidden" id="id" name="id">
                    <select  class="form-control" name="encargado" id="encargado" autofocus required>
                    <option value="">Selecciona el equipo</option>
                    <?php
include_once 'conexion.php';
$con     = new conexion();
$sql1    = "SELECT idEquipo, CONCAT(marca,'-',modelo,'-',numeroSerie) as equipo FROM equipos;";
$result1 = $con->consultaRetorno($sql1);
while ($row = mysqli_fetch_array($result1)) {
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/
    $id             = $row["idEquipo"];
    $nombreCompleto = $row["equipo"];
    echo "<option value=$id>
                                        $nombreCompleto
                                        </option>";
}
?>
                                    </select>


                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nombre"><?php echo $row['codigo']; ?></label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre">
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="stockD" type="hidden">
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="agregarProducto(event);">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
            <!--/form-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                  <div class="col-xs-12 col-sm-6">
                                  <div align="left"><label class="control-label" for="tipo">Cliente:</label></div><div>
                                    <select  class="form-control" name="servicio" id="servicio" autofocus required>
                                    <option value="">Selecciona un cliente</option>
                                    <?php

$sql    = "SELECT * FROM usuarios WHERE estado=1";
$result = $con->consultaRetorno($sql);
/*lanzamos la consulta para traernos el nombre*/
while ($row = mysqli_fetch_array($result)) {
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/
    $id             = $row["id_usuario"];
    $nombreCompleto = $row["nombre"] . ' ' . $row["apellidos"];
    echo "<option value=$id>
                                        $nombreCompleto
                                        </option>";
}
?>
                                    </select>
                                    </div>
                    </div>
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Total a pagar</strong>
                        <input type="hidden" id="total" name="total" class="form-control  mb-2">
                        <strong id="tVenta" class="form-control border-0 text-success"></strong>
                        <button class="btn btn-danger" type="button" id="AnularCompra">Anular Venta</button>
                        <button class="btn btn-success" type="button" id="procesarVenta"><i class="fas fa-money-check-alt"></i> Procesar Venta</button>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
<?php //pie() ?>
 <script type="text/javascript">
                        function enviar(formul)
                        {
                        var nomb = formul.textfield.value
                        if (nomb.toLowerCase() != nomb.toUpperCase()){
                            alert("Ingrese caracteres numericos")
                        }

                        else{

                            location = "destino.htm?"+nomb
                         var  res=BuscarCodigo(nom)
                             alert("Resultado "+res)
                        }
                        }
                        function BuscarCodigo(e) {
                                if (e.which == 13) {
                                    const codigo = document.getElementById("buscar_codigo").value;
                                    const url = document.getElementById("url").value;
                                    const urls = url + "Compras/buscar";
                                    $.ajax({
                                        url: urls,
                                        type: 'POST',
                                        data: {
                                            codigo
                                        },
                                        success: function (response) {
                                            if (response != 0) {
                                                $("#error").addClass('d-none');
                                                var info = JSON.parse(response);
                                                document.getElementById("id").value = info.id;
                                                document.getElementById("nombre").value = info.nombre;
                                                document.getElementById("precio").value = info.precio;
                                                $("#stockD").val(info.cantidad);
                                                document.getElementById("cantidad").value = 1;
                                                document.getElementById("nombreP").innerHTML = info.nombre;
                                                document.getElementById("precioP").innerHTML = info.precio;
                                                document.getElementById("cantidad").focus();
                                            } else {
                                                $("#error").removeClass('d-none');
                                            }
                                        }
                                    });
                                }
                            }
                        function cargaDatos(){
                            alert("funciona");
                           var dato=document.getElementById("idtipo").value;
                        }

                    </script>
