CREATE DATABASE registro;
USE registro;

CREATE TABLE datos(
	id_persona INT(6) AUTO_INCREMENT, 
	Identificacion VARCHAR(10), 
	Nombre VARCHAR(8), 
	Apellido VARCHAR(8), 
	Direccion VARCHAR(8), 
	FechaNac DATE, 
	Foto LONGBLOB, 
	PRIMARY KEY (id_persona)
);
