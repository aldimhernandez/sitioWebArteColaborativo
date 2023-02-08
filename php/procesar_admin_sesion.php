<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <?php

    //Pagina restringida para los usuarios. Solo acceso de Admin.

    //La función session_start crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie.
    session_start();
    //Invocamos los datos almacenados en el archivo acceso_db requeridos para el inicio de la sesión
    include('acceso_db.php');

    //Si el nombre de usuario es Admin
    if ($_SESSION['usuario_nombre'] == 'Admin') {

        //Mostrar el header de post login
        include("postLogin_header.php");
    ?>
        <?php

        //Enviamos una solicitud para que se elimine el usuario de la base de datos
        $name = $_POST['borrar'];
        $sql = "DELETE FROM usuarios WHERE usuario_nombre='$name'";

        ?>

        <div>
            <div>
                <h1>Eliminar usuario:</h1>
                <p>Selecciona un Usuario:</p>
            </div>

            <?php

            if ($result = $conn->query($sql)) {
                echo "El usuario " . $_POST['borrar'] . " ha sido eliminado de la base de datos correctamente";
            } else {
                echo "Error al eliminar el usuario";
            }
            ?>
        </div>

    <?php
    }
    //Sino se ha iniciado la sesión 
    else {

        //Se informa del error y se invita a volver al login
        echo "Acceso restringido. Solo se permiten usuarios administradores.<br /> 
        <a href='acceso.php'>Ingresar</a> | <a href='registro.php'>Registrarme</a>";
    }

    //Invocamos al footer
    include("footer.php");
    ?>
</body>

</html>