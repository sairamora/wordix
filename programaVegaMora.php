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
    "MOSCA", "PASTO", "CORAL", "TAZAS", "MISMA"
    ];
    return ($coleccionPalabras);
}

//PUNTO 2 (E3)
function cargarPartidas () {    //CAMBIAR segun la modificacion del punto 7
    $arrayPartidas = [];
    $arrayPartidas[0] = ["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $arrayPartidas[1] = ["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $arrayPartidas[2] = ["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];

    $arrayPartidas[3] = ["palabraWordix" => "HUEVO", "jugador" => "majo", "intentos" => 4, "puntaje" => 11];                   
    $arrayPartidas[4] = ["palabraWordix" => "PIANO", "jugador" => "pink2000", "intentos" => 1, "puntaje" => 15]; 
    $arrayPartidas[5] = ["palabraWordix" => "NAVES", "jugador" => "rudolf", "intentos" => 1, "puntaje" => 17]; 
    $arrayPartidas[6] = ["palabraWordix" => "YUYOS", "jugador" => "pink2000", "intentos" => 5, "puntaje" => 13];
    $arrayPartidas[7] = ["palabraWordix" => "TINTO", "jugador" => "rudolf", "intentos" => 2, "puntaje" => 16]; 
    $arrayPartidas[8] = ["palabraWordix" => "VERDE", "jugador" => "majo", "intentos" => 3, "puntaje" => 14];   
    $arrayPartidas[9] = ["palabraWordix" => "MELON", "jugador" => "rudolf", "intentos" => 6, "puntaje" => 10];
    return ($arrayPartidas);
}
//PUNTO 3 (E3)
/**
 * Muestra el menu de opciones y corrobora que la opcion elegida sea valida. Retorna el numero de la opcion elegida.
 * @return int
 */
function seleccionarOpcion () {
    //int $opcion, $minimo, $maximo
    $minimo = 1;        //valor minimo permitido
    $maximo = 8;        //valor maximo permitido
        echo "Menu WORDIX \n";
        echo "1) Jugar al wordix con una palabra elegida. \n";
        echo "2) Jugar al wordix con una palabra aleatoria. \n";
        echo "3) Mostrar una partida. \n";
        echo "4) Mostrar la primer partida ganadora. \n";
        echo "5) Mostrar resumen de Jugador. \n";
        echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra. \n";
        echo "7) Agregar una palabra de 5 letras a Wordix. \n";
        echo "8) Salir. \n";
        echo "Ingrese una opcion. \n";
        $opcion = solicitarNumeroEntre($minimo, $maximo);   //invoca la funcion de wordix.php
    return ($opcion);
}

//PUNTO 4 (E3)
//Esta función es invocada directamente desde wordix.php
leerPalabra5Letras();

//PUNTO 5 (E3)
//Esta función es invocada directamente desde wordix.php
solicitarNumeroEntre($nMin, $nMax);

//PUNTO 6 (E3) LISTA
/**
 * Esta funcion recibe por parametro el numero de palabra y el arreglo de partidas.............
 */
function mostrarPartida ($nPartida, $arrayPartidas) {
    if (is_numeric($nPartida) && (int)($nPartida) == $nPartida) {           //verifica si lo ingresado es un numero y si es un numero de tipo int
        $indice = $nPartida - 1;                    //le resta 1 al numero ingresado para acceder al arreglo desde el indice 0
        if ($indice < count($arrayPartidas)) {      //verifica que el indice pertece al arreglo
            echo "********************************** \n";
            echo "Partida WORDIX " . ($nPartida) . ": palabra " . $arrayPartidas[$indice]["palabraWordix"] . ".\n";
            echo "Jugador: " . $arrayPartidas[$indice]["jugador"] . ".\n";
            echo "Puntaje: " . $arrayPartidas[$indice]["puntaje"] . ".\n";
            $intento = $arrayPartidas[$indice]["intentos"];
            if ($intento > 0 && $intento <= 6 ) {                   //verifica que el jugador haya adivinado la palabra
                echo "Adivino la palabra en " . $intento . " intentos. \n";
            } else {
                echo "No adivino la palabra. \n";
            }
                echo "********************************** \n";
        } else {
            echo "El numero ingresado no pertenece a una partida. \n";
        }
    } else {
        echo "Debe ingresar un numero entero. \n";
    }   
}
//PUNTO 7 (E3)


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
//PUNTO 9 (E3)
function resumenJugador ($arrayPartidas, $nomJugador) {
    $arrayResumenJug = [];
    $contPartidas = 0;
    $contVictorias = 0;
    $acumPuntaje = 0;
    foreach ($arrayPartidas as $partida) {
        if ($partida["jugador"] == $nomJugador) {
            $contPartidas++;
            $acumPuntaje = $acumPuntaje + $partida["puntaje"];
            if ($partida["puntaje"] > 0) {
                $contVictorias++;
            }
        }
    }
    $arrayResumenJug["jugador"] = $nomJugador;
    $arrayResumenJug["partidas"] = $contPartidas;
    $arrayResumenJug["puntaje"] = $acumPuntaje;
    $arrayResumenJug["victorias"] = $contVictorias;
    return($arrayResumenJug);
}
//PUNTO 10 (E3)
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

//VARIABLES - ARREGLOS
$opcionMenu = seleccionarOpcion();
$arregloPalabras = cargarColeccionPalabras();
$arregloPartidas = cargarPartidas();
$arregloUsadas = [];
$parar = false;
do {
    switch ($opcionMenu) {
        case 1:
            //VARIABLES
            $jugador = solicitarJugador();
            do {
                echo "Ingrese un numero de palabra \n"; 
                $nPalabra = trim(fgets(STDIN)); 
                if ($nPalabra >= 0 && $nPalabra < count($arregloPalabras)) {
                    $palabra = $arregloPalabras[$nPalabra]; 
                    $usada = false;
                    foreach ($arregloPartidas as $partida) {
                        if ($partida["palabraWordix"] == $palabra) {
                            $usada = true;
                        }
                    }
                    if (!$usada) {
                        foreach ($arregloUsadas as $palabraUsada) {
                            if ($palabraUsada == $nPalabra) {
                                $usada = true;
                            }
                        }
                    }
                    if (!$usada) {
                        $arregloUsadas[] = $nPalabra;
                        $parar = true;
                    } else {
                        echo "El numero de palabra ya fue utilizado. \n";
                    }
                } else {
                    echo "Ingrese un numero valido. \n";
                }
                echo "\n";
            } while (count($arregloUsadas) < count($arregloPalabras) && $parar == false);
            //HACER JUGAR LA PARTIDA CON EL N DE PALABRA ELEGIDO
            break;
        case 2:
            //PROBAR VARIAS VECES, CORREGIR ERROR - es xq se terminan las palabras NO usadas?
            //VARIABLES
            $jugador = solicitarJugador();
            do {
                $nRandom = rand(0, count($arregloPalabras) - 1);
                if ($nRandom >= 0 && $nRandom < count($arregloPalabras)) {
                    $palabraRandom = $arregloPalabras[$nRandom];
                    $usada = false;
                    foreach ($arregloPartidas as $partida) {
                        if ($partida["palabraWordix"] == $palabraRandom) {
                            $usada = true;
                        }
                    }
                    if (!$usada) {
                        foreach ($arregloUsadas as $palabraUsada) {
                            if ($palabraUsada == $nRandom) {
                                $usada = true;
                            }
                        }
                    }
                    if (!$usada) {
                        $arregloUsadas[] = $nRandom;
                        $parar = true;
                    }
                }
            } while (count($arregloUsadas) < count($arregloPalabras) && $parar == false);
            //HACER JUGAR LA PARTIDA CON LA PALABRA ALEATORIA
            break;
        case 3:
            echo "Ingrese un numero de partida \n";
            $nPartida = trim(fgets(STDIN));                         //N PARTIDA + 1???
            if ($nPartida >= 0 && $nPartida < count($arregloPartidas)) {
                mostrarPartida($nPartida, $arregloPartidas);
            } else {
                echo "El numero de partida no es valido.";
            }
            echo "\n";
            break;
        case 4:
            //VARIABLES
            $jugador = solicitarJugador();
            $encontrada = false;
            $jugo = false;
            $i = 0;
            while ($i < count($arregloPartidas) && $encontrada == false) {
                $partida = $arregloPartidas[$i];
                if ($partida["jugador"] == $jugador) { 
                    $jugo = true;
                    if ($partida["puntaje"] > 0) {
                        mostrarPartida($i + 1, $arregloPartidas);
                        echo "\n";
                        $encontrada = true;
                    }
                }
                $i++;
            }
            if (!$jugo) {
                echo "El jugador " . $jugador . " no jugo WORDIX.";
            } else if (!$encontrada) {
                echo "El jugador " . $jugador . " no gano ninguna partida.";
            }
            echo "\n";
            break;
        case 5:
            //VARIABLES
            $porcVictorias = 0;
            $jugador = solicitarJugador();
            $arregloPartidas = cargarPartidas();
            $arregloResumenJug = resumenjugador($arregloPartidas, $jugador);
            $porcVictorias = ($arregloResumenJug["victorias"] / $arregloResumenJug["partidas"]) * 100;

            echo "\n";
            echo "**************************************** \n";
            echo "Jugador: " . $arregloResumenJug["jugador"] . "\n";
            echo "Partidas: " . $arregloResumenJug["partidas"] . "\n";
            echo "Puntaje Total: " . $arregloResumenJug["puntaje" ]. "\n";
            echo "Victorias: " . $arregloResumenJug["victorias"]. "\n";
            echo "Porcentaje Victorias: " . $porcVictorias . "%\n";
            echo "**************************************** \n";
            echo "\n"; 
            break;
    }
} while ($opcionMenu != 9);
