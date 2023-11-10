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
	<title>Ejercicio 12 PHP</title>
</head>

<body>
	<header>
		<div class="daw">
			<span>DWES.</span>
		</div>
	</header>
	<main>
		<div class="contenido">
			<h2>Ejercicio 12 </h2>
			<p>MOSTRAR EL CONTENIDO DE LAS VARIABLES SUPER GLOBALES USANDO PRINTF Y FOREACH</p>
			<?php
			/**
			 * @author Alvaro Cordero Miñambres
			 * @version 1.0 
			 * @since 27/10/2023
			 */

			//Mostramos las variables con print_r()
			echo ("<p>Contenido de <span>" . '$GLOBALS' . "</span> es de tipo <span>" . gettype($GLOBALS) . "</span> y tiene el valor " . print_r($GLOBALS) . "</p>");
			echo ("<p>Contenido de <span>" . '$_SERVER' . "</span> es de tipo <span>" . gettype($_SERVER) . "</span> y tiene el valor " . print_r($_SERVER) . "</p>");
			echo ("<p>Contenido de <span>" . '$_GET' . "</span> es de tipo <span>" . gettype($_GET) . "</span> y tiene el valor " . print_r($_GET) . "</p>");
			echo ("<p>Contenido de <span>" . '$_POST' . "</span> es de tipo <span>" . gettype($_POST) . "</span> y tiene el valor " . print_r($_POST) . "</p>");
			echo ("<p>Contenido de <span>" . '$_FILES' . "</span> es de tipo <span>" . gettype($_FILES) . "</span> y tiene el valor " . print_r($_FILES) . "</p>");
			echo ("<p>Contenido de <span>" . '$_COOKIE' . "</span> es de tipo <span>" . gettype($_COOKIE) . "</span> y tiene el valor " . print_r($_COOKIE) . "</p>");

			//Si la variable $_SESSION esta definida y no es null muestra el contenudo de la misma
			if (isset($_SESSION)) {
				echo ("<p>Contenido de <span>" . '$_SESSION' . "</span> es de tipo <span>" . gettype($_SESSION) . "</span> y tiene el valor ");
				print_r($_SESSION);
				//Si esta vacia muestra un mensaje mostrando que esta vacia
			} else {
				echo ("<p>Contenido de <span>" . '$_SESSION' . "</span> esta vacia.</p>");
			}

			//Mostramos el contenido de las variables usando echo
			echo ("<p>Contenido de <span>" . '$_REQUEST' . "</span> es de tipo <span>" . gettype($_REQUEST) . "</span> y tiene el valor " . print_r($_REQUEST) . "</p>");
			echo ("<p>Contenido de <span>" . '$_ENV' . "</span> es de tipo <span>" . gettype($_ENV) . "</span> y tiene el valor " . print_r($_ENV) . "</p>");
			?>

			<h3>FOREACH()</h3>
			<?php
			//Mostramos las variables usando FOREACH
			$key = "";
			$valor = "";
			echo ("La variable <span>" . '$GLOBALS' . "</span> no se puede mostrar con foreach().");
			echo ("<p>Contenido de <span>" . '$_SERVER' . "</span> es de tipo <span>" . gettype($_SERVER) . "</span> y tiene el valor <br>");
			//Recorremos la variable $_SERVER usando foreach
			foreach ($_SERVER as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_GET' . "</span> es de tipo <span>" . gettype($_GET) . "</span> y tiene el valor <br>");

			//Recorremos la variable $_GET usando foreach
			foreach ($_GET as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_POST' . "</span> es de tipo <span>" . gettype($_POST) . "</span> y tiene el valor <br>");

			//Recorremos la variable $_POST usando foreach
			foreach ($_POST as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_FILES' . "</span> es de tipo <span>" . gettype($_FILES) . "</span> y tiene el valor <br>");

			//Recorremos la variable $_POST usando foreach
			foreach ($_FILES as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_COOKIE' . "</span> es de tipo <span>" . gettype($_COOKIE) . "</span> y tiene el valor <br>");

			//Recorremos la variable $_POST usando foreach
			foreach ($_COOKIE as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			if (isset($_SESSION)) {
				echo ("<p>Contenido de <span>" . '$_SESSION' . "</span> es de tipo <span>" . gettype($_SESSION) . "</span> y tiene el valor <br>");
				//Recorremos la variable $_SESSION usando foreach
				foreach ($_SESSION as $clave => $valor) {
					echo "{$clave} => {$valor}<br>";
				}
			} else {
				echo ("<p>Contenido de <span>" . '$_SESSION' . "</span> esta vacia.");
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_REQUEST' . "</span> es de tipo <span>" . gettype($_REQUEST) . "</span> y tiene el valor <br>");
			//Recorremos la variable $_REQUEST usando foreach
			foreach ($_REQUEST as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			echo ("<p>Contenido de <span>" . '$_ENV' . "</span> es de tipo <span>" . gettype($_ENV) . "</span> y tiene el valor <br>");
			//Recorremos la variable $_ENV usando foreach
			foreach ($_ENV as $clave => $valor) {
				echo "{$clave} => {$valor}<br>";
			}
			echo ("</p>");
			?>
		</div>

	</main>

	<footer>
		<div class="enlaces-footer">
			<a href="../../index.html" style="color: #737373; text-decoration: none; font-size: 20px">
				© Alvaro Cordero</a>
			<a href="../indexProyectoTema3.html">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#737373" class="bi bi-house-fill" viewBox="0 0 16 16">
					<path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"></path>
					<path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"></path>
				</svg>
			</a>
			<a href="https://github.com/alvarocormi" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#737373" class="bi bi-github" viewBox="0 0 16 16">
					<path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
				</svg></a>
			<a href="https://es.linkedin.com/in/%C3%A1lvaro-cordero-mi%C3%B1ambres-2a1893233" target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#737373" class="bi bi-linkedin" viewBox="0 0 16 16">
					<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
				</svg>
			</a>
		</div>
	</footer>
</body>


</html>