<?php
//La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
session_start();

include('acceso_db.php'); //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión 

//Si la sesión actual no es nula, es decir esta activa
if (isset($_SESSION['usuario_nombre'])) {
    session_destroy(); //Cerramos la sesión
    header("Location: ../../index.php"); //Redirigimos al usuario al home del sitio, en este caso a index.php
} else {
    echo "Operación Incorrecta"; //Si no hay ninguna sesión activa y por algún motivo el usuario llegará a esta pagina (logout.php) enviamos un mensaje de "operación incorrecta"
    header("Location: ../../index.php"); //Redirigimos al usuario al home del sitio, en este caso a index.php para que proceda a iniciar sesión
}
