<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("header.php");
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


        <html>

        <body>

            <?php

            $sql = "SELECT * FROM usuarios";
            $result = $conn->query($sql);

            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Eliminar usuario:</h1>
                    <p>Selecciona un Usuario:</p>
                </div>

                <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                    <form action="procesar_delete_BD.php" class="login100-form validate-form flex-sb flex-w" method="post">
                        <select name="borrar">
                            <option>Seleccione un Usuarios</option>
                </div>
                <?php

                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row['usuario_nombre'] . ">" . $row['usuario_nombre'] . "</option>\n";
                }


                ?>

                </select>

                <div class="container-login100-form-btn">
                    <button name="enviar" class="login100-form-btn">
                        Eliminar
                    </button>
                </div>
                </form>
            </div>
            </div>


        <?php
    }
    //Si no es as�, o sea no se ha iniciado sesion, lo indicamos...
    else {
        echo "Est�s accediendo a una p�gina restringida, donde solo el administrador puede acceder.<br /> 
        <a href='acceso.php'>Volver</a>";
    }


    include("footer.php");
        ?>


        </body>

        </html>