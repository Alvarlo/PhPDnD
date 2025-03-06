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

 <?php
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
    "Dracónido" => $draconido,
    "Gnomo" => $gnomo,
    "Semielfo" => $semielfo,
    "Semiorco" => $semiorco,
    "Tiflin" => $tiflin
];

echo $_REQUEST['lugar'];
echo $_REQUEST['select'];
print_r ($_REQUEST['habilidades']);

$razaGanadora = array_search(max($razas), $razas);
if($razaGanadora > 0){
    $_SESSION['r_ganadora'] = $razaGanadora;
}else{
    echo "No se ha guardado nada";
}

echo $_SESSION['r_ganadora'];

?>
