<?php
	$controlador = new controladorEquipo();
	if(isset($_GET['idEquipo'])){
		$row=$controlador->consultar($_GET['idEquipo']);

	}else{
		echo "<script>window.location.href='?cargar=AdministrativaListarEquipo'</script>";
	}
	$controlador->eliminar($_GET['idEquipo']);
	echo "<script>window.location.href='?cargar=AdministrativaListarEquipo'</script>";
?>