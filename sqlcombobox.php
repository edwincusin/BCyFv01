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

/* CONSULTA PARA LLENAR COMBOX ESTADO CUENTA // PASIVO O ACTIVO*/
$consulta="SELECT *FROM public.estadocuenta";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla EstadoCuenta");
$resultadoEstadoCuenta=$resultado;
$numRegEstadoCuenta=pg_num_rows($resultadoEstadoCuenta);

/* CONSULTA PARA LLENAR COMBOX TIPO CUENTA // AHORROS - CORRIENTE*/
$consulta="SELECT *FROM public.tipocuenta";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla TipoCuenta");
$resultadoTipoCuenta=$resultado;
$numRegTipoCuenta=pg_num_rows($resultadoTipoCuenta);

<<<<<<< HEAD
/* CONSULTA PARA LLENAR COMBOX TIPO DEPOSITO*/
$consulta="SELECT *FROM public.tipodeposito";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla TipoCuenta");
$resultadoTipoDeposito=$resultado;
$numRegTipoDeposito=pg_num_rows($resultadoTipoDeposito);



/* CONSULTA PARA LLENAR COMBOX BANCO DESTINO */
$consulta="SELECT *FROM public.bancoslocales";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla TipoDeposito");
$resultadoBancosLocales=$resultado;
$numRegBancos=pg_num_rows($resultadoBancosLocales);
=======
/* CONSULTA PARA LLENAR COMBOX TIPO DE DEPOSITO // EFECTIVO O CHEQUE*/
// $consulta="SELECT *FROM public.tipocuenta";
// $resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla TipoCuenta");
// $resultadoTipoCuenta=$resultado;
// $numRegTipoCuenta=pg_num_rows($resultadoTipoCuenta);

/* CONSULTA PARA LLENAR COMBOX TIPO DE RETIRO // EFECTIVO O CAMBIAR CHEQUE*/
$consulta="SELECT *FROM public.tiporetiro";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla tiporetiro");
$resultadoTipoRetiro=$resultado;
$numRegTipoRetiro=pg_num_rows($resultadoTipoRetiro);
>>>>>>> d44afaa9b365835bc6e92b410b51bece510af8cc



//pg_free_result($resultado);
pg_close($conexion);

?>
