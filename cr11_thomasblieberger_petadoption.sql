-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 16:41
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_thomasblieberger_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_thomasblieberger_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_thomasblieberger_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `city` char(64) NOT NULL,
  `ZIP` int(11) NOT NULL,
  `address` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`location_id`, `city`, `ZIP`, `address`) VALUES
(1, 'city1', 1234, 'examplestreet 101'),
(2, 'city2', 2345, 'examplestreet 102'),
(3, 'city4', 4567, 'examplestreet 103'),
(4, 'city1', 1234, 'examplestreet 104'),
(5, 'city3', 3456, 'examplestreet 105');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `image` char(255) DEFAULT NULL,
  `name` char(64) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `type` enum('small','large') DEFAULT NULL,
  `hobbys` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pets`
--

INSERT INTO `pets` (`id`, `location`, `image`, `name`, `description`, `birthdate`, `type`, `hobbys`) VALUES
(1, 1, 'img/1.jpg', 'Tiger', 'small cat', '2019-01-01', 'small', 'playing ,sleeping'),
(2, 2, 'img/2.png', 'Grinch', 'grumpy cat', '2007-04-03', 'small', 'complaining'),
(3, 3, 'img/3.jpg', 'Fluffy', 'fluffy cat', '2011-05-12', 'small', 'looking fluffy'),
(4, 4, 'img/4.jpg', 'Alligatoah', 'not an actual alligator', '1989-09-28', 'large', 'telling you that he is a human and can do what he wants to - don\'t listen!'),
(5, 5, 'img/5.jpg', 'Vanessa', 'next love of your life', '2008-01-01', 'large', 'isn\'t she adorable?'),
(6, 1, 'img/6.jpg', 'Dolly', 'so cute!', '2017-03-04', 'large', 'going to the hairdresser'),
(7, 2, 'img/7.jpg', 'Satanic Heard', 'our white wool covers our dark souls', '2014-05-05', 'large', 'plotting things in the shadows'),
(8, 3, 'img/8.jpg', 'Mr. Big', 'you saved my daughter!', '2018-03-03', 'small', 'looking meaningful');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `admin` enum('true','false') DEFAULT NULL,
  `super` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `admin`, `super`) VALUES
(3, 'Silberhirn', 'thomas.blieberger@hotmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'true', 'true'),
(4, 'test', 'test@test.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'true', 'false');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`location`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
