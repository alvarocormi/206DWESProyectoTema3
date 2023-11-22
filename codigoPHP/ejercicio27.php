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
    <title>Ejercicio 27 PHP</title>
</head>


<body>
    <header>
        <div class="daw" style="padding-bottom: 0;">
            <span>DWES.</span>
        </div>
    </header>
    <main>
        <div class="contenido" style="padding-top: 0;">
            <h2 style="margin-top: 0;">Ejercicio 27 </h2>
            <p style="margin-bottom: 50px;">UTILIZANDO LA PLANTILLA PARA HACER FORMULARIOS COMO CHURROS</p>
            <?php
            /**
             * @author Rebeca Sánchez Pérez, Alvaro Cordero
             * @version 1.1
             * @since 20/11/2023
             */

            // DECLARACION E INICIALIZACION DE VARIABLES
            // Se incuye la libreria de validacion para usar los metodos de validacion de las entradas del formulario
            require_once '../core/231018libreriaValidacion.php';

            //Declaración de constantes por OBLIGATORIEDAD
            define('OPCIONAL', 0);
            define('OBLIGATORIO', 1);

            //Declaración de los limites para el metodo comprobar ALFABETICO
            define('TAM_MAX_ALFABETICO', 1000);
            define('TAM_MIN_ALFABETICO', 1);

            //Declaración de los limites para el metodo comprobar ALFANUMERICO
            define('TAM_MAX_ALFANUMERICO', 1000);
            define('TAM_MIN_ALFANUMERICO', 1);

            //Declaración de los limites para el metodo comprobar ENTERO
            define('TAM_MAX_ENTERO', PHP_INT_MAX);
            define('TAM_MIN_ENTERO', PHP_INT_MIN);

            //Declaración de los limites para el metodo comprobar FLOAT
            define('TAM_MAX_FLOAT', PHP_FLOAT_MAX);
            define('TAM_MIN_FLOAT', PHP_FLOAT_MIN);

            //Declaración de los limites para el metodo comprobar FECHA
            define('FECHA_MAX', date('d-m-Y'));
            define('FECHA_MIN', "01/01/1950");

            //Declaración de los limites para el metodo comprobar PASSWORD
            define('LONG_MAX', 16);
            define('LONG_MIN', 2);
            //Hace referencia a los tipos de complejidad de la contraseña
            define('LOW', 1);
            define('MEDIUM', 2);
            define('HARD', 3);

            //Declaración del limite de caracteres para metodos que comprueben un MAXIMO y MINIMO (MINTAMANIO/MAXTAMANIO/NOMBREARCHIVO)
            define('TAM_MAX_CARACTERES', 16);
            define('TAM_MIN_CARACTERES', 1);

            //Declaración del limite de alfanumericos dentro del campo TEXTAREA
            define("TAM_MAX_TEXTO", 255);
            define("TAM_MIN_TEXTO", 1);

            // Se crea una funcion a la que si se le pasa un numero del 1 al 12, devuelve el mes del año en español
            function obtenerMes($mes)
            {
                $aMeses = [
                    1 => "enero",
                    2 => "febrero",
                    3 => "marzo",
                    4 => "abril",
                    5 => "mayo",
                    6 => "junio",
                    7 => "julio",
                    8 => "agosto",
                    9 => "septiembre",
                    10 => "octubre",
                    11 => "noviembre",
                    12 => "diciembre"
                ];
                return $aMeses[$mes];
            }

            // Se crea una funcion a la que si se le pasa un numero del 1 al 12, devuelve el dia de la semana en español
            function obtenerDiaSemana($dia)
            {
                $aDiasSemana = [
                    1 => "lunes",
                    2 => "martes",
                    3 => "miercoles",
                    4 => "jueves",
                    5 => "viernes",
                    6 => "sabado",
                    7 => "domingo"
                ];
                return $aDiasSemana[$dia];
            }

            // Se instancia un objeto que almacena la fecha y hora actual de la region de Europe/Madrid
            $oFecha = new DateTime('now', new DateTimeZone('Europe/Madrid'));

            // Se instancia un objeto DateTime que almacena la fecha actual
            $oFechaActual = new DateTime();

            // La varible $entradaOK es un interruptor que recibe el valor true cuando no existe ningun error en la entrada
            $entradaOK = true;

            // El array $aRespuestas almacena los valores que son introducidos en cada input del formulario
            $aRespuestas = [
                'alfabeticoObligatorio' => "",
                'fechaObligatorio' => "",
                'radioButtonObligatorio' => "",
                'enteroObligatorio' => "",
                'listaObligatorio' => "",
                'textAreaObligatorio' => ""
            ];

            // El array $aErrores almacena los valores que no cumplan los requisitos que se hayan introducido en el formulario
            $aErrores = [
                'alfabeticoObligatorio' => "",
                'fechaObligatorio' => "",
                'radioButtonObligatorio' => "",
                'enteroObligatorio' => "",
                'listaObligatorio' => "",
                'textAreaObligatorio' => ""
            ];

            // Si el fromulario ha sido rellenado, se valida la entrada
            if (isset($_REQUEST['enviar'])) {
                // VALIDACIONES
                $aErrores = [
                    'alfabeticoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO),
                    'fechaObligatorio' => validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], FECHA_MAX, FECHA_MIN, OBLIGATORIO),
                    'radioButtonObligatorio' => NULL,
                    'enteroObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], TAM_MAX_ENTERO, TAM_MIN_ENTERO, OBLIGATORIO),
                    'listaObligatorio' => NULL,
                    'textAreaObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaObligatorio'], TAM_MAX_TEXTO, TAM_MIN_TEXTO, OBLIGATORIO)
                ];

                /*
                 * En los siguientes 'if' comprobamos que existe valor dentro de las siguientes variables y en caso negativo mostramos un mensaje error.
                 * Ya que dentro de la función validarElementoLista' no tenemos manera de hacerlo obligatorio, lo hacemos por el siguiente 'if'.
                 */
                if (!isset($_REQUEST['radioButtonObligatorio'])) {
                    $aErrores['radioButtonObligatorio'] = "Debes elegir al menos 1 opción.";
                }

                // Se recorre el array de errores 
                foreach ($aErrores as $campo => $error) {
                    // Si existe algun error se cambia el valor de $entradaOK a false y se limpia ese campo
                    if ($error != null) {
                        $_REQUEST[$campo] = "";
                        $entradaOK = false;
                    }
                }

                // Si el formulario NUNCA ha sido rellenado, se inicializa $entradaOK a false    
            } else {
                $entradaOK = false;
            }

            // Si todos los valores intruducidos son correctos, se muestran los campos del formulario y sus respuestas
            if ($entradaOK) {
                // TRATAMIENTO DE DATOS
                // Se añaden al array $aRespuestas las respuestas cuando son correctas
                $aRespuestas = [
                    'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
                    'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                    'radioButtonObligatorio' => $_REQUEST['radioButtonObligatorio'],
                    'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                    'listaObligatorio' => $_REQUEST['listaObligatorio'],
                    'textAreaObligatorio' => $_REQUEST['textAreaObligatorio']
                ];

                // Se obtiene el numero del mes de la fecha actual
                $mes = $oFechaActual->format("n");
                // Se obtiene el numero del dia de la semana de la fecha actual
                $diaSemana = $oFechaActual->format("w");
                // Se llama a la funcion obtenerMes() y se acumula su valor en $nombreMes
                $nombreMes = obtenerMes($mes);
                // Se llama a la funcion obtenerDiaSemana() y se acumula su valor en $nombreDiaSemana
                $nombreDiaSemana = obtenerDiaSemana($diaSemana);
                // Se instancia un objeto DateTime que almacena la fecha de nacimiento insertada en el formulario
                $oFechaNac = new DateTime($aRespuestas['fechaObligatorio']);
                // Se calcula la diferencia entre la fecha actual y la fecha de nacimiento
                $oAnyos = $oFechaActual->diff($oFechaNac);

                echo ('<div>');
                echo ('Hoy <b>' . $nombreDiaSemana . ' ' . $oFechaActual->format('d') . ' de ' . $nombreMes . ' del ' . $oFechaActual->format('Y') . '</b> a las <b>' . $oFechaActual->format('H:i') . '</b>.<br>');
                echo ('D. <b>' . $aRespuestas['alfabeticoObligatorio'] . '</b> nacido hace <b>' . $oAnyos->y . '</b> años se siente <b>' . $aRespuestas['radioButtonObligatorio'] . '</b>.<br>');
                echo ('Valora su curso actual con <b>' . $aRespuestas['enteroObligatorio'] . '</b> sobre 10.<br>');
                echo ('Estas navidades las dedicará a <b>' . $aRespuestas['listaObligatorio'] . '</b><br>');
                echo ('Y, además, opina que: <br>');
                echo ('<b>' . $aRespuestas['textAreaObligatorio'] . '</b>');
                echo ("</div>");

                // Si no son correctos los valores de entrada, se muestra el formulario 
            } else {
            ?>
                <!-- Se crea un formulario tipo post -->
                <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form23" style="width: 50%; position:absolute;  top: 190px; left: 41%; padding-bottom: 100px">

                    <!-- Alfabético Obligatorio -->
                    <label for="alfabeticoObligatorio">Nombre y apellidos del alumno:</label>
                    <input class="iObligatorio" type="text" name="alfabeticoObligatorio" value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : ''); ?>">
                    <?php echo ($aErrores['alfabeticoObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['alfabeticoObligatorio'] . "</span>" : ''); ?>
                    <br><br>

                    <!-- Fecha Obligatorio -->
                    <label for="fechaObligatorio">Fecha de nacimiento:</label>
                    <input class="iObligatorio" type="text" name="fechaObligatorio" value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : ''); ?>">
                    <?php echo ($aErrores['fechaObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['fechaObligatorio'] . "</span>" : ''); ?>
                    <br><br>

                    <!-- Radio Obligatorio -->
                    <label for="radioButtonObligatorio">¿Cómo te sientes hoy?</label>
                    <br>
                    
                    <input class="iRadio" type="radio" id="muymal" name="radioButtonObligatorio" value="muy mal"
                    <?php if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'muy mal') {
                        echo 'checked';
                    } ?>>
                    <label for="radioButtonObligatorio">MUY MAL</label>
                    <br>

                    <input class="iRadio" type="radio" id="mal" name="radioButtonObligatorio" value="mal" 
                    <?php if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'mal') {
                    echo 'checked';
                    } ?>>
                    <label for="radioButtonObligatorio">MAL</label>
                    <br>

                    <input class="iRadio" type="radio" id="regular" name="radioButtonObligatorio" value="regular" 
                    <?php if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'regular') {
                    echo 'checked';
                    } ?>>
                    <label for="radioButtonObligatorio">REGULAR</label>
                    <br>

                    <input class="iRadio" type="radio" id="bien" name="radioButtonObligatorio" value="bien" 
                    <?php if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'bien') {
                    echo 'checked';
                    } ?>>

                    <label for="radioButtonObligatorio">BIEN</label>
                    <br>

                    <input class="iRadio" type="radio" id="muybien" name="radioButtonObligatorio" value="muy bien" 
                    <?php if (is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio'] == 'muy bien') {
                     echo 'checked';
                    } ?>>

                    <label for="radioButtonObligatorio">MUY BIEN</label>
                    <?php echo ($aErrores['radioButtonObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['radioButtonObligatorio'] . "</span>" : ''); ?>
                    <br><br>
                

                    <!-- Entero Obligatorio -->
                    <label for="enteroObligatorio">¿Cómo va el curso? [1-10]</label>
                    <input class="iObligatorio" type="text" name="enteroObligatorio" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : ''); ?>">
                    <?php echo ($aErrores['enteroObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['enteroObligatorio'] . "</span>" : ''); ?>
                    <br><br>

                    <!-- Lista Obligatorio -->
                    <label for="listaObligatorio">¿Cómo se presentan las vacaciones de navidad?</label>
                    <br>

                    <select class="iObligatorio" name="listaObligatorio">
                        <option value="ni idea" <?php if (isset($_REQUEST['listaObligatorio'])) {
                                                    echo 'selected';
                                                } ?>>Ni idea</option>
                        <option value="con la familia" <?php if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        } ?>>Con la familia</option>
                        <option value="de fiesta" <?php if (isset($_REQUEST['listaObligatorio'])) {
                                                        echo 'selected';
                                                    } ?>>De fiesta</option>
                        <option value="trabajando" <?php if (isset($_REQUEST['listaObligatorio'])) {
                                                        echo 'selected';
                                                    } ?>>Trabajando</option>
                        <option value="estudiando DWES" <?php if (isset($_REQUEST['listaObligatorio'])) {
                                                            echo 'selected';
                                                        } ?>>Estudiando DWES</option>
                    </select>
                    <?php echo ($aErrores['listaObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['listaObligatorio'] . "</span>" : ''); ?>
                    <br><br>

                    <!-- TextArea Obligatorio -->                                            
                    <label for="textAreaObligatorio">Describe brevemente tu estado de ánimo:</label>
                    <br>
                    <textarea class="iObligatorio" rows="4" cols="50" name="textAreaObligatorio">
                        <?php if ($aErrores['textAreaObligatorio'] == null && isset($_REQUEST['textAreaObligatorio'])) {
                         echo ($_REQUEST['textAreaObligatorio']);
                         } ?>
                    </textarea>

                    <?php echo ($aErrores['textAreaObligatorio'] != '' ? "<span style='color:red; padding: 0; margin: 0;'>" . $aErrores['textAreaObligatorio'] . "</span>" : ''); ?>
                    
                    </table>

                    <br><br>
                    <button type="submit" name="enviar">Enviar</button>
                </form>
            <?php
            }
            ?>
    </main>
    <?php
    require_once('../codigoPHP/footer.php');
    ?>
</body>

</html>