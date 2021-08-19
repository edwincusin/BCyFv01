<?php


    if(isset($_POST['crear_retiro'])){
			echo "<script>
			document.getElementById('descripcionTipoRetiro').setAttribute('required', '');			
			</script>
			";
			
			require_once './conex.php';
        $conexion=conectarBD();    

        if($_POST['txtcedulatranret']!=""){//validar que haya seleccionado la cuenta

            if($_POST['desEstadoCuenta_AC']=='ACTIVO'){//PARA VALIDAR QUE LA CUENTA ESTE ACTIVA
                if ($_POST['desTipoCuenta_AC']=='AHORROS' and $_POST['descripcionTipoRetiro']==2){//para validar que tipo de cuenta cuando es cheque debe ser corriente
                    echo '<br> <h4 id ="errorSis" >  El tipo de cuenta para cambiar cheques debe ser Corriente</h4>' ;    
                }else {//continua validando
                   if($_POST['descripcionTipoRetiro']==2 and $_POST['txtcheque']=='N/A' ){//validar si en caso es cheque se debe llenar lo campos apellido y cedula mas numero cheque
                     echo '<br> <h4 id ="errorSis" >  Debe completar los campos que requiere cuando es retiro o cambio en cheque : campo N°cheque, nombre y cedula vuelva a intentar</h4>' ;    
                   }else{//continuar validando
                        if($_POST['descripcionTipoRetiro']==2 and  $_POST['txtanomape']=='TITULAR'){//validar si en caso es cheque se debe llenar lo campos apellido y cedula mas numero cheque
                            echo '<br> <h4 id ="errorSis" >  Debe completar los campos que requiere cuando es retiro o cambio en cheque : campo N°cheque, nombre y cedula vuelva a intentar</h4>' ;                           
                        }else{//continuar validadndo 
                            if($_POST['descripcionTipoRetiro']==2 and  $_POST['txtcedularet']=='N/A'){//validar si en caso es cheque se debe llenar lo campos apellido y cedula mas numero cheque
                                echo '<br> <h4 id ="errorSis" >  Debe completar los campos que requiere cuando es retiro o cambio en cheque : campo N°cheque, nombre y cedula vuelva a intentar</h4>' ;                           
                            }else {/*   inicio de procesos consultas para guardar  */

                                $codigo_tranret=$_POST['numRetiro']; 
                                $fecha_tranret=$_POST['dtfechaAper_AC']; 
                                $monto_tranret=$_POST['txtvalor'];
                                $saldomonto_tranret=0; //calcular
                                $cuentabancaria_tranret=$_POST['txtCCC']; 
                                $tiporetiro_tranret=$_POST['descripcionTipoRetiro']; 
                                $numerocheque_tranret=$_POST['txtcheque']; 
                                $nombreret_tranret=$_POST['txtanomape']; 
                                $cedula_tranret=$_POST['txtcedularet']; 
                                
                                $saldocuenta=0;
                                $constCorriente=-500;

                                $consulta="SELECT saldo_cueban 
                                FROM public.cuentabancaria 
                                WHERE numerocuenta_cueban=$cuentabancaria_tranret ;";
                                $resultado=pg_query($conexion,$consulta) or die ("error no se puede realizar la consulta de saldo en la cuenta bancaria");
                                
                                while($row=pg_fetch_array($resultado)){
                                    $saldocuenta=$row['saldo_cueban'];
                                }
                                pg_free_result($resultado);
                                echo  $saldocuenta;

                                $saldomonto_tranret= $saldocuenta - $monto_tranret;

                                echo  $saldomonto_tranret;
                                
                                if ($saldomonto_tranret<=0 and $_POST['desTipoCuenta_AC']=='AHORROS'){//si cuenta es ahorro y el valor es mayor a lo que hay en el saldo no puede retirar
                                    echo '<br> <h4 id ="errorSis" > Valor a retirar demasiado alto a lo que existe en la cuenta, o la cuenta AHORROS no tiene fondos. </h4>' ;    
                                }else{//continuar validando
                                    if($saldomonto_tranret<=$constCorriente and $_POST['desTipoCuenta_AC']=='CORRIENTE'){
                                        echo '<br> <h4 id ="errorSis" > Valor a retirar demasiado alto a lo que existe en la cuenta, o la cuenta CORRIENTE no tiene fondos. </h4>' ;    
                                    }else{// ejecuto los sql para generar retiro 

                                       
                                        $consulta="INSERT INTO public.tranretiro(
                                            codigo_tranret, 
                                            fecha_tranret, 
                                            monto_tranret, 
                                            saldomonto_tranret, 
                                            cuentabancaria_tranret, 
                                            tiporetiro_tranret, 
                                            numerocheque_tranret, 
                                            nombreret_tranret, 
                                            cedularet_tranret)
                                            VALUES (
                                                    $codigo_tranret, -- codigo
                                                    '$fecha_tranret', 
                                                    $monto_tranret, 
                                                    $saldomonto_tranret, 
                                                    $cuentabancaria_tranret, 
                                                    $tiporetiro_tranret, 
                                                    '$numerocheque_tranret', 
                                                    '$nombreret_tranret', 
                                                    '$cedula_tranret'
                                                    );";
                                        $resultado=pg_query($conexion,$consulta) or die ("error no se puede registrar retiro en la tabla tranretiro");
                                        pg_free_result($resultado);

                                        $consulta="UPDATE public.cuentabancaria 
                                        SET  saldo_cueban=$saldomonto_tranret               
                                        WHERE numerocuenta_cueban = $cuentabancaria_tranret;";
                                        $resultado=pg_query($conexion,$consulta) or die ("error al realizar modificacion en la tabla cuentabancaria");
                                        pg_free_result($resultado);
                                
                                        echo '<br> <h4 id ="msmcorreto" > RETIRO REALIZADO CON ÉXITO. </h4>' ; 
																		//		echo '<input  style="width:200px;"type="submit" value="Imprimir comprobante" name="generar" class="boton">';
																			echo"		<script>
																					function mostrar(){																					
																							document.getElementById('botonGenerar').style.display = 'inline';																					
																						}mostrar();
																				</script>";

                                    } 
                                }
                            }
                        }                            
                   }
                }

            }else{
                echo '<br> <h4 id ="errorSis" > La Cuenta esta inactiva o bloqueada debe actualizar información, $el titular. </h4>' ;    
            }

        }else {
            echo '<br> <h4 id ="errorSis" > Debe seccionar o consultar primer numero de cuenta, existen campos vacios, vuelva a intentar. </h4>' ;
           
        }

        pg_close($conexion);
    }

?>