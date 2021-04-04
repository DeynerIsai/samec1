<?php
require_once '../Modelos/Login.php';
require_once '../Controladores/enrutadorMenu.php';
$usuario = $_POST['usuario'];
$pass    = $_POST['password'];

$login = new Login($usuario, $pass);
$login->validar();
