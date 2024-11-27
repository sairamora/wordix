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
    $indColeccion = count ($coleccionPalabras);
    $coleccionPalabras[$indColeccion] = $palabraNueva;
    return ($coleccionPalabras);
}
//PUNTO 10
function solicitarJugador() {
    echo "Ingrese el nombre de un jugador \n";
    $jugador = trim(fgets(STDIN));
    do {
        $caracterUno = substr($jugador,0,1);
        $esLetra = ctype_alpha($caracterUno);                   //si es letra ($esLetra==true), sale del bucle
        if ($esLetra==false) {                                        //si no es letra, solicita otro nombre y lo guarda
            echo "El nombre no es valido, ingrese otro \n";
            $jugador = trim(fgets(STDIN));
        }
    } while ($esLetra==false);                                        //no sale del bucle hasta que el nombre sea valido
    $jugadorMinusculas = strtolower($jugador);                //convierte el nombre a minusculas
    return ($jugadorMinusculas);
}

/**
 * COMPLETAR (CREADA PARA EL CASO 1)
 */
function partidasUsadas ($arregloUsadas, $numPalabra) {
    foreach ($arregloUsadas as $palabraUsada) {                 //recorrido total del arreglo
        if ($palabraUsada==$numPalabra) {                       //si el numero ingresado ya se encuentra en el arreglo
            return true;                                        //retorna true
        }
    }
    return false;                                               //sino, retorna false
 }

/* ****COMPLETAR***** */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//Inicialización de variables:

//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

do {
    $opcion = trim(fgets(STDIN));
        switch ($opcion) {
        case 1: 
            //CASO 1 - MENU 
            //string $nombre, $palabra 
            //int $nPalabra 

            echo "Ingrese el nombre de un jugador \n"; 
            $nombre = trim(fgets(STDIN));

            $arregloPalabras = cargarColeccionPalabras();
            $arregloUsadas = [];                    //inicializo un arreglo para guardar las partidas ya elegidas
            do {
                echo "Ingrese un numero de palabra \n"; 
                $nPalabra = trim(fgets(STDIN)); 
                if ($nPalabra>=0 && $nPalabra<count($arregloPalabras)) {    //entra si el numero de palabra existe en el arreglo
                    if (!partidasUsadas($arregloUsadas,$nPalabra)) {               //entra cuando el retorno es false, negado es true
                        $palabra = $arregloPalabras[$nPalabra]; 
                        echo "Palabra: " . $palabra . "\n";                        
                        $arregloUsadas[] = $nPalabra;                             //guarda la palabra en el arreglo
                        //print_r($arregloUsadas);                      //descomentar para probar, SACARLO
                        //AGREGAR QUE SE JUEGUE LA PARTIDA 
                        //GUARDAR LOS DATOS DE LA PARTIDA
                    } else {
                        echo "Este numero de palabra ya fue utilizado. \n";       //si devolvio true el numero ya se uso
                    }
                } else {
                    echo "El numero ingresado no pertenece a una partida. Ingrese otro. \n";
                }
            } while (count($arregloUsadas)<count($arregloPalabras));    //mientras queden palabras por usar 

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != 9);
