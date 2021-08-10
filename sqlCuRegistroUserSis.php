<?php
require_once './conex.php';
$conexion=conectarBD();





if(isset($_POST['crear'])){   
$cedula_per_crear=$_POST['txtcedula'];
    // $apellido1_per_crear=$_POST[''];
    // $apellido2_per_crear=$_POST[''];
    // $nombre1_per_crear=$_POST[''];
    // $nombre2_per_crear=$_POST[''];
    // $fechanac_per_crear=$_POST[''];
    // $telefono_per_crear=$_POST[''];
    // $celular_per_crear=$_POST[''];
    // $email_per_crear=$_POST[''];
    // $direcciondom_per_crear=$_POST[''];
    // $nacionalidad_per_crear=$_POST[''];
    // $estadocivil_per_crear=$_POST[''];
    // $sexo_per_crear=$_POST[''];
    // $intruccion_per_crear=$_POST[''];
    // $actividad_per_crear=$_POST[''];
    // $estadopersona_per_crear=$_POST[''];
    $numRegPersona=0; 

    //para validar que exista un dato en la variable cedula ingresado por el usr
    if(empty($cedula_per_crear)){
        echo '<i style="color:red;font-size:20px;font-family:calibri ;">  Campo para cédula sin dato </i> ';
    }else{
        $consulta="SELECT cedula_per FROM public.persona
        Where cedula_per='$cedula_per_crear'";
        $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla persona/ crear registro");
        $numRegPersona=pg_num_rows($resultado);

        if($numRegPersona>0){
            echo "ya existe este registro cedula";
        } else{
            echo "puede continuar";
        }
    }


    //consulta insertar registro en la tabla persona

  
    // if ($cedula_per=="") {

    //   echo '<i style="color:red;font-size:20px;font-family:calibri ;"> Resgistro no encontrado</i> ';
    //  }
    

}//if isset crear fin



pg_close($conexion);
?>
