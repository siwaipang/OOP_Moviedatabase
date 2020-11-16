-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 mei 2020 om 11:10
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedatabaseoop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `idaccount` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`idaccount`, `username`, `password`) VALUES
(1, 'Gezinslid1', '1234'),
(2, 'Gezinslid2', '1234');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `film`
--

CREATE TABLE `film` (
  `idFilm` int(11) NOT NULL,
  `Algezien` tinyint(4) DEFAULT 0,
  `Rating` int(11) DEFAULT NULL,
  `ImdbID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `film`
--

INSERT INTO `film` (`idFilm`, `Algezien`, `Rating`, `ImdbID`) VALUES
(1, 1, NULL, 'tt0112442'),
(3, 1, NULL, 'tt0214341'),
(5, 1, NULL, 'tt0309593'),
(7, 1, NULL, 'tt4919268'),
(10, 1, NULL, 'tt0257106'),
(13, 1, NULL, 'tt0306047'),
(14, 1, NULL, 'tt0362120'),
(18, 0, NULL, 'tt2267998'),
(20, 0, NULL, 'tt0353496'),
(28, 1, NULL, 'tt3336304'),
(29, 0, NULL, 'tt2294629'),
(32, 0, NULL, 'tt7286456'),
(34, 1, NULL, 'tt0076759'),
(35, 0, NULL, 'tt0468569'),
(36, 0, NULL, 'tt3729188'),
(37, 0, NULL, 'tt0078346'),
(39, 0, NULL, 'tt0086960'),
(40, 0, NULL, 'tt2380307'),
(41, 0, NULL, 'tt0848228'),
(43, 0, NULL, 'tt0110912'),
(45, 0, NULL, 'tt0120737'),
(47, 0, NULL, 'tt1375666'),
(49, 0, NULL, 'tt0120689'),
(50, 0, NULL, 'tt0360717'),
(51, 0, NULL, 'tt0032455'),
(52, 0, NULL, 'tt1014759'),
(53, 0, NULL, 'tt0046183'),
(54, 0, NULL, 'tt0032910'),
(55, 1, NULL, 'tt1396484'),
(56, 1, NULL, 'tt0032553'),
(59, 1, NULL, 'tt2948356');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `film_has_account`
--

CREATE TABLE `film_has_account` (
  `Film_idFilm` int(11) NOT NULL,
  `account_idaccount` int(11) NOT NULL,
  `idFIlmAccount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `film_has_account`
--

INSERT INTO `film_has_account` (`Film_idFilm`, `account_idaccount`, `idFIlmAccount`) VALUES
(29, 1, 1),
(29, 2, 2),
(1, 2, 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idaccount`);

--
-- Indexen voor tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`),
  ADD UNIQUE KEY `ImdbID_UNIQUE` (`ImdbID`);

--
-- Indexen voor tabel `film_has_account`
--
ALTER TABLE `film_has_account`
  ADD PRIMARY KEY (`idFIlmAccount`),
  ADD KEY `fk_Film_has_account_Film_idx` (`Film_idFilm`),
  ADD KEY `fk_Film_has_account_account1_idx` (`account_idaccount`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `idaccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `film`
--
ALTER TABLE `film`
  MODIFY `idFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT voor een tabel `film_has_account`
--
ALTER TABLE `film_has_account`
  MODIFY `idFIlmAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `film_has_account`
--
ALTER TABLE `film_has_account`
  ADD CONSTRAINT `fk_Film_has_account_Film` FOREIGN KEY (`Film_idFilm`) REFERENCES `film` (`idFilm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Film_has_account_account1` FOREIGN KEY (`account_idaccount`) REFERENCES `account` (`idaccount`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
