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
	<!--Boostrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../../webroot/css/main.css" />
	<title>Ejercicio 25 PHP</title>
</head>

<body>
	<header>
		<div class="daw">
			<span>DWES.</span>
		</div>
	</header>
	<main>
		<div class="contenido">
			<h2>Ejercicio 25 </h2>
			<p style="margin-bottom: 50px;">PLANTILLA PARA HACER FORMULARIOS</p>

			<?php
			/**
			 * Ejercicio 25
			 * 
			 * Plantilla para hacer formularios
			 * 
			 * @author Alvaro Cordero Miñambres
			 * @version 1.0 
			 * @since 29/10/2023
			 */

			//Incluimos la libreria de validacion de formularios
			require_once('../core/231018libreriaValidacion.php');

			//Inicializacion de variables
			$ofechaActual = new DateTime();
			$fechaFormateada = date_format($ofechaActual, "Y-m-d");
			$entradaOK = true; //Indica si todas las respuestas son correctas
			$aRespuestas = [
				//Alfabético
				'alfabeticoObligatorio' => '',
				'alfabeticoOpcional' => '',
				//Alfanumérico
				'alfanumericoObligatorio' => '',
				'alfanumericoOpcional' => '',
				//Numérico
				'numericoObligatorio' => '',
				'numericoOpcional' => '',
				//Float
				'floatObligatorio' => '',
				'floatOpcional' => '',
				//Email
				'emailObligatorio' => '',
				'emailOpcional' => '',
				//Contraseña
				'contrasenaObligatoria' => '',
				'contrasenaOpcional' => '',
				//Fecha
				'fechaObligatoria' => '',
				'fechaOpcional' => '',
				//Teléfono
				'telefonoObligatorio' => '',
				'telefonoOpcional' => '',
				//DNI
				'dniObligatorio' => '',
				'dniOpcional' => '',
				//Codigo Postal
				'codigoPostalObligatorio' => '',
				'codigoPostalOpcional' => '',
                                //URL
                                'urlObligatorio' => '',
                                'urlOpcional' => '',
                                //RANGO
                                'rangoObligatorio' => '',
                                'rangoOpcional' => '',
                                //COLOR
                                'color' => '',
                                //BUSQUEDA
                                'busqueda' => ''
			]; //Almacena las respuestas

			$aErrores = [
				//Alfabético
				'alfabeticoObligatorio' => '',
				'alfabeticoOpcional' => '',
				//Alfanumérico
				'alfanumericoObligatorio' => '',
				'alfanumericoOpcional' => '',
				//Numérico
				'numericoObligatorio' => '',
				'numericoOpcional' => '',
				//Float
				'floatObligatorio' => '',
				'floatOpcional' => '',
				//Email
				'emailObligatorio' => '',
				'emailOpcional' => '',
				//Contraseña
				'contrasenaObligatoria' => '',
				'contrasenaOpcional' => '',
				//Fecha
				'fechaObligatoria' => '',
				'fechaOpcional' => '',
				//Teléfono
				'telefonoObligatorio' => '',
				'telefonoOpcional' => '',
				//DNI
				'dniObligatorio' => '',
				'dniOpcional' => '',
				//Codigo Postal
				'codigoPostalObligatorio' => '',
				'codigoPostalOpcional' => '',
                                //URL
                                'urlObligatorio' => '',
                                'urlOpcional' => '',
                                //RANGO
                                'rangoObligatorio' => '',
                                'rangoOpcional' => '',
                                //COLOR
                                'color' => '',
                                //BUSQUEDA
                                'busqueda' => ''
			]; //Almacena los errores

			//Comprobamos si se ha enviado el formulario
			if (isset($_REQUEST['enviar'])) {
				//Introducimos valores en el array $aErrores si ocurre un error
				$aErrores = [
					//Alfabetico
					'alfabeticoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, 1), // Alfabético obligatorio
					'alfabeticoOpcional' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional']), // Alfabético opcional
					//Alfanumerico
					'alfanumericoObligatorio' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], 1000, 1, 1), // Alfanumérico obligatorio
					'alfanumericoOpcional' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional']), // Alfanumérico opcional
					//Numerico
					'numericoObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['numericoObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1), // Numérico obligatorio
					'numericoOpcional' => validacionFormularios::comprobarEntero($_REQUEST['numericoOpcional']), // Numérico opcional
					//Float
					'floatObligatorio' => validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1), // Float obligatorio
					'floatOpcional' => validacionFormularios::comprobarFloat($_REQUEST['floatOpcional']), // Float opcional
					//Email
					'emailObligatorio' => validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], 1), // Email obligatorio
					'emailOpcional' => validacionFormularios::validarEmail($_REQUEST['emailOpcional']), // Email opcional
					//Contraseña
					'contrasenaObligatoria' => validacionFormularios::validarPassword($_REQUEST['contrasenaObligatoria']), // Contraseña obligatoria
					'contrasenaOpcional' => validacionFormularios::validarPassword($_REQUEST['contrasenaOpcional'], 16, 2, 3, 0), // Contraseña opcional
					//Fecha
					'fechaObligatoria' => validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], $fechaFormateada, "01/01/1900", 1), // Fecha obligatoria
					'fechaOpcional' => validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], $fechaFormateada), // Fecha opcional
					//Telefono
					'telefonoObligatorio' => validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], 1), // Teléfono obligatorio
					'telefonoOpcional' => validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional']), // Teléfono opcional
					//Dni
					'dniObligatorio' => validacionFormularios::validarDni($_REQUEST['dniObligatorio'], 1), // DNI obligatorio
					'dniOpcional' => validacionFormularios::validarDni($_REQUEST['dniOpcional']), // DNI opcional
					//Codigo postal
					'codigoPostalObligatorio' => validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], 1), // Código Postal obligatorio
					'codigoPostalOpcional' => validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional']), // Código Postal opcional
                                        //URL
                                        'urlObligatorio' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], 1),
                                        'urlOpcional' => validacionFormularios::validarURL($_REQUEST['urlOpcional'], 0),
                                        //RANGO
                                        'rangoObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['rangoObligatorio'], 50, 0, 1),
                                        'rangoOpcional' => validacionFormularios::comprobarEntero($_REQUEST['rangoOpcional'], 50, 0, 0),
                                        //COLOR      
                                        'color' => validacionFormularios::comprobarNoVacio($_REQUEST['color']),
                                        //BUSQUEDA
                                        'busqueda' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 50, 1,0),
				];

				//Recorremos el array de errores
				foreach ($aErrores as $campo => $error) {
					if ($error == !'') {
						//Limpiamos el campos
						$entradaOK = false;
						$_REQUEST[$campo] = '';
					}
				}
			} else {
				$entradaOK = false; //Si no ha pulsado el botón de enviar la validación es incorrecta.
			}

			//Si la entrada es Ok almacenamos el valor de la respuesta del usuario en el array $aRespuestas
			if ($entradaOK) {
				//Almacenamos el valor en el array
				$aRespuestas = [
					//Alfabetico
					'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
					'alfabeticoOpcional' => $_REQUEST['alfabeticoOpcional'],
					//Alfanumerico
					'alfanumericoObligatorio' => $_REQUEST['alfanumericoObligatorio'],
					'alfanumericoOpcional' => $_REQUEST['alfanumericoOpcional'],
					//Numerico
					'numericoObligatorio' => $_REQUEST['numericoObligatorio'],
					'numericoOpcional' => $_REQUEST['numericoOpcional'],
					//Float
					'floatObligatorio' => $_REQUEST['floatObligatorio'],
					'floatOpcional' => $_REQUEST['floatOpcional'],
					//Email
					'emailObligatorio' => $_REQUEST['emailObligatorio'],
					'emailOpcional' => $_REQUEST['emailOpcional'],
					//Contraseña
					'contrasenaObligatoria' => $_REQUEST['contrasenaObligatoria'],
					'contrasenaOpcional' => $_REQUEST['contrasenaOpcional'],
					//Fecha
					'fechaObligatoria' => $_REQUEST['fechaObligatoria'],
					'fechaOpcional' => $_REQUEST['fechaOpcional'],
					//Telefono
					'telefonoObligatorio' => $_REQUEST['telefonoObligatorio'],
					'telefonoOpcional' => $_REQUEST['telefonoOpcional'],
					//Dni
					'dniObligatorio' => $_REQUEST['dniObligatorio'],
					'dniOpcional' => $_REQUEST['dniOpcional'],
					//Codigo Postal
					'codigoPostalObligatorio' => $_REQUEST['codigoPostalObligatorio'],
					'codigoPostalOpcional' => $_REQUEST['codigoPostalOpcional'],
                                        //URL
                                        'urlObligatorio' => $_REQUEST['urlObligatorio'],
                                        'urlOpcional' => $_REQUEST['urlOpcional'],
                                        //RANGO
                                        'rangoObligatorio' => $_REQUEST['rangoObligatorio'],
                                        'rangoOpcional' => $_REQUEST['rangoOpcional'],
                                        //COLOR
                                        'color' => $_REQUEST['color']
                                        
				];

				//Mostramos las respuestas por pantalla recorriendo el array $aRespuestas
				foreach ($aRespuestas as $campo => $respuesta) {
					echo "$campo : $respuesta <br>";
				}
			} else {
			?>
				<form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-check-inline" style="width: 50%; position:absolute;  top: 250px; left: 41%;">
					<div style="margin-bottom: 100px">
                                            <!-- Alfabetico -->
                                            <label for="nombre">AlfabeticoObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id="alfabeticoObligatorio" style="background-color: #D2D2D2" name="alfabeticoObligatorio" value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['alfabeticoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfabeticoObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                            <label for="nombre">AlfabeticoOpcional: </label>
                                            <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" value="<?php echo (isset($_REQUEST['alfabeticoOpcional']) ? $_REQUEST['alfabeticoOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['alfabeticoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfabeticoOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!-- Alfanumerico -->
                                            <label for="nombre">AlfanumericoObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id="alfanumericoObligatorio"  name="alfanumericoObligatorio" value="<?php echo (isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['alfanumericoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfanumericoObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">AlfanumericoOpcional: </label>
                                            <input type="text" id="alfanumericoOpcional"  name="alfanumericoOpcional" value="<?php echo (isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['alfanumericoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfanumericoOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!-- Numerico -->
                                             <label for="nombre">NumericoObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='numericoObligatorio'  name='numericoObligatorio' value="<?php echo (isset($_REQUEST['numericoObligatorio']) ? $_REQUEST['numericoObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['numericoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['numericoObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">NumericoOpcional: </label>
                                            <input type="text"  id='numericoOpcional'  name='numericoOpcional' value="<?php echo (isset($_REQUEST['numericoOpcional']) ? $_REQUEST['numericoOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['numericoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['numericoOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!-- Float -->
                                             <label for="nombre">FloatObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='floatObligatorio'  name='floatObligatorio' value="<?php echo (isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['floatObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['floatObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">FloatOpcional: </label>
                                            <input type="text" id='floatOpcional'  name='floatOpcional' value="<?php echo (isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['floatOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['floatOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!--Email-->
                                             <label for="nombre">EmailObligatorio: </label>
                                            <input type="email" style="background-color: #fcfbc2;" id='emailObligatorio'  name='emailObligatorio' value="<?php echo (isset($_REQUEST['emailObligatorio']) ? $_REQUEST['emailObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['emailObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['emailObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">EmailOpcional: </label>
                                            <input type="text" id='emailOpcional'  name='emailOpcional' value="<?php echo (isset($_REQUEST['emailOpcional']) ? $_REQUEST['emailOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['emailOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['emailOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--Contraseña-->
                                             <label for="nombre">ContraseñaObligatoria: </label>
                                            <input type="password" style="background-color: #fcfbc2;" id='contrasenaObligatoria'  name='contrasenaObligatoria' value="<?php echo (isset($_REQUEST['contrasenaObligatoria']) ? $_REQUEST['contrasenaObligatoria'] : ''); ?>">
                                            <?php echo ($aErrores['contrasenaObligatoria'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['contrasenaObligatoria'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">ContraseñaOpcional: </label>
                                            <input type="password" id='contrasenaOpcional'  name='contrasenaOpcional' value="<?php echo (isset($_REQUEST['contrasenaOpcional']) ? $_REQUEST['contrasenaOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['contrasenaOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['contrasenaOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--Fecha-->
                                             <label for="nombre">FechaObligatoria: </label>
                                             <input type="date" style="background-color: #fcfbc2;" id='fechaObligatoria'  name='fechaObligatoria' value="<?php echo (isset($_REQUEST['fechaObligatoria']) ? $_REQUEST['fechaObligatoria'] : ''); ?>">
                                            <?php echo ($aErrores['fechaObligatoria'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fechaObligatoria'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">FechaOpcional: </label>
                                            <input type="text" id='fechaOpcional'  name='fechaOpcional' value="<?php echo (isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['fechaOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fechaOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!--Telefono-->
                                             <label for="nombre">TelefonoObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='telefonoObligatorio'  name='telefonoObligatorio' value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['telefonoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['telefonoObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">TelefonoOpcional: </label>
                                            <input type="tel" id='telefonoOpcional'  name='telefonoOpcional' value="<?php echo (isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['telefonoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['telefonoOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--Dni-->
                                             <label for="nombre">DniObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='dniObligatorio'  name='dniObligatorio' value="<?php echo (isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['dniObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['dniObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                             <label for="nombre">DniOpcional: </label>
                                            <input type="text" id='dniOpcional'  name='dniOpcional' value="<?php echo (isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['dniOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['dniOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--Codigo Postal-->
                                            <label for="nombre">CPObligatorio: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='codigoPostalObligatorio'  name='codigoPostalObligatorio' value="<?php echo (isset($_REQUEST['codigoPostalObligatorio']) ? $_REQUEST['codigoPostalObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['codigoPostalObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['codigoPostalObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                            <label for="nombre">CPOpcional: </label>
                                            <input type="text" id='codigoPostalOpcional'  name='codigoPostalOpcional' value="<?php echo (isset($_REQUEST['codigoPostalOpcional']) ? $_REQUEST['codigoPostalOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['codigoPostalOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['codigoPostalOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <label for="nombre">CPBloqueado: </label>
                                            <input type="text" name="codigoPostalBloqueado" class="entradadatos" disabled/>
                                            <br><br>
                                             <!--URL-->
                                            <label for="nombre">URLObligatoria: </label>
                                            <input type="text" style="background-color: #fcfbc2;" id='urlObligatorio'  name='urlObligatorio' value="<?php echo (isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['urlObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['urlObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                            <label for="nombre">URLOpcional: </label>
                                            <input type="text" id='urlOpcional'  name='urlOpcional' value="<?php echo (isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['urlOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['urlOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--RANGO-->
                                            <label for="nombre">RangoObligatorio: </label>
                                            <input type="range" style="background-color: #fcfbc2;" id='rangoObligatorio'  name='rangoObligatorio' value="<?php echo (isset($_REQUEST['rangoObligatorio']) ? $_REQUEST['rangoObligatorio'] : ''); ?>">
                                            <?php echo ($aErrores['rangoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['rangoObligatorio'] . "</span>" : ''); ?>
                                            <br><br>
                                            <label for="nombre">RangoOpcional: </label>
                                            <input type="range" id='rangoOpcional'  name='rangoOpcional' value="<?php echo (isset($_REQUEST['rangoOpcional']) ? $_REQUEST['rangoOpcional'] : ''); ?>">
                                            <?php echo ($aErrores['rangoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['rangoOpcional'] . "</span>" : ''); ?>
                                            <br><br>
                                            <!--BUSQUEDA-->
                                            <label for="busqueda">Busqueda: </label>
                                            <input type="search" id='busqueda'  name='busqueda' value="<?php echo (isset($_REQUEST['busqueda']) ? $_REQUEST['busqueda'] : ''); ?>">
                                            <?php echo ($aErrores['busqueda'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['busqueda'] . "</span>" : ''); ?>
                                            <br><br>
                                             <!--COLOR-->
                                            <label for="color">Elige un color: </label>
                                            <input type="color" id='color'  name='color' value="<?php echo (isset($_REQUEST['color']) ? $_REQUEST['color'] : ''); ?>">
                                            <?php echo ($aErrores['color'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['color'] . "</span>" : ''); ?>
                                            <br><br>
                                            <input type="submit" value="Enviar" name="enviar">
                                        </div>
				</form>

			<?php
			}
			?>
		</div>
	</main>

	<footer style="position: fixed;
  bottom: 0;
  margin-top: 200px;
  right: 0;
  width: 100%;">
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