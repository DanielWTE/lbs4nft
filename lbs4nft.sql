-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Mrz 2022 um 17:21
-- Server-Version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP-Version: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `lbs4nft`
--
CREATE DATABASE IF NOT EXISTS `lbs4nft` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lbs4nft`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nfts`
--

CREATE TABLE `nfts` (
  `id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `author` varchar(250) NOT NULL,
  `likes` int(11) NOT NULL,
  `buyers` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `nfts`
--

INSERT INTO `nfts` (`id`, `url`, `title`, `price`, `author`, `likes`, `buyers`, `description`) VALUES
(1, '/', 'Crit Monkee', 250, 'Daniel', 0, 0, 'This is the first monkee on this site shiesh'),
(2, '/', 'Street Monkee', 589, 'Markus', 0, 0, 'What a monkee shieesh');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `transcation_key` varchar(255) NOT NULL,
  `nft_key` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'user',
  `locked` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `locked`, `created`) VALUES
(1, 'Daniel', '$2y$10$X6cWiij7t9B1xj5xz8Ys3OzcZLieLgjOULXSOaAXOZAtHkXkTCKM6', 'user', 0, '2022-02-25 19:37:28'),
(2, 'hallo daniel', '$2y$10$ymRsSIewqVvkVgvcUx9SxOu7MVVudYbiwl8XseiRuji9zwlW7GV5i', 'user', 0, '2022-02-26 09:34:33'),
(3, 'DWAGFAN', '$2y$10$Z.0LBQeL1JMEaaMzzmB57u./B8RxP2IfGto65aRS1xoO25O8Z27S.', 'user', 0, '2022-02-26 12:47:31'),
(4, 'lbs4Hawarant', '$2y$10$iv7YLBXaQXucrqRqFiGlne36f0C7Xeki/fMiRjwoNzW0Jv2.1EMTy', 'user', 0, '2022-02-27 00:30:17'),
(5, 'duhurensohn', '$2y$10$PRmx.YTimy0Fu.UlwSvVeeHmWxfbwBUMpru06B3esa0BNz8QvSh5C', 'user', 0, '2022-02-28 10:21:08'),
(6, 'asdsdsadasda', '$2y$10$.8LYf.VxVbm11CZiKB6zt.OHFRlBr2Z3WFXHthYu3UKm9tuEWJVZi', 'user', 0, '2022-02-28 19:10:24'),
(7, 'TestDasIstEi', '$2y$10$ga31i1Oh6Sp5BGoZloRDvOe0UlHychux2/lHr3tJGGr8QE3ZFq1j.', 'user', 0, '2022-02-28 19:31:48');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `nfts`
--
ALTER TABLE `nfts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nft_key` (`nft_key`),
  ADD UNIQUE KEY `transcation_key` (`transcation_key`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `nfts`
--
ALTER TABLE `nfts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
