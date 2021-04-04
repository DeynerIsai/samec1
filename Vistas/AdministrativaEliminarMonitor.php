<?php
	$controlador = new controladorMonitor();
	if(isset($_GET['idMonitor'])){
		$row=$controlador->consultar($_GET['idMonitor']);
	}else{
		echo "<script>window.location.href='?cargar=AdministrativaListarMonitor'</script>";
	}
	$controlador->eliminar($_GET['idMonitor']);
	echo "<script>window.location.href='?cargar=AdministrativaListarMonitor'</script>";
?>