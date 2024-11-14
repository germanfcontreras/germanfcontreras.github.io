<?php
session_start();

// Configurar la conexión a la base de datos
$host = 'localhost';  // La direccion local
$db = 'indexapi';  // Nombre de la base
$user = 'root';  // Tu usuario de fabrica
$password = '';  // Tu contraseña de fabrica

// Conectar a la base de datos
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar el usuario
    $query = "SELECT * FROM usuarios WHERE usuario = ?";
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);  // 's' es para cadenas (strings)
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Verificar la contraseña
        $row = $result->fetch_assoc();
        
        // En un entorno real, usa password_verify() si las contraseñas están encriptadas
        if ($row['contrasena'] === $password) { 
            // Iniciar sesión exitosamente
            $_SESSION['usuario'] = $username;
            $_SESSION['rol'] = $row['rol']; // Almacena el rol en la sesión
            
            // Redirigir según el rol del usuario
            if ($row['rol'] === 'admin') {
                header("Location: /Includes/rolusuario.php");// Redirige a la página de administrador
            } elseif ($row['rol'] === 'cliente') {
                header("Location: ../home.html"); // Redirige a la página del cliente           
            } elseif ($row['rol'] === 'usuario') {
                header("Location: ../usuario.php"); // Redirige a la página del usuario regular
            } else {
                header("Location: ../home.php"); // Redirige a una página genérica
            }
            
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta.');</script>";
        }
    } else {

        echo "<script>alert('Usuario no encontrado.');</script>";
    }
    
    $stmt->close();
}

$conn->close();

/* Pagina Antigua funcional */
/*
session_start();

// Configurar la conexión a la base de datos
$host = 'localhost';  // La direccion local
$db = 'indexapi';  // Nombre de la base
$user = 'root';  // Tu usuario de fabrica
$password = '';  // Tu contraseña de fabrica

// Conectar a la base de datos
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar el usuario
    $query = "SELECT * FROM usuarios WHERE usuario = ?";
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);  // 's' es para cadenas (strings)
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) 
       {
        // Verificar la contraseña
        $row = $result->fetch_assoc();
        
        // En un entorno real, usa password_verify() si las contraseñas están encriptadas
        if ($row['contrasena'] === $password) 
           { 
            // Iniciar sesión exitosamente
            $_SESSION['usuario'] = $username;
            header("Location: ../home.html");
            // header("Location: /home.php"); // Redirigir a la página de bienvenida          
            exit();
           } 
        else 
           {
            echo "<script>alert('Contraseña incorrecta.');</script>";
           }
       }   
       
    else {
          echo "<script>alert('Usuario no encontrado.');</script>";
         }
    
    $stmt->close();
    
}

$conn->close();
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="/css/PaginaInicio.css"/>
</head>
<body>
    <div class="login-container">
        <span class="lock-icon">&#128274;</span> <!-- Icono de candado -->
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

</body>
</html>
