<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/*Vega, Agustina. FAI-4466. TUDW. agustina.vega@gest.fi.uncoma.edu.ar. vegaagustina */
/*Mora. Saira. FAI-5294. TUDW. saira.mora@est.fi.uncoma.edu.ar. morasaira */

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

//FUNCION 1 (E3)
/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [
    "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
    "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
    "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
    "MOSCA", "PASTO", "CORAL", "TAZAS", "MISMA"     //5 palabras agregadas
    ];
    return ($coleccionPalabras);
}

//FUNCION 2(E3)
/**
 * Esta funcion carga las partidas del usuario
 * @return array
 */
function cargarPartidas () {  
    $arrayPartidas = [];
    //ejemplos E2 b)
    $arrayPartidas[0] = ["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $arrayPartidas[1] = ["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $arrayPartidas[2] = ["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    //ejemplos nuestros
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
 * Esta funcion recibe por parametro el numero de partida y el arreglo de partidas
 *  y muestra la partida de esa ubicacion (numero)
 * @param int $nPartida
 * @param array $arrayPartidas
 */
function mostrarPartida ($nPartida, $arrayPartidas) {
    $indice = $nPartida - 1;
    //le resta 1 al numero ingresado para acceder al arreglo desde $i = 0
    echo "\n";
    echo "********************************** \n";
    echo "Partida WORDIX " . ($nPartida) . ": palabra " . $arrayPartidas[$indice]["palabraWordix"] . ".\n";
    echo "Jugador: " . $arrayPartidas[$indice]["jugador"] . ".\n";
    echo "Puntaje: " . $arrayPartidas[$indice]["puntaje"] . ".\n";
    $intento = $arrayPartidas[$indice]["intentos"];
    if ($intento > 0 && $intento <= 6 ) {
    //verifica que el jugador haya adivinado la palabra
        echo "Adivino la palabra en " . $intento . " intentos. \n";
    } else {
        echo "No adivino la palabra. \n";
    }
    echo "********************************** \n";
}

//PUNTO 7 (E3)
/**
 * Función en que la entrada es la colección de palabras y una palabra nueva,
 * la función retorna la colección modificada al agregarse la palabra nueva
 * @param array $coleccionPalabras
 * @param string $palabraNueva
 * @return array
 */
function agregarPalabra($coleccionPalabras, $palabraNueva) {
    $coleccionPalabras[count($coleccionPalabras)] = $palabraNueva;
    //almacena en el ultimo indice la palabra nueva
    return ($coleccionPalabras);
}

//PUNTO 8 (E3)
/**
 * Esta funcion recibe por parametro una colección de partidas y el nombre de un jugador, 
 * y retorna el índice de la primer partida ganada por dicho jugador.
 *  Si el jugador no gano ninguna partida, la función retorna el valor -1
* @param array $arrayPartidas
* @param string $nomJugador
* @return int
*/
function iPrimerPartida ($arrayPartidas, $nomJugador) {
   $gano = false;
   $i = 0;
   $retorno = -1;
   do {
       $partida = $arrayPartidas[$i];   
       if ($partida["jugador"] == $nomJugador) {
           //verifica que el jugador haya jugado
           if ($partida["puntaje"] > 0) {
               //verifica que el jugador haya ganado
               $retorno = $i;
               $gano = true;    
           }
       }
       $i++;
   } while ($i < count($arrayPartidas) && $gano == false);  //mientras $i exista en el arreglo && $gano mantenga su valor inicial
   return ($retorno);
}

//PUNTO 9 (E3)
/**
 * Función que dada la colección de partidas y el nombre de un jugador, retorna el arreglo de resumen del jugador
 * @param array $arrayPartidas
 * @param string $nomJugador
 * @return array
 */
function resumenJugador ($arrayPartidas, $nomJugador) {
    $arrayResumenJug = [];
    $contPartidas = 0;
    $contVictorias = 0;
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
 * Esta funcion solicita el nombre del jugador, corrobora que sea valido. Si no lo es, lo pide hasta que lo sea, y lo retorna. 
 * En caso de que el nombre este en mayusculas lo convierte a minusculas (lo devuelve en minusculas)
 * @return string
 */
function solicitarJugador() {
    echo "Ingrese el nombre de un jugador \n";
    $jugador = trim(fgets(STDIN));
    do {
        $nombreUsuario = str_replace(" ", "", $jugador);
        //si se ingresa un nombre con espacios, elimina los espacion en blanco
        $caracterUno = substr($jugador,0,1);
        //toma el primer caracter del nombre ingresado 
        $esLetra = ctype_alpha($caracterUno);
        //verifica si el primer caracter es una letra, devuelve true-false
        if ($esLetra==false) {
            //si no es letra, solicita otro nombre y lo actualiza en la variable
            echo "El nombre no es valido, ingrese otro \n";
            $jugador = trim(fgets(STDIN));
        }
    } while ($esLetra==false);
    //repite hasta que el nombre sea valido
    $jugadorMinusculas = strtolower($nombreUsuario);
    //convierte el nombre en letras minusculas
    return ($jugadorMinusculas);
}

//FUNCION 11
/**
 * Esta funcion recibe por parametro una colección de partidas, la ordena alfabeticamente
 * segun jugador y palabra y muestra la colección de partidas ordenada
 * @param array $arregloPartidas
 */
function ordenarPartidas($arregloPartidas) {
    uasort($arregloPartidas, function ($a, $b) {
        $compararJugador = $a["jugador"] <=> $b["jugador"]; //operador <=> (teoria: < = -1, == = 0, > = 1)
        if ($compararJugador == 0) {
            //empate en jugadores
            return ($a["palabraWordix"] <=> $b["palabraWordix"]);   // empate se mantiene el arreglo
            //retorno secundario del uasort
        }
        return ($compararJugador);
        //retorno inicial del uasort
    });
    //termina el uasort
    print_r($arregloPartidas);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Este programa muestra el menu de opciones de wordix y funciona segun la opcion ingresada

//Declaración de variables:
/**INT $opcionMenu, $nPalabra, $i, $nRamdom, $retornoIndice
 * FLOAT $porcVictorias
 * STRING $jugador, $palabra, $palabraRandom, $muestraPartida????, $palabraN
 * BOOLEAN $parar, $usada, $existe
 * ARRAY $arregloPalabras, $arregloPartidas, $juegoCasoUno, $juegoCasoDos, $arregloResumenJug
 */

//Inicialización de variables:
$arregloPalabras = cargarColeccionPalabras();
$arregloPartidas = cargarPartidas();
$parar = false;

//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);


do {
    $opcionMenu = seleccionarOpcion();
    switch ($opcionMenu) {
        //evalua el valor de opcion ingresado y ejecuta segun el caso
        case 1:
            $jugador = solicitarJugador();
           $parar = false;
            echo "Ingrese un numero de palabra \n"; 
            $nPalabra = trim(fgets(STDIN));
            do {
                if (is_numeric($nPalabra) && (int)($nPalabra) == $nPalabra) {
                    //verifica si es un numero y si es entero
                    $i = $nPalabra - 1;
                    //asigna el numero de indice
                    if ($i >= 0 && $i < count($arregloPalabras)) {
                        $palabra = $arregloPalabras[$i];
                        //guardar la palabra como string
                        $usada = false;
                        //recorrer el arreglo de partidas
                        $j = 0;
                        while ($j < count($arregloPartidas) && $usada == false) { //SE CAMBIO TANTO EN EL CASO 1 COMO EN EL 2, UN RECORRIDO EXHAUSTIVO (FOREACH) POR UNO PARCIAL (WHILE)
                            $partida = $arregloPartidas[$j];
                            if ($partida["jugador"] == $jugador) {
                            //verificar si el jugador haya jugado
                                if ($partida["palabraWordix"] == $palabra) {
                                    //verificar si el jugador haya jugado con la palabra
                                    $usada = true;
                                }
                            }
                            $j++;
                        }
                        if ($usada == false) {
                            //verifica si el jugador no jugo con la palabra para salir del bucle
                            $parar = true;
                        } else {
                            echo "El numero de palabra ya fue utilizado. Ingrese otro. \n";
                            $nPalabra = trim(fgets(STDIN));
                        }
                    } else {
                        echo "El numero ingresado no pertenece a una palabra. Ingrese otro. \n";
                        $nPalabra = trim(fgets(STDIN));
                    }
                } else {
                    echo "El numero ingresado no es valido. Ingrese otro. \n";
                    $nPalabra = trim(fgets(STDIN));
                }
                echo "\n";
            } while ($parar == false);
            //repite hasta que se ingrese una palabra no jugada por el jugador
            $juegoCasoUno = jugarWordix($palabra, $jugador);
            //actualiza el arreglo de partidas con la partida jugada
            $arregloPartidas[count($arregloPartidas)] = $juegoCasoUno;
            break;
            case 2:
                $jugador = solicitarJugador();
                $parar = false;
                $contPalabrasUsadas = 0;
                do {
                    $nRandom = rand(0, count($arregloPalabras) - 1);
                    //selecciona un indice random del arreglo de palabras
                        $palabraRandom = $arregloPalabras[$nRandom];
                        //almacena la palabra ubicada en el indice
                        $usada = false;
                        //recorrer el arreglo de partidas buscando que la palabra NO se haya usado antes p salir del bucle
                        $j = 0;
                        while ($j < count($arregloPartidas) && $usada == false) { //SE CAMBIO EL RECORRIDO FOREACH EXHAUSTIVO POR UNO PARCIAL WHILE
                            $partida = $arregloPartidas[$j];
                            if ($partida["jugador"] == $jugador) {
                                //verifica que el jugador haya jugado
                                if ($partida["palabraWordix"] == $palabraRandom) {
                                    //verifica que el jugador haya jugado con la palabra
                                    $usada = true; // si el jugador JUGO con la palabra
                                }
                            }
                            $j++;
                        }
                        // Incrementar el contador de palabras usadas
                        $contPalabrasUsadas++;

                        // Si ya se intentaron todas las palabras disponibles, salir del bucle
                        if ($contPalabrasUsadas >= count($arregloPalabras)) {
                            echo "No quedan más palabras disponibles para el jugador.\n";
                            $parar = true;
                        } else if ($usada == false) {
                            //si jugador no jugo con la palabra, salir del bucle
                            $parar = true;
                        }
                } while ($parar == false);
                //repite hasta que obtenga una palabra no jugada por el jugador
                if ($contPalabrasUsadas < count($arregloPalabras)) {
                    $juegoCasoDos = jugarWordix($palabraRandom, $jugador);
                    $arregloPartidas[count($arregloPartidas)] = $juegoCasoDos;
                }
                break;
        case 3:
            echo "Ingrese un numero de partida \n";
            $nPartida = trim(fgets(STDIN));
            $parar = false;
            do {
                if (is_numeric($nPartida) && (int)($nPartida) == $nPartida) {
                    //verifica si es un numero y si es entero
                    if ($nPartida > 0 && $nPartida <= count($arregloPartidas)) {
                        //verifica el indice pertenece al arreglo de palabras
                        mostrarPartida($nPartida, $arregloPartidas);
                        $parar = true;
                    } else {
                        echo "El numero ingresado no pertenece a una partida. Ingrese otro. \n";  
                        $nPartida = trim(fgets(STDIN));
                    }
                } else {
                    echo "Debe ingresar un numero valido. \n";
                    $nPartida = trim(fgets(STDIN));
                }
            } while ($parar==false);
            echo "\n";
            break;
        case 4:
            $jugador = solicitarJugador();
            $retornoIndice = iPrimerPartida ($arregloPartidas, $jugador);
            //recibe el indice de la primer partida ganada
            if ($retornoIndice >= 0) {
                //verifica si el jugador gano
                echo "Primer partida ganada: \n";
                mostrarPartida ($retornoIndice + 1, $arregloPartidas);
            } else if ($retornoIndice == -1) {
                //verifica si el jugador no gano
                echo "El jugador " . $jugador . " no ganó ninguna partida \n";
            }
            echo "\n";
            break;
        case 5:
            $porcVictorias = 0;
            $jugador = solicitarJugador();
            $arregloResumenJug = resumenjugador($arregloPartidas, $jugador);
            //recibe el resumen del jugador
            if ($arregloResumenJug["partidas"]>0) {
                //verifica si el jugador jugo alguna partida (distinto de 0 o false)
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
            ordenarPartidas($arregloPartidas);
            //ordena el arreglo partidas por jugador y palabra
            break;
        case 7:
            do {
                $palabraN = leerPalabra5Letras();
                $existe = false;
                $i = 0;
                while ($i < count($arregloPalabras) && $existe == false) {
                    //recorre el arreglo palabras mientras queden indices por verificar
                    if($arregloPalabras[$i] == $palabraN) {
                        //verifica que la palabra no exista en el arreglo palabra
                        echo "La palabra ya existe en WORDIX. 1Ingrese otra. \n";
                        $existe = true;
                    }
                    $i++;
                }
            } while ($existe == true);
            //repite hasta que la palabra no exista en todo el arreglo
            $arregloPalabras = agregarPalabra($arregloPalabras,$palabraN);
            //guarda la palabra en el arreglo
            break;
        case 8:
            echo "SALIDA \n";
            //sale del menu de opciones wordix
            break;
    }
} while ($opcionMenu != 8);

