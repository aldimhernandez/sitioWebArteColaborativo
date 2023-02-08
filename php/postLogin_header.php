<nav>
    <a href="#">Hola <?= $_SESSION['usuario_nombre'] ?>
    </a>
    <ul>
        <li>
            <a href="../index.php">
                <img src="../img/perfil.png" alt="Logo">
            </a>
        </li>
        <li>
            <a href="cambiar_password.php">Cambiar Clave</a>
        </li>
        <li>
            <a href="logout.php">Salir</a>
        </li>
    </ul>
</nav>