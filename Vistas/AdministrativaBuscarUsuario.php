<?php
$usuario = new Usuario();
if (isset($_POST)) {
    $buscar    = @$_POST['buscar'];
    $resultado = $usuario->
        filtrar($buscar);
} else {
    $resultado = $usuario->listar();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
        SAMEC
    	</title>
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
        <!-- Content page-->
        <section class="full-box dashboard-contentPage">
            <!-- NavBar -->
            <nav class="full-box dashboard-Navbar">
                <ul class="full-box list-unstyled text-right">
                    <li class="pull-left">
                        <a class="btn-menu-dashboard" href="#!">
                            <i class="zmdi zmdi-more-vert">
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="btn-search" href="search.html">
                            <i class="zmdi zmdi-search">
                            </i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Content page -->
            <div class="container-fluid">
                <div class="page-header">
                    <h1 class="text-titles">
                        <i class="zmdi zmdi-balance zmdi-hc-fw">
                        </i>
                        Buscar
                        <small>
                            Usuarios
                        </small>
                    </h1>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a class="btn btn-info" href="?cargar=AdministrativaRegistrarUsuario">
                            <i class="zmdi zmdi-plus">
                            </i>
                            NUEVO USUARIO
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-success" href="?cargar=AdministrativaListarUsuario&tipo=Administrador">
                            <i class="zmdi zmdi-format-list-bulleted">
                            </i>
                            LISTA DE USUARIOS
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <form action="" class="well" method="POST">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="form-group label-floating">
                                <span class="control-label">
                                    ¿Quien estas buscando?
                                </span>
                                <input class="form-control" name="buscar" required="" type="text" value="<?php echo $buscar ?>">
                                </input>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <p class="text-center">
                                <button class="btn btn-primary btn-raised btn-sm" type="submit">
                                    <i class="zmdi zmdi-search">
                                    </i>
                                    Buscar
                                </button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Panel listado de clientes -->
            <div class="container-fluid">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="zmdi zmdi-format-list-bulleted">
                            </i>
                            LISTA DE USUARIOS
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="hidden">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Nombre
                                        </th>
                                        <th class="text-center">
                                            Tipo
                                        </th>
                                        <th class="text-center">
                                            Distancia
                                        </th>
                                        <th class="text-center">
                                            Dirección
                                        </th>
                                        <th class="text-center">
                                            Historia
                                        </th>
                                        <th class="text-center">
                                            Imagen
                                        </th>
                                        <th class="text-center">
                                            Pagina web
                                        </th>
                                        <th class="text-center">
                                            Teléfono
                                        </th>
                                        <th class="text-center">
                                            Correo
                                        </th>
                                        <th class="text-center">
                                            Editar
                                        </th>
                                        <th class="text-center">
                                            Eliminar
                                        </th>
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
											window.location.href='?cargar=consultarUsuario';
										}
								}
								</script>
							</tbody>
                            </table>
                        </div>
                        <nav class="text-center">
                            <ul class="pagination pagination-sm">
                                <li class="disabled">
                                    <a href="javascript:void(0)">
                                        «
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="javascript:void(0)">
                                        1
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        2
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        3
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        4
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        5
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        »
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>