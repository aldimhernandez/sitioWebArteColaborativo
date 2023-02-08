<!DOCTYPE html>
<html lang="es">

<head>

    <?php
    include("php/header.php");
    ?>

</head>

<body>

    <?php
    //P�ginas restringidas:
    //Como en toda web con sistema de usuarios, siempre habr�n zonas restringidas 
    //a las que s�lo podr�n acceder usuarios registrados, entonces para ello partimos del siguiente c�digo:

    session_start();
    include('acceso_db.php'); // inclu�mos los datos de acceso a la BD
    // comprobamos que se haya iniciado la sesi�n, o sea que un usuaior autorizado haya iniciado sesion

    if ($_SESSION['usuario_nombre'] == 'Admin') {
        include("postLogin_header.php");
    ?>


        <?php

        $name = $_POST['borrar'];


        $sql = "DELETE FROM usuarios WHERE usuario_nombre='$name'";

        ?>

        <div class="container">
            <div class="jumbotron">
                <h1>Eliminar usuario:</h1>
                <p>Selecciona un Usuario:</p>
            </div>


            <?php

            if ($result = $conn->query($sql)) {
                echo "El usuario " . $_POST['borrar'] . " ha sido eliminado de la base de datos con exito";
            } else {
                echo "El usuario no pudo ser eliminado";
            }
            ?>
        </div>

    <?php
    }
    //Si no es as�, o sea no se ha iniciado sesion, lo indicamos...
    else {
        echo "Est�s accediendo a una p�gina restringida, para ver su contenido debes estar registrado.<br /> 
        <a href='acceso.php'>Ingresar</a> / <a href='registro.php'>Regitrarme</a>";
    }

    include("footer.php");
    ?>


</body>

</html>