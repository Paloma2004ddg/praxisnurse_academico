<?php
$host = "localhost";
$port = "5432";
$dbname = "db_praxisnurse_academico"; // Sin punto y coma al final
$user = "postgres";         // Tu usuario de PostgreSQL
$password = "1234";              // Tu contraseña de pgAdmin

try {
    // Conexión utilizando PDO para PostgreSQL
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    
    // Configurar el modo de error de PDO para excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    // Uso correcto de -> para acceder al método getMessage()
    echo "Error de conexión: " . $e->getMessage();
}
?>