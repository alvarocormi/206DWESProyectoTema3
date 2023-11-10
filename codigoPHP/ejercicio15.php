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
	<title>Ejercicio 15 PHP</title>
</head>

<body>
	<header>
		<div class="daw">
			<span>DWES.</span>
		</div>
	</header>
	<main>
		<div class="contenido">
			<h2>Ejercicio 15</h2>
			<p>CREAR UN ARRAY CON EL SUELDO PERCIBIDO DE LUNES A DOMINGO</p>
			<?php
			/**
			 * 15. Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
			 * semana. (Array asociativo con los nombres de los días de la semana)
			 * 
			 * @author Alvaro Cordero Miñambres
			 * @version 1.0 
			 * @since 27/10/2023
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

			echo"<h3>Usando for each</h3>";
			//Recorremos ese array usando foreach
			foreach ($aSueldos as $dia => $sueldo) {
				$sueldoPercibido = $sueldoPercibido+$sueldo;
			}

			//Mostramos el sueldo con echo
			echo($sueldoPercibido);


			reset($aSueldos); // Reiniciar el puntero interno del array

			echo"<h3>Recorrer el array usando while</h3>";
			//Recorremosm el bucle usando while
			//key() -> Sirve para obtener la clave del array
			//current() -> Sirve para obtener el valor de la clave del array 
			while ($dia = key($aSueldos)) {
				$sueldo = current($aSueldos);
				echo "El sueldo para $dia es: $sueldo" . PHP_EOL;
				next($aSueldos); // Avanzar al siguiente elemento
			}
			?>

		</div>

	</main>
</body>


</html>