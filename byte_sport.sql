-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Lis 2018, 16:05
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `byte_sport`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `league`
--

CREATE TABLE `league` (
  `league_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `league_details`
--

CREATE TABLE `league_details` (
  `league_id` int(11) NOT NULL,
  `organizer` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_found` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_details`
--

CREATE TABLE `team_details` (
  `team_id` int(11) NOT NULL,
  `founder` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_found` date NOT NULL,
  `ground` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `president` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `head_couch` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `league_id` int(11) NOT NULL,
  `website` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_score`
--

CREATE TABLE `team_score` (
  `team_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `scored_goals` int(11) NOT NULL,
  `lost_goals` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `draws` int(11) NOT NULL,
  `losts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `permissions` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `author_id` (`author_id`),
  ADD UNIQUE KEY `league_id` (`league_id`);

--
-- Indeksy dla tabeli `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`league_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD UNIQUE KEY `league_id` (`league_id`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `team_details`
--
ALTER TABLE `team_details`
  ADD UNIQUE KEY `team_id` (`team_id`),
  ADD UNIQUE KEY `league_id` (`league_id`);

--
-- Indeksy dla tabeli `team_score`
--
ALTER TABLE `team_score`
  ADD UNIQUE KEY `team_id` (`team_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeksy dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `league`
--
ALTER TABLE `league`
  MODIFY `league_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `league` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD CONSTRAINT `league_id` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_details`
--
ALTER TABLE `team_details`
  ADD CONSTRAINT `leaguee` FOREIGN KEY (`league_id`) REFERENCES `league` (`league_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_id` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_score`
--
ALTER TABLE `team_score`
  ADD CONSTRAINT `team` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
