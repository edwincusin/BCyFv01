<?php
require_once './conex.php';
$conexion=conectarBD();


/*CONSULTA PARA LLENAR COMBOX NACIONALIDAD */
$consulta="select *from public.nacionalidad";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla nacionalidad");
$resultadoNacionalidad=$resultado;
$numRegNacionalidad=pg_num_rows($resultadoNacionalidad);


/* CONSULTA PARA LLENAR COMBOX ESTADO CIVIL*/
$consulta="SELECT *FROM public.estadocivil";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla EstadoCivil");
$resultadoEstadoCivil=$resultado;
$numRegEstadoCivil=pg_num_rows($resultadoEstadoCivil);


/* CONSULTA PARA LLENAR COMBOX NIVEL DE INSTRUCCION*/
$consulta="SELECT *FROM public.intruccion";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla Instruccion");
$resultadoInstruccion=$resultado;
$numRegInstruccion=pg_num_rows($resultadoInstruccion);


/* CONSULTA PARA LLENAR COMBOX  SEXO*/
$consulta="SELECT *FROM public.sexo";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla Sexo");
$resultadoSexo=$resultado;
$numRegSexo=pg_num_rows($resultadoSexo);

/* CONSULTA PARA LLENAR COMBOX ACTIVIDAD LABORAL*/
$consulta="SELECT *FROM public.actividad";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla Actividad");
$resultadoActividad=$resultado;
$numRegActividad=pg_num_rows($resultadoActividad);

/* CONSULTA PARA LLENAR COMBOX ESTADO PERSONA*/
$consulta="SELECT *FROM public.estadopersona";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla EstadoPersona");
$resultadoEstadoPersona=$resultado;
$numRegEstadoPersona=pg_num_rows($resultadoEstadoPersona);



pg_close($conexion);
// pg_free_result($resultado);

?>
