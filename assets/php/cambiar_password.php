<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <!-- Normalize Browser Style -->
    <link rel="stylesheet" href="../../node_modules/normalize.css/">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/login-style.css">
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
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
                <ul class="nav nav-pills nav-fill">
                    <!-- El logo del header redirige al home -->
                    <li class="nav-item align-self-center">
                        <a class="nav-link link-light" aria-current="page" href="http://localhost/sitioWebArteColaborativo/index.php">
                            <img src="../../assets/img/perfil.png" class="img-fluid img-thumbnail" style="width: 3em;" alt="Logo">
                        </a>
                    </li>
                    <!-- Saludamos al usuario logueado -->
                    <li class="nav-item align-self-center">
                        <a class="navbar-brand link-light" href="http://localhost/sitioWebArteColaborativo/index.php">
                            Hola <?= $_SESSION['usuario_nombre'] ?>
                        </a>
                    </li>
                    <!-- Link para cerrar sesión -->
                    <li class="nav-item align-self-center">
                        <a class="nav-link link-light" href="../../assets/php/logout.php">
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php

        if (isset($_POST['enviar'])) {
            //Si la contraseña ingresada no coincide con la confirmación de la contraseña
            if ($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
        ?>
                <!-- Se envía un mensaje de error y un link (back.to) para reintentar cambiar la contraseña -->
                <div class="login-page">
                    <div class="form">
                        <p class="message">Las contraseñas ingresadas no coinciden.
                            <a href='javascript:history.back();'> Reintentar </a>
                        </p>
                    </div>
                </div>
                <?php
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
                ?>
                    <!-- Mostramos un mensaje de éxito al usuario -->
                    <div class="login-page">
                        <div class="form">
                            <p class="message">Password cambiado correctamente.
                                <a href='../../index.php'>Volver al inicio</a></a>
                            </p>
                        </div>
                    </div>

                <?php
                }
                //Sino
                else {

                ?>
                    <!-- Mostramos un mensaje de error al usuario -->
                    <div class="login-page">
                        <div class="form">
                            <p class="message">No pudimos cambiar tu contraseña.
                                <a href='javascript:history.back();'>
                                    Login
                                </a>
                            </p>
                        </div>
                    </div>
            <?php
                }
            }
        } else {

            ?>
            <!-- Formulario para ingresar las nuevas credenciales -->
            <div class="login-page">
                <div class="form">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <label>Nuevo Password:</label><br />
                        <input type="password" name="usuario_clave" maxlength="15" /><br />
                        <label>Confirmar:</label><br />
                        <input type="password" name="usuario_clave_conf" maxlength="15" /><br />
                        <button type="submit" name="enviar">Cambiar Contraseña</button>
                    </form>
                </div>
            </div>
    <?php
        }
        //Si la sesión no esta activa y por algún motivo el usuario termina en esta pagina se muestra un mensaje de error y se lo redirige a index.php
    } else {

        echo "Acceso denegado.";
        header("Location: ../../index.php"); //Redirigimos al usuario al home del sitio, en este caso a index.php para que proceda a iniciar sesión
    }
    ?>

</body>

</html>