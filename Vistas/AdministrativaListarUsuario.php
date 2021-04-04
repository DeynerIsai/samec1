<?php
if (@$_SESSION['validada'] == "SI") {
    include_once 'Menu.php';
}

require_once '../Modelos/Usuario.php';

$usuario = new Usuario();
if (isset($_GET)) {
    $buscar    = @$_GET['tipo'];
    $resultado = $usuario->filtrarTipo($buscar);
} else {
    $resultado = $usuario->listar();
}
$enrutadorEmpleado = new enrutadorMenu();
if ($enrutadorEmpleado->validarGET(@$_GET['cargar'])) {
    $enrutadorEmpleado->cargarVista($_GET['cargar']);
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
			</ul>
		</nav>
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i></i> Usuarios </h1>
			</div>
			</div>
		<div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="?cargar=AdministrativaRegistrarUsuario" class="btn btn-info">
			  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO
			  		</a>
			  	</li>
			 	<li>
			  		<a href="?cargar=AdministrativaBuscarUsuario" class="btn btn-primary">
			  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIO
			  		</a>
			  	</li>
			</ul>
		</div>

		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp;<?php echo $buscar; ?>es</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="hidden">#</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Apellidos</th>
									<th class="text-center">Contraseña</th>
									<th class="text-center">Usuario</th>
									<th class="text-center">Tipo</th>
									<th class="text-center">Correo</th>
									<th class="text-center">Telefono</th>
									<th class="text-center">Direccion</th>
									<th class="text-center">Genero</th>
									<th class="text-center">Editar</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php while ($row = mysqli_fetch_assoc($resultado)): ?>
										<tr>
											<td class="hidden"><?php echo $row['id_usuario']; ?></td>
											<td><?php echo $row['nombre']; ?></td>
											<td><?php echo $row['apellidos']; ?></td>
											<td><?php echo $row['pass']; ?></td>
											<td><?php echo $row['usuario']; ?></td>
											<td><?php echo $row['tipo']; ?></td>
											<td><?php echo $row['correo']; ?></td>
											<td><?php echo $row['telefono']; ?></td>
											<td><?php echo $row['direccion']; ?></td>
											<td><?php echo $row['genero']; ?></td>
											<td><a href=?cargar=AdministrativaEditarUsuario&id_usuario=<?php echo $row['id_usuario']; ?>><img src="../Estilos/Imagenes/iconosRegistros/editar.png" height="42" width="42" ></a></td>
											<td><a style="cursor: pointer;" onclick='confirmar(<?php echo $row['id_usuario']; ?>)'><img src="../Estilos/Imagenes/iconosRegistros/eliminar.png" height="42" width="42"></a></td>
										</tr>
									<?php endwhile;?>
									<script src="js/jquery.js"></script>

							<script language = "javascript">
								function confirmar(id_usuario){
									confirmar=confirm("Realmente deseas eliminar el registro?");
										if(confirmar)
										{
											window.location.href='?cargar=AdministrativaEliminarUsuario&id_usuario='+id_usuario;
											alert('Registro eliminado...');
										}
										else {
											window.location.href='?cargar=AdministrativaListarUsuario?tipo=Admnistrador';
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