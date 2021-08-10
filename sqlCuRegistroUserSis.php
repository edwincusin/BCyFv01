<?php
require_once './conex.php';
$conexion=conectarBD();


if(isset($_POST['crear'])){   

    $cedula_per_crear=$_POST['txtcedula'];
    $apellido1_per_crear=$_POST['txtapellido1'];
    $apellido2_per_crear=$_POST['txtapellido2'];
    $nombre1_per_crear=$_POST['txtnombre1'];
    $nombre2_per_crear=$_POST['txtnombre2'];
    $fechanac_per_crear=$_POST['dtfechaNac'];
    $telefono_per_crear=$_POST['txttelefono'];
    $celular_per_crear=$_POST['txtcelular'];
    $email_per_crear=$_POST['txtemail'];
    $direcciondom_per_crear=$_POST['txtdireccion'];
    $nacionalidad_per_crear=$_POST['descripcionNacionalidad'];
    $estadocivil_per_crear=$_POST['descripcionEstadoCivil'];
    $sexo_per_crear=$_POST['descripcion-Sexo'];
    $intruccion_per_crear=$_POST['descripcionInstruccion'];
    $actividad_per_crear=$_POST['descripcionActividadLaboral'];
    $estadopersona_per_crear=$_POST['descripcionEstadoPersona'];
    $numRegPersona=0; 
    
    //para validar que exista un dato en la variable cedula ingresado por el usr
    if(empty($cedula_per_crear)){
    }else{
        $consulta="SELECT cedula_per FROM public.persona
        Where cedula_per='$cedula_per_crear'";
        $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla persona/ crear registro");
        $numRegPersona=pg_num_rows($resultado);

        //valido si existe un registro con el numero de cedula ingresado/ si existe no permite continuar / si no existe puede continuar para guardar
        if($numRegPersona=0){       
           //consulta insertar registro en la tabla persona
           $consulta="INSERT INTO public.persona(
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
                nacionalidad_per, 
                estadocivil, 
                sexo_per, 
                intruccion_per, 
                actividad_per, 
                estadopersona_per)
                VALUES (
                '$cedula_per_crear', 
                '$apellido1_per_crear', 
                '$apellido2_per_crear', 
                '$nombre1_per_crear', 
                '$nombre2_per_crear', 
                '$fechanac_per_crear', 
                '$telefono_per_crear', 
                '$celular_per_crear', 
                '$email_per_crear', 
                '$direcciondom_per_crear', 
                $nacionalidad_per_crear, 
                $estadocivil_per_crear, 
                $sexo_per_crear, 
                $intruccion_per_crear, 
                $actividad_per_crear,
                $estadopersona_per_crear
                );";

            $resultado=pg_query($conexion,$consulta) or die ("los datos no se guardaron en la tabla persona error");
            echo '<i style="color:green;font-size:20px;font-family:calibri ;"> Información Registrado con exito </i> ';
        } else{
           echo '<h4 style="color:red;font-size:20px;font-family:calibri ;"> El numero de cedula ya existe </h4>' ;

        }
    } 
}//if isset crear fin


if(isset($_POST['modificar'])){

    $cedula_per_crear=$_POST['txtcedula'];
    $apellido1_per_crear=$_POST['txtapellido1'];
    $apellido2_per_crear=$_POST['txtapellido2'];
    $nombre1_per_crear=$_POST['txtnombre1'];
    $nombre2_per_crear=$_POST['txtnombre2'];
    $fechanac_per_crear=$_POST['dtfechaNac'];
    $telefono_per_crear=$_POST['txttelefono'];
    $celular_per_crear=$_POST['txtcelular'];
    $email_per_crear=$_POST['txtemail'];
    $direcciondom_per_crear=$_POST['txtdireccion'];
    $nacionalidad_per_crear=$_POST['descripcionNacionalidad'];
    $estadocivil_per_crear=$_POST['descripcionEstadoCivil'];
    $sexo_per_crear=$_POST['descripcion-Sexo'];
    $intruccion_per_crear=$_POST['descripcionInstruccion'];
    $actividad_per_crear=$_POST['descripcionActividadLaboral'];
    $estadopersona_per_crear=$_POST['descripcionEstadoPersona'];
    $numRegPersona=0; 

    if($cedula_per_crear!="")
    {
        $consulta="UPDATE public.persona
        SET 
        cedula_per='$cedula_per_crear', 
        apellido1_per='$apellido1_per_crear',         
        apellido2_per='$apellido2_per_crear', 
        nombre1_per='$nombre1_per_crear', 
        nombre2_per='$nombre2_per_crear',  
        fechanac_per='$fechanac_per_crear',
        telefono_per='$telefono_per_crear', 
        celular_per='$celular_per_crear', 
        email_per='$email_per_crear', 
        direcciondom_per='$direcciondom_per_crear',
        nacionalidad_per=$nacionalidad_per_crear,
        estadocivil=$estadocivil_per_crear,  
        sexo_per=$sexo_per_crear, 
        intruccion_per= $intruccion_per_crear,
        actividad_per=$actividad_per_crear,
        estadopersona_per=$estadopersona_per_crear

        WHERE cedula_per='$cedula_per_crear';";

     $resultado=pg_query($conexion,$consulta) or die ("los datos no se pudieron modificar en la tabla persona error");

     echo '<h4 style="color:green;font-size:20px;font-family:calibri ;"> Información modificada exitosamente </h4>' ;
    
    }else{
           echo '<h4 style="color:red;font-size:20px;font-family:calibri ;"> El numero de cédula ya existe </h4>' ;
    }
}
pg_close($conexion);
?>