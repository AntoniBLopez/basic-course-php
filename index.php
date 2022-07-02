<?php

$nombre =  "Toni";
$apellido =  "B. Lopez";
$texto =  "Hola!!!! Soy Toni y estoy escribiendo desde la terminal con nano.\n";
$resultado = "$nombre $apellido dice: $texto"; // se pueden añadir las variables en los strings sin la
// necesidad de añadir nada, esto lo permite PHP.
const Toni = "Soy una constante y funciono maravillosamente"; // la palabra reservada const solo se puede añadir en el scope global
// si se añade en un scope local no funcionará. Esto es porque PHP añade estas constantes en la memoria justo al principio de la
// interpretación del códgio, por lo que lo que se quiera ejecutar después de la compilación si hay una constante no se le añadirá
// un valor y por lo tanto no podrá ser usada

echo $resultado . (13 ?: 10 ); // es un operador que si es mayor da 1 si es igual da 0 y si es menor da -1

$a = (int ) "5"; // pasar un string a int
$b = 5;



echo "\n"; // salto de línea
// Si al sumar un número entero con un string que tiene letras lo primero que encuentra
// en el string es un número, lo ue devuelve primero por consola es un warning (advertencia)
//  y luego otro exactamente igual. Después devuelve el resultado de la suma de
// estos 2 como un numero int, como pasa en la variable michis:

$michis = 3 + "32 michis 5";

var_dump($michis);

echo $michis;

// =

// 13PHP Warning:  A non-numeric value encountered in C:\xampp\htdocs\curso-basico-php\index.php on line 17

// Warning: A non-numeric value encountered in C:\xampp\htdocs\curso-basico-php\index.php on line 17
// int(35)
// 35



echo "\n";
// EJERCICIO CALCULAR LA HORA QUE ES

$segundos = readline("Ingresa el tiempo en segundos: ");

$horas = (int) ($segundos / 3600); // añadimos la operación dentro de los paréntesis
// para que la precedencia haga primero la operación y luego pase el resultado a número entero
// en el caso de no poner paréntesis lo que hace es asignarle a segundos el int y luego hace la
// operación que nos devuelve un resultado punto decimal y no nos sirve el int para lo que lo queremos utilizar.
$segundos = (int) ($segundos % 3600);
$minutos = (int) ($segundos / 60);
$segundos = (int) ($segundos % 60);

echo "Son las $horas:$minutos:$segundos.";



echo "\n";
// RETO: LEER HORA, MINUTOS Y SEGUNDOS DE UN USUSARIO Y MOSTRARLO POR CONSOLA TRADUCIDO A SEGUNDOS

$horas = readline("Ingresa la hora: ");
$minutos = readline("Ingresa los minutos: ");
$segundos = readline("Ingresa los segundos: ");

$resultado = (int) ($horas * 3600 + $minutos * 60 + $segundos);

echo "\n El resultado en segundos es de $resultado";

$r = (boolean) 0;

echo "\n $r";



echo "\n";
// ARRAYS

// las 2 formas de declarar un array:

$toni = array("hola Toni", "adios Toni");
$toni2 = ["hola Toni", "adios Toni"];

echo "Primer Array: {$toni[0]}, Segundo Array: {$toni2[1]}";

echo "\n";
// array anidado:

$personas = array(
	"Toni" => array(
		"Edad" => 24,
		"Fecha de nacimiento" => "01-11-1997"
	),
	"Marta" => "Hola Marta"
);

echo $personas["Toni"]["Fecha de nacimiento"];



echo "\n";
// RETO: CREAR UN ARRAY CON 3 MICHIS Y CADA UNO DE ELLOS TIENE QUE TENER UN NOMBRE, UNA OCUPACIÓN, UN COLOR Y COMIDAS,
// LAS COMIDAS TIENEN QUE SUBDIVIDIRSE EN COMIDAS FAVORITAS Y EN COMIDAS QUE NO LES GUSTA

$michis = [
    [
        "Nombre" => "Carlos",
        "Ocupacion" => "dormir",
        "Color" => "blanco",
        "Comidas" => [
            "Favoritas" => "pate, gusanos, rinocerontes",
            "NoGusta" => "elefantes, girafas, hormigas"
        ]
    ],
    [
        "Nombre" => "Maria",
        "Ocupacion" => "maullar",
        "Color" => "rubio",
        "Comidas" => [
            "Favoritas" => "carne de pollo, carne de ternera, carne de cerdo",
            "NoGusta" => "salmon, anchoas, conchas"
        ]
    ],
    [
        "Nombre" => "Omar",
        "Ocupacion" => "arañar",
        "Clor" => "negro",
        "Comidas" => [
            "Favoritas" => "pollo con reggueton, salmon, boquerones",
            "NoGusta" => "verduras, agua, leche"
        ]
    ],
];

echo "Las comidas favoritas de Omar son: {$michis[2]["Comidas"]["Favoritas"]}";



echo "\n";
// SWITCH

$userDonations = readline("Porfavor, indica la cantidad de ingresos generados: ");

switch ($userDonations >= 100) {
    case true:
        echo "Se han retirado $userDonations$ con éxito.";
        break;
    default:
        echo "Las donaciones no llegan al mínimo requerido para poder realizar la retirada.\n";
}



echo "\n";
// RETO: CUANTOS CAMINOS HAY PARA LLEGAR A UNA TIENDA DESTINO DESDE LA TIENDA 1 A LA TIENDA DESEADA:

// Descripción larga y detallada:
// Siempre empiezo desde la tienda número 1 y tengo que llegar por ejemplo a la tienda 6: del 1 al 6, tengo que pasar por el 2, 3, 4, 5 y llegar al 6.
// Estas tienda están conectadas entre sí, formando un triángulo por orden de tienda (Tienda 1, Tienda 2, Tienda 3, Tienda  4...), ejemplo:
// Si dibujamos la forma de un triángulo, la tienda número 1 la situamos en la esquina inferior izquierda del triángulo, la número 2 en la punta superior
// y la número 3 en la esquina inferior derecha. Luego la número 4 la añadiríamos trazando una línea recta horizontal desde el punto número 2 hacia su derecha
// y la número 5 trazando una línea recta horizontal desde el número 3 hacia la derecha, creando así la forma de otro tríangulo.
// Si entrelazamos los 2 triangulos haciendo que se simule en el medio un
// triangulo invertido entre estos 2 triangulos formados, tenemos la referencia visual del ejercicio. (no es fácil de comprender sin la imágen visual)
// Cuanto más grande el número de la tienda destino, más caminos para llegar a él.


// Entonces, ¿Cómo puedo simular los caminos con el código para poder hacer el cálculo de cuántos caminos tengo para llegar al destino deseado?

// USANDO LA SECUENCIA DE FIBBONACHI:
// Tenemos dos números 1 y 1, y estos los sumamos (1 + 1 = 2). El resultado lo sumamos con el número anterior (2 + 1 = 3), y este resultado, lo sumamos con el resultado anterior (3 + 2 = 5) y así succesivamente...

// 1
// 1
// 2
// 3
// 5
// 8
// 13
// 21
// ...

$tiendaDestino = (int) readline("Introduce el numero de la tienda destino: ");

$registroCaminosLlegarDestino = [1, 1];
$ultimoIndexArray = 1;

for ($tiendaActual = 2; $tiendaActual < $tiendaDestino; $tiendaActual++, $ultimoIndexArray++) {
    $resultadoCaminos = ($registroCaminosLlegarDestino[$ultimoIndexArray] + $registroCaminosLlegarDestino[$ultimoIndexArray - 1]);
    $registroCaminosLlegarDestino[] = $resultadoCaminos;
};

echo "Hay {$registroCaminosLlegarDestino[$ultimoIndexArray]} formas de llegar a tu tienda destino, TOMA YA! ";
