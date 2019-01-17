-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Sty 2019, 21:11
-- Wersja serwera: 10.1.34-MariaDB
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
(16, 'Bayern Monachium - odejście gwiazdy.', 'To są ostatnie miesiące Francka Ribery\'ego w Bayernu Monachium. Francuz cały czas liczył, iż uda mu się pozostać w Bawarii na kolejne lata. Swoją formą chciał udowodnić, iż cały czas jest przydatny drużynie. W rundzie wiosennej mieliśmy zobaczyć jedną z lepszych wersji skrzydłowego w Bundeslidze.', 5, 13, '2019-01-16 04:28:21'),
(17, 'Lewandowski - najładniejsza asysta', 'Robert Lewandowski niezwykle efektownym i efektywnym podaniem popisał się w listopadowym meczu Bayernu Monachium z Fortuną Duesseldorf. W 58. minucie Joshua Kimmich zagrał z prawej strony boiska przed pole karne do Polaka, a ten piętą odegrał do Thomasa Muellera, który po przyjęciu piłki pokonał bramkarza gości.', 5, 13, '2019-01-16 04:28:21'),
(18, 'Bayern Monachium wykupi Jamesa Rodrigueza', 'James Rodriguez jest tylko wypożyczony z Realu Madryt do Bayernu Monachium. Mistrzowie Niemiec zagwarantowali sobie opcję pierwokupu, która wynosi 42 miliony euro. Według ostatnich informacji, Bawarczycy zdecydowali już, że wykupią pomocnika od Królewskich. Na pozostanie w klubie nalega także sam James, co jeszcze kilka tygodni temu nie było takie oczywiste.', 5, 13, '2019-01-09 10:25:09'),
(19, 'Wisła uratowana?', 'Wisła Kraków. W sobotnim programie \"Stan Futbolu\" Jarosław Królewski, właściciel firmy Synerise, przekazał świetną nowinę dla kibiców Wisły Kraków. Biznesmen poinformował, że wraz z Jakubem Błaszczykowskim i jeszcze jednym inwestorem pożyczą klubowi 4 miliony złotych.\r\n\r\n', 5, 12, '2019-01-17 04:09:09'),
(20, 'Fatalne transfery Legii', 'Legia Warszawa. Nie można odmówić aktywności Legii Warszawa podczas kolejnych okienek transferowych. Po analizie transferów z dwóch ostatnich lat można wyciągnąć przykry wniosek - mistrz Polski sprowadza wielu piłkarzy, z których niewielu jest w stanie zostać w klubie na dłużej. Z 26 zawodników, których pozyskano, aż 14 zostało już skreślonych!', 5, 12, '2019-01-23 08:11:17'),
(21, 'Śląskie kluby walczą o Tomasza Jodłowca', 'Były reprezentant Polski Tomasz Jodłowiec ostatnie dwanaście miesięcy spędził w Piaście Gliwice. Zawodnik na Górnym Śląsku piłkarsko odżył. Piłkarz wprawdzie miał problemy zdrowotne, ale kiedy był zdrowy, miał spory wpływ na dobre wyniki gliwiczan w rundzie jesiennej.', 5, 12, '2019-01-01 08:14:15'),
(22, 'Duże nazwisko na celowniku Górnika', 'Obecnie w Górniku potrzebujemy piłkarzy doświadczonych, ukształtowanych, zdeterminowanych, którzy mają umiejętności i pomogą w rozwoju młodzieży. Głównie rozmawiamy z Polakami - przekonuje w rozmowie dla \"Przeglądu Sportowego\" Artur Płatek, który od grudnia zajmuje się transferami w zabrzańskim klubie, ale nadal jest też zatrudniony w Borussii Dortmund.', 5, 12, '2019-01-09 09:14:21'),
(23, 'Dawid Kownacki coraz bliżej Bundesligi.', 'Dawid Kownacki w sobotę zagrał w Pucharze Włoch z Milanem (0:2). Polski napastnik wszedł na boisko na początku pierwszej połowy dogrywki. Możliwe, że był to jego ostatni występ w barwach Sampdorii Genua, bo ważą się losy jego transferu do niemieckiej Bundesligi.', 5, 13, '2019-01-09 10:25:09');

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
(16, 'LaLiga', 3),
(17, 'Primeira Liga', 4),
(18, 'Serie A', 5),
(20, 'Brazylijska', 6),
(21, 'Ligue 1', 7),
(22, 'Premier League', 8);

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
(16, '', '0000-00-00'),
(17, '', '0000-00-00'),
(18, '', '0000-00-00'),
(20, '', '0000-00-00'),
(21, '', '0000-00-00'),
(22, '', '0000-00-00');

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
(26, 'Lechia Gdańsk', 12),
(27, 'Legia Warszawa', 12),
(28, 'Lech Poznań', 12),
(29, 'Jagiellonia Białystok', 12),
(30, 'Pogoń Szczecin', 12),
(31, 'Piast Gliwice', 12),
(32, 'Korona Kielce', 12),
(33, 'Wisła Kraków', 12),
(34, 'Cracovia', 12),
(35, 'Arka Gdynia', 12),
(36, ' Zagłębie Lubin', 12),
(37, 'Miedź Legnica', 12),
(38, 'Wisła Płock', 12),
(39, 'Śląsk Wrocław', 12),
(40, 'Górnik Zabrze', 12),
(41, 'Zagłębie Sosnowiec', 12),
(42, 'Borussia Dortmund', 13),
(43, 'Bayern Monachium', 13),
(44, 'Moenchengladach', 13),
(45, 'RB Lips', 13),
(46, 'Wolfsburg', 13),
(47, 'Frankfurt', 13),
(48, 'Hoffenheim', 13),
(49, 'Herta Berlin', 13),
(50, 'Leverkusen', 13),
(51, 'Bremen', 13),
(52, 'Freiburg', 13),
(53, 'Mainz 05', 13),
(54, 'Schalke', 13),
(55, 'Dusseldorf', 13),
(56, 'Augsburg', 13),
(57, 'Stuttgart', 13),
(58, 'Hannover', 13),
(59, 'Nurnberg', 13);

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

--
-- Zrzut danych tabeli `team_bilans`
--

INSERT INTO `team_bilans` (`id`, `matches_played`, `wins`, `draws`, `losses`, `scored_goals`, `lost_goals`, `points`) VALUES
(26, 20, 12, 6, 2, 34, 17, 42),
(27, 20, 11, 6, 3, 34, 20, 39),
(28, 20, 10, 3, 7, 32, 23, 33),
(29, 20, 9, 6, 5, 34, 29, 33),
(30, 20, 9, 4, 7, 28, 24, 31),
(31, 20, 8, 7, 5, 27, 23, 31),
(32, 20, 8, 7, 5, 25, 23, 31),
(33, 20, 8, 5, 7, 33, 29, 29),
(34, 20, 7, 6, 7, 20, 21, 27),
(35, 20, 6, 7, 7, 30, 28, 25),
(36, 20, 7, 3, 10, 31, 32, 24),
(37, 20, 5, 6, 9, 21, 35, 21),
(38, 20, 4, 8, 8, 30, 37, 20),
(39, 20, 4, 6, 10, 27, 30, 18),
(40, 20, 3, 8, 9, 23, 37, 17),
(41, 20, 2, 6, 12, 24, 45, 12),
(42, 17, 13, 3, 1, 44, 18, 42),
(43, 17, 11, 3, 3, 36, 18, 36),
(44, 17, 10, 3, 4, 36, 18, 33),
(45, 17, 9, 4, 4, 31, 17, 31),
(46, 17, 8, 4, 5, 27, 22, 28),
(47, 17, 8, 3, 6, 34, 23, 27),
(48, 17, 6, 7, 4, 32, 23, 25),
(49, 17, 6, 6, 5, 26, 27, 24),
(50, 17, 7, 3, 7, 26, 29, 24),
(51, 17, 6, 4, 7, 28, 29, 22),
(52, 17, 5, 6, 6, 21, 25, 21),
(53, 17, 5, 6, 6, 17, 22, 21),
(54, 17, 5, 3, 9, 20, 24, 18),
(55, 17, 5, 3, 9, 19, 33, 18),
(56, 17, 3, 6, 8, 25, 29, 15),
(57, 17, 4, 2, 11, 12, 35, 14),
(58, 17, 2, 5, 10, 17, 35, 11),
(59, 17, 2, 5, 10, 14, 38, 11);

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
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', '');

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
(5, 'tomczyk.marek', '7fcf4ba391c48784edde599889d6e3f1e47a27db36ecc050cc92f259bfac38afad2c68a1ae804d77075e8fb722503f3eca2b2c1006ee6f6c7b7628cb45fffd1d', 1, 1);

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
(5, 'Marek', 'Tomczyk', '2018-11-18', 'tomczykmarek33@gmail.com', '2019-01-17 00:00:00', '0000-00-00 00:00:00');

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
(9, 5, 12);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `match_status`
--
ALTER TABLE `match_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `user_leagues`
--
ALTER TABLE `user_leagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
