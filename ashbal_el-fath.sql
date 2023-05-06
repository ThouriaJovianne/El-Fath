-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 mai 2023 à 18:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ashbal_el-fath`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@edoc.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `appoid` int(11) NOT NULL,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2022-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `class_id` int(20) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `class_scholaryear` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_scholaryear`) VALUES
(1, 'قسم 1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `educationallevel`
--

CREATE TABLE `educationallevel` (
  `educationallevel_id` int(10) NOT NULL,
  `educationallevel_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `educationallevel`
--

INSERT INTO `educationallevel` (`educationallevel_id`, `educationallevel_name`) VALUES
(1, 'الطور الابتدائي'),
(2, 'الطور المتوسط'),
(3, 'الطور الثانوي'),
(4, 'الطور الجامعي'),
(5, 'طور العمال');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `student_id` int(50) NOT NULL,
  `surah_id` int(5) NOT NULL,
  `lastaya` int(5) NOT NULL,
  `evaluation_mark` int(2) NOT NULL,
  `evaluation_kind` char(1) NOT NULL,
  `evaluation_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(20) NOT NULL,
  `job_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`) VALUES
(1, 'موظف'),
(2, 'بطال'),
(3, 'رجل أعمال');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(1, '1', 'Test Session', '2050-01-01', '18:00:00', 50),
(2, '1', '1', '2022-06-10', '20:36:00', 1),
(3, '1', '12', '2022-06-10', '20:33:00', 1),
(4, '1', '1', '2022-06-10', '12:32:00', 1),
(5, '1', '1', '2022-06-10', '20:35:00', 1),
(6, '1', '12', '2022-06-10', '20:35:00', 1),
(7, '1', '1', '2022-06-24', '20:36:00', 1),
(8, '1', '12', '2022-06-10', '13:33:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `scholaryear`
--

CREATE TABLE `scholaryear` (
  `scholaryear_id` int(20) NOT NULL,
  `scholaryear_name` varchar(20) NOT NULL,
  `scholaryear_educationallevel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `scholaryear`
--

INSERT INTO `scholaryear` (`scholaryear_id`, `scholaryear_name`, `scholaryear_educationallevel`) VALUES
(1, 'السنة الأولى', 1),
(2, 'السنة الثانية', 1),
(3, 'السنة الثالثة', 1),
(4, 'السنة الرابعة', 1),
(5, 'السنة الخامسة', 1),
(6, 'السنة الأولى', 3),
(7, 'السنة الثانية', 3),
(8, 'السنة الثالثة', 3),
(9, 'السنة الأولى', 2),
(10, 'السنة الثانية', 2),
(11, 'السنة الثالثة', 2),
(12, 'السنة الرابعة', 2),
(13, 'السنة الأولى', 4),
(14, 'السنة الثانية', 4),
(15, 'السنة الثالثة', 4);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `student_id` int(20) NOT NULL,
  `student_name` text NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(100) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_educationallevel` int(20) NOT NULL,
  `student_scholaryear` int(20) NOT NULL,
  `student_class` int(20) NOT NULL,
  `student_teacher` int(20) NOT NULL,
  `student_homeaddress` varchar(100) NOT NULL,
  `student_parentname` text NOT NULL,
  `student_parentrelation` text NOT NULL,
  `student_parentjob` int(11) NOT NULL,
  `student_phone` varchar(20) NOT NULL,
  `student_familymembers` int(20) NOT NULL,
  `student_familyworkers` int(20) NOT NULL,
  `student_familyscholars` int(20) NOT NULL,
  `student_remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_password`, `student_birthdate`, `student_educationallevel`, `student_scholaryear`, `student_class`, `student_teacher`, `student_homeaddress`, `student_parentname`, `student_parentrelation`, `student_parentjob`, `student_phone`, `student_familymembers`, `student_familyworkers`, `student_familyscholars`, `student_remark`) VALUES
(4, 'vfdfd', 'thouria.tahari12@gmail.com', '123', '0000-00-00', 1, 1, 1, 8, 'kjhk', '', '', 1, '5858', 0, 0, 0, NULL),
(5, 'hjhj', 'thouria.tahari551@gmail.com', '123', '0000-00-00', 1, 1, 1, 9, 'kjhk', '', '', 1, '5858', 0, 0, 0, NULL),
(6, 'hjhj', 'thouria.taharikjk1@gmail.com', '123', '0000-00-00', 1, 1, 1, 8, 'kjhk', '', '', 1, '5858', 0, 0, 0, NULL),
(9, 'منال', 'thouria.taHGHGHHari@gmail.com', '123', '0000-00-00', 1, 5, 1, 9, 'GFFGFH', '', '', 3, '522525', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `surah`
--

CREATE TABLE `surah` (
  `surah_id` int(20) NOT NULL,
  `surah_name` text NOT NULL,
  `surah_ayanumber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `surah`
--

INSERT INTO `surah` (`surah_id`, `surah_name`, `surah_ayanumber`) VALUES
(1, 'سورة الفاتحة', 7),
(2, 'سورة البقرة', 286),
(3, 'سورة آل عمران', 200),
(4, 'سورة النساء', 176),
(5, 'سورة المائدة', 120),
(6, 'سورة الأنعام', 165),
(7, 'سورة الأعراف', 206),
(8, 'سورة الأنفال', 75),
(9, 'سورة التوبة', 129),
(10, 'سورة يونس', 109),
(11, 'سورة هود', 123),
(12, 'سورة يوسف', 111),
(13, 'سورة الرعد', 43),
(14, 'سورة إبراهيم', 52),
(15, 'سورة الحجر', 99),
(16, 'سورة النحل', 128),
(17, 'سورة الإسراء', 111),
(18, 'سورة الكهف', 110),
(19, 'سورة مريم', 98),
(20, 'سورة طه', 135),
(21, 'سورة الأنبياء', 112),
(22, 'سورة الحج', 78),
(23, 'سورة المؤمنون', 118),
(24, 'سورة النور', 64),
(25, 'سورة الفرقان', 77),
(26, 'سورة الشعراء', 227),
(27, 'سورة النمل', 93),
(28, 'سورة القصص', 88),
(29, 'سورة العنكبوت', 69),
(30, 'سورة الروم', 60),
(31, 'سورة لقمان', 34),
(32, 'سورة السجدة', 30),
(33, 'سورة الأحزاب', 73),
(34, 'سورة سبأ', 54),
(35, 'سورة فاطر', 45),
(36, 'سورة يس', 83),
(37, 'سورة الصافات', 182),
(38, 'سورة ص', 88),
(39, 'سورة الزمر', 75),
(40, 'سورة غافر', 85),
(41, 'سورة فصلت', 54),
(42, 'سورة الشورى', 53),
(43, 'سورة الزخرف', 89),
(44, 'سورة الدخان', 59),
(45, 'سورة الجاثية', 37),
(46, 'سورة الأحقاف', 35),
(47, 'سورة محمد', 38),
(48, 'سورة الفتح', 29),
(49, 'سورة الحجرات', 18),
(50, 'سورة ق', 45),
(51, 'سورة الذاريات', 60),
(52, 'سورة الطور', 49),
(53, 'سورة النجم', 62),
(54, 'سورة القمر', 55),
(55, 'سورة الرحمن', 78),
(56, 'سورة الواقعة', 96),
(57, 'سورة الحديد', 29),
(58, 'سورة المجادلة', 22),
(59, 'سورة الحشر', 24),
(60, 'سورة الممتحنة', 13),
(61, 'سورة الصف', 14),
(62, 'سورة الجمعة', 11),
(63, 'سورة المنافقون', 11),
(64, 'سورة التغابن', 18),
(65, 'سورة الطلاق', 12),
(66, 'سورة التحريم', 12),
(67, 'سورة الملك', 30),
(68, 'سورة القلم', 52),
(69, 'سورة الحاقة', 52),
(70, 'سورة المعارج', 44),
(71, 'سورة نوح', 28),
(72, 'سورة الجن', 28),
(73, 'سورة المزمل', 20),
(74, 'سورة المدثر', 56),
(75, 'سورة القيامة', 40),
(76, 'سورة الإنسان', 31),
(77, 'سورة المرسلات', 50),
(78, 'سورة النبأ', 40),
(79, 'سورة النازعات', 46),
(80, 'سورة عبس', 42),
(81, 'سورة التكوير', 29),
(82, 'سورة الانفطار', 19),
(83, 'سورة المطففين', 36),
(84, 'سورة الانشقاق', 25),
(85, 'سورة البروج', 22),
(86, 'سورة الطارق', 17),
(87, 'سورة الأعلى', 19),
(88, 'سورة الغاشية', 26),
(89, 'سورة الفجر', 30),
(90, 'سورة البلد', 20),
(91, 'سورة الشمس', 15),
(92, 'سورة الليل', 21),
(93, 'سورة الضحى', 11),
(94, 'سورة الشرح', 8),
(95, 'سورة التين', 8),
(96, 'سورة العلق', 19),
(97, 'سورة القدر', 5),
(98, 'سورة البينة', 8),
(99, 'سورة الزلزلة', 8),
(100, 'سورة العاديات', 11),
(101, 'سورة القارعة', 11),
(102, 'سورة التكاثر', 8),
(103, 'سورة العصر', 3),
(104, 'سورة الهمزة', 9),
(105, 'سورة الفيل', 5),
(106, 'سورة قريش', 4),
(107, 'سورة الماعون', 7),
(108, 'سورة الكوثر', 3),
(109, 'سورة الكافرون', 6),
(110, 'سورة النصر', 3),
(111, 'سورة المسد', 5),
(112, 'سورة الإخلاص', 4),
(113, 'سورة الفلق', 5),
(114, 'سورة الناس', 6);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(20) NOT NULL,
  `teacher_name` text NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(100) NOT NULL,
  `teacher_homeaddress` varchar(100) NOT NULL,
  `teacher_job` int(20) NOT NULL,
  `teacher_phone` int(13) NOT NULL,
  `teacher_educationallevel` int(20) NOT NULL,
  `teacher_scholaryear` int(20) NOT NULL,
  `teacher_class` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_homeaddress`, `teacher_job`, `teacher_phone`, `teacher_educationallevel`, `teacher_scholaryear`, `teacher_class`) VALUES
(8, 'شيراز', 'thouria.tahari111@gmail.com', '123', 'الحي', 1, 546406, 1, 1, 1),
(9, 'أنفال', 'anfal.korichi@gmail.com', '123', 'تيسمسيلت', 3, 546406, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p'),
('emhashenudara@gmail.com', 'p'),
('anfal.korichi@gmail.com', 'd'),
('amel@gmail.com', 'd'),
('chiraz.litim@gmail.com', 'd'),
('thouria.taHGHGHHari@gmail.com', 'p'),
('thouria.tahari12@gmail.com', 'p'),
('thouria.tahari551@gmail.com', 'p'),
('thouria.taharikjk1@gmail.com', 'p');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aemail`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `scheduleid` (`scheduleid`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_scholaryear` (`class_scholaryear`);

--
-- Index pour la table `educationallevel`
--
ALTER TABLE `educationallevel`
  ADD PRIMARY KEY (`educationallevel_id`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `surah_id` (`surah_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Index pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `docid` (`docid`);

--
-- Index pour la table `scholaryear`
--
ALTER TABLE `scholaryear`
  ADD PRIMARY KEY (`scholaryear_id`),
  ADD KEY `scholaryear_educationallevel` (`scholaryear_educationallevel`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_teacher` (`student_teacher`),
  ADD KEY `student_educationallevel` (`student_educationallevel`),
  ADD KEY `student_scholaryear` (`student_scholaryear`),
  ADD KEY `student_class` (`student_class`),
  ADD KEY `student_parentjob` (`student_parentjob`);

--
-- Index pour la table `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`surah_id`);

--
-- Index pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `teacher_job` (`teacher_job`),
  ADD KEY `teacher_educationallevel` (`teacher_educationallevel`),
  ADD KEY `teacher_scholaryear` (`teacher_scholaryear`),
  ADD KEY `teacher_class` (`teacher_class`);

--
-- Index pour la table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `educationallevel`
--
ALTER TABLE `educationallevel`
  MODIFY `educationallevel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `scholaryear`
--
ALTER TABLE `scholaryear`
  MODIFY `scholaryear_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `surah`
--
ALTER TABLE `surah`
  MODIFY `surah_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`class_scholaryear`) REFERENCES `scholaryear` (`scholaryear_id`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`surah_id`) REFERENCES `surah` (`surah_id`);

--
-- Contraintes pour la table `scholaryear`
--
ALTER TABLE `scholaryear`
  ADD CONSTRAINT `scholaryear_ibfk_1` FOREIGN KEY (`scholaryear_educationallevel`) REFERENCES `educationallevel` (`educationallevel_id`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_teacher`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`student_educationallevel`) REFERENCES `educationallevel` (`educationallevel_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`student_scholaryear`) REFERENCES `scholaryear` (`scholaryear_id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`student_class`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`student_parentjob`) REFERENCES `jobs` (`job_id`);

--
-- Contraintes pour la table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`teacher_job`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`teacher_educationallevel`) REFERENCES `educationallevel` (`educationallevel_id`),
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`teacher_scholaryear`) REFERENCES `scholaryear` (`scholaryear_id`),
  ADD CONSTRAINT `teacher_ibfk_4` FOREIGN KEY (`teacher_class`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
