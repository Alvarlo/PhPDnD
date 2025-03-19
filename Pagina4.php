<?php
session_start();
//recoge el array de stats de la sesion y lo asigna a una variable $stats
if (isset($_SESSION['stats'])) {
    $stats = $_SESSION['stats'];
}
//creamos array clave-valor de habilidades y su descripción
$habilidades = [
    "Acrobacias" => "Acrobacias mide la capacidad de realizar saltos, volteretas y otras maniobras físicas.",
    "Atletismo" => "Atletismo mide la fuerza y la resistencia física para correr, nadar y escalar.",
    "Conocimiento Arcano" => "Conocimiento Arcano mide el saber sobre magia y lo arcano.",
    "Conocimiento de la Naturaleza" => "Conocimiento de la Naturaleza mide el saber sobre el mundo natural, incluyendo plantas y animales.",
    "Conocimiento de la Historia" => "Conocimiento de la Historia mide el saber sobre eventos pasados, civilizaciones y culturas.",
    "Conocimiento de los Planos" => "Conocimiento de los Planos mide el entendimiento sobre los planos extraplanares.",
    "Percepción" => "Percepción mide la capacidad de notar detalles en el entorno, como objetos ocultos o cambios sutiles.",
    "Persuasión" => "Persuasión mide la capacidad de influir en los demás con argumentos o encanto.",
    "Sigilo" => "Sigilo mide la capacidad de moverse sin ser detectado.",
    "Supervivencia" => "Supervivencia mide la capacidad de subsistir en la naturaleza, cazar y rastrear.",
    "Engaño" => "Engaño mide la habilidad de mentir y manipular a los demás.",
    "Intimidación" => "Intimidación mide la capacidad de influir en los demás mediante amenazas o fuerza.",
    "Medicina" => "Medicina mide la habilidad para tratar heridas y enfermedades.",
    "Trampa" => "Trampa mide la habilidad para desactivar y colocar trampas.",
    "Artesanía" => "Artesanía mide la habilidad para crear objetos y herramientas.",
    "Religión" => "Religión mide el conocimiento de las deidades y los rituales religiosos.",
    "Misticismo" => "Misticismo mide el conocimiento de lo sobrenatural y lo oculto.",
    "Magia" => "Magia mide el conocimiento y manejo de las artes mágicas.",
    "Historia Natural" => "Historia Natural mide el conocimiento de las criaturas y ecosistemas.",
    "Disfraz" => "Disfraz mide la habilidad para ocultar la identidad y asumir otra.",
    "Navegación" => "Navegación mide la capacidad de orientarse y guiarse por mapas.",
    "Cuidado Animal" => "Cuidado Animal mide la habilidad para entrenar y cuidar animales."
];
// Validar el número de habilidades seleccionadas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['habilidades']) && count($_POST['habilidades']) >= 4 && count($_POST['habilidades']) <= 8) {
        $_SESSION['habilidades_elegidas'] = [];
        foreach ($_POST['habilidades'] as $habilidad) {
            $_SESSION['habilidades_elegidas'][$habilidad] = rand(2, 5);
        }
        //redirige al usuario a la pagina resultado.php
        header("Location: resultado.php");
        exit();
        
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina4</title>
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
                        <h3 class="card-title text-center mb-4">Selecciona tus Habilidades</h3>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <?php foreach ($habilidades as $habilidad => $descripcion): ?>
                                    <div class="form-check">
                                        <input type="checkbox" name="habilidades[]" value="<?php echo $habilidad; ?>" id="<?php echo $habilidad; ?>" class="form-check-input">
                                        <label for="<?php echo $habilidad; ?>" class="form-check-label">
                                            <strong><?php echo $habilidad; ?>:</strong> <?php echo $descripcion; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3">Enviar Selección</button>
                            </div>
                        </form>
                        
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['habilidades']) || count($_POST['habilidades']) < 4 || count($_POST['habilidades']) > 8)): ?>
                            <div class="alert alert-warning mt-3 text-center" role="alert">
                                Debes seleccionar entre 4 y 8 habilidades.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>