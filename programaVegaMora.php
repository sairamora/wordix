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
    $arrayPartidas[9] = ["palabraWordix" => "MELON", "jugador" => "pepe", "intentos" => 0, "puntaje" => 0];
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
//leerPalabra5Letras();

//PUNTO 5 (E3)
//Esta función es invocada directamente desde wordix.php
//solicitarNumeroEntre($nMin, $nMax);

//PUNTO 6 (E3) LISTA
/**
 * Esta funcion recibe por parametro el numero de palabra y el arreglo de partidas.............
 */
function mostrarPartida ($nPartida, $arrayPartidas) {
    if (is_numeric($nPartida) && (int)($nPartida) == $nPartida) {           //verifica si lo ingresado es un numero y si es un numero de tipo int
        $indice = $nPartida - 1;                    //le resta 1 al numero ingresado para acceder al arreglo desde el indice 0
        if ($indice < count($arrayPartidas)) {      //verifica que el indice pertece al arreglo
            echo "\n";
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
    $coleccionPalabras[count($coleccionPalabras)] = $palabraNueva;
    return ($coleccionPalabras);
}

//PUNTO 8 (E3)
/**
 * poner q hace!!!!!
* @param array $arrayPartidas
* @param string $nombJugador
* ESTA ES LA FUNCION 8 NUEVA
*/
function iPrimerPartida ($arrayPartidas, $nomJugador) {
   $gano = false;
   $i = 0;
   $retorno = -1;
   do {
       $partida = $arrayPartidas[$i];
       if ($partida["jugador"] == $nomJugador) {
           if ($partida["puntaje"] > 0) {
               $retorno = $i;
               $gano = true;
           }
       }
       $i++;
   } while ($i < count($arrayPartidas) && $gano == false);
   return ($retorno);
}

//PUNTO 9 (E3)
/**
 * poner q hace
 */
function resumenJugador ($arrayPartidas, $nomJugador) {
    $arrayResumenJug = [];
    $contPartidas = 0;
    $contVictorias = 0;
    //revisar
    $contIntentoUno = 0;
    $contIntentoDos = 0;
    $contIntentoTres = 0;
    $contIntentoCuatro = 0;
    $contIntentoCinco = 0;
    $contIntentoSeis = 0;
    $acumPuntaje = 0;
    foreach ($arrayPartidas as $partida) {
        if ($partida["jugador"] == $nomJugador) {
            $contPartidas++;
            $acumPuntaje = $acumPuntaje + $partida["puntaje"];
            if ($partida["puntaje"] > 0) {
                $contVictorias++;
            }
            if ($partida["intentos"] == 1) {
                $contIntentoUno++;
            } else if ($partida["intentos"] == 2) {
                $contIntentoDos++;
            } else if ($partida["intentos"] == 3) {
                $contIntentoTres++;
            } else if ($partida["intentos"] == 4) {
                $contIntentoCuatro++;
            } else if ($partida["intentos"] == 5) {
                $contIntentoCinco++;
            } else if ($partida["intentos"] == 6) {
                $contIntentoSeis++;
            }
        }
    }
        $arrayResumenJug["jugador"] = $nomJugador;
        $arrayResumenJug["partidas"] = $contPartidas;
        $arrayResumenJug["puntaje"] = $acumPuntaje;
        $arrayResumenJug["victorias"] = $contVictorias;
        $arrayResumenJug["intentoUno"] = $contIntentoUno;
        $arrayResumenJug["intentoDos"] = $contIntentoDos;
        $arrayResumenJug["intentoTres"] = $contIntentoTres;
        $arrayResumenJug["intentoCuatro"] = $contIntentoCuatro;
        $arrayResumenJug["intentoCinco"] = $contIntentoCinco;
        $arrayResumenJug["intentoSeis"] = $contIntentoSeis;
    return($arrayResumenJug);
}


//PUNTO 10 (E3)
/**
 * a
 */
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
    $jugadorMinusculas = strtolower($jugador);                   //convierte el nombre a minusculas
    return ($jugadorMinusculas);
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

//VARIABLES - ARREGLOS

$arregloPalabras = cargarColeccionPalabras();
$arregloPartidas = cargarPartidas();
$arregloUsadas = [];
$parar = false;
do {
    $opcionMenu = seleccionarOpcion();
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
                        echo "El numero de palabra ya fue utilizado. Ingrese otro. \n";
                        $nPalabra = trim(fgets(STDIN));
                    }
                } else {
                    echo "Ingrese un numero valido. \n";
                    $nPalabra = trim(fgets(STDIN));
                }
                echo "\n";
            } while (count($arregloUsadas) < count($arregloPalabras) && $parar == false);
            $juegoCasoUno = jugarWordix($palabra, $jugador);
            $arregloPartidas[count($arregloPartidas)] = $juegoCasoUno;
            print_r($arregloPartidas);
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
            $juegoCasoDos = jugarWordix($palabraRandom, $jugador);
            $arregloPartidas[count($arregloPartidas)] = $juegoCasoDos;
            print_r($arregloPartidas);
            break;
        case 3:
            echo "Ingrese un numero de partida \n";
            $nPartida = trim(fgets(STDIN));
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
            $arregloPartidas = cargarPartidas();
            $retornoIndice = iPrimerPartida ($arregloPartidas, $jugador);

            if ($retornoIndice >= 0) {
                mostrarPartida ($retornoIndice + 1, $arregloPartidas);
            } else if ($retornoIndice == -1) {
                echo "El jugador " . $jugador . " no ganó ninguna partida \n";
            }
            echo "\n";
            break;
        case 5:
            //VARIABLES
            $porcVictorias = 0;
            $jugador = solicitarJugador();
            $arregloPartidas = cargarPartidas();
            $arregloResumenJug = resumenjugador($arregloPartidas, $jugador);
            if ($arregloResumenJug["partidas"]) {
                $porcVictorias = ($arregloResumenJug["victorias"] / $arregloResumenJug["partidas"]) * 100;
                echo "\n";
                echo "**************************************** \n";
                echo "Jugador: " . $arregloResumenJug["jugador"] . "\n";
                echo "Partidas: " . $arregloResumenJug["partidas"] . "\n";
                echo "Puntaje Total: " . $arregloResumenJug["puntaje" ]. "\n";
                echo "Victorias: " . $arregloResumenJug["victorias"]. "\n";
                echo "Porcentaje Victorias: " . $porcVictorias . "%\n";
                echo "Adivinadas: \n";
                echo "      Intento 1: " . $arregloResumenJug["intentoUno"] . "\n";
                echo "      Intento 2: " . $arregloResumenJug["intentoDos"] . "\n";
                echo "      Intento 3: " . $arregloResumenJug["intentoTres"] . "\n";
                echo "      Intento 4: " . $arregloResumenJug["intentoCuatro"] . "\n";
                echo "      Intento 5: " . $arregloResumenJug["intentoCinco"] . "\n";
                echo "      Intento 6: " . $arregloResumenJug["intentoSeis"] . "\n";
                echo "**************************************** \n";
                echo "\n"; 
            } else {
                echo "El jugador no jugo WORDIX. \n";
            }
            break;
        case 6:
            //funcion predefinida uasort y print_r
            break;
        case 7:
            $palabraN = leerPalabra5Letras();
            $existe = false;
            $i = 0;
            while ($i < count($arregloPalabras) && $existe == false) {
                $palabra = $arregloPalabras[$i];
                if($palabra == $palabraN) {
                    echo "La palabra ya existe en WORDIX. Ingrese otra. \n";
                    $existe = true;
                }
                $i++;
            }
            if ($existe == false) {
                $arregloPalabras = agregarPalabra($arregloPalabras,$palabraN);
            }
            break;
        case 8:
            echo "SALIDA \n";
            break;
        default:
            echo "La opcion ingresada no es parte del menu. Ingrese un numero valido. \n";
            break;
    }
} while ($opcionMenu != 8);

