<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include("header.php");
    ?>

</head>

<body>

    <?php
    //Ahora pasaremos a crear nuestro formulario de acceso o Login, a este archivo lo llamaremos acceso.php
    //recordemos que podemos cerrar un script en el medio de un if o un for
    //para agregar info html.


    //importante para indicar que se iniciar· una session
    session_start();
    include('acceso_db.php');

    if (isset($_POST['enviar'])) { // comprobamos que se han enviado los datos desde el formulario

        if ($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) { // comprobamos que las contraseÒas ingresadas coincidan
            echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
        } else {
            // "limpiamos" los campos del formulario de posibles cÛdigos maliciosos
            $usuario_nombre = $_POST['usuario_nombre'];
            $usuario_clave = $_POST['usuario_clave'];
            $usuario_email = $_POST['usuario_email'];
            // comprobamos que el usuario ingresado no haya sido registrado antes

            $sql = "SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='" . $usuario_nombre . "'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "El nombre usuario elegido ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>";
            } else {
                //Calcula el hash MD5 de str utilizando el ª algoritmo de resumen de mensaje MD5 de RSA Data Security, Inc. y devuelve ese hash.
                $usuario_clave = md5($usuario_clave); // encriptamos la contraseÒa ingresada con md5

                //Codifica data en base64. Este tipo de codificaciÛn est· diseÒado para que datos binarios sobrepasen capas de transporte que no son de 8-bits 100%, como por ejemplo el cuerpo de un E-Mail.
                //La codificaciÛn en Base64 hace que los datos sean un 33% m·s largos que los datos el originales.
                //$usuario_clave = base64_encode($usuario_clave);

                // ingresamos los datos a la BD


                $reg = "INSERT INTO usuarios (usuario_nombre, usuario_clave, usuario_email, usuario_freg) VALUES ('" . $usuario_nombre . "', '" . $usuario_clave . "', '" . $usuario_email . "', NOW())";


                if ($conn->query($reg) === TRUE) {

    ?>
                    <div class="limiter">
                        <div class="container-login100">
                            <p>Datos ingresados correctamente. Ya puedes acceder con tu usuario y password a las paginas para usuarios.</p>

                            <a href="../index.php">Login</a>
                        </div>
                    </div>



        <?php
                } else {
                    echo "ha ocurrido un error y no se registraron los datos.";
                }
            }
        }
    } else {

        ?>



        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" class="login100-form validate-form flex-sb flex-w" method="post">
                        <span class="login100-form-title p-b-32">
                            Registrarse
                        </span>

                        <span class="txt1 p-b-11">
                            Usuario
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                            <input class="input100" type="text" name="usuario_nombre">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Password
                        </span>
                        <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="usuario_clave">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Confirmar Password
                        </span>
                        <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="usuario_clave_conf">
                            <span class="focus-input100"></span>
                        </div>

                        <span class="txt1 p-b-11">
                            Email
                        </span>
                        <div class="wrap-input100 validate-input m-b-36" data-validate="Email is required">
                            <input class="input100" type="email" name="usuario_email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button name="enviar" class="login100-form-btn">
                                Registrar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

    <?php
    }
    ?>


</body>

</html>