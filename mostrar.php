<?php
session_start();

// Asegúrate de incluir la definición de la clase Guerrero
// Puedes usar require si la clase está en un archivo separado, como "Guerrero.php".
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

// Verificar si la sesión contiene un guerrero
if (!isset($_SESSION['guerrero'])) {
    echo "No hay un guerrero almacenado en la sesión.";
    exit;
}

$guerrero = $_SESSION['guerrero'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guerrero Guardado</title>
</head>
<body>
    <h1>Estadísticas del Guerrero</h1>
    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($guerrero->nombre); ?></p>
    <p><strong>Nivel de Poder:</strong> <?php echo htmlspecialchars($guerrero->nivelPoder); ?></p>
    <p><strong>Técnica Especial:</strong> <?php echo htmlspecialchars($guerrero->tecnicaEspecial); ?></p>

    <a href="index.php">Volver</a>
</body>
</html>
