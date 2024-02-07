-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2024 at 12:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `num_ch` int NOT NULL,
  `num_offre` int NOT NULL,
  `date_application` date DEFAULT NULL,
  `lettre_motivation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`num_ch`, `num_offre`, `date_application`, `lettre_motivation`) VALUES
(7, 19, '2024-01-30', 'je suis interesse par cette offre d\'emploi.');

-- --------------------------------------------------------

--
-- Table structure for table `chercheuremploi`
--

CREATE TABLE `chercheuremploi` (
  `num_chercheur` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `numero_tel` int NOT NULL,
  `cv` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chercheuremploi`
--

INSERT INTO `chercheuremploi` (`num_chercheur`, `email`, `nom`, `prenom`, `numero_tel`, `cv`, `password`) VALUES
(6, 'test@gmail.com', 'test', 'test', 12345678, '\\uploads\\cvs\\659aefe9b47b30.86149094.pdf', '$2y$10$7QItwyxG7hnqwk3Mn74vX.uLWhAPJIFigBUpbY96cH0sY7Gh1wq2G'),
(7, 'ghodbanemohammedhani@gmail.com', 'Ghodbane', 'Mohammed Hani', 72212340, '\\uploads\\cvs\\65b4442f3a12e7.15930404.pdf', '$2y$10$nmG6bfwWIj5qvtqM9COggOw8DeiZSxMMRjSF7inaFq9GEGueQp6uS');

-- --------------------------------------------------------

--
-- Table structure for table `domaine`
--

CREATE TABLE `domaine` (
  `num_domaine` int NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `domaine`
--

INSERT INTO `domaine` (`num_domaine`, `nom`) VALUES
(1, 'informatique'),
(2, 'comptabilite et finance'),
(3, 'marketing et communication'),
(4, 'Ingenierie'),
(5, 'Medical et sante'),
(6, 'Journaliste');

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

CREATE TABLE `enterprise` (
  `num_en` int NOT NULL,
  `email_en` varchar(100) NOT NULL,
  `nom_en` varchar(100) NOT NULL,
  `numero_tel` int NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `logo_en` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`num_en`, `email_en`, `nom_en`, `numero_tel`, `adresse`, `logo_en`, `password`) VALUES
(19, 'yassir@gmail.com', 'Yassir', 12345678, 'Alger,Algerie', '\\uploads\\logos\\659aeada320c87.28901177.png', '$2y$10$fKDS6H81Td.tzzU3OvoX4eXsOQpwcjnpIyWkRf1cuNXwGtLhWjTk6'),
(20, 'sonatrack@gmail.com', 'Sonatrack', 12345678, 'Annaba,Algerie', '\\uploads\\logos\\65b8c95241d2f8.56358669.png', '$2y$10$iDN3fWB8BOfGssRVhQ4atuY8tba2S7u9pMzGLSORVZONz8esVj4Hq'),
(21, 'Huwawi@gmail.com', 'Huwawi', 12345678, 'Alger,Algerie', '\\uploads\\logos\\65b8cbd6394ce0.41861946.jpg', '$2y$10$OmJJOORevUj9Vkyhp8jP.eHKSKz8I0ZMN/v/xDPgSaAGkZ1pIqWTW'),
(22, 'BoostITTech@gmail.com', 'Boost IT Tech', 12345678, 'Constantine,Algerie', '\\uploads\\logos\\65b8cd63bc2985.74672544.png', '$2y$10$lNh7mQu4aNSoT3OWIA2ms.Y0jEAkmaXEfclLAbywAhHObejKZmX3i'),
(23, 'Sadeem@gmail.com', 'Sadeem informatique', 12345678, 'Alger, Algerie', '\\uploads\\logos\\65b8ef427a6126.95839354.png', '$2y$10$m1/ysSzUMl.xiC6MKlFnI.H05bYDW0e7EaqNZfjB27yUJHC63rl5u');

-- --------------------------------------------------------

--
-- Table structure for table `offreemploi`
--

CREATE TABLE `offreemploi` (
  `num_offre` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `datepublication` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anneexperience` int NOT NULL,
  `num_domaine` int NOT NULL,
  `num_enterprise` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offreemploi`
--

INSERT INTO `offreemploi` (`num_offre`, `titre`, `datepublication`, `description`, `anneexperience`, `num_domaine`, `num_enterprise`) VALUES
(19, 'Adminstrateur Base de donne', '2024-01-30', 'On chercher ingenieur en informatique qui maitraise MYSQL,Oracle, MongoDB et tous les types des base de donnees ', 5, 1, 20),
(20, 'Ingenieur Genie Civil', '2024-01-30', 'Ingenieur avec un diplome dans Genie civil et premier experiance au minimum', 1, 4, 20),
(21, 'Develpeur Mobile', '2024-01-30', 'Developeur Mobile qui maitraise Flutter et passion par le developement des applications Android et IOS', 5, 1, 21),
(22, 'Ingenieur Mecanique', '2024-01-30', 'On chercher un ingenieur avec un diplome universitaire Bac+5 avec minimum de 3 annes experiance', 3, 4, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`num_ch`,`num_offre`),
  ADD KEY `num_offre` (`num_offre`);

--
-- Indexes for table `chercheuremploi`
--
ALTER TABLE `chercheuremploi`
  ADD PRIMARY KEY (`num_chercheur`);

--
-- Indexes for table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`num_domaine`);

--
-- Indexes for table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`num_en`);

--
-- Indexes for table `offreemploi`
--
ALTER TABLE `offreemploi`
  ADD PRIMARY KEY (`num_offre`),
  ADD KEY `num_domaine` (`num_domaine`),
  ADD KEY `num_enterprise` (`num_enterprise`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chercheuremploi`
--
ALTER TABLE `chercheuremploi`
  MODIFY `num_chercheur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `num_domaine` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `num_en` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `offreemploi`
--
ALTER TABLE `offreemploi`
  MODIFY `num_offre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`num_ch`) REFERENCES `chercheuremploi` (`num_chercheur`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`num_offre`) REFERENCES `offreemploi` (`num_offre`);

--
-- Constraints for table `offreemploi`
--
ALTER TABLE `offreemploi`
  ADD CONSTRAINT `offreemploi_ibfk_1` FOREIGN KEY (`num_domaine`) REFERENCES `domaine` (`num_domaine`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `offreemploi_ibfk_2` FOREIGN KEY (`num_enterprise`) REFERENCES `enterprise` (`num_en`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
