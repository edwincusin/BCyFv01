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
                        <h2>Formulario para retiro en efectivo de la cuenta titular</h2>
                    </div>
                    
                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cuenta cliente::</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 002" required  oninvalid="this.setCustomValidity('Se Requiere ingrese N° cuenta')" oninput="this.setCustomValidity('')"> </td>
                                <td> <input type="submit" name="buscar_TR" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require 'sqlReadTranRetirodeposito.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset   > <legend>Información datos cliente titular</legend>

                            <table >
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedulatranret" id="imputsincolor" value="<?php echo $cedula_per; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellido paterno:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" value="<?php echo $apellido1_per; ?>" disabled> </td>
                                
                                    <td> <label for=""><span>Apellido materno:</span></label> </td>
                                    <td> <input type="text" size="20"  id="imputsincolor" name="txtapellido2" value="<?php echo $apellido2_per; ?>"  disabled> </td> 
                                     
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Primer nombre:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" value="<?php echo $nombre1_per; ?>" name="txtnombre1"  disabled> </td>
                                
                                    <td> <label for=""><span>Segundo nombre:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtnombre2" value="<?php echo $nombre2_per; ?>"  disabled> </td>  

                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="text" size="33" id="imputsincolor" name="txtemail" value="<?php echo $email_per; ?>" maxlength="40" disabled> </span> </td>     
                                </tr>

                                <tr>
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per; ?>" disabled> </td>
                                
                                    <td> <label for=""><span>Número teléfono:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txttelefono" value="<?php echo $telefono_per; ?>" disabled> </td>  
                                    
                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtestadopersona_AC" value="<?php echo $descripcionestper_estper; ?>" readonly> </td> 

                                </tr>                             

                            </table>
                                                        
                        </fieldset>
                    
                        <fieldset  > <legend>Información cuenta bancaria cliente</legend>
                            <table>
                                <tr>
                                        <td> <label for=""><span>Estado cuenta:</span></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                        <td> <input type="text" size="15" id="imputsincolor" name="desEstadoCuenta_AC" value="<?php echo $descripcion_estcue; ?>" readonly> </td> 
                                    
                                        <td> <label for=""><span>Tipo de cuenta:</span></label></td> 
                                        <td> <input type="text" size="15" id="imputsincolor" name="desTipoCuenta_AC" value="<?php echo $descripcion_tipcue; ?>" readonly> </td> 
                                                                           
                                        <td > <label for=""><span >Número de cuenta: </span></label></td>                                
                                        <td colspan="12" >  <input type="text" size="24" id="numCuenta" name="txtCCC" value="<?php echo $numCCC; ?>" readonly> </td> 
                                </tr>
                            </table>
                        </fieldset>    


                        <fieldset >  <legend id="selectfield">Informacion requerida para retiro</legend>
                            <table>
                                <tr>
                                        <td> <label for=""><span> Fecha de retiro:</span></label> </td>
                                        <td> <input type="text" size="8" name="dtfechaAper_AC"  value="<?php echo date('Y-m-d')?>" readonly> </td>

                                        <td> <label for=""><span>Tipo de retiro:</span></label></td> 
                                        <td> 
                                            <select id="" name="descripcionTipoRetiro" required>
                                                    <option disabled selected value="">Seleccionar...</option>
                                            
                                                <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                                <?php 
                                                    while($row=pg_fetch_array($resultadoTipoRetiro)){
                                                        $optionC = "<option value='".$row['codigo_tipret']."'"; //iniciamos el codigo del option                                                
                                                        if($tiporetiro_tranret > 0 and $tiporetiro_tranret == $row['codigo_tipret']){ //si el id de la opcion es igual al del usuario lo seleccionamos
                                                            $optionC .= " selected='selected'";
                                                        }                                                
                                                        $optionC .= ">".$row['descripcion_tipret']."</option>"; //terminamos el codigo del option                                                
                                                        echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                    }
                                                ?>
                                                <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                     
                                                    
                                            </select>
                                           
                                        </td>

                                        <td> <label for=""><span>N° Cheque:</span></label> </td>
                                        <td> <input type="text" name="txtcheque" size="30" value="<?php echo 'N/A'?>" " onKeyPress='return validaNumericos(event)'  maxlength="25"  placeholder="ej. 123456789000000" required oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')">  </td>                 

                                </tr>
                                <tr>    
                                        <td> <label for=""><span>Nombre y apellido:</span></label> </td>
                                        <td> <input type="text" size="20" name="txtanomape" value="<?php echo 'TITULAR'?>" maxlength="22" placeholder="ej. JUAN ORTEGA" required> </td>

                                        <td> <label for=""><span>N° Cédula:</span></label> </td>
                                        <td> <input type="text" name="txtcedularet" value="<?php echo 'N/A'; ?>" size="20" onKeyPress='return validaNumericos(event)' maxlength="10"  placeholder="ej. 1234567890" required oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')">  </td>

                                        <td> <label for=""><span>Valor a retirar $USD:</span></label> </td>
                                        <td> <input type="text" name="txtvalor" placeholder="ej. 100" maxlength="8" onKeyPress='return validaNumericos(event)' required>  </td>

                                </tr>


                            </table>

                        </fieldset>    
<br>
                        <input type="submit" name="crear_retiro" value="&#10004; Registrar retiro e imprimir">                        
                        <!-- <input type="submit" name="eliminar_UDC" value="&#128221; Eliminar cuenta bancaria"> -->
                        <p style="display=grid; text-align:center; color:blue; "> 
                    <!-- <b>Aviso: </b>  Para considerar una eliminacion de una cuenta bancaria ya creada, esta solo se realizara cuando haya sido creado la fecha actual y si el usuario tiene la certeza de haber cometido un error al resgistrar.</p> -->
                                              

                    </form>
                    <br>
                     <?php require 'sqlCreateTranRetiro.php'; ?> 
                   
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