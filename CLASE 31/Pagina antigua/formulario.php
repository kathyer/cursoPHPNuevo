<?php
	include_once ("funciones.php");

	function comprobarErroresAlumno($datos) {
		// La función empty comprueba si un elemento existe
		// y además no está vacío (o no es igual a 0 en el caso
		// de los números).
		if (empty($datos["nombre"])) {
			return "Debe completar el nombre";
		}

		if (empty($datos["apellidos"])) {
			return "Debe completar los apellidos";
		}

		if (empty($datos["edad"])) {
			return "Debe completar la edad";
		} else if (!is_numeric($datos["edad"])) {
			return "La edad debe ser un número";
		} elseif ($datos["edad"] <= 0) {
			return "La edad debe ser un entero positivo";
		}

		if (empty($datos["curso"])) {
			return "Debe completar el curso";
		}

		if (empty($datos["altura"])) {
			return "Debe completar la altura";
		} else if (!is_numeric($datos["altura"])) {
			return "La altura debe ser un número";
		} elseif ($datos["altura"] <= 0) {
			return "La altura debe ser un entero positivo";
		}

		if (empty($datos["sexo"])) {
			return "Debe especificar un sexo";
		} elseif ($datos["sexo"] != "H" && $datos["sexo"] != "M") {
			return "El sexo proporcionado no es válido";
		}

		return false;
	}

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
		$validacion = comprobarErroresAlumno($_POST);
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
			$consulta = "INSERT INTO alumnos (nombre, apellidos, edad, curso, altura, sexo) VALUES ('" . $_POST["nombre"] . "', '" . $_POST["apellidos"] . "', '" . $_POST["edad"] . "', '" . $_POST["curso"] . "', '" . $_POST["altura"] . "', '" . $_POST["sexo"] . "')";
			if (guardarDatos($consulta) == true) {
				echo "Usuario guardado correctamente";
			} else {
				echo "Ha ocurrido un fallo al guardar el usuario.";
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

	<form class="form-horizontal col-md-offset-1" method="POST">

	<div class="form-group">
		<label for="nombre" class="col-sm-2 control-label">Nombre:</label>
		<div class="col-sm-8">
			<input type="text" name="nombre" class="form-control" required="required" value="<?= $nombre ?>"></input>
		</div>
	</div>

	<div class="form-group">
		<label for="apellidos" class="col-sm-2 control-label">Apellidos:</label>
		<div class="col-sm-8">
			<input type="text" name="apellidos" class="form-control" required="required" value="<?= $apellidos ?>"></input>
		</div>
	</div>

	<div class="form-group">
		<label for="edad" class="col-sm-2 control-label">Edad:</label>
		<div class="col-sm-8">
			<input type="text" name="edad" class="form-control" required="required" value="<?= $edad ?>"></input>
		</div>
	</div>

	<div class="form-group">
		<label for="curso" class="col-sm-2 control-label">Curso:</label>
		<div class="col-sm-8">
			<input type="text" name="curso" class="form-control" required="required" value="<?= $curso ?>"></input>
		</div>
	</div>

	<div class="form-group">
		<label for="altura" class="col-sm-2 control-label">Altura (cm):</label>
		<div class="col-sm-8">
			<input type="number" name="altura" class="form-control" required="required" value="<?= $altura ?>"></input>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Sexo:</label>
		<div class="col-sm-8">
			<label class="radio-inline">
				<input type="radio" name="sexo" value="H" checked="checked" value="<?= $sexo ?>"> Hombre
			</label>
			<label class="radio-inline">
				<input type="radio" name="sexo" value="M"> Mujer
			</label>
		</div>
	</div>

	<br/>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-primary">Guardar alumno</button>
		</div>
	</div>

	</form>
</div>
</body>
</html>