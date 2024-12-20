-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2024 a las 19:28:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-asistencias`
--
CREATE DATABASE IF NOT EXISTS `sistema-asistencias` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sistema-asistencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `AdminUsuario` varchar(20) NOT NULL,
  `AdminClave` varchar(535) NOT NULL,
  `AdminEmail` varchar(70) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `AdminUsuario`, `AdminClave`, `AdminEmail`, `CuentaCodigo`) VALUES
(44, 'Jonkellys', '$2y$10$8kVgjs6TVrSZF2tna9fqP.xp2SY/tHHI0WoM68lCPEfHcV/ATK07u', 'admin@mail.com', 'AO5819939-2'),
(46, 'aaa', '$2y$10$GsM7wplYrQjKHbGH6UqUXu/KXPQOIyhKtVPZ.SEibG5E/FWmSu1.m', 'aaa@aa', 'AO3312657-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(5) NOT NULL,
  `AsistenciaCodigo` varchar(70) NOT NULL,
  `PersonalCodigo` varchar(70) NOT NULL,
  `AsistenciaFecha` datetime NOT NULL,
  `AsistenciaSalida` datetime NOT NULL,
  `AsistenciaNombre` varchar(200) NOT NULL,
  `PersonalCedula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `AsistenciaCodigo`, `PersonalCodigo`, `AsistenciaFecha`, `AsistenciaSalida`, `AsistenciaNombre`, `PersonalCedula`) VALUES
(135, 'AS8608339-1', 'P4247009-199', '2024-12-19 05:15:11', '2024-12-19 10:15:35', 'Abdías Rael', '49.053.197'),
(136, 'AS4926630-2', 'P0396028-150', '2024-12-19 05:17:41', '2024-12-19 10:18:08', 'Abo Burgos', '86.021.319'),
(137, 'AS9553540-3', 'P6580742-63', '2024-12-19 05:20:22', '2024-12-19 05:21:05', 'Adelardo Barela', '53.976.831'),
(138, 'AS3690854-4', 'P4914153-193', '2024-12-19 05:22:18', '2024-12-19 05:23:03', 'Adelfa Atencio', '20.947.732');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas`
--

CREATE TABLE `contrasenas` (
  `id` int(5) NOT NULL,
  `contrasenaEmail` varchar(70) NOT NULL,
  `contrasenaToken` varchar(255) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL,
  `CuentaTipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(5) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL,
  `CuentaNombre` varchar(40) NOT NULL,
  `CuentaApellido` varchar(40) NOT NULL,
  `CuentaUsuario` varchar(20) NOT NULL,
  `CuentaClave` varchar(535) NOT NULL,
  `CuentaEmail` varchar(70) NOT NULL,
  `CuentaTipo` varchar(20) NOT NULL,
  `CuentaGenero` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `CuentaCodigo`, `CuentaNombre`, `CuentaApellido`, `CuentaUsuario`, `CuentaClave`, `CuentaEmail`, `CuentaTipo`, `CuentaGenero`) VALUES
(75, 'AO5819939-2', 'Jonkellys', 'Maestre', 'Jonkellys', '$2y$10$8kVgjs6TVrSZF2tna9fqP.xp2SY/tHHI0WoM68lCPEfHcV/ATK07u', 'admin@mail.com', 'Administrador', 'Female'),
(78, 'AO1631916-2', 'Ramón', 'Cabrera', 'ramon', '$2y$10$i2XWdBW4GPMx3Xa1Zxdds.okqShI/ATTQcewejyw6onDhiLZaLkR.', 'ramon@gmail.com', 'Usuario', 'Masculino'),
(79, 'AO3312657-3', 'aaa', 'aaa', 'aaa', '$2y$10$GsM7wplYrQjKHbGH6UqUXu/KXPQOIyhKtVPZ.SEibG5E/FWmSu1.m', 'aaa@aa', 'Administrador', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(5) NOT NULL,
  `PersonalNombre` varchar(40) NOT NULL,
  `PersonalApellido` varchar(40) NOT NULL,
  `PersonalCedula` varchar(255) NOT NULL,
  `PersonalCargaFam` int(255) NOT NULL,
  `PersonalTituloAcad` varchar(255) NOT NULL,
  `PersonalNacionalidad` varchar(255) NOT NULL,
  `PersonalCategoria` varchar(255) NOT NULL,
  `PersonalCargo` varchar(200) NOT NULL,
  `PersonalFechaNac` date NOT NULL,
  `PersonalLugarNac` varchar(200) NOT NULL,
  `PersonalGenero` varchar(9) NOT NULL,
  `PersonalDireccion` varchar(200) NOT NULL,
  `PersonalTelefono` varchar(30) NOT NULL,
  `PersonalCorreo` varchar(70) NOT NULL,
  `PersonalCodigo` varchar(30) NOT NULL,
  `PersonalEstado` varchar(50) NOT NULL,
  `PersonalUltimaEntrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `PersonalNombre`, `PersonalApellido`, `PersonalCedula`, `PersonalCargaFam`, `PersonalTituloAcad`, `PersonalNacionalidad`, `PersonalCategoria`, `PersonalCargo`, `PersonalFechaNac`, `PersonalLugarNac`, `PersonalGenero`, `PersonalDireccion`, `PersonalTelefono`, `PersonalCorreo`, `PersonalCodigo`, `PersonalEstado`, `PersonalUltimaEntrada`) VALUES
(1, 'Oliverio', 'Rocha', '99.403.970', 6, 'Maestría', 'Venezolano', 'Profesional', 'Contador', '2002-11-11', 'Mendoza Chico', 'Femenino', 'Del Sauzal 7422', '650-713-2855', 'OliverioRochaJurado@jourrapide.com', 'P1720204-1', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(2, 'Dalmiro', 'Tejeda', '99.202.772', 0, 'Licenciatura', 'Venezolano', 'Asociado', 'Administrativo', '2001-07-08', 'La Paz', 'Masculino', 'Sarandí 1848', '903-870-7525', 'DalmiroTejedaPolanco@armyspy.com', 'P3184157-2', 'Activo', '0000-00-00 00:00:00'),
(3, 'Catrian', 'Amador', '61.045.588', 7, 'Especialidad', 'Venezolano', 'Diplomático', 'Consultante', '2003-09-06', 'Valentines', 'Femenino', 'Treinta y Tres 3834', '689-566-9603', 'CatrianAmadorUlibarri@gustr.com', 'P9787292-3', 'Activo', '0000-00-00 00:00:00'),
(4, 'Yexalén', 'Zamudio', '75.345.831', 4, 'Licenciatura', 'Venezolano', 'Profesional', 'Consultante', '2002-11-20', 'Juan Lacaze', 'Femenino', 'Misiones 4137', 'No tiene teléfono', 'YexalenZamudioCorrales@jourrapide.com', 'P4759010-4', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(5, 'Selim', 'Alcalá', '61.057.170', 7, 'Especialidad', 'Venezolano', 'Asociado', 'Ingeniero', '2006-05-16', 'Palo Solo', 'Femenino', 'Martín Garcia 3675', '308-337-5852', 'SelimAlcalaBorrego@einrot.com', 'P6685891-5', 'Activo', '0000-00-00 00:00:00'),
(6, 'Bastien', 'Rentería', '81.088.062', 1, 'Licenciatura', 'Extranjero', 'Diplomático', 'Especialista', '2001-09-03', 'Batres', 'Femenino', 'C/ Henan Cortes 66', '253-821-6617', 'BastienRenteriaDuenas@jourrapide.com', 'P4716064-6', 'Activo', '0000-00-00 00:00:00'),
(7, 'Aramis', 'Baca', '81.544.424', 6, 'Doctorado', 'Venezolano', 'Asociado', 'Consultante de Contaduría', '1975-07-28', 'Manantiales', 'Masculino', 'Brisas 1112', '810-422-7787', 'AramisBacaGuzman@jourrapide.com', 'P7389362-7', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(8, 'Gladis', 'Beltrán', '45.420.110', 4, 'Maestría', 'Venezolano', 'Diplomático', 'Ejecutivo de desarrollo', '2015-05-18', 'Guadalcanal', 'Masculino', 'Eusebio Dávila 92', 'No tiene teléfono', 'GladisBeltranBarrios@teleworm.us', 'P7986834-8', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(9, 'Maura', 'Farías', '27.443.820', 3, 'Maestría', 'Venezolano', 'Asociado', 'Limpiador', '2019-11-09', 'Calvià', 'Femenino', 'Zumalakarregi etorbidea 99', '972-611-6317', 'MauraFariasGodoy@jourrapide.com', 'P7069911-9', 'Activo', '0000-00-00 00:00:00'),
(10, 'Eleonora', 'Arana', '14.504.430', 6, 'Licenciatura', 'Venezolano', 'Profesional', 'Contador', '2015-06-19', 'La Lantejuela', 'Femenino', 'Lamas Carbajal 24', '947-739-6330', 'EleonoraAranaBenitez@jourrapide.com', 'P4620133-10', 'Activo', '0000-00-00 00:00:00'),
(11, 'Abbi', 'Figueroa', '13.790.015', 4, 'Bachiller', 'Venezolano', 'Profesional', 'Administrativo', '2018-12-11', 'Porreres', 'Femenino', 'Zumalakarregi etorbidea 53', '234-128-4855', 'AbbiFigueroaBarreto@einrot.com', 'P0090910-11', 'Activo', '2024-12-19 04:47:41'),
(12, 'Loyola', 'Dávila', '44.019.598', 4, 'Maestría', 'Venezolano', 'Diplomático', 'Ejecutivo de desarrollo', '2022-10-26', 'Zapicán', 'Masculino', 'España 6768', '412-924-1998', 'LoyolaDavilaMolina@fleckens.hu', 'P1898424-12', 'Activo', '0000-00-00 00:00:00'),
(13, 'Hassan', 'Reyna', '73.943.258', 3, 'Licenciatura', 'Venezolano', 'Asociado', 'Estratega', '2011-01-24', 'Castillos', 'Masculino', 'Leandro Gomez 8479', '458-335-7486', 'HassanReynaAbeyta@superrito.com', 'P5257348-13', 'Activo', '0000-00-00 00:00:00'),
(14, 'Eopoldina', 'Feliciano', '34.012.891', 7, 'Doctorado', 'Venezolano', 'Asociado', 'Especialista de finanzas', '2010-04-11', 'Valdense', 'Femenino', 'Treinta y Tres 7228', '564-072-0910', 'EopoldinaFelicianoCrespo@superrito.com', 'P9843650-14', 'Activo', '0000-00-00 00:00:00'),
(15, 'Selina', 'Trujillo', '59.342.665', 8, 'Maestría', 'Venezolano', 'Asociado', 'Secretario', '2019-06-07', 'Vallehermoso', 'Masculino', 'Estrela 31', '336-742-6448', 'SelinaTrujilloGaona@teleworm.us', 'P9524290-15', 'Activo', '0000-00-00 00:00:00'),
(16, 'Kensel', 'Villaseñor', '41.804.788', 2, 'Universitario', 'Venezolano', 'Asociado', 'Administrativo', '2022-12-16', 'Zafarraya', 'Masculino', 'Paseo del Atlántico 82', '731-112-8282', 'KenselVillasenorAcevedo@gustr.com', 'P6026259-16', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(17, 'Menajem', 'Garay', '44.942.221', 3, 'Especialidad', 'Venezolano', 'Asociado', 'Gerente principal', '2015-05-13', 'Santa Lucía del Este', 'Masculino', 'Joaquin Suarez 5969', '267-512-0719', 'MenajemGarayGrijalva@dayrep.com', 'P9322717-17', 'Activo', '0000-00-00 00:00:00'),
(18, 'Arnold', 'Toledo', '78.852.805', 4, 'Especialidad', 'Venezolano', 'Diplomático', 'Especialista', '2017-05-22', 'Hernani', 'Masculino', 'C/ Canarias 2', '551-090-1196', 'ArnoldToledoJiminez@rhyta.com', 'P2590858-18', 'Activo', '0000-00-00 00:00:00'),
(19, 'Milwida', 'Ordóñez', '12.312.967', 7, 'Doctorado', 'Venezolano', 'Asociado', 'Ejecutivo', '2011-03-17', 'Baños de Rioja', 'Femenino', 'Avda. Los llanos 20', '321-693-5560', 'MilwidaOrdonezBenitez@superrito.com', 'P1749454-19', 'Activo', '0000-00-00 00:00:00'),
(20, 'Balbo', 'Ordóñez', '80.843.783', 6, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2013-02-09', 'Vergara', 'Femenino', 'Ansina 5047', '763-143-8014', 'BalboOrdonezAlvarado@dayrep.com', 'P6884170-20', 'Activo', '0000-00-00 00:00:00'),
(21, 'Clarissa', 'Riojas', '42.370.927', 8, 'Especialidad', 'Venezolano', 'Asociado', 'Ejecutivo de Operaciones', '2022-04-14', 'Purchena', 'Femenino', 'C/ Libertad 63', 'No tiene teléfono', 'ClarissaRiojasJaimes@armyspy.com', 'P2254185-21', 'Activo', '0000-00-00 00:00:00'),
(22, 'Clodovea', 'Alonzo', '85.129.725', 8, 'Especialidad', 'Venezolano', 'Asociado', 'Administrador de presupuesto', '2024-03-27', 'Velázquez', 'Femenino', 'Ansina 1814', '283-942-3398', 'ClodoveaAlonzoVaca@einrot.com', 'P2528231-22', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(23, 'Keren', 'Roque', '48.603.530', 8, 'Especialidad', 'Venezolano', 'Profesional', 'Analista', '2020-05-19', 'Sant Llorenç des Cardassar', 'Femenino', 'Boriñaur enparantza 4', '347-408-6587', 'KerenRoqueOlivares@cuvox.de', 'P9392046-23', 'Activo', '0000-00-00 00:00:00'),
(24, 'Exequiel', 'Zambrano', '15.390.581', 1, 'Doctorado', 'Extranjero', 'Asociado', 'Ejecutivo', '2011-10-21', 'Llorenç del Penedès', 'Femenino', 'Outid de Arriba 94', '480-923-0833', 'ExequielZambranoMayonga@cuvox.de', 'P6151017-24', 'Activo', '0000-00-00 00:00:00'),
(25, 'Vicenta', 'Mondragón', '29.923.442', 8, 'Universitario', 'Venezolano', 'Diplomático', 'Gerente de presupuesto', '2021-09-09', 'Río Branco', 'Femenino', 'Tabaré 2492', '951-285-8063', 'VicentaMondragonRosado@jourrapide.com', 'P6688833-25', 'Activo', '0000-00-00 00:00:00'),
(26, 'Giraldo', 'Delgado', '60.262.731', 3, 'Maestría', 'Venezolano', 'Diplomático', 'Director', '2021-04-21', 'Petín', 'Femenino', 'Pza. Fuensanta 78', '571-376-5582', 'GiraldoDelgadoVillegas@einrot.com', 'P0358348-26', 'Activo', '0000-00-00 00:00:00'),
(27, 'Casia', 'Abeyta', '70.175.603', 4, 'Bachiller', 'Venezolano', 'Asociado', 'Director de servicios', '2017-06-03', 'Barros Blancos', 'Masculino', 'Yapeyu 1010', '619-681-7169', 'CasiaAbeytaAnguiano@einrot.com', 'P1225209-27', 'Activo', '0000-00-00 00:00:00'),
(28, 'Fucsia', 'Ontiveros', '48.831.375', 3, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2012-10-05', 'Algorta', 'Masculino', 'Tacuarembo 6947', '909-959-6353', 'FucsiaOntiverosCallas@fleckens.hu', 'P3949888-28', 'Activo', '0000-00-00 00:00:00'),
(29, 'Agenor', 'Pedroza', '79.025.751', 2, 'Especialidad', 'Venezolano', 'Asociado', 'Especialista', '2020-05-01', 'Getxo', 'Femenino', 'Castelao 8', '361-858-3147', 'AgenorPedrozaCorrales@superrito.com', 'P8374227-29', 'Activo', '0000-00-00 00:00:00'),
(30, 'Vivian', 'Bahena', '75.042.027', 4, 'Licenciatura', 'Venezolano', 'Asociado', 'Analista', '2012-11-23', 'Manilva', 'Femenino', 'Puerto Lugar 19', '802-330-1660', 'VivianBahenaPaz@einrot.com', 'P7162219-30', 'Activo', '0000-00-00 00:00:00'),
(31, 'Ñambi', 'Quintero', '73.553.508', 0, 'Bachiller', 'Venezolano', 'Asociado', 'Director asociado', '2011-02-03', 'Lascano', 'Masculino', 'Democracia 2482', '573-542-9727', 'NambiQuinteroPalacios@teleworm.us', 'P4116293-31', 'Activo', '0000-00-00 00:00:00'),
(32, 'Vanya', 'Quesada', '22.298.728', 3, 'Doctorado', 'Venezolano', 'Asociado', 'Representante', '2016-10-19', 'Béjar', 'Femenino', 'Visitación de la Encina 60', '316-643-8151', 'VanyaQuesadaArmendariz@jourrapide.com', 'P1488668-32', 'Activo', '0000-00-00 00:00:00'),
(33, 'Odina', 'Laureano', '49.731.337', 3, 'Universitario', 'Venezolano', 'Profesional', 'Contador', '2016-04-01', 'Aledo', 'Femenino', 'Alcon Molina 18', 'No tiene teléfono', 'OdinaLaureanoSaenz@dayrep.com', 'P2391158-33', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(34, 'Dunstan', 'Tejada', '94.694.132', 3, 'Universitario', 'Venezolano', 'Asociado', 'Especialista', '2024-04-16', 'Masoller', 'Masculino', 'Marejada 3237', '323-635-7108', 'DunstanTejadaCandelaria@gustr.com', 'P6570782-34', 'Activo', '0000-00-00 00:00:00'),
(35, 'Fina', 'Riojas', '14.126.991', 6, 'Universitario', 'Venezolano', 'Diplomático', 'Limpiador', '2017-03-02', 'Baltasar Brum', 'Masculino', 'Purificacion 8246', '231-503-6912', 'FinaRiojasMunoz@superrito.com', 'P2800645-35', 'Activo', '0000-00-00 00:00:00'),
(36, 'Hamanchay', 'León', '13.191.210', 0, 'Universitario', 'Venezolano', 'Diplomático', 'Administrativo', '2016-12-18', 'Palas de Rei', 'Femenino', 'Ctra. de la Puerta 4', '707-977-6491', 'HamanchayLeonGamboa@armyspy.com', 'P6746260-36', 'Activo', '0000-00-00 00:00:00'),
(37, 'Jacques', 'Aguilar', '99.954.748', 0, 'Universitario', 'Venezolano', 'Diplomático', 'Especialista', '2011-09-13', 'Huércal-Overa', 'Femenino', 'C/ Andalucía 88', '336-383-5063', 'JacquesAguilarRojo@rhyta.com', 'P9937509-37', 'Activo', '0000-00-00 00:00:00'),
(38, 'Tomé', 'Cotto', '27.727.078', 1, 'Licenciatura', 'Venezolano', 'Asociado', 'Ejecutivo', '2014-04-20', 'Montevideo', 'Femenino', 'Arenales 1416', '814-585-9609', 'TomeCottoMadrid@superrito.com', 'P7200848-38', 'Activo', '0000-00-00 00:00:00'),
(39, 'Maciel', 'Arévalo', '63.801.643', 2, 'Maestría', 'Venezolano', 'Profesional', 'Director de planeación', '2012-08-16', 'O Carballiño', 'Masculino', 'Pza. Fuensanta 31', '205-387-5850', 'MacielArevaloCardenas@fleckens.hu', 'P0284474-39', 'Activo', '0000-00-00 00:00:00'),
(40, 'Leandra', 'Martínez', '78.873.335', 0, 'Técnico Medio', 'Venezolano', 'Asociado', 'Ejecutivo', '2020-08-28', 'Nueva Palmira', 'Femenino', 'Coquimbo 1088', '928-613-6047', 'LeandraMartinezConcepcion@armyspy.com', 'P2969363-40', 'Activo', '0000-00-00 00:00:00'),
(41, 'Yemina', 'Canales', '34.753.520', 3, 'Maestría', 'Venezolano', 'Diplomático', 'Director', '2010-11-21', 'Barker', 'Femenino', 'Purificacion 7964', '662-645-8409', 'YeminaCanalesPeres@fleckens.hu', 'P1733714-41', 'Activo', '0000-00-00 00:00:00'),
(42, 'Paola', 'Grijalva', '62.830.825', 6, 'Licenciatura', 'Venezolano', 'Asociado', 'Director', '2010-07-27', 'Montalbán de Córdoba', 'Masculino', 'Carretera 76', '909-637-3915', 'PaolaGrijalvaYanez@gustr.com', 'P4322123-42', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(43, 'Matteo', 'Arriaga', '48.473.868', 3, 'Maestría', 'Venezolano', 'Asociado', 'Asistente', '2012-12-07', 'Chamizo', 'Masculino', 'Colón 1315', '972-162-7235', 'MatteoArriagaMiramontes@teleworm.us', 'P3815346-43', 'Activo', '0000-00-00 00:00:00'),
(44, 'Guaraci', 'Briseño', '64.447.451', 8, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2024-04-18', 'Monda', 'Masculino', 'C/ Henan Cortes 3', '469-845-5366', 'GuaraciBrisenoTrujillo@jourrapide.com', 'P7454008-44', 'Activo', '0000-00-00 00:00:00'),
(45, 'Melisa', 'Saucedo', '49.926.826', 3, 'Técnico Medio', 'Extranjero', 'Profesional', 'Gerente', '2011-11-11', 'San Javier', 'Masculino', 'Colonia Ofir 7156', '980-977-1491', 'MelisaSaucedoUlibarri@teleworm.us', 'P0431811-45', 'Activo', '0000-00-00 00:00:00'),
(46, 'Roberta', 'Acevedo', '21.147.015', 9, 'Licenciatura', 'Venezolano', 'Diplomático', 'Consultante', '2012-08-11', 'Montevideo', 'Masculino', 'Arenales 9931', '845-259-0442', 'RobertaAcevedoPreciado@teleworm.us', 'P2327442-46', 'Activo', '0000-00-00 00:00:00'),
(47, 'Barlaan', 'Barraza', '18.830.324', 5, 'Maestría', 'Venezolano', 'Profesional', 'Gerente', '2020-02-20', 'Berriatua', 'Masculino', 'Castelao 83', '626-706-2233', 'BarlaanBarrazaSierra@armyspy.com', 'P0019755-47', 'Activo', '0000-00-00 00:00:00'),
(48, 'Henoch', 'Alcaraz', '89.106.875', 1, 'Bachiller', 'Venezolano', 'Profesional', 'Gerente', '2021-06-02', 'Las Vegas', 'Femenino', 'Democracia 5454', '469-284-0743', 'HenochAlcarazGranados@armyspy.com', 'P7837798-48', 'Activo', '0000-00-00 00:00:00'),
(49, 'Velasco', 'Barela', '16.138.769', 3, 'Licenciatura', 'Venezolano', 'Asociado', 'Especialista', '2014-08-27', 'Forfoleda', 'Femenino', 'Rúa de San Pedro 2', '202-857-6152', 'VelascoBarelaAlonso@fleckens.hu', 'P1915639-49', 'Activo', '0000-00-00 00:00:00'),
(50, 'Dalila', 'Quiñónez', '53.651.170', 4, 'Especialidad', 'Venezolano', 'Profesional', 'Especialista de operaciones', '2020-02-27', 'Andraitx', 'Masculino', 'Zumalakarregi etorbidea 47', '770-385-6880', 'DalilaQuinonezPelayo@armyspy.com', 'P3633370-50', 'Activo', '0000-00-00 00:00:00'),
(51, 'Esterina', 'Arreola', '32.455.025', 6, 'Maestría', 'Venezolano', 'Profesional', 'Secretaria', '2017-02-15', 'Jete', 'Femenino', 'Pascual Yunquera 9', '872-312-9474', 'EsterinaArreolaSevilla@rhyta.com', 'P8303832-51', 'Activo', '0000-00-00 00:00:00'),
(52, 'Clorinda', 'Atencio', '22.761.639', 9, 'Especialidad', 'Venezolano', 'Asociado', 'Ejecutivo de ingeniería', '2023-05-19', 'Somiedo', 'Femenino', 'Ctra. Villena 22', '435-666-2821', 'ClorindaAtencioBatista@einrot.com', 'P8450260-52', 'Activo', '0000-00-00 00:00:00'),
(53, 'Oriol', 'Cepeda', '47.098.123', 2, 'Doctorado', 'Venezolano', 'Profesional', 'Gerente', '2015-03-01', 'Los Barrios', 'Masculino', 'C/ Rosa de los Vientos 6', '740-821-8250', 'OriolCepedaSedillo@armyspy.com', 'P3356245-53', 'Activo', '0000-00-00 00:00:00'),
(54, 'Laurentino', 'Veliz', '62.358.536', 8, 'Especialidad', 'Venezolano', 'Asociado', 'Asistente', '2022-10-10', 'Vandellòs i l\'Hospitalet de l\'Infant', 'Masculino', 'Bouciña 1', 'No tiene teléfono', 'LaurentinoVelizTorres@teleworm.us', 'P8432831-54', 'Activo', '0000-00-00 00:00:00'),
(55, 'Virgilio', 'Osorio', '16.680.943', 0, 'Técnico Medio', 'Venezolano', 'Profesional', 'Estratega', '2010-04-27', 'Ledrada', 'Masculino', 'Visitación de la Encina 16', '218-703-8915', 'VirgilioOsorioSotelo@jourrapide.com', 'P4809621-55', 'Activo', '0000-00-00 00:00:00'),
(56, 'Hamlet', 'Baca', '79.201.386', 0, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2016-01-18', 'Ibarrangelu', 'Masculino', 'Avenida Cervantes 16', '917-041-4354', 'HamletBacaOrnelas@cuvox.de', 'P3844512-56', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(57, 'Katharina', 'Nevarez', '23.244.233', 2, 'Licenciatura', 'Venezolano', 'Diplomático', 'Especialista de investigación', '2019-03-06', 'Errigoiti', 'Femenino', 'Avenida Cervantes 5', '978-343-2215', 'KatharinaNevarezGaitan@cuvox.de', 'P0859241-57', 'Activo', '0000-00-00 00:00:00'),
(58, 'Selina', 'Pabón', '29.093.784', 8, 'Universitario', 'Venezolano', 'Asociado', 'Asistente', '2010-03-20', 'Alamedilla', 'Masculino', 'Inglaterra 3', '269-370-9508', 'SelinaPabonArredondo@gustr.com', 'P3091170-58', 'Activo', '0000-00-00 00:00:00'),
(59, 'Aymara', 'Castillo', '74.611.083', 1, 'Doctorado', 'Venezolano', 'Profesional', 'Director de contaduría', '2021-10-21', 'Montevideo', 'Masculino', 'Mirasoles 5596', '586-499-3819', 'AymaraCastilloLaureano@dayrep.com', 'P4045785-59', 'Activo', '0000-00-00 00:00:00'),
(60, 'Melissa', 'Trujillo', '96.521.110', 4, 'Técnico Medio', 'Extranjero', 'Diplomático', 'Ejecutivo principal', '2017-03-09', 'Colón', 'Masculino', 'Colón 3098', '352-323-6641', 'MelissaTrujilloLaureano@gustr.com', 'P5029865-60', 'Activo', '0000-00-00 00:00:00'),
(61, 'Dióscoro', 'Posada', '14.363.142', 4, 'Doctorado', 'Venezolano', 'Asociado', 'Analista Junior', '2015-02-22', 'Jun', 'Masculino', 'Herrería 53', '339-023-8345', 'DioscoroPosadaCenteno@armyspy.com', 'P5286373-61', 'Activo', '0000-00-00 00:00:00'),
(62, 'Lukas', 'Montoya', '60.245.321', 2, 'Licenciatura', 'Venezolano', 'Asociado', 'Gerente', '2016-05-05', 'Boiro', 'Femenino', 'El Roqueo 30', '810-138-4189', 'LukasMontoyaRodriguez@superrito.com', 'P9254151-62', 'Activo', '0000-00-00 00:00:00'),
(63, 'Adelardo', 'Barela', '53.976.831', 7, 'Bachiller', 'Venezolano', 'Profesional', 'Especialista', '2024-01-11', 'Calzada de Valdunciel', 'Femenino', 'Rúa de San Pedro 87', '989-907-8350', 'AdelardoBarelaOrta@armyspy.com', 'P6580742-63', 'Activo', '2024-12-19 05:20:22'),
(64, 'Eloy', 'Espinoza', '99.200.113', 7, 'Universitario', 'Venezolano', 'Profesional', 'Contador', '2011-03-27', 'Curtina', 'Masculino', 'Ceibo 9265', '724-379-4944', 'EloyEspinozaCaballero@dayrep.com', 'P6467271-64', 'Activo', '0000-00-00 00:00:00'),
(65, 'Donardo', 'Roque', '96.419.511', 8, 'Doctorado', 'Venezolano', 'Asociado', 'Analista', '2018-07-09', 'Viladecavalls', 'Masculino', 'Cercas Bajas 43', '757-767-6721', 'DonardoRoqueJiminez@einrot.com', 'P1642280-65', 'Activo', '0000-00-00 00:00:00'),
(66, 'Columbo', 'Pedroza', '50.713.586', 8, 'Doctorado', 'Venezolano', 'Diplomático', 'Consultante', '2016-07-02', 'Cascante', 'Femenino', 'Rio Segura 30', '424-651-4570', 'ColumboPedrozaLlarnas@cuvox.de', 'P8599238-66', 'Activo', '0000-00-00 00:00:00'),
(67, 'Agostina', 'Ayala', '39.510.431', 6, 'Doctorado', 'Venezolano', 'Profesional', 'Desarrollador', '2015-09-02', 'Cenlle', 'Femenino', 'Pza. Fuensanta 39', '715-081-9065', 'AgostinaAyalaMaestas@fleckens.hu', 'P0827480-67', 'Activo', '0000-00-00 00:00:00'),
(68, 'Floro', 'Hidalgo', '84.247.177', 3, 'Universitario', 'Venezolano', 'Profesional', 'Representante', '2012-12-25', 'O Grove', 'Masculino', 'Constitución 67', '724-761-4086', 'FloroHidalgoVillegas@jourrapide.com', 'P2329175-68', 'Activo', '0000-00-00 00:00:00'),
(69, 'Auristela', 'Galvez', '61.515.629', 4, 'Bachiller', 'Venezolano', 'Asociado', 'Gerente', '2017-01-25', 'Aiguá', 'Masculino', 'Rogue Burgueño 8985', '278-025-6827', 'AuristelaGalvezRocha@jourrapide.com', 'P3875339-69', 'Activo', '0000-00-00 00:00:00'),
(70, 'Takara', 'Anguiano', '91.592.004', 9, 'Técnico Medio', 'Venezolano', 'Asociado', 'Ejecutivo', '2017-09-08', 'Porvenir', 'Masculino', 'Acuña de Figeroa 6692', '689-022-9381', 'TakaraAnguianoOlivera@superrito.com', 'P6219841-70', 'Activo', '0000-00-00 00:00:00'),
(71, 'Leto', 'Betancourt', '78.444.200', 5, 'Técnico Medio', 'Venezolano', 'Diplomático', 'Ejecutivo', '2012-08-19', 'Quinto', 'Femenino', 'Av. Santiago Lapuente 15', '223-535-0940', 'LetoBetancourtBanuelos@jourrapide.com', 'P3533194-71', 'Activo', '0000-00-00 00:00:00'),
(72, 'Merlin', 'Vallejo', '30.053.695', 4, 'Licenciatura', 'Venezolano', 'Profesional', 'Director', '2015-03-22', 'Válor', 'Masculino', 'Cádiz 34', 'No tiene teléfono', 'MerlinVallejoMayonga@superrito.com', 'P0330470-72', 'Activo', '0000-00-00 00:00:00'),
(73, 'Dennis', 'Sanches', '55.416.935', 6, 'Técnico Medio', 'Venezolano', 'Profesional', 'Administrativo', '2010-12-28', 'Puerto Moral', 'Femenino', 'Prolongacion San Sebastian 40', '973-361-6969', 'DennisSanchesAlanis@jourrapide.com', 'P9539591-73', 'Activo', '0000-00-00 00:00:00'),
(74, 'Amando', 'Agosto', '92.633.512', 4, 'Técnico Medio', 'Venezolano', 'Profesional', 'Especialista', '2023-05-24', 'Capurro', 'Femenino', 'Guayabos 4511', '628-982-6917', 'AmandoAgostoMacias@einrot.com', 'P9318061-74', 'Activo', '0000-00-00 00:00:00'),
(75, 'Renán', 'Nevarez', '40.425.012', 6, 'Maestría', 'Extranjero', 'Asociado', 'Especialista', '2019-08-04', 'Ogíjares', 'Masculino', 'Paseo del Atlántico 45', '603-729-4789', 'RenanNevarezJaime@rhyta.com', 'P8898256-75', 'Activo', '0000-00-00 00:00:00'),
(76, 'Cástor', 'Morales', '73.494.916', 4, 'Bachiller', 'Venezolano', 'Asociado', 'Especialista', '2021-09-08', 'Maldonado', 'Femenino', 'Brisas 1558', '541-295-9759', 'CastorMoralesBotello@teleworm.us', 'P7892130-76', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(77, 'Luminosa', 'Menéndez', '79.827.103', 1, 'Técnico Medio', 'Venezolano', 'Profesional', 'Administrativo', '2024-01-27', 'Ansina', 'Femenino', 'Tacuarembo 7289', '740-860-8397', 'LuminosaMenendezLopez@superrito.com', 'P1448893-77', 'Activo', '0000-00-00 00:00:00'),
(78, 'Floro', 'Alonso', '85.191.807', 5, 'Especialidad', 'Venezolano', 'Profesional', 'Administrativo', '2018-01-05', 'Torre Endoménech', 'Masculino', 'Crta. Cádiz-Málaga 17', '702-519-3644', 'FloroAlonsoLuevano@teleworm.us', 'P0906537-78', 'Activo', '0000-00-00 00:00:00'),
(79, 'Abati', 'Serrano', '79.376.894', 9, 'Especialidad', 'Venezolano', 'Asociado', 'Ejecutivo', '2012-05-13', 'Atarfe', 'Femenino', 'Herrería 48', '707-631-5611', 'AbatiSerranoSaavedra@superrito.com', 'P4431657-79', 'Activo', '2024-12-19 03:58:04'),
(80, 'Popea', 'Batista', '43.007.524', 6, 'Doctorado', 'Venezolano', 'Diplomático', 'Representante', '2016-09-17', 'Sauce', 'Femenino', 'Rigoberto Lopez 3116', '320-808-3428', 'PopeaBatistaCorona@jourrapide.com', 'P8219373-80', 'Activo', '0000-00-00 00:00:00'),
(81, 'Argimiro', 'Rivas', '66.577.837', 0, 'Especialidad', 'Venezolano', 'Diplomático', 'Ejecutivo', '2021-11-28', 'Telde', 'Masculino', 'Avda. Explanada Barnuevo 73', '516-837-6535', 'ArgimiroRivasSerna@fleckens.hu', 'P7598716-81', 'Activo', '0000-00-00 00:00:00'),
(82, 'Kristian', 'Villa', '87.098.989', 2, 'Licenciatura', 'Venezolano', 'Diplomático', 'Administrativo', '2015-12-06', 'Quesada', 'Femenino', 'C/ Angosto 10', '283-194-7185', 'KristianVillaPorras@armyspy.com', 'P4631467-82', 'Activo', '0000-00-00 00:00:00'),
(83, 'Gabelo', 'Muñoz', '56.335.087', 8, 'Universitario', 'Venezolano', 'Diplomático', 'Gerente', '2015-01-29', 'Archena', 'Masculino', 'Cartagena 26', '762-342-2727', 'GabeloMunozAbreu@rhyta.com', 'P0373064-83', 'Activo', '0000-00-00 00:00:00'),
(84, 'Popea', 'Pelayo', '73.190.957', 0, 'Especialidad', 'Venezolano', 'Asociado', 'Especialista de ingeniería', '2013-01-26', 'Tíjola', 'Masculino', 'C/ Libertad 80', '331-951-4533', 'PopeaPelayoValles@jourrapide.com', 'P6621355-84', 'Activo', '0000-00-00 00:00:00'),
(85, 'Matty', 'Guevara', '66.166.998', 0, 'Licenciatura', 'Venezolano', 'Asociado', 'Director de presupuesto', '2021-07-13', 'Sanlúcar de Barrameda', 'Femenino', 'C/ Rosa de los Vientos 12', '469-926-2711', 'MattyGuevaraGiron@cuvox.de', 'P4673834-85', 'Activo', '0000-00-00 00:00:00'),
(86, 'Aracelia', 'Gómez', '62.388.674', 6, 'Licenciatura', 'Venezolano', 'Asociado', 'Representante', '2021-11-30', 'Algorta', 'Femenino', 'Tacuarembo 1024', '715-087-0001', 'AraceliaGomezAtencio@cuvox.de', 'P9113331-86', 'Activo', '0000-00-00 00:00:00'),
(87, 'Colon', 'Campos', '19.022.897', 6, 'Doctorado', 'Venezolano', 'Profesional', 'Asistente', '2016-07-16', 'Santa Lucía del Este', 'Masculino', 'Joaquin Suarez 1373', '703-560-5092', 'ColonCamposVerdugo@superrito.com', 'P6917614-87', 'Activo', '0000-00-00 00:00:00'),
(88, 'Edita', 'Rangel', '62.559.275', 1, 'Técnico Medio', 'Venezolano', 'Asociado', 'Gerente', '2016-10-08', 'Campillos', 'Femenino', 'Avda. de Andalucía 80', '404-884-3051', 'EditaRangelGuillen@teleworm.us', 'P1655809-88', 'Activo', '0000-00-00 00:00:00'),
(89, 'Naiquen', 'Ochoa', '37.282.480', 1, 'Licenciatura', 'Venezolano', 'Profesional', 'Administrativo', '2024-10-30', 'Piedra Sola', 'Masculino', 'Porongos 4493', '385-022-5481', 'NaiquenOchoaOsorio@superrito.com', 'P7908975-89', 'Activo', '0000-00-00 00:00:00'),
(90, 'Joann', 'Lerma', '66.882.521', 4, 'Especialidad', 'Venezolano', 'Profesional', 'Administrativo', '2015-06-20', 'Barros Blancos', 'Masculino', 'Yapeyu 7314', '959-040-8824', 'JoannLermaBatista@teleworm.us', 'P4624301-90', 'Activo', '0000-00-00 00:00:00'),
(91, 'Leda', 'Covarrubias', '80.225.471', 7, 'Maestría', 'Venezolano', 'Asociado', 'Director', '2016-02-20', 'Almonte', 'Masculino', 'Cañadilla 80', '573-099-1928', 'LedaCovarrubiasBorrego@gustr.com', 'P3766210-91', 'Activo', '0000-00-00 00:00:00'),
(92, 'Demóstenes', 'Monroy', '96.720.279', 3, 'Especialidad', 'Venezolano', 'Profesional', 'Ejecutivo', '2023-08-03', 'Millena', 'Masculino', 'C/ Manuel Iradier 30', '561-308-5467', 'DemostenesMonroyBeltran@jourrapide.com', 'P4273584-92', 'Activo', '0000-00-00 00:00:00'),
(93, 'Bee', 'Jurado', '83.994.555', 7, 'Doctorado', 'Extranjero', 'Asociado', 'Ejecutivo', '2019-09-06', 'Espino de la Orbada', 'Femenino', 'Rúa Olmos 2', '631-551-8936', 'BeeJuradoDominguez@teleworm.us', 'P2644056-93', 'Activo', '0000-00-00 00:00:00'),
(94, 'Bab', 'Terrazas', '69.303.103', 6, 'Universitario', 'Venezolano', 'Profesional', 'Especialista', '2023-07-09', 'Navacarros', 'Masculino', 'Visitación de la Encina 15', '912-409-0227', 'BabTerrazasSedillo@einrot.com', 'P8623987-94', 'Activo', '0000-00-00 00:00:00'),
(95, 'Cirinea', 'Becerra', '28.320.305', 0, 'Maestría', 'Venezolano', 'Asociado', 'Director', '2020-02-01', 'Rodezno', 'Femenino', 'Ctra. Hornos 94', '763-048-3247', 'CirineaBecerraMascarenas@superrito.com', 'P9273589-95', 'Activo', '0000-00-00 00:00:00'),
(96, 'Maimara', 'Valles', '19.230.940', 3, 'Licenciatura', 'Venezolano', 'Profesional', 'Analista Principal', '2017-10-18', 'Cieza', 'Femenino', 'Cartagena 73', 'No tiene teléfono', 'MaimaraVallesSalcido@dayrep.com', 'P0018286-96', 'Activo', '0000-00-00 00:00:00'),
(97, 'Valiant', 'Sarabia', '28.969.098', 7, 'Universitario', 'Venezolano', 'Profesional', 'Ejecutivo de planeación', '2015-04-17', 'San Carlos', 'Femenino', 'Parva Domus 9794', 'No tiene teléfono', 'ValiantSarabiaBarragan@jourrapide.com', 'P6212052-97', 'Activo', '0000-00-00 00:00:00'),
(98, 'Santina', 'Esquibel', '65.618.319', 8, 'Doctorado', 'Venezolano', 'Profesional', 'Ejecutivo', '2017-12-04', 'Bella Unión', 'Masculino', 'Yapeyu 9641', '719-387-1110', 'SantinaEsquibelMontenegro@einrot.com', 'P8717438-98', 'Activo', '0000-00-00 00:00:00'),
(99, 'Ilario', 'Collazo', '23.842.436', 3, 'Licenciatura', 'Venezolano', 'Profesional', 'Gerente', '2012-11-12', 'La Paloma', 'Femenino', 'Baltasar Brum 8991', '316-204-0836', 'IlarioCollazoPulido@gustr.com', 'P7751730-99', 'Activo', '0000-00-00 00:00:00'),
(100, 'Fabricio', 'Nieto', '79.645.022', 8, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Asociado', 'Asistente', '2023-08-03', 'Alcúdia', 'Masculino', 'Boriñaur enparantza 95', '302-595-1082', 'FabricioNietoBadillo@superrito.com', 'P5094400-100', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(101, 'Maile', 'Rico', '64.902.756', 3, 'Maestría', 'Venezolano', 'Asociado', 'Gerente', '2021-12-13', 'Sardón de los Frailes', 'Femenino', 'Avda. Enrique Peinador 5', '313-751-0236', 'MaileRicoUrena@gustr.com', 'P4773059-101', 'Activo', '0000-00-00 00:00:00'),
(102, 'Tiago', 'Guardado', '13.427.036', 8, 'Maestría', 'Venezolano', 'Diplomático', 'Consultante', '2014-03-24', 'Tui', 'Masculino', 'Atamaria 62', '904-576-1072', 'TiagoGuardadoSoria@cuvox.de', 'P6160293-102', 'Activo', '0000-00-00 00:00:00'),
(103, 'Anya', 'Rocha', '72.159.221', 6, 'Bachiller', 'Venezolano', 'Profesional', 'Administrativo', '2019-01-20', 'Cerro Colorado', 'Femenino', 'Sarandi 6425', '504-136-1444', 'AnyaRochaVelasquez@cuvox.de', 'P5529891-103', 'Activo', '0000-00-00 00:00:00'),
(104, 'Anatilde', 'Peres', '26.373.723', 8, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2010-08-31', 'Erandio', 'Femenino', 'Castelao 32', '818-369-6066', 'AnatildePeresPichardo@superrito.com', 'P5206660-104', 'Activo', '0000-00-00 00:00:00'),
(105, 'Lucho', 'Hurtado', '19.362.233', 0, 'Doctorado', 'Extranjero', 'Profesional', 'Asistente', '2018-04-22', 'Castell de Cabres', 'Femenino', 'Carretera del Muelle 99', '609-541-5834', 'LuchoHurtadoValentin@dayrep.com', 'P4286658-105', 'Activo', '0000-00-00 00:00:00'),
(106, 'Hipólita', 'Sanabria', '73.717.278', 5, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Analista Jefa', '2017-01-10', 'Illora', 'Masculino', 'Cruce Casa de Postas 43', '760-312-1079', 'HipolitaSanabriaLaboy@teleworm.us', 'P8480887-106', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(107, 'Mirari', 'Orta', '84.931.094', 0, 'Bachiller', 'Venezolano', 'Profesional', 'Ejecutivo', '2010-03-01', 'Encinasola de los Comendadores', 'Masculino', 'Plaza Maior 66', '323-518-3528', 'MirariOrtaGalvez@superrito.com', 'P2657385-107', 'Activo', '0000-00-00 00:00:00'),
(108, 'Charles', 'Laureano', '34.842.409', 8, 'Maestría', 'Venezolano', 'Profesional', 'Gerente', '2023-05-24', 'Murillo de Río Leza', 'Femenino', 'Avda. Andalucía 96', '973-803-3987', 'CharlesLaureanoMaya@einrot.com', 'P2526911-108', 'Activo', '0000-00-00 00:00:00'),
(109, 'Isadora', 'Casares', '30.902.186', 0, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2022-05-06', 'Valle de Abdalajís', 'Femenino', 'Avda. de Andalucía 98', '337-459-1953', 'IsadoraCasaresOlvera@armyspy.com', 'P3521216-109', 'Activo', '0000-00-00 00:00:00'),
(110, 'Petruos', 'Calvillo', '26.565.538', 1, 'Maestría', 'Venezolano', 'Diplomático', 'Especialista de operaciones', '2011-05-27', 'Cuchilla de Peralta', 'Masculino', 'Ceibo 1652', '229-758-9522', 'PetruosCalvilloNazario@fleckens.hu', 'P4599479-110', 'Activo', '0000-00-00 00:00:00'),
(111, 'Quintín', 'Portillo', '18.021.271', 1, 'Licenciatura', 'Venezolano', 'Profesional', 'Director', '2021-06-08', 'Langreo', 'Femenino', 'Ctra. Villena 3', 'No tiene teléfono', 'QuintinPortilloAbreu@einrot.com', 'P8018622-111', 'Activo', '0000-00-00 00:00:00'),
(112, 'César', 'Dueñas', '46.649.945', 9, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Ingeniero', '2018-01-18', 'Girona', 'Masculino', 'El Roqueo 57', '650-144-5807', 'CesarDuenasMurillo@dayrep.com', 'P9140858-112', 'Activo', '0000-00-00 00:00:00'),
(113, 'Elodia', 'Manzanares', '59.797.871', 6, 'Especialidad', 'Venezolano', 'Asociado', 'Gerente', '2015-12-30', 'Aguas Dulces', 'Femenino', 'Ituzaingo 9941', '802-408-6324', 'ElodiaManzanaresCamarillo@dayrep.com', 'P0186818-113', 'Activo', '0000-00-00 00:00:00'),
(114, 'Edgarda', 'Urbina', '59.600.002', 6, 'Bachiller', 'Venezolano', 'Diplomático', 'Ejecutivo', '2022-05-06', 'La Oliva', 'Femenino', 'Puerta Nueva 30', '361-784-1832', 'EdgardaUrbinaMurillo@einrot.com', 'P3404506-114', 'Activo', '0000-00-00 00:00:00'),
(115, 'Amancai', 'Arévalo', '17.838.424', 9, 'Universitario', 'Venezolano', 'Asociado', 'Director', '2022-05-31', 'Isla Patrulla', 'Femenino', 'Olimpo 5548', '941-345-5847', 'AmancaiArevaloZaragoza@rhyta.com', 'P5528096-115', 'Activo', '0000-00-00 00:00:00'),
(116, 'Alvar', 'Parra', '71.050.214', 6, 'Especialidad', 'Venezolano', 'Diplomático', 'Editor', '2016-12-16', 'Olmedo', 'Femenino', 'Calvo Sotelo 9', '717-753-4388', 'AlvarParraFonseca@jourrapide.com', 'P1883193-116', 'Activo', '0000-00-00 00:00:00'),
(117, 'Maimara', 'Viera', '79.168.006', 5, 'Especialidad', 'Venezolano', 'Diplomático', 'Especialista', '2022-08-03', 'San Clemente', 'Femenino', 'El Roqueo 81', '972-177-7051', 'MaimaraVieraVelez@jourrapide.com', 'P8875157-117', 'Activo', '0000-00-00 00:00:00'),
(118, 'Gary', 'Gaitán', '36.836.362', 1, 'Bachiller', 'Venezolano', 'Asociado', 'Consultante', '2022-04-15', 'Nuevo Berlín', 'Masculino', 'Coquimbo 2786', '956-711-6138', 'GaryGaitanGriego@rhyta.com', 'P7423146-118', 'Activo', '0000-00-00 00:00:00'),
(119, 'Quiteria', 'Montero', '77.287.775', 0, 'Especialidad', 'Venezolano', 'Asociado', 'Representante', '2021-10-24', 'Kiyú - Ordeig', 'Femenino', 'Piedras 8255', '209-120-6424', 'QuiteriaMonteroLeal@fleckens.hu', 'P3903518-119', 'Activo', '0000-00-00 00:00:00'),
(120, 'Khalil', 'Orozco', '91.460.593', 9, 'Licenciatura', 'Extranjero', 'Asociado', 'Administrativo', '2011-03-12', 'José Ignacio', 'Femenino', 'Misiones 1173', '629-016-1226', 'KhalilOrozcoHidalgo@einrot.com', 'P9937692-120', 'Activo', '0000-00-00 00:00:00'),
(121, 'Goliard', 'Vigil', '76.532.145', 6, 'Universitario', 'Venezolano', 'Diplomático', 'Representante', '2012-09-25', 'Los Blázquez', 'Femenino', 'La Fontanilla 55', '571-784-0848', 'GoliardVigilMurillo@gustr.com', 'P9013297-121', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(122, 'Gardine', 'Almonte', '92.006.347', 7, 'Doctorado', 'Venezolano', 'Profesional', 'Director', '2016-08-23', 'Velázquez', 'Masculino', 'Ansina 5733', '248-364-9868', 'GardineAlmonteGracia@gustr.com', 'P5908425-122', 'Activo', '0000-00-00 00:00:00'),
(123, 'Cesare', 'Comejo', '17.922.027', 8, 'Universitario', 'Venezolano', 'Profesional', 'Asistente', '2021-06-05', 'Puntas de Valdés', 'Femenino', 'Costanera 2107', '931-953-2928', 'CesareComejoYanez@dayrep.com', 'P8107250-123', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(124, 'Reina', 'Salgado', '82.187.466', 2, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Director', '2024-03-11', 'Estación Migues', 'Femenino', 'Molle 7954', '804-591-9160', 'ReinaSalgadoCampos@teleworm.us', 'P8794726-124', 'Activo', '0000-00-00 00:00:00'),
(125, 'Clarabella', 'Rosario', '80.941.877', 1, 'Bachiller', 'Venezolano', 'Asociado', 'Asistente', '2022-01-21', 'Sant Vicenç de Castellet', 'Masculino', 'C/ Benito Guinea 9', '815-756-1922', 'ClarabellaRosarioZambrano@superrito.com', 'P9476555-125', 'Activo', '0000-00-00 00:00:00'),
(126, 'Esmerada', 'Suárez', '14.517.474', 5, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Asociado', 'Director de finanzas', '2012-08-08', 'Guadalcanal', 'Masculino', 'Eusebio Dávila 62', '351-446-1661', 'EsmeradaSuarezGastelum@einrot.com', 'P7642620-126', 'Activo', '0000-00-00 00:00:00'),
(127, 'Laelia', 'Corona', '94.728.994', 9, 'Licenciatura', 'Venezolano', 'Profesional', 'Especialista', '2014-11-16', 'Los Cerrillos', 'Masculino', 'Del Monte 9271', '303-172-2363', 'LaeliaCoronaMedrano@cuvox.de', 'P4072426-127', 'Activo', '0000-00-00 00:00:00'),
(128, 'Thelma', 'Cordero', '68.713.546', 0, 'Bachiller', 'Venezolano', 'Asociado', 'Asistente', '2013-07-30', 'Villanueva de la Reina', 'Masculino', 'C/ Cuevas de Ambrosio 98', '858-508-0214', 'ThelmaCorderoSalas@teleworm.us', 'P5156015-128', 'Activo', '0000-00-00 00:00:00'),
(129, 'Ela', 'Valdés', '75.903.941', 7, 'Especialidad', 'Venezolano', 'Profesional', 'Contador', '2019-01-25', 'San Sadurniño', 'Femenino', 'Quevedo 87', '606-928-6795', 'ElaValdesRendon@cuvox.de', 'P6555040-129', 'Activo', '0000-00-00 00:00:00'),
(130, 'Bertoldo', 'Manzanares', '71.371.186', 3, 'Universitario', 'Venezolano', 'Asociado', 'Director', '2015-01-16', 'San Luis al Medio', 'Femenino', 'Lavalleja 7797', '203-060-0966', 'BertoldoManzanaresOrtega@einrot.com', 'P6371769-130', 'Activo', '0000-00-00 00:00:00'),
(131, 'Ainara', 'Cervantes', '88.026.510', 5, 'Bachiller', 'Venezolano', 'Asociado', 'Director', '2021-08-12', 'Torroella de Montgrí', 'Masculino', 'Paseo del Atlántico 46', '740-728-5885', 'AinaraCervantesLinares@cuvox.de', 'P7727895-131', 'Activo', '0000-00-00 00:00:00'),
(132, 'Naomi', 'Prado', '52.086.925', 3, 'Especialidad', 'Venezolano', 'Asociado', 'Analista', '2021-07-30', 'Centenario', 'Femenino', 'Leandro Gomez 7479', 'No tiene teléfono', 'NaomiPradoValadez@dayrep.com', 'P3694920-132', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(133, 'Fedro', 'Carrasco', '53.850.367', 3, 'Especialidad', 'Venezolano', 'Profesional', 'Administrativo', '2024-02-08', 'Pando', 'Femenino', 'Hocquart 9644', '585-136-1969', 'FedroCarrascoLongoria@fleckens.hu', 'P6945551-133', 'Activo', '0000-00-00 00:00:00'),
(134, 'Neera', 'Corral', '75.242.843', 3, 'Universitario', 'Venezolano', 'Asociado', 'Director', '2019-04-09', 'Playa Fomento', 'Femenino', 'Miguelete 3091', '925-052-6681', 'NeeraCorralLeiva@cuvox.de', 'P2752695-134', 'Activo', '0000-00-00 00:00:00'),
(135, 'Rufino', 'Alejandro', '61.222.985', 6, 'Universitario', 'Venezolano', 'Profesional', 'Contador', '2017-12-10', 'Tárbena', 'Masculino', 'C/ Fernández de Leceta 7', '657-423-9187', 'RufinoAlejandroContreras@dayrep.com', 'P3968610-135', 'Activo', '0000-00-00 00:00:00'),
(136, 'Leónidas', 'Balderas', '22.167.155', 5, 'Universitario', 'Venezolano', 'Diplomático', 'Director', '2011-11-10', 'Goñi', 'Femenino', 'Tala 7882', '646-136-6702', 'LeonidasBalderasVerdugo@cuvox.de', 'P1440004-136', 'Activo', '0000-00-00 00:00:00'),
(137, 'Gianira', 'Rojas', '70.054.504', 9, 'Bachiller', 'Venezolano', 'Profesional', 'Director', '2019-04-30', 'Argamasilla de Alba', 'Masculino', 'Padre Caro 23', '215-190-0701', 'GianiraRojasSaavedra@einrot.com', 'P7317481-137', 'Activo', '0000-00-00 00:00:00'),
(138, 'Arabel', 'García', '54.136.629', 5, 'Maestría', 'Extranjero', 'Profesional', 'Administrativo', '2024-04-23', 'Cascante', 'Femenino', 'Rio Segura 84', '925-807-7022', 'ArabelGarciaBanuelos@jourrapide.com', 'P5342804-138', 'Activo', '0000-00-00 00:00:00'),
(139, 'Troya', 'Alarcón', '65.672.418', 6, 'Licenciatura', 'Venezolano', 'Profesional', 'Administrativo', '2011-01-20', 'Cardoso', 'Femenino', 'Rincon 5673', '937-114-0184', 'TroyaAlarconVerduzco@dayrep.com', 'P8329534-139', 'Activo', '0000-00-00 00:00:00'),
(140, 'Sinforosa', 'Adame', '90.821.799', 7, 'Bachiller', 'Venezolano', 'Diplomático', 'Director principal', '2014-10-05', 'El Pinar', 'Masculino', 'Guaviyu 8961', '724-981-8686', 'SinforosaAdameSalgado@gustr.com', 'P2264938-140', 'Activo', '0000-00-00 00:00:00'),
(141, 'Bennie', 'Velasco', '52.673.505', 8, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Asociado', 'Contador Jefe', '2013-04-07', 'San Jorge', 'Femenino', 'Carretera del Muelle 70', '212-321-7488', 'BennieVelascoTeran@superrito.com', 'P9305969-141', 'Activo', '0000-00-00 00:00:00'),
(142, 'Estefania', 'Orozco', '69.515.569', 1, 'Maestría', 'Venezolano', 'Diplomático', 'Consultante', '2010-01-27', 'Melilla', 'Femenino', 'Av. Santiago Lapuente 83', '952-784-7537', 'EstefaniaOrozcoVenegas@superrito.com', 'P4112416-142', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(143, 'Edco', 'Casillas', '43.049.602', 1, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Asociado', 'Consultante', '2017-12-04', 'Ombúes de Lavalle', 'Femenino', 'Coquimbo 2840', '557-150-4665', 'EdcoCasillasGalvez@jourrapide.com', 'P2477683-143', 'Activo', '0000-00-00 00:00:00'),
(144, 'Maro', 'Magana', '30.584.442', 6, 'Licenciatura', 'Venezolano', 'Profesional', 'Especialista', '2013-12-14', 'Ispaster', 'Masculino', 'Avenida Cervantes 56', '957-962-0643', 'MaroMaganaBriseno@einrot.com', 'P2412713-144', 'Activo', '0000-00-00 00:00:00'),
(145, 'Pompilio', 'Menéndez', '96.274.970', 0, 'Doctorado', 'Venezolano', 'Profesional', 'Consultante', '2022-11-26', 'San Rafael - El Placer', 'Femenino', 'Lavalleja 9400', '715-866-6546', 'PompilioMenendezRodrigez@einrot.com', 'P2393764-145', 'Activo', '0000-00-00 00:00:00'),
(146, 'Endike', 'Naranjo', '86.897.679', 6, 'Licenciatura', 'Venezolano', 'Asociado', 'Director', '2013-07-25', 'Reboledo', 'Masculino', 'Costanera 1416', '563-943-8070', 'EndikeNaranjoQuesada@superrito.com', 'P5264846-146', 'Activo', '0000-00-00 00:00:00'),
(147, 'Haizea', 'Rosas', '83.209.785', 0, 'Doctorado', 'Venezolano', 'Profesional', 'Ejecutivo', '2016-05-04', 'Colonia', 'Masculino', 'Ombù 1388', '503-293-3426', 'HaizeaRosasSepulveda@armyspy.com', 'P1384610-147', 'Activo', '0000-00-00 00:00:00'),
(148, 'Bab', 'Escobedo', '38.634.844', 0, 'Maestría', 'Venezolano', 'Diplomático', 'Especialista', '2014-09-08', 'José Pedro Varela', 'Femenino', 'Misiones 6966', '618-780-3382', 'BabEscobedoGuardado@jourrapide.com', 'P1314778-148', 'Activo', '0000-00-00 00:00:00'),
(149, 'Evasio', 'Ornelas', '75.636.332', 8, 'Universitario', 'Venezolano', 'Diplomático', 'Ejecutivo de Operaciones', '2016-01-18', 'Muskiz', 'Masculino', 'Camiño Real 8', '580-822-3908', 'EvasioOrnelasSotelo@armyspy.com', 'P2815748-149', 'Activo', '0000-00-00 00:00:00'),
(150, 'Abo', 'Burgos', '86.021.319', 6, 'Licenciatura', 'Venezolano', 'Diplomático', 'Analista', '2024-01-02', 'Alcudia de Veo', 'Masculino', 'Crta. Cádiz-Málaga 20', 'No tiene teléfono', 'AboBurgosSaldivar@armyspy.com', 'P0396028-150', 'Activo', '2024-12-19 05:17:41'),
(151, 'Vitaliano', 'Viera', '80.886.105', 0, 'Universitario', 'Venezolano', 'Asociado', 'Ejecutivo', '2024-07-14', 'Estación Migues', 'Masculino', 'Molle 6047', '660-377-1916', 'VitalianoVieraCasarez@dayrep.com', 'P3364714-151', 'Activo', '0000-00-00 00:00:00'),
(152, 'Pastora', 'Cisneros', '56.101.969', 6, 'Maestría', 'Venezolano', 'Diplomático', 'Consultante', '2022-04-23', 'Vergara', 'Femenino', 'Ansina 8311', '315-657-5438', 'PastoraCisnerosAguilar@teleworm.us', 'P3171020-152', 'Activo', '0000-00-00 00:00:00'),
(153, 'Viridiana', 'Caldera', '57.523.299', 6, 'Maestría', 'Extranjero', 'Asociado', 'Analista', '2019-11-22', 'Joanicó', 'Masculino', 'Ituzaingó 3705', '562-755-0747', 'ViridianaCalderaEsquibel@armyspy.com', 'P6129441-153', 'Activo', '0000-00-00 00:00:00'),
(154, 'Judit', 'Hidalgo', '47.322.438', 5, 'Universitario', 'Venezolano', 'Profesional', 'Gerente', '2023-04-24', 'Nonaspe', 'Femenino', 'Av. Santiago Lapuente 5', '540-124-7547', 'JuditHidalgoRiojas@rhyta.com', 'P0242543-154', 'Activo', '0000-00-00 00:00:00'),
(155, 'Vesta', 'Feliciano', '91.868.296', 6, 'Doctorado', 'Venezolano', 'Profesional', 'Director', '2016-09-15', 'Barra de Carrasco', 'Femenino', 'Purificacion 9023', '219-231-0499', 'VestaFelicianoEspinosa@armyspy.com', 'P2823238-155', 'Activo', '0000-00-00 00:00:00'),
(156, 'Tulla', 'Ortiz', '11.327.571', 4, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Administrativo', '2021-01-30', 'Montevideo', 'Masculino', 'Ibirapita 9495', '309-270-0260', 'TullaOrtizLira@teleworm.us', 'P9298928-156', 'Activo', '0000-00-00 00:00:00'),
(157, 'Fredel', 'Ceballos', '63.876.693', 5, 'Bachiller', 'Venezolano', 'Asociado', 'Ejecutivo', '2018-02-01', 'Minuano', 'Masculino', 'Monteadores 7775', '779-010-8585', 'FredelCeballosSolorzano@gustr.com', 'P3835018-157', 'Activo', '0000-00-00 00:00:00'),
(158, 'Zoila', 'Rangel', '57.440.100', 6, 'Universitario', 'Venezolano', 'Asociado', 'Consultante', '2020-07-28', 'Zufre', 'Femenino', 'Prolongacion San Sebastian 22', '507-103-4343', 'ZoilaRangelCorona@armyspy.com', 'P6666379-158', 'Activo', '0000-00-00 00:00:00'),
(159, 'Evelia', 'Chávez', '80.614.712', 5, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Analista', '2011-02-04', 'Durazno', 'Masculino', 'Ibirapita 4802', '952-399-3915', 'EveliaChavezVela@dayrep.com', 'P9712198-159', 'Activo', '0000-00-00 00:00:00'),
(160, 'Emanuel', 'Bueno', '87.088.143', 2, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Profesional', 'Director', '2014-08-13', 'Masoller', 'Femenino', 'Marejada 9752', '740-481-0082', 'EmanuelBuenoLoya@jourrapide.com', 'P5481175-160', 'Activo', '0000-00-00 00:00:00'),
(161, 'Aleida', 'Sepúlveda', '56.262.022', 6, 'Licenciatura', 'Venezolano', 'Asociado', 'Consultante', '2020-05-12', 'Quel', 'Masculino', 'Ctra. Beas-Cortijos Nuevos 68', '513-397-9262', 'AleidaSepulvedaGiron@fleckens.hu', 'P9302815-161', 'Activo', '0000-00-00 00:00:00'),
(162, 'Valdemar', 'Sánchez', '43.317.663', 1, 'Universitario', 'Venezolano', 'Diplomático', 'Consultante', '2023-11-01', 'Montevideo', 'Masculino', 'Mirasoles 2839', 'No tiene teléfono', 'ValdemarSanchezNajera@fleckens.hu', 'P7691352-162', 'Activo', '0000-00-00 00:00:00'),
(163, 'Cuyen', 'Lomeli', '20.288.680', 9, 'Doctorado', 'Venezolano', 'Asociado', 'Administrativo', '2013-10-20', 'Paso de Pache', 'Masculino', 'Cagancha 8297', '518-038-5980', 'CuyenLomeliCadena@teleworm.us', 'P8913250-163', 'Activo', '0000-00-00 00:00:00'),
(164, 'Marc', 'Melgar', '12.139.568', 1, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Diplomático', 'Especialista', '2022-08-26', 'Carreño', 'Femenino', 'Avda. Rio Nalon 78', '714-882-7395', 'MarcMelgarVelez@jourrapide.com', 'P1998502-164', 'Activo', '0000-00-00 00:00:00'),
(165, 'Norberta', 'Alanis', '73.693.519', 7, 'Doctorado', 'Venezolano', 'Diplomático', 'Desarrollador', '2012-09-10', 'Mollerussa', 'Masculino', 'Plaza Colón 58', '347-685-5763', 'NorbertaAlanisSamaniego@cuvox.de', 'P6305339-165', 'Activo', '0000-00-00 00:00:00'),
(166, 'Valentín', 'Garrido', '98.554.955', 2, 'Licenciatura', 'Venezolano', 'Asociado', 'Gerente', '2018-09-06', 'Arenzana de Abajo', 'Femenino', 'Avda. Los llanos 3', '743-202-6454', 'ValentinGarridoDuran@superrito.com', 'P9919547-166', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(167, 'Iwan', 'Cordero', '84.123.496', 8, 'Bachiller', 'Venezolano', 'Diplomático', 'Estratega', '2023-01-03', 'Monterrubio de la Sierra', 'Masculino', 'Camiño Ancho 7', '679-932-1474', 'IwanCorderoTrejo@cuvox.de', 'P9701131-167', 'Activo', '0000-00-00 00:00:00'),
(168, 'Leylen', 'Manzanares', '67.216.288', 1, 'Bachiller', 'Venezolano', 'Profesional', 'Especialista', '2015-09-04', 'Cigales', 'Masculino', 'Calvo Sotelo 83', '209-851-7788', 'LeylenManzanaresSalazar@superrito.com', 'P2312628-168', 'Activo', '0000-00-00 00:00:00'),
(169, 'Betiana', 'Benavidez', '34.495.253', 1, 'Bachiller', 'Venezolano', 'Profesional', 'Director', '2012-07-29', 'Tacuarembó', 'Femenino', 'Neruda 6894', '513-205-4354', 'BetianaBenavidezCandelaria@dayrep.com', 'P9228791-169', 'Activo', '0000-00-00 00:00:00'),
(170, 'Mariana', 'Carrera', '21.551.406', 6, 'Universitario', 'Venezolano', 'Profesional', 'Consultante', '2016-09-16', 'Florencio Sánchez', 'Masculino', 'Coronilla 5095', '904-207-3011', 'MarianaCarreraChavarria@einrot.com', 'P5886619-170', 'Activo', '0000-00-00 00:00:00'),
(171, 'Nilce', 'Molina', '49.757.191', 0, 'Maestría', 'Extranjero', 'Diplomático', 'Asistente', '2022-07-04', 'Goñi', 'Masculino', 'Tala 9277', '213-565-7690', 'NilceMolinaAcuna@cuvox.de', 'P9847922-171', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(172, 'Dante', 'Alejandro', '85.714.792', 6, 'Doctorado', 'Venezolano', 'Profesional', 'Administrativo', '2019-03-08', 'Artilleros', 'Femenino', 'Joaquin Suarez 7425', '385-848-3931', 'DanteAlejandroAdame@dayrep.com', 'P3861958-172', 'Activo', '0000-00-00 00:00:00'),
(173, 'Ofelia', 'Hidalgo', '18.920.552', 7, 'Licenciatura', 'Venezolano', 'Asociado', 'Secretario', '2024-05-26', 'Luceni', 'Masculino', 'Celso Emilio Ferreiro 14', '860-693-4145', 'OfeliaHidalgoMercado@einrot.com', 'P9666647-173', 'Activo', '0000-00-00 00:00:00'),
(174, 'Senan', 'Olivas', '89.912.589', 6, 'Licenciatura', 'Venezolano', 'Asociado', 'Director', '2010-05-11', 'Ezkio-Itsaso', 'Femenino', 'Carretera Cádiz-Málaga 65', '779-736-0063', 'SenanOlivasCaldera@einrot.com', 'P8765294-174', 'Activo', '0000-00-00 00:00:00'),
(175, 'Wayca', 'Cepeda', '54.865.302', 2, 'Doctorado', 'Venezolano', 'Asociado', 'Gerente', '2014-01-03', 'San José de Carrasco', 'Masculino', 'Colonia Ofir 9087', '859-589-4952', 'WaycaCepedaAguirre@armyspy.com', 'P6900762-175', 'Activo', '0000-00-00 00:00:00'),
(176, 'Liberto', 'Ledesma', '75.343.218', 4, 'Licenciatura', 'Venezolano', 'Asociado', 'Analista', '2016-05-11', 'El Villar de Arnedo', 'Femenino', 'Ctra. Beas-Cortijos Nuevos 45', '779-932-5697', 'LibertoLedesmaMata@superrito.com', 'P6112812-176', 'Activo', '0000-00-00 00:00:00'),
(177, 'Catrin', 'Ceja', '22.706.943', 5, 'Licenciatura', 'Venezolano', 'Asociado', 'Estratega', '2013-12-18', 'Mieres', 'Masculino', 'Maestro Puig Valera 88', '515-457-1681', 'CatrinCejaQuintana@gustr.com', 'P4203966-177', 'Activo', '0000-00-00 00:00:00'),
(178, 'Jorgelina', 'Marrero', '98.262.132', 0, 'Bachiller', 'Venezolano', 'Profesional', 'Consultante', '2021-04-04', 'Ezcabarte', 'Masculino', 'Alcon Molina 54', '774-148-5326', 'JorgelinaMarreroPantoja@cuvox.de', 'P4747391-178', 'Activo', '0000-00-00 00:00:00'),
(179, 'Aucan', 'Tijerina', '93.462.914', 3, 'Bachiller', 'Venezolano', 'Asociado', 'Analista', '2017-04-27', 'Alaejos', 'Masculino', 'Calvo Sotelo 75', '339-754-0260', 'AucanTijerinaGuillen@einrot.com', 'P8663721-179', 'Activo', '0000-00-00 00:00:00'),
(180, 'Eliazar', 'Meza', '39.598.535', 9, 'Licenciatura', 'Venezolano', 'Asociado', 'Ejecutivo', '2012-02-13', 'Candeleda', 'Masculino', 'C/ Libertad 50', 'No tiene teléfono', 'EliazarMezaSotelo@fleckens.hu', 'P6134042-180', 'Activo', '0000-00-00 00:00:00'),
(181, 'Noelio', 'Cardona', '43.206.735', 3, 'Maestría', 'Venezolano', 'Profesional', 'Administrativo', '2019-10-17', 'La Tuna', 'Masculino', 'Sarandí 8780', '484-341-3153', 'NoelioCardonaRosales@gustr.com', 'P2206635-181', 'Activo', '0000-00-00 00:00:00'),
(182, 'Valquiria', 'Urena', '37.620.291', 4, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2024-10-25', 'Zufre', 'Femenino', 'Prolongacion San Sebastian 75', '914-371-7594', 'ValquiriaUrenaBarreto@rhyta.com', 'P8786972-182', 'Activo', '0000-00-00 00:00:00'),
(183, 'Calanit', 'Rosales', '89.454.348', 6, 'Maestría', 'Venezolano', 'Asociado', 'Director', '2014-03-25', 'La Carlota', 'Femenino', 'Padre Caro 31', '559-850-2073', 'CalanitRosalesNevarez@einrot.com', 'P4488846-183', 'Activo', '0000-00-00 00:00:00'),
(184, 'Dugan', 'Carrasco', '90.649.246', 6, 'Bachiller', 'Venezolano', 'Diplomático', 'Consultante', '2023-02-17', 'Socuéllamos', 'Masculino', 'Padre Caro 66', '424-233-4241', 'DuganCarrascoVarela@superrito.com', 'P9742867-184', 'Activo', '0000-00-00 00:00:00'),
(185, 'Betina', 'Callas', '10.186.744', 3, 'Universitario', 'Venezolano', 'Diplomático', 'Representante', '2010-02-22', 'Artea', 'Femenino', 'Valadouro 23', '515-848-5525', 'BetinaCallasZepeda@einrot.com', 'P6500914-185', 'Activo', '0000-00-00 00:00:00'),
(186, 'Mendel', 'Romo', '66.120.061', 9, 'Universitario', 'Venezolano', 'Asociado', 'Ingeniero', '2021-03-14', 'Fuentealbilla', 'Femenino', 'C/ Domingo Beltrán 2', '302-801-2485', 'MendelRomoOcampo@teleworm.us', 'P2241119-186', 'Activo', '0000-00-00 00:00:00'),
(187, 'Ain', 'Solano', '50.805.469', 7, 'Bachiller', 'Venezolano', 'Asociado', 'Gerente', '2021-01-08', 'Sant Mateu', 'Femenino', 'Crta. Cádiz-Málaga 32', '915-389-5280', 'AinSolanoCarranza@gustr.com', 'P9952734-187', 'Activo', '0000-00-00 00:00:00');
INSERT INTO `personal` (`id`, `PersonalNombre`, `PersonalApellido`, `PersonalCedula`, `PersonalCargaFam`, `PersonalTituloAcad`, `PersonalNacionalidad`, `PersonalCategoria`, `PersonalCargo`, `PersonalFechaNac`, `PersonalLugarNac`, `PersonalGenero`, `PersonalDireccion`, `PersonalTelefono`, `PersonalCorreo`, `PersonalCodigo`, `PersonalEstado`, `PersonalUltimaEntrada`) VALUES
(188, 'Nazar', 'Balderas', '67.018.946', 9, 'Bachiller', 'Venezolano', 'Profesional', 'Administrativo', '2016-07-14', 'Médanos de Solymar', 'Femenino', 'Marejada 8168', '442-266-5442', 'NazarBalderasSamaniego@dayrep.com', 'P0968938-188', 'Activo', '0000-00-00 00:00:00'),
(189, 'Gualtar', 'Adomo', '10.109.862', 0, 'Doctorado', 'Extranjero', 'Profesional', 'Asistente', '2023-05-01', 'Castrelo de Miño', 'Femenino', 'Pza. Fuensanta 95', '929-351-0553', 'GualtarAdomoOquendo@rhyta.com', 'P7992045-189', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(190, 'Judith', 'Alfaro', '58.733.492', 3, 'Universitario', 'Venezolano', 'Asociado', 'Director', '2015-02-16', 'Abegondo', 'Femenino', 'Quevedo 44', '430-432-9476', 'JudithAlfaroSalcedo@rhyta.com', 'P3494093-190', 'Activo', '0000-00-00 00:00:00'),
(191, 'Malva', 'Ramón', '43.505.073', 7, 'TSU (Técnico Superior Universitario)', 'Venezolano', 'Asociado', 'Senior Editor', '2018-01-18', 'Amposta', 'Femenino', 'Bouciña 33', '539-254-8563', 'MalvaRamonGurule@teleworm.us', 'P1356146-191', 'Activo', '0000-00-00 00:00:00'),
(192, 'Pantaleón', 'Lomeli', '79.972.122', 5, 'Especialidad', 'Venezolano', 'Asociado', 'Administrativo', '2019-12-05', 'Monterroso', 'Femenino', 'Ctra. de Siles 47', 'No tiene teléfono', 'PantaleonLomeliValle@rhyta.com', 'P2101113-192', 'Activo', '0000-00-00 00:00:00'),
(193, 'Adelfa', 'Atencio', '20.947.732', 8, 'Bachiller', 'Venezolano', 'Asociado', 'Analista', '2024-11-01', 'Santa Lucía', 'Femenino', 'Joaquin Suarez 6714', '220-351-1317', 'AdelfaAtencioLemus@gustr.com', 'P4914153-193', 'Activo', '2024-12-19 05:22:18'),
(194, 'Africa', 'Verduzco', '68.389.487', 2, 'Especialidad', 'Venezolano', 'Asociado', 'Associate Editor', '2019-08-09', 'Tarifa', 'Femenino', 'C/ Rosa de los Vientos 43', '219-220-4016', 'AfricaVerduzcoPeralta@dayrep.com', 'P2476683-194', 'Activo', '0000-00-00 00:00:00'),
(195, 'Ulrico', 'Cedillo', '39.286.454', 7, 'Doctorado', 'Venezolano', 'Asociado', 'Gerente', '2019-04-11', 'Calasparra', 'Masculino', 'Cartagena 10', '770-760-8686', 'UlricoCedilloPacheco@armyspy.com', 'P7652699-195', 'Activo', '0000-00-00 00:00:00'),
(196, 'Leonilda', 'Ceja', '13.040.871', 0, 'Licenciatura', 'Venezolano', 'Profesional', 'Administrativo', '2022-01-13', 'Cardeña', 'Masculino', 'La Fontanilla 51', '351-966-4132', 'LeonildaCejaMenchaca@jourrapide.com', 'P7998628-196', 'Activo', '0000-00-00 00:00:00'),
(197, 'Emilse', 'Quintanilla', '92.847.664', 1, 'Maestría', 'Venezolano', 'Diplomático', 'Analista', '2013-08-10', 'Joanicó', 'Femenino', 'Ituzaingó 1343', '620-717-2915', 'EmilseQuintanillaCorrea@jourrapide.com', 'P8584107-197', 'Activo', '0000-00-00 00:00:00'),
(198, 'Gotardo', 'Sepúlveda', '78.630.122', 3, 'Bachiller', 'Venezolano', 'Asociado', 'Representante', '2023-12-01', 'Arrazua-Ubarrundia', 'Masculino', 'José matía 69', '507-641-1813', 'GotardoSepulvedaHurtado@teleworm.us', 'P5642704-198', 'Con Permiso Médico', '0000-00-00 00:00:00'),
(199, 'Abdías', 'Rael', '49.053.197', 0, 'Bachiller', 'Venezolano', 'Profesional', 'Ejecutivo', '2016-05-13', 'Plácido Rosas', 'Masculino', 'Miguelete 5933', 'No tiene teléfono', 'AbdiasRaelTamayo@rhyta.com', 'P4247009-199', 'Activo', '2024-12-19 05:15:11'),
(200, 'Huichal', 'Segovia', '95.689.221', 4, 'Especialidad', 'Extranjero', 'Asociado', 'Especialista de contaduría', '2016-04-03', 'Villamuriel de Cerrato', 'Masculino', 'Ctra. Villena 94', '803-578-5435', 'HuichalSegoviaSantana@einrot.com', 'P1185055-200', 'Activo', '0000-00-00 00:00:00'),
(201, 'Daniela', 'Saucedo', '45.824.823', 3, 'Maestría', 'Venezolano', 'Diplomático', 'Asistente', '2014-11-19', 'Sucre', 'Femenino', 'Calle Mercedes 43', 'No tiene teléfono', 'saucedo.daniela@gmail.com', 'P0374544-201', 'Activo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(5) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserEmail` varchar(70) NOT NULL,
  `UserClave` varchar(535) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `UserName`, `UserEmail`, `UserClave`, `CuentaCodigo`) VALUES
(35, 'ramon', 'ramon@gmail.com', '$2y$10$i2XWdBW4GPMx3Xa1Zxdds.okqShI/ATTQcewejyw6onDhiLZaLkR.', 'AO1631916-2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersonalCodigo` (`PersonalCodigo`),
  ADD KEY `AsistenciaFecha` (`AsistenciaFecha`);

--
-- Indices de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contrasenaToken` (`contrasenaToken`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersonalCodigo` (`PersonalCodigo`),
  ADD KEY `PersonalUltimaEntrada` (`PersonalUltimaEntrada`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`PersonalCodigo`) REFERENCES `personal` (`PersonalCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD CONSTRAINT `contrasenas_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
