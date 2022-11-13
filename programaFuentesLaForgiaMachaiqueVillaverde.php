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
* inicializa una estructura de partidas y retorna una coleccion de partidas
* @return array
*/
function cargarPartidas(){
    $coleccionPartidas = []; // Inicializo la coleccion de partidas

    $coleccionPartidas[0] = ["palabraWordix" => "QUESO","jugador" => "majo","intentos" => 6 ,"puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "CASAS","jugador" => "rudolf","intentos" => 3 ,"puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix" => "QUESO","jugador" => "luna","intentos" => 6 ,"puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix" => "TIGRE","jugador" => "trufa48","intentos" => 5 ,"puntaje" => 12];
    $coleccionPartidas[4] = ["palabraWordix" => "PIANO","jugador" => "luna","intentos" => 6 ,"puntaje" => 5];
    $coleccionPartidas[5] = ["palabraWordix" => "CASAS","jugador" => "trufa48","intentos" => 3 ,"puntaje" => 0];
    $coleccionPartidas[6] = ["palabraWordix" => "YUYOS","jugador" => "luna","intentos" => 6 ,"puntaje" => 15];
    $coleccionPartidas[7] = ["palabraWordix" => "HUEVO","jugador" => "trufa48","intentos" => 1 ,"puntaje" => 8];
    $coleccionPartidas[8] = ["palabraWordix" => "GATOS","jugador" => "zoe","intentos" => 2 ,"puntaje" => 6];
    $coleccionPartidas[9] = ["palabraWordix" => "LAPIZ","jugador" => "luna","intentos" => 2 ,"puntaje" => 0];

    return $coleccionPartidas;
}

// Menú de opciones. Punto 3

/**
 * mostrar la opciones del menu del juego y solicitar al usuario una opcion valida y retorne el numero de la opcion
 * @return int
 */
function seleccionarOpcion(){
    // $numeroOpcion int
    echo "\n------MENÚ OPCIONES PARA JUGAR WORDIX--------\n";
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

// funcion leerPalabra5Letras() de wordix.php
// funcion solicitarNumeroEntre($min, $max) de wordix.php

// Mostrar datos de partida. Punto 6
/**
 * dado un numero de partida mostrar por pantalla los datos de esa partida
 * @param int $nroPartida
 * @param array $unaColeccionPartidas
 */
function mostrarDatosDePartida($nroPartida, $unaColeccionPartidas){

    echo "*****************************\n";
    echo "Partida WORDIX $nroPartida : palabra ". $unaColeccionPartidas[$nroPartida]["palabraWordix"]."\n";
    echo "Jugador: " .$unaColeccionPartidas[$nroPartida]["jugador"]."\n";
    echo "Puntaje: " .$unaColeccionPartidas[$nroPartida]["puntaje"]. " puntos\n";

    if ($unaColeccionPartidas[$nroPartida]["puntaje"] != 0) 
    {
        echo "Intento: Adivino la palabra en ".$unaColeccionPartidas[$nroPartida]["intentos"]." intentos\n";
    } else {
        echo "Intento: No adivino la palabra\n";

    }
    
    echo "*****************************\n";

}

// funcion agregarPalabra. Punto 7
/**
 * agrega una nueva palabra a la coleccion de palabras
 * @param array $unaColeccionPalabras
 * @param string $unaPalabra 
 * @return array 
 */
function agregarPalabra($unaColeccionPalabras, $unaPalabra){
    //Agregar funcion para convertir palabra en mayuscula
    array_push($unaColeccionPalabras, $unaPalabra);

return $unaColeccionPalabras;
}


//Punto 8 
/** Funcion que retorna el indice de la primera partida ganada
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return int
 */
function primeraPartidaGanada($coleccionPartidas,$nombreJugador){
    // int $indice, $i, $limite, $partidaGanda
    
    $limite=count($coleccionPartidas);
    $i=0;
    $partidaGanda=0;
    while(($i< $limite)&&($partidaGanda==0)){

        if(($coleccionPartidas[$i]["jugador"]==$nombreJugador) && ($coleccionPartidas[$i]["puntaje"]>0) ){
            $indice= $i;
            $partidaGanda=1;       
        }else{
            $indice=-1;
            $i=$i+1;
        }
        
    }
    return $indice;
}

//Punto 9
/** Funcion que retorna el resumen del jugador
 *@param array $coleccionPartridas
 *@param string $nombreJugador
 *@return array 
 */
function resumenJugador($coleccionPartidas,$nombreJugador){
    //array $resumen
    //int $contadorVictorias, $i, $cantElementosArray, $contadorPartidas

    $cantElementosArray=count($coleccionPartidas);
    // $contadorPartidas=0;
    //$contadorVictorias=0;
    $resumen=[];
    $resumen["nombre"]=$nombreJugador;
    $resumen["partidas"]=0;
    $resumen["puntaje"]=0;
    $resumen["victorias"]=0;
    $resumen["intento1"]=0;
    $resumen["intento2"]=0;
    $resumen["intento3"]=0;
    $resumen["intento4"]=0;
    $resumen["intento5"]=0;
    $resumen["intento6"]=0;
                                        //$elemenot guarda el arreglo (o elemento)dentro del indice
    foreach($coleccionPartidas as $i => $elemento){

        if($elemento["jugador"]== $nombreJugador){
            $resumen["partidas"]=$resumen["partidas"]+1;
            if($elemento["puntaje"] > 0){
                $resumen["puntaje"]= $coleccionPartidas[$i]["puntaje"] + $resumen["puntaje"];
                $resumen["victorias"]= $resumen["victorias"]+1;
            }
            if($elemento["intentos"] == 1){
                $resumen["intento1"]=$resumen["intento1"]+1;
            }elseif($elemento["intentos"] == 2){
                $resumen["intento2"]=$resumen["intento2"]+1;
            }elseif($elemento["intentos"] == 3){
                $resumen["intento3"]=$resumen["intento3"]+1;
            }elseif($elemento["intentos"] == 4){
                $resumen["intento4"]=$resumen["intento4"]+1;
            }elseif($elemento["intentos"] == 5){
                $resumen["intento5"]=$resumen["intento5"]+1;
            }elseif($elemento["intentos"] == 6){
                $resumen["intento6"]=$resumen["intento6"]+1;
            }

        }
    }
    return $resumen;

}

//Modulo que acompaña a la funcion solicitarJugador 
/** 
 * Verifica que el primer caracter de una palabra sea una letra 
 * @param string $letra 
 * @return boolean 
 */
function abecedario(string $letra) {
    /* string $abecedarioA, $abecedarioB, boolean $esLetra, int $i, $stop */
    $letra1 = substr($letra, 0, 1);
    $abecedarioA = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];  //Uso de arreglo indexado con variables string 
    $abecedarioB = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];  //Uso de arreglo indexado con variables string 
    $stop = count($abecedarioA);
    $esLetra = false; 
    $i=0; 
    while (($i<$stop) && ($esLetra==false)) {
        if (($letra1 == $abecedarioA[$i])  || ($letra1 == $abecedarioB[$i]) ) {
            $esLetra = true;
            $i = $i+1; 
        } else {
            $esLetra = false;
            $i = $i+1; 
        }
}
    return $esLetra;
}

//Punto 10 
/** 
 * Solicita al usuario el nombre de un jugador y lo retorna en minusculas 
 * @return string 
 */
function solicitarJugador () {
    /*string $nombreMinuscula, $nombre, boolean $abc */ 
    echo "Ingrese el nombre de un jugador: ";
    $nombre = trim(fgets(STDIN));
    $abc = abecedario ($nombre);                                              
    while ( $abc == false ) {                 
        echo "ERROR. " ;     
        echo "Ingrese el nombre de un jugador (que el 1° caracter sea una letra): ";                 
        $nombre = trim(fgets(STDIN));
        $abc = abecedario ($nombre);
    }
    $nombreMinuscula = strtolower($nombre) ;
    return $nombreMinuscula;
}

//PUNTO 11 
/**
 * Muestra una coleccion de partidas ordenadas por el nombre del jugador y por la palabra
 * @param -- $partida1 
 * @param -- $partida2
 * @return int $orden  
 */
function ordenColeccionPartidas ($partida1, $partida2) {
    /*int $orden */  
    if ($partida1["jugador"] == $partida2["jugador"]) {
        if ($partida1["palabraWordix"] == $partida2["palabraWordix"]) {
           $orden = 0;
        } elseif ($partida1 ["palabraWordix"] < $partida2["palabraWordix"]) {               
            $orden = -1; 
        } else {
            $orden = 1; 
        }
    } elseif ($partida1["jugador"] < $partida2["jugador"]) {
        if ($partida1["palabraWordix"] < $partida2["palabraWordix"]) {
            $orden = -1; 
        } else {
            $orden = 1; 
        }
    }  else {
         $orden = 1; 
}
return $orden;                                                                       //Se utiliza el retorno para poder usar el uasort 
}

/**
 * Funcion que verifica si se uso una palabra
 * @param string $nombreJugador
 * @param int $nroPalabra
 * @param array $coleccionPartidas
 * @param array $coleccionPalabras
 * @return int
 */
function palabraUsada($nombreJugador,$nroPalabra,$coleccionPartidas,$coleccionPalabras){
    //int $stop, $i, $usado
    $stop=count($coleccionPartidas);
    $i=0;
    $usado=0;
    while($i<$stop && $usado==0){
        if($nombreJugador==$coleccionPartidas[$i]["jugador"] && 
        $coleccionPalabras[$nroPalabra]==$coleccionPartidas[$i]["palabraWordix"]){
            $usado=1;
        }else{
            $i=$i+1;
        }
    }
    return $usado;

}
/**
 * Funcion que pide que ingreses un numero diferente. Usado en la opcion 1 para prevenir que el contador avance si el usuario mete un numero repetido
 * @param int $nro
 * @param int $anteriorNro
 * @return int
 */

 function ingresarOtroNro($anteriorNro, $nro){
    // int $nuevoNro
    $nuevoNro=$nro;
     while($nuevoNro==$anteriorNro){
        echo "Usted ya ingreso este numero. Ingrese otro:\n";
        $nuevoNro=trim(fgets(STDIN));

     }
     return $nuevoNro;

 }

 /**
  * Verifica que no sea cero. Hubo en error al momento de ingresar el cero en la opcion 1. Permitia jugar con la palabra -1 que no esxiste.
  *@param int $unNro
  *@return int
  */
  function noEsCero($unNro){
    // int $esCero
    $esCero=0;
   while($esCero==0){
    echo "No esxiste esta posicion. Ingrese otra: ";
    $esCero=trim(fgets(STDIN));
   }
   return $esCero;
  }

/**
 * Funcion que contiene el cuerpo de la opcion 1
 * @param array $listaPartidas
 * @param array $listaPalabras
 * @return array
 */
function opcionUno($listaPartidas,$listaPalabras){
    // array $resumenPartidaJugada
    //int $nroAnterior, $posicionPalabra, $cont, $limite, $estaUsada, $aux
    // string $esPosicionPalabra
    $nroAnterior=0;
    $esNombreUsuario = solicitarJugador(); //Solicita nombre a usuario

    echo "Ingrese un nro de palabra para jugar: "; // Solicita un número de palabra para jugar
    $posicionPalabra =  trim(fgets(STDIN));
    if($posicionPalabra==0){// se asegura que no sea cero el numero. Si es cero ocurre un error, la posicion quedaria -1
        $aux=$posicionPalabra;
        $posicionPalabra=noEsCero($aux);
    }
    $estaUsada=palabraUsada($esNombreUsuario,$posicionPalabra-1,$listaPartidas,$listaPalabras);// se asegura que la palabra no se haya usado
    $cont=0;
    $limite=count($listaPalabras);
    while($estaUsada==1 && $cont<=$limite){
        if($cont==$limite){// en el caso de que el usuario haya usado todas las palabras lo saca de la repetitiva
            
            $cont=$cont+1;
        }
        if($posicionPalabra<$limite){
            if ($nroAnterior==$posicionPalabra){
                $posicionPalabra=ingresarOtroNro($nroAnterior,$posicionPalabra);// impide que el contador avance si el usario ingresa el mismo numero varias veces
                $nroAnterior=$posicionPalabra;
                }else{
                $nroAnterior=$posicionPalabra;// guarda el numero ingresado para comparar en la siguiente ejecucion
            }
        echo "Usted ya uso esta palabra. Seleccione otra: ";
        $posicionPalabra =  trim(fgets(STDIN));
            
        $estaUsada=palabraUsada($esNombreUsuario,$posicionPalabra-1,$listaPartidas,$listaPalabras);
        $cont=$cont+1;
    }else{
        echo "No es un nro de palabra correcto. Ingrese otro: ";
        $posicionPalabra =  trim(fgets(STDIN));

    }
    }
    
    if ($posicionPalabra > $limite) {
        echo "no es un nro de palabra correcto\n";
        $resumenPartidaJugada=[0];
    }elseif($cont > $limite){
        echo "Usted ya uso todas las palabras\n";
        $resumenPartidaJugada=[0];
    } else {
        $esPalabraWordix = $listaPalabras[$posicionPalabra-1]; //Accedemos a la posicion de la palabra
        $resumenPartidaJugada = jugarWordix($esPalabraWordix, $esNombreUsuario);//Invocando la funcion jugar Wordix
      
    }

    return $resumenPartidaJugada;
   
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
//string $esNombreUsuario, $palabra                                                                                                                  //Falta declaracion del caso 1
//int $opcion, $cantPartidas, $nroPartida, $stop, $i, $posicionPrimeraPartida, $n, $indice, $encontrado, $porcentajeVictorias, $indicePalabraAletorio, $parar, $contador                      
//boolean $encontrado
//array $coleccionPalabras, $esColeccionPartidas, $resumenPartidaJugada, $resumen, $coleccionPalabra, $todasPalabras                     


//Inicialización de variables:
$coleccionPalabras = cargarColeccionPalabras(); //invocamos la coleccion de Palabras
$esColeccionPartidas = cargarPartidas();//invocamos la coleccion de Partidas
$todasPalabras=[0];//variable de la opcion 1
$parar=count($coleccionPalabras);//variable de la opcion 2
$contador=0;//variable de la opcion 2
$i=0;
$encontrado1=false;//variable de la opcion 4
$encontrado2=0;//variable de la opcion 5
$indice=-1;//variable de la opcion 5


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo")); //*opcion jugar partida para majo con una palabra melon
//print_r($partida);
//imprimirResultado($partida);


/*
La sentencia switch es similar a una serie de sentencias IF en la misma 
expresión. Ejecuta línea por línea (en realidad, sentencia por sentencia).
Al principio, El código es ejecutado cuando se encuentra una sentencia case
cuya expresión se evalúa a un valor que coincida con el valor de la expresión switch. 
Entonces, PHP continúa ejecutando las sentencias hasta el final del bloque switch,
o hasta la primera vez que vea una sentencia break. Si no se escribe una sentencia break 
al final de la lista de sentencias de un caso, PHP seguirá ejecutando las sentencias del caso siguiente.
Un caso especial es el default. Este caso coincide con cualquier cosa que no se haya correspondido por los otros casos.
*/


do {
    
    $opcion = seleccionarOpcion(); //Invoco a la funcion seleccionarOpcion

switch ($opcion) {
    case 1:
        //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1
        //Caso 1: Jugar al wordix con una palabra elegida.
        
        $PartidaJugada=opcionUno($esColeccionPartidas,$coleccionPalabras);
        //Guardando la partida en la coleccion partidas
        //array_push($esColeccionPartidas, $PartidaJugada); //que pasa si ya use todas las palabras? Guarda un Arreglo vacio
        //como hago la comparacion de arreglo vacio? con otro arreglo vacio
        
        //Guardando la partida en la coleccion partidas
        if($PartidaJugada!=$todasPalabras){//sale el mensaje de un arreglo no definido
        array_push($esColeccionPartidas, $PartidaJugada);
        }
        //print_r($resumenPartidaJugada);
        //print_r($esColeccionPartidas);

        break;


    case 2:
        //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2
        //Caso 2: Jugar al Wordix con una palabra aleatoria

        $esNombreUsuario = solicitarJugador(); //Solicita el nombre de usuario
        
        $indicePalabraAletario = array_rand($coleccionPalabras); //elige un elemento del arreglo aletoriamente
        $usada=palabraUsada($esNombreUsuario,$indicePalabraAletario,$esColeccionPartidas,$coleccionPalabras);
        
        while($usada==1 && $contador<=$parar){
            if($contador==$parar){
                //echo "No hay mas palabras a para jugar\n";
                $contador=$contador+1;
            }else{
            $indicePalabraAletario = array_rand($coleccionPalabras);
            $usada=palabraUsada($esNombreUsuario,$indicePalabraAletario,$esColeccionPartidas,$coleccionPalabras);
            $contador=$contador+1;
        }
        }
        
        //echo "Índice escogido: {$indicePalabraAletario}" . PHP_EOL;
        //echo "Elemento escogido: {$coleccionPalabras[$indicePalabraAletario]}" . PHP_EOL;
        if($contador<$parar){
        $esPalabraWordix = $coleccionPalabras[$indicePalabraAletario]; //Accedemos a la posicion de la palabra
        $resumenPartidaJugada = jugarWordix($esPalabraWordix, $esNombreUsuario);//Invocando la funcion jugar Wordix
        //Guardando la partida en la coleccion partidas
         array_push($esColeccionPartidas, $resumenPartidaJugada);
        }else{
            echo "Usted jugo con todas las palabras";
        }
         

        break;
    case 3:
        //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3
        /*
        Se le solicita al usuario un número de partida y se muestra en pantalla con el
        siguiente formato:
         */
        $cantPartidas=count($esColeccionPartidas);
        echo "Ingrese número de partida: ";

        $nroPartida = solicitarNumeroEntre(0,$cantPartidas-1);
        
        mostrarDatosDePartida($nroPartida, $esColeccionPartidas);

        break;

    case 4:
        /*
        Se le solicita al usuario un nombre de jugador y se muestra en
        pantalla el primer juego ganado por dicho jugador. Por ejemplo
        si el usuario ingresa el nombre “Majo”
        */

        $esNombreUsuario = solicitarJugador();
        $stop=count($esColeccionPartidas);//variable de la opcion 4, esta variable se queda en la opcion porque se necesita actualizar
        
        while($i<$stop && $encontrado1==false){
        if ($esNombreUsuario == $esColeccionPartidas[$i]["jugador"]) {
            
            $posicionPrimeraPartida = primeraPartidaGanada($esColeccionPartidas, $esNombreUsuario);

            //echo "posicion: ".$posicionPrimeraPartida;

            if ($posicionPrimeraPartida == $i) {
                mostrarDatosDePartida($posicionPrimeraPartida, $esColeccionPartidas);
            } else {
                echo "El jugador $esNombreUsuario no ganó ninguna partida\n";
            }
            $encontrado1=true;
            
           
        } else {
            $i=$i+1;
        }
        
    }
    if($i==$stop && $encontrado1==false){
        echo "No existe jugador\n";
        }

        break;
    case 5:
        /*
        Se le solicita al usuario que ingrese un nombre de jugador
        y se muestra la siguiente información:
        */
        $esNombreUsuario = solicitarJugador();
            //error si no existe jugador, recorrer con un while el arreglo para verifcar que este el nombre
        $n = count($esColeccionPartidas);//variable de la opcion 5. Se la inicializa en la opcion porque se debe actualizar
        //echo "cantidad de partidas: ".$n."\n";
        
        while ($i < $n && $encontrado2==0) {
            echo "posicion: ".$i. "\n";
            if($esNombreUsuario == $esColeccionPartidas[$i]["jugador"]){
                $indice=$i;
                $encontrado2=1;
                
            }
            $i=$i+1;
        }
            
        if($encontrado2==1){
        $resumen = resumenJugador($esColeccionPartidas, $esNombreUsuario);
        
            //print_r($resumen);
        $porcentajeVictorias = (int)($resumen["victorias"] * 100 /  $resumen["partidas"]);
        echo "*********************************\n";
        echo "Jugador: " .$resumen["nombre"] ."\n" ;
        echo "Partidas:". $resumen["partidas"]  ."\n";
        echo "Puntaje Total: " . $resumen["puntaje"] ."\n";
        echo "Victorias:" .$resumen["victorias"]. "\n";
        echo "Porcentaje Victorias: $porcentajeVictorias % \n";
        echo "Adivinadas: \n";
        echo " Intento 1: ".$resumen["intento1"]."\n";
        echo " Intento 2: ".$resumen["intento2"]."\n";
        echo " Intento 3: ".$resumen["intento3"]."\n";
        echo " Intento 4: ".$resumen["intento4"]."\n";
        echo " Intento 5: ".$resumen["intento5"]."\n";
        echo " Intento 6: ".$resumen["intento6"]."\n";
        echo "*********************************\n";
          
        }else{
            echo "Error. Nombre de jugador no encontrado\n"; //Tiene que pedir que ingrese otro nombre de jugador?
        }
            break;
        case 6:
        /*
        Se mostrará en pantalla la estructura ordenada 
        alfabéticamente por jugador y por palabra (ser ordena 
        una vez, por ambos criterios), utilizando la función predefinida
        uasort de php, y la función predefinida print_r.
        */
        
        uasort ($esColeccionPartidas, 'ordenColeccionPartidas'); 
        print_r($esColeccionPartidas) ;
        
        break;

        case 7:
            /*
            Debe solicitar una palabra de 5 letras al usuario y agregarla
            en mayúsculas a la colección de palabras que posee Wordix, para
            que el usuario pueda utilizarla para jugar.
            */
            $palabra = leerPalabra5Letras(); // Funcion para solicitar una palabra de 5 letras

            //$esUnaPalabra = esPalabra($palabra); //Funcion que verifica que la palabra sea texto

            $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra); //Agrega la palabra a la colección

            echo "Palabra $palabra agregada! ";
            //print_r($coleccionPalabras);
            break;
    }
} while ($opcion != 8);