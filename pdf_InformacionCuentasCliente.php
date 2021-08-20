
<html>
    <head>   
        <meta charset="UTF-8">
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

    <h4> INFORMACIÓN DE CUENTAS BANCARIAS</h4> 		
		<table border="0" width="925"> 
	    		<thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha Apertura</th>
                    <th>Número Cuenta</th>
                    <th>Tipo</th>
                    <th>Estado</th>
										<th>Saldo  $USD</th>
                </tr>
					</thead>
				<tbody>
					
                                            <?php 
require_once './conex.php';
    $conexion=conectarBD(); 
		if($_POST['txtcedula']===""){$buscarDato=" ";}else{$buscarDato=$_POST['txtcedula'];}
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
    $resultadoTabla=pg_query($conexion,$consulta);
                                            $cont=1;
                                            while($row=pg_fetch_array($resultadoTabla)){
    
                                                $numerocuenta_cueban=$row['numerocuenta_cueban'];
                                                $fechaapertura_cueban=$row['fechaapertura_cueban'];
                                                $saldo_cueban=$row['saldo_cueban'];
                                                $descripcion_tipcue=$row['descripcion_tipcue'];
                                                $descripcion_estcue=$row['descripcion_estcue'];     
                                            ?>
                                                <tr>
                                                    <td style="width:4%;"><?php echo $cont ?></td>
                                                    <td style="width:15%;"><?php echo $fechaapertura_cueban ?></td>
                                                    <td style="width:15%;"><?php echo $numerocuenta_cueban ?></td>
                                                    <td style="width:15%;"><?php echo $descripcion_tipcue ?></td>
                                                    <td style="width:15%;"><?php echo $descripcion_estcue ?></td>
                                                    <td style="width:8%;"><?php echo $saldo_cueban ?></td>
                                                </tr>
                                            <?php
                                            $cont++;
                                            }//                                             
                                            pg_free_result($resultadoTabla); 
                                            ?>
                                        </tbody>						
        </table>

    </body>
</html>