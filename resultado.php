<?php
session_start();
//se verifica que se hayan guardado habilidades en la variable de sesión
if (!isset($_SESSION['habilidades_elegidas'])) {
    echo "<p>No se han seleccionado habilidades. Regresa al formulario y elige tus habilidades.</p>";
    exit();
}

//asignamos a nuevas variables las variables de sesión guardadas y las cookies
$nombre = $_COOKIE["nombreC"];
$raza = $_SESSION['r_ganadora'];
$clase = $_SESSION['clase_ganadora'];
$stats = $_SESSION['stats'];

//creamos array clave-valor de las armas por clase
$armas_clase = [
    "Bardo" => "Arpa encantada",
    "Clerigo" => "Maza sagrada",
    "Druida" => "Bastón de madera viva",
    "Guerrero" => "Espada larga",
    "Mago" => "Báculo arcano",
    "Paladin" => "Martillo de guerra",
    "Picaro" => "Daga de sombra",
    "Ranger" => "Arco largo"
];

// Trasfondos por raza
$trasfondos_raza = [
    "Enano" => "Los enanos son conocidos por su resistencia y lealtad. Viviendo en montañas subterráneas, su habilidad para forjar armas y armaduras los hace respetados por todos los reinos.",
    "Elfo" => "Los elfos son seres longevos que valoran la belleza y la naturaleza. Su conexión con la magia y sus entornos les otorga una gracia y sabiduría incomparable.",
    "Mediano" => "Aventureros por accidente, los medianos tienen una habilidad innata para encontrar soluciones inesperadas. Son optimistas y confían mucho en la suerte.",
    "Humano" => "Los humanos son una raza versátil e ingeniosa, capaces de adaptarse a cualquier entorno. Su determinación y ambición los lleva a buscar gloria y conocimiento, dejando su marca en el mundo.",
    "Draconido" => "Orgullosos descendientes de dragones, los dracónidos poseen una fuerza imponente y un sentido del honor profundo. Su herencia los guía en busca de gloria y rectitud.",
    "Gnomo" => "Curiosos e ingeniosos, los gnomos son pequeños inventores siempre en búsqueda de descubrir los secretos del universo con su inagotable energía.",
    "Semielfo" => "Con una herencia mixta, los semielfos combinan la gracia y longevidad de los elfos con la adaptabilidad de los humanos. A menudo son mediadores entre mundos, con un espíritu independiente y aventurero.",
    "Semiorco" => "Fieros y guerreros por naturaleza, los semiorcos se enfrentan al mundo con determinación. Aunque a menudo son malentendidos, valoran la fuerza, el honor y la camaradería.",
    "Tiflin" => "Con un linaje infernal, los tiflin enfrentan la vida con astucia y determinación, superando prejuicios y demostrando que pueden ser héroes excepcionales."
];

// Trasfondos por clase
$trasfondos_clase = [
    "Bardo" => "Su arte y habilidad para inspirar son su arma más poderosa, viajando con gracia entre cortes reales y tabernas.",
    "Clerigo" => "En su devoción divina, el clérigo guía a los demás mientras empuña su arma bendecida contra la corrupción.",
    "Druida" => "Con sus hechizos naturales, el druida equilibra la protección del mundo salvaje con su rol como mediador entre criaturas y civilización.",
    "Guerrero" => "Con disciplina y valentía, el guerrero recorre el campo de batalla, guiado por su entrenamiento impecable.",
    "Mago" => "En su búsqueda de conocimiento, el mago conjura magia poderosa que transforma la realidad misma.",
    "Paladin" => "Con su fe y sentido del deber, el paladín se enfrenta al mal con espada en mano y justicia en su corazón.",
    "Picaro" => "El pícaro utiliza su agudeza y habilidades en las sombras para desentrañar misterios y conseguir su propósito.",
    "Ranger" => "El ranger usa su sabiduría sobre los caminos y los animales para superar desafíos en la naturaleza más salvaje."
];

//asignamos el trasfondo que le corresponde a la elección del usuario
$trasfondo_raza = $trasfondos_raza[$raza];
$trasfondo_clase =$trasfondos_clase[$clase];
$trasfondo_combinado = "$nombre, $raza $clase. $trasfondo_raza $trasfondo_clase";

// Imagen según la raza
$imagenes_razas = [
    "Enano" => "https://i.imgur.com/i0c9ICx.png",
    "Elfo" => "https://roltice.wordpress.com/wp-content/uploads/2020/11/elfo.png",
    "Mediano" => "https://png.pngtree.com/png-vector/20240724/ourmid/pngtree-dnd-adventurer-png-image_12861473.png",
    "Humano" => "https://png.pngtree.com/png-vector/20240724/ourmid/pngtree-dnd-adventurer-png-image_12861468.png",
    "Draconido" => "https://static.wikia.nocookie.net/azitora/images/7/73/Dragonborn.png/revision/latest?cb=20220912214016",
    "Gnomo" => "https://e7.pngegg.com/pngimages/545/585/png-clipart-dungeons-dragons-pathfinder-roleplaying-game-halfling-bard-gnome-dungeons-and-dragons-game-fictional-character.png",
    "Semielfo" => "https://c0.klipartz.com/pngpicture/688/237/gratis-png-pathfinder-juego-de-rol-mazmorras-y-dragones-bard-d20-system-elf-elf-thumbnail.png",
    "Semiorco" => "https://www.dndbeyond.com/avatars/thumbnails/6/466/420/618/636274570630462055.png",
    "Tiflin" => "https://static.wikia.nocookie.net/dungeons202620dragons205c2aa20edicic3b3n/images/d/db/Tiflin.png/revision/latest?cb=20200506121739&path-prefix=es"
];

//asignar imagen a variable
$imagen_raza = $imagenes_razas[$raza]; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // eliminar cookies activas
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, '', time() - 3600, '/');
    }

    // finalizar sesión
    session_unset();
    session_destroy();

    // redirige a index.php
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
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
                        <h3 class="card-title text-center mb-4">Resultado del Personaje</h3>

                        <!-- mostrar trasfondo combinado -->
                        <p class="text-center"><?php echo $trasfondo_combinado; ?></p>

                        <!-- mostrar habilidades y estadísticas en una tabla -->
                        <div class="table-responsive">
                            <table class="table table-dark table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Habilidad</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['habilidades_elegidas'] as $habilidad => $valor): ?>
                                        <tr>
                                            <td><?php echo $habilidad; ?></td>
                                            <td><?php echo $valor; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th colspan="2">Estadísticas</th>
                                    </tr>
                                    <?php foreach ($stats as $atributo => $valor): ?>
                                        <tr>
                                            <td><?php echo $atributo; ?></td>
                                            <td><?php echo $valor; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th>Arma</th>
                                        <td><?php echo $armas_clase[$clase]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- mostrar imagen de la raza -->
                        <div class="text-center my-4">
                            <img src="<?php echo $imagen_raza; ?>" alt="Imagen de la raza" class="img-fluid rounded"
                                style="background-color: <?php echo htmlspecialchars($_SESSION['color_preferido']); ?>;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- botón que resetea la sesión y redirige a index.php -->
        <div class="text-center mt-5">
            <form method="post">
                <button type="submit" class="btn btn-danger btn-lg">Volver al Inicio y Reiniciar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>