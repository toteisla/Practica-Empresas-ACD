-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2012 a las 10:00:28
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ACD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos_corporativos`
--

CREATE TABLE IF NOT EXISTS `adjuntos_corporativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(70) NOT NULL,
  `archivo` longblob NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'txt',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_correos`
--

CREATE TABLE IF NOT EXISTS `archivos_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_correo` int(11) NOT NULL,
  `archivo` longblob NOT NULL,
  `nombrearchivo` varchar(100) NOT NULL,
  `tipo` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_fases`
--

CREATE TABLE IF NOT EXISTS `archivos_fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fase` int(11) NOT NULL,
  `archivo` longblob NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  UNIQUE KEY nombre (nombre),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_proy_subproy`
--

CREATE TABLE IF NOT EXISTS `area_proy_subproy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proy_subproy` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio_estimada` date NOT NULL,
  `fecha_fin_estimada` date NOT NULL,
  `fecha_inicio_real` date NOT NULL,
  `fecha_fin_real` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon_correos`
--

CREATE TABLE IF NOT EXISTS `buzon_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE IF NOT EXISTS `correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_buzon_correo` int(11) NOT NULL,
  `Asunto` varchar(40) NOT NULL,
  `texto` text NOT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT '0000-00-00',
  `id_buzon_correo_env` int(11) NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `borrado_rec` tinyint(1) NOT NULL,
  `borrado_env` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fases`
--

CREATE TABLE IF NOT EXISTS `fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_area_proy_subproy` int(11) NOT NULL,
  `nombre_fase` varchar(50) NOT NULL,
  `fecha_inicio_estimada` date NOT NULL,
  `fecha_fin_estimada` date NOT NULL,
  `fecha_inicio_real` date DEFAULT NULL,
  `fecha_fin_real` date DEFAULT NULL,
  `comenzada` tinyint(1) DEFAULT NULL,
  `finalizada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infocorp`
--

CREATE TABLE IF NOT EXISTS `infocorp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_noticia` varchar(70) NOT NULL,
  `texto` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(30) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_jefe` int(11) NOT NULL,
  `fecha_inicio_estimada` date NOT NULL,
  `fecha_fin_estimada` date NOT NULL,
  `fecha_inicio_real` date DEFAULT NULL,
  `fecha_fin_real` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proy_subproy`
--

CREATE TABLE IF NOT EXISTS `proy_subproy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `id_subproyecto` int(11) NOT NULL,
  `id_jefe` int(11) NOT NULL,
  `fecha_inicio_estimada` date NOT NULL,
  `fecha_fin_estimada` date NOT NULL,
  `fecha_inicio_real` date NOT NULL,
  `fecha_fin_real` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext NOT NULL,
  `maxplayers` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subproyecto`
--

CREATE TABLE IF NOT EXISTS `subproyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) NOT NULL,
  `p_usuarios` tinyint(1) NOT NULL,
  `p_proyectos` tinyint(1) NOT NULL,
  `p_chat` tinyint(1) NOT NULL,
  `p_buzon` tinyint(1) NOT NULL,
  `p_lnoticias` tinyint(1) NOT NULL,
  `p_enoticias` tinyint(1) NOT NULL,
  `p_infocorp` tinyint(1) NOT NULL,
  `p_editinfocorp` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userschat`
--

CREATE TABLE IF NOT EXISTS `userschat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `conectado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsalafk` (`idsala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `telefono_movil` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nick` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_ult_actividad` timestamp NULL DEFAULT NULL,
  `foto` blob,
  `bolLogged` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `email`(`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros
--

ALTER TABLE usuarios
	ADD CONSTRAINT usu_tipo_permiso_FK FOREIGN KEY (tipo_usuario) REFERENCES tipo_usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE proyectos
	ADD CONSTRAINT proy_id_admin_FK FOREIGN KEY (id_admin) REFERENCES usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE proyectos
	ADD CONSTRAINT proy_id_cliente_FK FOREIGN KEY (id_cliente) REFERENCES usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE proyectos
	ADD CONSTRAINT proy_id_jefe_FK FOREIGN KEY (id_jefe) REFERENCES usuarios (id) ON DELETE CASCADE;

ALTER TABLE proy_subproy
	ADD CONSTRAINT proysubproy_id_jefe_FK FOREIGN KEY (id_jefe) REFERENCES usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE proy_subproy
	ADD CONSTRAINT proysubproy_id_proyecto_FK FOREIGN KEY (id_proyecto) REFERENCES proyectos (id) ON DELETE CASCADE;
	
ALTER TABLE proy_subproy
	ADD CONSTRAINT proysubproy_id_subproyecto_FK FOREIGN KEY (id_subproyecto) REFERENCES subproyecto (id) ON DELETE CASCADE;

ALTER TABLE area_proy_subproy
	ADD CONSTRAINT areaproysubproy_id_usuario_FK FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE area_proy_subproy
	ADD CONSTRAINT areaproysubproy_id_area_FK FOREIGN KEY (id_area) REFERENCES areas (id) ON DELETE CASCADE;
	
ALTER TABLE area_proy_subproy
	ADD CONSTRAINT areaproysubproy_id_proysubproyecto_FK FOREIGN KEY (id_proy_subproy) REFERENCES proy_subproy (id) ON DELETE CASCADE;
	
ALTER TABLE fases
	ADD CONSTRAINT fases_id_areaproysubproy_FK FOREIGN KEY (id_area_proy_subproy) REFERENCES area_proy_subproy(id) ON DELETE CASCADE;

ALTER TABLE archivos_fases
	ADD CONSTRAINT archivos_fases_id_fase_FK FOREIGN KEY (id_fase) REFERENCES fases (id) ON DELETE CASCADE;
	
ALTER TABLE agenda
	ADD CONSTRAINT age_id_user_FK FOREIGN KEY (id_user) REFERENCES usuarios (id) ON DELETE CASCADE;
	
ALTER TABLE notificaciones
	ADD CONSTRAINT notificaciones_id_proyecto_FK FOREIGN KEY (id_proyecto) REFERENCES proyectos (id) ON DELETE CASCADE;

ALTER TABLE `userschat`
	ADD CONSTRAINT `idsalafk` FOREIGN KEY (`idsala`) REFERENCES `salas` (`id`) ON DELETE CASCADE;
	
ALTER TABLE `userschat`
	ADD CONSTRAINT `iduserfk` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

ALTER TABLE buzon_correos 
	ADD CONSTRAINT buz_iduser_FK FOREIGN KEY(id_user) REFERENCES usuarios (id) ON DELETE CASCADE;

ALTER TABLE `correos`
	ADD CONSTRAINT `cor_id_buzon_correo_FK` FOREIGN KEY (`id_buzon_correo`) REFERENCES `buzon_correos` (`id`) ON DELETE CASCADE;
	
ALTER TABLE `archivos_correos`
	ADD CONSTRAINT `arch_cor_idcorreo_FK` FOREIGN KEY (`id_correo`) REFERENCES `correos` (`id`) ON DELETE CASCADE;

--
-- Inserts
--

INSERT INTO tipo_usuarios VALUES ('1','administrador',1,1,1,1,1,1,1,1);
INSERT INTO tipo_usuarios VALUES ('2','cliente',0,0,0,1,1,0,0,0);

INSERT INTO usuarios VALUES('1',1,'admin','admin','admin','admin','admin','admin','admin',SHA1('admin'),NOW(),NULL,NULL,0);

INSERT INTO buzon_correos VALUES('1',1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
