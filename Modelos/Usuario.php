<?php
include_once 'Conexion.php';

class Usuario
{

    //atributos

    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $password;
    private $usuario;
    private $tipo;
    private $correo;
    private $genero;
    private $telefono;
    private $direccion;
    private $estado;
    private $con;

    //metodos

    public function __construct()
    {

        $this->con = new conexion();
    }

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function listar()
    {
        $sql       = "SELECT * FROM usuarios where estado=1";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function buscar($word = false, $num = false)
    {

        if ($num == 1) {
            $sth = $this->con->consultaRetorno('SELECT * FROM usuario WHERE estado=1 AND nombre LIKE "%' . $word . '%" '
                . 'OR tipo apellidos "%' . $word . '%" OR tipo LIKE "%' . $word . '%" ');
            //$sth->execute();
            return $sth;
        } else {
            $sth = $this->con->consultaRetorno('SELECT *, MATCH (nombre, precio, idservicio)'
                . 'AGAINST (:words) FROM tiposervicio WHERE MATCH (nombre, precio, idservicio)'
                . 'AGAINST (:words)');
            $sth->execute(array(
                ':words' => $word,
            ));
            return $sth->fetchAll();
        }
    }
    public function crear()
    {

        $sql = "INSERT INTO usuarios (id_usuario,nombre,apellidos,pass,usuario,tipo,correo,telefono,direccion,genero,estado)
        VALUES($this->id_usuario,'{$this->nombre}','{$this->apellidos}','{$this->password}','{$this->usuario}','{$this->tipo}','{$this->correo}','{$this->telefono}','{$this->direccion}','{$this->genero}',1);";
        $this->con->consultaSimple($sql);
        return true;
    }

    public function eliminar()
    {
        $sql       = "UPDATE usuarios SET estado=0 WHERE id_usuario='{$this->id_usuario}'";
        $resultado = $this->con->consultaSimple($sql);
    }

    public function filtrar($valor)
    {
        $sql       = "SELECT * FROM usuarios WHERE estado=1 AND nombre LIKE '%$valor%' OR apellidos LIKE '%$valor%'";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }
    public function filtrarTipo($valor)
    {
        $sql       = "SELECT * FROM usuarios WHERE tipo='$valor' AND estado=1";
        $resultado = $this->con->consultaRetorno($sql);
        return $resultado;
    }

    public function consultar()
    {
        $sql       = "SELECT * FROM usuarios WHERE id_usuario=$this->id_usuario AND estado=1";
        $resultado = $this->con->consultaRetorno($sql);
        $row       = mysqli_fetch_assoc($resultado);

        //set

        $this->id_usuario = $row['id_usuario'];
        $this->nombre     = $row['nombre'];
        $this->apellidos  = $row['apellidos'];
        $this->password   = $row['pass'];
        $this->usuario    = $row['usuario'];
        $this->tipo       = $row['tipo'];
        $this->correo     = $row['correo'];
        $this->telefono   = $row['telefono'];
        $this->direccion  = $row['direccion'];
        $this->genero     = $row['genero'];
        return $row;
    }

    public function editar()
    {
        $sql = "UPDATE usuarios SET nombre='{$this->nombre}',apellidos='{$this->apellidos}',
        pass='{$this->password}',usuario='{$this->usuario}',tipo='{$this->tipo}',
        correo='{$this->correo}',telefono='{$this->telefono}',direccion='{$this->direccion}',
        genero='{$this->genero}' WHERE id_usuario=$this->id_usuario";
        $this->con->consultaSimple($sql);
        return true;
    }
    public function editarDatos()
    {
        $sql = "UPDATE usuarios SET nombre='{$this->nombre}',apellidos='{$this->apellidos}',correo='{$this->correo}',telefono='{$this->telefono}',direccion='{$this->direccion}',genero='{$this->genero}' WHERE id_usuario=$this->id_usuario";
        $this->con->consultaSimple($sql);
        return true;
    }
    public function actualizarCuenta()
    {
        $sql = "UPDATE usuarios SET pass='{$this->password}',usuario='{$this->usuario}'
         WHERE id_usuario=$this->id_usuario";
        $this->con->consultaSimple($sql);
        return true;
    }
    public function entradaUsuario($id_usuario)
    {
        $sql       = "INSERT INTO usuario_bitacora VALUES(0,NOW(),null,NOW(),$id_usuario)";
        $resultado = $this->con->consultaSimple($sql);

    }
    public function salidaUsuario($id_bitacora)
    {
        $sql       = "UPDATE usuario_bitacora SET salida=NOW() WHERE id_bitacora=$id_bitacora";
        $resultado = $this->con->consultaSimple($sql);

    }
}
