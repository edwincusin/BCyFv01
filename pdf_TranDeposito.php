
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
 
        <h4> COMPROBANTE DEPOSITO</h4> 
				<br>
      <table border="0" width="800">
            <tbody>
              <tr>
                    <td style="width:20%;">Valor Deposito $: <h2><?php if (isset($_POST['monto_trandep'])): ?><?= $_POST['monto_trandep'] ?><?php endif; ?> </h2> </td>
						 </tr>		
					</tbody>
    </table>
				<br>
    <!--<h4> INFORMACIÓN CUENTA BANCARIA CLIENTE</h4> 		-->
		<table border="0" width="925"> 
			<tbody>
    		<tr><td style="width:13%;"></td><td style="width:29%;">N° Cuenta: <h2><?php if (isset($_POST['numerocuenta_cueban'])): ?><?= $_POST['numerocuenta_cueban'] ?><?php endif; ?> </h2>   </td></tr>
        <tr><td style="width:13%;"></td><td style="width:29%;">Nombre Beneficiario: <h2><?php if (isset($_POST['nombrebeneficiario'])): ?><?= $_POST['nombrebeneficiario'] ?><?php endif; ?> </h2>   </td></tr>
        <tr><td style="width:13%;"></td><td style="width:35%;">Tipo Deposito: <h2><?php if (isset($_POST['tipodeposito_trandep'])): ?><?= $_POST['tipodeposito_trandep'] ?><?php endif; ?></h2>  </td></tr>
        <tr><td style="width:13%;"></td><td style="width:25%;">N° Cheque: <h2><?php if (isset($_POST['numerocheque_trandep'])): ?><?= $_POST['numerocheque_trandep'] ?><?php endif; ?></h2>    </td></tr>                 
				<tr><td style="width:13%;"></td><td style="width:25%;">Fecha: <h2><?php if (isset($_POST['fechadeposito_trandep'])): ?><?= $_POST['fechadeposito_trandep'] ?><?php endif; ?></h2>    </td></tr> 
			</tbody>
		</table>


    <!--<h4>INFORMACIÓN SOBRE RETIRO</h4> -->
    <table border="0" width="925">
            <tbody>      						
                <tr><td style="width:13%;"></td><td style="width:29%;">Nombre Depositante: <h2><?php if (isset($_POST['nombredep_trandep'])): ?><?= $_POST['nombredep_trandep'] ?><?php endif; ?></h2>    </td></tr>
                <tr><td style="width:13%;"></td><td style="width:25%;">Cedula Depositante: <h2><?php if (isset($_POST['ceduladep_trandep'])): ?><?= $_POST['ceduladep_trandep'] ?><?php endif; ?> </h2>    </td></tr>  
							  <tr><td style="width:13%;"></td><td style="width:25%;">Banco de Procedencia: <h2><?php if (isset($_POST['descripcion_banloc'])): ?><?= $_POST['descripcion_banloc'] ?><?php endif; ?> </h2>    </td></tr>               
								<tr><td style="width:13%;"></td><td style="width:25%;">codigo Deposito: <h2><?php if (isset($_POST['codigo_trandep'])): ?><?= $_POST['codigo_trandep'] ?><?php endif; ?> </h2>    </td></tr>
					</tbody>
								</table>
			<br><br><br>
			<div>		Gracias por utilizar nuestros servicios</div>
			<div>Atentamente.</div>
		<br>
		<b>Banco Siga Adelante </b>
	</body>
</html>