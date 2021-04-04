<?php
$controlador = new controladorServicios();
if (isset($_GET['idtipo'])) {
    $row = $controlador->consultar($_GET['idtipo']);

} else {
    echo "<script>window.location.href='?cargar=AdministrativaListarServicios'</script>";
}
$controlador->eliminar($_GET['idtipo']);
echo "<script>window.location.href='?cargar=AdministrativaListarServicios'</script>";
