- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Pritësi (host): 127.0.0.1
-- Koha e gjenerimit: Mar 28, 2024 në 12:35 MD
-- Versioni i serverit: 10.4.32-MariaDB
-- PHP Versioni: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databaza: `shitorja`
--

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `artikulli`
--

CREATE TABLE `artikulli` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `çmimi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zbraz të dhënat për tabelën `artikulli`
--

INSERT INTO `artikulli` (`id`, `emri`, `çmimi`) VALUES
(1, 'Laptop Lenovo IdeaPad 3', 600),
(2, 'Kompjuter FenixSeries 23', 890),
(3, 'Apple iPhone 15 Pro Max', 1579),
(4, 'Televizor Samsung', 500),
(5, 'Apple MacBook Air', 1200);

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `blerja`
--

CREATE TABLE `blerja` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `data_blerjes` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zbraz të dhënat për tabelën `blerja`
--

INSERT INTO `blerja` (`id`, `emri`, `email`, `adresa`, `data_blerjes`) VALUES
(1, 'afrim', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 02:50:09'),
(2, 'art', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 02:53:06'),
(3, 'art', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 02:57:35'),
(4, 'filan', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 03:03:15'),
(5, 'filan', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 03:06:30'),
(6, 'filan', 'afrimrexhepi@gmail.com', 'marije shllaku', '2024-03-28 03:08:19'),
(7, 'afrim1000', 'admin@gmail.com', 'hhhhh', '2024-03-28 03:16:57'),
(8, 'afrim', 'afrimrexhepi@gmail.com', 'ddd', '2024-03-28 03:59:36'),
(9, 'afrim', 'afrimrexhepi@gmail.com', 'jkjkjl', '2024-03-28 04:12:15'),
(10, '', '', '', '2024-03-28 04:19:00'),
(11, 'Alejna', 'alejna@gmail.com', 'test', '2024-03-28 04:25:05'),
(12, 'afrim', 'afrimrexhepi@gmail.com', 'm m  ', '2024-03-28 04:26:17'),
(13, 'afrim', 'afrimrexhepi@gmail.com', 'dcscds', '2024-03-28 04:31:47'),
(14, 'afrim', 'afrimrexhepi@gmail.com', '  sddsd', '2024-03-28 04:32:09'),
(15, 'afrim', 'afrimrexhepi@gmail.com', 'm m  ', '2024-03-28 04:32:45'),
(16, '', '', '', '2024-03-28 04:33:01'),
(17, 'afrim', 'afrimrexhepi@gmail.com', ' mm', '2024-03-28 04:33:31'),
(18, 'afrim', ' mm', ',mmm', '2024-03-28 04:34:08'),
(19, 'filan', 'afrimrexhepi@gmail.com', ' mm', '2024-03-28 04:36:40'),
(20, 'afrim', 'afrimrexhepi@gmail.com', 'mmm', '2024-03-28 04:37:52'),
(21, 'filan', 'afrimrexhepi@gmail.com', 'm,', '2024-03-28 04:40:21'),
(22, 'afrim', 'afrimrexhepi@gmail.com', ',', '2024-03-28 04:40:38'),
(23, 'afrim', 'afrimrexhepi@gmail.com', ',,,', '2024-03-28 04:41:50'),
(24, ' fdf', 'fd', 'fdsf', '2024-03-28 04:42:10'),
(25, 'Denis Kqiku', 'denis', '', '2024-03-28 11:12:45'),
(26, 'erton', 'Ertonislami@gmail.com', 'te xhamia ne zheger', '2024-03-28 11:17:10'),
(27, 'aron', 'ahmetiaron1@gmail.com', 'te albi mall', '2024-03-28 11:18:11');

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `blerja_artikulli`
--

CREATE TABLE `blerja_artikulli` (
  `id` int(11) NOT NULL,
  `id_blerja` int(11) NOT NULL,
  `id_artikulli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zbraz të dhënat për tabelën `blerja_artikulli`
--

INSERT INTO `blerja_artikulli` (`id`, `id_blerja`, `id_artikulli`) VALUES
(1, 3, 2),
(2, 3, 2),
(3, 3, 4),
(4, 3, 3),
(5, 4, 2),
(6, 4, 2),
(7, 4, 4),
(8, 4, 3),
(9, 5, 2),
(10, 5, 2),
(11, 5, 4),
(12, 5, 3),
(13, 6, 2),
(14, 6, 2),
(15, 6, 4),
(16, 6, 3),
(17, 7, 2),
(18, 7, 2),
(19, 8, 2),
(20, 8, 4),
(21, 9, 2),
(22, 10, 2),
(23, 11, 2),
(24, 12, 2),
(25, 13, 2),
(26, 14, 2),
(27, 15, 2),
(28, 16, 2),
(29, 17, 2),
(30, 18, 3),
(31, 19, 3),
(32, 20, 3),
(33, 21, 3),
(34, 22, 3),
(35, 23, 3),
(36, 24, 3),
(37, 25, 1),
(38, 25, 3),
(39, 26, 2),
(40, 26, 3),
(41, 26, 4),
(42, 27, 1),
(43, 27, 2),
(44, 27, 2);

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `klienti`
--

CREATE TABLE `klienti` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kontakti` varchar(255) NOT NULL,
  `qyteti` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zbraz të dhënat për tabelën `klienti`
--

INSERT INTO `klienti` (`id`, `emri`, `email`, `password`, `kontakti`, `qyteti`, `adresa`) VALUES
(1, 'admin', 'admin@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '049100100', 'Gjilan', 'Skenderbeu'),
(6, 'afrim', 'admin@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', '049100100', 'Gjilan', 'Skenderbeu'),
(7, 'filan', '', '4a7d1ed414474e4033ac29ccb8653d9b', '', '', ''),
(8, 'fllad', '', '4a7d1ed414474e4033ac29ccb8653d9b', '', '', ''),
(9, 'arben', '', '4a7d1ed414474e4033ac29ccb8653d9b', '', '', ''),
(10, 'arber', '', '4a7d1ed414474e4033ac29ccb8653d9b', '', '', ''),
(11, 'art', '', '4a7d1ed414474e4033ac29ccb8653d9b', '', '', ''),
(12, 'erton', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '', ''),
(13, 'aron', '', 'c8879c64507f84649ccb06b0c209f49c', '', '', ''),
(14, 'Eriol Avdyli', '', '96d773f72d26a210cdaf45e7e8097f4d', '', '', '');

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `klienti_artikulli`
--

CREATE TABLE `klienti_artikulli` (
  `id` int(11) NOT NULL,
  `id_klienti` int(11) NOT NULL,
  `id_artikulli` int(11) NOT NULL,
  `statusi` enum('shtuar në shportë','konfirmuar') NOT NULL,
  `zgjedhur` tinyint(1) DEFAULT 0,
  `sasia` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zbraz të dhënat për tabelën `klienti_artikulli`
--

INSERT INTO `klienti_artikulli` (`id`, `id_klienti`, `id_artikulli`, `statusi`, `zgjedhur`, `sasia`) VALUES
(273, 7, 4, 'shtuar në shportë', 0, 2),
(274, 7, 5, 'shtuar në shportë', 0, 2),
(349, 8, 1, 'shtuar në shportë', 0, 1),
(354, 9, 3, 'shtuar në shportë', 0, 1),
(355, 9, 4, 'shtuar në shportë', 0, 1),
(391, 11, 2, 'shtuar në shportë', 0, 1),
(392, 11, 2, 'shtuar në shportë', 0, 1),
(395, 6, 3, 'shtuar në shportë', 0, 1),
(396, 6, 1, 'shtuar në shportë', 0, 1),
(397, 12, 3, 'shtuar në shportë', 0, 1),
(398, 12, 2, 'shtuar në shportë', 0, 1),
(399, 12, 4, 'shtuar në shportë', 0, 1),
(400, 13, 1, 'shtuar në shportë', 0, 1),
(401, 13, 2, 'shtuar në shportë', 0, 1),
(402, 13, 2, 'shtuar në shportë', 0, 1);

--
-- Indekset për tabelat e hedhura
--

--
-- Indekset për tabelë `artikulli`
--
ALTER TABLE `artikulli`
  ADD PRIMARY KEY (`id`);

--
-- Indekset për tabelë `blerja`
--
ALTER TABLE `blerja`
  ADD PRIMARY KEY (`id`);

--
-- Indekset për tabelë `blerja_artikulli`
--
ALTER TABLE `blerja_artikulli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blerja` (`id_blerja`),
  ADD KEY `id_artikulli` (`id_artikulli`);

--
-- Indekset për tabelë `klienti`
--
ALTER TABLE `klienti`
  ADD PRIMARY KEY (`id`);

--
-- Indekset për tabelë `klienti_artikulli`
--
ALTER TABLE `klienti_artikulli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienti` (`id_klienti`,`id_artikulli`),
  ADD KEY `id_artikulli` (`id_artikulli`);

--
-- AUTO_INCREMENT për tabelat e hedhura
--

--
-- AUTO_INCREMENT për tabelë `artikulli`
--
ALTER TABLE `artikulli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT për tabelë `blerja`
--
ALTER TABLE `blerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT për tabelë `blerja_artikulli`
--
ALTER TABLE `blerja_artikulli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT për tabelë `klienti`
--
ALTER TABLE `klienti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT për tabelë `klienti_artikulli`
--
ALTER TABLE `klienti_artikulli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- Detyrimet për tabelat e hedhura
--

--
-- Detyrimet për tabelën `blerja_artikulli`
--
ALTER TABLE `blerja_artikulli`
  ADD CONSTRAINT `fk_blerja_artikulli_artikulli` FOREIGN KEY (`id_artikulli`) REFERENCES `artikulli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_blerja_artikulli_blerja` FOREIGN KEY (`id_blerja`) REFERENCES `blerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Detyrimet për tabelën `klienti_artikulli`
--
ALTER TABLE `klienti_artikulli`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`id_klienti`) REFERENCES `klienti` (`id`),
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`id_artikulli`) REFERENCES `artikulli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;