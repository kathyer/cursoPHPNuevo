<?php
	include ("funciones.php");
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Tabla de base de datos</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="Description" content="Ejercicio de repaso de formularios"/><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>		
	<?php

	/* Si la url está vacía (sin parámetros, al iniciar por primera vez) genero la consulta normal */
	if (empty($_GET))
	{
		$consulta = "SELECT * FROM alumnos;";
	}
	else /* Hay datos en el GET */
	{
		/* Si hay datos y su validación es correcta, entonces genero una nueva consulta ordenando los valores con los
		parámetros pasados */
		if (validarDatos())
		{
			$consulta = crearConsulta($_GET["parametro"], $_GET["orden"]);
		}
		else
		{
			/* Si los parámetros pasados son incorrectos, genero una consulta estándar */
			$consulta = "SELECT * FROM alumnos;";
		}
	}

	/* Ahora que la consulta está hecha, la llamo para conseguir los datos */
	$resultado = hacerListado($consulta);

	?>

	<div class="container-fluid">
		<div class="row">

				<div class="pull-right">
				<a href="nuevoAlumno.php" class="btn btn-primary">Nuevo</a>
				<a href="generarPdf.php" target="_blank" class="btn btn-primary">Imprimir</a>
			</div>
		

			<h2> Listado de alumnos </h2>

			<br/>
		</div>

	<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><a href="index.php?parametro=nombre&orden=<?= getOrden("nombre");?>">Nombre</a></th>
			<th><a href="index.php?parametro=apellidos&orden=<?= getOrden("apellidos");?>">Apellidos</a></th>
			<th><a href="index.php?parametro=edad&orden=<?= getOrden("edad");?>">Edad</a></th>
			<th><a href="index.php?parametro=curso&orden=<?= getOrden("curso");?>">Curso</a></th>
			<th><a href="index.php?parametro=altura&orden=<?= getOrden("altura");?>">Altura</a></th>
			<th><a href="index.php?parametro=sexo&orden=<?= getOrden("sexo");?>">Sexo</a></th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($resultado as $datoAlumno)
		{
		?>
			<tr>
				<td><?= $datoAlumno["nombre"]?></td>
				<td><?= $datoAlumno["apellidos"]?></td>
				<td><?= $datoAlumno["edad"]?></td>
				<td><?= $datoAlumno["curso"]?></td>
				<td><?= $datoAlumno["altura"]?></td>
				<td><?= $datoAlumno["sexo"]?></td>
				<td>
					<a class="btn-xs btn-info" href="persona.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-eye-open"></span></a>
					<a class="btn-xs btn-success" href="editarAlumno.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-pencil"></span></a>
					<a class="btn-xs btn-danger" href="borrarAlumno.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		<?php
		}
	?>
	</tbody>
	</table>
	</div>

</body>
</html>