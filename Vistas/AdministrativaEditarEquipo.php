<?php
		$controlador = new controladorEquipo();
		if(isset($_GET['idEquipo'])){
				$row = $controlador->consultar($_GET['idEquipo']);

		}else{ 
      echo "window.location.href='?cargar=AdministrativaListarEquipo'";
		}
		if(isset($_POST['registrar'])){
				$r = $controlador->editar($_GET['idEquipo'],$_POST['idCliente'], $_POST['marca'], 
        $_POST['tipo'], $_POST['modelo'], $_POST['numeroSerie'], $_POST['numeroInventario'], $_POST['procesador'],$_POST['ram'],$_POST['discoDuro'], $_POST['cdDrive'],$_POST['hardwareAdicional'],$_POST['observaciones'], $_POST['codigoqr'],$_POST['macaddress'],$_POST['ipaddress'],$_POST['softwares']);

				if($r){
				echo "
				<script language='JavaScript'>
				alert('Registro modificado');
				window.location.href='?cargar=AdministrativaListarEquipo'
				</script>";
				}
		}
?>

	
<!-- Content page-->
<section class="full-box dashboard-contentPage">
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
    <form action="" method="post">
    <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Administración <small>EQUIPOS</small></h1>
        </div>
        </div>

    <div class="container-fluid">
        <ul class="breadcrumb breadcrumb-tabs">
              <li>
                  <a href="?cargar=AdministrativaRegistrarEquipo" class="btn btn-info">
                      <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EQUIPO
                  </a>
              </li>
              <li>
                  <a href="?cargar=AdministrativaListarEquipo" class="btn btn-success">
                      <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE EQUIPOS
                  </a>
              </li>
        </ul>
    </div>

    <!-- panel datos de la empresa -->
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL EQUIPO</h3>
            </div>
            <div class="panel-body">
                <form>
                    <fieldset>
                        <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">CÓDIGO/NÚMERO DE REGISTRO *</label>
                                          <input value="<?php echo $row['idEquipo'];?>"  pattern="[0-9-]{1,30}" class="form-control" type="text" name="idEquipo" required="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                        <div align="left"><label class="control-label" for="tipo">Tipo:</label></div><div>
                          <select  class="form-control" name="tipo" id="tipo" autofocus required>
                          <option value="<?php echo $row['tipo']; ?>"><?php echo $row['tipo']; ?></option>
                          <?php if ($row['tipo']=='ruina')
                          {
                            echo "<option value='Laguna'>Laguna</option>";
                            echo "<option value='Rio'>Rio</option>";
                            echo "<option value='Cascada'>Cascada</option>";
                            echo "<option value='Hotel'>Hotel</option>";
                            echo "<option value='Restaurant'>Restaurant</option>";
                            echo "<option value='Centro cultural'>Centro cultural</option>";
                          }
                            else if ($row['tipo']=='Bibliotecario')
                          {
                            echo "<option value='Secretaria'>Secretaria</option>";
                            echo "<option value='Vigilancia'>Vigilancia</option>";
                            echo "<option value='Limpieza'>Limpieza</option>";
                          }
                          else if ($row['tipo']=='Vigilancia')
                          {
                            echo "<option value='Secretaria'>Secretaria</option>";
                            echo "<option value='Bibliotecario'>Bibliotecario</option>";
                            echo "<option value='Limpieza'>Limpieza</option>";
                          }
                          else if ($row['tipo']=='Limpieza')
                          {
                            echo "<option value='Secretaria'>Secretaria</option>";
                            echo "<option value='Bibliotecario'>Bibliotecario</option>";
                            echo "<option value='Vigilancia'>Vigilancia</option>";
                          }
                          
                          ?>

                            </select>
                            </div> 
                        </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Marca del equipo *</label>
                                          <input value="<?php echo $row['marca']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="marca" required="" maxlength="40">
                                    </div>
                                    </div>    

                                
                                    <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Modelo</label>
                                          <input  value="<?php echo $row['modelo']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ- ]{1,40}" class="form-control" type="text" name="modelo" maxlength="170">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Numero de Serie</label>
                                          <input  value="<?php echo $row['numeroSerie']; ?>" class="form-control" type="text" name="numeroSerie" maxlength="170">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Numero de Inventario</label>
                                          <input  value="<?php echo $row['numeroInventario']; ?>" class="form-control" type="text" name="numeroInventario" maxlength="170">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Otros datos</legend>
                        <div class="container-fluid">
                            <div class="row">
                              <div class="col-xs-6">
                            <div class="form-group">
                    <span class="control-label">Imágen</span>
                  <input   type="file" name="codigoqr" accept=".jpg, .png, .jpeg">
                  <div class="input-group">
                    <input value="<?php echo $row['codigoqr']; ?>" type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="zmdi zmdi-attachment-alt"></i>
                      </button>
                    </span>
                  </div>
                  <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
                                </div>
                                <img src="QRs/<?php echo $row['codigoqr']; ?>" width="250" height="250">
                                </div>
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group label-floating">
                                          <label class="control-label">Procesador</label>
                                          <input  value="<?php echo $row['procesador']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ,.;: ]{1,500}" class="form-control" type="text" name="procesador" maxlength="500">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">RAM</label>
                                          <input  value="<?php echo $row['ram']; ?>" class="form-control" type="text" name="ram" maxlength="50">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Disco Duro</label>
                                          <input  value="<?php echo $row['discoDuro']; ?>" class="form-control" type="text" name="discoDuro" maxlength="170" >
                                    </div>
                                </div> 
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">CD Drive</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="cdDrive" maxlength="100" 
                                          value="<?php echo $row['cdDrive']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Hardware Adicional</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="hardwareAdicional" maxlength="100" 
                                          value="<?php echo $row['hardwareAdicional']; ?>">
                                    </div>
                                </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Observaciones</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="observaciones" maxlength="100" 
                                          value="<?php echo $row['observaciones']; ?>">
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Dirección MAC</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="macaddress" maxlength="100" value="<?php echo $row['macaddress']; ?>">
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Dirección IP</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="ipaddress" maxlength="100" value="<?php echo $row['ipaddress']; ?>">
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                          <label class="control-label">Softwares</label>
                                          <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.,:; ']{1,100}" class="form-control" type="text" name="softwares" maxlength="100" value="<?php echo $row['softwares']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-info btn-raised btn-sm" name="registrar"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    
</section>