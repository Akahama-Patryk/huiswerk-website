-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 jun 2019 om 11:33
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_huiswerk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `homework`
--

CREATE TABLE `homework` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `homework`
--

INSERT INTO `homework` (`id`, `title`, `description`, `subject_id`, `deadline`) VALUES
('1', 'C# toets', 'C# toets voor game development (2 weken geleden oefentoets gehad).', 4, '06-06-19'),
('2', 'Unit 4 toets', 'Leer woorden en zinnen van Unit 4.', 9, '07-06-19'),
('3', 'H2 van Media maken', '', 6, '07-06-19');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(9) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_abbreviation` varchar(255) NOT NULL,
  `subject_teacher_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_abbreviation`, `subject_teacher_id`) VALUES
(1, 'Realiseren en Ontwerpen', 'REONT', 3),
(2, 'Development', 'DEVEL', 4),
(3, 'Keuzedeel: Front End Development', 'FRONTEND', 2),
(4, 'Keuzedeel: Game Development', 'GAMEDEV', 7),
(5, 'Rekenen', 'REKEN', 8),
(6, 'Loopbaan en Burgerschap', 'LOBUR', 1),
(7, 'Development (van Dijk)', 'DEVEL2', 2),
(8, 'Nederlands', 'NEDER', 5),
(9, 'Engels', 'ENGEL', 6),
(10, 'Informatie Management', 'INFMA', 8);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(9) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`) VALUES
(1, 'N. Bouhanouch', 'N.bouhanouch@tcrmbo.nl'),
(2, 'H. van Dijk', 'vandijk.albeda@gmail.com'),
(3, 'R. Wigmans', 'r.wigmans@tcrmbo.nl'),
(4, 'B. van Helden', 'tcrhelden@gmail.com'),
(5, 'J. Heijkoop', 'JA.Heijkoop@tcrmbo.nl'),
(6, 'E. Vermaas', 'E.vermaas@tcrmbo.nl'),
(7, 'A. van der Brugge', 'aaronvdbrugge@21cceducation.com'),
(8, 'B. Keemink', 'h.keemink@tcrmbo.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
('1', 'admin_milan', '$2y$10$iT1koDR/4AbN7B4/dbMlSe.DfcyPsFfsO0bbYP8WCafO7R4BwPZGu');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexen voor tabel `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
