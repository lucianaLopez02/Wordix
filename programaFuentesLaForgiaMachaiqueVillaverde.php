<?php 
include_once("wordix.php"); //bibloteca de funcion, incluya por unica vez el archivo php

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Floriana Daniela La Forgia - Legajo 2498 - mail: florianalaforgia@hotmail.com.ar - Github: Alter1412   
/* Geronimo Villaverde - Legajo 3536 - mail: geronimovillaverde@gmail.com - Github: geronimovillaverde
/* Yael Machaique - Legajo 4135 - mail: yael.machaique@est.fi.uncoma.edu.ar - Github: lucianaLopez02
/* Fuentes Camila- Legajo 4241 - mail: camila.fuentes@est.fi.uncoma.edu.ar- GitHub: CamilaFuentess
*/



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        /* ... COMPLETAR ... Agregar 5 palabras más */
        "LAPIZ", "LOROS", "PERRO", "HOJAS", "TIGRE"
    ];

    return ($coleccionPalabras);
}


/* ... COMPLETAR ... */

//EJEMPLO DE LA FUNCIÓN 2. Punto 2
/**
* inicializa una estrutucta de partidas y retorna una coleccion de partidas
* @return array
*/
function cargarPartidas(){
    $coleccionPartidas = []; // Inicializo la coleccion de partidas

    $coleccionPartidas[0] = ["palabraWordix" => "QUESO","jugador" => "majo","intentos" => 6 ,"puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "CASAS","jugador" => "rudolf","intentos" => 3 ,"puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix" => "QUESO","jugador" => "pink2000","intentos" => 6 ,"puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix" => "TIGRE","jugador" => "mayonesa02","intentos" => 5 ,"puntaje" => 12];
    $coleccionPartidas[4] = ["palabraWordix" => "PIANO","jugador" => "pancho12","intentos" => 9 ,"puntaje" => 5];
    $coleccionPartidas[5] = ["palabraWordix" => "CASAS","jugador" => "trufa48","intentos" => 3 ,"puntaje" => 11];
    $coleccionPartidas[6] = ["palabraWordix" => "YUYOS","jugador" => "luna","intentos" => 8 ,"puntaje" => 15];
    $coleccionPartidas[7] = ["palabraWordix" => "HUEVO","jugador" => "thor","intentos" => 1 ,"puntaje" => 8];
    $coleccionPartidas[8] = ["palabraWordix" => "GATOS","jugador" => "zoe","intentos" => 2 ,"puntaje" => 6];
    $coleccionPartidas[9] = ["palabraWordix" => "LAPIZ","jugador" => "luna","intentos" => 2 ,"puntaje" => 5];

    return $coleccionPartidas;
}

// Menú de opciones. Punto 3

/**
 * mostrar la opciones del menu del juego y solicitar al usuario una opcion valida y retorne el numero de la opcion
 * @return int
 */
function seleccionarOpcion(){
    // $numeroOpcion int
    echo "------MENÚ OPCIONES PARA JUGAR WORDIX--------\n";
    echo "1. Jugar al Wordix con una palabra elegida\n";
    echo "2. Jugar al Wordix con una palabra aleatoria\n";
    echo "3. Mostrar una partida\n";
    echo "4. Mostrar la primer partida ganadora\n";
    echo "5. Mostrar resumen de Jugador\n";
    echo "6. Mostrar listado de partidas ordenadas por jugador y por palabra\n";
    echo "7. Agregar una palabra de 5 letras a Wordix\n";
    echo "8. Salir\n";
    echo "Ingrese una opcion: ";

    $numeroOpcion = solicitarNumeroEntre(1, 8); //Invocacion del modulo solicitarNumeroEntre 
    
    return $numeroOpcion;
}

// funcion leerPalabra5Letras() de wordix.php?
// funcion solicitarNumeroEntre($min, $max) de wordix.php?

// Mostrar datos de partida. Punto 6
/**
 * dado un numero de partida mostrar por pantalla los datos de esa partida
 * @param $nroPartida
 */
function mostrarDatosDePartida($nroPartida){

    //$nroPartida = solicitarNumeroEntre(0, 9);
    $unaColeccionPartidas = cargarPartidas();

    echo "*****************************\n";
    echo "Partida WORDIX $nroPartida : palabra ". $unaColeccionPartidas[$nroPartida]["palabraWordix"]."\n";
    echo "Jugador: " .$unaColeccionPartidas[$nroPartida]["jugador"]."\n";
    echo "Puntaje: " .$unaColeccionPartidas[$nroPartida]["puntaje"]. " puntos\n";

    if ($unaColeccionPartidas[$nroPartida]["puntaje"] != 0 && $unaColeccionPartidas[$nroPartida]["intentos"] <= 6) 
    {
        echo "Intento: Adivino la palabra en ".$unaColeccionPartidas[$nroPartida]["intentos"]." intentos\n";
    } else {
        echo "Intento: No adivino la palabra\n";

    }
    
    echo "*****************************\n";

}

// funcion agregarPalabra. Punto 7
/**
 * agrega una nueva palabra al la coleccionPalabras
 * @param array $unaColeccionPalabras
 * @param string $unaPalabra 
 */
function agregarPalabra($unaColeccionPalabras, $unaPalabra){

    $unaColeccionPalabras[] = $unaPalabra;
    
    $nuevaColeccionPalabras = $unaColeccionPalabras;
    //print_r($unaColeccionPalabras); o usar array_push

    /*
    $resumenJugador = [];
    $resumenJugador = ["jugador" => "nombre" , "partidas" => cantPartidas,
                     "puntaje" => nro, "victorias" => $cantVictorias, 
                     "intento1" => cantLetrasAdivinadas, "intento2" => 
                        ];
    */
return $nuevaColeccionPalabras;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo")); //*opcion jugar partida para majo con una palabra melon
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
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
