-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 août 2019 à 14:18
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeanforteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `lien_image1` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `sentence`, `content`, `date`, `author_id`, `category_id`, `lien_image1`) VALUES
(1, 'Bienvenue sur le site !', 'Faisons connaissance… Je me présente, ainsi que le blog ! Qui se cache derrière l\'aventurier ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nobis aliter videtur, recte secusne, postea; Quod iam a me expectare noli. Sint ista Graecorum; Duo Reges: constructio interrete. Reguli reiciendam; Consequens enim est et post oritur, ut dixi. ', '2019-07-05 10:59:41', 1, 1, 'http://localhost/JeanForteroche/assets/images/alaska.jpg'),
(3, 'Le voyage', 'L’Alaska c’est un lieu hors du temps, un endroit mythique, encore difficilement accessible et surtout un vrai paradis naturel.', 'Quid enim possumus hoc agere divinius? Duo Reges: constructio interrete. Ut optime, secundum naturam affectum esse possit. Num quid tale Democritus? Nummus in Croesi divitiis obscuratur, pars est tamen divitiarum. Faceres tu quidem, Torquate, haec omnia; ', '2019-07-05 14:38:14', 2, 2, 'http://localhost/JeanForteroche/assets/images/alaska-lac.jpg'),
(2, 'Les préparatifs', 'On dit parfois que l’Alaska est le “voyage d’une vie”. C’est vrai en terme de paysages extraordinaires à découvrir, mais aussi en ce qui concerne la préparation.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nobis aliter videtur, recte secusne, postea; Quod iam a me expectare noli. Sint ista Graecorum; Duo Reges: constructio interrete. Reguli reiciendam; Consequens enim est et post oritur, ut dixi. ', '2019-07-05 11:02:10', 2, 2, 'http://localhost/JeanForteroche/assets/images/ski-alaska.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `category`) VALUES
(1, 'admins'),
(2, 'members');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`, `email`, `date_inscription`, `id_groupe`) VALUES
(1, 'Admin', 'admin', 'admin@admin.fr', '2019-07-03', 1),
(2, 'Franck', 'toto', 'franck@laposte.net', '2019-07-16', 2),
(3, 'Elo', 'test', 'elo@gmail.com', '2019-07-22', 2);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `members_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `post`, `date_post`, `members_id`, `post_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quid est igitur, inquit, quod requiras? Quis est tam dissimile homini. Bonum incolumis acies: misera caecitas. ', '2019-07-05 11:50:15', 1, 1),
(2, 'Sumenda potius quam expetenda. Age sane, inquam. Nunc vides, quid faciat. Igitur ne dolorem quidem. \r\n', '2019-07-05 11:50:15', 2, 2),
(3, 'Test de post', '2019-07-19 11:19:39', 2, 1),
(4, '<h1>Test de post 2</h1>', '2019-07-19 11:19:39', 1, 1),
(5, 'test de com', '2019-07-27 13:55:41', 1, 3),
(6, 'coucou', '2019-07-28 14:28:04', 1, 3),
(7, 'coucou', '2019-08-02 11:51:00', 1, 1),
(8, 'coucou 2', '2019-08-02 12:01:46', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
