-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 mei 2022 om 11:13
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen_database`
--
CREATE DATABASE IF NOT EXISTS `examen_database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examen_database`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `register`
--

CREATE TABLE `register` (
  `id` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `reisid` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `opmerking` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `register`
--

INSERT INTO `register` (`id`, `studentid`, `reisid`, `identity`, `opmerking`) VALUES
('0369d922-b29c-4601-a759-7c2b4959b7ad', '84669', '7d1980f0-b984-40ef-99b2-db396ee8baec', '301470558', 'Gaat slech om met bijen	Gaat slech om met bijen	\n'),
('67059d9b-292f-4ad4-8dc2-34efbd2cd43b', '84669', 'ae31c786-ee12-406a-90f0-bda146c85f02', '301470558', 'Gaat slech om met bijen	Gaat slech om met bijen	\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `id` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bestemming` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `text` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `max` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`id`, `titel`, `bestemming`, `begindatum`, `einddatum`, `text`, `image`, `max`) VALUES
('7d1980f0-b984-40ef-99b2-db396ee8baec', 'Op naar Frankrijk En snel een beetje', 'Parijs', '2022-06-05', '2022-07-06', '<p>Parijs is een mooie stad The End.</p>', 'uploads/62836b55d3634_62836b55d3636.jpeg', '1'),
('ae31c786-ee12-406a-90f0-bda146c85f02', 'Nog meer Parijs', 'Barcelona', '2022-02-05', '2022-04-05', '<p><strong>Barcelona</strong>&nbsp;is de op een na grootste stad van Spanje. Alleen de hoofdstad&nbsp;<a title=\"Madrid (stad)\" href=\"https://nl.wikipedia.org/wiki/Madrid_(stad)\">Madrid</a>&nbsp;telt meer inwoners. Het is de hoofdstad van de autonome regio (Comunitat Aut&ograve;noma)&nbsp;<a title=\"Cataloni&euml;\" href=\"https://nl.wikipedia.org/wiki/Cataloni%C3%AB\">Cataloni&euml;</a>&nbsp;en van de&nbsp;<a title=\"Barcelona (provincie)\" href=\"https://nl.wikipedia.org/wiki/Barcelona_(provincie)\">provincie Barcelona</a>. De stad heeft 1.620.809 (2017) inwoners en een oppervlakte van 101,4&nbsp;km&sup2;.<sup id=\"cite_ref-1\" class=\"reference\"><a href=\"https://nl.wikipedia.org/wiki/Barcelona_(Spanje)#cite_note-1\">[1]</a></sup>&nbsp;In de&nbsp;<a title=\"Metropool (stad)\" href=\"https://nl.wikipedia.org/wiki/Metropool_(stad)\">metropool</a>&nbsp;<a title=\"Metropool Barcelona\" href=\"https://nl.wikipedia.org/wiki/Metropool_Barcelona\">Barcelona</a>&nbsp;(de stad en haar&nbsp;<a title=\"Voorstad\" href=\"https://nl.wikipedia.org/wiki/Voorstad\">voorsteden</a>) wonen 6.842.771 (2017) mensen.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../uploads/62836b55d3634_62836b55d3636.jpeg\" alt=\"\" width=\"372\" height=\"246\"></p>\r\n<p>Naast parijs kun je nog veel meer dingen doen.</p>', 'uploads/628499a8d7c82_628499a8d7c83.jpeg', '5');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `opmerking` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `realname`, `email`, `identity`, `opmerking`, `password`, `profile`, `role`) VALUES
('79a2af22-cbd4-40c3-b291-04867c6bddc4', 'Geurtje', 'Yorik Geurts', 'geurts@glr.nl', '301470553', 'Geen', '$2y$10$YDIz8GtCbqPn4B2GfZYPpORVFSqpQ3TyHtR1ynY.FcaZWdmW.de/S', 'uploads/simg/628347f061668_628347f06166a.png', '1'),
('84669', '84669', 'Pjotr', '84669@glr.nl', '301470558', 'Gaat slech om met bijen	Gaat slech om met bijen	\n', '$2y$10$SKsd4ZWj7ma83295IDlYN.zB1TlOyWND66XAemuwlMhrG3tHPaMnK', 'uploads/simg/628370f3827f7_628370f3827f9.jpeg', '0');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
