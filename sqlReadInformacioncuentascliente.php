
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

if(isset($_POST['buscar_IAC'])){

    
    require_once './conex.php';
    $conexion=conectarBD();    

    $buscarDato=$_POST['txtbuscarDato'];

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
	descripcion_estper
	
	
	FROM public.persona, 
			public.nacionalidad, 
			public.estadocivil, 
			public.sexo, 
			public.intruccion, 
			public.actividad, 
			public.estadopersona
			
	WHERE cedula_per='$buscarDato'
	and	nacionalidad_per=codigo_nac
	and estadocivil=codigo_estciv
	and sexo_per=codigo_sex
	and intruccion_per=codigo_int
	and actividad_per=codigo_act
	and estadopersona_per=codigo_estper
	;";
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
 
    }
    pg_free_result($resultado);
    


    $consulta="SELECT 
    numerocuenta_cueban,
    fechaapertura_cueban,
    saldo_cueban,
    descripcion_tipcue,
    descripcion_estcue
    FROM                
        public.cuentabancaria,
        public.tipocuenta,
        public.estadocuenta
    WHERE
    persona_cueban='$buscarDato'
    and tipocuenta_cueban=codigo_tipcue
    and codigo_estcue=estado_cueban
  ;";
    $resultadoTabla=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas maestras y cuentabancaria y persona");
   // $la consultatabla se le abosrbe para ser impresa en form o la vista
    
    


    if($cedula_per!=''){
        echo '<h4 id ="msmcorreto" > Registro encontrado. </h4>' ;
    }else {
        echo '<h4 id ="errorSis" > Cédula no existe, vuelva a intentar. </h4>' ;    }


    pg_close($conexion);
}

?>






