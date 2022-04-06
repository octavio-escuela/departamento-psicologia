CREATE TABLE Registro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(15),
    apellidoPaterno VARCHAR(15),
    apellidoMaterno VARCHAR(15),
    fechaNacimiento date,
    correo VARCHAR(40),
    contrasena VARCHAR(40)
)
