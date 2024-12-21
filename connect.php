<?php
$host = 'localhost'; 
$db   = 'sakila-prueba-2';      
$user = 'root';       
$pass = '';          

try {
    // Crear la conexión
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener todos los clientes
    $sql = "SELECT first_name, last_name, email FROM customer";
    $stmt = $pdo->query($sql);  // Ejecutar la consulta

    // Mostrar los resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Nombre: {$row['first_name']} {$row['last_name']}, Correo: {$row['email']}<br>";
    }
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>