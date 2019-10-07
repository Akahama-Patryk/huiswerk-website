-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 30 sep 2019 om 09:33
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.1.14

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

--
-- Gegevens worden geëxporteerd voor tabel `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
('6909c36b-e04d-11e9-ade6-0050569e37c4', 'jamay', 'jamaydoorneveld@gmail.com', 'lol huiswerk wie maakt dat xD'),
('690a4c26-e04d-11e9-ade6-0050569e37c4', 'jamay', 'jamaydoorneveld@gmail.com', 'lol huiswerk wie maakt dat xD'),
('b473596e-e353-11e9-8d93-0050569e37c4', 'tjtesn', 'etg2@erge.com', 'eth'),
('b473a2b9-e353-11e9-8d93-0050569e37c4', 'tjtesn', 'etg2@erge.com', 'eth'),
('f65128d8-d80b-11e9-94b6-0050569e37c4', 'Edwyn', 'edwyn__4@hotmail.com', 'Leuk website jongens. Maar jullie verzend button van feedback heeft meer ruimte nodig tussen de letters en rand.\r\n\r\nThats itðŸ˜'),
('f65231b7-d80b-11e9-94b6-0050569e37c4', 'Edwyn', 'edwyn__4@hotmail.com', 'Leuk website jongens. Maar jullie verzend button van feedback heeft meer ruimte nodig tussen de letters en rand.\r\n\r\nThats itðŸ˜'),
('fd3055ec-8dc4-11e9-a512-0050569e37c4', 'jasper vleugels ', 'jpd.vleugels@gmail.com', 'gaaf'),
('fd32019c-8dc4-11e9-a512-0050569e37c4', 'jasper vleugels ', 'jpd.vleugels@gmail.com', 'gaaf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `homework`
--

CREATE TABLE `homework` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(544) NOT NULL,
  `subject_id` int(9) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `homework`
--

INSERT INTO `homework` (`id`, `title`, `description`, `subject_id`, `deadline`) VALUES
('1', 'C# toets', 'C# toets voor game development (2 weken geleden oefentoets gehad).', 4, '2019-06-13'),
('2a12480f-df7c-11e9-ade6-0050569e37c4', 'maak opdracht normaliseren t/m 3rde normaalvorm', 'link naar sharepoint folder (inloggen met je student.zadkine.nl)\r\n<br>\r\n<br>\r\n<a href=\'https://o365zadkine.sharepoint.com/teams/TCRICTJLS-studenten/Lesmateriaal/Forms/AllItems.aspx?viewid=b4c92ce6%2De606%2D4632%2D84b4%2D31ca5980e5af&id=%2Fteams%2FTCRICTJLS%2Dstudenten%2FLesmateriaal%2FOntwerpen%20%28N4%29%2FNormaliseren\'>Sharepoint</a>', 10, '2019-09-30'),
('2c2d188f-d52c-11e9-94b6-0050569e37c4', 'HBO Wiskunde opdracht', 'Maak het blaadje met sommen die je op woensdag 11-09-2019 van Keemink kreeg in de kantine.', 5, '2019-09-18'),
('2fe31603-8cee-11e9-a512-0050569e37c4', 'Project Supermarkt', 'Nieuwe Deadline : 1 juli || 2 juli of 3 juli Sturen via email zip file of github link met alle stappen die zijn gemaakt.\r\n18 punten -> 6.0, \r\n22 punten -> 7.0, \r\n25 punten -> 8.0, \r\n30 punten -> 9.0, \r\n32 punten -> 10.0, \r\nLET OP: De punten 17,25,31,33 zi', 2, '2019-07-02'),
('33ad5d79-d86d-11e9-94b6-0050569e37c4', 'App Dev: begint om 9:30', 'Mensen met het keuzedeel app development beginnen om 9:30 dinsdag', 11, '2019-09-17'),
('3c13307e-daac-11e9-94b6-0050569e37c4', 'Stelling argumenteren: Je hoeft niet perse een opleiding te volgen om een goede werknemer te zijn', 'bereidt voor: 2 argumenten voor, 2 argumenten tegen op de stelling', 8, '2019-09-24'),
('5b3e98b6-890b-11e9-b32c-0050569e37c4', 'API Supermarkt', 'Zorg dat code van deze link werkt samen met POSTMAN (GET,POST,PUT,DELETE en PATCH)\r\nLink: https://www.tcrdocent.nl/vandijk/#Bestanden%2FKlas2F%2FAPI%2FCode\r\n(Let op een van functies moet je zelf maken \'GetService\')', 7, '2019-06-14'),
('62f32edf-ded3-11e9-ade6-0050569e37c4', 'maak Thema 1 H1:Globalisering', 'maak de opgaven vanaf blz. 296 in het werkboek', 6, '2019-09-25'),
('6c55dd17-900f-11e9-a512-0050569e37c4', 'Toets van Normaliseren ', 'Toets van normaliseren op basis van vorige opdrachten. Normaliseren en ERD diagraam. Datum niet zeker.', 1, '2019-06-19'),
('6dbb4b53-df8d-11e9-ade6-0050569e37c4', 'blz. 306 werkboek: Thema 1 H3: Europese unie opdrachten maken', '', 6, '2019-10-02'),
('7b4f327a-891a-11e9-b32c-0050569e37c4', 'Opdracht 11 normaliseren ', 'ERD mailen naar meneer Wigmans. staat op https://www.tcrdocent.nl/wigmans/#Bestanden%2FNormaliseren als Opdracht11 word document', 1, '2019-06-14'),
('7ffcd866-daac-11e9-94b6-0050569e37c4', 'van Helden project', 'ontwikkel de gameomgeving van de opdracht, of ontwikkel je eigen idee.\r\n<br>\r\n<br>\r\n<a href=\'https://www.tcrdocent.nl/vanhelden/Bestanden/Projecten/Leerjaar3_project_rekenentaalspel.pdf\'>link naar opdracht</a>', 2, '2019-11-22'),
('80b1926d-8ea5-11e9-a512-0050569e37c4', 'Opdracht 11 normaliseren  extra', 'Toevoeg twee tabelen samen met gemaakte diagram. Link naar opdracht 11 met extra opdracht: https://www.tcrdocent.nl/wigmans/Bestanden/Normaliseren/Opdracht 11-deel2.docx', 1, '2019-06-19'),
('842b0cd8-8909-11e9-b32c-0050569e37c4', 'Burgerschap Thema 4 Hoofdstuk 3 Omgaan met media', 'Hoofdstuk 3 Omgaan met media Pagina 96-101', 6, '2019-06-14'),
('a60f3355-db00-11e9-ade6-0050569e37c4', 'van Dijk Dev voorbereiding', 'https://getcomposer.org/Composer-Setup.exe Download deze setup en installer. Restarter laptop. Daarna ga naar console van je IDE/applicatie voor programeren of CMD en schrijf:composer require --dev phpunit/phpunit ^7', 7, '2019-09-20'),
('a7564865-9360-11e9-9823-0050569e37c4', 'eindexamenopdracht: Game + Game Design Document', 'zie opdracht op discord', 4, '2019-07-04'),
('a7d215ac-90d2-11e9-9823-0050569e37c4', 'Project week ', 'Project week : nog geen details. Begin op donderdag 20/06/2019 9:30 bij lokaal van Helden', 7, '2019-06-20'),
('b4ebcf20-deb4-11e9-ade6-0050569e37c4', 'SQL opdrachten maken week 2', 'LET OP: officieel geen huiswerk meer, maar Wigmans verwacht dat je dit maakt.\r\n<br>\r\n<br>\r\n<a href=\'https://o365zadkine.sharepoint.com/:u:/r/teams/TCRICTJLS-studenten/Lesmateriaal/Ontwerpen%20(N4)/Normaliseren/Schoolopleiding_lessen.mdj?csf=1&e=83u37v\'>ERD link</a>', 10, '2019-09-25'),
('bbabf58b-d91f-11e9-94b6-0050569e37c4', 'Boek bestellen, installer Java JDK/Android Studio en maak mobiele testapp', 'Boek bestellen: Apps maken met Android Studio (ISBN: 9789057524110)\r\n\r\nhttps://www.oracle.com/technetwork/java/javase/downloads/index.html, https://developer.android.com/studio', 11, '2019-09-24'),
('c4b0576b-8e8e-11e9-a512-0050569e37c4', 'API Supermarkt', 'Maak een opdracht.\r\nBeschrijving van opdracht staat op deze link: https://www.tcrdocent.nl/vandijk/Bestanden/Klas2F/API/7%20-%20Services%20&%20Factories.pdf', 7, '2019-06-28'),
('d3a1b537-deac-11e9-ade6-0050569e37c4', 'week 2: parabolen', 'alle 10 opdrachten maken en opsturen.\r\n\r\nde opdracht is te vinden op sharepoint', 5, '2019-09-30'),
('d616c037-dde0-11e9-ade6-0050569e37c4', 'functionaliteitenlijst inleveren voor project van Helden', '<h1><b>LET OP: als je dit inlevert voor deze deadline hoef je \'s ochtends niet op school te verschijnen :)</b></h1>\r\n\r\nLever een functionaliteitenlijst in met van minimaal 20 punten (inclusief MoScoW, beschrijving van  functie, ingeschatte tijd)\r\n<br>\r\n<br>\r\n<a href=\'https://www.tcrdocent.nl/vanhelden/Bestanden/Projecten/Leerjaar3_project_rekenentaalspel.pdf\'>link naar opdracht</a>', 2, '2019-09-27'),
('d6612d56-d489-11e9-94b6-0050569e37c4', 'Burgerschap Hoofdstuk 1 Globalisering', 'Maak alle vragen van hoofdstuk 1. Pagina 296-300', 6, '2019-09-18'),
('d87a061e-d48e-11e9-94b6-0050569e37c4', 'Maak ERD en ingevulde database', 'Maak een ERD en een gevulde database met het materiaal van de les\r\n\r\nhttps://i.imgur.com/VSiKrPj.jpg\r\n\r\nERD: https://drive.google.com/file/d/1y9vKOU3AN4woh-Wu5Sf52kwOtIGoCQEg/view?usp=sharing', 10, '2019-09-18');

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
(1, 'Realiseren en Ontwerpen', 'REONT', 2),
(2, 'Development', 'DEVEL', 4),
(3, 'Keuzedeel: Front End Development', 'FRONTEND', 2),
(4, 'Keuzedeel: Game Development', 'GAMEDEV', 7),
(5, 'Keuzedeel: HBO Wiskunde', 'HBOWI', 8),
(6, 'Loopbaan en Burgerschap', 'LOBUR', 1),
(8, 'Nederlands', 'NEDER', 5),
(9, 'Engels', 'ENGLS', 6),
(10, 'Informatie Management', 'INFMA', 3),
(11, 'Keuzedeel: Mobile App Development', 'MobiApp', 4);

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
(6, 'W.P. de Wit', 'w.dewit@tcrmbo.nl (communicatie), wpdewit@gmail.com (inleveren)'),
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
('1', 'admin_milan', '$2y$10$iT1koDR/4AbN7B4/dbMlSe.DfcyPsFfsO0bbYP8WCafO7R4BwPZGu'),
('817ef60f-884f-11e9-8633-0050569e37c4', 'admin_Patryk', '$2y$10$NgzdPm9ajVurhE3zOcQjxu7WyQIDThUqO8l.6AYfNyd1nLiUwsSXS'),
('935df259-884f-11e9-8633-0050569e37c4', 'admin_jorno', '$2y$10$UeKuIb8UNQeO7MobwZqOlu45dcxguFVt1UT8su3jasBwBpn5y9lfu');

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
  MODIFY `subject_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
