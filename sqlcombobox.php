<?php
require_once './conex.php';
$conexion=conectarBD();

/*para llenar combox sexo*/
$consulta="SELECT * FROM public.sexo";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla sexo de la BBD" );
$resultadoSexo=$resultado;
$numregSexo=pg_num_rows($resultadoSexo);

/*para llenar combox cargo*/
$consulta="SELECT * FROM public.cargo";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla sexo de la BBD" );
$resultadoCargo=$resultado;
$numregCargo=pg_num_rows($resultadoCargo);

/*para llenar el combobox estado laboral */
$consulta="SELECT * FROM public.estadolaboral";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla sexo de la BBD" );
$resultadoEstadoLab=$resultado;
$numregEstadoLab=pg_num_rows($resultadoEstadoLab);

/*para llenar el combobox tipo de usuario */
$consulta="SELECT * FROM public.tipousuario";
$resultado=pg_query($conexion,$consulta) or die ("error al realizar la consulta en la tabla sexo de la BBD" );
$resultadoTipoUsuario=$resultado;
$numregTipoUsuario=pg_num_rows($resultadoTipoUsuario);

// pg_free_result($resultado);
pg_close($conexion);

?>
