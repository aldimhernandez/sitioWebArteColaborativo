<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
</head>

<body>

    <?php

    //La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
    session_start();

    include('acceso_db.php'); //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión.

    //Si la sesión actual no es nula, es decir esta activa
    if (isset($_SESSION['usuario_nombre'])) {

    ?>

        <!-- Header con barra de navegación para todas las paginas de post login -->
        <nav>
            <!-- Saludamos al usuario logueado -->
            <a href="../index.php">
                Hola <?= $_SESSION['usuario_nombre'] ?>
            </a>

            <ul>
                <!-- El logo del header redirige al home -->
                <li>
                    <a href="../index.php">
                        <img src="../img/perfil.png" alt="Logo">
                    </a>
                </li>
                <!-- Link para cerrar sesión -->
                <li>
                    <a href="logout.php">Salir</a>
                </li>
            </ul>
        </nav>

        <?php

        if (isset($_POST['enviar'])) {
            //Si la contraseña ingresada no coincide con la confirmación de la contraseña
            if ($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
                //Se envía un mensaje de error y un link (back.to) para reintentar cambiar la contraseña
                echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'> Reintentar </a>";
                //Si las contraseña coinciden
            } else {
                //Se guarda el nombre de usuario
                $usuario_nombre = $_SESSION['usuario_nombre'];
                //Se guarda la nueva clave
                $usuario_clave = $_POST["usuario_clave"];
                //Se encripta la contraseña con md5 que calcula el hash de un string, devuelve un hash de 32 caracteres hexadecimales
                $usuario_clave = md5($usuario_clave);
                //Se envía una UPDATE query a la base de datos 'usuarios' actualizando el campo 'usuario_clave' filtrando por el campo 'usuario_nombre.
                $sql = "UPDATE usuarios SET usuario_clave='" . $usuario_clave . "' WHERE usuario_nombre='" . $usuario_nombre . "'";
                //
                $result = $conn->query($sql);
                //Si ... se envía un mensaje de cambio de contraseña exitoso
                if ($result) {
                    echo "Password cambiado correctamente.
                    <a href='../index.php'>Volver al inicio</a>";
                }
                //Sino
                else {
                    //Enviamos un mensaje de error al registro de errores del servidor web
                    error_log('No pudimos cambiar tu contraseña: Mensaje de error: ' . $mysqli->connect_error);
                    //Enviamos un mensaje al usuario notificando que ocurrió un error al intentar cambiar la contraseña
                    echo "Error: No pudimos cambiar tu contraseña. <a href='javascript:history.back();'>Reintentar</a>";
                }
            }
        } else {

        ?>
            <!-- Formulario para ingresar las nuevas credenciales -->
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <label>Nuevo Password:</label><br />
                <input type="password" name="usuario_clave" maxlength="15" /><br />
                <label>Confirmar:</label><br />
                <input type="password" name="usuario_clave_conf" maxlength="15" /><br />
                <input type="submit" name="enviar" value="enviar" />
            </form>

    <?php

        }

        //Si la sesión no esta activa y por algún motivo el usuario termina en esta pagina se muestra un mensaje de error y se lo redirige a index.php
    } else {

        echo "Acceso denegado.";
        header("Location: ../index.php"); //Redirigimos al usuario al home del sitio, en este caso a index.php para que proceda a iniciar sesión
    }
    ?>
</body>

</html>