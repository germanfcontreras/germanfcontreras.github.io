<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Configurar la conexión a la base de datos
$host = 'localhost';  
$db = 'indexapi';  
$user = 'root';  
$password = '';  

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear nuevo usuario (Create)
if (isset($_POST['crear'])) {
    $nuevo_usuario = $_POST['usuario'];
    $nueva_contrasena = $_POST['contrasena'];
    $nuevo_rol = $_POST['rol'];

    $query = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $nuevo_usuario, $nueva_contrasena, $nuevo_rol); // 'sss' para las tres cadenas
    $stmt->execute();
    $stmt->close();
}

// Actualizar usuario (Update)
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $usuario_actualizado = $_POST['usuario'];
    $contrasena_actualizada = $_POST['contrasena'];
    $rol_actualizado = $_POST['rol'];

    $query = "UPDATE usuarios SET usuario = ?, contrasena = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $usuario_actualizado, $contrasena_actualizada, $rol_actualizado, $id);
    $stmt->execute();
    $stmt->close();
}

// Eliminar usuario (Delete)
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id); // 'i' para integer
    $stmt->execute();
    $stmt->close();
}

// Leer todos los usuarios (Read)
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="/css/RolUsuarios.css"/>
  </head>
<body>

<div class="container">
    <h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>

    <!-- Formulario para crear nuevos usuarios -->
    <h2>Crear nuevo usuario</h2>
    <form method="POST" action="">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="text" name="rol" placeholder="Rol" required>
        <button type="submit" name="crear">Crear</button>
    </form>

    <!-- Tabla para mostrar los usuarios -->
    <h2>Lista de usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['usuario']; ?></td>
            <td>
                <!-- Formulario para actualizar usuario -->
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required>
                    <input type="password" name="contrasena" placeholder="Nueva contraseña" required>
                    <input type="text" name="rol" placeholder="Rol" required>
                    <button type="submit" name="actualizar">Actualizar</button>
                </form>

                <!-- Formulario para eliminar usuario -->
                <form method="POST" action="" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="eliminar" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
