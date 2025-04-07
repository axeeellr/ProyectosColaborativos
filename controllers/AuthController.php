<?php
require_once '../models/User.php';
session_start();

class AuthController {

    // Método para manejar el registro de usuario
    public function register($data) {
        if (isset($data['nombre'], $data['email'], $data['password']) && !empty($data['nombre']) && !empty($data['email']) && !empty($data['password'])) {
            $user = new User();
            if ($user->register($data['nombre'], $data['email'], $data['password'])) {
                header("Location: ../views/login.php"); // Redirige al login después de registrarse
                exit();
            } else {
                echo "Hubo un error al registrar el usuario.";
            }
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }

    // Método para manejar el login
    public function login($data) {
        if (isset($data['email'], $data['password']) && !empty($data['email']) && !empty($data['password'])) {
            $user = new User();
            $result = $user->login($data['email'], $data['password']);
            
            if ($result) {
                $_SESSION['user_id'] = $result; // Guarda los datos del usuario en la sesión
                header("Location: ../views/dashboard.php"); // Redirige al dashboard si el login es exitoso
                exit();
            } else {
                // Si las credenciales no son válidas, redirige al login con un error
                header("Location: ../views/login.php?error=true");
                exit();
            }
        } else {
            // Si faltan campos, redirige al login con un mensaje de error
            header("Location: ../views/login.php?error=true");
            exit();
        }
    }

    // Método para manejar el logout
    
}

// Verificar la acción en la URL y ejecutar el método correspondiente
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $authController = new AuthController();

    // Ejecutar la acción correspondiente (login, register, logout)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($action == 'login') {
            $authController->login($_POST);
        } elseif ($action == 'register') {
            $authController->register($_POST);
        }
    }
} else {
    // Si no hay acción especificada, redirigir al login por defecto
    header("Location: ../views/login.php");
    exit();
}
