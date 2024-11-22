<?php
/**
 * Muestra el menu de opciones y corrobora que la opcion elegida sea valida. Retorna el numero de la opcion elegida.
 * @return int
 */
function seleccionarOpcion () {
    //int $opcion, $minimo, $maximo

    $minimo = 1;
    $maximo = 8;
        echo "Menu WORDIX \n";
        echo "1) Jugar al wordix con una palabra elegida. \n";
        echo "2) Jugar al wordix con una palabra aleatoria. \n";
        echo "3) Mostrar una partida. \n";
        echo "4) Mostrar la primer partida ganadora. \n";
        echo "5) Mostrar resumen de Jugador. \n";
        echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra. \n";
        echo "7) Agregar una palabra de 5 letras a Wordix. \n";
        echo "8) Salir. \n";
        $opcion = solicitarNumeroEntre($minimo, $maximo);
    return ($opcion);
}


/**do {
* seleccionarOpcion();            //llamo mi modulo
    //$opcion = ...;
    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/

/**
*Función que dado un numero de partida, muestra en pantalla los datos de la partida
*@param INT $nroPartida
*
 */
function hola () {
    echo "chau";
}

//PUNTO 7 (E3)
//Función agregarPalabra, que la entrada sea la colección de palabras y una palabra
//, y la función retorna la colección modificada al agregarse la palabra nueva. (Estructura C de la EXPLICACION 2). 
cargarColeccionPalabras();
"Ingrese una nueva palabra \n";
$nuevaPalabra = trim(fgets(STDIN));
agregarPalabra($arregloPalabras,$nuevaPalabra);

/**Función agregarPalabra, que la entrada sea la colección de palabras y una palabra
 *  y la función retorna la colección modificada al agregarse la palabra nueva. (Estructura C de la EXPLICACION 2)
 * @param array $coleccionPalabras
 * @param STRING $palabraNueva
 */
function agregarPalabra($coleccionPalabras, $palabraNueva) {
    $coleccionPalabras = [$palabraNueva];
    return ($coleccionPalabras);
}