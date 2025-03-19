<?php
//empezamos la sesion en php y guardamos la cookie del nombre
session_start();
if (isset($_REQUEST['nombre'])) {
    setcookie('nombreC', $_REQUEST['nombre']);
} else {
    echo 'No has guardado bien el nombre, por algún motivo';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina1</title>
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
                        <h3 class="card-title text-center mb-4">Formulario de Preferencias</h3>

                        <form action="Pagina2.php" method="post">
                            <div class="mb-4">
                                <h4 class="text-warning">¿Dónde te gustaría vivir?</h4>
                                <div class="form-check">
                                    <input type="radio" id="respuestaRadio1" name="lugar" value="bosque" class="form-check-input" required>
                                    <label class="form-check-label" for="respuestaRadio1">Bosques y naturaleza</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="respuestaRadio2" name="lugar" value="montaña" class="form-check-input" required>
                                    <label class="form-check-label" for="respuestaRadio2">Montañas y lugares rocosos</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="respuestaRadio3" name="lugar" value="ciudad" class="form-check-input" required>
                                    <label class="form-check-label" for="respuestaRadio3">Ciudades y civilización</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-warning">¿Qué cualidad te define mejor?</h4>
                                <select name="select" class="form-select bg-dark text-white" required>
                                    <option value="fuerzaYresistencia">Fuerza y resistencia</option>
                                    <option value="inteligenciaYastucia">Inteligencia y astucia</option>
                                    <option value="carismaYsociabilidad">Carisma y sociabilidad</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-warning">¿Qué habilidades te interesan?</h4>
                                <div class="form-check">
                                    <input type="checkbox" id="respuestaCheck1" name="habilidades[]" value="magia" class="form-check-input">
                                    <label class="form-check-label" for="respuestaCheck1">Magia y hechicería</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="respuestaCheck2" name="habilidades[]" value="combate" class="form-check-input">
                                    <label class="form-check-label" for="respuestaCheck2">Pelea y combate físico</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="respuestaCheck3" name="habilidades[]" value="sigilo" class="form-check-input">
                                    <label class="form-check-label" for="respuestaCheck3">Sigilo y destreza</label>
                                </div>
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