CREATE TABLE Registro (
    id INT PRIMARY KEY,
    nombre VARCHAR(15),
    apellidoPaterno VARCHAR(15),
    apellidoMaterno VARCHAR(15),
    fechaNacimiento date,
    correo VARCHAR(40),
    contrasena VARCHAR(40)
)

ALTER TABLE Registro DROP COLUMN id;

ALTER TABLE Registro ADD COLUMN id INT PRIMARY KEY AUTO_INCREMENT;

INSERT INTO `Registro` (`nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `correo`, `contrasena`, `id`) VALUES ('\"Octavio\"', '\"Salasar\"', '\"Ramirez\"', '1999-11-30', 'octavio.salasar18@tectijuana.edu.mx', 'password', NULL);
// Nota no agregar comillas en phpMyAdmin
