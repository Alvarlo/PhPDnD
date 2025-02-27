# PhPDnD
Práctica formularios, session y cookies DND

Práctica formularios, session y cookies PHP con D&D.
Dungeons & Dragons (D&D) es un juego de rol de mesa en el que los jugadores crean personajes ficticios que se embarcan en aventuras narradas por un "Dungeon Master" (DM). Cada personaje tiene atributos como fuerza, destreza, inteligencia, entre otros, que influyen en sus acciones y habilidades dentro del juego. Además, cada uno pertenece a una raza (elfo, enano, humano, etc.) y a una clase (guerrero, mago, pícaro, etc.), lo que define sus poderes y estilo de juego.
El objetivo de esta práctica es desarrollar un script en PHP que permita crear un personaje básico de D&D. Implementaremos la lógica necesaria para:
• Asignar nombre, raza y clase al personaje.
• Generar atributos al azar siguiendo las reglas básicas del juego.
• Mostrar un resumen detallado del personaje creado.
Contenido de la práctica:
Index.php: Se trata de una página php que tiene un formulario para que insertes el nombre de tu personaje. Será obligatorio rellenar el nombre para poder completar el formulario y se guardará el nombre en una cookie. Una vez completo el formulario se redirigirá a páina1php.
Pagina1.php: Se trata de una página php que contiene un texto en el que se describen las razas que existen en D&D y se hacen 3 preguntas en un formulario para que se le asigne al usuario una de esas razas.Las preguntas tienen que tener el nombre del personaje que se decidió en el index. Por ejemplo: ¿Ves en la oscuridad ‘Aragorn’?

Las posibles repuestas del formulario serán de tipo radioButton, checkbox y select (obligatoriamente al menos una de cada). El formulario no debe dejar que se envíe vacía ninguna de las respuestas.
Guardando las respuestas en session y se generará una raza para el personaje que también se guardará en session. El formulario debe redireccionar a pagina2.php.

Pagina2.php: Se trata de una página php que contiene un texto con las distintas clases que hay en D&D y armas que usa cada clase. De igual forma que en pagina1.php se mostrará ahora el nombre del personaje y su raza para las preguntas que ayudarán a determinar la raza. Por ejemplo: “Aragorn el humano, ¿te gusta seducir dragones?”.
Deberá haber al menos 4 preguntas que contendrán al menos una respuesta con number, otra con color, otra con un slider y otra con una fecha. El formulario no debe dejar que se envíe vacía ninguna de las respuestas.
Guardando las respuestas en session y se generará una clase y un arma principal para el personaje que también se guardará en session. El formulario debe redireccionar a pagina3.php.

Pagina3.php: Se trata de una página php que contiene un texto con la descripción de las distintas características que hay en D&D (inteligencia, fuerza, destreza, constitución, sabiduría,
carisma) y aparecerá un botón (tipo button) que generará aleatoriamente unos valores para el usuario, a los valores generados se le tendrán que sumar los valores extra de cada clase/raza, por ejemplo, el enano tiene un +2 de fuerza o el gnomo un +2 de inteligencia. Se guardarán los datos como un array asociativo con los valores en session. Este formulario redireccionará a pagina4php.

Pagina4.php: Se trata de una página php que contiene un texto con la descripción de las distintas habilidades que hay en D&D (acrobacias, atletismo, conocimiento arcano...) que aparecerán en checkbox para que el usuario pueda elegir al menos 4 y máximo 8.
Se almacenarán las respuestas en session en un array asociativo, añadienndo a cada una un valor entre 2 y 5. Este formulario redireccionará a resultado.php.
resultado.php

Con los datos definidos en session se mostrará un texto con un pequeño trasfondo de nuestro personaje y mostrando una pequeña tabla al final con los datos de cada respuesta. Deberá contener también una imagen (en función de la raza). 
Ejemplo:
“Aragorn, un humano guerrero, nació en una aldea fronteriza asolada por la violencia, donde perdió a su familia durante un ataque de orcos. Rescatado por un veterano caballero, fue entrenado en el arte de la guerra, dominando la espada y el escudo mientras forjaba un carácter marcado por la disciplina y el honor. A pesar de las cicatrices de su pasado, Aragorn lucha por proteger a los inocentes y restaurar la paz, guiado por un férreo código moral que lo impulsa a enfrentar cualquier peligro sin dudar.”
Nombre Raza Clase Arma Aragorn Humano Guerrero Espada y escudo Inteligencia 10 Intimidación +3 Fuerza 17 Percepción +2 Destreza 8 Perspicacia +4 Constitución 13 Supervivencia +3 Sabiduría 13 Atletismo +5 Carisma 15 Acrobacias +2
