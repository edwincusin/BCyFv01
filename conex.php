<?php
function conectarBD(){
    /*variables para la conexion*/
    $host="host=localhost";
    $dbname="dbname=siccopes2021v01"; 
    $port="port=5432"; 
    $user="user=postgres"; 
    $password="password=admin1996";

    $bd = pg_connect("$host $port $dbname $user $password");
    if(!$bd){
        echo "Error: ".pg_last_error; /*si no se conecta ejecutara un error */
    }else{
       // echo "Conexion exitosa"; /*si la coneccion se realiza ejecuta un mensaje positiva */
        return $bd;
    }
}

?>