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
                        <h2>Formulario para deposito cliente</h2>
                    </div>
                    
                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cuenta cliente::</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 002" required  oninvalid="this.setCustomValidity('Se Requiere ingrese N° cuenta')" oninput="this.setCustomValidity('')"> </td>
                                <td> <input type="submit" name="buscar_UDC" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require 'sqlReadDeposito.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset  > <legend>Información datos cliente</legend>

                            <table>
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedula"  value="<?php echo $cedula_per; ?>"   readonly>  </td>

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


												<fieldset  > <legend>Información Nombre Depositante</legend>
                            <table>
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedula_depositante"  value="" maxlength="10" required>  </td>

                                    <td> <label for=""><span>Nombre :</span></label> </td>
                                    <td> <input type="text" name="nombre_depositante" size="40" value="" maxlength="60" required> </td>
                                   
                                </tr>
                          </table>                                                      
                        </fieldset>

                    
                        <fieldset  > <legend>Información cuenta bancaria cliente</legend>
                            <table>
                                <tr>
                                        <td> <label for=""><span> Fecha deposito:</span></label> </td>
                                        <td> <input type="text" size="8" name="dtfechaAper_AC"  value="<?php echo date("Y-m-d");?>" readonly> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                        
                                        
																				<td> <label for=""><span>Tipo de deposito:</span></label> </td>
                                        <td> 
                                            <select id="" name="descripcionTipoDeposito" class="descripcionTipoDeposito" required>
                                                    <option disabled selected value="">Seleccionar...</option>
                                               <?php 
                                                    while($row=pg_fetch_array($resultadoTipoDeposito)){
                                                        $optionC = "<option value='".$row['codigo_tipdep']."'"; //iniciamos el codigo del option                                                                                                                                        
                                                        $optionC .= ">".$row['descripcion_tipdep']."</option>"; //terminamos el codigo del option                                                
                                                        echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                    }
                                                ?>
                                                <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                                                           
                                            </select>																				
                                        </td>
																				<td> <label for=""><span>Número cheque:</span></label> </td>
																				<td> <input type="text" size="20"  class="resultado" required> </td>
																				<script>
																					const selectElement = document.querySelector('.descripcionTipoDeposito');
																									selectElement.addEventListener('change', (event) => {
																											const resultado = document.querySelector('.resultado');																											
																											resultado.textContent = `Te gusta el sabor ${event.target.value}`;																																																																
																											resultado.value=`${event.target.value}`;
																											if(resultado.value==="1"){
																												resultado.value="N/A";
																												resultado.disabled="true";
																											}
																											if(resultado.value==="2"){
																												resultado.value="";
																												resultado.removeAttribute('disabled');
																											}
																										});
																				</script>

                                    </tr>
                                <tr>
                                       

																				<td> <label for=""><span>Banco Destino</span></label> </td>
                                        <td> 
                                            <select id="" name="descripcionBancosLocales" required>
                                                    <option disabled selected value="">Seleccionar...</option>
                                            
                                                <!-- llenar cobobox y consultar datos de  persona TABLAS -->
                                                <?php 
                                                    while($row=pg_fetch_array($resultadoBancosLocales)){
                                                        $optionC = "<option value='".$row['codigo_banloc']."'"; //iniciamos el codigo del option                                                                                                                                              
                                                        $optionC .= ">".$row['descripcion_banloc']."</option>"; //terminamos el codigo del option                                                
                                                        echo $optionC; //imprimimos en pantalla el codigo que se armo
                                                    }
                                                ?>
                                                <!-- FIN llenar cobobox y consultar datos de  persona TABLAS -->                                     
                                                    
                                            </select>
                                        </td>
																				<td> <label for=""><span>Estado:</span></label> </td>
                                        <td> <input type="text" size="20"  name="txtdescripcion_estcue"   required readonly> </td>															
																				<td> <label for=""><span>Valor $:</span></label> </td>
                                        <td> <input type="text" name="txtvalor" placeholder="ej. 100" maxlength="8" onKeyPress='return validaNumericos(event)' required> </td>         
																					<td > <label for=""><span >Número de cuenta: </span></label></td>                                
																				<td>  <input type="text" size="16" id="numCuenta" name="txtCCC" value="<?php echo $numCCC; ?>" required readonly> </td> 
                                </tr>
                            </table>
                        </fieldset>        

                        <input type="submit" name="ingresar_deposito" class="ingresar_deposito" value="&#10004; Registrar Deposito e imprimir"> 
										 <script>
													document.getElementById("ingresar_deposito").addEventListener("click", function( event ) {
														// presentar la cuenta de clicks realizados sobre el elemento con id "prueba"
														event.target.innerHTML = "Conteo de Clicks: " + event.detail;
														console.log("hhjhjj");
													}, false);
											</script>     

                        <p style="display=grid; text-align:center; color:blue; "> 
                    
                    </form>
                     <?php require 'sqlUpDeCuenta.php'; ?> 
                   
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

<script src="./eventosfunciones.js" type="text/javascript"></script>