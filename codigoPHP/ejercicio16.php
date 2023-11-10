<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Fuentes -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../webroot/css/proyectoTema3.css" />
	<link rel="stylesheet" href="../../webroot/css/main.css" />
	<title>Ejercicio 16 PHP</title>
</head>

<body>
	<header>
		<div class="daw">
			<span>DWES.</span>
		</div>
	</header>
	<main>
		<div class="contenido">
			<h2>Ejercicio 16</h2>
			<p>RECORRE EL ARRAY UTILIZANDO FUNCIONES</p>
			<?php
			/**
			 * 16.Recorrer el array anterior utilizando funciones para obtener el mismo resultado
			 * 
			 * @author Alvaro Cordero Miñambres
			 * @version 1.0 
			 * @since 16/10/2023
			 */

			//Creamos un array asociativo de los sueldos de la semana
			$aSueldos = [
				'Lunes' => 10,
				'Martes' => 20,
				'Miercoles' => 30,
				'Jueves' => 40,
				'Viernes' => 50,
				'Sabado' => 80,
				'Domingo' => 0
			];


			$sueldoPercibido = 0;

			//array_values() -> Devuelve todos los valores del array
			//array_sum() -> Suma todos los valores del array
			$valores = array_values($aSueldos);
			$sumaValores = array_sum($valores);

			echo($sumaValores);

			?>

		</div>

	</main>
</body>


</html>