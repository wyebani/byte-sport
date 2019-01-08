-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2019, 14:21
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

--
-- Zrzut danych tabeli `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author_id`, `league_id`, `date`) VALUES
(12, 'Sokół Orzech wygrywa z Barceloną!', 'hgytfuhkbutfvh', 5, 12, '2019-01-02 19:53:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Polska'),
(2, 'Niemcy'),
(3, 'Hiszpania'),
(4, 'Portugalia'),
(5, 'Włochy'),
(6, 'Brazylia'),
(7, 'Francja'),
(8, 'Anglia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `league`
--

CREATE TABLE `league` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `league`
--

INSERT INTO `league` (`id`, `name`, `country_id`) VALUES
(12, 'Ekstraklasa', 1),
(13, 'Bundesliga', 2),
(15, 'Napoli', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `league_details`
--

CREATE TABLE `league_details` (
  `id` int(11) NOT NULL,
  `organizer` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `date_of_found` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `league_details`
--

INSERT INTO `league_details` (`id`, `organizer`, `date_of_found`) VALUES
(15, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `host_score` int(11) NOT NULL,
  `guest_score` int(11) NOT NULL,
  `season` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `league_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `match`
--

INSERT INTO `match` (`id`, `host_id`, `guest_id`, `date_time`, `host_score`, `guest_score`, `season`, `league_id`, `status_id`) VALUES
(1, 17, 18, '2019-01-05 12:00:00', 1, 2, '2019', 13, 3),
(2, 17, 18, '2018-01-05 12:00:00', 2, 2, '2018', 13, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `match_status`
--

CREATE TABLE `match_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `match_status`
--

INSERT INTO `match_status` (`id`, `status`) VALUES
(1, 'Nadchodzące'),
(2, 'Trwające'),
(3, 'Zakończone'),
(4, 'Odwołane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `league_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `team`
--

INSERT INTO `team` (`id`, `name`, `league_id`) VALUES
(17, 'Bayern Monachium', 13),
(18, 'Borussia Dortmund', 13),
(19, 'FC Schalke 04', 13),
(20, 'Eintracht Frankfurt', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_bilans`
--

CREATE TABLE `team_bilans` (
  `id` int(11) NOT NULL,
  `matches_played` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `draws` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `scored_goals` int(11) NOT NULL,
  `lost_goals` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_details`
--

CREATE TABLE `team_details` (
  `id` int(11) NOT NULL,
  `ground` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `head_coach` varchar(45) COLLATE utf8_polish_ci NOT NULL,
  `website` varchar(45) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `team_details`
--

INSERT INTO `team_details` (`id`, `ground`, `head_coach`, `website`) VALUES
(17, 'Alianz Arena', 'Niko Kovač', 'fcbayern.com'),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', '');

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
(64, 'dworak.adrian', 'bfb23ce8b5f0c64866f097439f15307d21e219c4440e901328befefff6af26e38ea5182eebf252033ecd9c7abe8040eaaed97aaf192d9c1621f83280f12adc70', 0, 1),
(65, 'blacha.arkadiusz', '013c6889f799cd986a735118e1888727d1435f7f623d05d58c61bf2cd8b49ac90105e5786ceaabd62bbc27336153d0d316b2d13b36804080c44aa6198c533215', 0, 1);

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
(5, 'Marek', 'Tomczyk', '2018-11-18', 'tomczykmarek33@gmail.com', '2019-01-06 00:00:00', '0000-00-00 00:00:00'),
(64, 'dsadsa', '', '0000-00-00', 'dworak.adrian97@gmail.com', '2019-01-03 00:00:00', '0000-00-00 00:00:00'),
(65, 'Arkadiusz', '', '0000-00-00', 'blacha.arkadiusz@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_leagues`
--

CREATE TABLE `user_leagues` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user_leagues`
--

INSERT INTO `user_leagues` (`id`, `user_id`, `league_id`) VALUES
(1, 5, 12),
(2, 5, 13),
(4, 5, 12);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`) USING BTREE,
  ADD KEY `league_id` (`league_id`) USING BTREE;

--
-- Indeksy dla tabeli `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `cou_id` (`country_id`) USING BTREE;

--
-- Indeksy dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD UNIQUE KEY `league_id` (`id`);

--
-- Indeksy dla tabeli `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_id` (`guest_id`),
  ADD KEY `tt_id` (`host_id`),
  ADD KEY `l_id` (`league_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indeksy dla tabeli `match_status`
--
ALTER TABLE `match_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `league_id` (`league_id`) USING BTREE;

--
-- Indeksy dla tabeli `team_bilans`
--
ALTER TABLE `team_bilans`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `team_details`
--
ALTER TABLE `team_details`
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
-- Indeksy dla tabeli `user_leagues`
--
ALTER TABLE `user_leagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `league_id` (`league_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `match_status`
--
ALTER TABLE `match_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `user_leagues`
--
ALTER TABLE `user_leagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Ograniczenia dla tabeli `league`
--
ALTER TABLE `league`
  ADD CONSTRAINT `country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `league_details`
--
ALTER TABLE `league_details`
  ADD CONSTRAINT `league_id` FOREIGN KEY (`id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `l_id` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`),
  ADD CONSTRAINT `s_id` FOREIGN KEY (`status_id`) REFERENCES `match_status` (`id`),
  ADD CONSTRAINT `t_id` FOREIGN KEY (`guest_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `tt_id` FOREIGN KEY (`host_id`) REFERENCES `team` (`id`);

--
-- Ograniczenia dla tabeli `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `leaguee` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_bilans`
--
ALTER TABLE `team_bilans`
  ADD CONSTRAINT `ttt_id` FOREIGN KEY (`id`) REFERENCES `team` (`id`);

--
-- Ograniczenia dla tabeli `team_details`
--
ALTER TABLE `team_details`
  ADD CONSTRAINT `team_id` FOREIGN KEY (`id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_leagues`
--
ALTER TABLE `user_leagues`
  ADD CONSTRAINT `lid` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
