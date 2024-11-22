<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

//PUNTO 1
/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    ];
    return ($coleccionPalabras);
}

//PUNTO 2 (E3)
function cargarPartidas () {    //CAMBIAR segun la modificacion del punto 7
    $ejPartidas = [];
    $ejPartidas[0] = ["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $ejPartidas[1] = ["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $ejPartidas[2] = ["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    $ejPartidas[3] = ["palabraWordix" => "HUEVO", "jugador" => "majo", "intentos" => 4, "puntaje" => 11];                   
    $ejPartidas[4] = ["palabraWordix" => "PIANO", "jugador" => "lyra", "intentos" => 1, "puntaje" => 15]; 
    $ejPartidas[5] = ["palabraWordix" => "NAVES", "jugador" => "yaki", "intentos" => 1, "puntaje" => 17]; 
    $ejPartidas[6] = ["palabraWordix" => "YUYOS", "jugador" => "pink2000", "intentos" => 5, "puntaje" => 13];
    $ejPartidas[7] = ["palabraWordix" => "TINTO", "jugador" => "max", "intentos" => 2, "puntaje" => 16]; 
    $ejPartidas[8] = ["palabraWordix" => "VERDE", "jugador" => "body", "intentos" => 3, "puntaje" => 14];   
    $ejPartidas[9] = ["palabraWordix" => "MELON", "jugador" => "zac", "intentos" => 6, "puntaje" => 10];
    return ($ejPartidas);
}
//PUNTO 3 (E3)
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

//PUNTO 4 (E3)
//Esta función es invocada directamente desde wordix.php
leerPalabra5Letras();

//PUNTO 5 (E3)
//Esta función es invocada directamente desde wordix.php
solicitarNumeroEntre($nMin, $nMax);

//PUNTO 6 (E3)
function mostrarPartida ($numeroP, $ejPartidas) {   //NO RECIBE $ejPartidas POR PARAMETRO, RECIBE LA PARTIDA VERDADERA
    cargarPartidas();
    echo "Partida WORDIX " . ($numeroP) . ": palabra " . $ejPartidas[$numeroP-1]["palabraWordix"] . ".\n";
    echo "Jugador: " . $ejPartidas[$numeroP-1]["jugador"] . ".\n";
    echo "Puntaje: " . $ejPartidas[$numeroP-1]["puntaje"] . ".\n";
    $intento = $ejPartidas[$numeroP-1]["intentos"];
    if ($intento>0 && $intento <=6 ) {
        echo "Adivino la palabra en " . $intento . " intentos. \n";
    } else {
        echo "No adivino la palabra. \n";
    }
}
//PUNTO 7 (E3)
//esto es para probar
cargarColeccionPalabras();
"Ingrese una nueva palabra \n";
$nuevaPalabra = trim(fgets(STDIN));
agregarPalabra($arregloPalabras,$nuevaPalabra);
/**Función en que la entrada es la colección de palabras y una palabra nueva,
 * la función retorna la colección modificada al agregarse la palabra nueva
 * @param array $coleccionPalabras
 * @param STRING $palabraNueva
 */
function agregarPalabra($coleccionPalabras, $palabraNueva) {
    $coleccionPalabras[] = $palabraNueva;
    return ($coleccionPalabras);
}
/* ****COMPLETAR***** */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//Inicialización de variables:

//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);


?>