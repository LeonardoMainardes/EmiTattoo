-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Nov-2021 às 21:06
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `emitattoo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `data` datetime NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `login`, `senha`) VALUES
(1, 'emitattoo', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_has_fotos`
--

DROP TABLE IF EXISTS `usuario_has_fotos`;
CREATE TABLE IF NOT EXISTS `usuario_has_fotos` (
  `usuario_cod` int NOT NULL,
  `fotos_cod` int NOT NULL,
  PRIMARY KEY (`usuario_cod`,`fotos_cod`),
  KEY `fk_usuario_has_fotos_fotos1_idx` (`fotos_cod`),
  KEY `fk_usuario_has_fotos_usuario_idx` (`usuario_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuario_has_fotos`
--
ALTER TABLE `usuario_has_fotos`
  ADD CONSTRAINT `fk_usuario_has_fotos_fotos1` FOREIGN KEY (`fotos_cod`) REFERENCES `fotos` (`cod`),
  ADD CONSTRAINT `fk_usuario_has_fotos_usuario` FOREIGN KEY (`usuario_cod`) REFERENCES `usuario` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
