--- GUIDO TAJÁN 2018 ---

DROP DATABASE IF EXISTS facturacion;

CREATE DATABASE facturacion CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE facturacion;

CREATE TABLE clientes (
	id INT NOT NULL AUTO_INCREMENT,
	nombre_apellido VARCHAR(64) NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	dni VARCHAR(16) NOT NULL,
	domicilio VARCHAR(64) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(64) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	permiso INT DEFAULT 0,
	PRIMARY KEY (id)
);

CREATE TABLE facturas (
	id INT NOT NULL AUTO_INCREMENT,
	fecha DATE NOT NULL,
	tipo_factura VARCHAR(8) DEFAULT 'B',
	cliente_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(cliente_id) REFERENCES clientes(id)
);

CREATE TABLE productos (
	id INT NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR (64) NOT NULL,
	precio DECIMAL(8,2) NOT NULL,
	stock INT DEFAULT 0,
	estado INT DEFAULT 1,
	fecha_alta DATE NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE detalles (
	id INT NOT NULL AUTO_INCREMENT,
	cantidad INT NOT NULL,
	subtotal DECIMAL(8,2) NOT NULL,
	producto_id INT NOT NULL,
	factura_id INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (producto_id) REFERENCES productos(id),
	FOREIGN KEY (factura_id) REFERENCES facturas(id)
);

CREATE TABLE rubros (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(32),
	PRIMARY KEY(id)
);

ALTER TABLE productos
ADD COLUMN rubro_id INT NOT NULL;
