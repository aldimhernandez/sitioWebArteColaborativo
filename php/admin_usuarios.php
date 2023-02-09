<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin: Usuarios</title>
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

		<!-- Sección donde muestro los usuarios -->
		<section>
			<!-- Titulo y párrafo descriptivo -->
			<div>
				<h1>Ver datos de los usuarios</h1>
				<p>Selecciona un Usuario:</p>
			</div>
			<!-- Formulario donde se mostraran los usuarios -->
			<form action="admin_usuarios.php" method="post">
				<!-- Sección para seleccionar los usuarios -->
				<select name="ver" onchange="this.form.submit()">
					<!-- Comienza el area de opciones -->
					<option>Seleccione un Usuario</option>

					<?php
					//Minetras no sea el final del fetch_assoc que guarda el arreglo con el resultado de la query anterior, lee las filas e imprime el nombre de usuario por cada opción 
					while ($row = $result->fetch_assoc()) {
						echo "<option value=" . $row['usuario_nombre'] . ">" . $row['usuario_nombre'] . "</option>\n";
					}

					?>
					<!-- Fin del area de selección -->
				</select>
			</form>

			<?php

			//si el registro ya esta seteado lo muestro sino no
			if (isset($_POST['ver'])) {

				//Guardo los datos en la variable $name
				$name = $_POST['ver'];

				//Realizo una query seleccionando de la tabla usuarios la fila que contenga un nombre como el que se selecciono 
				$sql = "SELECT * FROM usuarios WHERE usuario_nombre='$name'";

				//Guardo la selección en la variable $option
				$option = $conn->query($sql);

				while ($row = $option->fetch_assoc()) {
					//Se muestran en pantalla los datos del usuario seleccionado
					echo "<br>";
					echo "Numero de Id= " . $row['usuario_id'];
					echo "<br>";
					echo "Nombre de Usuario = " . $row['usuario_nombre'];
					echo "<br>";
					echo "E-Mail = " . $row['usuario_email'];
					echo "<br>";
					echo "Fecha de Ingreso = " . $row['usuario_freg'];
					echo "<br>";
					echo "<br>";
				}
			}

			echo "<br>";

			?>

		</section>

	<?php
	}
	//Sino se ha iniciado la sesión o un usuario sin permisos desea ingresar
	else {
		//Se informa del error y se invita a volver al login
		echo "Acceso restringido. Solo se permiten usuarios administradores.<br /> 
        <a href='acceso.php'>Volver</a>";
	}

	include("footer.php");
	?>

</body>

</html>