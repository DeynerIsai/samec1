<?php
if (!@$_SESSION['validada'] == "SI"){
  if(@$_SESSION['tipo'] == "Administrador"){ 
  include_once 'Menu.php';
}else{ 
  include_once 'MenuCliente.php';
}
}else{
  echo "Not Found 404"; 
}
  require_once '../Modelos/Monitor.php';


	$monitor = new Monitor();
		if (isset($_GET))
		{
			$buscar=@$_GET['tipo'];
				$resultado=$monitor->filtrarTipo($buscar);
		}
		else{
			
		}
	$resultado = $monitor->listar();	
		$enrutadorMonitor = new enrutadorMonitor();
	if ($enrutadorMonitor->validarGET(@$_GET['cargar'])) {
		$enrutadorMonitor->cargarVista($_GET['cargar']);
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
			  <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i></i> Monitores <small>Registrados</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="?cargar=AdministrativaRegistrarMonitor" class="btn btn">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO MONITOR			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaListarMonitor" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MONITOR
			  		</a>
			  	</li>
			  	<li>
			  		<a href="?cargar=AdministrativaBuscarMonitor" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR MONITOR			  		</a>
			  	</li>
			</ul>
		</div>
		
		<!-- Panel listado de clientes -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE MONITORES</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">Marca</th>
									<th class="text-center">Modelo</th>
									<th class="text-center">Serie</th>
									<th class="text-center">Inventario</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php while($row = mysqli_fetch_assoc($resultado)): ?>
										<tr>
											<td class="hidden" ><?php echo $row['idMonitor'];?></td>
											<td><?php echo $row['marca'];?></td>
											<td><?php echo $row['modelo'];?></td>
											<td><?php echo $row['numeroSerie'];?></td>
											<td><?php echo $row['numeroInventario'];?></td>
											<td><img src="MonitorQRs/<?php echo $row['codigoqr'];?>" height="42" width="42"> </td>
											<td><a href=?cargar=AdministrativaEditarMonitor&idMonitor=<?php echo 
											$row["idMonitor"]; ?>><img src="../Estilos/Imagenes/iconosRegistros/editar.png" height="42" width="42" ></a></td>
											<td><a style="cursor: pointer;" 	onclick='confirmar(<?php echo $row['idMonitor'];?>)'><img src="../Estilos/Imagenes/iconosRegistros/eliminar.png" height="42" width="42"></a></td>
										</tr>
									<?php endwhile; ?>
									<script src="js/jquery.js"></script>

							<script language = "javascript">
								function confirmar(idMonitor){
									confirmar=confirm("Realmente deseas eliminar el registro?");
										if(confirmar)
										{
											window.location.href='?cargar=AdministrativaEliminarMonitor&idMonitor='+idMonitor;
											alert('Registro eliminado...');
										}
										else {
											window.location.href='?cargar=AdministrativaListarMonitor';
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
