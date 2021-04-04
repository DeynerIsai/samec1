<?php
if (!@$_SESSION['validada'] == "SI") {
    if (@$_SESSION['tipo'] == "Administrador") {
        include_once 'Menu.php';
    } else {
        include_once 'MenuCliente.php';
    }
} else {
    echo "Not Found 404";
}
require_once '../Modelos/Servicios.php';

$servicios = new Servicios();
if (isset($_GET)) {
    $buscar    = @$_GET['tipo'];
    $resultado = $servicios->filtrarTipo($buscar);
} else {

}
$resultado          = $servicios->listar();
$enrutadorServicios = new enrutadorServicios();
if ($enrutadorServicios->validarGET(@$_GET['cargar'])) {
    $enrutadorServicios->cargarVista($_GET['cargar']);
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>SAMEC</title>
 	<meta charset="utf-8">
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
            <link href="../Estilos/css/main.css" rel="stylesheet">
                <link href="../Estilos/Imagenes/icons/Icono2.ico" rel="icon" type="text/css">
                </link>
            </link>
        </meta>
    </meta>
 </head>
 <body>
 	<section class="full-box dashboard-contentPage">
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
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i></i> Servicios <small>Registrados</small></h1>
			</div>
		</div>

		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="?cargar=AdministrativaRegistrarServicios&idUsuario=<?php echo $_SESSION['id_usuario'] ?>" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO SERVICIO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaListarServicios&idUsuario=<?php echo $_SESSION['id_usuario'] ?>" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE SERVICIOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaBuscarServicios" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR SERVICIO
			  		</a>
			  	</li>
			</ul>
		</div>
		<!-- Panel listado de clientes -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE SERVICIOS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">Nombre</th>
									<th class="text-center">Precio</th>
									<th class="text-center">TipoServicio</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php while ($row = mysqli_fetch_assoc($resultado)): ?>
										<tr>
											<td class="hidden"><?php echo $row['idtipo']; ?></td>
											<td><?php echo $row['servicio']; ?></td>
											<td><?php echo $row['precio']; ?></td>
											<td><?php echo $row['categoria']; ?> </td>
											<td><a href=?cargar=AdministrativaEditarServicios&idtipo=<?php echo $row['idtipo']; ?>><img src="../Estilos/Imagenes/iconosRegistros/editar.png" height="42" width="42" ></a></td>
											<td><a style="cursor: pointer;" onclick='confirmar(<?php echo $row['idtipo']; ?>)'><img src="../Estilos/Imagenes/iconosRegistros/eliminar.png" height="42" width="42"></a></td>
										</tr>
									<?php endwhile;?>
									<script src="js/jquery.js"></script>

							<script language = "javascript">
								function confirmar(idtipo){
									confirmar=confirm("Realmente deseas eliminar el registro?");
										if(confirmar)
										{
											window.location.href='?cargar=AdministrativaEliminarServicios&idtipo='+idtipo;
											alert('Registro eliminado...');
										}
										else {
											window.location.href='?cargar=consultarServicio';
										}
								}
								</script>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
 </body>
 </html>