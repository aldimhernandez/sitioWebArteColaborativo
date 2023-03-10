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

        //Realizamos una query para traer todos los usuarios registrados en la BD
        $sql = "SELECT * FROM usuarios";
        //Guardamos el resultado de la query
        $result = $conn->query($sql);

        ?>
        <!-- Inicio -->
        <section>
            <div>
                <h1>Eliminar usuario:</h1>
                <p>Selecciona un Usuario:</p>
            </div>

            <div>
                <form action="delete_process.php" method="post">
                    <div>
                        <!-- Elemento que despliega los usuarios para verlos y seleccionar uno -->
                        <select name="borrar">
                            <option>Seleccione un Usuarios</option>
                            <?php
                            //Se muestra todos los usuarios invocándolos uno por uno mediante un while
                            while ($row = $result->fetch_assoc()) {
                                //Se muestra la opción del usuario
                                echo "<option value=" . $row['usuario_nombre'] . ">" . $row['usuario_nombre'] . "</option>\n";
                            }

                            ?>

                        </select>
                    </div>
                    <div>
                        <button name="enviar">
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <a href="admin_checkUsers.php">Ver Info de Usuario</a>
            </div>
        </section>
        <!-- Cierre -->

    <?php
    }

    //Sino se ha iniciado la sesión 
    else {
        //Se informa del error y se invita a volver al login
        echo "Acceso restringido. Solo se permiten usuarios administradores.<br /> 
        <a href='acceso.php'>Volver</a>";
    }

    include("footer.php");
    ?>

</body>

</html>