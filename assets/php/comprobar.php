<?php

//La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
session_start();
//Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión
include('acceso_db.php');

//En caso de error muestro al usuario los datos ingresados.
echo "Usuario Ingresado: " . $_POST['usuario_nombre'] . "</br>";
echo "Clave Ingresada: " . $_POST['usuario_clave'] . "</br>";

//Comprobamos que se hayan enviado los datos del formulario
if (isset($_POST['enviar'])) {
    //Si los campos usuarios_nombre y usuario_clave están vacíos
    if (empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
        //Mostramos un mensaje de error y un link de reintentar
        echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
    }
    //Sino están vacíos
    else {
        //Guardamos los datos ingresados por el usuario en variables para usar luego
        //Nombre
        $usuario_nombre = $_POST['usuario_nombre'];
        //Clave
        $usuario_clave = $_POST['usuario_clave'];
        //Se encripta la contraseña con md5 que calcula el hash de un string, devuelve un hash de 32 caracteres hexadecimales
        $usuario_clave = md5($usuario_clave);
        //Realizamos una query para obtener las credenciales de usuario en la base de datos
        $sql = "SELECT usuario_id, usuario_nombre, usuario_clave FROM usuarios WHERE usuario_nombre='" . $usuario_nombre . "' AND usuario_clave='" . $usuario_clave . "'";
        //Guardamos el resultado de la consulta
        $result = $conn->query($sql);
        //Si el resultado de la consulta es mayor a 0 filas 
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                //Se crea la sesión "usuario_id" y se le asigna el valor del campo usuario_id
                $_SESSION['usuario_id'] = $row['usuario_id'];
                //Se crea la sesión "usuario_nombre" y se le asigna como valor el campo usuario_nombre
                $_SESSION['usuario_nombre'] = $row["usuario_nombre"];
                //Lo redirijimos al home
                header("Location: ../../index.php");
            }
        }
        //Si los datos ingresados no estaban en la base de datos
        else {
?>
            <!-- Enviamos un mensaje con el error correspondiente -->
            <div>
                Usuario o contraseña incorrectos, <a href="../../index.php">Reintentar</a>
            </div>
<?php
        }
    }
}
//Sino se enviaron
else {
    //Redirigimos al home
    header("Location: ../../index.php");
}

?>