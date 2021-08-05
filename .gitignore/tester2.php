<html>
    <head>
        <title>Gestión usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos1_1.css">
        <link rel="icon" href="img/icono.jpg">
        <!--<link rel="stylesheet" href="fonts/style.css">-->
        <title></title>
    </head> 
    <body>
        <form id="tabla" action="" method="post">
              <div id="Power-Contenedor">
                  <a href="cerrar.php" id="Anyadir-Rutina-btn"> Salir del Sistema </a>
              </div>
            <div  id="logo" >
                <center> <img src="img/iniciomenu.png" img> </center>
            </div>   
            
           <?php
             $var=0;
            session_start();
            $usuario2 = $_SESSION['username'];
            if (!isset($usuario2)) {
                header("location:index.php");
            }
            echo "<div id='Power-Contenedor1_3'>";
            
            echo "<h3> Usuario :  $usuario2</h3>";           
            echo "  </div>";
            echo "<div id='Power-Contenedor1_3'>";  
            include './conn.php';
            $tipousuario1=0;
            $consulta="SELECT codigo_log, usuario_log, clave_log, dotor2, tipousuario1
                                FROM public.usuario
                                where usuario_log='$usuario2'";
                              $result = pg_query($con,$consulta);
                                         while ($row = pg_fetch_array($result)) 
                                         {
                                             $tipousuario1=$row['tipousuario1'];
                                         }
    
    $_SESSION['username'] = $usuario2;
    if($tipousuario1==1){
                echo " <a href='gestion_doctor.php' id='Anyadir-Rutina1-btn'>Gestión Usuario</a>";   
                echo " <a href='ficha_medica_alumno_n.php' id='Anyadir-Rutina1-btn'>Ficha Paciente</a>";
                echo " <a href='triaje_medico_alumno.php' id='Anyadir-Rutina1-btn'>Triaje</a>";
                 echo " <a href='atencion_medica.php' id='Anyadir-Rutina1-btn'>Atención Médica</a>"; 
                 echo " <a href='secuencia_atencion_medica.php' id='Anyadir-Rutina1-btn'>Historia Clínica</a>";
                  echo " <a href='informacion_registros.php' id='Anyadir-Rutina1-btn'>Buscar Paciente</a>";                
                 
    }
    
    else { 
                 echo " <a href='ficha_medica_alumno_n.php' id='Anyadir-Rutina1-btn'>Ficha Paciente</a>";
                  echo " <a href='triaje_medico_alumno.php' id='Anyadir-Rutina1-btn'>Triaje</a>";
                 echo " <a href='atencion_medica.php' id='Anyadir-Rutina1-btn'>Atención Médica</a>";  
                  echo " <a href='secuencia_atencion_medica.php' id='Anyadir-Rutina1-btn'>Historia Clínica</a>";
                  echo " <a href='informacion_registros.php' id='Anyadir-Rutina1-btn'>Buscar Paciente</a>";
                 //echo " <a href='consulta_numero_historia.php' id='Anyadir-Rutina1-btn'>Buscar Paciente</a>"; 
    }
        
                       
            echo "  </div>";
            
            echo "<h2>Gestión Usuario</h2>";
          include './conn.php';
//            include './consulta.php';
             ?>
            <!--<h3> es clave-->
            <h3>
                            <form action="" method="POST">
                                Cédula : <input type="text" name="cedula_buscar" onKeyPress="return validaNumericos(event)" maxlength='10' required placeholder="Ingrese cédula" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')" >  
                          <input  type="submit" value="Buscar" name="buscar" class="boton">                          
                            </form>

                            <?php
                                 $cedula_doc=''; $nombre_doc=''; $apellido_doc='';$direccion_doc='';
                                 $especialidaddoctor1=''; $sexo2=''; $edaddoctor=''; $estadodoctor1='';
                                 $email_doc='';$telefono_doc=''; $nacionalidad_doc='';
                                 
                            if(isset($_POST['buscar']))
                                {
                                         $cedula_buscar=$_POST['cedula_buscar'];                            
                                         $consulta= "SELECT cedula_doc, nombre_doc, apellido_doc, direccion_doc, edaddoctor, email_doc, telefono_doc, nacionalidad_doc, especialidaddoctor1, sexo2, estadodoctor1
                                         FROM public.doctor where cedula_doc='$cedula_buscar'";
                                         $result = pg_query($con,$consulta);
                                         while ($row = pg_fetch_array($result)) 
                                         {
                                             $cedula_doc=$row['cedula_doc']; $nombre_doc=$row['nombre_doc']; $apellido_doc=$row['apellido_doc']; $direccion_doc=$row['direccion_doc'];$edaddoctor=$row['edaddoctor'];$email_doc=$row['email_doc'];$telefono_doc=$row['telefono_doc'];$nacionalidad_doc=$row['nacionalidad_doc']; $especialidaddoctor1=$row['especialidaddoctor1']; $sexo2=$row['sexo2'];  $estadodoctor1=$row['estadodoctor1'];                                
                                         }
                                         if ($cedula_doc=="") {

                                            echo '<i style="color:red;font-size:20px;font-family:calibri ;"> Doctor no encontrado</i> ';
                                         } else { $var=1;}
                              }     
                            ?>                          
                                                        
                            <br>
                            <br>     
                           <form id="tabla" action="" method="post">
                               <h4> Información del doctor</h4><br>
                         
                            Cédula:&emsp;&emsp;&emsp; <input type="text" size="13"   name="cedula" maxlength="10"  value="<?php echo $cedula_doc;?>"  required placeholder="Cédula" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')" onKeyPress='return validaNumericos(event)'  > 
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &nbsp;                         
                            Email:&emsp;&emsp;&emsp; <input type="text" size="35"    name="email"  maxlength="30" placeholder="Correo electrónico" <?php echo "value='$email_doc'";?>  required  oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')">  <br>
                            Nombres:&nbsp;&emsp;&emsp; <input type="text" size="27"   name="nombre" onkeypress="return soloLetras(event)" maxlength="25" placeholder="Nombres" value="<?php echo"$nombre_doc";?>" placeholder="Nombres"  required onkeyup="mayus(this);" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')">  
                            &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Direccion: &nbsp;&emsp;<input type="text" size="45"    name="direccion"  maxlength="35" placeholder="Dirección domicilio"<?php echo "value='$direccion_doc'";?>  required onkeyup="mayus(this);" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')" > 
                            Apellido: &nbsp;&emsp;&emsp; <input type="text" size="27"    name="apellido" onkeypress="return soloLetras(event)" maxlength="25" value="<?php echo"$apellido_doc";?>"  placeholder="Apellido" required onkeyup="mayus(this);" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')" > 
                            &emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp; &emsp;
                            Teléfono:&emsp;&emsp;<input type="text" size="13"    name="telefono" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="Teléfono o celular" <?php echo "value='$telefono_doc'";?> required placeholder="Ingrese telefono" pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')" >      <br>                     
                            Nacionalidad:&nbsp;&nbsp;&nbsp;<input type="text" size="27"    name="nacionalidad" onkeypress="return soloLetras(event)" maxlength="25" placeholder="Nacionalidad"<?php echo "value='$nacionalidad_doc'";?>  required onkeyup="mayus(this);" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')" >
                            &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <!--Direccion: <input type="text" size="30"    name="direccion"  maxlength="30" <?php echo "value='$direccion_doc'";?>  onclick="javascript: limpia(this);"required >--> 
                           <!--onBlur="javascript: verifica(this);"--> 
                            

                           Sexo:&emsp;&emsp;&emsp;&nbsp;&nbsp;<select name="sexo" required>
                                <?php
                                $descricion_sex='';
                                $array = array('MASCULINO','FEMENINO');  
                                if($sexo2==1){$descricion_sex="MASCULINO";} if($sexo2==2){$descricion_sex="FEMENINO";}                      
                              if($descricion_sex!=''){ echo "<option>$descricion_sex</option>";}else {
                                  ?>
                                 <option disabled selected value="">Seleccionar</option>
                                 <?php
                              }
                                 for($i=0; $i<count($array); $i++)
                                      {
                                      if($array[$i]!=$descricion_sex)
                                        {
                                          echo "<option>$array[$i]</option>";
                                        }
                                      }
                                ?>     
                                
                            </select>
                            
                            <br>
                         Especialidad: &nbsp&nbsp;&nbsp;<select name="especialidad" required>
                                <?php
                                $descripcion_esp='';
                                $array = array('MEDICINA GENERAL','AUXILIAR ENFERMERIA');  
                                if($especialidaddoctor1==1){$descricion_esp="MEDICINA GENERAL";} if($especialidaddoctor1==2){$descricion_esp="AUXILIAR ENFERMERIA";}                      
                              if($descricion_esp!=''){ echo "<option>$descricion_esp</option>";} else {
                                  ?>
                                 <option disabled selected value="">Seleccionar</option>
                                 <?php
                              }
                                 for($i=0; $i<count($array); $i++)
                                      {
                                      if($array[$i]!=$descricion_esp)
                                        {
                                          echo "<option>$array[$i]</option>";
                                        }
                                      }
                                ?>                                    
                            </select>
                         
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;  
                            Edad: &emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="edad" required>
                                <?php
//                                $descripcion_edadoc=$edaddoctor;
                                $array = array('20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50',
                                    '51','52','53','54','55','56','57','58','59','60','61','62','63','64','65');
//                                if($sexo2==1){$descricion_edadoc="medicina";} if($sexo2==2){$descricion_edadoc="auxiliar";}                      
                              if($edaddoctor!=''){ echo "<option>$edaddoctor</option>";}else {
                                  ?>
                                 <option disabled selected value="">Seleccionar</option>
                                 <?php
                              }
                                 for($i=0; $i<count($array); $i++) 
                                      {
                                      if($array[$i]!=$edaddoctor)
                                        {
                                          echo "<option>$array[$i]</option>";
                                        }
                                      }
                                ?>     
                                
                                <?php $tipoai='Activo'?> 
                            </select><br>
                             Estado :&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             
                                <?php  if($estadodoctor1==1){echo "Doctor Activo"; $tipoai='Pasivo';}?> 
                                <?php if($estadodoctor1==2){echo "Doctor Inactivo"; $tipoai='Activo';}?>
                             &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                             <input  type="radio" name="estado" value="activo" /><?php  echo $tipoai ?>
                                 &emsp;&emsp;&emsp;
                                                          
                           
                            
                                <br><br>
                            
                            <?php 
                            if ($cedula_doc==''){ 
                                
                            
                            ?>
                            <h4>____________________________________________________________________________________________________________</h4>   

                            <h4>  Información de usuario </h4> <br>
                            
                                Nombre Usuario: &nbsp;&emsp;<input type="text" name="nombre_usuario" required placeholder="Nombre usuario" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')" > 
                                &nbsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                Contraseña: &nbsp; <input type="password" maxlength="15" name="contraseña" pattern=".{8,15}" placeholder="Minimo 8 caracteres "  required oninvalid="this.setCustomValidity('Se Requiere 8 digitos minimo')" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Campo obligatorio')" oninput="this.setCustomValidity('')">  
                            <br> 
                            
                            <?php
                            }
                                                       
                            ?>
                            
                            Tipo Usuario: &emsp;&emsp;&nbsp; <select name="tipousuario" required> 
                            
                             <?php
                             $consulta="SELECT codigo_log, usuario_log, clave_log, dotor2, tipousuario1
                                FROM public.usuario
                                where dotor2='$cedula_doc'";
                              $result = pg_query($con,$consulta);
                                         while ($row = pg_fetch_array($result)) 
                                         {
                                             $tipousuario1=$row['tipousuario1'];
                                         }
                             
                                $descripcion_tipuser='';
                              $array = array('ADMINISTRADOR','USUARIO');  
                                if($tipousuario1==1){$descripcion_tipuser="ADMINISTRADOR";} if ($tipousuario1==2){$descripcion_tipuser="USUARIO";};                     
                              if($descripcion_tipuser!=''){ echo "<option>$descripcion_tipuser</option>";} else {
                                  ?>
                                 <option disabled selected value="">Seleccionar</option>
                                 <?php
                              }
                                 for($i=0; $i<count($array); $i++)
                                      {
                                      if($array[$i]!=$descripcion_tipuser)
                                        {
                                          echo "<option>$array[$i]</option>";
                                        }
                                      }
                                ?>                      
                                
                                
                            </select>    
                                <br>
                                <br>
                            <input type="submit" value="Crear" name="crear" class="boton">     
                            <?php if ($var==1){?>
                            <input type="submit" value="Modificar" name="modificar" class="boton">
                            <?php  }?>
                            <br>
                            
                          <?php  
                            
                            include './gestion_doctor_consultas.php';
                            
                            ?>
                            
                           </form>
                            
                                                 
                          <br>
                          <form action="" method="POST">
                            <center> <h4>Registro de doctores</h4>
                             <style type="text/css">
                                   table{   table-layout: fixed;  width: 1020px; text-align: center;}
                                       th{ border: 1px solid graytext;    width: 100px;    word-wrap: break-word; color:#AAD923;
                                        }
                                        td { border: 1px solid graytext;    width: 100px;    word-wrap: break-word; 
                                        }
                               </style>
                               <br>
                               <table border="1">
                                <thead>
                                    <tr>
                                        <th style=" width: 90px;">Cédula</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th>Especialidad</th>
                                        <th style=" width: 40px;">Edad</th>
                                        <th style=" width: 80px;">Estado</th>
                                        <th>Email</th>
                                        <th style=" width: 90px;">Contacto</th>
                                        <th style=" width: 90px;">Usuario</th>
                                        <!--<th>Clave</th>-->
                                    </tr>
                                </thead>
                                </center>
                                <tbody>
                                    
                                    <?php  
                                    $cedula_doc='';$nombre_doc='';$apellido_doc='';$direccion_doc='';$descripcion_esp='';$descripcion_sex='';$edaddoctor='';$descripcion_estdoc='';
                                    $n_registros="";$email_doc='';$telefono_doc='';$nacionalidad_doc='';$usuario_log='';$clave_log='';
                                    $consulta="SELECT cedula_doc, nombre_doc, apellido_doc, direccion_doc, 
especialidaddoctor.descripcion_esp, descripcion_sex, edaddoctor,
estadodoctor.descripcion_estdoc,email_doc,telefono_doc,usuario.usuario_log,usuario.clave_log
	FROM public.doctor, public.sexo,public.especialidaddoctor,public.estadodoctor,public.usuario
	where sexo.codigo_sex=doctor.sexo2
	and especialidaddoctor.codigo_esp=doctor.especialidaddoctor1
	and usuario.dotor2=doctor.cedula_doc
	and doctor.estadodoctor1= estadodoctor.codigo_estdoc LIMIT 30
	";
                                    $result = pg_query($con,$consulta);
                                         while ($row = pg_fetch_array($result)) 
                                         {
                                             $cedula_doc=$row['cedula_doc']; $nombre_doc=$row['nombre_doc']; $apellido_doc=$row['apellido_doc']; $direccion_doc=$row['direccion_doc'];
                                             $descripcion_esp=$row['descripcion_esp'];
                                             $descripcion_sex=$row['descripcion_sex']; $edaddoctor=$row['edaddoctor']; $descripcion_estdoc=$row['descripcion_estdoc'];
                                          if ($descripcion_estdoc=='t'){ $descripcion_estdoc="ACTIVO";} if ($descripcion_estdoc=='f'){ $descripcion_estdoc="INACTIVO";}                                 
                                          if ($descripcion_sex=='FEMENINO'){ $descripcion_sex='FEMENINO';}if ($descripcion_sex=='MASCULINO'){ $descripcion_sex='MASCULINO';}                                 
                                              $email_doc=$row['email_doc'];
                                              $telefono_doc=$row['telefono_doc'];
                                              $usuario_log=$row['usuario_log'];
                                              $clave_log=$row['clave_log'];
                                             ?>
                                    
                                    <tr>
                                        <?php  if($nombre_doc!='ADMIN'){ ?>
                                        <td ><?php echo $cedula_doc ?></td>
                                        <td ><?php echo $nombre_doc?></td>
                                        <td><?php echo $apellido_doc?></td>
                                        <td><?php echo $direccion_doc?></td>
                                        <td><?php echo $descripcion_esp?></td>
                                        <td><?php echo $edaddoctor?></td>
                                        <td><?php echo $descripcion_estdoc?></td>
                                        <td><?php echo $email_doc?></td>
                                        <td><?php echo $telefono_doc?></td>
                                        <td><?php echo $usuario_log?></td>
                                        <!--<td><?php // echo $clave_log?></td>-->
                                      </tr>
                                    
                                        <?php } }?>
                              
                                </tbody>
                            </table>

        </form> </body>        
        
        
</html>

                                

<style type="text/css">
  .boton{
        font-size:15px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#638cb5;
        border:0px;
        width:80px;
        height:29px;
        cursor: pointer;
        box-shadow: 2px 3px 1px #000000;
        
  }
  .boton:hover{
      box-shadow: 2px 1px 1px #000000;
      padding-top: 7px; 
      color: #000000;
  }
  
  
  
 
</style>

<script src="funcioneseventos.js" type="text/javascript"></script>