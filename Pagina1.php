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
        <input type="checkbox" id="respuestaCheck1" name="habilidades[]" value="magia">
        <label for="pregunta1">Magia y hechicería</label><br>
        <input type="checkbox" id="respuestaCheck2" name="habilidades[]" value="combate">
        <label for="pregunta2">Pelea y combate físico</label><br>
        <input type="checkbox" id="respuestaCheck3" name="habilidades[]" value="sigilo">
        <label for="pregunta3">Sigilo y destreza</label><br>
    </p>
    <input type="submit" value="Enviar">
</form>

<?php
/*
Guardando las respuestas en session y se generará una raza para el personaje que
también se guardará en session. El formulario debe redireccionar a pagina2.php.
*/
?>

