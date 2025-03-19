<?php
session_start();

// Verificar si las habilidades están definidas en la sesión
if (!isset($_SESSION['habilidades_elegidas'])) {
    echo "<p>No se han seleccionado habilidades. Regresa al formulario y elige tus habilidades.</p>";
    exit();
}

// Datos básicos del personaje (puedes adaptarlos según tus necesidades)
$nombre = $_COOKIE["nombreC"];
$raza = $_SESSION['r_ganadora'];
$clase = $_SESSION['clase_ganadora'];
$stats = $_SESSION['stats'];

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

$trasfondo_raza = isset($trasfondos_raza[$raza]) ? $trasfondos_raza[$raza] : "Sin trasfondo disponible para esta raza.";
$trasfondo_clase = isset($trasfondos_clase[$clase]) ? $trasfondos_clase[$clase] : "Sin trasfondo disponible para esta clase.";
$trasfondo_combinado = "$nombre, un $raza $clase. $trasfondo_raza $trasfondo_clase.";

// Imagen según la raza (puedes definir más casos para otras razas)
/*
$imagenes_razas = [
    
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
*/

$imagen_raza = isset($imagenes_razas[$raza]) ? $imagenes_razas[$raza] : "imagenes/default.jpg"; //asignar imagen a variable

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Personaje</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        img {
            display: block;
            margin: 0 auto;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <h1>Resultado del Personaje</h1>

    <!-- Mostrar trasfondo combinado -->
    <p><?php echo $trasfondo_combinado; ?></p>

    <!-- Mostrar habilidades y estadísticas en una tabla -->
    <table>
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
</body>
</html>