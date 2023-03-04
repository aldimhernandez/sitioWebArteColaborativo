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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="../../assets/css/login-style.css">
</head>

<body>
    <?php

    //Función para imprimir mensajes de error por consola
    function write_to_console($data)
    {
        $console = $data;
        if (is_array($console))
            $console = implode(',', $console);

        echo "<script>console.log('Mensaje de error: " . $console . "' );</script>";
    }
    //La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
    session_start();
    //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión
    include('acceso_db.php');

    //En caso de error muestra por consola los datos ingresados.
    write_to_console("Usuario: " . $_POST['usuario_nombre'] . " y Clave: " . $_POST['usuario_clave']);

    //Comprobamos que se hayan enviado los datos del formulario
    if (isset($_POST['enviar'])) {
        //Si los campos usuarios_nombre y usuario_clave están vacíos
        if (empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
            //Mostramos un mensaje de error y un link de reintentar
    ?>
            <!-- Enviamos un mensaje con el error correspondiente -->
            <div class="login-page">
                <div class="form">
                    <p class="message"> El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
                    </p>
                </div>
            </div>
            <?php
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
                    //Lo redirigimos al home
                    header("Location: ../../index.php");
                }
            }
            //Si los datos ingresados no estaban en la base de datos
            else {
            ?>
                <!-- Enviamos un mensaje con el error correspondiente -->
                <div class="login-page">
                    <div class="form">
                        <p class="message">
                            Usuario o contraseña incorrectos. <a href="../../index.php">Reintentar</a>
                        </p>
                    </div>
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
</body>

</html>