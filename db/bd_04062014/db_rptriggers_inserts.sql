INSERT INTO `niveles_reclamaciones` (`Id_Nivel_Reclamacion`, `Nombre_Nivel_Reclamacion`, `Descripcion_Nivel_Reclamacion`) VALUES
(0, 'Normal', 'Nivel de reclamación normal'),
(1, 'Urgente', 'Nivel de reclamación urgente'),
(2, 'Muy Urgente', 'Nivel de reclamación muy urgente');

INSERT INTO `estados_avisos` (`Id_Estado_Aviso`, `Nombre_Estado`) VALUES
(0, 'Sigue'),
(1, 'Terminado');

INSERT INTO `clientes` (`Id_Cliente`, `Nombre`, `Apellido2`, `Apellido1`, `Direccion`, `Cod_Postal`, `Localidad`, `Provincia`, `Telefono1`, `Telefono2`, `NIF`, `Observaciones`, `Email`, `Moroso`) VALUES
(1, 'Francisco', 'Castro', 'Robles', 'Cueva de las Margaritas 18', '28905', 'Getafe', 'Madrid', '639654587', NULL, '98754565S', 'No tenia ninguna cerradura', 'francisco@mail.com', 0);

INSERT INTO `facturas` (`Id_Factura`, `Id_Nivel_Reclamacion`, `Id_Cliente`, `Fecha`, `Procedencia`, `Poliza`, `Estado`, `Tipo_Trabajo`, `Requiere_Profesional`, `Importe`, `Aceptacion`, `Cobrado`, `NFac_Provisional`, `Hora`) VALUES
(1, 1, 1, '2014-06-04 18:04:09', 'AXA', '1874874148741', '1', 'Cerrajeria', 'No', '150.00', 1, 1, '8748741845', '19:43:00'),
(2, 0, 1, '2014-06-04 18:00:08', 'AXA', '684684786', '1', 'Cerrajeria', 'Si', '98.66', 0, 0, '57684684', '01:02:00'),
(3, 0, 1, '2014-06-04 18:00:41', 'AXA', '684684786', '1', 'Cerrajeria', 'Si', '98.66', 0, 0, '57684684', '01:02:00'),
(4, 0, 1, '2014-06-04 18:02:25', 'AXA', '684684786', '1', 'Cerrajeria', 'Si', '98.66', 0, 0, '57684684', '01:02:00'),
(5, 0, 1, '2014-06-04 18:08:35', 'AXA', '684684786', '1', 'Cerrajeria', 'Si', '98.66', 0, 0, '57684684', '01:02:00');

INSERT INTO `avisos` (`Id_Aviso`, `Id_Pedido`, `Id_Factura`, `Nota`, `Quedada_dia`, `Hora`, `Tipo_Trabajo`, `Citado_Por`, `Fecha_Entrada`, `Fecha_Visitado`, `Coord_Longitud`, `Coord_Latitud`, `Id_Estado_Aviso`, `Ultima_Modificacion_Por`) VALUES
(1, NULL, 1, 'Colocar cerrojo nuevo en puerta Kiuso', '2014-05-14 19:37:46', '19:43:00', 'Cerrajeria', 'Paco', '2014-05-14 22:00:00', '2014-05-15 22:00:00', NULL, NULL, 1,'pepe'),
(2, NULL, 1, 'Blablabla blablablabla', '2014-05-15 19:37:46', '14:40:00', 'Cerrajeria', 'Pepe', '2014-05-07 22:00:00', '2014-05-12 22:00:00', NULL, NULL, 0,'pepe'),
(3, NULL, 1, 'asdasd', '2014-06-04 18:02:25', '01:02:00', 'Cerrajeria', 'Paco', '2014-02-03 01:02:00', '2014-10-04 02:04:00', NULL, NULL, 1, 'pepe'),
(4, NULL, 1, 'asdasd', '2014-06-04 18:08:35', '01:02:00', 'Cerrajeria', 'Paco', '2014-02-03 01:02:00', '2014-10-04 02:04:00', NULL, NULL, 1, 'pepe');

INSERT INTO `niveles_usuario` (`Id_Nivel_Usuario`, `Nombre_Nivel`, `Descripcion_Nivel`) VALUES
(0, 'Empleado', 'Nivel de usuario básico'),
(1, 'Comun', 'Nivel de usuario normal'),
(2, 'Administrador', 'Nivel de usuario avanzado');

INSERT INTO `usuario` (`Id_Usuario`, `Id_Nivel_Usuario`, `Nick`, `Password`) VALUES
(1, 0, 'pepe', 'pepe123'),
(2, 1, 'pepa', 'pepa123'),
(3, 2, 'pepon', 'pepon123');

INSERT INTO `operarios` (`Id_Operario`, `Id_Usuario`, `Nombre`, `Apellido`, `Apellido2`, `Telefono`, `Telefono2`, `Direccion`, `DNI`, `Seg_Social`, `Observacion`, `Foto`, `Fecha_Alta`) VALUES
(1, 1, 'pepe222', 'perez', 'perez2', '123456789', '987654321', 'CALLE SOSPECHA 1', '12345678A', 'asegurado', 'trastorno bipolar', 'demasiado feo', '2014-05-13'),
(2, 2, 'pepaca', 'perez', 'perez2', '123456789', '987654321', 'CALLE SOSPECHA 2', '12345678B', 'sin asegurar', 'buen trabajador', 'demasiado fea', '2014-05-12'),
(3, 3, 'peponazojeje', 'perez', 'perez2', '123456789', '987654321', 'CALLE SOSPECHA 34', '12345678C', 'asegurado', 'conoce internet', 'increiblemente orrible', '2014-05-14');

INSERT INTO `flota_vehiculos` (`Id_Vehiculo`, `Id_Operario`, `Matricula`, `Marca`, `Modelo`) VALUES
(1, 1, '4589HKK', 'Mercedes', 'Vito');

INSERT INTO `proveedores` (`Id_Proveedor`, `Nombre`, `Apellido1`, `Apellido2`, `Nombre_Empresa`, `Telefono1`, `Telefono2`, `NIF`, `Direccion`, `Cod_Postal`, `Localidad`, `Provincia`, `Referencia`, `Observaciones`) VALUES
(1,'pepe','perez','perez','Mariscos Recio', '132456789', '987654321', '01234567A', 'Calle pez 10', '28020', 'Getafe','Madrid','contacto dfe terceras personas','no cobra mucho');

INSERT INTO `categorias_productos` (`Id_Categoria`, `Nombre_Categoria`, `Descripcion_Categoria`) VALUES
(1,'Puerta','Todo tipo de puertas'),
(2,'Cerraduras','Todo tipo de cerraduras');

INSERT INTO `productos` (`Id_Producto`, `Id_Categoria`, `Id_Proveedor`, `Nombre`, `Cantidad_Unidad`, `Detalle`, `Precio_Unidad`, `Unidades_Existentes`, `Precio_ESP`, `Precio_COM`, `Fabricante`, `CERC_CARP`) VALUES
(1,1,1,'Puerta blindada',20,'Puerta de acero', 1000.00, 100, 950.00, 985.00, 'Balay','no se que es esto'),
(2,1,1,'Puerta acero inoxidable',50,'Puerta de acero inoxidable', 1500.00, 300, 980.00, 960.00, 'Balay','no se que es esto'),
(3,2,1,'Cerradura magnetica',90,'Cerradura magnetizada', 2000.00, 20, 0.00, 985.00, 'Balay','no se que es esto'),
(4,2,1,'Cerrojo biometrico',100,'lector de huiellas dactilar y de iris', 8000.00, 500, 350.00, 500.00, 'Balay','no se que es esto');
