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
                        <h2>Formulario para asignacion de código de cuenta cliente</h2>
                    </div>

                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cédula:</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 1234567890 " required pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')"> </td>
                                <td> <input type="submit" name="buscar_AC" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require './sqlReadAperturaCuenta.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset  > <legend>Información datos cliente</legend>

                            <table>
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedula_AC" required value="<?php echo $cedula_per; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellido paterno:</span></label> </td>
                                    <td> <input type="text" size="20" value="<?php echo $apellido1_per; ?>" disabled> </td>
                                
                                    <td> <label for=""><span>Apellido materno:</span></label> </td>
                                    <td> <input type="text" size="20"  name="txtapellido2" value="<?php echo $apellido2_per; ?>"  disabled> </td> 
                                     
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Primer nombre:</span></label> </td>
                                    <td> <input type="text" size="20" value="<?php echo $nombre1_per; ?>" name="txtnombre1"  disabled> </td>
                                
                                    <td> <label for=""><span>Segundo nombre:</span></label> </td>
                                    <td> <input type="text" size="20" name="txtnombre2" value="<?php echo $nombre2_per; ?>"  disabled> </td>  

                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="email" size="33" id="input_email" name="txtemail" value="<?php echo $email_per; ?>" maxlength="40" disabled> </span> </td>     
                                </tr>

                                <tr>
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20"  name="txtcelular" value="<?php echo $celular_per; ?>" disabled> </td>
                                
                                    <td> <label for=""><span>Número teléfono:</span></label> </td>
                                    <td> <input type="text" size="20"  name="txttelefono" value="<?php echo $telefono_per; ?>" disabled> </td>  
                                    
                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                    <td> <input type="text" size="20"  name="txtestadopersona_AC" value="<?php echo $descripcionestper_estper; ?>" readonly> </td> 

                                </tr>                             

                            </table>
                                                        
                        </fieldset>
                    
                        <fieldset  > <legend>Información cuenta bancaria cliente</legend>
                            <table>
                                <tr>
                                        <td> <label for=""><span> Fecha de apertura:</span></label> </td>
                                        <td> <input type="text" size="8" name="dtfechaAper_AC"  value="<?php echo date("Y-m-d");?>" readonly> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                        
                                        <td> <label for=""><span>Saldo inicial $USD:</span></label> </td>
                                        <td> <input type="text" name="txtsaldo_AC" onKeyPress='return validaNumericos(event)' pattern="[0-9]{2}" maxlength="2"  placeholder="$USD" required oninvalid="this.setCustomValidity('Se Requiere 2 digitos')" oninput="this.setCustomValidity('')">  </td>

                                        <td> <label for=""><span>Estado:</span></label> </td>
                                        <td>
                                            <select id="" name="desEstadoCuenta_AC" required>
                                                    <option disabled selected value="">Seleccionar...</option>
                                            
                                                <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                                <?php 
                                                    while($row=pg_fetch_array($resultadoEstadoCuenta)){
                                                        $optionC = "<option value='".$row['codigo_estcue']."'"; //iniciamos el codigo del option                                                
                                                        if($estadocuenta_cueban > 0 and $estadocuenta_cueban == $row['codigo_estcue']){ //si el id de la opcion es igual al del usuario lo seleccionamos
                                                            $optionC .= " selected='selected'";
                                                        }                                                
                                                        $optionC .= ">".$row['descripcion_estcue']."</option>"; //terminamos el codigo del option                                                
                                                        echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                    }
                                                ?>
                                                <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                     
                                                    
                                            </select>

                                        </td>
                                
                                    </tr>
                                <tr>
                                        <td> <label for=""><span>Tipo de cuenta bancaria:</span></label> </td>
                                        <td> 
                                            <select id="" name="descripcionTipoCuenta_AC" required>
                                                    <option disabled selected value="">Seleccionar...</option>
                                            
                                                <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                                <?php 
                                                    while($row=pg_fetch_array($resultadoTipoCuenta)){
                                                        $optionC = "<option value='".$row['codigo_tipcue']."'"; //iniciamos el codigo del option                                                
                                                        if($tipocuenta_cueban > 0 and $tipocuenta_cueban == $row['codigo_tipcue']){ //si el id de la opcion es igual al del usuario lo seleccionamos
                                                            $optionC .= " selected='selected'";
                                                        }                                                
                                                        $optionC .= ">".$row['descripcion_tipcue']."</option>"; //terminamos el codigo del option                                                
                                                        echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                    }
                                                ?>
                                                <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                     
                                                    
                                            </select>

                                        </td>
                                    
                                        <td colspan="3" > <label for=""><span >Número de cuenta asignado automaticamente por el sistema: </span></label></td>                                
                                        <td colspan="2" > <input type="text" size="24" id="numCuenta" name="txtCCC" value="<?php echo $numCCC; ?>" disabled> </td> 
                                </tr>
                            </table>
                        </fieldset>        
                        <input type="submit" name="crear_AC" value="&#10004; Crear y registrar cuenta">                        
                        <!-- <input type="submit" name="modificar" value="&#128221; Modificar Información">  -->
                           
                        

                    </form>
                    <?php require 'sqlCreateAperturaCuenta.php'; ?>  
                   
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