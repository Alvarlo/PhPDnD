<?php
//comenzamos de nuevo sesion en php
session_start();

//inicialiamos variables a 0
$enano = $elfo = $mediano = $humano = $draconido = $gnomo = $semielfo = $semiorco = $tiflin = 0;

//asignamos puntuación por lugar
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
//asignamos puntuación por select
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
//asignamos puntuación por checkbox
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
//creamos array clave-valor con razas y con las puntuaciones asginadas previamente
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
//seleccionamos la raza con mas puntos y la asignamos a una variable de sesión
$razaGanadora = array_search(max($razas), $razas);
if ($razaGanadora > 0) {
    $_SESSION['r_ganadora'] = $razaGanadora;
} else {
    echo "No se ha guardado nada";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina2</title>
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
                        <h2 class="card-title text-center mb-4">
                            Hola <?php echo $_COOKIE["nombreC"]; ?>, tu raza es:
                            <?php echo $_SESSION['r_ganadora']; ?>
                        </h2>

                        <h3 class="text-warning text-center">Clases Disponibles</h3>
                        <div class="my-4">
                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Bardo</div>
                                <div class="card-body">
                                    <p class="card-text">Artistas versátiles que combinan magia, música y habilidades de combate.
                                        Pueden inspirar a sus aliados y lanzar poderosos hechizos.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Clérigo</div>
                                <div class="card-body">
                                    <p class="card-text">Devotos seguidores de deidades que canalizan el poder divino para curar,
                                        proteger y lanzar hechizos sagrados. Son indispensables para el soporte del grupo.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Druida</div>
                                <div class="card-body">
                                    <p class="card-text">Guardianes de la naturaleza que pueden transformarse en animales y utilizar
                                        la magia natural para proteger y restaurar el equilibrio del mundo.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Guerrero</div>
                                <div class="card-body">
                                    <p class="card-text">Maestros del combate que son expertos en el uso de una amplia variedad de
                                        armas y técnicas de lucha. Su versatilidad les permite adaptarse a diferentes estilos de
                                        combate.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Mago</div>
                                <div class="card-body">
                                    <p class="card-text">Eruditos de la magia que estudian intensamente para dominar una amplia gama
                                        de hechizos. Conocidos por su sabiduría y habilidades mágicas avanzadas.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Paladín</div>
                                <div class="card-body">
                                    <p class="card-text">Campeones sagrados que combinan habilidades de combate con poderes divinos
                                        para proteger a los inocentes y castigar a los malvados.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Pícaro</div>
                                <div class="card-body">
                                    <p class="card-text">Maestros del sigilo, la agilidad y las tácticas ingeniosas. Son excelentes
                                        en combate furtivo y habilidades de subterfugio.</p>
                                </div>
                            </div>

                            <div class="card mb-3 bg-dark text-white border-light">
                                <div class="card-header text-primary">Ranger</div>
                                <div class="card-body">
                                    <p class="card-text">Exploradores expertos y cazadores que se especializan en el combate a
                                        distancia y la supervivencia en la naturaleza. A menudo tienen una conexión especial con los
                                        animales.</p>
                                </div>
                            </div>
                        </div>

                        <form action="Pagina3.php" method="post" class="mt-4">
                            <div class="mb-3">
                                <label for="entrenamiento" class="form-label">¿Cómo de mazao está tu champ?</label>
                                <input type="number" id="entrenamiento" name="entrenamiento" min="1" max="24"
                                    class="form-control bg-dark text-light" required>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Elige tu color preferido:</label>
                                <input type="color" id="color" name="color" class="form-control form-control-color"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="myRange" class="form-label">Nivel de Magia:</label>
                                <input type="range" min="0" max="80" value="40" class="form-range" id="myRange"
                                    name="magic_lvl">
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento del
                                    Personaje:</label>
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                    class="form-control bg-dark text-light" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>