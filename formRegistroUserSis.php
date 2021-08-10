<?php 
    include './sessionStart.php';
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <?php 
            include 'headLib.html'; // se llama todas la librerias del html, ccs y multiples validaciones de errores
            require_once ('./sqlcombobox.php'); //* se hace un solo llamado para todo el  documento las consultas de combobox*/
        ?>
        <script type="text/javascript" src="./jsValidarCedulaEcu.js"></script>
        <title>Gestión de usuario</title>
    </head>    

    <body>  
        <form action="" method="post">
            <div class="contenedorMainInicio">
                <div class="subcontenedorInicio">
                    <!--menu inicio -->                
                        <?php           
                            include './encabezadoMenuMain.php';
                        ?>     
                    <!-- fin menu-->            

                    <!-- INICIO FORMULARIO   -->
                    <div class="tituloForm">
                        <h2>Formulario de resgitro usuario</h2>
                    </div>

                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cédula:</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 1234567890 " required pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')"> </td>
                                <td> <input type="submit" name="buscar" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require './sqlReadRegistroUserSis.php'; ?>
                    

                    <form action="./sqlCuRegistroUserSis.php" method="post">
                        <fieldset  > <legend>Información</legend>

                            <table>
                                <tr>
                                    <td> <label for=""><span>N° Cédula / Ruc:</span></label> </td>
                                    <td> <input type="text" name="txtcedula" value="<?php echo $cedula_per; ?>" size="20" onKeyPress='return validaNumericos(event)' pattern="[0-9]{10}" maxlength="10"  placeholder="ej. 1234567890" required oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')">  </td>

                                    <td> <label for=""><span>Apellido paterno:</span></label> </td>
                                    <td> <input type="text" size="20" value="<?php echo $apellido1_per; ?>"  name="txtapellido1" maxlength="18" placeholder="Primer apellido" required> </td>
                                
                                    <td> <label for=""><span>Apellido materno:</span></label> </td>
                                    <td> <input type="text" size="20"  name="txtapellido2" value="<?php echo $apellido2_per; ?>" maxlength="18" placeholder="Segundo apellido" required> </td> 
                                    
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Primer nombre:</span></label> </td>
                                    <td> <input type="text" size="20" value="<?php echo $nombre1_per; ?>" name="txtnombre1" maxlength="10" placeholder="Primer nombre" required> </td>
                                
                                    <td> <label for=""><span>Segundo nombre:</span></label> </td>
                                    <td> <input type="text" size="20" name="txtnombre2" value="<?php echo $nombre2_per; ?>" maxlength="09" placeholder="Segundo nombre" required> </td>  

                                    <td> <label for=""><span> Fecha de nacimiento:</span></label> </td>
                                    <td> <input type="date" name="dtfechaNac"  min="1990-01-01" max="2021-07-01" required value="<?php echo $fechanac_per; ?>"> </td>
                                </tr>

                                <tr>
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20" maxlength="18" name="txtcelular" value="<?php echo $celular_per; ?>" placeholder="ej. 0912345678" required> </td>
                                
                                    <td> <label for=""><span>Número teléfono:</span></label> </td>
                                    <td> <input type="text" size="20" maxlength="18" name="txttelefono" value="<?php echo $telefono_per; ?>" placeholder="ej. 02-123-4567" required> </td>  
                                
                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="email" size="33" id="input_email" name="txtemail" value="<?php echo $email_per; ?>" maxlength="40" placeholder="ej. nombre18@email.com" required> </span> </td>     

                                </tr>

                                <tr>
                                    <td> <label for=""><span>Nacionalidad:</span></label> </td>
                                    <td>
                                        <select  id="" name="descripcionNacionalidad" required>
                                            <option disabled selected value="" >Seleccionar...</option>
                                           
                                            <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoNacionalidad)){
                                                    $optionC = "<option value='".$row['codigo_nac']."'"; //iniciamos el codigo del option                                                
                                                    if($nacionalidad_per > 0 and $nacionalidad_per == $row['codigo_nac']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_nac']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                     
                                                
                                        </select>
                                    </td>
                                    
                                    <td> <label for=""><span>Estado Civil:</span></label> </td>
                                    <td>
                                        <select  id="" name="descripcionEstadoCivil" required>
                                            <option disabled selected value="">Seleccionar...</option>
                                            <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoEstadoCivil)){
                                                    $optionC = "<option value='".$row['codigo_estciv']."'"; //iniciamos el codigo del option                                                
                                                    if($estadocivil_per > 0 and $estadocivil_per == $row['codigo_estciv']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_estciv']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->  
                                        </select>
                                    </td>

                                    <td> <label for=""><span>Nivel de instruccion:</span></label> </td>
                                    <td>
                                        <select  id="" name="descripcionInstruccion" required>
                                            <option disabled selected value="">Seleccionar...</option>
                                            <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoInstruccion)){
                                                    $optionC = "<option value='".$row['codigo_int']."'"; //iniciamos el codigo del option                                                
                                                    if($intruccion_per > 0 and $intruccion_per == $row['codigo_int']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_int']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->  
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> <label for=""><span>Sexo:</span></label> </td>
                                        <td>
                                            <select  id="" name="descripcion-Sexo" required>
                                                <option disabled selected value="">Seleccionar...</option>
                                                
                                                 <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoSexo)){
                                                    $optionC = "<option value='".$row['codigo_sex']."'"; //iniciamos el codigo del option                                                
                                                    if($sexo_per > 0 and $sexo_per == $row['codigo_sex']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_sex']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->  
                                            </select>
                                    </td>

                                    <td> <label for=""><span>Actividad laboral:</span></label> </td>
                                        <td>
                                            <select  id="" name="descripcionActividadLaboral" required>
                                                <option disabled selected value="">Seleccionar...</option>
                                                 <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoActividad)){
                                                    $optionC = "<option value='".$row['codigo_act']."'"; //iniciamos el codigo del option                                                
                                                    if($actividad_per  > 0 and $actividad_per == $row['codigo_act']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_act']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS --> 
                                            </select>
                                    </td>

                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                        <td>
                                            <select  id="" name="descripcionEstadoPersona" required>
                                                <option disabled selected value="">Seleccionar...</option>
                                                <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                            <?php 
                                                while($row=pg_fetch_array($resultadoEstadoPersona)){
                                                    $optionC = "<option value='".$row['codigo_estper']."'"; //iniciamos el codigo del option                                                
                                                    if($estadopersona_per  > 0 and $estadopersona_per == $row['codigo_estper']){ //si el id de la bodega es igual al del usuario lo seleccionamos
                                                        $optionC .= " selected='selected'";
                                                    }                                                
                                                    $optionC .= ">".$row['descripcion_estper']."</option>"; //terminamos el codigo del option                                                
                                                    echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                }
                                            ?>
                                              <!-- FIN llenar cobobox y consultar datos de  persona TABLAS --> 
                                            </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td> <label for=""><span>Dirección domicilio:</span></label> </td>
                                    <td colspan="5"> <input type="text" name="txtdireccion"  value="<?php echo $direcciondom_per; ?>" size="100" maxlength="90" placeholder="Provincia / ciudad / parroquia / calle 1 / calle 2 / numero de casa" required> </span> </td>     
                                </tr>

                            </table>
                                                        
                        </fieldset>
                        <input type="submit" name="crear" value="&#10004; Guardar">
                        <input type="submit" name="modificar" value="&#128221; Modificar Información"> 
                      
                        <?php require './sqlCuRegistroUserSis.php'; ?>

                    </form>        
                    </div>
                    <!-- fin FORMULARIO   -->
                </div>
            </div>
        </form>
        <?php
        include './derechosAutor.html';
        ?>        
        
    </body>

</html>

<script src="eventosfunciones.js" type="text/javascript"></script>
