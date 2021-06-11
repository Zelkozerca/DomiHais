-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Cze 2021, 20:47
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `domihais`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rachunki`
--

CREATE TABLE `rachunki` (
  `id_rachunku` int(11) NOT NULL,
  `opis_rachunku` text COLLATE utf8_polish_ci NOT NULL,
  `kwota_rachunku` float NOT NULL,
  `nazwa_placacego` text COLLATE utf8_polish_ci NOT NULL,
  `nazwa_dluznika` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rachunki`
--

INSERT INTO `rachunki` (`id_rachunku`, `opis_rachunku`, `kwota_rachunku`, `nazwa_placacego`, `nazwa_dluznika`) VALUES
(1, 'pizza', 20, 'madzia', 'karol'),
(3, 'piwo', 10, 'adam', 'madzia'),
(4, 'żelki', 4, 'madzia', 'adam'),
(5, 'srajtaśma', 13, 'madzia', 'adam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_uzytkownika` text COLLATE utf8_polish_ci NOT NULL,
  `haslo_uzytkownika` text COLLATE utf8_polish_ci NOT NULL,
  `saldo_uzytkownika` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `nazwa_uzytkownika`, `haslo_uzytkownika`, `saldo_uzytkownika`) VALUES
(1, 'madzia', '1234', 1000),
(2, 'karol', 'qwer', 1000),
(3, 'adam', '5555', 1500);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  ADD PRIMARY KEY (`id_rachunku`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  MODIFY `id_rachunku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
