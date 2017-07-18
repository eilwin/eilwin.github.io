-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 04:04:31
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `et` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `et`;

CREATE TABLE IF NOT EXISTS `cliente` (
  `rut` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_incorporacion` DATETIME NOT NULL,
  `tipo_persona` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `abogado` (
  `rut` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_contratacion` DATETIME NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `valor_hora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `atencion` (
  `id` int(11) NOT NULL,
  `fecha_atencion` DATETIME NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `id_abogado` int(8) NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `permisos`(
  `id_cliente` int(11) NOT NULL,
  `permiso` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut`);
ALTER TABLE `abogado`
  ADD PRIMARY KEY (`rut`);
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_cliente`);

ALTER TABLE `atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
