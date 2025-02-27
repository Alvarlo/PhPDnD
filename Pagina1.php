<?php
session_start();
if (isset($_REQUEST['nombre'])) {
    setcookie('nombreC', $_REQUEST['nombre']);
} else {
    echo 'No has guardado bien el nombre, por algún motivo';
}

?>

<form action="Pagina2.php" method="post">
    <p>
        <input type="checkbox" id="respuestaCheck1" name="vehicle1" value="Bike">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id="respuestaCheck2" name="vehicle2" value="Car">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="respuestaCheck3" name="vehicle3" value="Boat">
        <label for="vehicle3"> I have a boat</label><br>
    </p>
    <p>
        <input type="radio" id="html" name="fav_language" value="1">
        <label for="1">Opcion1</label><br>
        <input type="radio" id="html" name="fav_language" value="2">
        <label for="2">Opcion2</label><br>
        <input type="radio" id="html" name="fav_language" value="3">
        <label for="3">Opcion3
        </label><br>
    </p>


    <p>
        <select name="select">
            <option value="value1">Value 1</option>
            <option value="value2">Value 2</option>
            <option value="value3">Value 3</option>
        </select>
    </p>

</form>