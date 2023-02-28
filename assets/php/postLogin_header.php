<!-- Header con barra de navegación para todas las paginas de post login -->
<nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
        <ul class="nav nav-pills nav-fill">
            <!-- El logo del header redirige al home -->
            <li class="nav-item align-self-center">
                <a class="nav-link link-light" aria-current="page" href="http://localhost/sitioWebArteColaborativo/index.php">
                    <img src="assets/img/perfil.png" class="img-fluid img-thumbnail" style="width: 3em;" alt="Logo">
                </a>
            </li>
            <!-- Saludamos al usuario logueado -->
            <li class="nav-item align-self-center">
                <a class="navbar-brand link-light" href="http://localhost/sitioWebArteColaborativo/index.php">
                    Hola <?= $_SESSION['usuario_nombre'] ?>
                </a>
            </li>
            <!-- Link para cambiar contraseña -->
            <li class="nav-item align-self-center">
                <a class="nav-link link-light" href="assets/php/cambiar_password.php">
                    Cambiar Contraseña
                </a>
            </li>
            <!-- Link para cerrar sesión -->
            <li class="nav-item align-self-center">
                <a class="nav-link link-light" href="assets/php/logout.php">
                    Salir
                </a>
            </li>
        </ul>
    </div>
</nav>