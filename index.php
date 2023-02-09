<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de Arte Colaborativo</title>
</head>

<body>
    <?php

    /*
    La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie. 
    Devuelve true si la sesión fue creada exitosamente. Caso contrario devuelve false.
    */
    session_start();
    //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión 
    include('assets/php/acceso_db.php');

    //Se comprueba que la variable _SESSION esta o no vacía
    if (empty($_SESSION['usuario_nombre'])) {
        //Si la variable devuelve true (esta vacía) se redirige al usuario al formulario de inicio de sesión
    ?>
        <!-- Formulario de acceso: -->
        <form action="assets/php/comprobar.php" class="login100-form validate-form flex-sb flex-w" method="post">
            <span>
                Account Login
            </span>
            <span>
                Username
            </span>
            <div>
                <input type="text" name="usuario_nombre">
            </div>
            <span>
                Password
            </span>
            <div data-validate="Password is required">
                <span>
                    <i></i>
                </span>
                <input type="password" name="usuario_clave">
                <span></span>
            </div>
            <div>
                <div>
                    <a href="assets/php/registrarse.php">
                        Registrarse
                    </a>
                </div>
            </div>
            <div>
                <button name="enviar">
                    Login
                </button>
            </div>
        </form>

        <?php
        //Si un usuario esta previamente logueado, lo saludo y le indico su informaciÛn
    } else {

        if ($_SESSION['usuario_nombre'] == 'Admin') {

            include("assets/php/postLogin_header.php");
        ?>
            <h1>Eres el administrador del sistema</h1>
            <p>Por esto tienes algunas opciones extra</p>

            <div><a href="assets/php/admin_checkUsers.php">Ver Info de Usuario</a></div>
            <div><a href="assets/php/admin_deleteUsers.php">Eliminar Usuario</a></div>

        <?php

        } else {

            include("assets/php/postLogin_header.php");
        ?>

            <h1>Bienvenido a tu sesión de usuario</h1>
            <p>En tu sesión podrás recorrer diferentes paginas y cambiar tu password</p>

            <h2>Sistemas de usuarios con Login</h2>
            <p>Click en el botón si deseas más información.</p>

            <button type="button" data-toggle="collapse" data-target="#demo">Collapse Simple</button>

            <div>
                Los sistemas de usuario con login son muy importantes tanto para individualizar acciones relacionadas a usuarios determinadas como para mantener la seguridad en los datos de un usuario.
            </div>

    <?php

        }
    }

    include("assets/php/footer.php");

    ?>
</body>

</html>