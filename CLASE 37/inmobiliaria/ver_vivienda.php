<?php

	include_once("vivienda_modelo.php");
	$mensajeError = "";

	if (!empty($_GET["id"]))
	{
		$vivienda = obtenerViviendaPorId($_GET["id"]);
	}
	else
	{
		$mensajeError = "<p class=\"alert alert-danger\">Error. No se ha especificado una vivienda</p>";
	}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $vivienda["nombre"] ?></title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="LOGO/logofondoscuro.png">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- Navegacion -->
    <?php
    include("navbar.php");

    echo $mensajeError;

	if ($mensajeError == "")
	{
   ?>
    <!-- Contenido de la pagina -->
    <div class="container">    
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12">
				<div class="col-sm-8 col-lg-8 col-md-8 promocion">
					<h2><?= $vivienda["nombre"] ?></h2>
					<img src= "<?= $vivienda["urlImagen"] ?>" width="100%">
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail cajadescripcion">
							
							<div class="iconos ">
								<p><i class="fa fa-bed" aria-hidden="true"></i> Habitaciones <span class="descripcion"><?= $vivienda["dormitorios"] ?></span></p>
								<p><i class="fa fa-bath" aria-hidden="true"></i> Baños<span class="descripcion"><?= $vivienda["banos"] ?></span></p>
								<p><span class="glyphicon glyphicon-move"></span> Superficie<span class="descripcion"><?= $vivienda["superficie"] ?> m<sup>2</sup></span></p>
								<p><i class="fa fa-arrows-v" aria-hidden="true"></i> Ascensor<span class="descripcion"><?= ($vivienda["ascensor"]==0)?"Si":"No" ?></span></p>
								<p><i class="fa fa-pagelines" aria-hidden="true"></i> Jardín<span class="descripcion"><?= ($vivienda["jardin"]==0)?"Si":"No" ?></span></p>
							</div>
						</div>
					</div>
					<div class="col-sm-8 col-lg-8 col-md-8 detallespiso">
						<p id="text_promocion1">
                       	<?= $vivienda["descripcion"] ?></p>
					</div>
                </div>
               
                <div class=" col-sm-4 col-lg-4 col-md-4">
					<div class="contacto2 col-sm-11 col-lg-11 col-md-11">
						<form action="salida.php" method="POST" class="form-group">
							<p class="contacta">Contacta para más información</p>
							<label for="nombre"> Nombre: </label>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre" required="required" class="form-control" />
							<br/>
							<label for="correo">Email: </label>
							<input type="email" name="correo" required="required" placeholder="Email" class="form-control" />
							<br>
							<label for="telefono">Teléfono: </label>
							<input type="tel" name="telefono"  placeholder="Telefono" class="form-control"/>
							<br/>
							<label for="departamentos">Contactar con: </label>
							<select id="departamentos" name="departamentos" class="form-control">
								<option value="comercial">Departamento comercial</option>
								<option value="marketing">Departamento de marketing</option>
								<option value="desarrollo">Departamento de desarrollo</option>
							</select>
							<br/>
							<label for="cuentanos">Cuéntanos, te escuchamos. </label>
							<textarea rows=4 cols="38" name="cuentanos">Cuentanos, te escuchamos.</textarea>
							<br/>
							<input type="checkbox" name="condiciones" value="1" required="required"> He leído y acepto <a href="condiciones.html" class="condiciones" target="_blank"> los términos y condiciones </a> del aviso legal y las políticas de privacidad.
							<br/>
							<input type="hidden" name="idVivienda" value="<?= $vivienda["id"] ?>">
							<input type="submit" value="Enviar" class="btn btn-default btn-lg active boton"/>
						</form>
						<hr/>
						<div class="siguenos">Síguenos en 
							<a href="https://es-es.facebook.com/"><img src="img/facebook.png" width="25px" height="auto"/></a>  
							<a href="https://www.instagram.com/"><img src="img/instagram.png" width="25px" height="auto"/></a>  
							<a href="https://www.linkedin.com/"><img src="img/linkedin.png" width="25px" height="auto"/></a>
						</div>
					</div>
				</div>
            	<div class="col-sm-8 col-lg-8 col-md-8 ubicacion">
					<h3>Ubicación</h3>
				   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1553.055506083714!2d-6.9692234422765456!3d38.87570189382802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd16e43eac5f354d%3A0x688c7e359714a4a9!2sBadajoz!5e0!3m2!1ses!2ses!4v1480350108362"  frameborder="0" width="100%" height="100%" style="border:0" allowfullscreen class="mapa"></iframe>
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4 direccion2">
				<a name="contacto"></a>
                	<div class="col-sm-6 col-lg-6 col-md-6">
                        <img src="LOGO/logofondoscuro.png" width="70%">
                 	</div>
                	<div class="col-sm-6 col-lg-6 col-md-6 ">
                        <p class="calle2">
                            C/ Sal si puedes nº 69 Bajo<br/>
                            Localidad: Narnia<br/>
                            Pais: El de Peter Pan<br/>
                            Teléfono: 654321987<br/>
                            DulceHogar@gmail.com<br/>
                        </p>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	?>

	<footer class="estiloFooter">
        <div class="estiloCopyright">
            <hr>
            Copyright &copy; GrupoDerecha, curso PHP-HTML
        </div>
    </footer>

</body>

</html>