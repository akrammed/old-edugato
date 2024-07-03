-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 juin 2024 à 20:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allinone_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorys`
--

INSERT INTO `categorys` (`id`, `category`, `picture`, `description`) VALUES
(1, 'english', 'test', 'Explore the richness of the English language through our comprehensive course offerings. From grammar fundamentals to advanced writing techniques, our courses cater to learners of all levels. Dive into engaging lessons designed to enhance your vocabulary,'),
(2, 'english', 'test', 'Explore the richness of the English language through our comprehensive course offerings. From grammar fundamentals to advanced writing techniques, our courses cater to learners of all levels.');

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `vedio` varchar(255) NOT NULL,
  `quizz` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `quizz_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter`, `vedio`, `quizz`, `description`, `content`, `lesson_id`, `quizz_title`) VALUES
(1, 'Introducing Yourself', 'lesson-1.mp4', 'Quiz', 'Description', 'Content', 1, ''),
(152, 'Filling the gaps', '', '371', '', '', 1, 'Exam'),
(153, 'Correct the mistake ', '', '377', '', '', 1, 'Exam'),
(159, 'Video part  one', '', '392', '', '', 1, 'image '),
(160, 'record', '', '393', '', '', 1, 'record'),
(168, 'text option', '', '401', '', '', 2, 'text option'),
(170, 'audio quiz', '', '403', '', '', 2, 'audio quiz'),
(171, 'image option', '', '404', '', '', 2, 'image option'),
(172, 'ordering quiz', '', '405', '', '', 2, 'ordering quiz');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `background_picture` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `vedio_description` varchar(255) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `video_time` varchar(255) NOT NULL,
  `exams_number` varchar(255) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 0,
  `is_paid` tinyint(3) NOT NULL DEFAULT 0,
  `rating_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `title`, `background_picture`, `picture`, `vedio_description`, `description`, `content`, `study_time`, `video_time`, `exams_number`, `is_active`, `is_paid`, `rating_id`, `category_id`, `level_id`) VALUES
(3, 'A1  Level - Beginner ', 'A1 Offer.png', 'A1 Offer.png', NULL, 'Learn the basics of the English langauge with out complete A1 Level course. \r\nYou will learn all 04 skills in this course:\r\nSpeaking, Listening, Writing, Reading.', '.', '60', '38', '4', 0, 0, NULL, 2, 1),
(4, 'test', 'bgco.jpg', 'bgco.jpg', NULL, 'test', '', '', '', '', 0, 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `lesson` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson`, `description`, `course_id`) VALUES
(1, 'lesson one', '', 3),
(2, 'lesson two', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'B1');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `qoption` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(3) DEFAULT NULL,
  `oorder` varchar(255) DEFAULT NULL,
  `palette` varchar(255) DEFAULT NULL,
  `imageName` varchar(255) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `qoption`, `is_correct`, `oorder`, `palette`, `imageName`, `quiz_id`) VALUES
(115, 'Option 1', NULL, '1', NULL, NULL, 152),
(116, 'Option 2', NULL, '2', NULL, NULL, 152),
(117, 'Option 3', NULL, '3', NULL, NULL, 152),
(118, 'Option 4', NULL, '4', NULL, NULL, 152),
(119, 'Option 5', NULL, '5', NULL, NULL, 152),
(120, 'Option 6', NULL, '6', NULL, NULL, 152),
(121, 'Option 1', NULL, '1', NULL, NULL, 153),
(122, 'Option 2', NULL, '2', NULL, NULL, 153),
(123, 'Option 3', NULL, '3', NULL, NULL, 153),
(124, 'Option 4', NULL, '4', NULL, NULL, 153),
(125, 'Option 5', NULL, '5', NULL, NULL, 153),
(126, 'Option 6', NULL, '6', NULL, NULL, 153),
(127, 'Option 1', NULL, '1', NULL, NULL, 154),
(128, 'Option 2', NULL, '2', NULL, NULL, 154),
(129, 'Option 3', NULL, '3', NULL, NULL, 154),
(130, 'Option 4', NULL, '4', NULL, NULL, 154),
(131, 'Option 5', NULL, '5', NULL, NULL, 154),
(132, 'Option 6', NULL, '6', NULL, NULL, 154),
(133, 'Option 1', NULL, NULL, '#dd2727', NULL, 156),
(134, 'Option 2', NULL, NULL, '#ea0b8d', NULL, 156),
(135, 'Option 3', NULL, NULL, '#1507da', NULL, 156),
(136, 'Option 4', NULL, NULL, '#20d93f', NULL, 156),
(137, 'Option 5', NULL, NULL, '#e75608', NULL, 156),
(138, 'Option 1', NULL, NULL, '#cd4c4c', NULL, 158),
(139, 'Option 2', NULL, NULL, '#8bf609', NULL, 158),
(140, 'Option 3', NULL, NULL, '#16dac3', NULL, 158),
(141, 'Option 4', NULL, NULL, '#98615d', NULL, 158),
(142, 'Option 1', NULL, NULL, '#f40b0b', NULL, 159),
(143, 'Option 2', NULL, NULL, '#fd0de1', NULL, 159),
(144, 'Option 3', NULL, NULL, '#072ce4', NULL, 159),
(145, 'Option 4', NULL, NULL, '#0ed3e1', NULL, 159),
(146, 'Option 5', NULL, NULL, '#199217', NULL, 159),
(147, 'false', NULL, '0', NULL, NULL, 160),
(148, 'false', NULL, '2', NULL, NULL, 160),
(149, 'true', NULL, '4', NULL, NULL, 160),
(150, 'false', NULL, '18', NULL, NULL, 160),
(151, 'true', NULL, '2 * 2', NULL, NULL, 160),
(152, 'false', NULL, '-2', NULL, NULL, 160),
(153, 'Option 1', NULL, '1', NULL, NULL, 162),
(154, 'Option 2', NULL, '2', NULL, NULL, 162),
(155, 'Option 3', NULL, '3', NULL, NULL, 162),
(156, 'Option 4', NULL, '4', NULL, NULL, 162),
(157, 'Option 5', NULL, '5', NULL, NULL, 162),
(158, 'Option 6', NULL, '6', NULL, NULL, 162),
(159, 'Option 7', NULL, '7', NULL, NULL, 162),
(160, 'Option 8', NULL, '8', NULL, NULL, 162),
(161, 'Option 1', NULL, NULL, '#f70202', NULL, 163),
(162, 'Option 2', NULL, NULL, '#ec0977', NULL, 163),
(163, 'Option 3', NULL, NULL, '#6a05e6', NULL, 163),
(164, 'Option 4', NULL, NULL, '#07edd3', NULL, 163),
(165, 'Option 5', NULL, NULL, '#0fd287', NULL, 163),
(166, 'Option 6', NULL, NULL, '#a6f2bd', NULL, 163),
(167, 'Option 7', NULL, NULL, '#ec9e18', NULL, 163),
(168, 'Option 8', NULL, NULL, '#c0947c', NULL, 163),
(169, 'false', NULL, 'Option 1', NULL, NULL, 164),
(170, 'false', NULL, 'Option 2', NULL, NULL, 164),
(171, 'true', NULL, 'Option 3', NULL, NULL, 164),
(172, 'false', NULL, 'Option 4', NULL, NULL, 164),
(173, 'true', NULL, 'Option 5', NULL, NULL, 164),
(174, 'false', NULL, 'Option 6', NULL, NULL, 164),
(175, 'Option 1', 0, NULL, NULL, NULL, 168),
(176, 'Option 2', 0, NULL, NULL, NULL, 168),
(177, 'Option 3', 1, NULL, NULL, NULL, 168),
(178, 'Option 4', 0, NULL, NULL, NULL, 168),
(179, 'Option 5', 1, NULL, NULL, NULL, 168),
(180, 'Option 6', 0, NULL, NULL, NULL, 168),
(181, 'Option 1', 0, NULL, NULL, NULL, 170),
(182, 'Option 2', 1, NULL, NULL, NULL, 170),
(183, 'Option 3', 0, NULL, NULL, NULL, 170),
(184, 'Option 4', 1, NULL, NULL, NULL, 170),
(185, 'Option 5', 0, NULL, NULL, NULL, 170),
(186, 'Option 1', 1, NULL, NULL, NULL, 172),
(187, 'Option 2', 0, NULL, NULL, NULL, 172),
(188, 'Option 3', 1, NULL, NULL, NULL, 172),
(189, 'Option 4', 0, NULL, NULL, NULL, 172),
(190, 'Option 5', 1, NULL, NULL, NULL, 172),
(191, 'Option 6', 0, NULL, NULL, NULL, 172),
(192, 'Option 7', 1, NULL, NULL, NULL, 172),
(193, 'false', NULL, 'Option 1', NULL, NULL, 173),
(194, 'false', NULL, 'Option 2', NULL, NULL, 173),
(195, 'true', NULL, 'Option 3', NULL, NULL, 173),
(196, 'false', NULL, 'Option 4', NULL, NULL, 173),
(197, 'true', NULL, 'Option 5', NULL, NULL, 173),
(198, 'false', NULL, 'Option 6', NULL, NULL, 173),
(199, 'false', NULL, 'Option 1', NULL, NULL, 174),
(200, 'false', NULL, 'Option 2', NULL, NULL, 174),
(201, 'true', NULL, 'Option 3', NULL, NULL, 174),
(202, 'false', NULL, 'Option 4', NULL, NULL, 174),
(203, 'true', NULL, 'Option 5', NULL, NULL, 174),
(204, 'false', NULL, 'Option 6', NULL, NULL, 174),
(205, 'true', NULL, 'Option 7', NULL, NULL, 174),
(206, 'Option 1', 0, NULL, NULL, NULL, 175),
(207, 'Option 2', 0, NULL, NULL, NULL, 175),
(208, 'Option 3', 0, NULL, NULL, NULL, 175),
(209, 'Option 4', 1, NULL, NULL, NULL, 175),
(210, 'Option 5', 0, NULL, NULL, NULL, 175),
(211, 'Option 6', 1, NULL, NULL, NULL, 175),
(212, 'Option 7', 0, NULL, NULL, NULL, 175),
(213, 'Option 1', NULL, '1', NULL, NULL, 176),
(214, 'Option 2', NULL, '2', NULL, NULL, 176),
(215, 'Option 3', NULL, '3', NULL, NULL, 176),
(216, 'Option 4', NULL, '4', NULL, NULL, 176),
(217, 'Option 5', NULL, '5', NULL, NULL, 176),
(218, 'Option 1', NULL, '1', NULL, NULL, 177),
(219, 'Option 2', NULL, '2', NULL, NULL, 177),
(220, 'Option 3', NULL, '3', NULL, NULL, 177),
(221, 'Option 4', NULL, '4', NULL, NULL, 177),
(222, 'Option 5', NULL, '5', NULL, NULL, 177),
(223, 'Option 6', NULL, '6', NULL, NULL, 177),
(224, 'Option 7', NULL, '7', NULL, NULL, 177),
(225, 'Option 1', NULL, '1', '1', NULL, 178),
(226, 'Option 2', NULL, '2', '2', NULL, 178),
(227, 'Option 3', NULL, '3', '3', NULL, 178),
(228, 'Option 4', NULL, '4', '4', NULL, 178),
(229, 'scene-nature-champ-vert_974729-6515.avif', NULL, NULL, NULL, NULL, 186),
(230, 'free-nature-images.jpg', NULL, NULL, NULL, NULL, 186),
(231, 'beau-champ-de-paysage-de-blé-de-nuage-et-de-montagne-31473537.webp', NULL, NULL, NULL, NULL, 186),
(232, 'champs-vert-clair-32297200.webp', NULL, NULL, NULL, NULL, 186),
(233, 'scene-nature-champ-vert_974729-6515.avif', NULL, NULL, NULL, NULL, 189),
(234, 'free-nature-images.jpg', NULL, NULL, NULL, NULL, 189),
(235, 'beau-champ-de-paysage-de-blé-de-nuage-et-de-montagne-31473537.webp', NULL, NULL, NULL, NULL, 189),
(236, 'scene-nature-champ-vert_974729-6515.avif', NULL, NULL, NULL, NULL, 191),
(237, 'free-nature-images.jpg', NULL, NULL, NULL, NULL, 191),
(238, 'beau-champ-de-paysage-de-blé-de-nuage-et-de-montagne-31473537.webp', NULL, NULL, NULL, NULL, 191),
(239, 'champs-vert-clair-32297200.webp', 1, NULL, NULL, NULL, 191),
(240, 'Option 1', NULL, '1', '1', NULL, 192),
(241, 'Option 2', NULL, '2', '2', NULL, 192),
(242, 'Option 3', NULL, '3', '3', NULL, 192),
(243, 'Option 4', NULL, '4', '4', NULL, 192),
(244, 'Option 5', NULL, '5', '5', NULL, 192),
(245, 'Option 1', NULL, '1', '1', NULL, 193),
(246, 'Option 2', NULL, '2', '2', NULL, 193),
(247, 'Option 3', NULL, '3', '3', NULL, 193),
(248, 'Option 4', NULL, '4', '4', NULL, 193),
(249, 'Option 5', NULL, '5', '5', NULL, 193),
(250, 'Option 1', NULL, '1', NULL, NULL, 194),
(251, 'Option 2', NULL, '2', NULL, NULL, 194),
(252, 'Option 3', NULL, '3', NULL, NULL, 194),
(253, 'Option 4', NULL, '4', NULL, NULL, 194),
(254, 'Option 5', NULL, '5', NULL, NULL, 194),
(255, 'Option 1', NULL, '1', NULL, NULL, 195),
(256, 'Option 2', NULL, '2', NULL, NULL, 195),
(257, 'Option 3', NULL, '3', NULL, NULL, 195),
(258, 'Option 4', NULL, '4', NULL, NULL, 195),
(259, 'Option 5', NULL, '5', NULL, NULL, 195),
(260, 'Option 1', NULL, '1', NULL, NULL, 196),
(261, 'Option 2', NULL, '2', NULL, NULL, 196),
(262, 'Option 3', NULL, '3', NULL, NULL, 196),
(263, 'Option 4', NULL, '4', NULL, NULL, 196),
(264, 'Option 5', NULL, '5', NULL, NULL, 196),
(265, 'Option 1', NULL, '1', NULL, NULL, 197),
(266, 'Option 2', NULL, '2', NULL, NULL, 197),
(267, 'Option 3', NULL, '3', NULL, NULL, 197),
(268, 'Option 4', NULL, '4', NULL, NULL, 197),
(269, 'Option 5', NULL, '5', NULL, NULL, 197),
(270, 'Option 1', NULL, '1', NULL, NULL, 198),
(271, 'Option 2', NULL, '2', NULL, NULL, 198),
(272, 'Option 3', NULL, '3', NULL, NULL, 198),
(273, 'Option 4', NULL, '4', NULL, NULL, 198),
(274, 'Option 5', NULL, '5', NULL, NULL, 198),
(275, 'Option 1', NULL, '1', NULL, NULL, 199),
(276, 'Option 2', NULL, '2', NULL, NULL, 199),
(277, 'Option 3', NULL, '3', NULL, NULL, 199),
(278, 'Option 4', NULL, '4', NULL, NULL, 199),
(279, 'Option 5', NULL, '5', NULL, NULL, 199),
(280, 'Option 1', NULL, '1', NULL, NULL, 200),
(281, 'Option 2', NULL, '2', NULL, NULL, 200),
(282, 'Option 3', NULL, '3', NULL, NULL, 200),
(283, 'Option 4', NULL, '4', NULL, NULL, 200),
(284, 'Option 5', NULL, '5', NULL, NULL, 200),
(285, 'Option 1', 1, NULL, NULL, NULL, 201),
(286, 'Option 2', 0, NULL, NULL, NULL, 201),
(287, 'Option 3', 0, NULL, NULL, NULL, 201),
(288, 'Option 4', 1, NULL, NULL, NULL, 201),
(289, 'Option 5', 0, NULL, NULL, NULL, 201),
(290, 'Option 6', 1, NULL, NULL, NULL, 201),
(291, 'Option 1', 0, NULL, NULL, NULL, 202),
(292, 'Option 2', 0, NULL, NULL, NULL, 202),
(293, 'Option 3', 1, NULL, NULL, NULL, 202),
(294, 'Option 4', 0, NULL, NULL, NULL, 202),
(295, 'Option 5', 1, NULL, NULL, NULL, 202),
(296, 'Option 6', 0, NULL, NULL, NULL, 202),
(297, NULL, NULL, NULL, NULL, NULL, 203),
(298, NULL, NULL, NULL, NULL, NULL, 203),
(299, NULL, NULL, NULL, NULL, NULL, 203),
(300, NULL, NULL, NULL, NULL, NULL, 203),
(301, '7.jpg', NULL, NULL, NULL, NULL, 210),
(302, '8.jpg', NULL, NULL, NULL, NULL, 210),
(303, '11.jpg', 1, NULL, NULL, NULL, 210),
(304, '1.jpg', NULL, NULL, NULL, NULL, 210),
(305, 'Option 1', NULL, '1', NULL, NULL, 211),
(306, 'Option 2', NULL, '2', NULL, NULL, 211),
(307, 'Option 3', NULL, '3', NULL, NULL, 211),
(308, 'Option 4', NULL, '4', NULL, NULL, 211),
(309, 'Option 5', NULL, '5', NULL, NULL, 211),
(310, 'Option 6', NULL, '6', NULL, NULL, 211),
(311, 'Option 7', NULL, '7', NULL, NULL, 211),
(312, 'Option 8', NULL, '8', NULL, NULL, 211),
(313, 'Option 1', NULL, '1', NULL, NULL, 212),
(314, 'Option 2', NULL, '2', NULL, NULL, 212),
(315, 'Option 3', NULL, '3', NULL, NULL, 212),
(316, 'Option 4', NULL, '4', NULL, NULL, 212),
(317, 'Option 5', NULL, '5', NULL, NULL, 212),
(318, 'Option 6', NULL, '6', NULL, NULL, 212),
(319, 'Option 7', NULL, '7', NULL, NULL, 212),
(320, 'Option 1', NULL, '#ed0c0c', '#ed0c0c', NULL, 213),
(321, 'Option 2', NULL, '#ca02b9', '#ca02b9', NULL, 213),
(322, 'Option 3', NULL, '#72c60c', '#72c60c', NULL, 213),
(323, 'Option 4', NULL, '#16d6e3', '#16d6e3', NULL, 213),
(324, 'Option 5', NULL, '#3a0fd7', '#3a0fd7', NULL, 213),
(325, 'Option 1', NULL, '#e81717', '#e81717', NULL, 214),
(326, 'Option 2', NULL, '#701515', '#701515', NULL, 214),
(327, 'Option 3', NULL, '#2452db', '#2452db', NULL, 214),
(328, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 214),
(329, 'Option 1', NULL, '#e81717', '#e81717', NULL, 215),
(330, 'Option 2', NULL, '#701515', '#701515', NULL, 215),
(331, 'Option 3', NULL, '#2452db', '#2452db', NULL, 215),
(332, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 215),
(333, 'Option 1', NULL, '#e81717', '#e81717', NULL, 216),
(334, 'Option 2', NULL, '#701515', '#701515', NULL, 216),
(335, 'Option 3', NULL, '#2452db', '#2452db', NULL, 216),
(336, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 216),
(337, 'Option 1', NULL, '#e81717', '#e81717', NULL, 217),
(338, 'Option 2', NULL, '#701515', '#701515', NULL, 217),
(339, 'Option 3', NULL, '#2452db', '#2452db', NULL, 217),
(340, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 217),
(341, 'Option 1', NULL, '#e81717', '#e81717', NULL, 218),
(342, 'Option 2', NULL, '#701515', '#701515', NULL, 218),
(343, 'Option 3', NULL, '#2452db', '#2452db', NULL, 218),
(344, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 218),
(345, 'Option 1', NULL, '#e81717', '#e81717', NULL, 219),
(346, 'Option 2', NULL, '#701515', '#701515', NULL, 219),
(347, 'Option 3', NULL, '#2452db', '#2452db', NULL, 219),
(348, 'Option 4', NULL, '#09fb92', '#09fb92', NULL, 219),
(349, 'Option 1', NULL, '#862d2d', '#862d2d', NULL, 220),
(350, 'Option 2', NULL, '#ce2727', '#ce2727', NULL, 220),
(351, 'Option 3', NULL, '#f47171', '#f47171', NULL, 220),
(352, 'Option 4', NULL, '#fbdada', '#fbdada', NULL, 220),
(353, 'Option 1', NULL, '#fa0505', '#fa0505', NULL, 221),
(354, 'Option 2', NULL, '#761bc0', '#761bc0', NULL, 221),
(355, 'Option 3', NULL, '#1be421', '#1be421', NULL, 221),
(356, 'Option 4', NULL, '#d7e60a', '#d7e60a', NULL, 221),
(357, 'Option 1', NULL, '#fa0505', '#fa0505', NULL, 222),
(358, 'Option 2', NULL, '#761bc0', '#761bc0', NULL, 222),
(359, 'Option 3', NULL, '#1be421', '#1be421', NULL, 222),
(360, 'Option 4', NULL, '#d7e60a', '#d7e60a', NULL, 222),
(361, 'Option 1', 0, NULL, NULL, NULL, 223),
(362, 'Option 2', 0, NULL, NULL, NULL, 223),
(363, 'Option 3', 0, NULL, NULL, NULL, 223),
(364, 'Option 4', 0, NULL, NULL, NULL, 223),
(365, 'undefined', 0, NULL, NULL, NULL, 223),
(366, '1', NULL, 'Option 1', NULL, NULL, 228),
(367, '2', NULL, 'Option 2', NULL, NULL, 228),
(368, '3', NULL, 'Option 3', NULL, NULL, 228),
(369, '4', NULL, 'Option 4', NULL, NULL, 228),
(370, '5', NULL, 'Option 5', NULL, NULL, 228),
(371, '6', NULL, 'Option 6', NULL, NULL, 228),
(372, 'Option 1', NULL, '1', NULL, NULL, 229),
(373, 'Option 2', NULL, '2', NULL, NULL, 229),
(374, 'Option 3', NULL, '3', NULL, NULL, 229),
(375, 'Option 4', NULL, '4', NULL, NULL, 229),
(376, 'Option 5', NULL, '5', NULL, NULL, 229),
(377, 'Option 6', NULL, '6', NULL, NULL, 229),
(378, 'Option 1', NULL, '1', NULL, NULL, 230),
(379, 'Option 2', NULL, '2', NULL, NULL, 230),
(380, 'Option 3', NULL, '3', NULL, NULL, 230),
(381, 'Option 4', NULL, '4', NULL, NULL, 230),
(382, 'Option 1', NULL, '1', NULL, NULL, 231),
(383, 'Option 2', NULL, '2', NULL, NULL, 231),
(384, 'Option 3', NULL, '3', NULL, NULL, 231),
(385, 'Option 4', NULL, '4', NULL, NULL, 231),
(386, 'Option 5', NULL, '5', NULL, NULL, 231),
(387, 'Option 1', NULL, '1', NULL, NULL, 232),
(388, 'Option 2', NULL, '2', NULL, NULL, 232),
(389, 'Option 3', NULL, '3', NULL, NULL, 232),
(390, 'Option 4', NULL, '4', NULL, NULL, 232),
(391, 'Option 5', NULL, '5', NULL, NULL, 232),
(392, 'Option 1', NULL, '1', NULL, NULL, 233),
(393, 'Option 2', NULL, '2', NULL, NULL, 233),
(394, 'Option 3', NULL, '3', NULL, NULL, 233),
(395, 'Option 4', NULL, '4', NULL, NULL, 233),
(396, 'Option 5', NULL, '5', NULL, NULL, 233),
(397, 'Option 1', NULL, '1', NULL, NULL, 234),
(398, 'Option 2', NULL, '2', NULL, NULL, 234),
(399, 'Option 3', NULL, '3', NULL, NULL, 234),
(400, 'Option 4', NULL, '4', NULL, NULL, 234),
(401, 'Option 5', NULL, '5', NULL, NULL, 234),
(402, 'Option 1', NULL, '1', NULL, NULL, 235),
(403, 'Option 2', NULL, '2', NULL, NULL, 235),
(404, 'Option 3', NULL, '3', NULL, NULL, 235),
(405, 'Option 4', NULL, '4', NULL, NULL, 235),
(406, 'Option 5', NULL, '5', NULL, NULL, 235),
(407, 'Option 1', NULL, '1', NULL, NULL, 236),
(408, 'Option 2', NULL, '2', NULL, NULL, 236),
(409, 'Option 3', NULL, '3', NULL, NULL, 236),
(410, 'Option 4', NULL, '4', NULL, NULL, 236),
(411, 'Option 1', NULL, '1', NULL, NULL, 237),
(412, 'Option 2', NULL, '2', NULL, NULL, 237),
(413, 'Option 3', NULL, '3', NULL, NULL, 237),
(414, 'Option 1', NULL, '1', NULL, NULL, 238),
(415, 'Option 2', NULL, '2', NULL, NULL, 238),
(416, 'Option 3', NULL, '3', NULL, NULL, 238),
(417, 'Option 1', NULL, '1', NULL, NULL, 239),
(418, 'Option 2', NULL, '2', NULL, NULL, 239),
(419, 'Option 3', NULL, '3', NULL, NULL, 239),
(420, 'Option 4', NULL, '4', NULL, NULL, 239),
(421, 'Option 1', NULL, '1', NULL, NULL, 240),
(422, 'Option 2', NULL, '2', NULL, NULL, 240),
(423, 'Option 3', NULL, '3', NULL, NULL, 240),
(424, 'Option 4', NULL, '4', NULL, NULL, 240),
(425, 'Option 1', NULL, '1', NULL, NULL, 241),
(426, 'Option 2', NULL, '2', NULL, NULL, 241),
(427, 'Option 3', NULL, '3', NULL, NULL, 241),
(428, 'Option 4', NULL, '4', NULL, NULL, 241),
(429, 'Option 1', NULL, '1', NULL, NULL, 242),
(430, 'Option 2', NULL, '2', NULL, NULL, 242),
(431, 'Option 3', NULL, '3', NULL, NULL, 242),
(432, 'Option 1', NULL, '1', NULL, NULL, 243),
(433, 'Option 2', NULL, '2', NULL, NULL, 243),
(434, 'Option 3', NULL, '3', NULL, NULL, 243),
(435, 'Option 1', NULL, '1', NULL, NULL, 244),
(436, 'Option 2', NULL, '2', NULL, NULL, 244),
(437, 'Option 3', NULL, '3', NULL, NULL, 244),
(438, 'Option 4', NULL, '4', NULL, NULL, 244),
(439, 'Option 5', NULL, '5', NULL, NULL, 244),
(440, 'Option 1', NULL, '1', NULL, NULL, 245),
(441, 'Option 2', NULL, '2', NULL, NULL, 245),
(442, 'Option 3', NULL, '3', NULL, NULL, 245),
(443, 'Option 4', NULL, '4', NULL, NULL, 245),
(444, 'Option 5', NULL, '5', NULL, NULL, 245),
(445, 'Option 1', NULL, '1', NULL, NULL, 246),
(446, 'Option 2', NULL, '2', NULL, NULL, 246),
(447, 'Option 3', NULL, '3', NULL, NULL, 246),
(448, 'Option 4', NULL, '4', NULL, NULL, 246),
(449, 'Option 5', NULL, '5', NULL, NULL, 246),
(450, 'Option 1', NULL, '1', NULL, NULL, 247),
(451, 'Option 2', NULL, '2', NULL, NULL, 247),
(452, 'Option 3', NULL, '3', NULL, NULL, 247),
(453, 'Option 4', NULL, '4', NULL, NULL, 247),
(454, 'Option 1', NULL, '1', NULL, NULL, 248),
(455, 'Option 2', NULL, '2', NULL, NULL, 248),
(456, 'Option 3', NULL, '3', NULL, NULL, 248),
(457, 'Option 4', NULL, '4', NULL, NULL, 248),
(458, 'Option 1', NULL, '1', NULL, NULL, 249),
(459, 'Option 2', NULL, '2', NULL, NULL, 249),
(460, 'Option 3', NULL, '3', NULL, NULL, 249),
(461, 'false', 0, 'Option 1', NULL, NULL, 250),
(462, 'true', 1, 'Option 2', NULL, NULL, 250),
(463, 'false', 0, 'Option 3', NULL, NULL, 250),
(464, 'false', 0, 'Option 4', NULL, NULL, 250),
(465, '3.jpg', NULL, NULL, NULL, NULL, 251),
(466, '8.jpg', NULL, NULL, NULL, NULL, 251),
(467, '423671447_241225795696947_2651867967735248891_n.jpg', NULL, NULL, NULL, NULL, 251),
(468, '1.jpg', 1, NULL, NULL, NULL, 251),
(469, 'Option 1', NULL, '1', NULL, NULL, 252),
(470, 'Option 2', NULL, '2', NULL, NULL, 252),
(471, 'Option 3', NULL, '3', NULL, NULL, 252),
(472, 'Option 4', NULL, '4', NULL, NULL, 252),
(473, 'Option 5', NULL, '5', NULL, NULL, 252),
(474, 'Option 6', NULL, '6', NULL, NULL, 252),
(475, 'Option 1', NULL, '1', NULL, NULL, 253),
(476, 'Option 2', NULL, '2', NULL, NULL, 253),
(477, 'Option 3', NULL, '3', NULL, NULL, 253),
(478, 'Option 4', NULL, '4', NULL, NULL, 253),
(479, 'Option 5', NULL, '5', NULL, NULL, 253),
(480, 'Option 1', NULL, '1', NULL, NULL, 254),
(481, 'Option 2', NULL, '2', NULL, NULL, 254),
(482, 'Option 3', NULL, '3', NULL, NULL, 254),
(483, 'Option 4', NULL, '4', NULL, NULL, 254),
(484, 'Option 5', NULL, '5', NULL, NULL, 254),
(485, 'Option 1', NULL, '1', NULL, NULL, 255),
(486, 'Option 2', NULL, '2', NULL, NULL, 255),
(487, 'Option 3', NULL, '3', NULL, NULL, 255),
(488, 'Option 4', NULL, '4', NULL, NULL, 255),
(489, 'promise', NULL, '5', NULL, NULL, 255),
(490, 'Option 1', NULL, '1', NULL, NULL, 256),
(491, 'Option 2', NULL, '2', NULL, NULL, 256),
(492, 'Option 3', NULL, '3', NULL, NULL, 256),
(493, 'Option 1', NULL, '1', NULL, NULL, 257),
(494, 'Option 2', NULL, '2', NULL, NULL, 257),
(495, 'Option 3', NULL, '3', NULL, NULL, 257),
(496, 'Option 4', NULL, '4', NULL, NULL, 257),
(497, 'Option 1', NULL, '1', NULL, NULL, 258),
(498, 'Option 2', NULL, '2', NULL, NULL, 258),
(499, 'Option 3', NULL, '3', NULL, NULL, 258),
(500, 'stillness', NULL, '1', NULL, NULL, 262),
(501, 'hope', NULL, '2', NULL, NULL, 262),
(502, 'promise', NULL, '3', NULL, NULL, 262),
(503, 'stillness', NULL, '1', NULL, NULL, 263),
(504, 'darkness', NULL, '2', NULL, NULL, 263),
(505, 'promise', NULL, '3', NULL, NULL, 263),
(506, 'false', 0, 'Option 1', NULL, NULL, 264),
(507, 'true', 1, 'Option 2', NULL, NULL, 264),
(508, 'true', 1, 'Option 3', NULL, NULL, 264),
(509, 'false', 0, 'Option 4', NULL, NULL, 264),
(510, 'false', 0, 'Option 5', NULL, NULL, 264),
(511, 'false', NULL, 'Option 1', NULL, NULL, 265),
(512, 'true', NULL, 'Option 2', NULL, NULL, 265),
(513, 'true', NULL, 'Option 3', NULL, NULL, 265),
(514, 'false', NULL, 'Option 4', NULL, NULL, 265),
(515, 'false', NULL, 'Option 5', NULL, NULL, 265),
(516, 'false', 0, 'Option 1', NULL, NULL, 268),
(517, 'true', 1, 'Option 2', NULL, NULL, 268),
(518, 'true', 1, 'Option 3', NULL, NULL, 268),
(519, 'false', 0, 'Option 4', NULL, NULL, 268),
(520, 'false', 0, 'Option 5', NULL, NULL, 268),
(521, 'false', 0, 'Option 1', NULL, NULL, 270),
(522, 'true', 1, 'Option 2', NULL, NULL, 270),
(523, 'true', 1, 'Option 3', NULL, NULL, 270),
(524, 'false', 0, 'Option 4', NULL, NULL, 270),
(525, 'false', 0, 'Option 5', NULL, NULL, 270),
(526, 'Option 1', 0, NULL, NULL, NULL, 272),
(527, 'Option 2', 1, NULL, NULL, NULL, 272),
(528, 'Option 3', 1, NULL, NULL, NULL, 272),
(529, 'Option 4', 0, NULL, NULL, NULL, 272),
(530, 'Option 1', 0, NULL, NULL, NULL, 273),
(531, 'Option 2', 1, NULL, NULL, NULL, 273),
(532, 'Option 3', 1, NULL, NULL, NULL, 273),
(533, 'Option 4', 0, NULL, NULL, NULL, 273),
(534, 'bgco.jpg', NULL, NULL, NULL, NULL, 275),
(535, 'about.png', NULL, NULL, NULL, NULL, 275),
(536, 'hero_1.jpg', 1, NULL, NULL, NULL, 275),
(537, 'cbg.jpg', NULL, NULL, NULL, NULL, 275),
(538, 'Option 1', NULL, '1', NULL, NULL, 276),
(539, 'Option 2', NULL, '2', NULL, NULL, 276),
(540, 'Option 3', NULL, '3', NULL, NULL, 276),
(541, 'Option 4', NULL, '4', NULL, NULL, 276),
(542, 'Option 5', NULL, '5', NULL, NULL, 276),
(543, 'Option 6', NULL, '6', NULL, NULL, 276),
(544, 'Option 1', NULL, '1', NULL, NULL, 277),
(545, 'Option 2', NULL, '2', NULL, NULL, 277),
(546, 'Option 3', NULL, '3', NULL, NULL, 277),
(547, 'Option 4', NULL, '4', NULL, NULL, 277),
(548, 'Option 1', NULL, '#f43434', '#f43434', NULL, 278),
(549, 'Option 2', NULL, '#d232e7', '#d232e7', NULL, 278),
(550, 'Option 3', NULL, '#7bad05', '#7bad05', NULL, 278),
(551, 'Option 4', NULL, '#0bcbe5', '#0bcbe5', NULL, 278),
(552, 'darkness', NULL, '1', NULL, NULL, 279),
(553, 'slowly', NULL, '2', NULL, NULL, 279),
(554, 'promise', NULL, '3', NULL, NULL, 279),
(555, 'Option 1', 0, NULL, NULL, NULL, 280),
(556, 'Option 2', 0, NULL, NULL, NULL, 280),
(557, 'Option 3', 1, NULL, NULL, NULL, 280),
(558, 'Option 4', 0, NULL, NULL, NULL, 280),
(559, 'Option 1', 0, NULL, NULL, NULL, 281),
(560, 'Option 2', 1, NULL, NULL, NULL, 281),
(561, 'Option 3', 0, NULL, NULL, NULL, 281),
(562, 'Option 4', 0, NULL, NULL, NULL, 281),
(563, 'Option 1', 0, NULL, NULL, NULL, 282),
(564, 'Option 2', 0, NULL, NULL, NULL, 282),
(565, 'Option 3', 1, NULL, NULL, NULL, 282),
(566, 'Option 4', 0, NULL, NULL, NULL, 282),
(567, 'Option 1', 0, NULL, NULL, NULL, 283),
(568, 'Option 2', 0, NULL, NULL, NULL, 283),
(569, 'Option 3', 1, NULL, NULL, NULL, 283),
(570, 'Option 4', 0, NULL, NULL, NULL, 283),
(571, 'Option 1', 0, NULL, NULL, NULL, 285),
(572, 'Option 2', 0, NULL, NULL, NULL, 285),
(573, 'Option 3', 1, NULL, NULL, NULL, 285),
(574, 'Option 4', 0, NULL, NULL, NULL, 285),
(575, 'Option 1', 0, NULL, NULL, NULL, 286),
(576, 'Option 2', 0, NULL, NULL, NULL, 286),
(577, 'Option 3', 1, NULL, NULL, NULL, 286),
(578, 'Option 4', 0, NULL, NULL, NULL, 286),
(579, 'Option 1', 0, NULL, NULL, NULL, 287),
(580, 'Option 2', 0, NULL, NULL, NULL, 287),
(581, 'Option 3', 1, NULL, NULL, NULL, 287),
(582, 'Option 4', 0, NULL, NULL, NULL, 287),
(583, 'Option 1', 0, NULL, NULL, NULL, 288),
(584, 'Option 2', 0, NULL, NULL, NULL, 288),
(585, 'Option 3', 1, NULL, NULL, NULL, 288),
(586, 'Option 4', 0, NULL, NULL, NULL, 288),
(587, 'Option 1', 0, NULL, NULL, NULL, 289),
(588, 'Option 2', 0, NULL, NULL, NULL, 289),
(589, 'Option 3', 1, NULL, NULL, NULL, 289),
(590, 'Option 4', 0, NULL, NULL, NULL, 289),
(591, 'Option 1', 0, NULL, NULL, NULL, 290),
(592, 'Option 2', 1, NULL, NULL, NULL, 290),
(593, 'Option 3', 0, NULL, NULL, NULL, 290),
(594, 'Option 4', 0, NULL, NULL, NULL, 290),
(595, 'Option 1', 0, NULL, NULL, NULL, 291),
(596, 'Option 2', 0, NULL, NULL, NULL, 291),
(597, 'Option 3', 1, NULL, NULL, NULL, 291),
(598, 'Option 4', 0, NULL, NULL, NULL, 291),
(599, 'Option 5', 0, NULL, NULL, NULL, 291),
(600, 'Option 1', 0, NULL, NULL, NULL, 293),
(601, 'Option 2', 0, NULL, NULL, NULL, 293),
(602, 'Option 3', 1, NULL, NULL, NULL, 293),
(603, 'Option 4', 0, NULL, NULL, NULL, 293),
(604, 'Option 1', 0, NULL, NULL, NULL, 294),
(605, 'Option 2', 0, NULL, NULL, NULL, 294),
(606, 'Option 3', 1, NULL, NULL, NULL, 294),
(607, 'Option 4', 0, NULL, NULL, NULL, 294),
(608, 'Option 1', 0, NULL, NULL, NULL, 295),
(609, 'Option 2', 1, NULL, NULL, NULL, 295),
(610, 'Option 3', 0, NULL, NULL, NULL, 295),
(611, 'Option 4', 0, NULL, NULL, NULL, 295),
(612, 'Option 5', 0, NULL, NULL, NULL, 295),
(613, 'Option 1', 0, NULL, NULL, NULL, 296),
(614, 'Option 2', 1, NULL, NULL, NULL, 296),
(615, 'Option 3', 0, NULL, NULL, NULL, 296),
(616, 'Option 4', 0, NULL, NULL, NULL, 296),
(617, 'Option 5', 0, NULL, NULL, NULL, 296),
(618, 'Option 1', NULL, '1', NULL, NULL, 297),
(619, 'Option 2', NULL, '2', NULL, NULL, 297),
(620, 'Option 3', NULL, '3', NULL, NULL, 297),
(621, 'Option 1', 0, NULL, NULL, NULL, 298),
(622, 'Option 2', 0, NULL, NULL, NULL, 298),
(623, 'Option 3', 0, NULL, NULL, NULL, 298),
(624, 'Option 4', 1, NULL, NULL, NULL, 298),
(625, 'Option 1', 0, NULL, NULL, NULL, 299),
(626, 'Option 2', 0, NULL, NULL, NULL, 299),
(627, 'Option 3', 1, NULL, NULL, NULL, 299),
(628, 'Option 4', 0, NULL, NULL, NULL, 299),
(629, 'Option 1', 0, NULL, NULL, NULL, 300),
(630, 'Option 2', 0, NULL, NULL, NULL, 300),
(631, 'Option 3', 1, NULL, NULL, NULL, 300),
(632, 'Option 4', 0, NULL, NULL, NULL, 300),
(633, 'Option 1', 0, NULL, NULL, NULL, 301),
(634, 'Option 2', 0, NULL, NULL, NULL, 301),
(635, 'Option 3', 1, NULL, NULL, NULL, 301),
(636, 'Option 4', 0, NULL, NULL, NULL, 301),
(637, 'Option 1', 0, NULL, NULL, NULL, 302),
(638, 'Option 2', 0, NULL, NULL, NULL, 302),
(639, 'Option 3', 1, NULL, NULL, NULL, 302),
(640, 'Option 4', 0, NULL, NULL, NULL, 302),
(641, 'Option 1', 0, NULL, NULL, NULL, 303),
(642, 'Option 2', 0, NULL, NULL, NULL, 303),
(643, 'Option 3', 1, NULL, NULL, NULL, 303),
(644, 'Option 4', 0, NULL, NULL, NULL, 303),
(645, 'Option 1', 0, NULL, NULL, NULL, 304),
(646, 'Option 2', 1, NULL, NULL, NULL, 304),
(647, 'Option 3', 0, NULL, NULL, NULL, 304),
(648, 'Option 4', 0, NULL, NULL, NULL, 304),
(649, 'Option 1', 0, NULL, NULL, NULL, 305),
(650, 'Option 2', 0, NULL, NULL, NULL, 305),
(651, 'Option 3', 1, NULL, NULL, NULL, 305),
(652, 'Option 4', 0, NULL, NULL, NULL, 305),
(653, 'Option 1', 0, NULL, NULL, NULL, 306),
(654, 'Option 2', 1, NULL, NULL, NULL, 306),
(655, 'Option 3', 0, NULL, NULL, NULL, 306),
(656, 'Option 4', 0, NULL, NULL, NULL, 306),
(657, 'Option 5', 0, NULL, NULL, NULL, 306),
(658, 'Option 1', 0, NULL, NULL, NULL, 307),
(659, 'Option 2', 1, NULL, NULL, NULL, 307),
(660, 'Option 3', 0, NULL, NULL, NULL, 307),
(661, 'Option 4', 0, NULL, NULL, NULL, 307),
(662, 'Option 1', 0, NULL, NULL, NULL, 308),
(663, 'Option 2', 0, NULL, NULL, NULL, 308),
(664, 'Option 3', 0, NULL, NULL, NULL, 308),
(665, 'Option 4', 0, NULL, NULL, NULL, 308),
(666, 'Option 1', 0, NULL, NULL, NULL, 309),
(667, 'Option 2', 0, NULL, NULL, NULL, 309),
(668, 'Option 3', 1, NULL, NULL, NULL, 309),
(669, 'Option 4', 0, NULL, NULL, NULL, 309),
(670, 'Option 1', 0, NULL, NULL, NULL, 310),
(671, 'Option 2', 0, NULL, NULL, NULL, 310),
(672, 'Option 3', 1, NULL, NULL, NULL, 310),
(673, 'Option 4', 0, NULL, NULL, NULL, 310),
(674, 'Option 1', 0, NULL, NULL, NULL, 311),
(675, 'Option 2', 0, NULL, NULL, NULL, 311),
(676, 'Option 3', 1, NULL, NULL, NULL, 311),
(677, 'Option 4', 0, NULL, NULL, NULL, 311),
(678, 'Option 1', 0, NULL, NULL, NULL, 312),
(679, 'Option 2', 0, NULL, NULL, NULL, 312),
(680, 'Option 3', 1, NULL, NULL, NULL, 312),
(681, 'Option 4', 0, NULL, NULL, NULL, 312),
(682, 'Option 1', 0, NULL, NULL, NULL, 313),
(683, 'Option 2', 0, NULL, NULL, NULL, 313),
(684, 'Option 3', 1, NULL, NULL, NULL, 313),
(685, 'Option 4', 0, NULL, NULL, NULL, 313),
(686, 'Option 1', 0, NULL, NULL, NULL, 314),
(687, 'Option 2', 0, NULL, NULL, NULL, 314),
(688, 'Option 3', 1, NULL, NULL, NULL, 314),
(689, 'Option 4', 0, NULL, NULL, NULL, 314),
(690, 'Option 1', 0, NULL, NULL, NULL, 315),
(691, 'Option 2', 0, NULL, NULL, NULL, 315),
(692, 'Option 3', 0, NULL, NULL, NULL, 315),
(693, 'Option 4', 0, NULL, NULL, NULL, 315),
(694, 'Option 1', 0, NULL, NULL, NULL, 316),
(695, 'Option 2', 0, NULL, NULL, NULL, 316),
(696, 'Option 3', 1, NULL, NULL, NULL, 316),
(697, 'Option 4', 0, NULL, NULL, NULL, 316),
(698, 'Option 1', 0, NULL, NULL, NULL, 317),
(699, 'Option 2', 0, NULL, NULL, NULL, 317),
(700, 'Option 3', 0, NULL, NULL, NULL, 317),
(701, 'Option 4', 1, NULL, NULL, NULL, 317),
(702, 'Option 1', 0, NULL, NULL, NULL, 318),
(703, 'Option 2', 0, NULL, NULL, NULL, 318),
(704, 'Option 3', 0, NULL, NULL, NULL, 318),
(705, 'Option 4', 0, NULL, NULL, NULL, 318),
(706, 'Option 1', 1, NULL, NULL, NULL, 319),
(707, 'Option 2', 0, NULL, NULL, NULL, 319),
(708, 'Option 3', 0, NULL, NULL, NULL, 319),
(709, 'Option 4', 0, NULL, NULL, NULL, 319),
(710, 'Option 1', 0, NULL, NULL, NULL, 320),
(711, 'Option 2', 0, NULL, NULL, NULL, 320),
(712, 'Option 3', 0, NULL, NULL, NULL, 320),
(713, 'Option 4', 0, NULL, NULL, NULL, 320),
(714, 'Option 1', 0, NULL, NULL, NULL, 321),
(715, 'Option 2', 0, NULL, NULL, NULL, 321),
(716, 'Option 3', 1, NULL, NULL, NULL, 321),
(717, 'Option 4', 0, NULL, NULL, NULL, 321),
(718, 'Option 1', 0, NULL, NULL, NULL, 322),
(719, 'Option 2', 0, NULL, NULL, NULL, 322),
(720, 'Option 3', 1, NULL, NULL, NULL, 322),
(721, 'Option 4', 0, NULL, NULL, NULL, 322),
(722, 'Option 1', 0, NULL, NULL, NULL, 323),
(723, 'Option 2', 0, NULL, NULL, NULL, 323),
(724, 'Option 3', 1, NULL, NULL, NULL, 323),
(725, 'Option 4', 0, NULL, NULL, NULL, 323),
(726, 'Option 1', 0, NULL, NULL, NULL, 325),
(727, 'Option 2', 1, NULL, NULL, NULL, 325),
(728, 'Option 3', 0, NULL, NULL, NULL, 325),
(729, 'Option 4', 0, NULL, NULL, NULL, 325),
(730, 'Option 5', 0, NULL, NULL, NULL, 325),
(731, 'Option 1', 0, NULL, NULL, NULL, 326),
(732, 'Option 2', 0, NULL, NULL, NULL, 326),
(733, 'Option 3', 0, NULL, NULL, NULL, 326),
(734, 'Option 4', 1, NULL, NULL, NULL, 326),
(735, 'Option 1', 0, NULL, NULL, NULL, 327),
(736, 'Option 2', 0, NULL, NULL, NULL, 327),
(737, 'Option 3', 1, NULL, NULL, NULL, 327),
(738, 'Option 4', 0, NULL, NULL, NULL, 327),
(739, 'Option 1', 0, NULL, NULL, NULL, 328),
(740, 'Option 2', 1, NULL, NULL, NULL, 328),
(741, 'Option 3', 0, NULL, NULL, NULL, 328),
(742, 'Option 4', 0, NULL, NULL, NULL, 328),
(743, 'Option 5', 0, NULL, NULL, NULL, 328),
(744, 'Option 1', 0, NULL, NULL, NULL, 329),
(745, 'Option 2', 0, NULL, NULL, NULL, 329),
(746, 'Option 3', 1, NULL, NULL, NULL, 329),
(747, 'Option 4', 0, NULL, NULL, NULL, 329),
(748, 'Option 5', 1, NULL, NULL, NULL, 329),
(749, 'Option 1', NULL, '1', NULL, NULL, 330),
(750, 'Option 2', NULL, '2', NULL, NULL, 330),
(751, 'Option 3', NULL, '3', NULL, NULL, 330),
(752, 'Option 4', NULL, '4', NULL, NULL, 330),
(753, 'Option 5', NULL, '5', NULL, NULL, 330),
(754, 'Option 1', NULL, '1', NULL, NULL, 331),
(755, 'Option 2', NULL, '2', NULL, NULL, 331),
(756, 'Option 3', NULL, '3', NULL, NULL, 331),
(757, 'Option 4', NULL, '4', NULL, NULL, 331),
(758, 'Option 5', NULL, '5', NULL, NULL, 331),
(759, 'Option 6', NULL, '6', NULL, NULL, 331),
(760, 'Option 1', NULL, '1', NULL, NULL, 332),
(761, 'Option 2', NULL, '2', NULL, NULL, 332),
(762, 'Option 3', NULL, '3', NULL, NULL, 332),
(763, 'Option 4', NULL, '4', NULL, NULL, 332),
(764, 'Option 5', NULL, '5', NULL, NULL, 332),
(765, 'agent-5.jpg', NULL, NULL, NULL, NULL, 350),
(766, 'agent-6.jpg', NULL, NULL, NULL, NULL, 350),
(767, 'agent-7.jpg', NULL, NULL, NULL, NULL, 350),
(768, 'chlef.jpg', 1, NULL, NULL, NULL, 350),
(769, 'Option 1', NULL, '1', NULL, NULL, 351),
(770, 'Option 2', NULL, '2', NULL, NULL, 351),
(771, 'Option 3', NULL, '3', NULL, NULL, 351),
(772, 'Option 4', NULL, '4', NULL, NULL, 351),
(773, 'Option 5', NULL, '5', NULL, NULL, 351),
(774, 'Option 1', NULL, '1', NULL, NULL, 352),
(775, 'Option 2', NULL, '2', NULL, NULL, 352),
(776, 'Option 3', NULL, '3', NULL, NULL, 352),
(777, 'Option 4', NULL, '4', NULL, NULL, 352),
(778, 'Option', NULL, '3', NULL, NULL, 353),
(779, 'Option', NULL, '3', NULL, NULL, 354),
(780, 'Option 1', NULL, '1', NULL, NULL, 355),
(781, 'Option 2', NULL, '2', NULL, NULL, 355),
(782, 'Option 3', NULL, '3', NULL, NULL, 355),
(783, 'Option 1', 0, NULL, NULL, NULL, 359),
(784, 'Option 2', 0, NULL, NULL, NULL, 359),
(785, 'Option 3', 1, NULL, NULL, NULL, 359),
(786, 'Option 4', 0, NULL, NULL, NULL, 359),
(787, 'Option 1', NULL, '1', NULL, NULL, 360),
(788, 'Option 2', NULL, '2', NULL, NULL, 360),
(789, 'Option 3', NULL, '3', NULL, NULL, 360),
(790, 'about2.jpg', NULL, NULL, NULL, NULL, 361),
(791, 'about3.jpg', NULL, NULL, NULL, NULL, 361),
(792, 'agent-5.jpg', NULL, NULL, NULL, NULL, 361),
(793, 'agent-6.jpg', 1, NULL, NULL, NULL, 361),
(794, 'Option 1', NULL, '1', NULL, NULL, 362),
(795, 'Option 2', NULL, '2', NULL, NULL, 362),
(796, 'Option 3', NULL, '3', NULL, NULL, 362),
(797, 'Option 4', NULL, '4', NULL, NULL, 362),
(798, 'Option 1', NULL, '1', NULL, NULL, 363),
(799, 'Option 2', NULL, '2', NULL, NULL, 363),
(800, 'Option 3', NULL, '3', NULL, NULL, 363),
(801, 'Option 4', NULL, '4', NULL, NULL, 363),
(802, 'Option 1', NULL, '1', NULL, NULL, 364),
(803, 'Option 2', NULL, '2', NULL, NULL, 364),
(804, 'Option 3', NULL, '3', NULL, NULL, 364),
(805, 'Option 4', NULL, '4', NULL, NULL, 364),
(806, 'Option 1', NULL, '1', NULL, NULL, 365),
(807, 'Option 2', NULL, '2', NULL, NULL, 365),
(808, 'Option 3', NULL, '3', NULL, NULL, 365),
(809, 'Option 4', NULL, '4', NULL, NULL, 365),
(810, '0', 0, NULL, NULL, NULL, 366),
(811, '1', 0, NULL, NULL, NULL, 366),
(812, '2', 0, NULL, NULL, NULL, 366),
(813, '4', 1, NULL, NULL, NULL, 366),
(814, 'a color', 1, NULL, NULL, NULL, 367),
(815, 'a banana', 0, NULL, NULL, NULL, 367),
(816, 'a dance', 0, NULL, NULL, NULL, 367),
(817, 'food', 0, NULL, NULL, NULL, 367),
(818, 'Option 1', NULL, '1', NULL, NULL, 368),
(819, 'Option 2', NULL, '2', NULL, NULL, 368),
(820, 'Option 3', NULL, '3', NULL, NULL, 368),
(821, 'Option 4', NULL, '4', NULL, NULL, 368),
(822, 'Option 5', NULL, '5', NULL, NULL, 368),
(823, 'Option 1', NULL, '1', NULL, NULL, 369),
(824, 'Option 2', NULL, '2', NULL, NULL, 369),
(825, 'Option 3', NULL, '3', NULL, NULL, 369),
(826, 'Option 5', NULL, '5', NULL, NULL, 369),
(827, 'my', NULL, '1', NULL, NULL, 370),
(828, 'name', NULL, '2', NULL, NULL, 370),
(829, 'is', NULL, '3', NULL, NULL, 370),
(830, 'akram', NULL, '4', NULL, NULL, 370),
(831, '1.jpg', NULL, NULL, NULL, NULL, 371),
(832, 'about2.jpg', NULL, NULL, NULL, NULL, 371),
(833, 'alexandre-pellaes-6vAjp0pscX0-unsplash.jpg', NULL, NULL, NULL, NULL, 371),
(834, 'chlef.jpg', 1, NULL, NULL, NULL, 371),
(835, 'Option 1', NULL, '0', NULL, NULL, 385),
(836, 'Option 2', NULL, '1', NULL, NULL, 385),
(837, 'Option 3', NULL, '2', NULL, NULL, 385),
(838, 'Option 4', NULL, '3', NULL, NULL, 385),
(839, 'Option 1', NULL, '0', NULL, NULL, 389),
(840, 'Option 2', NULL, '1', NULL, NULL, 389),
(841, 'Option 3', NULL, '2', NULL, NULL, 389),
(842, 'Option 4', NULL, '3', NULL, NULL, 389),
(843, 'Option 1', NULL, '0', NULL, NULL, 390),
(844, 'Option 2', NULL, '1', NULL, NULL, 390),
(845, 'Option 3', NULL, '2', NULL, NULL, 390),
(846, 'Option 4', NULL, '3', NULL, NULL, 390),
(847, 'Option 1', NULL, '0', NULL, NULL, 391),
(848, 'Option 2', NULL, '1', NULL, NULL, 391),
(849, 'Option 3', NULL, '2', NULL, NULL, 391),
(850, 'Option 4', NULL, '3', NULL, NULL, 391),
(851, 'agent-5.jpg', NULL, NULL, NULL, NULL, 392),
(852, 'agent-6.jpg', NULL, NULL, NULL, NULL, 392),
(853, 'agent-7.jpg', NULL, NULL, NULL, NULL, 392),
(854, '391693257_290274147199281_5661641756283250544_n.jpg', 1, NULL, NULL, NULL, 392),
(855, 'Option 1', NULL, '0', NULL, NULL, 394),
(856, 'Option 2', NULL, '1', NULL, NULL, 394),
(857, 'Option 3', NULL, '2', NULL, NULL, 394),
(858, 'Option 4', NULL, '3', NULL, NULL, 394),
(859, 'Option 1', NULL, '0', NULL, NULL, 395),
(860, 'Option 2', NULL, '1', NULL, NULL, 395),
(861, 'Option 3', NULL, '2', NULL, NULL, 395),
(862, 'Option 4', NULL, '3', NULL, NULL, 395),
(863, '', NULL, '4', NULL, NULL, 395),
(864, '', NULL, '5', NULL, NULL, 395),
(865, 'Option 1', NULL, '0', NULL, NULL, 396),
(866, 'Option 2', NULL, '1', NULL, NULL, 396),
(867, 'Option 3', NULL, '2', NULL, NULL, 396),
(868, 'Option 4', NULL, '3', NULL, NULL, 396),
(869, '', NULL, '4', NULL, NULL, 396),
(870, 'Option 1', NULL, '0', NULL, NULL, 397),
(871, 'Option 2', NULL, '1', NULL, NULL, 397),
(872, 'Option 3', NULL, '2', NULL, NULL, 397),
(873, 'Option 4', NULL, '3', NULL, NULL, 397),
(874, 'Option 5', NULL, '4', NULL, NULL, 397),
(875, 'Option 6', NULL, '5', NULL, NULL, 397),
(876, 'my', NULL, '0', NULL, NULL, 398),
(877, 'name', NULL, '1', NULL, NULL, 398),
(878, 'is', NULL, '2', NULL, NULL, 398),
(879, 'akram', NULL, '3', NULL, NULL, 398),
(880, 'banana', NULL, '1', NULL, NULL, 399),
(881, 'one', NULL, '2', NULL, NULL, 399),
(882, 'bmw', NULL, '3', NULL, NULL, 399),
(883, 'gaz', NULL, '4', NULL, NULL, 399),
(884, 'Option 1', 0, NULL, NULL, NULL, 400),
(885, 'Option 2', 0, NULL, NULL, NULL, 400),
(886, 'Option 3', 0, NULL, NULL, NULL, 400),
(887, 'Option 4', 1, NULL, NULL, NULL, 400),
(888, 'i want to eat pizza', 0, NULL, NULL, NULL, 401),
(889, 'i eat want pizza', 0, NULL, NULL, NULL, 401),
(890, 'want i eat pizza', 0, NULL, NULL, NULL, 401),
(891, 'pizza i want to  eat', 0, NULL, NULL, NULL, 401),
(892, 'i want to eat pizza', 1, NULL, NULL, NULL, 402),
(893, 'i eat to pizza', 0, NULL, NULL, NULL, 402),
(894, 'i want pizza eat', 0, NULL, NULL, NULL, 402),
(895, 'pizza eat i want', 0, NULL, NULL, NULL, 402),
(896, 'segmented_image (1).jpeg', NULL, NULL, NULL, NULL, 404),
(897, 'segmented_image (4).jpeg', NULL, NULL, NULL, NULL, 404),
(898, 'segmented_image (3).jpeg', NULL, NULL, NULL, NULL, 404),
(899, 'segmented_image.jpeg', 1, NULL, NULL, NULL, 404),
(900, 'i want to eat pizza ', NULL, '1', NULL, NULL, 405),
(901, 'after that i have to drink cola', NULL, '2', NULL, NULL, 405),
(902, 'in the end i will go back home', NULL, '3', NULL, NULL, 405);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qcorrect`
--

CREATE TABLE `qcorrect` (
  `id` int(11) NOT NULL,
  `correct` varchar(255) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `oorder` varchar(255) DEFAULT NULL,
  `palette` varchar(255) DEFAULT NULL,
  `is_correct` tinyint(3) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `oorder`, `palette`, `is_correct`, `quiz_id`) VALUES
(25, 'Add your Multiple Choice question here', NULL, NULL, 0, 151),
(26, 'Add your Multiple Choice question here', NULL, NULL, 0, 152),
(27, 'Add your Multiple Choice question here', NULL, NULL, 0, 153),
(28, 'Add your Multiple Choice question here', NULL, NULL, 0, 154),
(29, NULL, NULL, '1', NULL, 156),
(30, NULL, NULL, '2', NULL, 156),
(31, NULL, NULL, '3', NULL, 156),
(32, NULL, NULL, '4', NULL, 156),
(33, NULL, NULL, '5', NULL, 156),
(34, NULL, NULL, '#cd4c4c', NULL, 158),
(35, NULL, NULL, '#8bf609', NULL, 158),
(36, NULL, NULL, '#16dac3', NULL, 158),
(37, NULL, NULL, '#98615d', NULL, 158),
(38, 'Question 1', NULL, '#f40b0b', NULL, 159),
(39, 'Question 2', NULL, '#fd0de1', NULL, 159),
(40, 'Question 3', NULL, '#072ce4', NULL, 159),
(41, 'Question 4', NULL, '#0ed3e1', NULL, 159),
(42, 'Question 5', NULL, '#199217', NULL, 159),
(43, 'what is 2 + 2 ?', NULL, NULL, 0, 160),
(44, 'Add your true / false question here 1', NULL, NULL, 0, 161),
(45, 'Add your true / false question here 2', NULL, NULL, 1, 161),
(46, 'Add your true / false question here 3', NULL, NULL, 0, 161),
(47, 'Add your true / false question here 4', NULL, NULL, 1, 161),
(48, 'Add your true / false question here 5', NULL, NULL, 0, 161),
(49, 'Add your Multiple Choice question here', NULL, NULL, 0, 162),
(50, 'Question 1', NULL, '#f70202', NULL, 163),
(51, 'Question 2', NULL, '#ec0977', NULL, 163),
(52, 'Question 3', NULL, '#6a05e6', NULL, 163),
(53, 'Question 4', NULL, '#07edd3', NULL, 163),
(54, 'Question 5', NULL, '#0fd287', NULL, 163),
(55, 'Question 6', NULL, '#a6f2bd', NULL, 163),
(56, 'Question 7', NULL, '#ec9e18', NULL, 163),
(57, 'Question 8', NULL, '#c0947c', NULL, 163),
(58, 'Add your Multiple Choice question here', NULL, NULL, 0, 164),
(59, 'Add your Multiple Choice question here', NULL, NULL, 0, 168),
(60, 'Add your true / false question here 1', NULL, NULL, 0, 169),
(61, 'Add your true / false question here 2', NULL, NULL, 0, 169),
(62, 'Add your true / false question here 3', NULL, NULL, 1, 169),
(63, 'Add your true / false question here 4', NULL, NULL, 0, 169),
(64, 'Add your true / false question here 5', NULL, NULL, 1, 169),
(65, 'Add your true / false question here 6', NULL, NULL, 0, 169),
(66, 'Add your Multiple Choice question here', NULL, NULL, 0, 170),
(67, 'Add your true / false question here 1', NULL, NULL, 1, 171),
(68, 'Add your true / false question here 2', NULL, NULL, 1, 171),
(69, 'Add your true / false question here 3', NULL, NULL, 0, 171),
(70, 'Add your true / false question here 4', NULL, NULL, 0, 171),
(71, 'Add your true / false question here 5', NULL, NULL, 0, 171),
(72, 'Add your Multiple Choice question here', NULL, NULL, 0, 172),
(73, 'Add your Multiple Choice question here', NULL, NULL, 0, 173),
(74, 'false', NULL, 'Add your Multiple Choice question here', NULL, 174),
(75, 'Add your Multiple Choice question here', NULL, NULL, 0, 175),
(76, 'Add your Multiple Choice question here', NULL, NULL, 0, 176),
(77, 'Add your Multiple Choice question here', NULL, NULL, 0, 177),
(78, 'Question 1', NULL, '1', NULL, 178),
(79, 'Question 2', NULL, '2', NULL, 178),
(80, 'Question 3', NULL, '3', NULL, 178),
(81, 'Question 4', NULL, '4', NULL, 178),
(82, 'Add your Multiple Choice question here', NULL, NULL, NULL, 186),
(83, 'Add your Multiple Choice question here', NULL, NULL, NULL, 191),
(84, 'Question 1', NULL, '1', NULL, 192),
(85, 'Question 2', NULL, '2', NULL, 192),
(86, 'Question 3', NULL, '3', NULL, 192),
(87, 'Question 4', NULL, '4', NULL, 192),
(88, 'Question 1', NULL, '1', NULL, 193),
(89, 'Question 2', NULL, '2', NULL, 193),
(90, 'Question 3', NULL, '3', NULL, 193),
(91, 'Question 4', NULL, '4', NULL, 193),
(92, '1', NULL, NULL, 0, 194),
(93, '2', NULL, NULL, 0, 194),
(94, '3', NULL, NULL, 0, 194),
(95, '4', NULL, NULL, 0, 194),
(96, '5', NULL, NULL, 0, 194),
(97, '1', NULL, NULL, 0, 195),
(98, '2', NULL, NULL, 0, 195),
(99, '3', NULL, NULL, 0, 195),
(100, '4', NULL, NULL, 0, 195),
(101, '5', NULL, NULL, 0, 195),
(102, '1', NULL, NULL, 0, 196),
(103, '2', NULL, NULL, 0, 196),
(104, '3', NULL, NULL, 0, 196),
(105, '4', NULL, NULL, 0, 196),
(106, '5', NULL, NULL, 0, 196),
(107, 'Question 1', '1', NULL, NULL, 200),
(108, 'Question 2', '2', NULL, NULL, 200),
(109, 'Question 3', '3', NULL, NULL, 200),
(110, 'Question 4', '4', NULL, NULL, 200),
(111, 'Question 5', '5', NULL, NULL, 200),
(112, 'Add your Multiple Choice question here', NULL, NULL, 0, 201),
(113, 'Add your Multiple Choice question here', NULL, NULL, 0, 202),
(114, 'Add your true / false question here 1', NULL, NULL, 1, 203),
(115, 'Add your true / false question here 2', NULL, NULL, 0, 203),
(116, 'Add your true / false question here 3', NULL, NULL, 1, 203),
(117, 'Add your true / false question here 4', NULL, NULL, 0, 203),
(118, 'Add your true / false question here 5', NULL, NULL, 1, 203),
(119, 'Add your true / false question here 1', NULL, NULL, 1, 204),
(120, 'Add your true / false question here 2', NULL, NULL, 0, 204),
(121, 'Add your true / false question here 3', NULL, NULL, 1, 204),
(122, 'Add your true / false question here 4', NULL, NULL, 0, 204),
(123, 'Add your true / false question here 5', NULL, NULL, 1, 204),
(124, 'Add your true / false question here 1', NULL, NULL, 0, 205),
(125, 'Add your true / false question here 2', NULL, NULL, 1, 205),
(126, 'Add your true / false question here 3', NULL, NULL, 0, 205),
(127, 'Add your true / false question here 4', NULL, NULL, 1, 205),
(128, 'Add your true / false question here 5', NULL, NULL, 1, 205),
(129, 'Add your true / false question here 1', NULL, NULL, 1, 206),
(130, 'Add your true / false question here 2', NULL, NULL, 1, 206),
(131, 'Add your true / false question here 3', NULL, NULL, 0, 206),
(132, 'Add your true / false question here 4', NULL, NULL, 1, 206),
(133, 'Add your true / false question here 5', NULL, NULL, 1, 206),
(134, 'Add your true / false question here 1', NULL, NULL, 1, 207),
(135, 'Add your true / false question here 2', NULL, NULL, 1, 207),
(136, 'Add your true / false question here 3', NULL, NULL, 0, 207),
(137, 'Add your true / false question here 4', NULL, NULL, 1, 207),
(138, 'Add your true / false question here 5', NULL, NULL, 1, 207),
(139, 'Add your true / false question here 1', NULL, NULL, 0, 208),
(140, 'Add your true / false question here 2', NULL, NULL, 0, 208),
(141, 'Add your true / false question here 3', NULL, NULL, 1, 208),
(142, 'Add your true / false question here 4', NULL, NULL, 0, 208),
(143, 'Add your true / false question here 1', NULL, NULL, 0, 209),
(144, 'Add your true / false question here 2', NULL, NULL, 1, 209),
(145, 'Add your true / false question here 3', NULL, NULL, 0, 209),
(146, 'Add your Multiple Choice question here', NULL, NULL, NULL, 210),
(147, 'Add your Multiple Choice question here', NULL, NULL, 0, 211),
(148, 'Question 1', '1', NULL, NULL, 212),
(149, 'Question 2', '2', NULL, NULL, 212),
(150, 'Question 3', '3', NULL, NULL, 212),
(151, 'Question 4', '4', NULL, NULL, 212),
(152, 'Question 5', '5', NULL, NULL, 212),
(153, 'Question 6', '6', NULL, NULL, 212),
(154, 'Question 7', '7', NULL, NULL, 212),
(155, '#ed0c0c', NULL, '#ed0c0c', 0, 213),
(156, '#ca02b9', NULL, '#ca02b9', 0, 213),
(157, '#72c60c', NULL, '#72c60c', 0, 213),
(158, '#16d6e3', NULL, '#16d6e3', 0, 213),
(159, '#3a0fd7', NULL, '#3a0fd7', 0, 213),
(160, 'Question 1', NULL, '#e81717', NULL, 219),
(161, 'Question 2', NULL, '#701515', NULL, 219),
(162, 'Question 3', NULL, '#2452db', NULL, 219),
(163, 'Question 4', NULL, '#09fb92', NULL, 219),
(164, 'Question 1', NULL, '#862d2d', NULL, 220),
(165, 'Question 2', NULL, '#ce2727', NULL, 220),
(166, 'Question 3', NULL, '#f47171', NULL, 220),
(167, 'Question 4', NULL, '#fbdada', NULL, 220),
(168, 'Question 1', NULL, '#fa0505', NULL, 221),
(169, 'Question 2', NULL, '#761bc0', NULL, 221),
(170, 'Question 3', NULL, '#1be421', NULL, 221),
(171, 'Question 4', NULL, '#d7e60a', NULL, 221),
(172, 'Question 1', NULL, '#fa0505', NULL, 222),
(173, 'Question 2', NULL, '#761bc0', NULL, 222),
(174, 'Question 3', NULL, '#1be421', NULL, 222),
(175, 'Question 4', NULL, '#d7e60a', NULL, 222),
(176, 'In the quiet stillness of the morning, as the first light breaks through the {1}, there is a moment of pure serenity. The world awakens {2}, birdsong filling the air with {3} of hope and {4}.', NULL, NULL, 0, 223),
(177, 'In the quiet {1} of the {2}, as the first light breaks through the darkness, there is a moment of pure serenity. The world awakens slowly, {3} filling the air with melodies of hope and promise.', NULL, NULL, 0, 228),
(178, 'In the quiet {1}of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The world awakens {2}, birdsong filling the air with {3} of hope and promise.', NULL, NULL, 0, 229),
(179, NULL, NULL, NULL, NULL, 233),
(180, NULL, NULL, NULL, NULL, 234),
(181, NULL, NULL, NULL, NULL, 244),
(182, 'In the quiet stillness of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The {1}awakens slowly, birdsong filling the air with {2}of hope and {3}.', NULL, NULL, NULL, 248),
(183, NULL, NULL, NULL, NULL, 249),
(184, 'Add your Multiple Choice question here', NULL, NULL, 0, 250),
(185, 'Add your Multiple Choice question here', NULL, NULL, NULL, 251),
(186, 'Add your Multiple Choice question here', NULL, NULL, 0, 252),
(187, 'Question 1', '1', NULL, NULL, 253),
(188, 'Question 2', '2', NULL, NULL, 253),
(189, 'Question 3', '3', NULL, NULL, 253),
(190, 'Question 4', '4', NULL, NULL, 253),
(191, 'Question 5', '5', NULL, NULL, 253),
(192, 'Question 1', '1', NULL, NULL, 254),
(193, 'Question 2', '2', NULL, NULL, 254),
(194, 'Question 3', '3', NULL, NULL, 254),
(195, 'Question 4', '4', NULL, NULL, 254),
(196, 'Question 5', '5', NULL, NULL, 254),
(197, 'In the quiet {1} of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The {2} awakens {3}, birdsong filling the air with {4} of hope and {}.', NULL, NULL, NULL, 255),
(198, 'In the {1} stillness of the morning, as the first light breaks through the {2}, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air {3} melodies of hope and promise.', NULL, NULL, NULL, 256),
(199, 'In the {1} stillness of the morning, as the first light breaks through the {2}, there is a moment of pure serenity. The world awakens {3}, birdsong filling the air with melodies of hope and {4}.', NULL, NULL, NULL, 257),
(200, 'In the quiet {1} of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air with {2} of hope and {3}.', NULL, NULL, NULL, 258),
(201, 'In the quiet {1} of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air with melodies of {2} and {3}.', NULL, NULL, NULL, 262),
(202, 'In the quiet {1} of the morning, as the first light breaks through the {2}, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air with melodies of hope and {3}.', NULL, NULL, NULL, 263),
(203, 'Add your Multiple Choice question here', NULL, NULL, 0, 264),
(204, 'Add your Multiple Choice question here', NULL, NULL, 0, 265),
(205, 'Add your Multiple Choice question here', NULL, NULL, 0, 268),
(206, 'Add your Multiple Choice question here', NULL, NULL, 0, 270),
(207, 'Add your Multiple Choice question here', NULL, NULL, 0, 272),
(208, 'Add your Multiple Choice question here', NULL, NULL, 0, 273),
(209, 'Add your true / false question here 1', NULL, NULL, 0, 274),
(210, 'Add your true / false question here 2', NULL, NULL, 1, 274),
(211, 'Add your true / false question here 3', NULL, NULL, 0, 274),
(212, 'Add your Multiple Choice question here', NULL, NULL, NULL, 275),
(213, 'Add your Multiple Choice question here', NULL, NULL, 0, 276),
(214, 'Question 1', '1', NULL, NULL, 277),
(215, 'Question 2', '2', NULL, NULL, 277),
(216, 'Question 3', '3', NULL, NULL, 277),
(217, 'Question 4', '4', NULL, NULL, 277),
(218, 'Question 1', NULL, '#f43434', NULL, 278),
(219, 'Question 2', NULL, '#d232e7', NULL, 278),
(220, 'Question 3', NULL, '#7bad05', NULL, 278),
(221, 'Question 4', NULL, '#0bcbe5', NULL, 278),
(222, 'In the quiet stillness of the morning, as the first light breaks through the {1}, there is a moment of pure serenity. The world awakens {2}, birdsong filling the air with melodies of hope and {3}.', NULL, NULL, NULL, 279),
(223, 'Add your Multiple Choice question here', NULL, NULL, 0, 280),
(224, 'Add your Multiple Choice question here', NULL, NULL, 0, 281),
(225, 'Add your Multiple Choice question here', NULL, NULL, 0, 282),
(226, 'Add your Multiple Choice question here', NULL, NULL, 0, 283),
(227, 'Add your Multiple Choice question here', NULL, NULL, 0, 285),
(228, 'Add your Multiple Choice question here', NULL, NULL, 0, 286),
(229, 'Add your Multiple Choice question here', NULL, NULL, 0, 287),
(230, 'Add your Multiple Choice question here', NULL, NULL, 0, 288),
(231, 'Add your Multiple Choice question here', NULL, NULL, 0, 289),
(232, 'Add your Multiple Choice question here', NULL, NULL, 0, 290),
(233, 'Add your Multiple Choice question here', NULL, NULL, 0, 291),
(234, 'Add your true / false question here 1', NULL, NULL, 0, 292),
(235, 'Add your true / false question here 2', NULL, NULL, 1, 292),
(236, 'Add your true / false question here 3', NULL, NULL, 0, 292),
(237, 'Add your Multiple Choice question here', NULL, NULL, 0, 293),
(238, 'Add your Multiple Choice question here', NULL, NULL, 0, 294),
(239, 'Add your Multiple Choice question here', NULL, NULL, 0, 295),
(240, 'Add your Multiple Choice question here', NULL, NULL, 0, 296),
(241, 'Add your Multiple Choice question here', NULL, NULL, 0, 297),
(242, 'Add your Multiple Choice question here', NULL, NULL, 0, 298),
(243, 'Add your Multiple Choice question here', NULL, NULL, 0, 299),
(244, 'Add your Multiple Choice question here', NULL, NULL, 0, 300),
(245, 'Add your Multiple Choice question here', NULL, NULL, 0, 301),
(246, 'Add your Multiple Choice question here', NULL, NULL, 0, 302),
(247, 'Add your Multiple Choice question here', NULL, NULL, 0, 303),
(248, 'Add your Multiple Choice question here', NULL, NULL, 0, 304),
(249, 'Add your Multiple Choice question here', NULL, NULL, 0, 305),
(250, 'Add your Multiple Choice question here', NULL, NULL, 0, 306),
(251, 'Add your Multiple Choice question here', NULL, NULL, 0, 307),
(252, 'Add your Multiple Choice question here', NULL, NULL, 0, 308),
(253, 'Add your Multiple Choice question here', NULL, NULL, 0, 309),
(254, 'Add your Multiple Choice question here', NULL, NULL, 0, 310),
(255, 'Add your Multiple Choice question here', NULL, NULL, 0, 311),
(256, 'Add your Multiple Choice question here', NULL, NULL, 0, 312),
(257, 'Add your Multiple Choice question here', NULL, NULL, 0, 313),
(258, 'Add your Multiple Choice question here', NULL, NULL, 0, 314),
(259, 'Add your Multiple Choice question here', NULL, NULL, 0, 315),
(260, 'Add your Multiple Choice question here', NULL, NULL, 0, 316),
(261, 'Add your Multiple Choice question here', NULL, NULL, 0, 317),
(262, 'Add your Multiple Choice question here', NULL, NULL, 0, 318),
(263, 'Add your Multiple Choice question here', NULL, NULL, 0, 319),
(264, 'Add your Multiple Choice question here', NULL, NULL, 0, 320),
(265, 'Add your Multiple Choice question here', NULL, NULL, 0, 321),
(266, 'Add your Multiple Choice question here', NULL, NULL, 0, 322),
(267, 'Add your Multiple Choice question here', NULL, NULL, 0, 323),
(268, 'Add your true / false question here 1', NULL, NULL, 0, 324),
(269, 'Add your true / false question here 2', NULL, NULL, 1, 324),
(270, 'Add your true / false question here 3', NULL, NULL, 0, 324),
(271, 'Add your Multiple Choice question here', NULL, NULL, 0, 325),
(272, 'Add your Multiple Choice question here', NULL, NULL, 0, 326),
(273, 'Add your Multiple Choice question here', NULL, NULL, 0, 327),
(274, 'Add your Multiple Choice question here', NULL, NULL, 0, 328),
(275, 'Add your Multiple Choice question here', NULL, NULL, 0, 329),
(276, 'Add your Multiple Choice question here', NULL, NULL, 0, 330),
(277, 'Add your Multiple Choice question here', NULL, NULL, 0, 331),
(278, 'Question 1', '1', NULL, NULL, 332),
(279, 'Question 2', '2', NULL, NULL, 332),
(280, 'Question 3', '3', NULL, NULL, 332),
(281, 'Question 4', '4', NULL, NULL, 332),
(282, 'Question 5', '5', NULL, NULL, 332),
(283, NULL, NULL, NULL, NULL, NULL),
(284, 'Add your Multiple Choice question here', NULL, NULL, NULL, 350),
(285, 'Add your Multiple Choice question here', NULL, NULL, 0, 351),
(286, 'Question 1', '1', NULL, NULL, 352),
(287, 'Question 2', '2', NULL, NULL, 352),
(288, 'Question 3', '3', NULL, NULL, 352),
(289, 'Question 4', '4', NULL, NULL, 352),
(290, 'In the quiet stillness of the morning, as the first light breaks {} the darkness, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air with {} of hope and {}.', NULL, NULL, NULL, 353),
(291, 'In the quiet {1} of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The world {2} slowly, birdsong filling the air with melodies of hope and {3}.', NULL, NULL, NULL, 354),
(292, 'In the quiet stillness of the morning, as the first light breaks {1} the darkness, there is a moment of pure serenity. The world awakens slowly, birdsong filling the air with melodies of {2} and {3}.', NULL, NULL, NULL, 355),
(293, 'i want to eat a banana', NULL, NULL, 0, 356),
(294, 'i want to eat pizza , i want to eat cake. ', NULL, NULL, 0, 357),
(295, 'i want to learn how to talk in english', NULL, NULL, 0, 358),
(296, 'Add your Multiple Choice question here', NULL, NULL, 0, 359),
(297, 'In the quiet stillness of the morning, as the first light breaks through the darkness, there is a moment of pure serenity. The {1} awakens slowly, birdsong filling the air with melodies of {2} and {3}.', NULL, NULL, NULL, 360),
(298, 'Add your Multiple Choice question here', NULL, NULL, NULL, 361),
(299, 'Question 1', '1', NULL, NULL, 362),
(300, 'Question 2', '2', NULL, NULL, 362),
(301, 'Question 3', '3', NULL, NULL, 362),
(302, 'Question 4', '4', NULL, NULL, 362),
(303, 'Add your Multiple Choice question here', NULL, NULL, 0, 363),
(304, 'Add your Multiple Choice question here', NULL, NULL, 0, 364),
(305, 'Add your Multiple Choice question here', NULL, NULL, 0, 365),
(306, 'what will be 2 + 2', NULL, NULL, 0, 366),
(307, 'what is yellow ?', NULL, NULL, 0, 367),
(308, 'Add your Multiple Choice question here', NULL, NULL, 0, 368),
(309, 'Add your Multiple Choice question here', NULL, NULL, 0, 369),
(310, 'what\'s your name ?', NULL, NULL, 0, 370),
(311, 'Add your Multiple Choice question here', NULL, NULL, NULL, 371),
(312, NULL, NULL, NULL, NULL, NULL),
(313, NULL, NULL, NULL, NULL, NULL),
(314, NULL, NULL, NULL, NULL, NULL),
(315, NULL, NULL, NULL, NULL, NULL),
(316, NULL, NULL, NULL, NULL, NULL),
(317, NULL, NULL, NULL, NULL, NULL),
(318, NULL, NULL, NULL, NULL, NULL),
(319, NULL, NULL, NULL, NULL, NULL),
(320, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 391),
(321, 'Add your Multiple Choice question here', NULL, NULL, NULL, 392),
(322, 'i want to be happy', NULL, NULL, 0, 393),
(323, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 394),
(324, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 395),
(325, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 396),
(326, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 397),
(327, 'Record (online-voice-recorder.com).mp3', NULL, NULL, NULL, 398),
(328, 'fruit', '1', NULL, NULL, 399),
(329, 'number', '2', NULL, NULL, 399),
(330, 'car', '3', NULL, NULL, 399),
(331, 'power', '4', NULL, NULL, 399),
(332, 'Add your Multiple Choice question here', NULL, NULL, 0, 400),
(333, 'what is the correct form ?', NULL, NULL, 0, 401),
(334, 'what is the correct form ?', NULL, NULL, 0, 402),
(335, 'i love to dance.', NULL, NULL, 0, 403),
(336, 'Add your Multiple Choice question here', NULL, NULL, NULL, 404),
(337, 'try to order it !', NULL, NULL, 0, 405);

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quiztype_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quizs`
--

INSERT INTO `quizs` (`id`, `title`, `description`, `quiztype_id`) VALUES
(113, 'Exam', 'Read carefully and answer the following questions. ', 1),
(114, 'Exam', 'Read carefully and answer the following questions. ', 1),
(115, 'Exam', 'Read carefully and answer the following questions. ', 1),
(116, 'Exam', 'Read carefully and answer the following questions. ', 1),
(117, 'Exam', 'Read carefully and answer the following questions. ', 1),
(118, 'Exam', 'Read carefully and answer the following questions. ', 1),
(119, 'Exam', 'Read carefully and answer the following questions. ', 1),
(120, 'Exam', 'Read carefully and answer the following questions. ', 1),
(121, 'Exam', 'Read carefully and answer the following questions. ', 1),
(122, 'Exam', 'Read carefully and answer the following questions. ', 1),
(123, 'Exam', 'Read carefully and answer the following questions. ', 1),
(124, 'Exam', 'Read carefully and answer the following questions. ', 1),
(125, 'Exam', 'Read carefully and answer the following questions. ', 1),
(126, 'Exam', 'Read carefully and answer the following questions. ', 1),
(127, 'Exam', 'Read carefully and answer the following questions. ', 1),
(128, 'Exam', 'Read carefully and answer the following questions. ', 1),
(129, 'Exam', 'Read carefully and answer the following questions. ', 1),
(130, 'Exam', 'Read carefully and answer the following questions. ', 3),
(131, 'Exam', 'Read carefully and answer the following questions. ', 3),
(132, 'Exam', 'Read carefully and answer the following questions. ', 3),
(133, 'Exam', 'Read carefully and answer the following questions. ', 3),
(134, 'Exam', 'Read carefully and answer the following questions. ', 3),
(135, 'Exam', 'Read carefully and answer the following questions. ', 3),
(136, 'Exam', 'Read carefully and answer the following questions. ', 3),
(137, 'Exam', 'Read carefully and answer the following questions. ', 3),
(138, 'Exam', 'Read carefully and answer the following questions. ', 3),
(139, 'Exam', 'Read carefully and answer the following questions. ', 3),
(140, 'Exam', 'Read carefully and answer the following questions. ', 3),
(141, 'Exam', 'Read carefully and answer the following questions. ', 3),
(142, 'Exam', 'Read carefully and answer the following questions. ', 3),
(143, 'Exam', 'Read carefully and answer the following questions. ', 3),
(144, 'Exam', 'Read carefully and answer the following questions. ', 3),
(145, 'Exam', 'Read carefully and answer the following questions. ', 3),
(146, 'Exam', 'Read carefully and answer the following questions. ', 3),
(147, 'Exam', 'Read carefully and answer the following questions. ', 3),
(148, 'Exam', 'Read carefully and answer the following questions. ', 5),
(149, 'Exam', 'Read carefully and answer the following questions. ', 5),
(150, 'Exam', 'Read carefully and answer the following questions. ', 5),
(151, 'Exam', 'Read carefully and answer the following questions. ', 5),
(152, 'Exam', 'Read carefully and answer the following questions. ', 5),
(153, 'Exam', 'Read carefully and answer the following questions. ', 5),
(154, 'Exam', 'Read carefully and answer the following questions. ', 5),
(155, 'Exam', 'Read carefully and answer the following questions. ', 4),
(156, 'Exam', 'Read carefully and answer the following questions. ', 4),
(157, 'Exam', 'Read carefully and answer the following questions. ', 4),
(158, 'Exam', 'Read carefully and answer the following questions. ', 4),
(159, 'Exam', 'Read carefully and answer the following questions. ', 4),
(160, 'Exam', 'Read carefully and answer the following questions. ', 1),
(161, 'Exam', 'Read carefully and answer the following questions. ', 3),
(162, 'Exam', 'Read carefully and answer the following questions. ', 5),
(163, 'Exam', 'Read carefully and answer the following questions. ', 4),
(164, 'Exam', 'Read carefully and answer the following questions. ', 1),
(165, 'Exam', 'Read carefully and answer the following questions. ', 1),
(166, 'Exam', 'Read carefully and answer the following questions. ', 1),
(167, 'Exam', 'Read carefully and answer the following questions. ', 1),
(168, 'Exam', 'Read carefully and answer the following questions. ', 1),
(169, 'Exam', 'Read carefully and answer the following questions. ', 3),
(170, 'Exam', 'Read carefully and answer the following questions. ', 1),
(171, 'Exam', 'Read carefully and answer the following questions. ', 3),
(172, 'Exam', 'Read carefully and answer the following questions. ', 1),
(173, 'Exam', 'Read carefully and answer the following questions. ', 7),
(174, 'Exam', 'Read carefully and answer the following questions. ', 7),
(175, 'Exam', 'Read carefully and answer the following questions. ', 7),
(176, 'Exam', 'Read carefully and answer the following questions. ', 5),
(177, 'Exam', 'Read carefully and answer the following questions. ', 5),
(178, 'Exam', 'Read carefully and answer the following questions. ', 4),
(179, 'Exam', 'Read carefully and answer the following questions. ', 2),
(180, 'Exam', 'Read carefully and answer the following questions. ', 2),
(181, 'Exam', 'Read carefully and answer the following questions. ', 2),
(182, 'Exam', 'Read carefully and answer the following questions. ', 2),
(183, 'Exam', 'Read carefully and answer the following questions. ', 2),
(184, 'Exam', 'Read carefully and answer the following questions. ', 2),
(185, 'Exam', 'Read carefully and answer the following questions. ', 2),
(186, 'Exam', 'Read carefully and answer the following questions. ', 2),
(187, 'Exam', 'Read carefully and answer the following questions. ', 2),
(188, 'Exam', 'Read carefully and answer the following questions. ', 2),
(189, 'Exam', 'Read carefully and answer the following questions. ', 2),
(190, 'Exam', 'Read carefully and answer the following questions. ', 2),
(191, 'Exam', 'Read carefully and answer the following questions. ', 2),
(192, 'Exam', 'Read carefully and answer the following questions. ', 4),
(193, 'Exam', 'Read carefully and answer the following questions. ', 8),
(194, 'Exam', 'Read carefully and answer the following questions. ', 8),
(195, 'Exam', 'Read carefully and answer the following questions. ', 8),
(196, 'Exam', 'Read carefully and answer the following questions. ', 8),
(197, 'Exam', 'Read carefully and answer the following questions. ', 8),
(198, 'Exam', 'Read carefully and answer the following questions. ', 8),
(199, 'Exam', 'Read carefully and answer the following questions. ', 8),
(200, 'Exam', 'Read carefully and answer the following questions. ', 8),
(201, 'Exam', 'Read carefully and answer the following questions. ', 1),
(202, 'Exam', 'Read carefully and answer the following questions. ', 7),
(203, 'Exam', 'Read carefully and answer the following questions. ', 3),
(204, 'Exam', 'Read carefully and answer the following questions. ', 3),
(205, 'Exam', 'Read carefully and answer the following questions. ', 3),
(206, 'Exam', 'Read carefully and answer the following questions. ', 3),
(207, 'Exam', 'Read carefully and answer the following questions. ', 3),
(208, 'Exam', 'Read carefully and answer the following questions. ', 3),
(209, 'Exam', 'Read carefully and answer the following questions. ', 3),
(210, 'Exam', 'Read carefully and answer the following questions. ', 2),
(211, 'Exam', 'Read carefully and answer the following questions. ', 5),
(212, 'Exam', 'Read carefully and answer the following questions. ', 8),
(213, 'Exam', 'Read carefully and answer the following questions. ', 4),
(214, 'Exam', 'Read carefully and answer the following questions. ', 4),
(215, 'Exam', 'Read carefully and answer the following questions. ', 4),
(216, 'Exam', 'Read carefully and answer the following questions. ', 4),
(217, 'Exam', 'Read carefully and answer the following questions. ', 4),
(218, 'Exam', 'Read carefully and answer the following questions. ', 4),
(219, 'Exam', 'Read carefully and answer the following questions. ', 4),
(220, 'Exam', 'Read carefully and answer the following questions. ', 4),
(221, 'Exam', 'Read carefully and answer the following questions. ', 4),
(222, 'Exam', 'Read carefully and answer the following questions. ', 4),
(223, 'Exam', 'Read carefully and answer the following questions. ', 1),
(224, 'Exam', 'Read carefully and answer the following questions. ', 1),
(225, 'Exam', 'Read carefully and answer the following questions. ', 1),
(226, 'Exam', 'Read carefully and answer the following questions. ', 1),
(227, 'Exam', 'Read carefully and answer the following questions. ', 6),
(228, 'Exam', 'Read carefully and answer the following questions. ', 6),
(229, 'Exam', 'Read carefully and answer the following questions. ', 6),
(230, 'Exam', 'Read carefully and answer the following questions. ', 6),
(231, 'Exam', 'Read carefully and answer the following questions. ', 6),
(232, 'Exam', 'Read carefully and answer the following questions. ', 6),
(233, 'Exam', 'Read carefully and answer the following questions. ', 6),
(234, 'Exam', 'Read carefully and answer the following questions. ', 6),
(235, 'Exam', 'Read carefully and answer the following questions. ', 6),
(236, 'Exam', 'Read carefully and answer the following questions. ', 6),
(237, 'Exam', 'Read carefully and answer the following questions. ', 6),
(238, 'Exam', 'Read carefully and answer the following questions. ', 6),
(239, 'Exam', 'Read carefully and answer the following questions. ', 6),
(240, 'Exam', 'Read carefully and answer the following questions. ', 6),
(241, 'Exam', 'Read carefully and answer the following questions. ', 6),
(242, 'Exam', 'Read carefully and answer the following questions. ', 6),
(243, 'Exam', 'Read carefully and answer the following questions. ', 6),
(244, 'Exam', 'Read carefully and answer the following questions. ', 6),
(245, 'Exam', 'Read carefully and answer the following questions. ', 6),
(246, 'Exam', 'Read carefully and answer the following questions. ', 6),
(247, 'Exam', 'Read carefully and answer the following questions. ', 6),
(248, 'Exam', 'Read carefully and answer the following questions. ', 6),
(249, 'Exam', 'Read carefully and answer the following questions. ', 6),
(250, 'Exam', 'Read carefully and answer the following questions. ', 7),
(251, 'Exam', 'Read carefully and answer the following questions. ', 2),
(252, 'Exam', 'Read carefully and answer the following questions. ', 5),
(253, 'Exam', 'Read carefully and answer the following questions. ', 8),
(254, 'Exam', 'Read carefully and answer the following questions. ', 8),
(255, 'Exam', 'Read carefully and answer the following questions. ', 6),
(256, 'Exam', 'Read carefully and answer the following questions. ', 6),
(257, 'Exam', 'Read carefully and answer the following questions. ', 6),
(258, 'Exam', 'Read carefully and answer the following questions. ', 6),
(259, 'Exam', 'Read carefully and answer the following questions. ', 6),
(260, 'Exam', 'Read carefully and answer the following questions. ', 6),
(261, 'Exam', 'Read carefully and answer the following questions. ', 6),
(262, 'Exam', 'Read carefully and answer the following questions. ', 6),
(263, 'Exam', 'Read carefully and answer the following questions. ', 6),
(264, 'Exam', 'Read carefully and answer the following questions. ', 1),
(265, 'Exam', 'Read carefully and answer the following questions. ', 1),
(266, 'Exam', 'Read carefully and answer the following questions. ', 1),
(267, 'Exam', 'Read carefully and answer the following questions. ', 1),
(268, 'Exam', 'Read carefully and answer the following questions. ', 1),
(269, 'Exam', 'Read carefully and answer the following questions. ', 1),
(270, 'Exam', 'Read carefully and answer the following questions. ', 1),
(271, 'Exam', 'Read carefully and answer the following questions. ', 1),
(272, 'Exam', 'Read carefully and answer the following questions. ', 1),
(273, 'Exam', 'Read carefully and answer the following questions. ', 7),
(274, 'Exam', 'Read carefully and answer the following questions. ', 3),
(275, 'Exam', 'Read carefully and answer the following questions. ', 2),
(276, 'Exam', 'Read carefully and answer the following questions. ', 5),
(277, 'Exam', 'Read carefully and answer the following questions. ', 8),
(278, 'Exam', 'Read carefully and answer the following questions. ', 4),
(279, 'Exam', 'Read carefully and answer the following questions. ', 6),
(280, 'Exam', 'Read carefully and answer the following questions. ', 1),
(281, 'Exam', 'Read carefully and answer the following questions. ', 1),
(282, 'Exam', 'Read carefully and answer the following questions. ', 1),
(283, 'Exam', 'Read carefully and answer the following questions. ', 1),
(284, 'Exam', 'Read carefully and answer the following questions. ', 1),
(285, 'Exam', 'Read carefully and answer the following questions. ', 1),
(286, 'Exam', 'Read carefully and answer the following questions. ', 1),
(287, 'Exam', 'Read carefully and answer the following questions. ', 1),
(288, 'Exam', 'Read carefully and answer the following questions. ', 1),
(289, 'test', 'Read carefully and answer the following questions. ', 1),
(290, 'Exaddm', 'Read carefully and answer the following questions. ', 1),
(291, 'Exam', 'Read carefully and answer the following questions. ', 7),
(292, 'Exam', 'Read carefully and answer the following questions. ', 3),
(293, 'Exam', 'Read carefully and answer the following questions. ', 1),
(294, 'Exam', 'Read carefully and answer the following questions. ', 1),
(295, 'Exam', 'Read carefully and answer the following questions. ', 1),
(296, 'Exam', 'Read carefully and answer the following questions. ', 1),
(297, 'Exam', 'Read carefully and answer the following questions. ', 5),
(298, 'Exam', 'Read carefully and answer the following questions. ', 1),
(299, 'Exam', 'Read carefully and answer the following questions. ', 1),
(300, 'Exam', 'Read carefully and answer the following questions. ', 1),
(301, 'Exam', 'Read carefully and answer the following questions. ', 1),
(302, 'Exam', 'Read carefully and answer the following questions. ', 1),
(303, 'Exam', 'Read carefully and answer the following questions. ', 1),
(304, 'Exam', 'Read carefully and answer the following questions. ', 1),
(305, 'Exam', 'Read carefully and answer the following questions. ', 1),
(306, 'Exam', 'Read carefully and answer the following questions. ', 1),
(307, 'Exam', 'Read carefully and answer the following questions. ', 1),
(308, 'Exam', 'Read carefully and answer the following questions. ', 1),
(309, 'Exam', 'Read carefully and answer the following questions. ', 1),
(310, 'Exam', 'Read carefully and answer the following questions. ', 1),
(311, 'Exam', 'Read carefully and answer the following questions. ', 1),
(312, 'Exam', 'Read carefully and answer the following questions. ', 1),
(313, 'Exam', 'Read carefully and answer the following questions. ', 1),
(314, 'Exam', 'Read carefully and answer the following questions. ', 1),
(315, 'Exam', 'Read carefully and answer the following questions. ', 1),
(316, 'Exam', 'Read carefully and answer the following questions. ', 1),
(317, 'Exam', 'Read carefully and answer the following questions. ', 1),
(318, 'Exam', 'Read carefully and answer the following questions. ', 1),
(319, 'Exam', 'Read carefully and answer the following questions. ', 1),
(320, 'Exam', 'Read carefully and answer the following questions. ', 1),
(321, 'Exam', 'Read carefully and answer the following questions. ', 1),
(322, 'Exam', 'Read carefully and answer the following questions. ', 1),
(323, 'Exam', 'Read carefully and answer the following questions. ', 1),
(324, 'Exam', 'Read carefully and answer the following questions. ', 3),
(325, 'Exam test ', 'Read carefully and answer the following questions. ', 1),
(326, 'Exam', 'Read carefully and answer the following questions. ', 1),
(327, 'text option ', 'Read carefully and answer the following questions. ', 1),
(328, 'Exam123', 'Read carefully and answer the following questions. ', 1),
(329, 'Exam2', 'Read carefully and answer the following questions. ', 1),
(330, 'Examkk', 'Read carefully and answer the following questions. ', 5),
(331, 'Examhh', 'Read carefully and answer the following questions. ', 5),
(332, 'Exam', 'Read carefully and answer the following questions. ', 8),
(333, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(334, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(335, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(336, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(337, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(338, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(339, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(340, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(341, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(342, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(343, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(344, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(345, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(346, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(347, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(348, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(349, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(350, 'Exam test ', 'Read carefully and answer the following questions. ', 2),
(351, 'Exam test ', 'Read carefully and answer the following questions. ', 5),
(352, 'Exam', 'Read carefully and answer the following questions. ', 8),
(353, 'Exam', 'Read carefully and answer the following questions. ', 6),
(354, 'Exam', 'Read carefully and answer the following questions. ', 6),
(355, 'Exam', 'Read carefully and answer the following questions. ', 6),
(356, 'Exam', 'Read carefully and answer the following questions. ', 10),
(357, 'Exam', 'Read carefully and answer the following questions. ', 10),
(358, 'Exam', 'Read carefully and answer the following questions. ', 10),
(359, 'Exam', 'Read carefully and answer the following questions. ', 1),
(360, 'Exam', 'Read carefully and answer the following questions. ', 6),
(361, 'Exam', 'Read carefully and answer the following questions. ', 2),
(362, 'Exam', 'Read carefully and answer the following questions. ', 8),
(363, 'Exam', 'Read carefully and answer the following questions. ', 5),
(364, 'Exam', 'Read carefully and answer the following questions. ', 5),
(365, 'Exam', 'Read carefully and answer the following questions. ', 5),
(366, 'text option', 'Read carefully and answer the following questions. ', 1),
(367, 'Text option 2', 'Read carefully and answer the following questions. ', 1),
(368, 'Exam', 'Read carefully and answer the following questions. ', 5),
(369, 'Exam', 'Read carefully and answer the following questions. ', 5),
(370, 'Exam', 'Read carefully and answer the following questions. ', 5),
(371, 'Exam', 'Read carefully and answer the following questions. ', 2),
(372, 'Exam', 'Read carefully and answer the following questions. ', 11),
(373, 'Exam', 'Read carefully and answer the following questions. ', 11),
(374, 'Exam', 'Read carefully and answer the following questions. ', 11),
(375, 'Exam', 'Read carefully and answer the following questions. ', 11),
(376, 'Exam', 'Read carefully and answer the following questions. ', 11),
(377, 'Exam', 'Read carefully and answer the following questions. ', 11),
(378, 'Exam', 'Read carefully and answer the following questions. ', 11),
(379, 'Exam', 'Read carefully and answer the following questions. ', 11),
(380, 'Exam', 'Read carefully and answer the following questions. ', 11),
(381, 'Exam', 'Read carefully and answer the following questions. ', 11),
(382, 'Exam', 'Read carefully and answer the following questions. ', 11),
(383, 'Exam', 'Read carefully and answer the following questions. ', 11),
(384, 'Exam', 'Read carefully and answer the following questions. ', 11),
(385, 'Exam', 'Read carefully and answer the following questions. ', 11),
(386, 'Exam', 'Read carefully and answer the following questions. ', 11),
(387, 'Exam', 'Read carefully and answer the following questions. ', 11),
(388, 'Exam', 'Read carefully and answer the following questions. ', 11),
(389, 'Exam', 'Read carefully and answer the following questions. ', 11),
(390, 'Exam', 'Read carefully and answer the following questions. ', 11),
(391, 'Exam', 'Read carefully and answer the following questions. ', 11),
(392, 'image ', 'Read carefully and answer the following questions. ', 2),
(393, 'record', 'Read carefully and answer the following questions. ', 10),
(394, 'Exam', 'Read carefully and answer the following questions. ', 11),
(395, 'Exam', 'Read carefully and answer the following questions. ', 11),
(396, 'Exam', 'Read carefully and answer the following questions. ', 11),
(397, 'Exam', 'Read carefully and answer the following questions. ', 11),
(398, 'listen to answer ', 'Read carefully and answer the following questions. ', 11),
(399, 'matching options', 'Read carefully and answer the following questions. ', 8),
(400, 'Exam', 'Read carefully and answer the following questions. ', 1),
(401, 'text option', 'Read carefully and answer the following questions. ', 1),
(402, 'text option 2', 'Read carefully and answer the following questions. ', 1),
(403, 'audio quiz', 'Read carefully and answer the following questions. ', 10),
(404, 'image option', 'Read carefully and answer the following questions. ', 2),
(405, 'ordering quiz', 'Read carefully and answer the following questions. ', 5);

-- --------------------------------------------------------

--
-- Structure de la table `quiztypes`
--

CREATE TABLE `quiztypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quiztypes`
--

INSERT INTO `quiztypes` (`id`, `type`) VALUES
(1, 'text options'),
(2, 'image options '),
(3, 'true false'),
(4, 'match'),
(5, 'ordering'),
(6, 'fil in the blanks'),
(7, 'dropdown'),
(8, 'base match'),
(9, 'vedio options'),
(10, 'record and answer'),
(11, 'listen and answer');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'student'),
(2, 'admin'),
(3, 'instructor');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `point` varchar(255) DEFAULT NULL,
  `attempt` varchar(255) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `faild` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shorts`
--

CREATE TABLE `shorts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `short_type_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `shorts`
--

INSERT INTO `shorts` (`id`, `title`, `description`, `video`, `short_type_id`, `quiz_id`) VALUES
(11, 'test 1', 'TEST 1', 'Snaptik.app_6864584376760487173.mp4', NULL, 327),
(12, 'test 2', 'test 2', 'Snaptik.app_6854236935838272774.mp4', NULL, 327),
(13, 'test 3 ', 'test 3', 'Snaptik.app_6863818697279065349.mp4', NULL, 327),
(14, 'test 4', 'test 4', 'Snaptik.app_7247943134053797126.mp4', NULL, 327),
(15, 'test 5 ', 'test 5 ', 'Snaptik.app_7007505790697311490.mp4', NULL, 327),
(16, 'test 6', 'test 6', 'Snaptik.app_6954762311697435905.mp4', NULL, 327),
(20, 'short 1', 'short 1', 'recording-2024-04-23-22-44-22.webm', NULL, 327);

-- --------------------------------------------------------

--
-- Structure de la table `short_types`
--

CREATE TABLE `short_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `marital_status` enum('single','married','divorced','other') NOT NULL,
  `is_active` tinyint(3) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `location_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attachment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `phone_number`, `email`, `username`, `password`, `birth_date`, `profile_picture`, `marital_status`, `is_active`, `bio`, `role_id`, `location_id`, `course_id`, `product_id`, `attachment_id`) VALUES
(32, 'admin', 'admin', 'male', '0000000', 'admin@gmail.com', 'admin', '$2y$10$kDb7XsosC1QWV8J51ZZDfOnff9zzWoI5NchvKeUX0VE3EZZhDCkvG', '2024-02-14', 'become_instructor_banner.jpg', 'single', 0, '', 2, 0, 3, 0, 0),
(33, 'akram', 'azizi', 'male', '0781533245', 'akram@gmail.com', 'akrammed', '$2y$10$X9EReEH62fQqtFl4jAAAge4UgMSGkt0Zwrm4pq.H5IVvmSJy5S0he', '2024-03-14', '', 'single', 0, '', 1, 0, 3, 0, 0),
(34, 'med', 'med', 'male', '098278739', 'med@gmail.com', 'med', '$2y$10$/FQVSufoM5Sn1SCArwxEueBMEYqWBM/PPJlYcYwGJHXkkIqQuOi0O', NULL, '', 'single', 0, '', 1, 0, 3, 0, 0),
(35, 'medtes', 'medtes', 'male', '0781533245', 'testtest@gmail.com', 'testmed', '$2y$10$SkbVYOAGKRSSAORzAiBZL.Y8gNuZitjJ17QWyIHRnUWGhcIZl1qEq', NULL, '', 'single', 0, '', 1, 0, 3, 0, 0),
(36, 'akramuuuy', 'mohammeduuyyy', 'male', '+213553977596', 'test01@gmail.com', 'test01@gmail.com', '$2y$10$UeSwwD95inuveCUqUu8y5um7w5W/61F1p7k2ZsR.6VS00kEEJ0i7K', NULL, '', 'single', 0, '', 1, 0, 3, 0, 0),
(37, 'nari5', 'nari5', 'male', '0781533245', 'nari6@gmail.com', 'nari6', '$2y$10$k.tnWIdj.O8RYVDTdCjbteMxg.OxLY31Va8WHK6Pt8agS8GrS/8jy', '2024-04-19', '', 'single', 0, '', 1, 0, 0, 0, 0),
(38, 'nt', 'nt', 'male', '0781533245', 'nt@gmail.com', 'nt', '$2y$10$Bjo2Kr6qwZRbFbYQ2rtVeeN9wDnMj4MXC7IGefmMHFxiuxASu2HTS', '2024-04-11', '', 'single', 0, '', 1, 0, 0, 0, 0),
(39, 'tr', 'tr', 'male', '0781533245', 'tr@gmail.com', 'tr', '$2y$10$Zo8AaBmFrRE9jAJHbRkShOTg0/nOH7.s8Lm/EuZk/DpZ4IJUXBWMO', '2024-04-18', '', 'single', 0, '', 1, 0, 0, 0, 0),
(40, 'tr98', 'tr89', 'male', '0781533245', 't89r@gmail.com', 'tr898', '$2y$10$SceJ9xOp5XueqKnyzqCnOuIktZ/Y/ATK6jHlvX9RrjBMTOc/8fIjW', '2024-04-18', '', 'single', 0, '', 1, 0, 0, 0, 0),
(41, 'aktr', 'aktr', 'male', '0781533245', 'aktr@gmail.com', 'admin@gmail.com', '$2y$10$Ing4NkWmofjZP08XbGYHEOww7mc8tk2qX19H7x8Uyainb2bNQN3Oi', '2024-04-18', '', 'single', 0, '', 1, 0, 0, 0, 0),
(42, 'test123', 'test123', 'male', '0781533245', 'test123@gmail.com', 'test123', '$2y$10$Cg/fiwv5oXdhJGd/Z6c61uJTW59YW0HIHvNSic0RAl6WtnWbCMLza', '2024-04-25', '', 'single', 0, '', 1, 0, 0, 0, 0),
(43, 'tew', 'tew', 'male', '0781533245', 'tew@gmail.com', 'tew', '$2y$10$xMumoCT6P/15Xur2h86JL.cdJbzbUf2KPuXh8Mv3Z8RS89Rt.VXee', '2024-04-12', '', 'single', 0, '', 1, 0, 0, 0, 0),
(44, 'kljsa7890987', 'lkjh', 'male', '0781533245', 'test7654@gmailcom', 'test tese', '$2y$10$vZ.tJp1Rwi7Yvg9Dhykby.XwmnLejJfCVvPWNQasZSAICnD5qUxhG', '2024-05-02', '', 'single', 0, '', 1, 0, 0, 0, 0),
(45, 'tesakram', 'tesakram', 'male', '0781533245', 'tesakram@gmail.com', 'tesakram', '$2y$10$UpxJN3pYwF0vuOO6Y9rjJ.EjyvT5ZLt5SvryFwvnnTKFHJuyaptRq', '2024-04-19', '', 'single', 0, '', 1, 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `qcorrect`
--
ALTER TABLE `qcorrect`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quiztypes`
--
ALTER TABLE `quiztypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shorts`
--
ALTER TABLE `shorts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `short_types`
--
ALTER TABLE `short_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;

--
-- AUTO_INCREMENT pour la table `qcorrect`
--
ALTER TABLE `qcorrect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT pour la table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT pour la table `quiztypes`
--
ALTER TABLE `quiztypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `shorts`
--
ALTER TABLE `shorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `short_types`
--
ALTER TABLE `short_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
