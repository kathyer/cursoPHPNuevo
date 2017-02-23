<?php
	include ("alumno_modelo.php");
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
	if (!empty($_GET) && validarDatos())
	{
		/* Si hay datos y su validación es correcta, entonces genero una nueva consulta ordenando los valores con los
		parámetros pasados */
		$resultado = obtenerAlumnosOrdenados($_GET["parametro"], $_GET["orden"]);
	}
	else
	{
		$resultado = obtenerAlumnos();
	}
	?>

	<div class="pull-right"><a href="nuevoAlumno.php"><button class="btn btn-primary" >Nuevo</button></a></div>
	<h2> Listado de alumnos </h2>

	<br/>

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
					<a class="btn-xs btn-info" href="verAlumno.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-eye-open"></span></a>
					<a class="btn-xs btn-success" href="editarAlumno.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-pencil"></span></a>
					<a class="btn-xs btn-danger" href="borrarAlumno.php?id=<?= $datoAlumno["id_alumno"]?>"><span class="glyphicon glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		<?php
		}
	?>
	</tbody>
	</table>

</body>
</html>