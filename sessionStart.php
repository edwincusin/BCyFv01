<?php
    session_start();
    // error_reporting(0);     
    // agregar al final una vez se haya terminado el sistema con toda la funcionalidad al 100%, para que no reporte errores que no efectan al sistema
    $varsession=$_SESSION['nameuser'];
    if($varsession==null || $varsession==" "){
        echo'<script type="text/javascript">
                alert("Usuario sin identificarse, Ud. no tiene autorizacion para navegar en el aplicativo SICCOPES, soria a la camara");
                window.location.href="index.php";            
                </script>';
             die();
    }
?>
