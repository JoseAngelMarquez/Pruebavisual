<?php
session_start();

// Tiempo límite en segundos
$tiempoLimite = 60;

if (isset($_SESSION['tiempoInicio'])) {
    $duracion = time() - $_SESSION['tiempoInicio'];
    if ($duracion > $tiempoLimite) {
        session_destroy();
        echo "<h1>¡La sesión ha expirado!</h1>";
        echo "<p>No lograste recolectar las esferas a tiempo.</p>";
        echo '<a href="recolectar.php">Intentar de nuevo</a>';
        exit;
    }
} else {
    $_SESSION['tiempoInicio'] = time();
    $_SESSION['esferasRecolectadas'] = 0; // Inicializar el conteo de esferas
}

// Recolectar esfera
if (isset($_POST['recolectar'])) {
    $_SESSION['esferasRecolectadas']++;
    if ($_SESSION['esferasRecolectadas'] == 7) {
        echo "<h1>¡Felicidades! Has recolectado las 7 esferas del dragón.</h1>";
        session_destroy();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recolectar Esferas</title>
</head>
<body>
    <h1>Recolecta las Esferas del Dragón</h1>
    <p>Esferas recolectadas: <?php echo $_SESSION['esferasRecolectadas'] ?? 0; ?></p>
    <p>Tiempo restante: <?php echo $tiempoLimite - (time() - $_SESSION['tiempoInicio']); ?> segundos</p>

    <form method="POST">
        <button type="submit" name="recolectar">Recolectar Esfera</button>
    </form>
</body>
</html>
