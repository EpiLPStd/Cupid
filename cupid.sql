-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Gru 2021, 10:30
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cupid`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `album`
--

CREATE TABLE `album` (
  `id_a` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `id_p` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos_in_album`
--

CREATE TABLE `photos_in_album` (
  `id_pia` bigint(20) NOT NULL,
  `id_a` bigint(20) NOT NULL,
  `id_p` bigint(20) NOT NULL,
  `id_u` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_u` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_photos`
--

CREATE TABLE `users_photos` (
  `id_up` bigint(20) NOT NULL,
  `id_u` bigint(20) NOT NULL,
  `id_p` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_a`);

--
-- Indeksy dla tabeli `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_p`);

--
-- Indeksy dla tabeli `photos_in_album`
--
ALTER TABLE `photos_in_album`
  ADD PRIMARY KEY (`id_pia`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_p` (`id_p`),
  ADD KEY `id_u` (`id_u`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `users_photos`
--
ALTER TABLE `users_photos`
  ADD PRIMARY KEY (`id_up`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_p` (`id_p`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `album`
--
ALTER TABLE `album`
  MODIFY `id_a` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id_p` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `photos_in_album`
--
ALTER TABLE `photos_in_album`
  MODIFY `id_pia` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_u` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users_photos`
--
ALTER TABLE `users_photos`
  MODIFY `id_up` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `photos_in_album`
--
ALTER TABLE `photos_in_album`
  ADD CONSTRAINT `photos_in_album_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `photos_in_album_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `photos` (`id_p`),
  ADD CONSTRAINT `photos_in_album_ibfk_3` FOREIGN KEY (`id_a`) REFERENCES `album` (`id_a`);

--
-- Ograniczenia dla tabeli `users_photos`
--
ALTER TABLE `users_photos`
  ADD CONSTRAINT `users_photos_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `users_photos_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `photos` (`id_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
