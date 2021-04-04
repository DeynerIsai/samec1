<?php

include_once 'Conexion.php';
include_once '../Controladores/enrutadorMenu.php';
include_once 'Usuario.php';
class Login
{
    private $con;
    public function __construct($user, $contrasenia)
    {

        $this->user        = $user;
        $this->contrasenia = $contrasenia;

    }

    public function validar()
    {
        try {
            $usuario  = 'root';
            $password = '';
            $conn     = new PDO('mysql:host=localhost;dbname=samec', $usuario, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
        $sql = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND estado=1');
        $sql->execute(array(':usuario' => $this->user));
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        //while ($fila= mysqli_fetch_assoc($resultado)){
        if ($resultado) {
            //Retorna TRUE en caso de encontrar datos referentes al USUARIO
            if ($this->contrasenia == $resultado['pass']) {
                //Validamos que coincidan las Contraseñas
                $usuario = new Usuario();
                $sql2    = $conn->prepare('SELECT idtipo,nombre FROM tiposervicio WHERE idservicio=' . $resultado['id_usuario']);
                $sql2->execute();
                $lugar = $sql2->fetch(PDO::FETCH_ASSOC);

                if ($resultado['tipo'] == 'Administrador') {
                    @session_start();
                    $_SESSION['nombre']     = $resultado['nombre'];
                    $_SESSION['apellidos']  = $resultado['apellidos'];
                    $_SESSION['correo']     = $resultado['correo'];
                    $_SESSION['usuario']    = $this->user;
                    $_SESSION['id_usuario'] = $resultado['id_usuario'];
                    $_SESSION['tipo']       = $resultado['tipo'];
                    $_SESSION['lugar']      = $lugar['nombre'];
                    $_SESSION['validada']   = "SI";
                    $usuario->entradaUsuario($_SESSION['id_usuario']);
                    header("Location:../Vistas/Menu.php?cargar=Home");
                    $sql3 = $conn->prepare('SELECT MAX(id_bitacora) AS id_bitacora FROM usuario_bitacora WHERE id_usuario=' . $resultado['id_usuario']);
                    $sql3->execute();
                    $bitacora                = $sql3->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_bitacora'] = $bitacora['id_bitacora'];

                } else if ($resultado['tipo'] == 'Soporte') {
                    $_SESSION['nombre'] = $usuario;
                    @session_start();
                    $_SESSION['nombre']     = $resultado['nombre'];
                    $_SESSION['apellidos']  = $resultado['apellidos'];
                    $_SESSION['correo']     = $resultado['correo'];
                    $_SESSION['usuario']    = $this->user;
                    $_SESSION['id_usuario'] = $resultado['id_usuario'];
                    $_SESSION['tipo']       = $resultado['tipo'];
                    $_SESSION['lugar']      = $lugar['nombre'];
                    $_SESSION['validada']   = "SI";
                    $usuario->entradaUsuario($_SESSION['id_usuario']);
                    header("Location:../Vistas/MenuSoporte.php?cargar=AdministrativaListarEquipos");
                    $sql3 = $conn->prepare('SELECT MAX(id_bitacora) AS id_bitacora FROM usuario_bitacora WHERE id_usuario=' . $resultado['id_usuario']);
                    $sql3->execute();
                    $bitacora                = $sql3->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_bitacora'] = $bitacora['id_bitacora'];

                } else if ($resultado['tipo'] == 'Cliente') {
                    $_SESSION['nombre'] = $usuario;
                    @session_start();
                    $_SESSION['nombre']     = $resultado['nombre'];
                    $_SESSION['apellidos']  = $resultado['apellidos'];
                    $_SESSION['correo']     = $resultado['correo'];
                    $_SESSION['usuario']    = $this->user;
                    $_SESSION['id_usuario'] = $resultado['id_usuario'];
                    $_SESSION['tipo']       = $resultado['tipo'];
                    $_SESSION['lugar']      = $lugar['nombre'];
                    $_SESSION['validada']   = "SI";
                    $usuario->entradaUsuario($_SESSION['id_usuario']);
                    header("Location:../Vistas/MenuCliente.php?cargar=AdministrativaListarEquipos");
                    $sql3 = $conn->prepare('SELECT MAX(id_bitacora) AS id_bitacora FROM usuario_bitacora WHERE id_usuario=' . $resultado['id_usuario']);
                    $sql3->execute();
                    $bitacora                = $sql3->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_bitacora'] = $bitacora['id_bitacora'];
                }
            } else {
                echo "
                    <script language='JavaScript'>
                            alert('La contraseña es incorrecta');
                            window.location.href='../Vistas/AdministrativaLogin.php'
                            </script>";
            }
        } else {
            echo "<script language='JavaScript'>
                        alert('El usuario no existe');
                        window.location.href='../Vistas/AdministrativaLogin.php'
                        </script>";
        }
    }
    public function password_verify($password, $hash)
    {
        if ($password == $hash) {
            return true;
        }
    }
}
