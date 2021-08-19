<?php
require_once __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if (isset($_POST['generar'])) {
// CONSULTAR REGISTRO GENERADO
 require_once './conex.php';
    $conexion=conectarBD();    
    $consulta="select trantransferencia.monto_transf, trantransferencia.cuentadebitar_transf, trantransferencia.cuentabeneficiaria_transf
, concat(persona.nombre1_per,' ',persona.nombre2_per,' ',persona.apellido1_per,' ',persona.apellido2_per) AS nombrebeneficiario
,trantransferencia.emailnotificar_transf, trantransferencia.fechatransferencia_transf,trantransferencia.codigo_transf
,trantransferencia.descripcion_transf
from public.persona, public.cuentabancaria, public.trantransferencia
where trantransferencia.cuentabeneficiaria_transf=numerocuenta_cueban
		  and persona_cueban=cedula_per
		";
    $resultado=pg_query($conexion,$consulta) or die (" error recuperar datos parar impresion");  
    if(pg_num_rows($resultado)>0){
        while($row=pg_fetch_array($resultado)){            


					 $_POST['monto_transf']=$row['monto_transf'];
					 $_POST['cuentadebitar_transf']=$row['cuentadebitar_transf'];
					 $_POST['cuentabeneficiaria_transf']=$row['cuentabeneficiaria_transf'];
					 $_POST['nombrebeneficiario']=$row['nombrebeneficiario'];
					 $_POST['emailnotificar_transf']=$row['emailnotificar_transf'];
					 $_POST['fechatransferencia_transf']=$row['fechatransferencia_transf'];
					 $_POST['codigo_transf']=$row['codigo_transf'];
					 $_POST['descripcion_transf']=$row['descripcion_transf'];
        }
			}

ob_start();
require_once './pdf_TranTrasferencia.php';
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
                        <h2>Formulario para realizar transferencias locales</h2>
                    </div>
                    
                    <div class="contenedorControlesForm">

                    <form action="" method="post">
                        <table>
                            <tr>
                                <td> <label for=""><span>N° Cuenta a debitarse:</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato1" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 002" required  oninvalid="this.setCustomValidity('Se Requiere ingrese N° cuenta')" oninput="this.setCustomValidity('')"> </td>
                                <td> <label for=""><span>N° Cuenta beneficiaria:</span></label> </td>
                                <td colspam="2"> <input type="text" name="txtbuscarDato2" id="validarCedulaEcu" size="20" onKeyPress='return validaNumericos(event)' maxlength="10" placeholder="ej. 002" required  oninvalid="this.setCustomValidity('Se Requiere ingrese N° cuenta')" oninput="this.setCustomValidity('')"> </td>

                                <td> <input type="submit" name="buscar_TF" value="&#128270; Buscar"> </td>
                            </tr>
                        </table>
                    </form> 
                    <?php require 'sqlReadTranTransferencia.php'; ?>
                    

                    <form action="" method="post">
                        <fieldset   > <legend>Información de la cuenta a debitarse</legend>

                            <table >
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedulatranret" id="imputsincolor" value="<?php echo $cedula_per; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellidos y nombres:</span></label> </td>
                                    <td> <input type="text" size="30" id="imputsincolor" value="<?php echo $apellido1_per.' '.$apellido2_per.' '.$nombre1_per.' '.$nombre2_per; ?>" disabled> </td>
                                                                     
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="text" size="25" id="imputsincolor" name="txtemail_D" value="<?php echo $email_per; ?>" maxlength="40" readonly> </span> </td>     
                                
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per; ?>" disabled> </td>                            
                                 
                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtestadopersona_AC" value="<?php echo $descripcionestper_estper; ?>" readonly> </td> 
                                </tr>    
                                <tr>
                                        <td> <label for=""><span>Tipo de cuenta:</span></label></td> 
                                        <td> <input type="text" size="10" id="imputsincolor" name="desTipoCuenta_AC" value="<?php echo $descripcion_tipcue; ?>" readonly> </td> 
                                                                           
                                        <td > <label for=""><span >Número de cuenta: </span></label></td>                                
                                        <td colspan="12" >  <input type="text" size="24" id="numCuenta" name="txtCCC_D" value="<?php echo $numCCC; ?>" readonly> </td> 
                                </tr>  
                            </table>                                                        
                        </fieldset>

                        <fieldset   > <legend>Información de la cuenta beneficiaria</legend>

                            <table >
                                <tr>
                                    <td> <label for=""><span>N° Cédula:</span></label> </td>
                                    <td> <input type="text" name="txtcedulatranret_B" id="imputsincolor" value="<?php echo $cedula_per_B; ?>"   readonly>  </td>

                                    <td> <label for=""><span>Apellidos y nombres:</span></label> </td>
                                    <td> <input type="text" size="30" id="imputsincolor" value="<?php echo $apellido1_per_B.' '.$apellido2_per_B.' '.$nombre1_per_B.' '.$nombre2_per_B; ?>" disabled> </td>
                                                                    
                                </tr>
                                    
                                <tr>
                                    <td> <label for=""><span>Email @:</span></label> </td>
                                    <td> <input type="text" size="25" id="imputsincolor" name="txtemail" value="<?php echo $email_per_B; ?>" maxlength="40" disabled> </span> </td>     
                                
                                    <td> <label for=""><span>Número celular:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtcelular" value="<?php echo $celular_per_B; ?>" disabled> </td>                            
                                
                                    <td> <label for=""><span>Estado operativo:</span></label> </td>
                                    <td> <input type="text" size="20" id="imputsincolor" name="txtestadopersona_AC" value="<?php echo $descripcionestper_estper_B; ?>" readonly> </td> 

                                </tr>    
                                <tr>
                                        <td> <label for=""><span>Tipo de cuenta:</span></label></td> 
                                        <td> <input type="text" size="10" id="imputsincolor" name="desTipoCuenta_B" value="<?php echo $descripcion_tipcue_B; ?>" readonly> </td> 
                                                                        
                                        <td > <label for=""><span >Número de cuenta: </span></label></td>                                
                                        <td colspan="12" >  <input type="text" size="24" id="numCuenta" name="txtCCC_B" value="<?php echo $numCCC_B; ?>" readonly> </td> 
                                </tr>  
                            </table>                                                        
                        </fieldset>
                
                                                

                        <fieldset >  <legend id="selectfield">Informacion requerida para la transferencia</legend>
                            <table>
                                <tr>
                                    <td> <label for=""><span> N° transferencia :</span></label> </td>
                                    <td> <input type="text" size="8" name="numTransferencia"  value="<?php echo $numtransferencia?>" readonly> </td>
                                </tr>
                                <tr>
                                    <td> <label for=""><span> Fecha de transferencia:</span></label> </td>
                                    <td> <input type="text" size="8" name="dtfechaAper_AC"  value="<?php echo date('Y-m-d')?>" readonly> </td>
                                                              
                                    <td> <label for=""><span>Valor a transferir $USD:</span></label> </td>
                                    <td> <input type="text" id="valor-transferir" size="10" name="txtvalor" placeholder="ej. 100" maxlength="8" onKeyPress='return validaNumericos(event)' required>  </td>
                               
                                    <td colspam="2"> <label for=""><span>Descripción de transferencia:</span></label> </td>
                                    <td colspam="3"> <input type="text" id="descripcion-transferir" size="30" value="<?php echo $descripcion_transf; ?>" name="txtdescripciontransf" maxlength="25" placeholder="ej. pago / ahorro / prestamo" required> </td>
                                </tr>
                            </table>

                        </fieldset>    
<br> 
                        <input type="submit" name="crear_transferencia" value="&#10004; Registrar transferencia e imprimir">                        
                        <!-- <input type="submit" name="eliminar_UDC" value="&#128221; Eliminar cuenta bancaria"> -->
                        <!-- <p style="display=grid; text-align:center; color:blue; ">  -->
                    <!-- <b>Aviso: </b>  Para considerar una eliminacion de una cuenta bancaria ya creada, esta solo se realizara cuando haya sido creado la fecha actual y si el usuario tiene la certeza de haber cometido un error al resgistrar.</p> -->
											<input type="submit" name="generar" id="botonGenerar" value="Imprimir comprobante" onclick="accion2();"> 
												<script>
													function ocultar() {
																document.getElementById('botonGenerar').style.display = 'none';
															}
															ocultar();

															function accion1() {
																document.getElementById('valor-transferir').required = "true";
																document.getElementById('descripcion-transferir').required = "true";
															}

															function accion2() {
																document.getElementById('valor-transferir').removeAttribute('required');
																document.getElementById('descripcion-transferir').removeAttribute('required');
															}
													</script>


                    </form>
                    <br>
                     <?php require 'sqlCreateTranTransferencia.php'; ?> 
                   
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