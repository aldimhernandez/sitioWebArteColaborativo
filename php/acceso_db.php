<?php

//Variables de configuración necesarias para acceder a la base de datos

$host_db = "localhost";             //Nombre del host
$usuario_db = "root";               //Usuario de la BD
$clave_db = "";                     //Contraseña de la BD
$nombre_db = "sesiones_usuarios";   //Nombre de la BD

//Realizamos una conexión entre PHP y MySQL BD haciendo uso de la función mysqli ingresando como parámetros las credenciales necesarias para la conexión
$conn = new mysqli($host_db, $usuario_db, $clave_db, $nombre_db);

//Si se presenta algún error durante la conexión
if ($conn->connect_error) {

    //Enviamos un mensaje de error
    error_log('La conexión fallo: Mensaje de error: ' . $mysqli->connect_error);
    //Imprimimos un mensaje y terminamos el script actual
    die("Connection failed: " . $conn->connect_error);
}
