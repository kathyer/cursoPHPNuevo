<?php
	include_once ("funciones.php");

	// Los valores iniciales de los datos los ponemos aquí. 
	$nombre = "";
	$apellidos = "";
	$edad = "";
	$curso = "";
	$altura = "";
	$sexo = "H";

	$mensajeValidacion = "";

	// Comprobamos si hay datos enviados por POST.
	if ($_POST) {
		$validacion = validarAlumno($_POST);
		if ($validacion !== false) {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
			$apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "";
			$edad = isset($_POST["edad"]) ? $_POST["edad"] : "";
			$curso = isset($_POST["curso"]) ? $_POST["curso"] : "";
			$altura = isset($_POST["altura"]) ? $_POST["altura"] : "";
			$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "H";
		}
		else
		{
			/*
			$consulta = "INSERT INTO alumnos (nombre, apellidos, edad, curso, altura, sexo) VALUES ('" . $_POST["nombre"] . "', '" . $_POST["apellidos"] . "', '" . $_POST["edad"] . "', '" . $_POST["curso"] . "', '" . $_POST["altura"] . "', '" . $_POST["sexo"] . "')";
			*/
			/* En lugar de crear la cadena de inserción de forma manual, utilizamos nuestra propia función */
			$consulta = crearConsultaInsertar($_POST, "alumnos");

			if (insertarElemento($consulta) == true)
			{
				header("Location: index.php");
			}
			else
			{
				echo "<p class='alert alert-danger'>Ha ocurrido un fallo al guardar el usuario.</p>";
			}
		}
	}
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BASES DE DATOS</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">

	<h1>NUEVO ALUMNO</h1>
	<br/>

	<?= $mensajeValidacion ?>
	
	<?php
		include("formularioAlumnos.php");	
	?>

</div>
</body>
</html>