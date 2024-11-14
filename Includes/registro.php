<?php
// Conectar a la base de datos
include 'conexion.php'; // Asegúrate de que el archivo contiene los detalles de conexión a la BD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $password = $_POST['password'];

    // Encriptar la contraseña antes de guardarla en la base de datos
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar el nuevo usuario con el rol de cliente
    $sql = "INSERT INTO usuarios (email, telefono, direccion, password, rol) VALUES (?, ?, ?, ?, 'cliente')";

    // Preparar y ejecutar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $email, $telefono, $direccion, $hashed_password);
        if ($stmt->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

