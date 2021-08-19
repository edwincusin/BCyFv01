<?php

    if(isset($_POST['crear_transferencia'])){

        require_once './conex.php';
        $conexion=conectarBD();   

        if($_POST['txtcedulatranret']!='' and $_POST['txtcedulatranret_B']!='' ){//validamos que exista la consulta de cuenta a debitar y beneficiario

            $codigo_transf=$_POST['numTransferencia']; 
            $fechatransferencia_transf=$_POST['dtfechaAper_AC']; 
            $cuentabeneficiaria_transf=$_POST['txtCCC_B']; 
            $cuentadebitar_transf=$_POST['txtCCC_D']; 
            $monto_transf=$_POST['txtvalor']; 
            $emailnotificar_transf=$_POST['txtemail_D'];
            $descripcion_transf=$_POST['txtdescripciontransf']; 
            $saldomonto_transf=0; //calcular
            
            //PARA CALCULAR CUENTAS CON SALDO DISPONIBLE Y SUMAR 
            $saldocuentaDebitar=0;
            $saldocuentaBeneficiario=0;
            $constCorriente=-500;

            // consulta para obtner el saldo de cuenta a debitar
            $consulta="SELECT saldo_cueban 
            FROM public.cuentabancaria 
            WHERE numerocuenta_cueban=$cuentadebitar_transf;";
            $resultado=pg_query($conexion,$consulta) or die ("error no se puede realizar la consulta de saldo en la cuenta bancaria a debitar");
            while($row=pg_fetch_array($resultado)){
                $saldocuentaDebitar=$row['saldo_cueban'];
            }
            pg_free_result($resultado);
            echo  'saldo debitar'. $saldocuentaDebitar.' '; //imprimir prueba

            // consulta para obtner el saldo de cuenta beneficiaria
            $consulta="SELECT saldo_cueban 
            FROM public.cuentabancaria 
            WHERE numerocuenta_cueban=$cuentabeneficiaria_transf ;";
            $resultado=pg_query($conexion,$consulta) or die ("error no se puede realizar la consulta de saldo en la cuenta bancaria de beneficiario");
            while($row=pg_fetch_array($resultado)){
                $saldocuentadebitar=$row['saldo_cueban'];            }
            pg_free_result($resultado);
            echo  'saldo beneficario'. $saldocuentaBeneficiario.' '; //imprimir prueba

            //calcular monto a transferir dejando debitado
            $saldomonto_transf= $saldocuentaDebitar - $monto_transf;
            echo  'saldo resto debito'. $saldomonto_transf.' '; //imprimir prueba
            

            if ($saldomonto_transf<=0 and $_POST['desTipoCuenta_AC']=='AHORROS'){//si cuenta es ahorro y el valor es mayor a lo que hay en el saldo no puede retirar
                echo '<br> <h4 id ="errorSis" > Valor a transferir demasiado alto a lo que existe en la cuenta a debitar, o la cuenta AHORROS no tiene fondos. </h4>' ;    
            }else{//continua validando
                if($saldomonto_transf<=$constCorriente and $_POST['desTipoCuenta_AC']=='CORRIENTE'){
                    echo '<br> <h4 id ="errorSis" > Valor a trasferir demasiado alto a lo que existe en la cuenta debito excede el valor limite -500$, o la cuenta CORRIENTE no tiene fondos. </h4>' ;    
                }else{// ejecuto los sql para generar transferencia 
                    
                    //sql para registrar transferencia
                    $consulta="INSERT INTO public.trantransferencia(
                        codigo_transf, 
                        fechatransferencia_transf, 
                        cuentabeneficiaria_transf, 
                        cuentadebitar_transf, 
                        monto_transf, 
                        emailnotificar_transf, 
                        descripcion_transf, 
                        saldomonto_transf)
                        VALUES (
                        $codigo_transf, 
                        '$fechatransferencia_transf', 
                        $cuentabeneficiaria_transf, 
                        $cuentadebitar_transf, 
                        $monto_transf, 
                        '$emailnotificar_transf', 
                        '$descripcion_transf', 
                        $saldomonto_transf --resto historial--
                        );";
                    $resultado=pg_query($conexion,$consulta) or die (" ERROR AL REGISTRAR TRANSFERENCIA EN LA TABLA TRANTRANSFERENCIA");
                    pg_free_result($resultado);
                                      
                    //sql para actualizar saldo cuenta debitada
                    $consulta="UPDATE public.cuentabancaria 
                    SET  saldo_cueban=$saldomonto_transf               
                    WHERE numerocuenta_cueban = $cuentadebitar_transf;";
                    $resultado=pg_query($conexion,$consulta) or die ("error al realizar modificacion en la tabla cuentabancaria AL DEBITAR");
                    pg_free_result($resultado);

                    //calcular el total saldo de beneficiario si se hace la transferenica
                    $saldocuentaBeneficiario=$saldocuentaBeneficiario + $monto_transf;
                    echo  'saldo resto debito'. $saldocuentaBeneficiario.' '; //imprimir prueba

                     //sql para actualizar saldo cuenta beneficiaria
                     $consulta="UPDATE public.cuentabancaria 
                     SET  saldo_cueban=$saldocuentaBeneficiario               
                     WHERE numerocuenta_cueban = $cuentabeneficiaria_transf;";
                     $resultado=pg_query($conexion,$consulta) or die ("error al realizar modificacion en la tabla cuentabancaria AL ACTUALIZAR SALDO BENEFICIARIO");
                     pg_free_result($resultado);             
            
                    echo '<br> <h4 id ="msmcorreto" > TRANSFERENCIA REALIZADO CON ÉXITO. </h4>' ; 
                }
            }

        }else{
            echo '<h4 id ="errorSis" > Faltan campos por completar: informacion de  cuenta debitar o cuenta benificiario.  , vuelva a intentar. </h4>' ;
        }
        pg_close($conexion);
    }
?>