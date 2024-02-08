-- Campos nombre, apellidoPaterno, apellidoMaterno, usuario, correo, numeroEmpleado

CREATE DATABASE IF NOT EXISTS prueba;

USE prueba;

CREATE TABLE IF NOT EXISTS usuarios(
    numeroEmpleado INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellidoPaterno VARCHAR(100) NOT NULL,
    apellidoMaterno VARCHAR(100) NOT NULL,
    usuario VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY(numeroEmpleado)
);

INSERT INTO usuarios(nombre, apellidoPaterno, apellidoMaterno, usuario, correo) VALUES
("Ivan", "Delgado", "Garcia", "ivdelgadoga", "ivdelgadoga@izzi.mx"),
("Jorge ", "López ", "Muñoz ", "jolopezmz", "jolopezmz@izzi.mx"),
("Verónica", "Flores", "Hernández", "vefloreshz", "vefloreshz@izzi.mx"),
("Enrique", "Rivera", "Juárez", "enriverajz", "enriverajz@izzi.mx"),
("Regina", "Guzmán", "Beltrán", "reguzmanbn", "reguzmanbnmx"),
("Luis Daniel", "Reyes", "Martínez", "ldreyesma", "ldreyesma@izzi.mx"),
("Rebecaa", "Domínguez0", "Méndez", "redominguezmn", "redominguezmz@izzi.mx")
;

SELECT * FROM usuarios;

UPDATE usuarios SET nombre="Laura", apellidoPaterno="Domínguez", apellidoMaterno="Méndez", usuario="redominguezmz" WHERE numeroEmpleado = 7;

DELETE from usuarios WHERE numeroEmpleado == 6;