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
        <!-- <form action="" method="post"> -->
            <div class="contenedorMainInicio">
                <div class="subcontenedorInicio">
                    <!--menu inicio -->                
                        <?php           
                            include './encabezadoMenuMain.php';
                        ?>     
                    <!-- fin menu-->            

                    <!-- INICIO FORMULARIO   -->
                    <div class="tituloForm">
                        <h2>Formulario consulta movimientos de una cuenta bancaria</h2>
                    </div>
                    
                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° de cuenta:</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato" id="validarCedulaEcu" placeholder="ej. 002" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" oninvalid="this.setCustomValidity('complete los digitos')" oninput="this.setCustomValidity('')"> </td>
                                <td> <input type="submit" name="buscar_EDC" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require 'sqlReadEstadoCuentaMovimientos.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset   > <legend>Información cliente</legend>

                            <table >
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedula" id="imputsincolor" value="<?php echo $cedula_per; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellidos y nombres:</span></label> </td>
                                    <td> <input type="text" size="30" id="imputsincolor" value="<?php echo $apellido1_per.' '.$apellido2_per.' '.$nombre1_per.' '.$nombre2_per; ?>" disabled> </td>
                                   
                                    <td> <label for=""><span>Fecha nac.:</span></label> </td>
                                    <td> <input type="text" size="9" id="imputsincolor" value="<?php echo $fechanac_per; ?>" disabled> </td>
                            
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="text" size="25" id="imputsincolor" name="txtemail_D" value="<?php echo $email_per; ?>" maxlength="40" readonly> </span> </td>     
                                
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="15" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per; ?>" disabled> </td>                            
                                   
                                    <td> <label for=""><span>Número teléfono:</span></label> </td>
                                    <td> <input type="text" size="15" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per; ?>" disabled> </td>                            

                                    
                                </tr>  

                                <tr>
                                    <td> <label for=""><span>Nacionalidad:</span></label> </td>
                                    <td> <input type="text" size="15" id="imputsincolor" value="<?php echo $descripcion_nac ; ?>" disabled> </td>

                                    <td> <label for=""><span>Est. civil:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" value="<?php echo $descripcion_estciv ; ?>" disabled> </td>
                                  
                                    <td> <label for=""><span>Sexo:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" value="<?php echo $descripcion_sex ; ?>" disabled> </td>

                                </tr>
                                
                                <tr>
                                    <td> <label for=""><span>Instruccion:</span></label> </td>
                                    <td> <input type="text" size="15" id="imputsincolor" value="<?php echo $descripcion_int ; ?>" disabled> </td>


                                    <td> <label for=""><span>Actividad laboral:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" value="<?php echo $descripcion_act ; ?>" disabled> </td>

                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                    <td> <input type="text" size="15" id="imputsincolor" name="txtestadopersona_AC" value="<?php echo $descripcion_estper; ?>" readonly> </td> 
                                </tr>
                                <tr>
                                    <td colspan="2"> <label for=""><span>Dirección domicilio:</span></label> </td>
                                    <td colspan="4"> <input type="text" id="imputsincolor" name="txtdireccion"  value="<?php echo $direcciondom_per; ?>" size="70" maxlength="90" placeholder="Provincia / ciudad / parroquia / calle 1 / calle 2 / numero de casa" required> </span> </td>     
   
                                </tr>

                            </table>                                                        
                        </fieldset>

                        <fieldset   > <legend>Información de la cuenta</legend>
                        <table >
                            <tr>
                                        <td > <label for=""><span >Número de cuenta: </span></label></td>                                
                                        <td colspan="2" >  <input type="text" size="8" id="numCuenta" name="txtCCC_D" value="<?php echo $numerocuenta_cueban; ?>" readonly> </td> 
   
                            </tr>

                            <tr>
                                        <td> <label for=""><span>Fecha apertura:</span></label></td> 
                                        <td> <input type="text" size="10" id="imputsincolor" name="fecchaaperura" value="<?php echo $fechaapertura_cueban; ?>" readonly> </td> 

                                        <td> <label for=""><span>Tipo de cuenta:</span></label></td> 
                                        <td> <input type="text" size="10" id="imputsincolor" name="desTipoCuenta_AC" value="<?php echo $descripcion_tipcue; ?>" readonly> </td> 
                                        
                                        <td> <label for=""><span>Estado de cuenta:</span></label></td> 
                                        <td> <input type="text" size="10" id="imputsincolor" name="estadocuenta" value="<?php echo $descripcion_estcue; ?>" readonly> </td> 

                                        <td> <label for=""><span>Saldo USD:</span></label> </td>
                                        <td> <input type="text" size="8" id="imputsincolor" name="txtsaldodisponible_D" value="<?php echo $saldo_cueban; ?>" readonly> </td> 

                                        
                            </tr>  

                            
                                
                            </table>                                                        
                        </fieldset>             


                        <fieldset   > <legend>Movimientos de la cuenta </legend>
                        <br>
                                    <!-- CREAR TABLA CON LA CONSULTA  -->
                                    <center>
                                    <table class="tableimp" border="1">
                                        <thead >
                                                <th>N°</th>                                    
                                                <th>Fecha apertura</th> 
                                                <th>Número Cuenta</th>
                                                <th>Tipo </th>
                                                <th>Estado </th>
                                                <th>Saldo UD$</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $cont=1;
                                            while($row=pg_fetch_array($resultadoTabla)){
    
                                                $numerocuenta_cueban=$row['numerocuenta_cueban'];
                                                $fechaapertura_cueban=$row['fechaapertura_cueban'];
                                                $saldo_cueban=$row['saldo_cueban'];
                                                $descripcion_tipcue=$row['descripcion_tipcue'];
                                                $descripcion_estcue=$row['descripcion_estcue'];     
                                            ?>
                                                <tr>
                                                    <td><?php echo $cont ?></td>
                                                    <td><?php echo $fechaapertura_cueban ?></td>
                                                    <td><?php echo $numerocuenta_cueban ?></td>
                                                    <td><?php echo $descripcion_tipcue ?></td>
                                                    <td><?php echo $descripcion_estcue ?></td>
                                                    <td><?php echo $saldo_cueban ?></td>
                                                </tr>
                                            <?php
                                            $cont++;
                                            }//                                             
                                            pg_free_result($resultadoTabla); 
                                            ?>
                                        </tbody>
                                    </table>    
                                    </center>


                        </fieldset>                

                                        
                        <br> 
                        <input type="submit" name="imprimir_ICC" value="&#10004; Imprimir">                        
                
                    </form>
                    <br>
                   
                    </div>                  
                    <!-- fin FORMULARIO   -->
                </div>
            </div>
        <!-- </form> -->
        <?php
        include './derechosAutor.html';
        ?>        
        
    </body>

</html>

<script src="eventosfunciones.js" type="text/javascript"></script>