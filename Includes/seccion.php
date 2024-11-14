<?php
session_start();

// Verificar si el usuario ha iniciado sesión y si tiene el rol de administrador
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    // Redirigir al login si no tiene acceso
    header('Location: login.php');
    exit;
}
?>