CREATE DATABASE proyectos_colaborativos;

USE proyectos_colaborativos;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  descripcion TEXT,
  id_user INT,
  FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_archivo VARCHAR(255),
  tipo_archivo ENUM('pdf', 'img'),
  ruta VARCHAR(255),
  id_project INT,
  FOREIGN KEY (id_project) REFERENCES projects(id)
);
