-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para samec
CREATE DATABASE IF NOT EXISTS `samec` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `samec`;

-- Volcando estructura para tabla samec.categoriaservicio
CREATE TABLE IF NOT EXISTS `categoriaservicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla samec.categoriaservicio: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categoriaservicio` DISABLE KEYS */;
INSERT INTO `categoriaservicio` (`idservicio`, `nombre`) VALUES
	(1, 'SOFTWARE'),
	(2, 'HARDWARE'),
	(3, 'NETWORKING'),
	(4, 'OTROS'),
	(5, 'SERVICIO TECNICO GENERAL POR HORAS');
/*!40000 ALTER TABLE `categoriaservicio` ENABLE KEYS */;

-- Volcando estructura para tabla samec.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idEncargado` int(11) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `numeroInventario` varchar(45) NOT NULL,
  `numeroSerie` varchar(45) NOT NULL,
  `procesador` varchar(45) NOT NULL,
  `ram` varchar(45) NOT NULL,
  `discoDuro` varchar(45) NOT NULL,
  `cdDrive` varchar(45) NOT NULL,
  `hardwareAdicional` varchar(100) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `codigoqr` varchar(50) DEFAULT NULL,
  `idMonitor` int(11) NOT NULL,
  `macaddress` varchar(50) DEFAULT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  `softwares` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`) USING BTREE,
  KEY `FK_equipos_usuarios` (`idCliente`),
  KEY `FK_equipos_usuarios_2` (`idEncargado`),
  CONSTRAINT `FK_equipos_usuarios` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_equipos_usuarios_2` FOREIGN KEY (`idEncargado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla samec.equipos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;

-- Volcando estructura para tabla samec.monitores
CREATE TABLE IF NOT EXISTS `monitores` (
  `idMonitor` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `numeroSerie` varchar(30) NOT NULL,
  `numeroInventario` varchar(50) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `codigoqr` varchar(50) NOT NULL,
  PRIMARY KEY (`idMonitor`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla samec.monitores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `monitores` DISABLE KEYS */;
/*!40000 ALTER TABLE `monitores` ENABLE KEYS */;

-- Volcando estructura para tabla samec.sale_detail
CREATE TABLE IF NOT EXISTS `sale_detail` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sale_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `cant` int(10) NOT NULL,
  `price` varchar(15) NOT NULL,
  `discount` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla samec.sale_detail: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;

-- Volcando estructura para tabla samec.tiposervicio
CREATE TABLE IF NOT EXISTS `tiposervicio` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `idservicio` int(11) NOT NULL,
  PRIMARY KEY (`idtipo`),
  KEY `FK_tiposervicio_servicios` (`idservicio`),
  CONSTRAINT `FK_tiposervicio_servicios` FOREIGN KEY (`idservicio`) REFERENCES `categoriaservicio` (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla samec.tiposervicio: ~50 rows (aproximadamente)
/*!40000 ALTER TABLE `tiposervicio` DISABLE KEYS */;
INSERT INTO `tiposervicio` (`idtipo`, `nombre`, `precio`, `idservicio`) VALUES
	(1, 'Traslado de datos de un equipo a otro hasta 500Gb', 300, 1),
	(2, 'Traslado de datos adicional costo por Gb', 1, 1),
	(3, 'Reconfiguración de periférico con cd de drivers', 180, 1),
	(4, 'Reconfiguración de periférico con drivers bajados de internet', 300, 1),
	(5, 'Eliminación de Virus - Troyanos - Spyware - etc', 800, 1),
	(6, 'Mantenimiento y optimización software PC', 650, 1),
	(8, 'Instalación de SW (paquete de office, Antivirus, etc.) con drivers desde Internet', 600, 1),
	(9, 'Instalación de antivirus o cambio de antivirus', 340, 1),
	(10, 'Actualización versión de Antivirus', 180, 1),
	(11, 'Instalación y configuración de programa específico provisto o solicitados por el cliente (incluidos programas de gobierno SUA, IDSE, SAT, etc.)', 400, 1),
	(12, 'Respaldo de información a medios de almacenamiento físicos propios del cliente hasta 500Gb', 650, 1),
	(13, 'Respaldo de información a medios de almacenamiento en nube (Dropbox, Drive, OneDrive, etc.) del propio cliente hasta 500Gb', 550, 1),
	(14, 'Recuperación de Sistema Operativo (Windows, IOS, etc.)', 900, 1),
	(15, 'Inicialización de equipo de cómputo. (retorno a punto de origen) usando software propio de recuperación instalado en el equipo por el fabricante.\r\nPersonalización del Windows, activación del antivirus y demás tareas para dejarlo operativo\r\n', 1200, 1),
	(16, 'Reinstalación completa de Sistema Operativo y programas del usuario, limpieza completa del interior del CPU y recuperación de datos del usuario (solo si pueden ser recuperables). Puesta en lugar y configuración de recursos compartidos', 2200, 1),
	(17, 'Servicio de apoyo en contratación de Hosting, delegación de dominio', 300, 1),
	(18, 'Creación de cuentas de e-mail en dominio y hosting del cliente (por cuenta)', 100, 1),
	(19, 'Configuración de cuenta de e-mail en aplicación (Outlook, Gmail, IOS mail, etc.) (por cuenta)', 150, 1),
	(20, 'Gestión mensual de Hosting', 700, 1),
	(21, 'Instalación disco duro mecánico o SSD (No incluye disco Duro)', 200, 2),
	(22, 'Formateo de disco duro mecánico o SSD y chequeo del estado del mismo', 250, 2),
	(23, 'Instalación de memoria RAM (No incluye memoria RAM)', 200, 2),
	(24, 'Limpieza completa interior de CPU (Desktop, Laptop, AIO)', 950, 2),
	(25, 'Instalación de motherboard con CD de Drivers (No incluye motherboard)', 500, 2),
	(26, 'Instalación motherboard con drivers desde internet (No incluye motherboard)', 850, 2),
	(27, 'Cambio de fuente de alimentación (mano de obra únicamente, No incluye fuente de alimentación)', 200, 2),
	(28, 'Cambio de lectora de CD / DVD / Blu-Ray (No incluye Lector de CD/DVD/ Blu-Ray)', 180, 2),
	(29, 'Cambio de gabinete (No incluye Gabinete)', 850, 2),
	(30, 'Instalación Pc en puesto de trabajo', 340, 2),
	(31, 'Prueba de Equipo, Hora o fracción', 200, 2),
	(32, 'Configuración de parámetros de red TCP/IP', 200, 3),
	(33, 'Configuración de discos compartidos', 300, 3),
	(34, 'Configuración de impresora compartida', 200, 3),
	(35, 'Configuración de usuarios, permisos y carpetas compartidas (por usuario)', 150, 3),
	(36, 'Configuración Router ', 620, 3),
	(37, 'Configuración Router con WiFi', 850, 3),
	(38, 'Configuración Access Point WiFi', 850, 3),
	(39, 'Armado de Pared Técnica (Router + Switch)', 850, 3),
	(40, 'Armado Rack de comunicaciones Para Voz y/o Datos', 1500, 3),
	(41, 'Desinstalación equipos de red (Router + Switch)', 650, 3),
	(42, 'Conexión de panel de parcheo (por conector)', 150, 3),
	(43, 'Hechura de cable de parcheo UTP conector RJ45 Cat. 5e o 6 Macho (por metro)', 100, 3),
	(44, 'Instalación de UPS con software de administración si es procedente según equipo', 650, 4),
	(45, 'Instalación de UPS simple', 300, 4),
	(46, 'Acoplamiento de Cable UTP o Eléctrico', 300, 4),
	(47, 'Hora de servicio técnico dentro de horario ordinario de trabajo \r\nL-V 9 a 18 Hrs, sábado. 9 a 13 Hrs. (dentro del anillo Periférico de Guadalajara)\r\n', 300, 5),
	(48, 'Hora de servicio de Atencion de emergencia S.O.S. dentro de horario ordinario de trabajo \r\nL-V 9 a 18 Hrs, sábado. 9 a 13 Hrs. (dentro del anillo Periférico de Guadalajara)\r\n', 400, 5),
	(49, 'Hora adicional por trabajo fuera de horario de servicio técnico (dentro del anillo Periférico de Guadalajara)', 400, 5),
	(50, 'Hora de servicio de atención de emergencia S.O.S. fuera de horario de servicio técnico (dentro del anillo Periférico de Guadalajara)', 600, 5),
	(51, 'Fuera del anillo periférico de Guadalajara se incrementa el costo por hora, por Km al tipo de servicio', 100, 5);
/*!40000 ALTER TABLE `tiposervicio` ENABLE KEYS */;

-- Volcando estructura para tabla samec.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(13) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla samec.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `usuario`, `pass`, `tipo`, `correo`, `telefono`, `direccion`, `genero`, `estado`) VALUES
	(1, 'Deyner Isai', 'Santiz Lopez', 'Deyner', 'Deyner@01', 'Administrador', 'deynerjd@gmail.com', '123456789', 'Jordan', 'Masculino', b'1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla samec.usuario_bitacora
CREATE TABLE IF NOT EXISTS `usuario_bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` time NOT NULL,
  `salida` datetime DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `id` (`id_bitacora`),
  KEY `FK_usuario_bitacora_usuario` (`id_usuario`),
  CONSTRAINT `FK_usuario_bitacora_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla samec.usuario_bitacora: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_bitacora` ENABLE KEYS */;

-- Volcando estructura para tabla samec.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idCliente` int(1) NOT NULL,
  `subtotal` varchar(10) NOT NULL,
  `igv` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_ventas_usuarios` (`idCliente`),
  CONSTRAINT `FK_ventas_usuarios` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla samec.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
