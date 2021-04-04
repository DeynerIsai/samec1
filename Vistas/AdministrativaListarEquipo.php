<?php
if (!@$_SESSION['validada'] == "SI") {
    if (@$_SESSION['tipo'] == "Administrador") {
        include_once 'Menu.php';
    } else if (@$_SESSION['tipo'] == "Soporte") {
        include_once 'MenuSoporte.php';
    } else if (@$_SESSION['tipo'] == "Cliente") {
        include_once 'MenuCliente.php';
    }
} else {
    echo "Not Found 404";
}
require_once '../Modelos/Equipo.php';

$equipo = new Equipo();
if (isset($_GET)) {
    $buscar    = @$_GET['tipo'];
    $idUsuario = @$_GET['idUsuario'];
    if ($buscar != null) {
        # filtramos por tipo

        $resultado = $equipo->filtrarTipo($buscar);
    } else {

        $resultado = $equipo->filtrarPorEncargado($idUsuario);
    }
} else {
    $resultado = $equipo->listar();
}

$enrutadorEquipo = new enrutadorEquipo();
if ($enrutadorEquipo->validarGET(@$_GET['cargar'])) {
    $enrutadorEquipo->cargarVista($_GET['cargar']);
}
?>


	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
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
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i></i> Equipos <small>Registrados</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="?cargar=AdministrativaRegistrarEquipo" class="btn btn">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EQUIPO
			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaListarEquipo" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS
			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaBuscarEquipo" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR EQUIPO
			  		</a>
			  	</li>
			</ul>
		</div>

		<!-- Panel listado de clientes -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">Marca</th>
									<th class="text-center">Tipo</th>
									<th class="text-center">Modelo</th>
									<th class="text-center">Serie</th>
									<th class="text-center">Inventario</th>
									<th class="text-center">Procesador</th>
									<th class="text-center">RAM</th>
									<th class="text-center">Disco Duro</th>
									<th class="text-center">Disco Drive</th>
									<th class="text-center">Hardware Adicional</th>
									<th class="text-center">Observaciones</th>
									<th class="text-center">MAC</th>
									<th class="text-center">IP</th>
									<th class="text-center">Softwares</th>
									<th class="text-center">Codigo QR</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php while ($row = mysqli_fetch_assoc($resultado)): ?>
										<tr>
											<td class="hidden" ><?php echo $row['idEquipo']; ?></td>
											<td><?php echo $row['marca']; ?></td>
											<td><?php echo $row['tipo']; ?></td>
											<td><?php echo $row['modelo']; ?></td>
											<td><?php echo $row['numeroSerie']; ?></td>
											<td><?php echo $row['numeroInventario']; ?></td>
											<td><?php echo $row['procesador']; ?></td>
											<td><?php echo $row['ram']; ?></td>
											<td><?php echo $row['discoDuro']; ?></td>
											<td><?php echo $row['cdDrive']; ?></td>
											<td><?php echo $row['hardwareAdicional']; ?></td>
											<td><?php echo $row['observaciones']; ?> </td>
											<td><?php echo $row['macaddress']; ?></td>
											<td><?php echo $row['ipaddress']; ?></td>
											<td><?php echo $row['softwares']; ?></td>
											<td><img src="QRs/<?php echo $row['codigoqr']; ?>" height="42" width="42"> </td>
											<td><a href=?cargar=AdministrativaEditarEquipo&idEquipo=<?php echo
    $row["idEquipo"]; ?>><img src="../Estilos/Imagenes/iconosRegistros/editar.png" height="42" width="42" ></a></td>
											<td><a style="cursor: pointer;" 	onclick='confirmar(<?php echo $row['idEquipo']; ?>)'><img src="../Estilos/Imagenes/iconosRegistros/eliminar.png" height="42" width="42"></a></td>
										</tr>
									<?php endwhile;?>
									<script src="js/jquery.js"></script>

							<script language = "javascript">
								function confirmar(idEquipo){
									confirmar=confirm("Realmente deseas eliminar el registro?");
										if(confirmar)
										{
											window.location.href='?cargar=AdministrativaEliminarEquipo&idEquipo='+idEquipo;
											alert('Registro eliminado...');
										}
										else {
											window.location.href='?cargar=AdministrativaListarEquipo';
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
