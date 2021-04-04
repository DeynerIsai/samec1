<?php
$html     = '';
$conexion = new mysqli('localhost', 'root', '', 'samec');

$idtipo = $_POST['idtipo'];

$result = $conexion->query(
    "SELECT idtipo,nombre FROM tiposervicio"
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<option value="' . $row['idtipo'] . '">' . $row['nombre'] . '</option>';
    }
}
echo $html;
