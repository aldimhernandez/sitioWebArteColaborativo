<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo del sitio -->
    <title>Sitio de Arte Colaborativo</title>
    <!-- Normalize Browser Style -->
    <link rel="stylesheet" href="node_modules/normalize.css/">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/login-style.css">
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
        <main>
            <section class="login-page">
                <div class="form">
                    <!-- Formulario de acceso: -->
                    <form action="assets/php/comprobar.php" method="post" class="login-form">
                        <input type="text" name="usuario_nombre" placeholder="Tú nombre de usuario" required />
                        <div data-validate="Password is required"> <!-- quizás traiga errores -->
                            <input type="password" name="usuario_clave" placeholder="Tú contraseña" required />
                        </div>
                        <button name="enviar">
                            ingresar
                        </button>
                        <p class="message">¿Aún no tenes cuenta? <a href="assets/php/registrarse.php">Crear una cuenta</a></p>
                    </form>
                </div>
            </section>
        </main>

        <?php

        //Si un usuario esta previamente logueado, lo saludo y le indico su información 
    } else {

        if ($_SESSION['usuario_nombre'] == 'Admin') {

            include("assets/php/postLogin_header.php");
        ?>
            <main class="d-flex flex-column justify-content-center align-items-center login-page">
                <h1 class="text-light">Hola Admin</h1>
                <section class="m-4 d-flex flex-column justify-content-center align-items-center form" style="width: 80%">
                    <p class="message">Permisos de Admin</p>
                    <p class="message"><a href="assets/php/admin_checkUsers.php">Ver Info de Usuario</a></p>
                    <p class="message"><a href="assets/php/admin_deleteUsers.php">Eliminar Usuario</a></p>
                </section>
            </main>

        <?php

        } else {

            include("assets/php/postLogin_header.php");
        ?>

            <main class="d-flex flex-column justify-content-center align-items-center">
                <section class="m-4 d-flex flex-column justify-content-center align-items-center" style="width: 80%">
                    <h1 class="text-light">Mi sitio web</h1>
                    <p class="text-light">Bienvenido a mi sitio web</p>
                    <div id="contenedor-canvas"></div>
                </section>
            </main>

    <?php

        }
    }

    include("assets/php/footer.php");

    ?>

    <!-- Bootstrap 5 -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- p5js library -->
    <script src="node_modules/p5/p5.min.js"></script>
    <!-- Sketch -->
    <script src="assets/js/sketch-processing.js"></script>
</body>

</html>