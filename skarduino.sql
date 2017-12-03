-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: Po 16.Okt 2017, 19:31
-- Verzia serveru: 5.7.19-17-log
-- Verzia PHP: 7.0.22-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `skarduino`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ContactAdministrator`
--

CREATE TABLE `ContactAdministrator` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Humidity`
--

CREATE TABLE `Humidity` (
  `id` int(11) NOT NULL,
  `humidity` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `PressureOutside`
--

CREATE TABLE `PressureOutside` (
  `id` int(11) NOT NULL,
  `pressure` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `TempLivingRoom`
--

CREATE TABLE `TempLivingRoom` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `TempOutside`
--

CREATE TABLE `TempOutside` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `ContactAdministrator`
--
ALTER TABLE `ContactAdministrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `Humidity`
--
ALTER TABLE `Humidity`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `PressureOutside`
--
ALTER TABLE `PressureOutside`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `TempLivingRoom`
--
ALTER TABLE `TempLivingRoom`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `TempOutside`
--
ALTER TABLE `TempOutside`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `ContactAdministrator`
--
ALTER TABLE `ContactAdministrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `Humidity`
--
ALTER TABLE `Humidity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT pre tabuľku `PressureOutside`
--
ALTER TABLE `PressureOutside`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT pre tabuľku `TempLivingRoom`
--
ALTER TABLE `TempLivingRoom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1129;

--
-- AUTO_INCREMENT pre tabuľku `TempOutside`
--
ALTER TABLE `TempOutside`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
