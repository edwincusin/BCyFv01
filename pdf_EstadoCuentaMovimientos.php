


<html>
    <head>   
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos.css">
        <style type="text/css">
            h2{
                /*text-align: center;*/
                margin: 0px;
                color :#419CDF ;
                font-size: 14px;
            }
						h3{
                /*text-align: center;*/
                margin: 0px;
                color : #A0ACAC ;
                font-size: 14px;
            }
        </style>
        <title></title>
    </head>

    <body>
        <table  style="border-collapse: collapse;" border="1" width="800" >
            <tbody>
                <tr>
                    <td align="center">

                        <table style="border-collapse: collapse;" border="1" width="1060">
                            <tbody>
                                <tr>
                                    <td><img src="./img/01bcyftomate.jpeg" WIDTH=100 HEIGHT=100 ></td> 
                                    <td style="color: #000077;font-size:200%;width:60%;" >   BANCO SIGA ADELANTE</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>  
                </tr>   
            </tbody>
        </table>
        <br>


        <h4> INFORMACIÓN  CLIENTE </h4>
      <table border="0" width="800">
            <tbody>
             <tr>
                <td style="width:20%;">N° Cédula:<h2><?php if (isset($_POST['txtcedula'])): ?><?= $_POST['txtcedula'] ?><?php endif; ?> </h2> </td>
                <td style="width:20%;">Apellido y Nombres:<h2><?php if (isset($_POST['txtnombres'])): ?><?= $_POST['txtnombres'] ?><?php endif; ?> </h2> </td>
				<td style="width:20%;">Fecha Nacimiento:<h2><?php if (isset($_POST['fechanac'])): ?><?= $_POST['fechanac'] ?><?php endif; ?> </h2> </td>
           </tr>
            <tr>
                <td style="width:35%;">Email @: <h2><?php if (isset($_POST['txtemail_D'])): ?><?= $_POST['txtemail_D'] ?><?php endif; ?></h2>  </td>
                <td style="width:25%;">Número celular: <h2><?php if (isset($_POST['txtcelular'])): ?><?= $_POST['txtcelular'] ?><?php endif; ?></h2>    </td>
                <td style="width:25%;">Número teléfono:	 <h2><?php if (isset($_POST['txttelefono'])): ?><?= $_POST['txttelefono'] ?><?php endif; ?></h2>   </td>
            </tr>
            <tr>
                <td style="width:30%;">Nacionalidad:	 <h2><?php if (isset($_POST['nacionalidad'])): ?><?= $_POST['nacionalidad'] ?><?php endif; ?></h2>    </td>
                <td style="width:25%;">Est. civil: <h2><?php if (isset($_POST['estcivil'])): ?><?= $_POST['estcivil'] ?><?php endif; ?> </h2>    </td>
                <td style="width:25%;">Sexo: <h2><?php if (isset($_POST['sexo'])): ?><?= $_POST['sexo'] ?><?php endif; ?> </h2>  </td>								
            </tr>
						 <tr>
                <td style="width:30%;">Instruccion: <h2><?php if (isset($_POST['instruccion'])): ?><?= $_POST['instruccion'] ?><?php endif; ?></h2>    </td>
                <td style="width:25%;">Actividad laboral: <h2><?php if (isset($_POST['actividadlaboral'])): ?><?= $_POST['actividadlaboral'] ?><?php endif; ?> </h2>    </td>
                <td style="width:25%;">Estado operativo:<h2><?php if (isset($_POST['estadooperativo'])): ?><?= $_POST['estadooperativo'] ?><?php endif; ?> </h2>  </td>								
            </tr>					 
					</tbody>
    </table>
		<table border="0" width="800">
            <tbody>         
						 <tr>
                <td style="width:100%;">Dirección domicilio: <h2><?php if (isset($_POST['direcciondomiciliaria'])): ?><?= $_POST['direcciondomiciliaria'] ?><?php endif; ?></h2>    </td>
             </tr>
					</tbody>
    </table>


    <h4> INFORMACIÓN DE LA CUENTA</h4> 		
		<table border="0" width="925"> 
			<tbody>
    		<tr>
                <td style="width:20%;">Número de cuenta:	 <h2><?php if (isset($_POST['txtCCC_D'])): ?><?= $_POST['txtCCC_D'] ?><?php endif; ?></h2>    </td>               
   			</tr>
				 <tr>
                <td style="width:20%;">Fecha apertura: <h2><?php if (isset($_POST['fecchaaperura'])): ?><?= $_POST['fecchaaperura'] ?><?php endif; ?></h2>    </td>
                <td style="width:20%;">Tipo de cuenta:	 <h2><?php if (isset($_POST['desTipoCuenta_AC'])): ?><?= $_POST['desTipoCuenta_AC'] ?><?php endif; ?> </h2>    </td>
                <td style="width:20%;">Estado de cuenta:	 <h2><?php if (isset($_POST['estadocuenta'])): ?><?= $_POST['estadocuenta'] ?><?php endif; ?> </h2>  </td>
								<td style="width:20%;">Saldo USD:	 <h2><?php if (isset($_POST['txtsaldodisponible_D'])): ?><?= $_POST['txtsaldodisponible_D'] ?><?php endif; ?> </h2>  </td>						
   			</tr>
			</tbody>
		</table>
		<br>
		<br>

    <h4> INFORMACIÓN DE MOVIMIENTOS</h4> 	
<!--1  TRANSFERECIAS SALIENTES  -->

    <table class="tableimp" border="1" style="margin:auto; text-align: center"> 
               <thead >
                    <tr>
                    <th colspan="7"><b> TRANSFERENCIAS SALIENTES</b></th>
                    </tr>
                    <tr>
                        <th>N°</th>                                    
                        <th>N° Trans</th> 
                        <th>Fecha</th>
                        <th>Cuenta Benef.</th>
                        <th>Nombre Benef. </th>                                              
                        <th>Concepto </th>
                        <th>Valor $</th>  
                        <!-- <th>Seg. Saldo</th> -->
                        </tr>
                </thead>
				<tbody>
					
                                            <?php 
    require_once'./conex.php'; 

    $conexion=conectarBD(); 

    $txtbuscarDato=$_POST['txtCCC_D'];

if($_POST['txtCCC_D']===""){$txtbuscarDato=0;}else{$txtbuscarDato=$_POST['txtCCC_D'];}

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

    $cont=1;
    while($row=pg_fetch_array($resultsalidatrans)){

        $codigo_transf=$row['codigo_transf'];
        $fechatransferencia_transf=$row['fechatransferencia_transf'];
        $cuentabeneficiaria_transf=$row['cuentabeneficiaria_transf']; 
        $nombres =$row['nombres']; 
        $monto_transf=$row['monto_transf']; 
        $descripcion_transf=$row['descripcion_transf']; 
        $saldomonto_transf=$row['saldomonto_transf'];   
    ?>
        <tr>
            <td><?php echo $cont ?></td>
            <td><?php echo $codigo_transf ?></td>
            <td><?php echo $fechatransferencia_transf ?></td>
            <td><?php echo $cuentabeneficiaria_transf ?></td>
            <td><?php echo $nombres ?></td>
            <td><?php echo $descripcion_transf ?></td>
            <td><?php echo $monto_transf ?></td>
            <!-- <td><?php //echo $saldomonto_transf ?></td> -->
        </tr>
    <?php
    $cont++;
    }//                                             
    pg_free_result($resultsalidatrans); 
    ?>
</tbody>						
</table>




<br><br>









        
<!--2  TRANSFERECIAS SALIENTES  -->



<table class="tableimp" border="1" style="margin:auto; text-align: center"> 
 <thead >
                                            <tr>
                                            <th colspan="7"><b> TRANSFERENCIAS ENTRANTES</b></th>
                                            </tr>
                                            <tr>
                                                <th>N°</th>                                    
                                                <th>N° Trans</th> 
                                                <th>Fecha</th>
                                                <th>Cuenta Tranf.</th>
                                                <th>Nombre Tranf. </th>                                               
                                                <th>Concepto </th>
                                                <th>Valor $</th> 
                                                <!-- <th>Seg. Saldo</th> -->
                                                </tr>
                                        </thead>
				<tbody>
					
                                            <?php 
    //require './conex.php'; 

    $conexion=conectarBD(); 

    $txtbuscarDato=$_POST['txtCCC_D'];

    if($_POST['txtCCC_D']===""){$txtbuscarDato=0;}else{$txtbuscarDato=$_POST['txtCCC_D'];}

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

    while($row=pg_fetch_array($resultentradatrans)){
    
        $codigo_transf=$row['codigo_transf'];
        $fechatransferencia_transf=$row['fechatransferencia_transf'];
        $cuentabeneficiaria_transf=$row['cuentadebitar_transf']; 
        $nombres =$row['nombres']; 
        $monto_transf=$row['monto_transf']; 
        $descripcion_transf=$row['descripcion_transf']; 
        $saldomonto_transf=$row['saldomonto_transf'];   
    ?>
        <tr>
            <td><?php echo $cont ?></td>
            <td><?php echo $codigo_transf ?></td>
            <td><?php echo $fechatransferencia_transf ?></td>
            <td><?php echo $cuentabeneficiaria_transf ?></td>
            <td><?php echo $nombres ?></td>
            <td><?php echo $descripcion_transf ?></td>
            <td><?php echo $monto_transf ?></td>
            <!-- <td><?php// echo $saldomonto_transf ?></td> -->
        </tr>
    <?php
    $cont++;
    }//                                             
    pg_free_result($resultentradatrans);  
    ?>
</tbody>						
</table>





<br><br>



<!--2  depositos   -->




<table class="tableimp" border="1" style="margin:auto; text-align: center"> 
<thead >
                                            <tr>
                                            <th colspan="7"><b>  DEPOSITOS</b></th>
                                            </tr>
                                            <tr>
                                                <th>N°</th>                                    
                                                <th>N° Dep.</th> 
                                                <th>Fecha</th>
                                                <th>Depositante.</th>
                                                <th>Tipo Dep. </th>                                             
                                                <th>Ref. Cheque</th>
                                                <th>Valor $</th>   
                                                <!-- <th>Seg. Saldo</th> -->
                                                </tr>
                                        </thead>
				<tbody>
					
                                            <?php 
    //require './conex.php'; 

    $conexion=conectarBD(); 

    $txtbuscarDato=$_POST['txtCCC_D'];

    if($_POST['txtCCC_D']===""){$txtbuscarDato=0;}else{$txtbuscarDato=$_POST['txtCCC_D'];}

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

    while($row=pg_fetch_array($resultdeposito)){
    
        $codigo_trandep=$row['codigo_trandep'];
        $fechadeposito_trandep=$row['fechadeposito_trandep'];
        $nombredep_trandep=$row['nombredep_trandep']; 
        $monto_trandep=$row['monto_trandep']; 
        $saldomonto_trandep=$row['saldomonto_trandep'];
        $numerocheque_trandep=$row['numerocheque_trandep']; 
        $descripcion_tipdep=$row['descripcion_tipdep'];
    ?>
        <tr>
            <td><?php echo $cont ?></td>
            <td><?php echo $codigo_trandep ?></td>
            <td><?php echo $fechadeposito_trandep ?></td>
            <td><?php echo $nombredep_trandep ?></td>
            <td><?php echo $descripcion_tipdep ?></td>
            <td><?php echo $numerocheque_trandep ?></td>                                                    
            <td><?php echo $monto_trandep ?></td>
            <!-- <td><?php //echo $saldomonto_trandep ?></td> -->
        </tr>
    <?php
    $cont++;
    }//                                             
    pg_free_result($resultdeposito); 
    ?>
</tbody>						
</table>







<br><br>








<!--2  RETIROS   -->




<table class="tableimp" border="1" style="margin:auto; text-align: center"> 
<thead >
                                            <tr>
                                            <th colspan="7"><b> RETIROS</b></th>
                                            </tr>
                                            <tr>
                                                <th>N°</th>                                    
                                                <th>N° Ret.</th> 
                                                <th>Fecha</th>
                                                <th>Per. Retira</th>
                                                <th>Tipo Ret. </th>                                             
                                                <th>Ref. Cheque</th>
                                                <th>Valor $</th>   
                                                <!-- <th>Seg. Saldo</th> -->
                                                </tr>
                                        </thead>
				<tbody>
					
                                            <?php 
    //require './conex.php'; 

    $conexion=conectarBD(); 

    $txtbuscarDato=$_POST['txtCCC_D'];

    if($_POST['txtCCC_D']===""){$txtbuscarDato=0;}else{$txtbuscarDato=$_POST['txtCCC_D'];}
    $consulta="SELECT 
    codigo_tranret,
    fecha_tranret, 
    monto_tranret, 
    saldomonto_tranret, 
    numerocheque_tranret, 
    nombreret_tranret, 
    descripcion_tipret
    FROM public.tranretiro, cuentabancaria, tiporetiro
     WHERE cuentabancaria_tranret='$txtbuscarDato'
    and cuentabancaria_tranret=numerocuenta_cueban
    and tiporetiro_tranret=codigo_tipret
    ORDER BY fecha_tranret ASC
    ;";
    $resultretiro=pg_query($conexion,$consulta) or die ("error al realizar multiple consulta en las tablas transferencias");

    while($row=pg_fetch_array($resultretiro)){
    
        $codigo_tranret=$row['codigo_tranret'];
        $fecha_tranret=$row['fecha_tranret']; 
        $monto_tranret=$row['monto_tranret']; 
        $saldomonto_tranret=$row['saldomonto_tranret']; 
        $numerocheque_tranret=$row['numerocheque_tranret']; 
        $nombreret_tranret=$row['nombreret_tranret']; 
        $descripcion_tipret=$row['descripcion_tipret'];
    ?>
        <tr>
            <td><?php echo $cont ?></td>
            <td><?php echo $codigo_tranret ?></td>
            <td><?php echo $fecha_tranret ?></td>
            <td><?php echo $nombreret_tranret ?></td>
            <td><?php echo $descripcion_tipret ?></td>
            <td><?php echo $numerocheque_tranret ?></td>                                                    
            <td><?php echo $monto_tranret ?></td>
            <!-- <td><?php// echo $saldomonto_tranret ?></td> -->
        </tr>
    <?php
    $cont++;
    }                                            
    pg_free_result($resultretiro); 
    ?>
</tbody>						
</table>




















<?php 
pg_close($conexion);

?>
    </body>
</html>