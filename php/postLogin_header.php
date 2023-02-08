<!-- Header con barra de navegación para todas las paginas de post login -->
<nav>
    <!-- Saludamos al usuario logueado -->
    <a href="#">
        Hola <?= $_SESSION['usuario_nombre'] ?>
    </a>

    <ul>
        <!-- El logo del header redirige al home -->
        <li>
            <a href="../index.php">
                <img src="../img/perfil.png" alt="Logo">
            </a>
        </li>
        <!-- Link para cambiar contraseña -->
        <li>
            <a href="cambiar_password.php">Cambiar Contraseña</a>
        </li>
        <!-- Link para cerrar sesión -->
        <li>
            <a href="logout.php">Salir</a>
        </li>
    </ul>
</nav>