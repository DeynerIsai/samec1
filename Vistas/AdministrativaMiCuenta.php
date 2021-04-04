<?php

$controlador = new controladorUsuario();
if (isset($_GET['id_usuario'])) {
    $row = $controlador->consultar($_GET['id_usuario']);
} else {
    echo "window.location.href='?cargar=cerrar'";

}

if (isset($_POST['actualizar'])) {
    if ($_POST['contraseña'] == $_POST['newPassword']) {
        if ($_POST['newPassword'] == null) {
            $r = $controlador->actualizarCuenta($_SESSION['id_usuario'], $_POST['pass'],
                $_POST['usuario']);
        } else {
            $r = $controlador->actualizarCuenta($_SESSION['id_usuario'], $_POST['newPassword'],
                $_POST['usuario']);
        }
        if ($r) {
            echo "
			<script language='JavaScript'>
			alert('Registro modificado');
			</script>";
        }
    } else {
        echo "
			<script language='JavaScript'>
			alert('No coinciden las contraseñas');
			</script>";
    }
}
?>
<meta charset="utf-8">
            <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
                <link href="../Estilos/css/main.css" rel="stylesheet">
                    <link href="../Estilos/Imagenes/icons/Icono2.ico" rel="icon" type="text/css">
                    </link>
                </link>
            </meta>
        </meta>
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
			  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> MI CUENTA</small></h1>
			</div>
			</div>

		<!-- Panel mi cuenta -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; Actualizar</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" >
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre de usuario *</label>
										  	<input value="<?php echo $row['usuario']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario" required="" maxlength="15">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Contraseña actual *</label>
										  	<input value="<?php echo $row['pass']; ?>" class="form-control" type="password" name="pass" required="" maxlength="70">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-lock"></i> &nbsp;Cambiar contraseña</legend>

				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Nueva contraseña *</label>
										  	<input class="form-control" type="password" name="contraseña" maxlength="70">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Repita la nueva contraseña *</label>
										  	<input class="form-control" type="password" name="newPassword"  maxlength="70">
										</div>
				    				</div>

				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
				    		<div class="container-fluid">
				    			<div class="row">
								<?php if ($row['tipo'] == 'Administrador') {
    echo
        "
				    				<div class='col-xs-12 col-sm-6'>
							    		<p class='text-left'>
					                        <div class='label label-success'>Nivel 1</div> Control total del sistema.
					                    </p>
				    				</div>
				    				<div class='col-xs-12 col-sm-6'>

											<div class='radio radio-primary'>
											 <label>
											 <input type='radio' name='tipo' id='optionsRadios1' value='Administrador' checked='true'>
											 <i class='zmdi zmdi-star'></i> &nbsp; Administrador
											 </label>
											 </div>";
} else {
    echo "
											<div class='col-xs-12 col-sm-6'>
												<p class='text-left'>
					                        	<div class='label label-primary'>Nivel 2</div> Permiso para registro y actualización solo para su modulo.
												</p>
											</div>
											<div class='radio radio-primary'>
											<label>
												<input type='radio' name='tipo' id='optionsRadios2' value='Normal' checked='true'>
												<i class='zmdi zmdi-star'></i> &nbsp; Normal
											</label>
										</div>";
}
?>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" name="actualizar" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
					    </p>
				    </form>
				</div>
			</div>
		</div>
	</section>