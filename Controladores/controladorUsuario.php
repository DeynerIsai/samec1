<?php
include_once '../Modelos/Usuario.php';

class controladorUsuario
{

    //atributos

    private $usuario;

    //metodos

    public function __construct()
    {
        $this->usuario = new Usuario();
    }
    public function index()
    {
        $resultado = $this->usuario->listar();
        return $resultado;
    }
    public function crear($id_usuario, $nombre, $apellidos, $password, $usuario, $tipo, $correo, $telefono, $direccion, $genero)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $this->usuario->set("nombre", $nombre);
        $this->usuario->set("apellidos", $apellidos);
        $this->usuario->set("password", $password);
        $this->usuario->set("usuario", $usuario);
        $this->usuario->set("tipo", $tipo);
        $this->usuario->set("correo", $correo);
        $this->usuario->set("telefono", $telefono);
        $this->usuario->set("direccion", $direccion);
        $this->usuario->set("genero", $genero);
        $resultado = $this->usuario->crear();
        return $resultado;
    }
    public function eliminar($id_usuario)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $this->usuario->eliminar();
    }
    public function consultar($id_usuario)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $datos = $this->usuario->consultar();
        return $datos;
    }
    public function editar($id_usuario, $nombre, $apellidos, $password, $usuario, $tipo, $correo, $telefono, $direccion, $genero)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $this->usuario->set("nombre", $nombre);
        $this->usuario->set("apellidos", $apellidos);
        $this->usuario->set("usuario", $usuario);
        $this->usuario->set("password", $password);
        $this->usuario->set("tipo", $tipo);
        $this->usuario->set("correo", $correo);
        $this->usuario->set("telefono", $telefono);
        $this->usuario->set("direccion", $direccion);
        $this->usuario->set("genero", $genero);
        //$this->lugar->consultar();
        $resultado = $this->usuario->editar();
        return $resultado;
    }
    public function editarDatos($id_usuario, $nombre, $apellidos, $correo, $telefono, $direccion, $genero)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $this->usuario->set("nombre", $nombre);
        $this->usuario->set("apellidos", $apellidos);
        $this->usuario->set("correo", $correo);
        $this->usuario->set("telefono", $telefono);
        $this->usuario->set("direccion", $direccion);
        $this->usuario->set("genero", $genero);
        //$this->lugar->consultar();
        $resultado = $this->usuario->editar();
        return $resultado;
    }
    public function actualizarCuenta($id_usuario, $password, $usuario)
    {
        $this->usuario->set("id_usuario", $id_usuario);
        $this->usuario->set("password", $password);
        $this->usuario->set("usuario", $usuario);

        $resultado = $this->usuario->actualizarCuenta();
        return $resultado;
    }
}
