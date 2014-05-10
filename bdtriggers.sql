/*
Created		08/05/2014
Modified		10/05/2014
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


drop table IF EXISTS Agenda;
drop table IF EXISTS Retirada_Objetos_Vehiculos;
drop table IF EXISTS Estados_Avisos;
drop table IF EXISTS Fotos_Avisos;
drop table IF EXISTS Fotos;
drop table IF EXISTS Concepto_Facturas;
drop table IF EXISTS Avisos_incidencias;
drop table IF EXISTS Niveles_Usuario;
drop table IF EXISTS Usuario;
drop table IF EXISTS Niveles_Reclamaciones;
drop table IF EXISTS Categorias_Productos;
drop table IF EXISTS Proveedores;
drop table IF EXISTS Historial_Vacaciones;
drop table IF EXISTS Vacaciones;
drop table IF EXISTS Historial_ITV;
drop table IF EXISTS Detalle_Pedido;
drop table IF EXISTS Avisos_Operarios;
drop table IF EXISTS Clientes;
drop table IF EXISTS Productos;
drop table IF EXISTS Incidencias;
drop table IF EXISTS Concepto_Factura;
drop table IF EXISTS Operarios;
drop table IF EXISTS Pedidos;
drop table IF EXISTS ITV;
drop table IF EXISTS Flota_Vehiculos;
drop table IF EXISTS Facturas;
drop table IF EXISTS Avisos;


Create table Avisos (
	Id_Aviso Int NOT NULL AUTO_INCREMENT,
	Id_Pedido Int,
	Id_Factura Int NOT NULL,
	Nota Varchar(500),
	Quedada_dia Timestamp NOT NULL,
	Hora Time NOT NULL,
	Tipo_Trabajo Varchar(100),
	Citado_Por Varchar(200),
	Fecha_Entrada Timestamp NOT NULL,
	Fecha_Visitado Timestamp,
	Coord_Longitud Varchar(500),
	Coord_Latitud Varchar(500),
	Id_Estado_Aviso Int NOT NULL,
	Index AI_Id_Aviso (Id_Aviso),
 Primary Key (Id_Aviso)) ENGINE = InnoDB;

Create table Facturas (
	Id_Factura Int NOT NULL AUTO_INCREMENT,
	Id_Nivel_Reclamacion Int NOT NULL,
	Id_Cliente Int NOT NULL,
	Fecha Timestamp NOT NULL,
	Procedencia Varchar(100) NOT NULL,
	Poliza Varchar(100) NOT NULL,
	Estado Varchar(100) NOT NULL,
	Tipo_Trabajo Varchar(100) NOT NULL,
	Requiere_Profesional Varchar(100) NOT NULL,
	Importe Decimal(10,2) NOT NULL,
	Aceptacion Bool NOT NULL,
	Cobrado Bool NOT NULL,
	NFac_Provisional Varchar(100) NOT NULL,
	Hora Time NOT NULL,
	Index AI_Id_Factura (Id_Factura),
 Primary Key (Id_Factura)) ENGINE = InnoDB;

Create table Flota_Vehiculos (
	Id_Vehiculo Int NOT NULL AUTO_INCREMENT,
	Id_Operario Int,
	Matricula Varchar(15) NOT NULL,
	Marca Varchar(100) NOT NULL,
	Modelo Varchar(100) NOT NULL,
	UNIQUE (Matricula),
	Index AI_Id_Vehiculo (Id_Vehiculo),
 Primary Key (Id_Vehiculo)) ENGINE = InnoDB;

Create table ITV (
	Id_ITV Int NOT NULL AUTO_INCREMENT,
	Estado Varchar(100) NOT NULL,
	Fecha_Pasar_ITV Varchar(100) NOT NULL,
	Index AI_Id_ITV (Id_ITV),
 Primary Key (Id_ITV)) ENGINE = InnoDB;

Create table Pedidos (
	Id_Pedido Int NOT NULL AUTO_INCREMENT,
	Fecha Date NOT NULL,
	Seguimiento Varchar(100) NOT NULL,
	Hora_Llamada Time NOT NULL,
	Cantidad Int NOT NULL,
	Index AI_Id_Pedido (Id_Pedido),
 Primary Key (Id_Pedido)) ENGINE = InnoDB;

Create table Operarios (
	Id_Operario Int NOT NULL AUTO_INCREMENT,
	Id_Usuario Int NOT NULL,
	Nombre Varchar(100) NOT NULL,
	Apellido Varchar(100) NOT NULL,
	Apellido2 Varchar(100),
	Telefono Varchar(100) NOT NULL,
	Telefono2 Varchar(100),
	Direccion Varchar(100) NOT NULL,
	DNI Varchar(9) NOT NULL,
	Seg_Social Varchar(100),
	Observacion Varchar(100),
	Foto Varchar(500),
	Fecha_Alta Date NOT NULL,
	UNIQUE (DNI),
	Index AI_Id_Operario (Id_Operario),
 Primary Key (Id_Operario)) ENGINE = InnoDB;

Create table Concepto_Factura (
	Id_Concepto Int NOT NULL AUTO_INCREMENT,
	Concepto Varchar(100) NOT NULL,
	Coste Varchar(100) NOT NULL,
	Cantidad Varchar(100) NOT NULL,
	N_Orden Varchar(100) NOT NULL,
	Index AI_Id_Concepto (Id_Concepto),
 Primary Key (Id_Concepto)) ENGINE = InnoDB;

Create table Incidencias (
	Id_Incidencia Int NOT NULL AUTO_INCREMENT,
	Fecha Date NOT NULL,
	Seguimiento Varchar(100) NOT NULL,
	Index AI_Id_Incidencia (Id_Incidencia),
 Primary Key (Id_Incidencia)) ENGINE = InnoDB;

Create table Productos (
	Id_Producto Int NOT NULL AUTO_INCREMENT,
	Id_Categoria Int NOT NULL,
	Id_Proveedor Int NOT NULL,
	Nombre Varchar(100) NOT NULL,
	Cantidad_Unidad Int NOT NULL,
	Detalle Varchar(100) NOT NULL,
	Precio_Unidad Decimal(10,2) NOT NULL,
	Unidades_Existentes Int NOT NULL,
	Precio_ESP Decimal(10,2) NOT NULL,
	Precio_COM Decimal(10,2) NOT NULL,
	Fabricante Varchar(100) NOT NULL,
	CERC_CARP Varchar(100) NOT NULL,
	Index AI_Id_Producto (Id_Producto),
 Primary Key (Id_Producto)) ENGINE = InnoDB;

Create table Clientes (
	Id_Cliente Int NOT NULL AUTO_INCREMENT,
	Nombre Varchar(100) NOT NULL,
	Apellido2 Varchar(100),
	Apellido1 Varchar(100) NOT NULL,
	Direccion Varchar(100) NOT NULL,
	Cod_Postal Varchar(10) NOT NULL,
	Localidad Varchar(100) NOT NULL,
	Provincia Varchar(100) NOT NULL,
	Telefono1 Varchar(20) NOT NULL,
	Telefono2 Varchar(100),
	NIF Varchar(50) NOT NULL,
	Observaciones Varchar(100) NOT NULL,
	Email Varchar(100) NOT NULL,
	Moroso Bool NOT NULL,
	UNIQUE (NIF),
	Index AI_Id_Cliente (Id_Cliente),
 Primary Key (Id_Cliente)) ENGINE = InnoDB;

Create table Avisos_Operarios (
	Id_Aviso Int NOT NULL,
	Id_Operario Int NOT NULL,
 Primary Key (Id_Aviso,Id_Operario)) ENGINE = InnoDB;

Create table Detalle_Pedido (
	Id_Pedido Int NOT NULL,
	Id_Producto Int NOT NULL,
	Total Decimal(10,2) NOT NULL,
	Unidades Int NOT NULL,
	Descuento Int NOT NULL,
 Primary Key (Id_Pedido,Id_Producto)) ENGINE = InnoDB;

Create table Historial_ITV (
	Id_Vehiculo Int NOT NULL,
	Id_ITV Int NOT NULL,
 Primary Key (Id_Vehiculo,Id_ITV)) ENGINE = InnoDB;

Create table Vacaciones (
	Id_Vacaciones Int NOT NULL AUTO_INCREMENT,
	Id_Operario Int NOT NULL,
	Cantidad_Vacaciones Int NOT NULL,
	Index AI_Id_Vacaciones (Id_Vacaciones),
 Primary Key (Id_Vacaciones)) ENGINE = InnoDB;

Create table Historial_Vacaciones (
	Id_HIstorial_Vacaciones Int NOT NULL AUTO_INCREMENT,
	Id_Vacaciones Int NOT NULL,
	Fecha_Ini Date NOT NULL,
	Fecha_Fin Date NOT NULL,
	Dias Int NOT NULL,
	Index AI_Id_HIstorial_Vacaciones (Id_HIstorial_Vacaciones),
 Primary Key (Id_HIstorial_Vacaciones)) ENGINE = InnoDB;

Create table Proveedores (
	Id_Proveedor Int NOT NULL AUTO_INCREMENT,
	Nombre Varchar(100) NOT NULL,
	Apellido1 Varchar(100),
	Apellido2 Varchar(100),
	Nombre_Empresa Varchar(100),
	Telefono1 Varchar(15) NOT NULL,
	Telefono2 Varchar(15),
	NIF Varchar(15) NOT NULL,
	Direccion Varchar(100) NOT NULL,
	Cod_Postal Varchar(100) NOT NULL,
	Localidad Varchar(100) NOT NULL,
	Provincia Varchar(100) NOT NULL,
	Referencia Varchar(100) NOT NULL,
	Observaciones Varchar(500),
	Index AI_Id_Proveedor (Id_Proveedor),
 Primary Key (Id_Proveedor)) ENGINE = InnoDB;

Create table Categorias_Productos (
	Id_Categoria Int NOT NULL AUTO_INCREMENT,
	Nombre_Categoria Varchar(100) NOT NULL,
	Descripcion_Categoria Varchar(500),
	Index AI_Id_Categoria (Id_Categoria),
 Primary Key (Id_Categoria)) ENGINE = InnoDB;

Create table Niveles_Reclamaciones (
	Id_Nivel_Reclamacion Int NOT NULL AUTO_INCREMENT,
	Nombre_Nivel_Reclamacion Varchar(100) NOT NULL,
	Descripcion_Nivel_Reclamacion Varchar(500),
	Index AI_Id_Nivel_Reclamacion (Id_Nivel_Reclamacion),
 Primary Key (Id_Nivel_Reclamacion)) ENGINE = InnoDB;

Create table Usuario (
	Id_Usuario Int NOT NULL AUTO_INCREMENT,
	Id_Nivel_Usuario Int NOT NULL,
	Nick Varchar(100) NOT NULL,
	Password Varchar(100) NOT NULL,
	Index AI_Id_Usuario (Id_Usuario),
 Primary Key (Id_Usuario)) ENGINE = InnoDB;

Create table Niveles_Usuario (
	Id_Nivel_Usuario Int NOT NULL AUTO_INCREMENT,
	Nombre_Nivel Varchar(100) NOT NULL,
	Descripcion_Nivel Varchar(100) NOT NULL,
	Index AI_Id_Nivel_Usuario (Id_Nivel_Usuario),
 Primary Key (Id_Nivel_Usuario)) ENGINE = InnoDB;

Create table Avisos_incidencias (
	Id_Incidencia Int NOT NULL,
	Id_Aviso Int NOT NULL,
 Primary Key (Id_Incidencia,Id_Aviso)) ENGINE = InnoDB;

Create table Concepto_Facturas (
	Id_Concepto Int NOT NULL,
	Id_Factura Int NOT NULL,
 Primary Key (Id_Concepto,Id_Factura)) ENGINE = InnoDB;

Create table Fotos (
	Id_Foto Int NOT NULL AUTO_INCREMENT,
	Ruta_Foto Varchar(100),
	Index AI_Id_Foto (Id_Foto),
 Primary Key (Id_Foto)) ENGINE = InnoDB;

Create table Fotos_Avisos (
	Id_Aviso Int NOT NULL,
	Id_Foto Int NOT NULL,
 Primary Key (Id_Aviso,Id_Foto)) ENGINE = InnoDB;

Create table Estados_Avisos (
	Id_Estado_Aviso Int NOT NULL AUTO_INCREMENT,
	Nombre_Estado Varchar(100) NOT NULL,
	Index AI_Id_Estado_Aviso (Id_Estado_Aviso),
	Index AI_Nombre_Estado (Nombre_Estado),
 Primary Key (Id_Estado_Aviso)) ENGINE = InnoDB;

Create table Retirada_Objetos_Vehiculos (
	Id_Retirada Int NOT NULL AUTO_INCREMENT,
	Id_Operario Int NOT NULL,
	Id_Vehiculo Int,
	Objeto_Retirado Varchar(1000),
	Fecha_Inicio Timestamp NOT NULL,
	Fecha_Final Timestamp,
	Index AI_Id_Retirada (Id_Retirada),
 Primary Key (Id_Retirada)) ENGINE = InnoDB;

Create table Agenda (
	Id_Agenda Char(20) NOT NULL,
	Nombre Varchar(100) NOT NULL,
	Apellido1 Varchar(100) NOT NULL,
	Apellido2 Varchar(100),
	Telefono1 Varchar(100) NOT NULL,
	Telefono2 Varchar(100),
	Direccion Varchar(200),
	Localidad Varchar(100),
	Provincia Varchar(100),
	Observaciones Varchar(500),
 Primary Key (Id_Agenda)) ENGINE = InnoDB;


Alter table Avisos_Operarios add Foreign Key (Id_Aviso) references Avisos (Id_Aviso) on delete  restrict on update  restrict;
Alter table Avisos_incidencias add Foreign Key (Id_Aviso) references Avisos (Id_Aviso) on delete  restrict on update  restrict;
Alter table Fotos_Avisos add Foreign Key (Id_Aviso) references Avisos (Id_Aviso) on delete  restrict on update  restrict;
Alter table Avisos add Foreign Key (Id_Factura) references Facturas (Id_Factura) on delete  restrict on update  restrict;
Alter table Concepto_Facturas add Foreign Key (Id_Factura) references Facturas (Id_Factura) on delete  restrict on update  restrict;
Alter table Historial_ITV add Foreign Key (Id_Vehiculo) references Flota_Vehiculos (Id_Vehiculo) on delete  restrict on update  restrict;
Alter table Retirada_Objetos_Vehiculos add Foreign Key (Id_Vehiculo) references Flota_Vehiculos (Id_Vehiculo) on delete  restrict on update  restrict;
Alter table Historial_ITV add Foreign Key (Id_ITV) references ITV (Id_ITV) on delete  restrict on update  restrict;
Alter table Detalle_Pedido add Foreign Key (Id_Pedido) references Pedidos (Id_Pedido) on delete  restrict on update  restrict;
Alter table Avisos add Foreign Key (Id_Pedido) references Pedidos (Id_Pedido) on delete  restrict on update  restrict;
Alter table Avisos_Operarios add Foreign Key (Id_Operario) references Operarios (Id_Operario) on delete  restrict on update  restrict;
Alter table Flota_Vehiculos add Foreign Key (Id_Operario) references Operarios (Id_Operario) on delete  restrict on update  restrict;
Alter table Vacaciones add Foreign Key (Id_Operario) references Operarios (Id_Operario) on delete  restrict on update  restrict;
Alter table Retirada_Objetos_Vehiculos add Foreign Key (Id_Operario) references Operarios (Id_Operario) on delete  restrict on update  restrict;
Alter table Concepto_Facturas add Foreign Key (Id_Concepto) references Concepto_Factura (Id_Concepto) on delete  restrict on update  restrict;
Alter table Avisos_incidencias add Foreign Key (Id_Incidencia) references Incidencias (Id_Incidencia) on delete  restrict on update  restrict;
Alter table Detalle_Pedido add Foreign Key (Id_Producto) references Productos (Id_Producto) on delete  restrict on update  restrict;
Alter table Facturas add Foreign Key (Id_Cliente) references Clientes (Id_Cliente) on delete  restrict on update  restrict;
Alter table Historial_Vacaciones add Foreign Key (Id_Vacaciones) references Vacaciones (Id_Vacaciones) on delete  restrict on update  restrict;
Alter table Productos add Foreign Key (Id_Proveedor) references Proveedores (Id_Proveedor) on delete  restrict on update  restrict;
Alter table Productos add Foreign Key (Id_Categoria) references Categorias_Productos (Id_Categoria) on delete  restrict on update  restrict;
Alter table Facturas add Foreign Key (Id_Nivel_Reclamacion) references Niveles_Reclamaciones (Id_Nivel_Reclamacion) on delete  restrict on update  restrict;
Alter table Operarios add Foreign Key (Id_Usuario) references Usuario (Id_Usuario) on delete  restrict on update  restrict;
Alter table Usuario add Foreign Key (Id_Nivel_Usuario) references Niveles_Usuario (Id_Nivel_Usuario) on delete  restrict on update  restrict;
Alter table Fotos_Avisos add Foreign Key (Id_Foto) references Fotos (Id_Foto) on delete  restrict on update  restrict;
Alter table Avisos add Foreign Key (Id_Estado_Aviso) references Estados_Avisos (Id_Estado_Aviso) on delete  restrict on update  restrict;


/* Users permissions */


