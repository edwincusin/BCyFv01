<?php
require_once __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if (isset($_POST['generar'])) {
// CONSULTAR REGISTRO GENERADO
 require_once './conex.php';
    $conexion=conectarBD();    
    $consulta="SELECT persona.cedula_per,persona.apellido1_per,persona.apellido2_per,persona.nombre1_per, persona.nombre2_per,persona.email_per, persona.celular_per, persona.telefono_per, estadopersona.descripcion_estper,
estadocuenta.descripcion_estcue, tipocuenta.descripcion_tipcue, cuentabancaria.numerocuenta_cueban,
tranretiro.codigo_tranret, tranretiro.fecha_tranret, tranretiro.tiporetiro_tranret, tranretiro.numerocheque_tranret, tranretiro.nombreret_tranret, tranretiro.cedularet_tranret, tranretiro.monto_tranret
	FROM tranretiro, cuentabancaria, persona, tipocuenta, estadocuenta, estadopersona
	where codigo_tranret = (SELECT MAX(codigo_tranret) FROM tranretiro)
		  and cuentabancaria_tranret=numerocuenta_cueban
		  and persona_cueban=cedula_per
		  and tipocuenta_cueban=codigo_tipcue
		  and codigo_tipcue=tipocuenta_cueban
		  and codigo_estcue=estado_cueban
		  and codigo_estper=estadopersona_per";
    $resultado=pg_query($conexion,$consulta) or die (" error recuperar datos parar impresion");  
    if(pg_num_rows($resultado)>0){
        while($row=pg_fetch_array($resultado)){            
            $_POST['txtcedulatranret']=$row['cedula_per'];
						$_POST['txtapellido1']=$row['apellido1_per'];
					  $_POST['txtapellido2']=$row['apellido2_per'];
						$_POST['txtnombre1']=$row['nombre1_per'];
						$_POST['txtnombre2']=$row['nombre2_per'];
						$_POST['txtemail']=$row['email_per']; 
						$_POST['txtcelular']=$row['celular_per'];
					  $_POST['txttelefono']=$row['telefono_per'];
					  $_POST['txtestadopersona_AC']=$row['descripcion_estper'];
					  $_POST['desEstadoCuenta_AC']=$row['descripcion_estcue'];
						if($row['tiporetiro_tranret']==="1"){$_POST['desTipoCuenta_AC']="AHORROS";}
						if($row['tiporetiro_tranret']==="2"){$_POST['desTipoCuenta_AC']="CORRIENTE";}
 						$_POST['txtCCC']=$row['numerocuenta_cueban'];
						$_POST['numRetiro']=$row['codigo_tranret'];
 						$_POST['dtfechaAper_AC']=$row['fecha_tranret'];
  					$_POST['descripcionTipoRetiro']=$row['tiporetiro_tranret'];
	 					$_POST['txtcheque']=$row['numerocheque_tranret']; 
	 					$_POST['txtanomape']=$row['nombreret_tranret'];
	 				  $_POST['txtcedularet']=$row['cedularet_tranret'];
						$_POST['txtvalor']=$row['monto_tranret'];
        }
			}

ob_start();
require_once './pdf_TranRetiro.php';
$html = ob_get_clean();
$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->pdf->SetProtection(array('modify','copy'));
$html2pdf->setTestTdInOnePage(false);
$html2pdf->writeHTML($html);
$html2pdf->Output('archivo.pdf', 'D');
//uso para guardar en un archivo en el servidor
//$html2pdf->output('/absolute/path/file_xxxx.pdf', 'F');
}
?>
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
                    <?php require 'sqlReadTranRetiro.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset   > <legend>Información datos cliente titular</legend>

                            <table >
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" id="imputsincolor"name="txtcedulatranret"  value="<?php echo $cedula_per; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellido paterno:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtapellido1" value="<?php echo $apellido1_per; ?>" readonly> </td>
                                
                                    <td> <label for=""><span>Apellido materno:</span></label> </td>
                                    <td> <input type="text" size="20"  id="imputsincolor" name="txtapellido2" value="<?php echo $apellido2_per; ?>"  readonly> </td> 
                                     
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Primer nombre:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtnombre1" value="<?php echo $nombre1_per; ?>"   readonly> </td>
                                
                                    <td> <label for=""><span>Segundo nombre:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtnombre2" value="<?php echo $nombre2_per; ?>"  readonly> </td>  

                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="text" size="33" id="imputsincolor" name="txtemail" value="<?php echo $email_per; ?>" maxlength="40" readonly> </span> </td>     
                                </tr>

                                <tr>
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per; ?>" readonly> </td>
                                
                                    <td> <label for=""><span>Número teléfono:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txttelefono" value="<?php echo $telefono_per; ?>" readonly> </td>  
                                    
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
                                    <td> <label for=""><span> N° Retiro :</span></label> </td>
                                     <td> <input type="text" size="8" name="numRetiro"  value="<?php echo $numRetiro?>" readonly> </td>

                                </tr>
                                <tr>
                                        <td> <label for=""><span> Fecha de retiro:</span></label> </td>
                                        <td> <input type="text" size="8" name="dtfechaAper_AC"  value="<?php echo date('Y-m-d')?>" readonly> </td>

                                        <td> <label for=""><span>Tipo de retiro:</span></label></td> 
                                        <td> 
                                            <select id="descripcionTipoRetiro" name="descripcionTipoRetiro" required>
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
                                        <td> <input type="text" name="txtcheque" id="tiporet" size="30" value="<?php 'N/A'?>" onKeyPress='return validaNumericos(event)'  maxlength="25"  placeholder="ej. 123456789000000" required oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')">  </td>                 

                                </tr>
                                <tr>    
                                        <td> <label for=""><span>Nombre y apellido:</span></label> </td>
                                        <td> <input type="text" size="20" name="txtanomape" value="<?php echo 'TITULAR'?>" maxlength="22" placeholder="ej. JUAN ORTEGA" required> </td>

                                        <td> <label for=""><span>N° Cédula:</span></label> </td>
                                        <td> <input type="text" name="txtcedularet" value="<?php echo 'N/A'; ?>" size="20" onKeyPress='return validaNumericos(event)' maxlength="10"  placeholder="ej. 1234567890" required oninvalid="this.setCustomValidity('Se Requiere 10 digitos')" oninput="this.setCustomValidity('')">  </td>

                                        <td> <label for=""><span>Valor a retirar $USD:</span></label> </td>
                                        <td> <input type="text" id="valor-retiro" name="txtvalor" placeholder="ej. 100" maxlength="8" onKeyPress='return validaNumericos(event)' required>  </td>

                                </tr>
                            </table>

                        </fieldset>    
													<br> 
                        <input type="submit" name="crear_retiro" value="&#10004; Registrar retiro " onclick="accion1();">                        
												<!--<input  style="width:200px;" id="botonGenerar" type="submit" value="Imprimir comprobante" name="generar"> -->
												<input type="submit" name="generar" id="botonGenerar" value="Imprimir comprobante" onclick="accion2();"> 
												<script>
													function ocultar() {
																document.getElementById('botonGenerar').style.display = 'none';
															}
															ocultar();

															function accion1() {
																document.getElementById('descripcionTipoRetiro').required = "true";
																document.getElementById('valor-retiro').required = "true";
																document.getElementById('tiporet').required = "true";
																
															}

															function accion2() {
																document.getElementById('descripcionTipoRetiro').removeAttribute('required');
																document.getElementById('valor-retiro').removeAttribute('required');
																document.getElementById('tiporet').removeAttribute('required');
															}
													</script>
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