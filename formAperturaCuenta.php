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
                        <h2>Formulario para asignacion de número de cuenta</h2>
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
                                    <td> <input type="text" name="txtcedula" required value="<?php echo $cedula_per; ?>"  disabled >  </td>

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
                                    <td> <input type="text" size="20"  name="txttelefono" value="<?php echo $descripcionestper_estper; ?>" disabled> </td> 

                                </tr>                             

                            </table>
                                                        
                        </fieldset>
                        
                        <fieldset  > <legend>Información cuenta bancaria cliente</legend>
                            <table>
                                <tr>
                                        <td> <label for=""><span> Fecha de apertura:</span></label> </td>
                                        <td> <input type="text" size="8" name="dtfechaNac"  value="<?php echo date("Y-m-d");?>" disabled> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                        
                                        <td> <label for=""><span>Saldo inicial $USD:</span></label> </td>
                                        <td> <input type="text" name="txtsaldo" onKeyPress='return validaNumericos(event)' pattern="[0-9]{2}" maxlength="2"  placeholder="$USD" required oninvalid="this.setCustomValidity('Se Requiere 2 digitos')" oninput="this.setCustomValidity('')">  </td>

                                        <td> <label for=""><span>Estado:</span></label> </td>
                                        <td>                                            
                                            <select name="" id="" name="descripcionEstadoCuenta" required>
                                                <option disabled selected value="">Seleccionar...</option>
                                                <?php 
                                                    if($numRegEstadoCuenta>0){                                         
                                                        while ($row=pg_fetch_array($resultadoEstadoCuenta)){
                                                ?> 
                                                        <option value="<?php echo $row['codigo_estcue']; ?>"><?php echo $row['descripcion_estcue']; ?></option>
                                                <?php   
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                
                                    </tr>
                                <tr>

                                        <td> <label for=""><span>Tipo de cuenta bancaria:</span></label> </td>
                                        <td>                                            
                                            <select name="" id="" name="descripcionTipoCuenta" required>
                                                <option disabled selected value="">Seleccionar...</option>
                                                <?php 
                                                    if($numRegTipoCuenta>0){                                         
                                                        while ($row=pg_fetch_array($resultadoTipoCuenta)){
                                                ?> 
                                                        <option value="<?php echo $row['codigo_tipcue']; ?>"><?php echo $row['descripcion_tipcue']; ?></option>
                                                <?php   
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    
                                        <td colspan="3" > <label for=""><span >Número de cuenta asignado automaticamente por el sistema: </span></label></td>                                
                                        <td colspan="2" > <input type="text" size="24" id="numCuenta" name="txttelefono" value="<?php echo $numCCC; ?>" disabled> </td> 
                                </tr>
                            </table>
                        </fieldset>        
                        <input type="submit" name="crear" value="&#10004; Crear cuenta">                        
                        <input type="submit" name="modificar" value="&#128221; Modificar Información"> 
                             
                    </form>  

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