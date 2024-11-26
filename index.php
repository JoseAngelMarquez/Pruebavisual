<?php
session_start();

// Clase Guerrero
class Guerrero {
    public $nombre;
    public $nivelPoder;
    public $tecnicaEspecial;

    public function __construct($nombre, $nivelPoder, $tecnicaEspecial) {
        $this->nombre = $nombre;
        $this->nivelPoder = $nivelPoder;
        $this->tecnicaEspecial = $tecnicaEspecial;
    }
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $nivelPoder = $_POST['nivelPoder'];
    $tecnicaEspecial = $_POST['tecnicaEspecial'];

    $guerrero = new Guerrero($nombre, $nivelPoder, $tecnicaEspecial);
    $_SESSION['guerrero'] = $guerrero;

    header("Location: mostrar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Guerrero</title>
</head>
<body>
    <h1>¡Crea tu Guerrero Z!</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="nivelPoder">Nivel de Poder:</label>
        <input type="number" name="nivelPoder" id="nivelPoder" required><br>

        <label for="tecnicaEspecial">Técnica Especial:</label>
        <input type="text" name="tecnicaEspecial" id="tecnicaEspecial" required><br>

        <button type="submit">Guardar Guerrero</button>
    </form>
</body>
</html>
