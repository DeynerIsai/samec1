<?php
$servicios = new Servicios();
if (isset($_POST)) {
    $buscar    = @$_POST['buscar'];
    $resultado = $servicios->
        filtrar($buscar);
} else {
    $resultado = $servicios->listar();
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
                            Servicio
                        </small>
                    </h1>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a class="btn btn-info" href="?cargar=AdministrativaRegistrarServicios">
                            <i class="zmdi zmdi-plus">
                            </i>
                            NUEVO SERVICIO
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-success" href="?cargar=AdministrativaListarServicios&idUsuario=<?php echo $_SESSION['id_usuario'] ?>">
                            <i class="zmdi zmdi-format-list-bulleted">
                            </i>
                            LISTA DE SERVICIOS
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="?cargar=AdministrativaBuscarServicios">
                            <i class="zmdi zmdi-search">
                            </i>
                            BUSCAR SERVICIO
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
                                    ¿Que Servicio estas buscando?
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
                            LISTA DE SERVICIOS
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            Nombre
                                        </th>
                                        <th class="text-center">
                                            Precio
                                        </th>
                                        <th class="text-center">
                                            TipoServicio
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
											<td class="hidden"><?php echo $row['idtipo']; ?></td>
											<td><?php echo $row['nombre']; ?></td>
											<td><?php echo $row['precio']; ?></td>
											<td><?php echo $row['idservicio']; ?> </td>
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