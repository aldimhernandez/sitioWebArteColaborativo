<nav>
    <a href="#">Hola <?= $_SESSION['usuario_nombre'] ?>
    </a>
    <ul>
        <li>
            <a href="index.php">
                <img src="../img/perfil.png" alt="Logo">
            </a>
        </li>
        <li>
            <a href="php/cambiar_password.php">Cambiar Clave</a>
        </li>
        <li>
            <a href="php/logout.php">Salir</a>
        </li>
    </ul>
</nav>