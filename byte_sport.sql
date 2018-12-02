-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Gru 2018, 22:55
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
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `league_details`
--

CREATE TABLE `league_details` (
  `id` int(11) NOT NULL,
  `organizer` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_found` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_details`
--

CREATE TABLE `team_details` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `password` char(128) COLLATE utf8_polish_ci NOT NULL,
  `permissions` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `permissions`, `active`) VALUES
(5, 'tomczyk.marek', '7fcf4ba391c48784edde599889d6e3f1e47a27db36ecc050cc92f259bfac38afad2c68a1ae804d77075e8fb722503f3eca2b2c1006ee6f6c7b7628cb45fffd1d', 1, 1),
(7, 'dworak.adrian', 'ee17fe75e3b25a0d051043a0c028c03a2e38f56520c2d31e1f7d45d99116c56876c5db067b9f819ed722cce1919356b7b5b7855d6ecf56a61452058f3ca93cbc', 0, 1),
(8, 'lebiedzinski.michal', 'd02fa70ed1c58b74e07a59c54af55ac3f3beb02e365ae613c26be62fe76130d46bc1da349b99e81dee3d34c4efe841d58003574e5d6ddb38cd99bf81bafb9a08', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `login_success` datetime NOT NULL,
  `login_failure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `surname`, `date_of_birth`, `email`, `login_success`, `login_failure`) VALUES
(5, 'Marek', 'Tomczyk', '2018-11-18', 'tomczykmarek33@gmail.com', '2018-12-02 00:00:00', '0000-00-00 00:00:00'),
(7, 'Adrian', 'Dworak', '1997-04-05', 'dworak.adrian97@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Michał', 'Lebiedziński', '1997-10-05', 'lebio97@gmail.com', '2018-11-23 00:00:00', '0000-00-00 00:00:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `author_id` (`author_id`),
  ADD UNIQUE KEY `league_id` (`league_id`);

--
-- Indeksy dla tabeli `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD UNIQUE KEY `league_id` (`id`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `team_details`
--
ALTER TABLE `team_details`
  ADD UNIQUE KEY `team_id` (`id`),
  ADD UNIQUE KEY `league_id` (`league_id`);

--
-- Indeksy dla tabeli `team_score`
--
ALTER TABLE `team_score`
  ADD UNIQUE KEY `team_id` (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeksy dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `user_id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `league` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD CONSTRAINT `league_id` FOREIGN KEY (`id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_details`
--
ALTER TABLE `team_details`
  ADD CONSTRAINT `leaguee` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_id` FOREIGN KEY (`id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_score`
--
ALTER TABLE `team_score`
  ADD CONSTRAINT `team` FOREIGN KEY (`id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
