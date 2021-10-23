-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Paź 2021, 14:18
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`) VALUES
(29, 'izak', '$2y$10$t9La92nSRODbt1rP3qcM1O2zV769jnLlEVrIW3BPBau9tocFTX9F6', 'izak@onet.pl'),
(30, 'piterox.xlolx@onet.pl', '$2y$10$QaxzCvjrcIlV7..jNqBIL.0Kh9GgTZburgF0qbqfMYOOISo5ZhIeu', 'asd'),
(31, 'asd', '$2y$10$aNnqOVDZUoV5hgmp9z5qbeZZZ8hAPWEcVxdu/Slm/zobLvX7zyyuW', 'kapitan.tygrysek0001@onet.pl'),
(32, 'a', '$2y$10$hAuB52rC7DScubALVky0ZODh10f712iVXbgKcY0l1xTUVSHHpz3lC', '1'),
(33, '5', '$2y$10$e0TjsS5cmHvRtM6fgY6Qo.aaHpGTjdYgWbvoSJHu70ZqDpA/Y5Phe', '4'),
(34, '1', '$2y$10$dpbkPSsw7YyrIy8p1ukaheCBtdIgUUxSka1yO3too0gtyy3OMD5w.', '54'),
(35, 'tygrysek', '$2y$10$8cKOz9SLsbBYHGzuurvaF.ZYOhTgp0FRQMqXCbCkHe6erdXvK9jge', 'kaptygrysek@gmail.com'),
(36, 'Adam', '$2y$10$119xOEcpDcYx5CQ8gimO9.mtB0qMQ2eFE1Ve25Jgw0ybHLLEj.DIi', '123123123'),
(37, 'asdasd', '$2y$10$3vnzkMl3rc8rm486tASa5uAnP3cewdhZqRJgzH7wRyIwexaV33uoa', '111'),
(38, '123', '$2y$10$3YYxHQh.IR4BIb4X6yTmWuCc4sJgzHt.s04Pc6Wu5wrEBAXF.NEki', '3321');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiad`
--

CREATE TABLE `wiad` (
  `id` int(11) NOT NULL,
  `wiadomosc` varchar(2048) COLLATE utf8mb4_polish_ci NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `uzytkownik_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wiad`
--

INSERT INTO `wiad` (`id`, `wiadomosc`, `uzytkownik_id`, `uzytkownik_id2`) VALUES
(93, 'asdadasdasdsaasdasdasdsa', 43, 32),
(94, 'jansfjasnifasiufbsaiufbuiasfisanfoiasnfoas', 38, 32),
(95, 'test', 38, 29),
(96, 'Siema', 38, 31);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- Indeksy dla tabeli `wiad`
--
ALTER TABLE `wiad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `wiad`
--
ALTER TABLE `wiad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
