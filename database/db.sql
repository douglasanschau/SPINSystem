-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2022 às 18:00
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uniasselvi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `activity` char(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `activity_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `activities`
--

INSERT INTO `activities` (`id`, `id_company`, `id_user`, `activity`, `description`, `activity_date`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:37:00', '2022-02-05 11:37:00'),
(2, 1, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:38:55', '2022-02-05 11:38:55'),
(3, 1, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:38:55', '2022-02-05 11:38:55'),
(4, 1, 8, 'D', NULL, '2022-03-01', '2022-02-05 11:38:55', '2022-02-05 11:38:55'),
(5, 1, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:38:55', '2022-02-05 11:38:55'),
(6, 1, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:38:55', '2022-02-05 11:38:55'),
(7, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(8, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(9, 2, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(10, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(11, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(12, 2, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(13, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(14, 2, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(15, 2, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(16, 2, 10, 'P', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(17, 2, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(18, 2, 10, 'P', NULL, '2022-03-01', '2022-02-05 11:41:32', '2022-02-05 11:41:32'),
(19, 3, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(20, 3, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(21, 3, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(22, 3, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(23, 3, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(24, 3, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:43:21', '2022-02-05 11:43:21'),
(25, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(26, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(27, 4, 9, 'D', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(28, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(29, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(30, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(31, 4, 9, 'E', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(32, 4, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:44:42', '2022-02-05 11:44:42'),
(33, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(34, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(35, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(36, 5, 9, 'D', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(37, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(38, 5, 9, 'E', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(39, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(40, 5, 9, 'D', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(41, 5, 9, 'C', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(42, 5, 9, 'E', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(43, 5, 9, 'E', NULL, '2022-03-01', '2022-02-05 11:48:05', '2022-02-05 11:48:05'),
(44, 6, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(45, 6, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(46, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(47, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(48, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(49, 6, 8, 'D', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(50, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(51, 6, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(52, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(53, 6, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(54, 6, 8, 'P', NULL, '2022-03-01', '2022-02-05 11:49:21', '2022-02-05 11:49:21'),
(55, 7, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(56, 7, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(57, 7, 11, 'D', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(58, 7, 11, 'E', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(59, 7, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(60, 7, 11, 'D', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(61, 7, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:50:17', '2022-02-05 11:50:17'),
(62, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(63, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(64, 8, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(65, 8, 8, 'D', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(66, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(67, 8, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(68, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(69, 8, 8, 'D', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(70, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(71, 8, 8, 'C', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(72, 8, 8, 'P', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(73, 8, 8, 'E', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(74, 8, 8, 'P', NULL, '2022-03-01', '2022-02-05 11:51:10', '2022-02-05 11:51:10'),
(75, 9, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(76, 9, 11, 'D', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(77, 9, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(78, 9, 11, 'C', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(79, 9, 11, 'E', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(80, 9, 11, 'P', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(81, 9, 11, 'P', NULL, '2022-03-01', '2022-02-05 11:52:18', '2022-02-05 11:52:18'),
(82, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(83, 10, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(84, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(85, 10, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(86, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(87, 10, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:53:00', '2022-02-05 11:53:00'),
(88, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(89, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(90, 10, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(91, 10, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(92, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(93, 10, 10, 'D', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(94, 10, 10, 'C', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(95, 10, 10, 'E', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(96, 10, 10, 'P', NULL, '2022-03-01', '2022-02-05 11:53:30', '2022-02-05 11:53:30'),
(97, 34, 7, 'C', 'Ligar para Márcia, interesse na compra de 10 computadores DELL.', '2022-03-01', '2022-03-01 18:09:28', '2022-03-01 18:09:28'),
(98, 34, 7, 'D', 'Demonstração realizada com márcia e francisco dos novos modelos DELL.', '2022-03-01', '2022-03-01 21:26:28', '2022-03-01 21:26:28'),
(99, 34, 7, 'E', 'E-mail de orçamento enviado após demonstração.', '2022-03-01', '2022-03-01 21:27:26', '2022-03-01 21:27:26'),
(100, 34, 7, 'P', 'Primeiro pós venda de produto realizado com Francisco, que está realizado com a compra.', '2022-03-01', '2022-03-01 21:28:07', '2022-03-01 21:28:07'),
(105, 34, NULL, 'P', 'Pós venda com Julio ', '2022-03-25', '2022-03-12 22:03:09', '2022-03-12 22:03:09'),
(113, 34, 7, 'C', 'Ligação para Carina, a respeito das necessidades de ajuste. ', '2022-03-26', '2022-03-12 22:24:12', '2022-03-12 22:24:12'),
(133, 34, 7, 'D', 'Demonstração com Sérgio e Cristiano.', '2022-03-16', '2022-03-12 23:02:31', '2022-03-12 23:02:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `trade_name` varchar(255) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `stage` varchar(2) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `client` tinyint(1) DEFAULT 0,
  `lost` tinyint(1) DEFAULT 0,
  `closure_date` date DEFAULT NULL,
  `loss_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT curtime(),
  `updated_at` datetime DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `business`
--

INSERT INTO `business` (`id`, `id_company`, `id_user`, `company`, `cnpj`, `trade_name`, `value`, `stage`, `contact`, `email`, `phone`, `client`, `lost`, `closure_date`, `loss_date`, `created_at`, `updated_at`) VALUES
(1, 34, 8, 'Americanas', NULL, NULL, NULL, 'F', 'João', 'joao@americanas.com.br', '(11) 3412-1687', 0, 0, NULL, NULL, '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(2, 34, 10, 'Riachuelo', NULL, NULL, NULL, 'F', 'Alex', 'alex@riachuelo.com.br', '(21) 3319-6784', 1, 0, '2022-02-05', NULL, '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(3, 34, 10, 'Uniasselvi', NULL, NULL, NULL, 'F', 'Sérgio', 'sergio@uniasselvi.com', '(19) 99816-1452', 0, 1, NULL, '2022-02-05', '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(4, 34, 9, 'Madeiro', NULL, NULL, 0, 'F', 'Gisele', 'gisele@madeiro.com.br', '(51) 3918-1526', 0, 1, NULL, '2022-02-05', '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(5, 34, 9, 'Netflix', NULL, NULL, 5000, 'F', 'Lucas', 'lucas@netflix.com', '(81) 3718-9633', 0, 0, NULL, NULL, '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(6, 34, 8, 'Zaffari', NULL, NULL, NULL, 'F', 'Gilberto', 'gilberto@zafari.com.br', '(71) 97152-1569', 1, 0, '2022-02-05', NULL, '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(7, 34, 11, 'Spotify', NULL, NULL, NULL, 'F', 'Mauricio', 'mauricio@spotify.com.br', '(71) 3589-1568', 0, 0, NULL, NULL, '2022-02-05 11:24:19', '2022-02-05 11:24:19'),
(8, 34, 8, 'Consul', NULL, NULL, NULL, 'F', 'Fernando', 'fernando@consul.com.br', '(11) 3678-1458', 1, 0, '2022-02-05', NULL, '2022-02-05 11:30:34', '2022-02-05 11:30:34'),
(9, 34, 11, 'Submarino', NULL, NULL, NULL, 'F', 'Morgana', 'morgana@submarino.com', '(21) 96854-1557', 1, 0, '2022-02-05', NULL, '2022-02-05 11:30:34', '2022-02-05 11:30:34'),
(10, 34, 10, 'Saraiva', NULL, NULL, NULL, 'F', 'Euclides', 'euclides@saraiva.com', '(11) 3418-2147', 0, 0, NULL, NULL, '2022-02-05 11:30:34', '2022-02-05 11:30:34'),
(11, 34, 10, 'Globo', NULL, NULL, NULL, 'F', 'Elisa', 'elisa@globo.com', '(11) 9814-5147', 1, 0, '2022-02-05', NULL, '2022-02-05 11:30:34', '2022-02-05 11:30:34'),
(12, 34, 7, 'TESTE', NULL, NULL, NULL, 'F', 'Márcia', 'marcia@teste.com', '(11) 3527-9966', 0, 0, NULL, NULL, '2022-02-27 02:04:54', '2022-02-27 02:04:54'),
(13, 34, 7, 'nEW', NULL, NULL, NULL, 'P', 'eDU', 'EDUARDO@TESTE.COM', '(51)99859-6978', 0, 0, NULL, NULL, '2022-02-27 02:12:29', '2022-02-27 02:12:29'),
(14, 34, 7, 'Ipê', NULL, NULL, NULL, 'F', 'Fernando Carvalho ', 'fernando@ipe.com.br', '(5198758-2963)', 0, 0, NULL, NULL, '2022-02-27 02:16:21', '2022-02-27 02:16:21'),
(15, 34, 7, 'Globo', NULL, NULL, NULL, 'FE', 'Ivan Morales', 'ivan@globo.com.br', '(31) 3217-1459', 0, 0, NULL, NULL, '2022-02-27 02:34:14', '2022-02-27 02:34:14'),
(33, 34, 7, 'Banrisul', NULL, NULL, NULL, 'P', 'Luis Martins', 'luismartins@banrisul.com.br', '', 0, 0, NULL, NULL, '2022-02-27 21:50:33', '2022-02-27 21:50:33'),
(34, 34, 7, 'Banrisul Ltda', '31.491.401/0001-15', 'Banrisul', 1500, 'F', 'Luis Martins', 'luismartins@banrisul.com.br', '', 0, 0, NULL, NULL, '2022-02-27 21:51:09', '2022-02-27 21:51:09'),
(35, 34, 7, 'Banrisul', NULL, NULL, NULL, 'F', 'Luis Martins', 'luismartins@banrisul.com.br', '(11) 52789-635', 0, 0, NULL, NULL, '2022-02-27 22:08:03', '2022-02-27 22:08:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `business_products`
--

CREATE TABLE `business_products` (
  `id` int(11) NOT NULL,
  `id_business` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `business_products`
--

INSERT INTO `business_products` (`id`, `id_business`, `id_product`, `value`, `quantity`, `created_at`, `updated_at`) VALUES
(78, 34, 2, 1000, 5, '2022-03-18 22:34:56', '2022-03-18 22:34:56'),
(83, 34, 13, 500, 5, '2022-03-18 22:36:59', '2022-03-18 22:36:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT curtime(),
  `updated_at` datetime DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `name`, `user`, `email`, `password`, `created_at`, `updated_at`) VALUES
(33, 'Menvie ', 'Douglas A Flores', 'douglas@menvie.com', 'd9b1d7db4cd6e70935368a1efb10e377', '2022-02-05 10:40:46', '2022-02-05 10:40:46'),
(34, 'Bourbon ', 'Augusto Mendes', 'augusto@bourbon.com', '123', '2022-02-05 10:42:26', '2022-02-05 10:42:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `action` char(1) DEFAULT NULL COMMENT 'A - Alterou / C - Cadastrou / E- Excluiu ',
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `id_user`, `action`, `description`, `created_at`, `updated_at`) VALUES
(11, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:26:58', '2022-02-13 00:26:58'),
(12, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:29:12', '2022-02-13 00:29:12'),
(13, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:29:28', '2022-02-13 00:29:28'),
(14, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:29:36', '2022-02-13 00:29:36'),
(15, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:29:43', '2022-02-13 00:29:43'),
(16, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:30:09', '2022-02-13 00:30:09'),
(17, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:30:22', '2022-02-13 00:30:22'),
(18, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:30:32', '2022-02-13 00:30:32'),
(19, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:30:36', '2022-02-13 00:30:36'),
(20, NULL, 'A', ' alterou o cadastro', '2022-02-13 00:54:34', '2022-02-13 00:54:34'),
(21, NULL, 'A', ' alterou o cadastro', '2022-02-13 00:54:58', '2022-02-13 00:54:58'),
(22, NULL, 'A', ' alterou o cadastro', '2022-02-13 00:55:10', '2022-02-13 00:55:10'),
(23, 0, 'A', ' alterou o cadastro', '2022-02-13 00:55:24', '2022-02-13 00:55:24'),
(24, 0, 'A', ' alterou o cadastro', '2022-02-13 00:55:41', '2022-02-13 00:55:41'),
(25, 7, 'A', 'Augusto Mendes alterou o cadastro de Augusto Mendes', '2022-02-13 00:56:38', '2022-02-13 00:56:38'),
(26, 7, 'A', 'Augusto Mendes alterou o cadastro de Augusto Mendes', '2022-02-13 00:57:04', '2022-02-13 00:57:04'),
(27, 9, 'A', 'Augusto Mendes alterou o cadastro de Alice  Monteiro', '2022-02-13 00:57:13', '2022-02-13 00:57:13'),
(28, 10, 'A', 'Augusto Mendes editou o cadastro de Matheus Borba', '2022-02-13 00:58:29', '2022-02-13 00:58:29'),
(29, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 00:58:56', '2022-02-13 00:58:56'),
(30, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 01:00:01', '2022-02-13 01:00:01'),
(31, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 16:38:23', '2022-02-13 16:38:23'),
(32, 7, 'A', 'Augusto Mendes alterou sua foto de perfil.', '2022-02-13 16:38:27', '2022-02-13 16:38:27'),
(33, 7, 'A', 'Augusto%20Mendes alterou suas informações de cadastro.', '2022-02-13 17:46:45', '2022-02-13 17:46:45'),
(34, 7, 'A', 'Augusto%20Mendes alterou suas informações de cadastro.', '2022-02-13 17:47:29', '2022-02-13 17:47:29'),
(35, 7, 'A', 'Augusto20Mendes alterou suas informações de cadastro.', '2022-02-13 17:52:56', '2022-02-13 17:52:56'),
(36, 7, 'A', 'Augusto20Mendes20Garcia alterou suas informações de cadastro.', '2022-02-13 17:53:58', '2022-02-13 17:53:58'),
(37, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 17:54:45', '2022-02-13 17:54:45'),
(38, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 17:56:08', '2022-02-13 17:56:08'),
(39, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 17:59:13', '2022-02-13 17:59:13'),
(40, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 18:00:21', '2022-02-13 18:00:21'),
(41, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 18:00:30', '2022-02-13 18:00:30'),
(42, 7, 'A', 'Augusto Mendes Garcia alterou suas informações de cadastro.', '2022-02-13 18:01:08', '2022-02-13 18:01:08'),
(43, 12, 'A', 'Augusto Mendes Garcia editou o cadastro de Márcio', '2022-02-13 22:11:01', '2022-02-13 22:11:01'),
(44, 7, 'C', 'Augusto Mendes Garcia cadastrou na base Leonardo Farias.', '2022-02-13 22:23:41', '2022-02-13 22:23:41'),
(45, 7, 'A', 'Augusto Mendes Garcia editou o cadastro de Leonardo Farias', '2022-02-13 22:26:27', '2022-02-13 22:26:27'),
(46, 7, 'C', 'Augusto Mendes Garcia cadastrou na base Mariana.', '2022-02-13 22:29:47', '2022-02-13 22:29:47'),
(47, 7, 'C', 'Augusto Mendes Garcia cadastrou na base Jessi.', '2022-02-13 22:30:38', '2022-02-13 22:30:38'),
(48, 15, 'A', 'O perfil de Mariana foi desativado por Augusto Mendes Garcia', '2022-02-13 23:13:13', '2022-02-13 23:13:13'),
(49, 15, 'A', 'O perfil de Mariana foi desativado por Augusto Mendes Garcia', '2022-02-13 23:13:55', '2022-02-13 23:13:55'),
(50, 15, 'A', 'O perfil de Mariana foi desativado por Augusto Mendes Garcia', '2022-02-13 23:14:23', '2022-02-13 23:14:23'),
(51, 16, 'A', 'O perfil de Jessi foi desativado por Augusto Mendes Garcia', '2022-02-13 23:14:28', '2022-02-13 23:14:28'),
(52, 15, 'A', 'O perfil de Mariana foi reativado por Augusto Mendes Garcia', '2022-02-13 23:15:00', '2022-02-13 23:15:00'),
(53, 16, 'A', 'O perfil de Jessi foi reativado por Augusto Mendes Garcia', '2022-02-13 23:15:10', '2022-02-13 23:15:10'),
(54, 14, 'A', 'O perfil de Leonardo Farias foi desativado por Augusto Mendes Garcia', '2022-02-13 23:15:13', '2022-02-13 23:15:13'),
(55, 13, 'A', 'O perfil de Alberto  foi desativado por Augusto Mendes Garcia', '2022-02-13 23:15:17', '2022-02-13 23:15:17'),
(56, 16, 'A', 'O perfil de Jessi foi desativado por Augusto Mendes Garcia', '2022-02-13 23:15:22', '2022-02-13 23:15:22'),
(57, 7, 'A', 'Augusto Mendes Garcia alterou sua foto de perfil.', '2022-02-13 23:16:02', '2022-02-13 23:16:02'),
(58, 15, 'A', 'O perfil de Mariana foi desativado por Augusto Mendes Garcia', '2022-02-13 23:18:44', '2022-02-13 23:18:44'),
(59, 12, 'A', 'O perfil de Márcio foi desativado por Augusto Mendes Garcia', '2022-02-13 23:18:49', '2022-02-13 23:18:49'),
(60, 7, 'A', 'Augusto Mendes Garcia alterou sua foto de perfil.', '2022-02-20 01:13:09', '2022-02-20 01:13:09'),
(61, 7, 'A', 'Augusto Mendes Garcia alterou sua foto de perfil.', '2022-02-20 01:13:17', '2022-02-20 01:13:17'),
(62, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:33:41', '2022-02-27 21:33:41'),
(63, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:37:13', '2022-02-27 21:37:13'),
(64, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:38:45', '2022-02-27 21:38:45'),
(65, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:42:28', '2022-02-27 21:42:28'),
(66, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:42:34', '2022-02-27 21:42:34'),
(67, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:47:58', '2022-02-27 21:47:58'),
(68, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:48:18', '2022-02-27 21:48:18'),
(69, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:48:51', '2022-02-27 21:48:51'),
(70, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:50:33', '2022-02-27 21:50:33'),
(71, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 21:51:09', '2022-02-27 21:51:09'),
(72, 7, 'C', 'Augusto Mendes Garcia cadastrou a empresa Banrisul', '2022-02-27 22:08:04', '2022-02-27 22:08:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `value` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `id_company`, `name`, `description`, `value`, `status`, `created_at`, `updated_at`) VALUES
(2, 34, 'Film', 'Films Lord Of The Rings', 200, 1, '2022-02-19 00:24:31', '2022-02-19 00:24:31'),
(12, 34, 'Books', 'books written by G.R.R Martin', 50, 1, '2022-02-20 19:16:15', '2022-02-20 19:16:15'),
(13, 34, 'TV', 'TV Guide', 100, 1, '2022-02-20 19:21:36', '2022-02-20 19:21:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT 0,
  `inactive` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `id_company`, `name`, `email`, `cpf`, `password`, `photo`, `phone`, `admin`, `inactive`, `created_at`, `updated_at`) VALUES
(6, 33, 'Douglas ', 'douglas@menvie.com', '', '', NULL, '(51)%2098162-14', 1, 0, '2022-02-05 10:40:47', '2022-02-05 10:40:47'),
(7, 34, 'Augusto Mendes Garcia', 'augusto@bourbon.com', '345.182.369-84', '123', 'photos/jao.jpg', '(11) 3498-1658', 1, 0, '2022-02-05 10:42:26', '2022-02-05 10:42:26'),
(8, 34, 'Pedro Augusto', 'pedroaugusto@bourbon.com', '', '', 'photos/daniel.jpg', '(51)%2098162-14', 0, 0, '2022-02-05 10:44:47', '2022-02-05 10:44:47'),
(9, 34, 'Alice Monteiro', 'alice@bourbon.com', '', '', 'photos/emma.jpg', '(51)%2098162-14', 0, 0, '2022-02-05 10:45:11', '2022-02-05 10:45:11'),
(10, 34, 'Gustavo Borba', 'gustavoborba@bourbon.com', '', '', NULL, '(51)%2098162-14', 0, 0, '2022-02-05 10:45:27', '2022-02-05 10:45:27'),
(11, 34, 'Matheus Fernandes', 'matheusfernandes@bourbon.com', '', '', NULL, '(51)%2098162-14', 0, 0, '2022-02-05 10:45:43', '2022-02-05 10:45:43'),
(12, 34, 'Márcio', 'marciopereira@bourbon.com', NULL, '7f1de29e6da19d22b51c68001e7e0e54', NULL, NULL, 0, 1, '2022-02-13 22:10:18', '2022-02-13 22:10:18'),
(13, 34, 'Alberto ', 'albertoaraujo@bourbon.com', NULL, '9b1c93a6864c39e48417ee486b83c387', NULL, NULL, 1, 1, '2022-02-13 22:17:30', '2022-02-13 22:17:30'),
(14, 34, 'Leonardo Farias', 'leonardof@bourbon.com', NULL, '21ca6d0cf2f25c4dbb35d8dc0b679c3f', NULL, NULL, 0, 1, '2022-02-13 22:23:41', '2022-02-13 22:23:41'),
(15, 34, 'Mariana', 'marianalime@bourbon.com', NULL, '2c8eff687fe094e24be91e72a45ff884', NULL, NULL, 0, 1, '2022-02-13 22:29:47', '2022-02-13 22:29:47'),
(16, 34, 'Jessi', 'jessisoareas@bourbon.com', NULL, '4c03f769f791d9f1148f3b1e59090473', NULL, NULL, 0, 1, '2022-02-13 22:30:38', '2022-02-13 22:30:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `business_products`
--
ALTER TABLE `business_products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de tabela `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `business_products`
--
ALTER TABLE `business_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
