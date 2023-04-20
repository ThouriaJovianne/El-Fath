-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 00:31
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Ashbal el fath`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_firstname` varchar(127) NOT NULL,
  `admin_lastname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `admin_firstname`, `admin_lastname`) VALUES
(1, 'manel', '$2y$10$k7pY2OKrAbYETcnrarm9TOJGt7GuerGRQpOZ6ct0.bfZL0NYcptti', 'kara', 'manel');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `student_id` int(50) NOT NULL,
  `student_firstname` text NOT NULL,
  `student_lastname` text NOT NULL,
  `student_permission` tinyint(1) NOT NULL,
  `student_enrollment` int(5) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_level` varchar(50) NOT NULL,
  `student_healthstatus` text NOT NULL,
  `student_address` varchar(50) NOT NULL,
  `student_parentname` text NOT NULL,
  `student_parentrelation` text NOT NULL,
  `student_parentjob` text NOT NULL,
  `student_phone1` int(10) DEFAULT NULL,
  `student_phone2` int(10) DEFAULT NULL,
  `student_familymembers` int(3) NOT NULL,
  `student_familyworkers` int(3) NOT NULL,
  `student_familyscholars` int(11) NOT NULL,
  `student_remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(50) NOT NULL,
  `teacher_firstname` text NOT NULL,
  `teacher_lastname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `teacher_address` varchar(50) NOT NULL,
  `teacher_job` text NOT NULL,
  `teacher_phone1` int(10) DEFAULT NULL,
  `teacher_phone2` int(10) DEFAULT NULL,
  `teacher_remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_firstname`, `teacher_lastname`, `username`, `password`, `teacher_address`, `teacher_job`, `teacher_phone1`, `teacher_phone2`, `teacher_remark`) VALUES
(2, 'رياض', 'علي أوصالح', 'رياض علي أوصالح', 30815, '10 شارع طالب عبد الرحمان', 'عامل', 561980546, 666503308, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
