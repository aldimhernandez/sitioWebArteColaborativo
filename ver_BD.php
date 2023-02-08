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
	include('php/acceso_db.php'); // inclu�mos los datos de acceso a la BD
	// comprobamos que se haya iniciado la sesi�n, o sea que un usuaior autorizado haya iniciado sesion

	if ($_SESSION['usuario_nombre'] == 'Admin') {
		include("php/postLogin_header.php");
	?>

		<?php
		//Realizo una consulta a todos los registros de usuario
		$sql = "SELECT * FROM usuarios";
		$result = $conn->query($sql);
		//creo un formulario que tenga un combo select
		?>

		<div class="container">
			<div class="jumbotron">
				<h1>Ver datos de los usuarios</h1>
				<p>Selecciona un Usuario:</p>
			</div>
			<form action="ver_BD.php" method="post">
				<select name="ver" onchange="this.form.submit()">
					<option>Seleccione un Usuario</option>

					<?php
					//leo nombre de registros armando una opcion por cada uno
					while ($row = $result->fetch_assoc()) {
						echo "<option value=" . $row['usuario_nombre'] . ">" . $row['usuario_nombre'] . "</option>\n";
					}

					?>

				</select>
			</form>




			<?php
			//si el registro ya esta seteado lo muestro sino no
			if (isset($_POST['ver'])) {
				$name = $_POST['ver'];
				$sql = "SELECT * FROM usuarios WHERE usuario_nombre='$name'";
				$seleccion = $conn->query($sql);

				while ($row = $seleccion->fetch_assoc()) {
					//imprimo la informaci�n que quiero
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
		</div>
	<?php
	}
	//Si no es as�, o sea no se ha iniciado sesion, lo indicamos...
	else {
		echo "Est�s accediendo a una p�gina restringida, donde solo el administrador puede acceder.<br /> 
				<a href='acceso.php'>Volver</a>";
	}

	include("php/footer.php");
	?>


</body>

</html>