
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

    <h4> INFORMACIÓN DE LA CUENTA APERTURADA</h4> 		
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
		<br>
		<br>
		<table border="0" width="925"> 
			<tbody>
				 <tr>		<td style="width:20%;"></td>
                <td style="width:20%;">........................... <h3>Firma Banco</h3>    </td>
                <td style="width:20%;">...........................<h3>Firma Cliente</h3>    </td>                
   			</tr>
			</tbody>
		</table>

	</body>
</html>