-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2014 a las 20:05:04
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_rptriggers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `Id_Agenda` char(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido1` varchar(100) NOT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `Telefono1` varchar(100) NOT NULL,
  `Telefono2` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Localidad` varchar(100) DEFAULT NULL,
  `Provincia` varchar(100) DEFAULT NULL,
  `Observaciones` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_Agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `Id_Aviso` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Pedido` int(11) DEFAULT NULL,
  `Id_Factura` int(11) NOT NULL,
  `Nota` varchar(500) DEFAULT NULL,
  `Quedada_dia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Hora` time NOT NULL,
  `Tipo_Trabajo` varchar(100) DEFAULT NULL,
  `Citado_Por` varchar(200) DEFAULT NULL,
  `Fecha_Entrada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Fecha_Visitado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Coord_Longitud` varchar(500) DEFAULT NULL,
  `Coord_Latitud` varchar(500) DEFAULT NULL,
  `Id_Estado_Aviso` int(11) NOT NULL,
  `Ultima_Modificacion_Por` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Aviso`),
  KEY `Id_Factura` (`Id_Factura`),
  KEY `Id_Pedido` (`Id_Pedido`),
  KEY `Id_Estado_Aviso` (`Id_Estado_Aviso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_incidencias`
--

CREATE TABLE IF NOT EXISTS `avisos_incidencias` (
  `Id_Incidencia` int(11) NOT NULL,
  `Id_Aviso` int(11) NOT NULL,
  PRIMARY KEY (`Id_Incidencia`,`Id_Aviso`),
  KEY `Id_Aviso` (`Id_Aviso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos_operarios`
--

CREATE TABLE IF NOT EXISTS `avisos_operarios` (
  `Id_Aviso` int(11) NOT NULL,
  `Id_Operario` int(11) NOT NULL,
  PRIMARY KEY (`Id_Aviso`,`Id_Operario`),
  KEY `Id_Operario` (`Id_Operario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE IF NOT EXISTS `categorias_productos` (
  `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Categoria` varchar(100) NOT NULL,
  `Descripcion_Categoria` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido1` varchar(100) NOT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Cod_Postal` varchar(10) NOT NULL,
  `Localidad` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Telefono1` varchar(20) NOT NULL,
  `Telefono2` varchar(100) DEFAULT NULL,
  `NIF` varchar(50) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Moroso` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Cliente`),
  UNIQUE KEY `NIF` (`NIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_factura`
--

CREATE TABLE IF NOT EXISTS `concepto_factura` (
  `Id_Concepto` int(11) NOT NULL AUTO_INCREMENT,
  `Concepto` varchar(100) NOT NULL,
  `Coste` varchar(100) NOT NULL,
  `Cantidad` varchar(100) NOT NULL,
  `N_Orden` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Concepto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_facturas`
--

CREATE TABLE IF NOT EXISTS `concepto_facturas` (
  `Id_Concepto` int(11) NOT NULL,
  `Id_Factura` int(11) NOT NULL,
  PRIMARY KEY (`Id_Concepto`,`Id_Factura`),
  KEY `Id_Factura` (`Id_Factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `Descuento` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pedido`,`Id_Producto`),
  KEY `Id_Producto` (`Id_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_avisos`
--

CREATE TABLE IF NOT EXISTS `estados_avisos` (
  `Id_Estado_Aviso` int(11) NOT NULL,
  `Nombre_Estado` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Estado_Aviso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `Id_Factura` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Nivel_Reclamacion` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Procedencia` varchar(100) NOT NULL,
  `Poliza` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Tipo_Trabajo` varchar(100) NOT NULL,
  `Requiere_Profesional` varchar(100) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  `Aceptacion` tinyint(1) NOT NULL,
  `Cobrado` tinyint(1) NOT NULL,
  `NFac_Provisional` varchar(100) NOT NULL,
  `Hora` time NOT NULL,
  PRIMARY KEY (`Id_Factura`),
  KEY `Id_Cliente` (`Id_Cliente`),
  KEY `Id_Nivel_Reclamacion` (`Id_Nivel_Reclamacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota_vehiculos`
--

CREATE TABLE IF NOT EXISTS `flota_vehiculos` (
  `Id_Vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Operario` int(11) DEFAULT NULL,
  `Matricula` varchar(15) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Vehiculo`),
  UNIQUE KEY `Matricula` (`Matricula`),
  KEY `Id_Operario` (`Id_Operario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `Id_Foto` int(11) NOT NULL AUTO_INCREMENT,
  `Ruta_Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_Foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_avisos`
--

CREATE TABLE IF NOT EXISTS `fotos_avisos` (
  `Id_Aviso` int(11) NOT NULL,
  `Id_Foto` int(11) NOT NULL,
  PRIMARY KEY (`Id_Aviso`,`Id_Foto`),
  KEY `Id_Foto` (`Id_Foto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_itv`
--

CREATE TABLE IF NOT EXISTS `historial_itv` (
  `Id_Vehiculo` int(11) NOT NULL,
  `Id_ITV` int(11) NOT NULL,
  PRIMARY KEY (`Id_Vehiculo`,`Id_ITV`),
  KEY `Id_ITV` (`Id_ITV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_vacaciones`
--

CREATE TABLE IF NOT EXISTS `historial_vacaciones` (
  `Id_HIstorial_Vacaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Vacaciones` int(11) NOT NULL,
  `Fecha_Ini` date NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `Dias` int(11) NOT NULL,
  PRIMARY KEY (`Id_HIstorial_Vacaciones`),
  KEY `Id_Vacaciones` (`Id_Vacaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `Id_Incidencia` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Seguimiento` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Incidencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itv`
--

CREATE TABLE IF NOT EXISTS `itv` (
  `Id_ITV` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(100) NOT NULL,
  `Fecha_Pasar_ITV` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_ITV`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_reclamaciones`
--

CREATE TABLE IF NOT EXISTS `niveles_reclamaciones` (
  `Id_Nivel_Reclamacion` int(11) NOT NULL,
  `Nombre_Nivel_Reclamacion` varchar(100) NOT NULL,
  `Descripcion_Nivel_Reclamacion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_Nivel_Reclamacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_usuario`
--

CREATE TABLE IF NOT EXISTS `niveles_usuario` (
  `Id_Nivel_Usuario` int(11) NOT NULL,
  `Nombre_Nivel` varchar(100) NOT NULL,
  `Descripcion_Nivel` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Nivel_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE IF NOT EXISTS `operarios` (
  `Id_Operario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Telefono2` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Seg_Social` varchar(100) DEFAULT NULL,
  `Observacion` varchar(100) DEFAULT NULL,
  `Foto` varchar(500) DEFAULT NULL,
  `Fecha_Alta` date NOT NULL,
  PRIMARY KEY (`Id_Operario`),
  UNIQUE KEY `DNI` (`DNI`),
  KEY `Id_Usuario` (`Id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Seguimiento` varchar(100) NOT NULL,
  `Hora_Llamada` time NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Categoria` int(11) NOT NULL,
  `Id_Proveedor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cantidad_Unidad` int(11) NOT NULL,
  `Detalle` varchar(100) NOT NULL,
  `Precio_Unidad` decimal(10,2) NOT NULL,
  `Unidades_Existentes` int(11) NOT NULL,
  `Precio_ESP` decimal(10,2) NOT NULL,
  `Precio_COM` decimal(10,2) NOT NULL,
  `Fabricante` varchar(100) NOT NULL,
  `CERC_CARP` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Producto`),
  KEY `Id_Proveedor` (`Id_Proveedor`),
  KEY `Id_Categoria` (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `Id_Proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido1` varchar(100) DEFAULT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `Nombre_Empresa` varchar(100) DEFAULT NULL,
  `Telefono1` varchar(15) NOT NULL,
  `Telefono2` varchar(15) DEFAULT NULL,
  `NIF` varchar(15) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Cod_Postal` varchar(100) NOT NULL,
  `Localidad` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Referencia` varchar(100) NOT NULL,
  `Observaciones` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_Proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retirada_objetos_vehiculos`
--

CREATE TABLE IF NOT EXISTS `retirada_objetos_vehiculos` (
  `Id_Retirada` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Operario` int(11) NOT NULL,
  `Id_Vehiculo` int(11) DEFAULT NULL,
  `Objeto_Retirado` varchar(1000) DEFAULT NULL,
  `Fecha_Inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Fecha_Final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id_Retirada`),
  KEY `Id_Vehiculo` (`Id_Vehiculo`),
  KEY `Id_Operario` (`Id_Operario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Nivel_Usuario` int(11) NOT NULL,
  `Nick` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_Nivel_Usuario` (`Id_Nivel_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE IF NOT EXISTS `vacaciones` (
  `Id_Vacaciones` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Operario` int(11) NOT NULL,
  `Cantidad_Vacaciones` int(11) NOT NULL,
  PRIMARY KEY (`Id_Vacaciones`),
  KEY `Id_Operario` (`Id_Operario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `avisos_ibfk_1` FOREIGN KEY (`Id_Factura`) REFERENCES `facturas` (`Id_Factura`),
  ADD CONSTRAINT `avisos_ibfk_2` FOREIGN KEY (`Id_Pedido`) REFERENCES `pedidos` (`Id_Pedido`),
  ADD CONSTRAINT `avisos_ibfk_3` FOREIGN KEY (`Id_Estado_Aviso`) REFERENCES `estados_avisos` (`Id_Estado_Aviso`);

--
-- Filtros para la tabla `avisos_incidencias`
--
ALTER TABLE `avisos_incidencias`
  ADD CONSTRAINT `avisos_incidencias_ibfk_1` FOREIGN KEY (`Id_Aviso`) REFERENCES `avisos` (`Id_Aviso`),
  ADD CONSTRAINT `avisos_incidencias_ibfk_2` FOREIGN KEY (`Id_Incidencia`) REFERENCES `incidencias` (`Id_Incidencia`);

--
-- Filtros para la tabla `avisos_operarios`
--
ALTER TABLE `avisos_operarios`
  ADD CONSTRAINT `avisos_operarios_ibfk_1` FOREIGN KEY (`Id_Aviso`) REFERENCES `avisos` (`Id_Aviso`),
  ADD CONSTRAINT `avisos_operarios_ibfk_2` FOREIGN KEY (`Id_Operario`) REFERENCES `operarios` (`Id_Operario`);

--
-- Filtros para la tabla `concepto_facturas`
--
ALTER TABLE `concepto_facturas`
  ADD CONSTRAINT `concepto_facturas_ibfk_1` FOREIGN KEY (`Id_Factura`) REFERENCES `facturas` (`Id_Factura`),
  ADD CONSTRAINT `concepto_facturas_ibfk_2` FOREIGN KEY (`Id_Concepto`) REFERENCES `concepto_factura` (`Id_Concepto`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`Id_Pedido`) REFERENCES `pedidos` (`Id_Pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `productos` (`Id_Producto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `clientes` (`Id_Cliente`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`Id_Nivel_Reclamacion`) REFERENCES `niveles_reclamaciones` (`Id_Nivel_Reclamacion`);

--
-- Filtros para la tabla `flota_vehiculos`
--
ALTER TABLE `flota_vehiculos`
  ADD CONSTRAINT `flota_vehiculos_ibfk_1` FOREIGN KEY (`Id_Operario`) REFERENCES `operarios` (`Id_Operario`);

--
-- Filtros para la tabla `fotos_avisos`
--
ALTER TABLE `fotos_avisos`
  ADD CONSTRAINT `fotos_avisos_ibfk_1` FOREIGN KEY (`Id_Aviso`) REFERENCES `avisos` (`Id_Aviso`),
  ADD CONSTRAINT `fotos_avisos_ibfk_2` FOREIGN KEY (`Id_Foto`) REFERENCES `fotos` (`Id_Foto`);

--
-- Filtros para la tabla `historial_itv`
--
ALTER TABLE `historial_itv`
  ADD CONSTRAINT `historial_itv_ibfk_1` FOREIGN KEY (`Id_Vehiculo`) REFERENCES `flota_vehiculos` (`Id_Vehiculo`),
  ADD CONSTRAINT `historial_itv_ibfk_2` FOREIGN KEY (`Id_ITV`) REFERENCES `itv` (`Id_ITV`);

--
-- Filtros para la tabla `historial_vacaciones`
--
ALTER TABLE `historial_vacaciones`
  ADD CONSTRAINT `historial_vacaciones_ibfk_1` FOREIGN KEY (`Id_Vacaciones`) REFERENCES `vacaciones` (`Id_Vacaciones`);

--
-- Filtros para la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD CONSTRAINT `operarios_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Id_Proveedor`) REFERENCES `proveedores` (`Id_Proveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`Id_Categoria`) REFERENCES `categorias_productos` (`Id_Categoria`);

--
-- Filtros para la tabla `retirada_objetos_vehiculos`
--
ALTER TABLE `retirada_objetos_vehiculos`
  ADD CONSTRAINT `retirada_objetos_vehiculos_ibfk_1` FOREIGN KEY (`Id_Vehiculo`) REFERENCES `flota_vehiculos` (`Id_Vehiculo`),
  ADD CONSTRAINT `retirada_objetos_vehiculos_ibfk_2` FOREIGN KEY (`Id_Operario`) REFERENCES `operarios` (`Id_Operario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_Nivel_Usuario`) REFERENCES `niveles_usuario` (`Id_Nivel_Usuario`);

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `vacaciones_ibfk_1` FOREIGN KEY (`Id_Operario`) REFERENCES `operarios` (`Id_Operario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
