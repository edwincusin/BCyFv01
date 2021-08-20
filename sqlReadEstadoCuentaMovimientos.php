<?php

$cedula_per=''; 
$apellido1_per=''; 
$apellido2_per=''; 
$nombre1_per=''; 
$nombre2_per=''; 
$fechanac_per=''; 
$telefono_per=''; 
$celular_per=''; 
$email_per=''; 

$direcciondom_per=''; 
$descripcion_nac='';
$descripcion_estciv='';
$descripcion_sex='';
$descripcion_int='';
$descripcion_act='';
$descripcion_estper='';

$numerocuenta_cueban='';
$saldo_cueban='';
$fechaapertura_cueban='';
$descripcion_tipcue='';
$descripcion_estcue='';

if(isset($_POST['buscar_EDC'])){

    
    require_once './conex.php';
    $conexion=conectarBD();    
    $txtbuscarDato=$_POST['txtbuscarDato'];

    $consulta="SELECT 
	cedula_per, 
    apellido1_per, 
    apellido2_per, 
    nombre1_per, 
    nombre2_per, 
    fechanac_per, 
    telefono_per, 
    celular_per, 
    email_per, 
	
    direcciondom_per, 
    descripcion_nac,
    descripcion_estciv,
	descripcion_sex,
	descripcion_int,
	descripcion_act,
	descripcion_estper,
	
	numerocuenta_cueban,
    fechaapertura_cueban,
	saldo_cueban,
	descripcion_tipcue,
	descripcion_estcue
	
	FROM public.persona, 
			public.nacionalidad, 
			public.estadocivil, 
			public.sexo, 
			public.intruccion, 
			public.actividad, 
			public.estadopersona,
			public.cuentabancaria,
			public.tipocuenta,
			public.estadocuenta
			
	WHERE numerocuenta_cueban='$txtbuscarDato'
	and cedula_per=persona_cueban
	and	nacionalidad_per=codigo_nac
	and estadocivil=codigo_estciv
	and sexo_per=codigo_sex
	and intruccion_per=codigo_int
	and actividad_per=codigo_act
	and estadopersona_per=codigo_estper
	and tipocuenta_cueban=codigo_tipcue
	and codigo_estcue=estado_cueban;";
    $resultado=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas maestras y cuentabancaria y persona");
    while($row=pg_fetch_array($resultado)){
            $cedula_per=$row['cedula_per']; 
            $apellido1_per=$row['apellido1_per']; 
            $apellido2_per=$row['apellido2_per']; 
            $nombre1_per=$row['nombre1_per']; 
            $nombre2_per=$row['nombre2_per']; 
            $fechanac_per=$row['fechanac_per']; 
            $telefono_per=$row['telefono_per']; 
            $celular_per=$row['celular_per']; 
            $email_per=$row['email_per'];    
     
            $direcciondom_per=$row['direcciondom_per']; 
            $descripcion_nac=$row['descripcion_nac'];
            $descripcion_estciv=$row['descripcion_estciv'];
            $descripcion_sex=$row['descripcion_sex'];
            $descripcion_int=$row['descripcion_int'];
            $descripcion_act=$row['descripcion_act'];
            $descripcion_estper=$row['descripcion_estper'];

            $numerocuenta_cueban=$row['numerocuenta_cueban'];
            $fechaapertura_cueban=$row['fechaapertura_cueban'];
            $saldo_cueban=$row['saldo_cueban'];
            $descripcion_tipcue=$row['descripcion_tipcue'];
            $descripcion_estcue=$row['descripcion_estcue'];      
    }
//consultar movimientos de trasferencias realizados

        $codigo_transf='';
        $fechatransferencia_transf='';
        $cuentabeneficiaria_transf=''; 
       $nombres =''; 
       $monto_transf=''; 
       $descripcion_transf=''; 
       $saldomonto_transf='';
        

    $consulta="SELECT 
        codigo_transf,
        fechatransferencia_transf,
        cuentabeneficiaria_transf, 
        (apellido1_per || ' ' || nombre1_per) AS nombres , 
        monto_transf, 
        descripcion_transf, 
        saldomonto_transf
        
        FROM public.trantransferencia, persona, cuentabancaria
        WHERE cuentadebitar_transf='$txtbuscarDato'
        and cuentabeneficiaria_transf=numerocuenta_cueban
        and persona_cueban=cedula_per
        ORDER BY fechatransferencia_transf ASC
        ;";
        $resultsalidatrans=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas transferencias");


    $consulta="SELECT 
        codigo_transf,
        fechatransferencia_transf,
        cuentadebitar_transf, 
        (apellido1_per || ' ' || nombre1_per) AS nombres , 
        monto_transf, 
        descripcion_transf, 
        saldomonto_transf
        
        FROM public.trantransferencia, persona, cuentabancaria
        WHERE cuentabeneficiaria_transf='$txtbuscarDato'
        and cuentadebitar_transf=numerocuenta_cueban
        and persona_cueban=cedula_per
        ORDER BY fechatransferencia_transf ASC
        ;";
        $resultentradatrans=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas transferencias");

        $codigo_trandep='';
        $fechadeposito_trandep='';
        $nombredep_trandep=''; 
        $monto_trandep=''; 
        $saldomonto_trandep='';
        $numerocheque_trandep=''; 
        $descripcion_tipdep='';


        //sql deposito
        $consulta="SELECT 
        codigo_trandep,
        fechadeposito_trandep,
        nombredep_trandep, 
        monto_trandep, 
        saldomonto_trandep,
        numerocheque_trandep, 
        descripcion_tipdep
        FROM public.trandeposito, cuentabancaria, tipodeposito
        WHERE cuentabancaria_trandep='$txtbuscarDato'
        and cuentabancaria_trandep=numerocuenta_cueban
        and tipodeposito_trandep=codigo_tipdep
        ORDER BY fechadeposito_trandep ASC
        ;";
        $resultdeposito=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas transferencias");


        $codigo_tranret='';
        $fecha_tranret=''; 
        $monto_tranret=''; 
        $saldomonto_tranret=''; 
        $numerocheque_tranret=''; 
        $nombreret_tranret=''; 
        $descripcion_tipret='';
        //sql retiro
        $consulta="SELECT 
        codigo_tranret,
        fecha_tranret, 
        monto_tranret, 
        saldomonto_tranret, 
        numerocheque_tranret, 
        nombreret_tranret, 
        descripcion_tipret
        FROM public.tranretiro, cuentabancaria, tiporetiro
         WHERE cuentabancaria_tranret=1
        and cuentabancaria_tranret=numerocuenta_cueban
        and tiporetiro_tranret=codigo_tipret
        ORDER BY fecha_tranret ASC
        ;";
        $resultretiro=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas transferencias");























    if($cedula_per!=''){
        echo '<h4 id ="msmcorreto" > Registro encontrado. </h4>' ;
    }else {
        echo '<h4 id ="errorSis" > Cédula no existe, vuelva a intentar. </h4>' ;    }


    pg_free_result($resultado);
    pg_close($conexion);
}

?>