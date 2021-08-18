<?php


    if(isset($_POST['crear_transferencia'])){

        if($_POST['txtcedulatranret']!='' and $_POST['txtcedulatranret_B']!='' ){//validamos que exista la consulta de cuenta a debitar y beneficiario

            $codigo_transf=$_POST['numTransferencia']; 
            $fechatransferencia_transf=$_POST['dtfechaAper_AC']; 
            $cuentabeneficiaria_transf=$_POST['txtCCC_B']; 
            $cuentadebitar_transf=$_POST['txtCCC_D']; 
            $monto_transf=$_POST['txtvalor']; 
            $emailnotificar_transf=$_POST['txtemail']; 
            $descripcion_transf=$_POST['']; 
            $saldomonto_transf=0; //calcular
            
            //PARA CALCULAR CUENTAS CON SALDO DISPONIBLE Y SUMAR 
            $saldocuentadebitar=0;
            $saldocuentaBeneficiario=0;
            $constCorriente=-500;



        }else{
            echo '<h4 id ="errorSis" > Faltan campos por completar: informacion de  cuenta debitar o cuenta benificiario.  , vuelva a intentar. </h4>' ;
        }
    }





?>