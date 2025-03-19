<?php
session_start();
//inicializamos array de clases si no esta seteado previamente
if (!isset($_SESSION['clases'])) {
    $_SESSION['clases'] = [
        "Bardo" => 0,
        "Clerigo" => 0,
        "Druida" => 0,
        "Guerrero" => 0,
        "Mago" => 0,
        "Paladin" => 0,
        "Picaro" => 0,
        "Ranger" => 0
    ];
}
//asginamos a la variable clases nuestra variable de sesion clases
$clases = $_SESSION['clases'];

// Función para determinar el signo del zodiaco basado en la fecha
function obtenerSignoZodiaco($fecha_nacimiento)
{
    $zodiaco = [
        "Aries" => ["start" => "03-21", "end" => "04-19"],
        "Tauro" => ["start" => "04-20", "end" => "05-20"],
        "Geminis" => ["start" => "05-21", "end" => "06-20"],
        "Cancer" => ["start" => "06-21", "end" => "07-22"],
        "Leo" => ["start" => "07-23", "end" => "08-22"],
        "Virgo" => ["start" => "08-23", "end" => "09-22"],
        "Libra" => ["start" => "09-23", "end" => "10-22"],
        "Escorpio" => ["start" => "10-23", "end" => "11-21"],
        "Sagitario" => ["start" => "11-22", "end" => "12-21"],
        "Capricornio" => ["start" => "12-22", "end" => "01-19"],
        "Acuario" => ["start" => "01-20", "end" => "02-18"],
        "Piscis" => ["start" => "02-19", "end" => "03-20"]
    ];

    $mes_dia = date("m-d", strtotime($fecha_nacimiento));

    foreach ($zodiaco as $signo => $rango) {
        if ($mes_dia >= $rango["start"] && $mes_dia <= $rango["end"]) {
            return $signo;
        }
    }

    return null;
}

// Función para asignar puntos según el signo del zodiaco
function asignarPuntos($signo)
{
    global $clases;
    switch ($signo) {
        case "Aries":
            $clases["Guerrero"]++;
            $clases["Paladin"]++;
            break;
        case "Tauro":
            $clases["Druida"]++;
            $clases["Ranger"]++;
            break;
        case "Geminis":
            $clases["Bardo"]++;
            $clases["Picaro"]++;
            break;
        case "Cancer":
            $clases["Clerigo"] += 2;
            break;
        case "Leo":
            $clases["Guerrero"] += 2;
            break;
        case "Virgo":
            $clases["Mago"]++;
            $clases["Clerigo"]++;
            break;
        case "Libra":
            $clases["Bardo"] += 2;
            break;
        case "Escorpio":
            $clases["Picaro"]++;
            $clases["Mago"]++;
            break;
        case "Sagitario":
            $clases["Ranger"] += 2;
            break;
        case "Capricornio":
            $clases["Paladin"] += 2;
            break;
        case "Acuario":
            $clases["Mago"] += 2;
            break;
        case "Piscis":
            $clases["Druida"]++;
            $clases["Clerigo"]++;
            break;
    }
}

// Obtener la fecha de nacimiento del formulario
if (isset($_REQUEST["fecha_nacimiento"])) {
    $fecha_nacimiento = $_REQUEST["fecha_nacimiento"];
    $signo = obtenerSignoZodiaco($fecha_nacimiento);
    if ($signo) {
        asignarPuntos($signo);
    }
}

//asignacion de puntos segun su entrenamiento
if (isset($_REQUEST["entrenamiento"])) {
    if ($_REQUEST["entrenamiento"] >= 1 and $_REQUEST["entrenamiento"] <= 3) {
        $clases["Clerigo"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 4 and $_REQUEST["entrenamiento"] <= 6) {
        $clases["Mago"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 7 and $_REQUEST["entrenamiento"] <= 9) {
        $clases["Bardo"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 10 and $_REQUEST["entrenamiento"] <= 12) {
        $clases["Druida"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 13 and $_REQUEST["entrenamiento"] <= 15) {
        $clases["Picaro"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 16 and $_REQUEST["entrenamiento"] <= 18) {
        $clases["Ranger"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 19 and $_REQUEST["entrenamiento"] <= 21) {
        $clases["Paladin"]++;
    } elseif ($_REQUEST["entrenamiento"] >= 22 and $_REQUEST["entrenamiento"] <= 24) {
        $clases["Guerrero"]++;
    }
}

//asignacion de puntos segun nivel mágico
if (isset($_REQUEST["magic_lvl"])) {
    if ($_REQUEST["magic_lvl"] >= 0 and $_REQUEST["magic_lvl"] <=  9) {
        $clases["Guerrero"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 10 and $_REQUEST["magic_lvl"] <=  19) {
        $clases["Picaro"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 20 and $_REQUEST["magic_lvl"] <=  29) {
        $clases["Ranger"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 30 and $_REQUEST["magic_lvl"] <=  39) {
        $clases["Paladin"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 40 and $_REQUEST["magic_lvl"] <=  49) {
        $clases["Druida"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 50 and $_REQUEST["magic_lvl"] <=  59) {
        $clases["Bardo"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 60 and $_REQUEST["magic_lvl"] <=  69) {
        $clases["Clerigo"]++;
    }
    if ($_REQUEST["magic_lvl"] >= 70 and $_REQUEST["magic_lvl"] <=  80) {
        $clases["Mago"]++;
    }
}

//seleccionamos clase con más puntuacion y la asignamos a una variable de sesión
$claseganadora = array_search(max($clases), $clases);
if ($claseganadora) {
    $_SESSION['clase_ganadora'] = $claseganadora; 
} else {
    echo "No se ha encontrado una clase ganadora.";
}

//asginamos a la variable clases nuestra variable de sesion clases
$_SESSION['clases'] = $clases;

//asignamos el color elegido a una variable de sesion
if (isset($_POST['color'])) {
    $_SESSION['color_preferido'] = $_POST['color'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            background-image: url(https://wallpapercave.com/wp/wp12633136.jpg);
            background-size: cover;
            background-attachment: fixed;
        }
</style>
</head>

<body class="bg-dark text-white">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card bg-secondary text-light shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Características de Dungeons & Dragons</h3>

                        <h4 class="text-warning">Fuerza</h4>
                        <p class="card-text">La Fuerza mide la potencia muscular y la capacidad de cargar y levantar objetos. Es fundamental para los personajes que se especializan en el combate cuerpo a cuerpo, como los guerreros y los bárbaros.</p>

                        <h4 class="text-warning">Destreza</h4>
                        <p class="card-text">La Destreza mide la agilidad, los reflejos y el equilibrio. Es crucial para personajes que dependen de la precisión y la rapidez, como los pícaros y los arqueros.</p>

                        <h4 class="text-warning">Constitución</h4>
                        <p class="card-text">La Constitución mide la salud, la resistencia y la vitalidad general. Influye directamente en los puntos de golpe (HP) de un personaje, lo que es importante para todos los aventureros, especialmente aquellos en la primera línea de combate.</p>

                        <h4 class="text-warning">Inteligencia</h4>
                        <p class="card-text">La Inteligencia mide la agudeza mental, el aprendizaje y la capacidad de razonamiento. Es una característica clave para los magos y otros lanzadores de conjuros que dependen del conocimiento arcano.</p>

                        <h4 class="text-warning">Sabiduría</h4>
                        <p class="card-text">La Sabiduría mide la percepción, la intuición y el juicio. Es esencial para clérigos y druidas, ya que influye en su capacidad para lanzar conjuros divinos y comprender el mundo natural.</p>

                        <h4 class="text-warning">Carisma</h4>
                        <p class="card-text">El Carisma mide la fuerza de personalidad, la capacidad de liderazgo y la influencia. Es vital para bardos, paladines y hechiceros, quienes utilizan su presencia y persuasión para inspirar a otros y lanzar conjuros.</p>

                        <hr>

                        <h3 class="text-center text-primary">Bienvenido, <?php echo $_COOKIE["nombreC"]; ?></h3>
                        <p>Tu raza es: <strong><?php echo $_SESSION['r_ganadora']; ?></strong></p>
                        <p>Tu clase es: <strong><?php echo $_SESSION['clase_ganadora']; ?></strong></p>

                        <form method="get" class="text-center my-4">
                            <button type="submit" value="generar_estadisticas" class="btn btn-primary">Generar Estadísticas</button>
                        </form>

                        <div>
                            <h4 class="text-warning">Tus estadísticas</h4>
                            <?php
                            if(isset($_SESSION['stats'])){
                                foreach ($_SESSION['stats'] as $stat => $value) {
                                echo "<p><strong>$stat:</strong> $value</p>";
                            }
                        }
                            ?>
                        </div>

                        <form action="Pagina4.php" method="post" class="text-center my-4">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
//inicializamos array clave-valor de modificadores por raza
$modificadores_razas = [
    "Humano" => ["Fuerza" => 1, "Destreza" => 1, "Constitucion" => 1, "Inteligencia" => 1, "Sabiduria" => 1, "Carisma" => 1],
    "Elfo" => ["Destreza" => 2],
    "Enano" => ["Constitucion" => 2],
    "Mediano" => ["Destreza" => 2],
    "Semielfo" => ["Carisma" => 2],
    "Tiflin" => ["Inteligencia" => 1, "Carisma" => 2],
    "Gnomo" => ["Inteligencia" => 2],
    "Draconido" => ["Fuerza" => 2, "Carisma" => 1],
    "Semiorco" => ["Fuerza" => 2, "Constitucion" => 1],
];
//funcion para generar estadisticas: crea atributos, los randomiza y añade el valor del modificador de raza a los generados
function generar_stats(){
    global $modificadores_razas;

    $raza = $_SESSION['r_ganadora'];
    $atributos = ["Inteligencia", "Fuerza", "Destreza", "Constitucion", "Sabiduria", "Carisma"];
    $stats = [];
    foreach ($atributos as $atributo) {
        $stats[$atributo] = rand(8, 18);
    }

    if (array_key_exists($raza, $modificadores_razas)) {
        foreach ($modificadores_razas[$raza] as $atributo => $modificador) {
            if (isset($stats[$atributo])) {
                $stats[$atributo] += $modificador;
            }
        }
    } else {
        echo "La raza '$raza' no tiene modificadores definidos.\n";
    }

//asigna a una variable de sesion el array de estadísticas generadas
    $_SESSION['stats'] = $stats;
}

//cuando se usa el metodo get, se llama a la funcion generar_stats
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    generar_stats();
}
?>
