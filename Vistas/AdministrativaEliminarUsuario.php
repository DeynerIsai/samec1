<?php
	$controlador = new controladorUsuario();
	if(isset($_GET['id_usuario'])){
		$row=$controlador->consultar($_GET['id_usuario']);

	}else{
		echo "<script>window.location.href='?cargar=AdministrativaListarUsuario&tipo=Administrador'</script>";
	}
	$controlador->eliminar($_GET['id_usuario']);
	echo "<script>window.location.href='?cargar=AdministrativaListarUsuario&tipo=Administrador'</script>";
?>