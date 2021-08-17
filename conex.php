<?php
function conectarBD(){
    /*variables para la conexion*/
    $host="host=localhost";
    $dbname="dbname=banco_sa"; 
    $port="port=5432"; 
    $user="user=postgres"; 
    $password="password=admin";

    $bd = pg_connect("$host $port $dbname $user $password");
    if(!$bd){
        echo "Error: ".pg_last_error; /*si no se conecta ejecutara un error */
    }else{
       // echo "Conexion exitosa"; /*si la coneccion se realiza ejecuta un mensaje positiva */
        return $bd;
    }
}

?>