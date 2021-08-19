
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
                                    <td><img src="./img/iconobcyf.png" WIDTH=100 HEIGHT=100 ></td> 
                                    <td style="color: #000077;font-size:200%;width:60%;" >   BANCO SIGA ADELANTE</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>  
                </tr>   
            </tbody>
        </table>
 
        <h4> COMPROBANTE TRANSFERENCIA</h4> 
				<br>
      <table border="0" width="800">
            <tbody>
              <tr>
                    <td style="width:20%;">Has transferido $: <h2><?php if (isset($_POST['monto_transf'])): ?><?= $_POST['monto_transf'] ?><?php endif; ?> </h2> </td>
						 </tr>		
					</tbody>
    </table>
				<br>
    <!--<h4> INFORMACIÓN CUENTA BANCARIA CLIENTE</h4> 		-->
		<table border="0" width="925"> 
			<tbody>
    		<tr><td style="width:13%;"></td><td style="width:29%;">De la cuenta: <h2><?php if (isset($_POST['cuentadebitar_transf'])): ?><?= $_POST['cuentadebitar_transf'] ?><?php endif; ?> </h2>   </td></tr>
        <tr><td style="width:13%;"></td><td style="width:29%;">A la cuenta: <h2><?php if (isset($_POST['cuentabeneficiaria_transf'])): ?><?= $_POST['cuentabeneficiaria_transf'] ?><?php endif; ?> </h2>   </td></tr>
        <tr><td style="width:13%;"></td><td style="width:35%;">Nombre Beneficiario: <h2><?php if (isset($_POST['nombrebeneficiario'])): ?><?= $_POST['nombrebeneficiario'] ?><?php endif; ?></h2>  </td></tr>
        <tr><td style="width:13%;"></td><td style="width:25%;">Email: <h2><?php if (isset($_POST['emailnotificar_transf'])): ?><?= $_POST['emailnotificar_transf'] ?><?php endif; ?></h2>    </td></tr>                 
				
			</tbody>
		</table>


    <!--<h4>INFORMACIÓN SOBRE RETIRO</h4> -->
    <table border="0" width="925">
            <tbody>      						
                <tr><td style="width:13%;"></td><td style="width:29%;">Fecha: <h2><?php if (isset($_POST['fechatransferencia_transf'])): ?><?= $_POST['fechatransferencia_transf'] ?><?php endif; ?></h2>    </td></tr>
                <tr><td style="width:13%;"></td><td style="width:25%;">Codigo comprobante: <h2><?php if (isset($_POST['codigo_transf'])): ?><?= $_POST['codigo_transf'] ?><?php endif; ?> </h2>    </td></tr>                 
					</tbody>
    </table>
		<table border="0" width="925">
            <tbody>      						
                <tr><td style="width:13%;"></td><td style="width:30%;">Descripcion: <h2><?php if (isset($_POST['descripcion_transf'])): ?><?= $_POST['descripcion_transf'] ?><?php endif; ?></h2>    </td></tr>
					</tbody>
    </table>
			<br><br><br>
			<div>		Gracias por utilizar nuestros servicios</div>
			<div>Atentamente.</div>
		<br>
		<b>Banco Siga Adelante </b>
	</body>
</html>