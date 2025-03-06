<!-- Se trata de una página php que contiene un texto con las distintas clases que hay en
D&D y armas que usa cada clase. De igual forma que en pagina1.php se mostrará
ahora el nombre del personaje y su raza para las preguntas que ayudarán a determinar
la raza. Por ejemplo: “Aragorn el humano, ¿te gusta seducir dragones?”.

Deberá haber al menos 4 preguntas que contendrán al menos una respuesta con
number, otra con color, otra con un slider y otra con una fecha. El formulario no debe
dejar que se envíe vacía ninguna de las respuestas.

Guardando las respuestas en session y se generará una clase y un arma principal para
el personaje que también se guardará en session. El formulario debe redireccionar a
pagina3.php.
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina2</title>
    <style>
        body {
            align-items: center;
            text-align: center;
        }

        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
    </style>
</head>

<body>

</body>

</html>
<?php

session_start();

$enano = $elfo = $mediano = $humano = $draconido = $gnomo = $semielfo = $semiorco = $tiflin = 0;

if (isset($_REQUEST['lugar'])) {
    if ($_REQUEST['lugar'] === 'bosque') {
        $elfo += 2;
        $gnomo += 2;
        $mediano += 1;
    } elseif ($_REQUEST['lugar'] === 'montaña') {
        $enano += 2;
        $semiorco += 2;
        $draconido += 1;
    } elseif ($_REQUEST['lugar'] === 'ciudad') {
        $humano += 2;
        $semielfo += 2;
        $tiflin += 1;
    }
}

if (isset($_REQUEST['select'])) {
    if ($_REQUEST['select'] === 'fuerzaYresistencia') {
        $semiorco += 2;
        $enano += 1;
        $draconido += 1;
    } elseif ($_REQUEST['select'] === 'inteligenciaYastucia') {
        $gnomo += 2;
        $tiflin += 1;
        $elfo += 1;
    } elseif ($_REQUEST['select'] === 'carismaYsociabilidad') {
        $semielfo += 2;
        $humano += 1;
        $tiflin += 1;
    }
}

if (isset($_REQUEST['habilidades'])) {
    foreach ($_REQUEST['habilidades'] as $habilidad) {
        if ($habilidad === 'magia') {
            $tiflin += 1;
            $elfo += 1;
            $gnomo += 1;
        } elseif ($habilidad === 'combate') {
            $semiorco += 1;
            $draconido += 1;
            $enano += 1;
        } elseif ($habilidad === 'sigilo') {
            $mediano += 1;
            $semielfo += 1;
            $elfo += 1;
        }
    }
}

$razas = [
    "Enano" => $enano,
    "Elfo" => $elfo,
    "Mediano" => $mediano,
    "Humano" => $humano,
    "Draconido" => $draconido,
    "Gnomo" => $gnomo,
    "Semielfo" => $semielfo,
    "Semiorco" => $semiorco,
    "Tiflin" => $tiflin
];

$razaGanadora = array_search(max($razas), $razas);
if ($razaGanadora > 0) {
    $_SESSION['r_ganadora'] = $razaGanadora;
} else {
    echo "No se ha guardado nada";
}
?>

<body>
    <h2>Hola <?php echo $_COOKIE["nombreC"]; ?>, tu raza es: <?php echo $_SESSION['r_ganadora'] ?></h2>
    <br>

    <h3>Bardo</h3>
    <p>Artistas versátiles que combinan magia, música y habilidades de combate. Pueden inspirar a sus aliados y lanzar poderosos hechizos.</p>
    <h3>Clérigo</h3>
    <p>Devotos seguidores de deidades que canalizan el poder divino para curar, proteger y lanzar hechizos sagrados. Son indispensables para el soporte del grupo.</p>
    <h3>Druida</h3>
    <p>Guardianes de la naturaleza que pueden transformarse en animales y utilizar la magia natural para proteger y restaurar el equilibrio del mundo.</p>
    <h3>Guerrero</h3>
    <p>Maestros del combate que son expertos en el uso de una amplia variedad de armas y técnicas de lucha. Su versatilidad les permite adaptarse a diferentes estilos de combate.</p>
    <h3>Mago</h3>
    <p>Eruditos de la magia que estudian intensamente para dominar una amplia gama de hechizos. Conocidos por su sabiduría y habilidades mágicas avanzadas.</p>
    <h3>Paladín</h3>
    <p>Campeones sagrados que combinan habilidades de combate con poderes divinos para proteger a los inocentes y castigar a los malvados.</p>
    <h3>Pícaro</h3>
    <p>Maestros del sigilo, la agilidad y las tácticas ingeniosas. Son excelentes en combate furtivo y habilidades de subterfugio.</p>
    <h3>Ranger</h3>
    <p>Exploradores expertos y cazadores que se especializan en el combate a distancia y la supervivencia en la naturaleza. A menudo tienen una conexión especial con los animales.</p>


    <form action="Pagina3.php" method="post">

        <label for="entrenamiento">¿Cómo de mazao está tu champ?</label>
        <input type="number" id="entrenamiento" name="entrenamiento" min="1" max="24">

        <br>
        <label for="color">Elige tu color preferido:</label>
        <input type="color" id="color" name="color">

        <br>
        <div class="slidecontainer">
            <p>Nivel de Magia:</p>
            <input type="range" min="0" max="80" value="40" class="slider" id="myRange" name="magic_lvl">
        </div>
        <label for="edad">Fecha de Nacimiento del Personaje:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

        <br>
        <input type="submit" value="Enviar">
    </form>


    <!--
            Azul (Bardo)
            Blanco (Clérigo)
            Verde (Druida
            Rojo (Guerrero)
            Morado (Mago)
            Dorado (Paladín)
            Negro (Pícaro)
            Marrón (Ranger)

     -->
</body>