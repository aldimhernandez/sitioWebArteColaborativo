<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metadatos -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo del sitio -->
    <title>Sitio de Arte Colaborativo</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <section class="container">
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
            </section>
        </main>

        <?php

        //Si un usuario esta previamente logueado, lo saludo y le indico su información 
    } else {

        if ($_SESSION['usuario_nombre'] == 'Admin') {

            include("assets/php/postLogin_header.php");
        ?>
            <main>
                <section class="container">
                    <h1>Hola Admin</h1>
                    <p>Permisos de Admin</p>

                    <div><a href="assets/php/admin_checkUsers.php">Ver Info de Usuario</a></div>
                    <div><a href="assets/php/admin_deleteUsers.php">Eliminar Usuario</a></div>
                </section>
            </main>

        <?php

        } else {

            include("assets/php/postLogin_header.php");
        ?>

            <main>
                <section class="container">
                    <h1>Bienvenido</h1>
                    <p>Este es el main</p>
                </section>
            </main>

    <?php

        }
    }

    include("assets/php/footer.php");

    ?>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>