
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
        <br>


        <h4> INFORMACIÓN DATOS CLIENTE TITULAR</h4>
      <table border="0" width="800">
            <tbody>
                <tr>
                    <td style="width:20%;">Cedula: <h2><?php if (isset($_POST['txtcedulatranret'])): ?><?= $_POST['txtcedulatranret'] ?><?php endif; ?> </h2> </td>
                    <td style="width:29%;">Apellido Paterno: <h2><?php if (isset($_POST['txtapellido1'])): ?><?= $_POST['txtapellido1'] ?><?php endif; ?> </h2>   </td>
                    <td style="width:29%;"> Apellido Materno: <h2><?php if (isset($_POST['txtapellido2'])): ?><?= $_POST['txtapellido2'] ?><?php endif; ?> </h2>   </td>
                </tr>
                <tr>
                    <td style="width:35%;">Primer nombre: <h2><?php if (isset($_POST['txtnombre1'])): ?><?= $_POST['txtnombre1'] ?><?php endif; ?></h2>  </td>
                    <td style="width:25%;">Segundo Nombre: <h2><?php if (isset($_POST['txtnombre2'])): ?><?= $_POST['txtnombre2'] ?><?php endif; ?></h2>    </td>
                    <td style="width:25%;">Email: <h2><?php if (isset($_POST['txtemail'])): ?><?= $_POST['txtemail'] ?><?php endif; ?></h2>   </td>
            </tr>
            <tr>
                <td style="width:30%;">Número celular: <h2><?php if (isset($_POST['txtcelular'])): ?><?= $_POST['txtcelular'] ?><?php endif; ?></h2>    </td>
                <td style="width:25%;"> Número telefono: <h2><?php if (isset($_POST['txttelefono'])): ?><?= $_POST['txttelefono'] ?><?php endif; ?> </h2>    </td>
                <td style="width:25%;">Estado Operativo: <h2><?php if (isset($_POST['txtestadopersona_AC'])): ?><?= $_POST['txtestadopersona_AC'] ?><?php endif; ?> </h2>  </td>								
            </tr>
					</tbody>
    </table>

    <h4> INFORMACIÓN CUENTA BANCARIA CLIENTE</h4> 		
		<table border="0" width="925"> 
			<tbody>
    		<tr>
                <td style="width:30%;">Estado Cuenta: <h2><?php if (isset($_POST['desEstadoCuenta_AC'])): ?><?= $_POST['desEstadoCuenta_AC'] ?><?php endif; ?></h2>    </td>
                <td style="width:25%;"> Tipo Cuenta: <h2><?php if (isset($_POST['desTipoCuenta_AC'])): ?><?= $_POST['desTipoCuenta_AC'] ?><?php endif; ?> </h2>    </td>
                <td style="width:25%;">Número Cuenta: <h2><?php if (isset($_POST['txtCCC'])): ?><?= $_POST['txtCCC'] ?><?php endif; ?> </h2>  </td>						
   			</tr>
			</tbody>
		</table>


    <h4>INFORMACIÓN SOBRE RETIRO</h4> 
    <table border="0" width="875">
            <tbody>
              <tr>
                    <td style="width:20%;">N° Retiro: <h2><?php if (isset($_POST['numRetiro'])): ?><?= $_POST['numRetiro'] ?><?php endif; ?> </h2> </td>
              </tr>
              <tr>
                    <td style="width:32%;">Fecha de retiro: <h2><?php if (isset($_POST['dtfechaAper_AC'])): ?><?= $_POST['dtfechaAper_AC'] ?><?php endif; ?></h2>  </td>
                    <td style="width:27%;">Tipo Retiro: <h2><?php if (isset($_POST['descripcionTipoRetiro'])) { if($_POST['descripcionTipoRetiro']==="1") {echo "EFECTIVO";} if($_POST['descripcionTipoRetiro']==="2") {echo "CHEQUE";} } ?></h2>    </td>
                    <td style="width:25%;">N° Cheque: <h2><?php if (isset($_POST['txtcheque'])): ?><?= $_POST['txtcheque'] ?><?php endif; ?></h2>   </td>
              </tr>
              <tr>
                <td style="width:32%;">Nombre y Apellido: <h2><?php if (isset($_POST['txtanomape'])): ?><?= $_POST['txtanomape'] ?><?php endif; ?></h2>    </td>
                <td style="width:27%;"> N° Cédula: <h2><?php if (isset($_POST['txtcedularet'])): ?><?= $_POST['txtcedularet'] ?><?php endif; ?> </h2>    </td>
                <td style="width:25%;">Valor a retirar $USD:<h2><?php if (isset($_POST['txtvalor'])): ?><?= $_POST['txtvalor'] ?><?php endif; ?> </h2>  </td>								
             </tr>
					</tbody>
    </table>


	</body>
</html>