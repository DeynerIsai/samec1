<?php
if ($_SESSION['validada'] != "SI"){
  if(@$_SESSION['tipo'] == "Administrador"){ 
  include_once 'Menu.php';
}else{
  include_once 'MenuCliente.php';
}
}elseif($_SESSION['validada'] != "SI"){
  echo "<script>window.location='AdministrativaLogin.php'</script>";
}
  $r=0;
	$controlador = new controladorMonitor();
	if(isset($_POST['AdministrativaRegistrarMonitor'])){
    $r=$controlador->crear($_POST['idMonitor'],$_POST['marca'],
     $_POST['modelo'], $_POST['numeroSerie'], $_POST['numeroInventario'],$_POST['idEquipo']);

		if($r){
      $is=$_SESSION['id_usuario'];
			echo"
				<script>
				if(confirm(\"¿Desea realizar un nuevo registro?\")){
					window.location.href='?cargar=AdministrativaRegistrarMonitor';
				}else{
          
					window.location.href='?cargar=AdministrativaListarMonitor';
				}
					</script>";
		}
	}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- Content page-->
<section class="full-box dashboard-contentPage"  >
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
    <form action=""  method="POST" enctype="multipart/form-data" >
    <div class="container-fluid" >
        <div class="page-header">
          <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>Monitores</small></h1>
        </div>
        </div>

    <div class="container-fluid">
        <ul class="breadcrumb breadcrumb-tabs">
              <li>
                  <a href="?cargar=AdministrativaRegistrarMonitor" class="btn btn-info">
                      <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO MONITOR
                  </a>
              </li>
              <li>
                  <a href="?cargar=AdministrativaListarMonitor" class="btn btn-success">
                      <i class="zmdi zmdi-format-list-bulleted"></i>&nbsp; LISTA DE MONITORES
                  </a>
              </li>
        </ul>
    </div>

    <!-- panel datos de la empresa -->
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL MONITOR</h3>
            </div>
            <div class="panel-body">
                    <fieldset>
                        <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                    <?php 
                                    include_once('../Modelos/conexion.php');
                                      $con=new conexion();
                                      $sql = "SELECT MAX(idMonitor) AS id FROM monitores";
                                      $result = $con->consultaRetorno($sql);
                                     /*lanzamos la consulta para traernos el maximo de id*/
                                    while ($row=mysqli_fetch_array($result))
                                    { 
                                        /*almacenamos el nombre de la ruta en la variable $ruta_img*/
                                        $id=$row["id"]; 
                                        $nuevoId = $id+1; 
                                        echo "
                                        <label class='control-label'>CÓDIGO/NÚMERO DE REGISTRO *</label>
                                        <input pattern='[0-9-]{1,11}'' class='form-control' type='text' name='idMonitor'  maxlength='11' value='$nuevoId'>";
                                    }
                                    ?>      
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Marca del equipo *</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ-'.,: ]{1,100}" class="form-control" type="text" name="marca" required="" maxlength="100">
                                    </div>
                                    </div>    

                                
                                    <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Modelo</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ,.:; ]{1,170}" class="form-control" type="text" name="modelo" maxlength="170">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Numero de Serie</label>
                                          <input class="form-control" type="text" name="numeroSerie" maxlength="170">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Numero de inventario</label>
                                          <input class="form-control" type="text" name="numeroInventario" maxlength="15">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                    
                    <div class="form-group">
                        <label for="buscar">Cógigo de barras</label>
                        <input type="hidden" id="id" name="id">
                    
                   

                    
                    <select  class="form-control" name="idEquipo" id="idEquipo" autofocus required>
                    <option onchange="cargaDatos();" value="">Selecciona el servicio</option>
                    <?php
                    include_once('conexion.php');
                                      $con=new conexion();
                          $sql1 = "SELECT idEquipo,marca FROM equipos;";
                                      $result1 = $con->consultaRetorno($sql1);            
                         while ($row=mysqli_fetch_array($result1))
                                    { 
                                        /*almacenamos el nombre de la ruta en la variable $ruta_img*/
                                        $id=$row["idEquipo"]; 
                                        $nombreCompleto = $row["marca"]; 
                                        echo "<option id='idEquipo' value=$id>
                                        $nombreCompleto
                                        </option>";
                                    }
                                    ?>
                                    </select>              
                      </div>
                    
                </div>
                            </div>
                        </div>
                    </fieldset>
                   
                                <!--div class="col-xs-12 col-sm-6">
                                  <div align="left"><label class="control-label" for="tipo">Encargado:</label></div><div>
                                    <select  class="form-control" name="encargado" id="encargado" autofocus required>
                                    <option value="">Selecciona un administrador</option>
                                    <?php 
                                    /*include_once('conexion.php');
                                      $con=new conexion();
                                      $sql = "SELECT * FROM usuarios WHERE estado=1";
                                      $result = $con->consultaRetorno($sql);
                                     lanzamos la consulta para traernos el nombre
                                    while ($row=mysqli_fetch_array($result))
                                    { 
                                        almacenamos el nombre de la ruta en la variable $ruta_img
                                        $id=$row["id_usuario"]; 
                                        $nombreCompleto = $row["nombre"].' '.$row["apellidos"]; 
                                        echo "<option value=$id>
                                        $nombreCompleto
                                        </option>";
                                    }*/
                                    ?>
                                    </select>
                                    </div> 
                            </div-->
                            </div>
                        </div>
                   
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-info btn-raised btn-sm" name="AdministrativaRegistrarMonitor"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                        <input type="hidden" name="accion" value="1"/>
                    </p>
                </form>
            </div>
        </div>
    </div>
    
</section>
</body>
</html>	
<script>      
  jQuery('#archivo').on('change', function(e) {
    var Lector,oFileInput = this;
	if (oFileInput.files.length == 0) {
      jQuery('#aviso').text('[Vista previa no disponible]');
	  jQuery('#vistaPrevia').attr('src',''); 
	  return;
    };
	Lector = new FileReader();
	Lector.onloadend = function(e) {
	  jQuery('#vistaPrevia').attr('src', e.target.result);
	  jQuery('#aviso').text('');
    };
	Lector.readAsDataURL(oFileInput.files[0]);
  });
  </script>
	