<?php

/**
 * Ejercicio 25
 * 
 * 
 * @author Alvaro Cordero Miñambres
 * @version 1.0 
 * @since 29/10/2023
 * 
 * @Annotation Plantilla para hacer formularios como churros
 * 
 */

//Incluimos el header de nuestra pagina web
require_once('../codigoPHP/head.php');

//Incluimos la libreria de validacion de formularios
require_once('../core/231018libreriaValidacion.php');

//Inicializacion de variables
$ofechaActual = new DateTime();

/**
 * Formateamos la fecha mediante la funcion date_format()
 * date_format() Devuelve la fecha formateada según el formato dado
 */
$fechaFormateada = date_format($ofechaActual, "Y-m-d");

//Indica si todas las respuestas son correctas
$entradaOK = true;

/**
 * Mediante este array vamos a guardar las reespuestas que le vamos a dar al usuario
 * Inicializamos los valores
 */
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
	'busqueda' => '',

	//LISTA
	'listaDesplegable' => null,

	//FICHERO
	'fichero' => null

];

/**
 * Mediante este array vamos a almacenar los mensajes de error que le vamos a mostrar al usuario
 * Inicializamos los valores
 */
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
	'busqueda' => '',

	//LISTA
	'listaDesplegable' => null,

	//FICHERO
	'fichero' => null

];


//Array para recoger la opción de la lista desplegable
$aOpcionesListaDesplegable = [

	//Estas son las opciones que va a tener la lista
	'null',
	'Opcion1',
	'Opcion2',
	'Opcion3'
];

/**
 * Mediante isset() comprobamos que el campo enviar no este null ni vacio
 * Comprobamos que el usuario le ha dado al boton de enviar y si eeso ocurre haremos lo siguiente
 */
if (isset($_REQUEST['enviar'])) {

	//Introducimos valores en el array $aErrores si ocurre un error
	// Validaciones para campos alfabéticos
	$aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, 1); // Alfabético obligatorio
	$aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional']); // Alfabético opcional

	// Validaciones para campos alfanuméricos
	$aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], 1000, 1, 1); // Alfanumérico obligatorio
	$aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional']); // Alfanumérico opcional

	// Validaciones para campos numéricos
	$aErrores['numericoObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['numericoObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1); // Numérico obligatorio
	$aErrores['numericoOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['numericoOpcional']); // Numérico opcional

	// Validaciones para campos float
	$aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_INT_MAX, -PHP_INT_MAX, 1); // Float obligatorio
	$aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional']); // Float opcional

	// Validaciones para campos de correo electrónico
	$aErrores['emailObligatorio'] = validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], 1); // Email obligatorio
	$aErrores['emailOpcional'] = validacionFormularios::validarEmail($_REQUEST['emailOpcional']); // Email opcional

	// Validaciones para campos de contraseña
	$aErrores['contrasenaObligatoria'] = validacionFormularios::validarPassword($_REQUEST['contrasenaObligatoria']); // Contraseña obligatoria
	$aErrores['contrasenaOpcional'] = validacionFormularios::validarPassword($_REQUEST['contrasenaOpcional'], 16, 2, 3, 0); // Contraseña opcional

	// Validaciones para campos de fecha
	$aErrores['fechaObligatoria'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], $fechaFormateada, "01/01/1900", 1); // Fecha obligatoria
	$aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], $fechaFormateada); // Fecha opcional

	// Validaciones para campos de teléfono
	$aErrores['telefonoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], 1); // Teléfono obligatorio
	$aErrores['telefonoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional']); // Teléfono opcional

	// Validaciones para campos de DNI
	$aErrores['dniObligatorio'] = validacionFormularios::validarDni($_REQUEST['dniObligatorio'], 1); // DNI obligatorio
	$aErrores['dniOpcional'] = validacionFormularios::validarDni($_REQUEST['dniOpcional']); // DNI opcional

	// Validaciones para campos de código postal
	$aErrores['codigoPostalObligatorio'] = validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], 1); // Código Postal obligatorio
	$aErrores['codigoPostalOpcional'] = validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional']); // Código Postal opcional

	// Validaciones para campos de URL
	$aErrores['urlObligatorio'] = validacionFormularios::validarURL($_REQUEST['urlObligatorio'], 1); // Url obligatorio
	$aErrores['urlOpcional'] = validacionFormularios::validarURL($_REQUEST['urlOpcional'], 0); // Url opcional

	// Validaciones para campos de rango
	$aErrores['rangoObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['rangoObligatorio'], 50, 0, 1); // Rango obligatorio
	$aErrores['rangoOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['rangoOpcional'], 50, 0, 0); // Rango opcional

	// Validaciones para campos de color
	$aErrores['color'] = validacionFormularios::comprobarNoVacio($_REQUEST['color']); // Color

	// Validaciones para campos de búsqueda
	$aErrores['busqueda'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 50, 1, 0); // Búsqueda

	// Validaciones para campos de lista desplegable
	$aErrores['listaDesplegable'] = validacionFormularios::validarElementoEnLista($_REQUEST['listaDesplegable'], $aOpcionesListaDesplegable); // Lista desplegable

	// Validaciones para campos de archivo
	$aErrores['fichero'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['fichero'], 50, 0, 0); // Fichero

	//Recorremos el array de errores mediante un foreach
	foreach ($aErrores as $campo => $error) {

		//Si hay errores
		if ($error == !'') {

			//Ponemos la variable entradaOk a false
			$entradaOK = false;

			//Limpiamos el campos
			$_REQUEST[$campo] = '';
		}
	}

	//Si no ha pulsado el botón de enviar la validación es incorrecta.
} else {
	$entradaOK = false;
}

//Si la entrada es Ok almacenamos el valor de la respuesta del usuario en el array $aRespuestas
if ($entradaOK) {

	//Almacenamos el valor en el array
	// Respuestas para campos alfabéticos
	$aRespuestas['alfabeticoObligatorio'] = $_REQUEST['alfabeticoObligatorio'];
	$aRespuestas['alfabeticoOpcional'] = $_REQUEST['alfabeticoOpcional'];

	// Respuestas para campos alfanuméricos
	$aRespuestas['alfanumericoObligatorio'] = $_REQUEST['alfanumericoObligatorio'];
	$aRespuestas['alfanumericoOpcional'] = $_REQUEST['alfanumericoOpcional'];

	// Respuestas para campos numéricos
	$aRespuestas['numericoObligatorio'] = $_REQUEST['numericoObligatorio'];
	$aRespuestas['numericoOpcional'] = $_REQUEST['numericoOpcional'];

	// Respuestas para campos float
	$aRespuestas['floatObligatorio'] = $_REQUEST['floatObligatorio'];
	$aRespuestas['floatOpcional'] = $_REQUEST['floatOpcional'];

	// Respuestas para campos de correo electrónico
	$aRespuestas['emailObligatorio'] = $_REQUEST['emailObligatorio'];
	$aRespuestas['emailOpcional'] = $_REQUEST['emailOpcional'];

	// Respuestas para campos de contraseña
	$aRespuestas['contrasenaObligatoria'] = $_REQUEST['contrasenaObligatoria'];
	$aRespuestas['contrasenaOpcional'] = $_REQUEST['contrasenaOpcional'];

	// Respuestas para campos de fecha
	$aRespuestas['fechaObligatoria'] = $_REQUEST['fechaObligatoria'];
	$aRespuestas['fechaOpcional'] = $_REQUEST['fechaOpcional'];

	// Respuestas para campos de teléfono
	$aRespuestas['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio'];
	$aRespuestas['telefonoOpcional'] = $_REQUEST['telefonoOpcional'];

	// Respuestas para campos de DNI
	$aRespuestas['dniObligatorio'] = $_REQUEST['dniObligatorio'];
	$aRespuestas['dniOpcional'] = $_REQUEST['dniOpcional'];

	// Respuestas para campos de código postal
	$aRespuestas['codigoPostalObligatorio'] = $_REQUEST['codigoPostalObligatorio'];
	$aRespuestas['codigoPostalOpcional'] = $_REQUEST['codigoPostalOpcional'];

	// Respuestas para campos de URL
	$aRespuestas['urlObligatorio'] = $_REQUEST['urlObligatorio'];
	$aRespuestas['urlOpcional'] = $_REQUEST['urlOpcional'];

	// Respuestas para campos de rango
	$aRespuestas['rangoObligatorio'] = $_REQUEST['rangoObligatorio'];
	$aRespuestas['rangoOpcional'] = $_REQUEST['rangoOpcional'];

	// Respuestas para campos de color
	$aRespuestas['color'] = $_REQUEST['color'];

	// Respuestas para campos de búsqueda
	$aRespuestas['busqueda'] = $_REQUEST['busqueda'];

	// Respuestas para campos de lista desplegable
	$aRespuestas['listaDesplegable'] = $_REQUEST['listaDesplegable'];

	// Respuestas para campos de archivo
	/**
	 * @link https://php.net/manual/en/function.basename.php
	 * 
	 * Utilizando la función basename para obtener el nombre de un fichero
	 */
	$aRespuestas['fichero'] =  basename($_REQUEST['fichero']);

	echo "<table class='table-light table-bordered' style='width: 30%;'><thead><tr style='text-align: center'><th>CAMPO</th><th>RESPUESTA</th<thead><tbody>";

	//Mostramos las respuestas por pantalla recorriendo el array $aRespuestas
	foreach ($aRespuestas as $campo => $respuesta) {

		//Mostramos por pantalla mediante echo el campo -> respuesta
		echo ("
			<tr>
				<td style='padding: 5px'><b>$campo<b></td>
				<td style='padding: 5px'>$respuesta</td>
			</tr>		
		");
	}

	echo "</tbody></table>";

	//Si la entrada OK es false mostramos el formulario
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
			<input type="text" style="background-color: #fcfbc2;" id="alfanumericoObligatorio" name="alfanumericoObligatorio" value="<?php echo (isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : ''); ?>">
			<?php echo ($aErrores['alfanumericoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfanumericoObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">AlfanumericoOpcional: </label>
			<input type="text" id="alfanumericoOpcional" name="alfanumericoOpcional" value="<?php echo (isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : ''); ?>">
			<?php echo ($aErrores['alfanumericoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfanumericoOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!-- Numerico -->
			<label for="nombre">NumericoObligatorio: </label>
			<input type="text" style="background-color: #fcfbc2; width: 80px;" id='numericoObligatorio' name='numericoObligatorio' value="<?php echo (isset($_REQUEST['numericoObligatorio']) ? $_REQUEST['numericoObligatorio'] : ''); ?>">
			<?php echo ($aErrores['numericoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['numericoObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">NumericoOpcional: </label>
			<input type="text" id='numericoOpcional' name='numericoOpcional' style=" width: 80px;" value="<?php echo (isset($_REQUEST['numericoOpcional']) ? $_REQUEST['numericoOpcional'] : ''); ?>">
			<?php echo ($aErrores['numericoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['numericoOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!-- Float -->
			<label for="nombre">FloatObligatorio: </label>
			<input type="text" style="background-color: #fcfbc2; width: 80px;" id='floatObligatorio' name='floatObligatorio' value="<?php echo (isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : ''); ?>">
			<?php echo ($aErrores['floatObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['floatObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">FloatOpcional: </label>
			<input type="text" id='floatOpcional' name='floatOpcional' style="width: 80px;" value="<?php echo (isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : ''); ?>">
			<?php echo ($aErrores['floatOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['floatOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Email-->
			<label for="nombre">EmailObligatorio: </label>
			<input type="email" style="background-color: #fcfbc2;" id='emailObligatorio' name='emailObligatorio' value="<?php echo (isset($_REQUEST['emailObligatorio']) ? $_REQUEST['emailObligatorio'] : ''); ?>">
			<?php echo ($aErrores['emailObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['emailObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">EmailOpcional: </label>
			<input type="text" id='emailOpcional' name='emailOpcional' value="<?php echo (isset($_REQUEST['emailOpcional']) ? $_REQUEST['emailOpcional'] : ''); ?>">
			<?php echo ($aErrores['emailOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['emailOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Contraseña-->
			<label for="nombre">ContraseñaObligatoria: </label>
			<input type="password" style="background-color: #fcfbc2;" id='contrasenaObligatoria' name='contrasenaObligatoria' value="<?php echo (isset($_REQUEST['contrasenaObligatoria']) ? $_REQUEST['contrasenaObligatoria'] : ''); ?>">
			<?php echo ($aErrores['contrasenaObligatoria'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['contrasenaObligatoria'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">ContraseñaOpcional: </label>
			<input type="password" id='contrasenaOpcional' name='contrasenaOpcional' value="<?php echo (isset($_REQUEST['contrasenaOpcional']) ? $_REQUEST['contrasenaOpcional'] : ''); ?>">
			<?php echo ($aErrores['contrasenaOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['contrasenaOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Fecha-->
			<label for="nombre">FechaObligatoria: </label>
			<input type="date" style="background-color: #fcfbc2; width: 130px" id='fechaObligatoria' name='fechaObligatoria' value="<?php echo (isset($_REQUEST['fechaObligatoria']) ? $_REQUEST['fechaObligatoria'] : ''); ?>">
			<?php echo ($aErrores['fechaObligatoria'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fechaObligatoria'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">FechaOpcional: </label>
			<input type="text" id='fechaOpcional' name='fechaOpcional' style="width: 130px" value="<?php echo (isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : ''); ?>">
			<?php echo ($aErrores['fechaOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fechaOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Telefono-->
			<label for="nombre">TelefonoObligatorio: </label>
			<input type="text" style="background-color: #fcfbc2; width: 100px;" id='telefonoObligatorio' name='telefonoObligatorio' value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : ''); ?>">
			<?php echo ($aErrores['telefonoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['telefonoObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">TelefonoOpcional: </label>
			<input type="tel" id='telefonoOpcional' name='telefonoOpcional' style="width: 100px;" value="<?php echo (isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : ''); ?>">
			<?php echo ($aErrores['telefonoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['telefonoOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Dni-->
			<label for="nombre">DniObligatorio: </label>
			<input type="text" style="background-color: #fcfbc2; width: 100px;" id='dniObligatorio' name='dniObligatorio' value="<?php echo (isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : ''); ?>">
			<?php echo ($aErrores['dniObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['dniObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">DniOpcional: </label>
			<input type="text" id='dniOpcional' name='dniOpcional' style="width: 100px;" value="<?php echo (isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : ''); ?>">
			<?php echo ($aErrores['dniOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['dniOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--Codigo Postal-->
			<label for="nombre">CPObligatorio: </label>
			<input type="text" style="background-color: #fcfbc2; width: 70px;" id='codigoPostalObligatorio' name='codigoPostalObligatorio' value="<?php echo (isset($_REQUEST['codigoPostalObligatorio']) ? $_REQUEST['codigoPostalObligatorio'] : ''); ?>">
			<?php echo ($aErrores['codigoPostalObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['codigoPostalObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">CPOpcional: </label>
			<input type="text" id='codigoPostalOpcional' name='codigoPostalOpcional' style="width: 70px;" value="<?php echo (isset($_REQUEST['codigoPostalOpcional']) ? $_REQUEST['codigoPostalOpcional'] : ''); ?>">
			<?php echo ($aErrores['codigoPostalOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['codigoPostalOpcional'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">CPBloqueado: </label>
			<input type="text" name="codigoPostalBloqueado" style="width: 70px;" class="entradadatos" disabled />
			<br><br>

			<!--URL-->
			<label for="nombre">URLObligatoria: </label>
			<input type="text" style="background-color: #fcfbc2;" id='urlObligatorio' name='urlObligatorio' value="<?php echo (isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : ''); ?>">
			<?php echo ($aErrores['urlObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['urlObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">URLOpcional: </label>
			<input type="url" id='urlOpcional' name='urlOpcional' value="<?php echo (isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : ''); ?>">
			<?php echo ($aErrores['urlOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['urlOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--RANGO-->
			<label for="nombre">RangoObligatorio: </label>
			<input type="range" style="background-color: #fcfbc2;" id='rangoObligatorio' name='rangoObligatorio' value="<?php echo (isset($_REQUEST['rangoObligatorio']) ? $_REQUEST['rangoObligatorio'] : ''); ?>">
			<?php echo ($aErrores['rangoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['rangoObligatorio'] . "</span>" : ''); ?>
			<br><br>

			<label for="nombre">RangoOpcional: </label>
			<input type="range" id='rangoOpcional' name='rangoOpcional' value="<?php echo (isset($_REQUEST['rangoOpcional']) ? $_REQUEST['rangoOpcional'] : ''); ?>">
			<?php echo ($aErrores['rangoOpcional'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['rangoOpcional'] . "</span>" : ''); ?>
			<br><br>

			<!--FICHERO-->
			<label for="fichero">Fichero: </label>
			<input type="file" id='fichero' name='fichero' value="<?php echo (isset($_REQUEST['fichero']) ? $_REQUEST['fichero'] : ''); ?>">
			<?php echo ($aErrores['fichero'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fichero'] . "</span>" : ''); ?>
			<br><br>

			<!--BUSQUEDA-->
			<label for="busqueda">Busqueda: </label>
			<input type="search" id='busqueda' name='busqueda' value="<?php echo (isset($_REQUEST['busqueda']) ? $_REQUEST['busqueda'] : ''); ?>">
			<?php echo ($aErrores['busqueda'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['busqueda'] . "</span>" : ''); ?>
			<br><br>

			<!--COLOR-->
			<label for="color">Elige un color: </label>
			<input type="color" id='color' name='color' value="<?php echo (isset($_REQUEST['color']) ? $_REQUEST['color'] : ''); ?>">
			<?php echo ($aErrores['color'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['color'] . "</span>" : ''); ?>
			<br><br>

			<!--LISTA -->
			<label for="lista">ListaDesplegable: </label>
			<select name="listaDesplegable" value="<?php echo (isset($_REQUEST['listaDesplegable']) ? $_REQUEST['listaDesplegable'] : ''); ?>">
				<option value="null">Elija una opcion :</option>
				<option value="Opcion1">Opcion1</option>
				<option value="Opcion2">Opcion2</option>
				<option value="Opcion3">Opcion3</option>
			</select>
			<?php echo ($aErrores['listaDesplegable'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['listaDesplegable'] . "</span>" : ''); ?>
			<br><br>


			<!--ENVIAR-->
			<input type="submit" value="Enviar" name="enviar">
		</div>
	</form>

<?php
}
?>
</div>
</main>
<?php
//Incluimos el footer de nuestra pagina web
require_once('../codigoPHP/footer.php');
?>
</body>

</html>