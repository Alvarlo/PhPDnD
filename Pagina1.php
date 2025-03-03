<?php
session_start();
if (isset($_REQUEST['nombre'])) {
    setcookie('nombreC', $_REQUEST['nombre']);
} else {
    echo 'No has guardado bien el nombre, por algún motivo';
}

?>

<form action="Pagina2.php" method="post">

    <h4>¿Dónde te gustaría vivir?</h4>
    <p>
        <input type="radio" id="respuestaRadio1" name="lugar" value="bosque">
        <label for="1"> Bosques y naturaleza</label><br>
        <input type="radio" id="respuestaRadio2" name="lugar" value="montaña">
        <label for="2">Montañas y lugares rocosos</label><br>
        <input type="radio" id="respuestaRadio3" name="lugar" value="ciudad">
        <label for="3">Ciudades y civilización</label><br>
    </p>

    <h4>¿Qué cualidad te define mejor?</h4>
    <p>
        <select name="select">
            <option value="fuerzaYresistencia">Fuerza y resistencia</option>
            <option value="inteligenciaYastucia">Inteligencia y astucia</option>
            <option value="carismaYsociabilidad">Carisma y sociabilidad</option>
        </select>
    </p>
    <h4>¿Qué habilidades te interesan?</h4>
    <p>
        <input type="checkbox" id="respuestaCheck1" name="habilidades" value="magia">
        <label for="pregunta1">Magia y hechicería</label><br>
        <input type="checkbox" id="respuestaCheck2" name="habilidades" value="combate">
        <label for="pregunta2">Pelea y combate físico</label><br>
        <input type="checkbox" id="respuestaCheck3" name="habilidades" value="sigilo">
        <label for="pregunta3">Sigilo y destreza</label><br>
    </p>
</form>

<?php
/*
Guardando las respuestas en session y se generará una raza para el personaje que
también se guardará en session. El formulario debe redireccionar a pagina2.php.
*/
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
$razaGanadora = array_search(max($razas), $razas);
if($razaGanadora != 0){
    setcookie('razaC', $razaGanadora);
}else{
    echo "No se ha guardado nada";
}


?>


<form action="Pagina2.php" method="post">
    <p><input type="submit" value="Enviar"></p>
</form>