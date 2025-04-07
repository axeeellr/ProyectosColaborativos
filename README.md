# Desafío Práctico #2 - Aplicación de Gestión de Proyectos en PHP

Este proyecto permite la autenticación de usuarios y la gestión de proyectos colaborativos, incluyendo la subida y eliminación de archivos adjuntos, utilizando PHP puro y MySQL bajo el patrón MVC.

---

## ⚙️ Requisitos

- PHP >= 7.4
- MySQL
- WampServer, XAMPP o Laragon
- Navegador moderno (Chrome, Firefox, etc.)

---

## 🚀 Instrucciones de instalación

1. **Clona o descarga el proyecto en tu servidor local:**
   - Coloca los archivos en la carpeta `www/` de Wamp o `htdocs/` si usás XAMPP.

2. **Activa `mod_rewrite` en Apache (si no está activado):**
   - Wamp → Clic izquierdo → Apache → Apache Modules → Habilita `rewrite_module`.

3. **Crea la base de datos:**
   - Importá el archivo `database.sql` desde phpMyAdmin o desde la terminal.

4. **Configura la conexión a la base de datos:**
   - Edita el archivo `config/database.php` y pon tus credenciales:
     ```php
     private $host = 'localhost';
     private $db = 'nombre_de_tu_bd';
     private $user = 'root';
     private $pass = '';
     ```

5. **Inicia el servidor y abre en el navegador:**
http://localhost/tu_carpeta/index.php


6. **Usuario por defecto:**
- Crea uno desde el login, no hay usuario precargado por defecto.

---

## 🧠 Descripción de la estructura de clases (Modelo MVC)

### 1. **Modelos (`/models`)**
Contienen la lógica para interactuar con la base de datos.

- **User.php**
- Métodos: `register()`, `login()`, `getById()`
- Tabla: `usuarios`

- **Project.php**
- Métodos: `create()`, `getByUser()`, `getById()`, `update()`, `delete()`
- Tabla: `proyectos`

- **File.php**
- Métodos: `create()`, `getByProject()`, `getById()`, `delete()`
- Tabla: `archivos`

---

### 2. **Controladores (`/controllers`)**
Mediadores entre los modelos y las vistas.

- **AuthController.php**
- Métodos: `login()`, `logout()`, `register()`
- Gestiona sesiones y autenticación.

- **ProjectController.php**
- Métodos: `store()`, `update()`, `delete()`
- Lógica para crear y modificar proyectos.

---

### 3. **Vistas (archivos `.php`)**
Interfaz con la que interactúa el usuario.

---

### 4. **Configuración**
- **`config/database.php`**: Conexión a la base de datos.

---

### 5. **Carpetas adicionales**
- **`uploads/`**: Carpeta donde se guardan los archivos subidos por los usuarios.
- **`.htaccess`**: Controla acceso a directorios y módulos de Apache.

---

## ✅ Funcionalidades

- Registro e inicio de sesión de usuarios.
- Crear, editar y eliminar proyectos.
- Subir y eliminar archivos dentro de cada proyecto.
- Seguridad básica con sesiones y control de acceso.

---


## 🧑 Roles


- **`Ricardo Daniel Guevara Avelar`**: Base de datos y modelos
- **`Axel Enrique Aguilar Ramirez`**: Vistas y controladores


---

## © Créditos

Proyecto desarrollado para la materia **Desarrollo de Aplicaciones Web con Software que Interpreta en el Servidor (DSS404)**.
