<?php
session_start();
$conex = mysqli_connect("127.0.0.1", "root", "asdf", "examenphp");
if (!$conex) {
    echo "<p>Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuracion; " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuracion; " . mysqli_connect_error() . PHP_EOL;
    echo "<p/>";
    exit;
}
//echo "<p>Conexion establecida a BD</p>" . PHP_EOL;
//echo "<p>informacion de host: " . mysqli_get_host_info($conex) . PHP_EOL . "</p>";
//mysqli_close($conex);
?>
