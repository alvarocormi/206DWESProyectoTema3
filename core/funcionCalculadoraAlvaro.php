<?php
/**
 * @author Alvaro Cordero Miñambres
 * @version 1.0 
 * @since 27/10/2023
 */

//Función Calculadora para hacer sumar, restar, multiplicar y dividir.		
    
/**
 * suma
 *
 * @param  mixed $a
 * @param  mixed $b
 * @return void
 */
function suma($a, $b)
{
    return $a + $b;
}

/**
 * resta
 *
 * @param  mixed $a
 * @param  mixed $b
 * @return void
 */
function resta($a, $b)
{
    return $a - $b;
}

/**
 * multiplicar
 *
 * @param  mixed $a
 * @param  mixed $b
 * @return void
 */

function multiplicar($a, $b)
{
    return $a * $b;
}

/**
 * dividir
 *
 * @param  mixed $a
 * @param  mixed $b
 * @return void
 */
function dividir($a, $b)
{
    if ($b == 0) {
        return null;
    }
    return $a / $b;
}
?>