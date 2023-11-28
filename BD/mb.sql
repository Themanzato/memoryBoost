-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 04:43:28
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `ID_Actividad` int(11) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL,
  `Instrucciones` text DEFAULT NULL,
  `Puntaje` int(11) DEFAULT NULL,
  `ID_Tratamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_Cita` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Consultorio` varchar(255) DEFAULT NULL,
  `ID_Doctor` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Consultorio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`ID_Cita`, `Fecha`, `Consultorio`, `ID_Doctor`, `ID_Paciente`, `ID_Consultorio`) VALUES
(1, '2023-11-13', 'DF34', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `ID_Doctor` int(11) NOT NULL,
  `Especialidad` varchar(255) DEFAULT NULL,
  `Consultorio` varchar(255) DEFAULT NULL,
  `CedulaProfesional` varchar(20) DEFAULT NULL,
  `CURP` varchar(20) DEFAULT NULL,
  `FirmaElectronica` blob DEFAULT NULL,
  `ID_Consultorio` int(11) DEFAULT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`ID_Doctor`, `Especialidad`, `Consultorio`, `CedulaProfesional`, `CURP`, `FirmaElectronica`, `ID_Consultorio`, `contrasena`) VALUES
(1, 'Demencia Senil', 'DF34', '18009870', 'HERJJAF4234', 0x3082050e304006092a864886f70d01050d3033301b06092a864886f70d01050c300e0408020100028201010002020800301406082a864886f70d03070408308204bd02010030048204c84dc25895abc363a7a6acdbd9bc22b5af14358feaded13df75ee7207e7ba225dc20da38cd1a506ff668ef19f4c84382160258a009a6031e97f2764bf10aabbe6ccd58f029da51c01cdbcf99f7fe6c3d29025db9abc55a54a034a04ab35ae379145bdb21f6ede35e89a5dfa161296b8c485116f1612f6d487ecfee1f674284d050292c7de94ac1e341a9a20f9986e47532f59c953bb9ef90658c9c02cc0bbfe53fd8c0b35141d26940728ecb49911c34b8147eef97628ad693ed4332a9af0366461ce6165ac62196f7497d6c9b0633d7ca866c020739a15ecba4a8a6fb1e7fa13bd5ee882a0068e757cf8be3eec36148d2fe130e197c94afd95af34d19d61785dc1cdec7a50d40d32d729703a51d6f0976781c52f1dd1d7b425b9e3637b2f369dbbea44e65a0ad1babee750a8ebaed95bdb0c2ee05272b02b30b8aba8cd456175a93640304a36441005b876832c3f9648bbe9a45846ab045897c99111a84bba4b335f8104d39a80c6ed01e09e7c8d7de9116fa344a89fa8825c9125bdf695eb9f52c6efca6edea7be82d3cd90286d88fca5cc541ddc5f07c13906ea0c154fbb886395b1a087e06e33a0c19d9637ced43294b3595e2645d58ffc3426347de9a91f42efa738b8b8e8df6e1bf974b14db0d3cff7026abb98cbebf868e1c913da87c4babb22affca4391e9c18b003af88ae004da0192d8eef5d4080bb6933546383c10dc88b613cdeabb09f439af58384ef5013151a839d0eb0b219a3cb0077b3186d00cce5ca1542743083d8a54a5a459e34a7447b2f03bd8922d44d0caa3b75b8e08002f2f0c2427a0bede09596b0ee68d868033b8a12cb838960839e2c7133f0f3d2f0c0807094a21e5ea4f355f00c7088def1cf2be34907d8e553d603d98105731b0f74fb43a2bdf69e5738e9ff2702cc6e72b6150dc7f92d3e5131dc2eccb8339872ac1306eecf0d6a5abf937ffad8c4956ced2a3ea7cffd3ac80b871903a023534f83003a0cc466b75cdbf8be7c44407b409d3b3b163aa78b4da328a028407230df9a7793cbf287f20cc205d6e2a912c3d6a9dd22aebb01056db0e1a896c0335b7984a5736c2423ea5132e2358fe6e322ef75087f67822add7002230f6323dab6733e1cb9cf7c3ba2529e27862723276225d840c93801af96e312d0db091c4228ad745963685a240e858aa5214bbdb68778fac6730ccbbe1b500fe2330848d00ca61c6e406636b7f1f5d897300fc3fb610dd8f7a7e666e830ce5381fe4a149357d17fb4083d0f62687c84cdaabc518c07228515cfa4c49a1a147d9d723095ea7803bff8bc2c784d919c1e2a6d10685edb587cf5f40038ada81ba79f65652d667856512133327f8cff53528f8dfd3119c114da85de37c96062c9266c1a4699a07fe1cd36cdc6ab967fd5c7fcd6409ef85cc7dd82d4718c6dd167377e2f4b93f5ecc9f0bba525a59fe6279cda4727a121fda67692d2f94cdf59c5a4cb81589e9315721943b792a7dfa1c502adb22ba9dc09793f0387175d05c5b96e879d817a41b556a863ddda11fc35a18c5f99dfaf0c3a22be1f7def6472c0d55e39eb16304fe4b26e3982eeb3e932f89dc8609ae7da5050116cd2c75e36accca6df7ad997e06fb108df91fafdfa89417c4f80dddba1133a75105c668f7e4a7d39877e806b8f8371c171382f3b5a7d33f40f127fdf4dee0163dbe18a02618a5236ab0ae52752e464264147a823780, 1, 'panchito123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `TipoSangre` varchar(10) DEFAULT NULL,
  `NumeroSeguro` varchar(20) DEFAULT NULL,
  `NumeroPersonal` varchar(20) DEFAULT NULL,
  `NumeroEmergencia1` varchar(15) DEFAULT NULL,
  `NumeroEmergencia2` varchar(15) DEFAULT NULL,
  `CodigoPostal` varchar(10) DEFAULT NULL,
  `Localidad` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `ContactodeEmergencia` varchar(255) DEFAULT NULL,
  `FotodePerfil` blob DEFAULT NULL,
  `Etapa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `Nombre`, `FechaNacimiento`, `TipoSangre`, `NumeroSeguro`, `NumeroPersonal`, `NumeroEmergencia1`, `NumeroEmergencia2`, `CodigoPostal`, `Localidad`, `Direccion`, `ContactodeEmergencia`, `FotodePerfil`, `Etapa`) VALUES
(1, 'Salvador', '2003-11-05', 'ORH+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `ID_Pago` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_Persona` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Numerodetelefono` varchar(15) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL,
  `ID_Doctor` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_Persona`, `Nombre`, `Direccion`, `Numerodetelefono`, `CorreoElectronico`, `RFC`, `ID_Doctor`, `ID_Paciente`) VALUES
(1, 'Salvador', 'Juarez no 1', '7711541758', 'smmsalvadorbl@gmail.com', 'BELS031105IO7', NULL, 1),
(2, 'Joan', 'Valle Real', '2282034578', 'joanjarvio@gmail.com', 'HEJJ270795U8R', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `ID_Tratamiento` int(11) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`ID_Actividad`),
  ADD KEY `FK_Actividades_Tratamiento` (`ID_Tratamiento`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `FK_Citas_Doctor` (`ID_Doctor`),
  ADD KEY `FK_Citas_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID_Doctor`),
  ADD UNIQUE KEY `UQ_ID_Consultorio` (`ID_Consultorio`),
  ADD KEY `ID_Consultorio` (`ID_Consultorio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `FK_Factura_Pago` (`ID_Pago`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_Pago`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD KEY `FK_Persona_Doctor` (`ID_Doctor`),
  ADD KEY `FK_Persona_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`ID_Tratamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `ID_Actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `ID_Pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `ID_Tratamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `FK_Actividades_Tratamiento` FOREIGN KEY (`ID_Tratamiento`) REFERENCES `tratamiento` (`ID_Tratamiento`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `FK_Citas_Doctor` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_Doctor`),
  ADD CONSTRAINT `FK_Citas_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_Factura_Pago` FOREIGN KEY (`ID_Pago`) REFERENCES `pago` (`ID_Pago`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `persona` (`ID_Persona`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_Pago_Paciente` FOREIGN KEY (`ID_Pago`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `FK_Persona_Doctor` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_Doctor`),
  ADD CONSTRAINT `FK_Persona_Paciente` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `FK_Tratamiento_Doctor` FOREIGN KEY (`ID_Tratamiento`) REFERENCES `doctor` (`ID_Doctor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
