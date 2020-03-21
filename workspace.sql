-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 21 Mar 2020, 15:04
-- Wersja serwera: 5.7.28-0ubuntu0.19.04.2
-- Wersja PHP: 7.2.24-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `work`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipment_data`
--

CREATE TABLE `equipment_data` (
  `id` smallint(6) NOT NULL,
  `type` smallint(6) NOT NULL,
  `model` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `value` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `equipment_data`
--

INSERT INTO `equipment_data` (`id`, `type`, `model`, `code`, `purchase_date`, `value`, `description`) VALUES
(1, 1, 'Black leather office chair', '435219741', '2019-03-10', 399, 'Krzesło biurowe, czarna skóra'),
(3, 1, 'Black leather office chair', '124911', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(4, 1, 'Black leather office chair', '124912', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(5, 1, 'Black leather office chair', '124913', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(6, 1, 'Black leather office chair', '124914', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(7, 1, 'Black leather office chair', '124915', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(8, 1, 'Black leather office chair', '124916', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(9, 1, 'Black leather office chair', '124917', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(10, 1, 'Black leather office chair', '124918', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(11, 1, 'Black leather office chair', '124919', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(12, 1, 'Black leather office chair', '1249110', '2019-06-20', 299, 'Krzesło biurowe, czarna skóra'),
(13, 1, 'White leather office chair', '82131', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(14, 1, 'White leather office chair', '82132', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(15, 1, 'White leather office chair', '82133', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(16, 1, 'White leather office chair', '82134', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(17, 1, 'White leather office chair', '82135', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(18, 1, 'White leather office chair', '82136', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(19, 1, 'White leather office chair', '82137', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(20, 1, 'White leather office chair', '82138', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(21, 1, 'White leather office chair', '82139', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(22, 1, 'White leather office chair', '821310', '2019-06-20', 289, 'Krzesło biurowe, biała skóra'),
(63, 2, 'Lenovo x230', '7572571', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(64, 2, 'Lenovo x230', '7572572', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(65, 2, 'Lenovo x230', '7572573', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(66, 2, 'Lenovo x230', '7572574', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(67, 2, 'Lenovo x230', '7572575', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(68, 2, 'Lenovo x230', '7572576', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(69, 2, 'Lenovo x230', '7572577', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(70, 2, 'Lenovo x230', '7572578', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(71, 2, 'Lenovo x230', '7572579', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(72, 2, 'Lenovo x230', '75725710', '2019-03-12', 999, 'Laptop Lenovo ThinkPad x230'),
(73, 3, 'A4Tech KV-300H', 'k51281', '2019-11-05', 89, 'Klawiatura komputerowa'),
(74, 3, 'A4Tech KV-300H', 'k51282', '2019-11-05', 89, 'Klawiatura komputerowa'),
(75, 3, 'A4Tech KV-300H', 'k51283', '2019-11-05', 89, 'Klawiatura komputerowa'),
(76, 3, 'A4Tech KV-300H', 'k51284', '2019-11-05', 89, 'Klawiatura komputerowa'),
(77, 3, 'A4Tech KV-300H', 'k51285', '2019-11-05', 89, 'Klawiatura komputerowa'),
(78, 3, 'A4Tech KV-300H', 'k51286', '2019-11-05', 89, 'Klawiatura komputerowa'),
(79, 3, 'A4Tech KV-300H', 'k51287', '2019-11-05', 89, 'Klawiatura komputerowa'),
(80, 3, 'A4Tech KV-300H', 'k51288', '2019-11-05', 89, 'Klawiatura komputerowa'),
(81, 3, 'A4Tech KV-300H', 'k51289', '2019-11-05', 89, 'Klawiatura komputerowa'),
(82, 3, 'A4Tech KV-300H', 'k512810', '2019-11-05', 89, 'Klawiatura komputerowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipment_types`
--

CREATE TABLE `equipment_types` (
  `id` smallint(6) NOT NULL,
  `value` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `equipment_types`
--

INSERT INTO `equipment_types` (`id`, `value`) VALUES
(1, 'Meble'),
(2, 'Komputery'),
(3, 'Peryferyjne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `people`
--

INSERT INTO `people` (`id`, `name`, `surname`, `tel`, `email`, `description`) VALUES
(1, 'Jan', 'Kowalski', 543543543, 'jankowalski89@gmail.com', 'Jakiś opis'),
(2, 'Andrzej', 'Nowak', 123456789, 'andrzejn@wp.pl', 'Konto testowe'),
(3, 'Anna', 'Wesołowska', 434232121, 'annamaria@gmail.com', 'Anna Wesołowska, kierownik działu wysyłek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `id` smallint(6) NOT NULL,
  `workspace_id` smallint(6) NOT NULL,
  `person_id` int(11) NOT NULL,
  `registration_date` datetime NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `workspace_id`, `person_id`, `registration_date`, `expiration_date`) VALUES
(2, 2, 1, '2020-01-01 12:12:12', '2020-01-02 12:12:13'),
(9, 3, 2, '2020-03-19 12:00:00', '2020-03-20 13:00:00'),
(10, 4, 2, '2020-03-19 12:00:00', '2020-03-20 13:00:00'),
(14, 4, 2, '2020-03-18 12:00:00', '2020-03-19 12:00:00'),
(15, 21, 3, '2020-03-21 10:17:00', '2020-03-23 18:00:00'),
(16, 3, 2, '2020-03-21 10:47:00', '2020-03-22 18:00:00'),
(17, 3, 1, '2020-03-22 18:00:00', '2020-03-23 18:00:00'),
(18, 1, 1, '2020-03-21 11:17:00', '2020-03-21 11:17:00'),
(21, 7, 2, '2020-03-24 14:00:00', '2020-03-25 16:30:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workspaces`
--

CREATE TABLE `workspaces` (
  `id` smallint(6) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `workspaces`
--

INSERT INTO `workspaces` (`id`, `code`, `description`) VALUES
(1, 'P1', 'Stanowisko dla programisty'),
(2, 'P2', 'Stanowisko dla programisty'),
(3, 'P3', 'Stanowisko dla programisty'),
(4, 'P4', 'Stanowisko dla programisty'),
(5, 'P5', 'Stanowisko dla programisty'),
(6, 'P6', 'Stanowisko dla programisty'),
(7, 'P7', 'Stanowisko dla programisty'),
(21, 'K1', 'Stanowisko dla księgowych'),
(22, 'K2', 'Stanowisko dla księgowych'),
(23, 'K3', 'Stanowisko dla księgowych'),
(24, 'K4', 'Stanowisko dla księgowych'),
(25, 'K5', 'Stanowisko dla księgowych');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `workspaces_equipment`
--

CREATE TABLE `workspaces_equipment` (
  `id` int(11) NOT NULL,
  `workspace_id` smallint(6) NOT NULL,
  `equipment_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `workspaces_equipment`
--

INSERT INTO `workspaces_equipment` (`id`, `workspace_id`, `equipment_id`) VALUES
(1, 1, 1),
(2, 2, 18),
(9, 4, 64),
(11, 3, 3),
(12, 5, 4),
(13, 4, 15),
(14, 6, 5),
(15, 7, 16),
(17, 22, 7),
(18, 23, 13),
(19, 24, 21),
(20, 25, 8),
(21, 1, 73),
(22, 2, 74),
(23, 3, 75),
(24, 4, 76),
(28, 21, 6),
(31, 6, 65),
(32, 5, 66),
(33, 7, 67),
(34, 1, 63);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `equipment_data`
--
ALTER TABLE `equipment_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_types`
--
ALTER TABLE `equipment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces_equipment`
--
ALTER TABLE `workspaces_equipment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `equipment_data`
--
ALTER TABLE `equipment_data`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT dla tabeli `equipment_types`
--
ALTER TABLE `equipment_types`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT dla tabeli `workspaces_equipment`
--
ALTER TABLE `workspaces_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
