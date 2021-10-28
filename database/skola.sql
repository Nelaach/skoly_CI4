-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 27. říj 2021, 23:06
-- Verze serveru: 10.4.6-MariaDB
-- Verze PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `skoly`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `skola`
--

CREATE TABLE `skola` (
  `id` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `mesto` int(11) NOT NULL,
  `geo-lat` double NOT NULL,
  `geo-long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `skola`
--

INSERT INTO `skola` (`id`, `nazev`, `mesto`, `geo-lat`, `geo-long`) VALUES
(1, 'ZŠ Na Výsluní Uherský Brod\r\n', 2, 49.032687, 17.643536),
(2, 'Katolická základní škola Uherský Brod', 2, 49.022996, 17.649707),
(3, 'ZŠ Mariánské náměstí Uherský Brod', 2, 49.026235, 17.645464),
(4, 'ZŠ Pod Vinohrady Uherský Brod', 2, 49.026792, 17.653584),
(5, 'ZŠ Za Alejí Uherské Hradiště', 1, 49.068425, 17.449208),
(6, 'ZŠ Sportovní Uherské Hradiště', 1, 49.067784, 17.472572),
(7, 'ZŠ UNESCO Uherské Hradiště', 1, 49.067068, 17.460288),
(8, 'Academic School Uherské Hradiště', 1, 49.070963, 17.47193),
(9, 'ZŠ Palackého náměstí Uherské Hradiště', 1, 49.068893, 17.464523),
(10, 'ZŠ Traplice', 6, 49.136834, 17.433056),
(11, 'ZŠ Bílovice', 7, 49.101508, 17.54614),
(12, 'ZŠ Buchlovice', 8, 49.086178, 17.342145),
(13, 'ZŠ Osvětimany', 9, 49.056656, 17.255367),
(14, 'ZŠ Jana Ámose Komenského Nivnice', 10, 48.972221, 17.648486),
(15, 'ZŠ Bystřice pod Lopeníkem', 11, 48.975716, 17.755046),
(16, 'ZŠ Kněžpole', 12, 49.099497, 17.517719),
(17, 'ZŠ Kudlovice', 13, 49.127723, 17.45417),
(18, 'ZŠ Huštěnovice', 14, 49.106862, 17.466343),
(19, 'ZŠ Podolí', 15, 49.040681, 17.529285),
(20, 'ZŠ Popovice', 16, 49.052241, 17.526111),
(21, 'ZŠ Suchá loz', 17, 48.970431, 17.708283),
(22, 'ZŠ Zlechov', 18, 49.072126, 17.382849),
(23, 'ZŠ Jana Ámose Komenského Komňa', 19, 48.995911, 17.799093),
(24, 'ZŠ Jalubí', 20, 49.118043, 17.422192),
(25, 'ZŠ Březová', 21, 48.930711, 17.74298),
(26, 'ZŠ Korytná', 22, 48.941024, 17.664368),
(27, 'ZŠ Nezdenice', 23, 49.02038, 17.752949),
(28, 'ZŠ Uherský Brod-Újezdec', 2, 49.035849, 17.681992),
(29, 'ZŠ Březolupy', 24, 49.121495, 17.580047),
(30, 'ZŠ Ostrožská Lhota', 25, 48.974706, 17.471946),
(31, 'ZŠ Prakšice', 26, 49.071194, 17.635102),
(32, 'ZŠ Starý Hrozenkov', 27, 48.969213, 17.858509),
(33, 'ZŠ Tupesy', 28, 49.084244, 17.370199),
(34, 'ZŠ Vlčnov', 29, 49.009816, 17.577585),
(35, 'ZŠ Ořechov', 30, 49.111637, 16.514285),
(36, 'ZŠ Větrná Uherské Hradiště', 1, 49.05876, 17.481068),
(37, 'ZŠ Bojkovice', 5, 49.03941, 17.806166),
(38, 'ZŠ Čtverka Uherský Brod', 2, 49.029619, 17.641927),
(39, 'ZŠ Dolní Němčí', 31, 48.971502, 17.587564),
(40, 'ZŠ Strání', 32, 48.902958, 17.709254),
(41, 'ZŠ Velehrad', 33, 49.104735, 17.392907),
(42, 'ZŠ Josefa Bublíka Bánov', 34, 48.99108, 17.719595),
(43, 'ZŠ Hradčovice', 35, 49.047455, 17.58041),
(44, 'ZŠ Nedakonice', 36, 49.031417, 17.38553),
(45, 'ZŠ Mistřice', 37, 49.088316, 17.534151),
(46, 'ZŠ Topolná', 38, 49.12012, 17.542462),
(47, 'ZŠ Záhorovice', 39, 49.022917, 17.779082),
(48, 'ZŠ Horní Němčí', 40, 48.929706, 17.627129),
(49, 'ZŠ Pitín', 41, 49.038549, 17.850321),
(50, 'ZŠ Babice', 42, 49.118311, 17.476069),
(51, 'ZŠ Tomáše Garrigue Masaryka Bojkovice', 5, 49.039504, 17.806177),
(52, 'ZŠ Františka Horenského Boršice', 43, 49.063542, 17.353148),
(53, 'ZŠ Hluk', 4, 48.988244, 17.527682),
(54, 'ZŠ Ostrožská Nová Ves', 44, 49.003064, 17.43651),
(55, 'ZŠ Polešovice', 45, 49.030146, 17.342677),
(56, 'ZŠ Šumice', 46, 49.028556, 17.722397),
(57, 'ZŠ Staré Město', 47, 49.077543, 17.435019),
(58, 'ZŠ Kunovice Červená cesta', 48, 49.038548, 17.462964),
(59, 'ZŠ Uherský Ostroh', 3, 48.987818, 17.398587),
(60, 'ZŠ Kunovice U Pálenice', 48, 49.038361, 17.462924),
(61, 'ZŠ Spytihněv', 49, 49.143222, 17.49648),
(62, '1. ZŠ Napajedla', 50, 49.173254, 17.515332),
(63, '2. ZŠ Napajedla', 50, 49.172917, 17.516327),
(64, 'ZŠ Trávníky Otrokovice', 51, 49.204245, 17.544488),
(65, 'ZŠ Tomáše Garrigue Masaryka Otrokovice', 51, 49.211614, 17.534475),
(66, 'ZŠ Mánesova Otrokovice', 51, 49.217188, 17.510897),
(67, 'ZŠ Hutník Veselí nad Moravou', 52, 48.95255, 17.395032),
(68, 'ZŠ Kollárova Veselí nad Moravou', 52, 48.948504, 17.387076),
(69, 'ZŠ Louka', 53, 48.914866, 17.490728),
(70, 'ZŠ Lipov', 54, 48.904949, 17.461065),
(71, 'Masarykova ZŠ Velká nad Veličkou', 55, 48.88106, 17.514764),
(72, 'ZŠ Bzenec', 56, 48.972026, 17.27928),
(73, 'ZŠ Moravský Písek', 57, 48.989489, 17.331987),
(74, 'ZŠ Strážnice', 58, 48.898208, 17.306833),
(75, 'ZŠ Vnorovy', 59, 48.927428, 17.346391),
(76, 'Církevní ZŠ Veselí nad Moravou', 52, 48.949638, 17.37928),
(77, 'ZŠ Blatnice pod svatým Antoníkem', 60, 48.944554, 17.467152),
(78, 'ZŠ Vracov', 61, 48.979731, 17.20853),
(79, 'ZŠ Jana Ámose Komenského Žeravice', 62, 49.023317, 17.235676),
(80, 'ZŠ Halenkovice', 63, 49.172054, 17.471204),
(81, 'ZŠ Kuželov', 64, 48.863002, 17.482793),
(82, 'ZŠ Střílky', 65, 49.139728, 17.213939),
(83, 'ZŠ Luhačovice', 66, 49.1008, 17.754087),
(84, 'Gymnázium Uherské Hradiště', 1, 49.070716, 17.463067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
