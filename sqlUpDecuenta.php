<?php


if(isset($_POST['modificar_UDC'])){

    require_once './conex.php';
    $conexion=conectarBD();  
    
    $saldo_cueban_up=$_POST['txtsaldo_AC'];
    $persona_cueban_up=$_POST['txtcedula'];
    $estado_cueban_up=$_POST['desEstadoCuenta_AC'];   
    $tipocuenta_cueban_up=$_POST['descripcionTipoCuenta_AC'];
    $CCC=$_POST['txtCCC'];

    if($_POST['txtcedula']!=''){
        if($_POST['dtfechaAper_AC']!=date("Y-m-d")){

            $consulta="UPDATE public.cuentabancaria 
            SET  saldo_cueban='$saldo_cueban_up',
                tipocuenta_cueban=$tipocuenta_cueban_up,
                estado_cueban=$estado_cueban_up                
            WHERE numerocuenta_cueban = $CCC";
        $resultado=pg_query($conexion,$consulta) or die ("error al realizar modificacion en la tabla cuentabancaria");
        pg_free_result($resultado);

        echo '<h4 id ="msmcorreto" > Modificación realizada con éxito </h4>' ;
        }else {
            echo '<h4 id ="errorSis" > Solo puede modificar la misma fecha en la que se aperturo la cuenta, por favor solicitar soporte al administrador para ese petición </h4>' ;
        }         
    }else {        
        echo '<h4 id ="errorSis" > Debe selecionar una cuenta bancaria, con datos reflejados en el formulario antes de continuar, vuelva a intentar. </h4>' ;
    }

    
    pg_close($conexion);
}



if(isset($_POST['eliminar_UDC'])){

    require_once './conex.php';
    $conexion=conectarBD();  
    
    $CCC=$_POST['txtCCC'];

    if($_POST['txtcedula']!=''){
        if($_POST['dtfechaAper_AC']!=date("Y-m-d")){

            $consulta="DELETE 
            FROM public.cuentabancaria             
            WHERE numerocuenta_cueban = $CCC";
        $resultado=pg_query($conexion,$consulta) or die ("error al realizar eleminación en la tabla cuentabancaria");
        pg_free_result($resultado);

        echo '<h4 id ="msmcorreto" > Eliminación realizada con éxito </h4>' ;
        }else {
            echo '<h4 id ="errorSis" > Solo puede modificar la misma fecha en la que se aperturo la cuenta, por favor solicitar soporte al administrador para ese petición </h4>' ;
        }         
    }else {        
        echo '<h4 id ="errorSis" > Debe selecionar una cuenta bancaria, con datos reflejados en el formulario antes de continuar, vuelva a intentar. </h4>' ;
    }



    
    pg_close($conexion);
}








?>