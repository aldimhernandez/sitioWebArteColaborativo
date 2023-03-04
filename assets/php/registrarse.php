<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <!-- Normalize Browser Style -->
    <link rel="stylesheet" href="../../node_modules/normalize.css/">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/login-style.css">
</head>

<body>
    <?php

    //La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
    session_start();
    //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión
    include('acceso_db.php');

    //Comprobamos que se hayan enviado los datos del formulario 
    if (isset($_POST['enviar'])) {
        //Si los campos usuarios_nombre y usuario_clave no coinciden
        if ($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
            //Mostramos un mensaje de error y un link de reintentar
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
        }
        //Si las credenciales son correctas
        else {
            //Guardamos los datos ingresados por el usuario en variables para usar luego
            //Nombre    
            $usuario_nombre = $_POST['usuario_nombre'];
            //Clave
            $usuario_clave = $_POST['usuario_clave'];
            //Email
            $usuario_email = $_POST['usuario_email'];
            // comprobamos que el usuario ingresado no haya sido registrado antes

            //Realizamos una query donde seleccionamos la fila de datos por nombre de usuario en la base de datos
            $sql = "SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='" . $usuario_nombre . "'";
            //Guardamos el resultado de la query
            $result = $conn->query($sql);

            //Si el nombre de usuario existe en la base de datos
            if ($result->num_rows > 0) {
                //Enviamos la notificación al usuario
    ?>
                <!-- Mostramos un mensaje de éxito al usuario -->
                <div class="login-page">
                    <div class="form">
                        <p class="message"> El nombre usuario elegido ya ha sido registrado anteriormente <a href='javascript:history.back();'>Reintentar</a> </p>
                    </div>
                </div>

                <?php
            }
            //Sino existe el nombre en la base
            else {

                //Se encripta la contraseña con md5 que calcula el hash de un string, devuelve un hash de 32 caracteres hexadecimales
                $usuario_clave = md5($usuario_clave);

                //Se realiza una query para insertar los datos ingresados por el usuario en la base de datos
                $reg = "INSERT INTO usuarios (usuario_nombre, usuario_clave, usuario_email, usuario_freg) VALUES ('" . $usuario_nombre . "', '" . $usuario_clave . "', '" . $usuario_email . "', NOW())";

                //Si se registro el usuario con éxito
                if ($conn->query($reg) === TRUE) {
                ?>
                    <!-- Mostramos un mensaje de éxito al usuario -->
                    <div class="login-page">
                        <div class="form">
                            <p class="message"> Datos ingresados correctamente. Ya puedes acceder a tu cuenta. <a href="../../index.php">Login</a></p>
                        </div>
                    </div>

        <?php
                }
                //Sino se registraron los datos en la base
                else {
                    //Se notifica del error
                    echo "Ocurrió un error y los datos no pudieron ser registrados.";
                }
            }
        }
    } else {

        ?>
        <!-- Formulario de registro 
                        <input type="text" name="usuario_nombre" placeholder="Tú nombre de usuario" required />
                        <input type="password" name="usuario_clave" placeholder="Tú contraseña" required />
                        <input type="text" placeholder="Tú dirección de correo electrónico" required />
        -->
        <main>
            <section class="login-page">
                <div class="form">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="register-form">

                        <!-- Usuario -->
                        <label for="usuario_nombre">

                        </label>
                        <div data-validate="Username is required">
                            <input type="text" name="usuario_nombre" placeholder="Tú nombre de usuario" required />
                        </div>

                        <!-- Contraseña -->
                        <label for="usuario_clave">

                        </label>
                        <div data-validate="Password is required">
                            <input type="password" name="usuario_clave" placeholder="Tú contraseña" required />
                        </div>

                        <!-- Confirmar contraseña -->
                        <label for="usuario_clave_conf">

                        </label>
                        <div data-validate="Password is required">
                            <input type="password" name="usuario_clave_conf" placeholder="Repetir contraseña" required>
                        </div>

                        <!-- Correo Electrónico -->
                        <label for="usuario_email">

                        </label>
                        <div data-validate="Email is required">
                            <input type="email" name="usuario_email" placeholder="Tú dirección de correo electrónico" required />
                        </div>

                        <!-- Enviar -->
                        <button type="submit" name="enviar">
                            Crear Cuenta
                        </button>
                        <!-- Ir a Login -->
                        <p class="message">¿Ya tenes una cuenta?<a href="../../index.php"> Ingresa aquí</a></p>
                    </form>
                </div>
            </section>
        </main>

    <?php
    }
    ?>
    <!-- p5js library cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.min.js" integrity="sha512-3RlxD1bW34eFKPwj9gUXEWtdSMC59QqIqHnD8O/NoTwSJhgxRizdcFVQhUMFyTp5RwLTDL0Lbcqtl8b7bFAzog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Sketch -->
    <script src="assets/js/sketch-paint-brush.js"></script>
    <!-- Bootstrap 5 -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>