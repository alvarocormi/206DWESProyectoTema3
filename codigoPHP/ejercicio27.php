<!DOCTYPE html>
<!--
	Descripción: CodigoEjercicio25
	Autor: Carlos García Cachón
	Fecha de creación/modificación: 28/10/2023
-->
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="generator" content="60">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alvaro Cordero Miñambres</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../webroot/css/proyectoTema3.css" />
<link rel="stylesheet" href="../../webroot/css/main.css" />
</head>

<body>
    <header class="text-center">
        <h1>Ejercicio 27</h1>
    </header>
    <main>
        <div class="container mt-3 text-center">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <?php
                    /**
                    * @author Alvaro Cordero Miñambres
                    * @version 1.2
                    * @since 30/10/2023
                    */
                    //Incluyo las librerias de validación para comprobar los campos
                    require_once '../core/231018libreriaValidacion.php';
                    
                    //Declaración de constantes por OBLIGATORIEDAD
                    define('OPCIONAL',0);
                    define('OBLIGATORIO',1);
                    
                    //Declaración de los limites para el metodo comprobar ALFABETICO
                    define('TAM_MAX_ALFABETICO',1000);
                    define('TAM_MIN_ALFABETICO',1);
                    
                    //Declaración de los limites para el metodo comprobar ALFANUMERICO
                    define('TAM_MAX_ALFANUMERICO',1000);
                    define('TAM_MIN_ALFANUMERICO',1);
                    
                    //Declaración de los limites para el metodo comprobar ENTERO
                    define('TAM_MAX_ENTERO',PHP_INT_MAX);
                    define('TAM_MIN_ENTERO',PHP_INT_MIN);
                    
                    //Declaración de los limites para el metodo comprobar FLOAT
                    define('TAM_MAX_FLOAT',PHP_FLOAT_MAX);
                    define('TAM_MIN_FLOAT',PHP_FLOAT_MIN);
                    
                    //Declaración de los limites para el metodo comprobar FECHA
                    define('FECHA_MAX',date('d-m-Y'));
                    define('FECHA_MIN',"01/01/1950");
                    
                    //Declaración de los limites para el metodo comprobar PASSWORD
                    define('LONG_MAX',16);
                    define('LONG_MIN',2);
                    //Hace referencia a los tipos de complejidad de la contraseña
                    define('LOW',1); 
                    define('MEDIUM',2);
                    define('HARD',3);
                    
                    //Declaración del limite de caracteres para metodos que comprueben un MAXIMO y MINIMO (MINTAMANIO/MAXTAMANIO/NOMBREARCHIVO)
                    define('TAM_MAX_CARACTERES',16);
                    define('TAM_MIN_CARACTERES',1);
                    
                    //Declaración del limite de alfanumericos dentro del campo TEXTAREA
                    define("TAM_MAX_TEXTO", 255);
                    define("TAM_MIN_TEXTO", 1);
                    
                    //Declaración de un array para que almacene las EXTENSIONES por defecto de la función validarNombreArchivo
                    $aExtensiones = ['txt','json'];
                    
                    //Declaración de un array LISTA
                    $aListaVacaciones = ['NiIdea', 'ConLaFamilia', 'DeFiesta', 'Trabajando', 'EstudiandoDWES'];
                    
                    //Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
                    //Valores por defecto
                    $entradaOK = true;
                    
                    $aRespuestas = [
                        'nombre' => '',
                        'fechaNacimiento' => '',
                        'estadoDeHoy' => '',
                        'nivelCurso' => '',
                        'vacaciones' => '',
                        'estadoDeAnimo' => ''

                    ];
                    
                    $aErrores = [
                        'nombre' => '',
                        'fechaNacimiento' => '',
                        'estadoDeHoy' => '',
                        'nivelCurso' => '',
                        'vacaciones' => '',
                        'estadoDeAnimo' => ''
                    ];
                    
                    //En el siguiente if pregunto si el '$_REQUEST' recupero el valor 'enviar' que enviamos al pulsar el boton de enviar del formulario.
                    if (isset($_REQUEST['enviar'])) {
                        /*
                         * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
                         * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
                         * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
                         */ 
                        $aErrores = [
                            'nombre' => validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO),

                            'nivelCurso' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], TAM_MAX_ENTERO, TAM_MIN_ENTERO, OBLIGATORIO),

                            'fechaNacimiento' => validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'],FECHA_MAX, FECHA_MIN, OBLIGATORIO),
                            
                            'estadoDeHoy' => NULL,
                            
                            'vacaciones' => validacionFormularios::validarElementoEnLista($_REQUEST['vacaciones'], $aListaVacaciones),
                        
                            'estadoDeAnimo' => validacionFormularios::comprobarAlfanumerico($_REQUEST['estadoDeAnimo'], TAM_MAX_TEXTO, TAM_MIN_TEXTO, OBLIGATORIO),
                        ];
                        
                        /* 
                         * En los siguientes 'if' comprobamos que existe valor dentro de las siguientes variables y en caso negativo mostramos un mensaje error.
                         * Ya que dentro de la función validarElementoLista' no tenemos manera de hacerlo obligatorio, lo hacemos por el siguiente 'if'.
                         */
                        if (!isset($_REQUEST['estadoDeHoy'])) {$aErrores['estadoDeHoy'] = "Debes elegir al menos 1 opción.";}
                        
                        /*
                         * En este foreach recorremos el array buscando que exista NULL (Los metodos anteriores si son correctos devuelven NULL)
                         * y en caso negativo cambiara el valor de '$entradaOK' a false y borrara el contenido del campo.
                         */
                        foreach ($aErrores as $campo => $error) {
                            if ($error != null) {
                                $_REQUEST[$campo] = "";
                                $entradaOK = false;
                            }
                        }
                    } else {
                        $entradaOK = false;
                    }
                    //En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
                    if ($entradaOK) {
                        $aRespuestas = [
                            'nombre' => $_REQUEST('nombre'),
                            'fechaNacimiento' => $_REQUEST('fechaNacimiento'),
                            'estadoDeHoy' => $_REQUEST('estadoDeHoy'),
                            'nivelCurso' => $_REQUEST('nivelCurso'),
                            'vacaciones' => $_REQUEST('vacaciones'),
                            'estadoDeAnimo' => $_REQUEST('estadoDeAnimo')
                        ];
                        //Aqui recorremos el array mostrando los valores alamacenados en el array anterior
                        echo("<div>");
                        echo "<h2>Respuestas:</h2>";
                        foreach ($aRespuestas as $campo => $respuesta) {
                            
                                echo "<p class='d-flex justify-content-start'>".strtoupper($campo)." : ". $respuesta."</p>";
                            
                        }
                        echo("</div>");
                    } else {
                    ?>
                    <!-- Codigo del formulario -->
                    <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <fieldset>
                            <table>
                                
                                <tbody>
                                    <tr>
                                        <!-- Alfabético Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="nombre">Nombre y apellidos del alumno:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name='nombre' placeholder="cadena_de_letras" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['nombre'])){ echo $aErrores['nombre'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Fecha Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="fechaObligatorio">Fecha de nacimiento:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name='fechaNacimiento' placeholder="Año-Mes-dia/2000-01-01" value="<?php echo (isset($_REQUEST['fechaNacimiento']) ? $_REQUEST['fechaNacimiento'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['fechaNacimiento'])){ echo $aErrores['fechaNacimiento'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <!-- Radio Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="radioButtonObligatorio">¿Cómo te sientes hoy?</label>
                                        </td>
                                        <td class="obligatorio">                                                                                                
                                            <input type="radio" id="radioButtonItem1" name="estadoDeHoy" value="radioButtonItem1" <?php if(is_null($aErrores['estadoDeHoy']) && isset($_REQUEST['estadoDeHoy']) && $_REQUEST['estadoDeHoy']=='radioButtonItem1'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="estadoDeHoy">MUY MAL</label>
                                            <input type="radio" id="radioButtonItem2" name="estadoDeHoy" value="radioButtonItem2" <?php if(is_null($aErrores['estadoDeHoy']) && isset($_REQUEST['estadoDeHoy']) && $_REQUEST['estadoDeHoy']=='radioButtonItem2'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">MAL</label>
                                            <input type="radio" id="radioButtonItem3" name="estadoDeHoy" value="radioButtonItem3" <?php if(is_null($aErrores['estadoDeHoy']) && isset($_REQUEST['estadoDeHoy']) && $_REQUEST['estadoDeHoy']=='radioButtonItem3'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">REGULAR</label>
                                            <input type="radio" id="radioButtonItem4" name="estadoDeHoy" value="radioButtonItem4" <?php if(is_null($aErrores['estadoDeHoy']) && isset($_REQUEST['estadoDeHoy']) && $_REQUEST['estadoDeHoy']=='radioButtonItem4'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">BIEN</label>
                                            <input type="radio" id="radioButtonItem5" name="estadoDeHoy" value="radioButtonItem5" <?php if(is_null($aErrores['estadoDeHoy']) && isset($_REQUEST['estadoDeHoy']) && $_REQUEST['estadoDeHoy']=='radioButtonItem5'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">MUY BIEN</label>
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['estadoDeHoy'])){ echo $aErrores['estadoDeHoy'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Entero Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="enteroObligatorio">¿Cómo va el curso? [0-10]</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="enteroObligatorio" placeholder="numeros_enteros" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['enteroObligatorio'])){ echo $aErrores['enteroObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <!-- Lista Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="vacaciones">¿Cómo se presentan las vacaciones de navidad?</label>
                                        </td>
                                        <td>                                                                                                
                                            <select class="obligatorio" name="vacaciones">
                                                <option value="NiIdea" <?php if(isset($_REQUEST['vacaciones'])){ echo 'selected'; }?>>NiIdea</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="ConLaFamilia" <?php if(isset($_REQUEST['vacaciones'])){ echo 'selected'; }?>>Con la familia</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="DeFiesta" <?php if(isset($_REQUEST['vacaciones'])){ echo 'selected'; }?>>De fiesta</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="Trabajando" <?php if(isset($_REQUEST['vacaciones'])){ echo 'selected'; }?>>Trabajando</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="EstudiandoDWES" <?php if(isset($_REQUEST['vacaciones'])){ echo 'selected'; }?>>Estudiando DWES</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                            </select> 
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['vacaciones'])){ echo $aErrores['vacaciones'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <!-- TextArea Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="textAreaObligatorio">Describe brevemente tu estado de animo:</label>
                                        </td>
                                        <td>                                                                                                    <!-- En el siguiente 'if' comprobamos que en el array '$aErrores' , guarde valor 'NULL' y que la variable ese declarada y sin 
                                                                                                                                                     ausencia de valor, si es así, devuelvo el contenido almacenado en '$_REQUEST['textAreaObligatorio']' -->                                                                            
                                            <textarea class="obligatorio d-flex justify-content-start" rows="4" cols="50" name='estadoDeAnimo' placeholder="cadena_de_letras_y_numeros"><?php if ($aErrores['estadoDeAnimo'] == null && isset($_REQUEST['estadoDeAnimo'])) {echo ($_REQUEST['estadoDeAnimo']);}?></textarea>
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['estadoDeAnimo'])){ echo $aErrores['estadoDeAnimo'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                            <button type="reset" name="borrar">Borrar</button>
                            <button type="submit" name="enviar">Enviar</button>
                        </fieldset>
                    </form>
                    <?php 
                    }
                    ?>
                </div>
            </div>
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

