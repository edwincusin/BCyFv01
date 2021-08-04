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
        <form action="sqlRegistroUserSis.php" method="post">
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

                    
                    <table>
                        <tr>
                            <td> <label for=""><span>N° Cédula / Ruc:</span></label> </td>
                            <td colspam="2"> <input type="text" name="buscarDato" id="validarCedulaEcu" size="20" maxlength="10" placeholder="ej. 1234567890 " required> </td>
                            <td> <input type="submit" name="buscar" value="&#128270; Buscar"> </td>
                        </tr>
                    </table>
                
            
                    <fieldset  > <legend>Información</legend>

                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cédula / Ruc:</span></label> </td>
                                <td> <input type="text" name="txtcedularuc"size="20" maxlength="10"  placeholder="ej. 1234567890" required> </td>

                                <td> <label for=""><span>Apellido paterno:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="18" placeholder="Primer apellido" required> </td>
                             
                                <td> <label for=""><span>Apellido materno:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="18" placeholder="Segundo apellido" required> </td> 
                                
                            </tr>
                                
                            <tr>
                                <td> <label for=""><span>Primer nombre:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="10" placeholder="Primer nombre" required> </td>
                             
                                <td> <label for=""><span>Segundo nombre:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="09" placeholder="Segundo nombre" required> </td>  

                                <td> <label for=""><span> Fecha de nacimiento:</span></label> </td>
                                <td> <input type="date" name="fechaRegistro"  min="1990-01-01" max="<?php echo date ("Y-m-d")?>">; </td>
                            </tr>

                            <tr>
                                <td> <label for=""><span>Número celular:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="18" placeholder="ej. 0912345678" required> </td>
                             
                                <td> <label for=""><span>Número teléfono:</span></label> </td>
                                <td> <input type="text" size="20" maxlength="18" placeholder="ej. 02-123-4567" required> </td>  
                              
                                <td> <label for=""><span>Email @:</span></label> </td>
                                <td> <input type="email" size="33" id="input_email" maxlength="40" placeholder="ej. nombre18@email.com" required> </span> </td>     

                            </tr>

                            <tr>
                                <td> <label for=""><span>Nacionalidad:</span></label> </td>
                                <td>
                                    <select name="" id="" name="descripcionNacionalidad" required>
                                        <option disabled selected value="">Seleccionar...</option>
                                        <?php 
                                                if($numRegNacionalidad>0){                                         
                                                    while ($row=pg_fetch_array($resultadoNacionalidad)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_nac']; ?>"><?php echo $row['descripcion_nac']; ?></option>

                                            <?php   
                                                    }
                                                 }
                                            ?>
                                    
                                    </select>
                                </td>
                                
                                <td> <label for=""><span>Estado Civil:</span></label> </td>
                                <td>
                                    <select name="" id="" name="descripcionEstadoCivil" required>
                                        <option disabled selected value="">Seleccionar...</option>
                                        <?php 
                                                if($numRegEstadoCivil>0){                                         
                                                    while ($row=pg_fetch_array($resultadoEstadoCivil)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_estciv']; ?>"><?php echo $row['descripcion_estciv']; ?></option>

                                            <?php   
                                                    }
                                                 }
                                            ?>
                                    </select>
                                </td>

                                <td> <label for=""><span>Nivel de instruccion:</span></label> </td>
                                <td>
                                    <select name="" id="" name="descripcionInstruccion" required>
                                        <option disabled selected value="">Seleccionar...</option>
                                        <?php 
                                                if($numRegInstruccion>0){                                         
                                                    while ($row=pg_fetch_array($resultadoInstruccion)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_int']; ?>"><?php echo $row['descripcion_int']; ?></option>

                                            <?php   
                                                    }
                                                 }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td> <label for=""><span>Sexo:</span></label> </td>
                                    <td>
                                        <select name="" id="" name="descripcion-Sexo" required>
                                            <option disabled selected value="">Seleccionar...</option>
                                            <?php                                                               
                                                if($numRegSexo>0){                                         
                                                    while ($row=pg_fetch_array($resultadoSexo)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_sex']; ?>"><?php echo $row['descripcion_sex']; ?></option>
                                            <?php   
                                                    }
                                                 }
                                            ?>
                                        </select>
                                </td>

                                <td> <label for=""><span>Actividad laboral:</span></label> </td>
                                    <td>
                                        <select name="" id="" name="descripcionActividadLaboral" required>
                                            <option disabled selected value="">Seleccionar...</option>
                                            <?php 
                                                if($numRegActividad>0){                                         
                                                    while ($row=pg_fetch_array($resultadoActividad)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_act']; ?>"><?php echo $row['descripcion_act']; ?></option>
                                            <?php   
                                                    }
                                                 }
                                            ?>
                                        </select>
                                </td>

                                <td> <label for=""><span>Estado en sistema banco:</span></label> </td>
                                    <td>
                                        <select name="" id="" name="descripcionEstadoPersona" required>
                                            <option disabled selected value="">Seleccionar...</option>
                                            <?php 
                                                if($numRegEstadoPersona>0){                                         
                                                    while ($row=pg_fetch_array($resultadoEstadoPersona)){
                                            ?> 
                                                    <option value="<?php echo $row['codigo_estper']; ?>"><?php echo $row['descripcion_estper']; ?></option>
                                            <?php   
                                                    }
                                                 }
                                            ?>
                                        </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td> <label for=""><span>Dirección domicilio:</span></label> </td>
                                <td colspan="5"> <input type="text" size="100" maxlength="90" placeholder="Provincia / ciudad / parroquia / calle 1 / calle 2 / numero de casa" required> </span> </td>     
                            </tr>

                        </table>
                                                    
                </fieldset>

              

                <input type="submit" value="&#10004; Guardar">
                <input type="submit" value="&#128221; Modificar cambios">   

                    </div>
                    <!-- INICIO FORMULARIO   -->
                </div>
            </div>
        </form>
        <?php
        include './derechosAutor.html';
        ?>        
        
    </body>

</html>