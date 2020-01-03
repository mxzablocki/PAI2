-- --------------------------------------------------------
-- Host:                         194.169.126.4
-- Wersja serwera:               10.1.35-MariaDB - MariaDB Server
-- Serwer OS:                    Linux
-- HeidiSQL Wersja:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych daku_organizer
CREATE DATABASE IF NOT EXISTS `daku_organizer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `daku_organizer`;

-- Zrzut struktury tabela daku_organizer.firmy
CREATE TABLE IF NOT EXISTS `firmy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli daku_organizer.firmy: ~4 rows (około)
DELETE FROM `firmy`;
/*!40000 ALTER TABLE `firmy` DISABLE KEYS */;
INSERT INTO `firmy` (`id`, `nazwa`, `active`) VALUES
	(1, 'Zarząd', 1),
	(2, 'Marketing', 1),
	(3, 'Sprzedaż', 1),
	(4, 'Promocja', 1);
/*!40000 ALTER TABLE `firmy` ENABLE KEYS */;

-- Zrzut struktury tabela daku_organizer.rights
CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli daku_organizer.rights: ~2 rows (około)
DELETE FROM `rights`;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
INSERT INTO `rights` (`id`, `nazwa`) VALUES
	(1, 'Administrator'),
	(2, 'Operator'),
	(3, 'Szef');
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;

-- Zrzut struktury tabela daku_organizer.tematy
CREATE TABLE IF NOT EXISTS `tematy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `osoba_kontaktowa` mediumtext COLLATE utf8_polish_ci NOT NULL COMMENT 'E-Mail',
  `data` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `zakonczony` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli daku_organizer.tematy: ~2 rows (około)
DELETE FROM `tematy`;
/*!40000 ALTER TABLE `tematy` DISABLE KEYS */;
INSERT INTO `tematy` (`id`, `nazwa`, `osoba_kontaktowa`, `data`, `zakonczony`) VALUES
	(1, 'Tonery Zajaz drukarka MFC-9140CDN', '2', '15-03-2017', 1),
	(2, 'te', '2', '26-09-2017', 1);
/*!40000 ALTER TABLE `tematy` ENABLE KEYS */;

-- Zrzut struktury tabela daku_organizer.tematy_dane
CREATE TABLE IF NOT EXISTS `tematy_dane` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tematy_id` int(11) NOT NULL,
  `tresc` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `odpowiedz` int(11) NOT NULL DEFAULT '0',
  `data` mediumtext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli daku_organizer.tematy_dane: ~10 rows (około)
DELETE FROM `tematy_dane`;
/*!40000 ALTER TABLE `tematy_dane` DISABLE KEYS */;
INSERT INTO `tematy_dane` (`id`, `tematy_id`, `tresc`, `odpowiedz`, `data`) VALUES
	(1, 1, 'Witam,<br>Pani Mirelo proszę o przygotowanie oferty na tonery do drukarki MFC-9140CDN', 0, '15-03-2017'),
	(2, 1, 'Panie Adamie,<br>Tonery są zawsze na stanie w firmie Tomkomp', 1, '15-03-2017'),
	(3, 1, 'Rozumiem, temat uważam za zamknięty', 0, '16-03-2017'),
	(4, 2, 'temat 2', 0, '26-09-2017'),
	(5, 2, 'frtrytuyiltf hw4 rmrytfdhbv', 1, '27-09-2017'),
	(6, 2, 'test', 1, '27-09-2017'),
	(7, 2, 'bu', 1, '27-09-2017'),
	(8, 2, 'bu', 1, '27-09-2017'),
	(9, 2, 'OK', 0, '27-09-2017'),
	(10, 2, 'grtrdjfhgxjdhfgf', 0, '27-09-2017');
/*!40000 ALTER TABLE `tematy_dane` ENABLE KEYS */;

-- Zrzut struktury tabela daku_organizer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `email` text COLLATE utf8_polish_ci,
  `privilige` int(11) NOT NULL DEFAULT '2',
  `firmy` text COLLATE utf8_polish_ci,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- Zrzucanie danych dla tabeli daku_organizer.users: ~3 rows (około)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `privilige`, `firmy`, `imie`, `nazwisko`, `active`) VALUES
	(1, 'Daku', 'RVVvb3RxNk9vVXJ0ZWJ3K2ZMOVc5UT09', 'daku@battlearena.eu', 1, '1,2', 'Dawid', 'Sobik', 1),
	(2, 'Tomek', 'UHhjbXlFc0RkMGdmSmpyNktkb0hCUT09', 'biuro@tomkompserwis.pl', 2, '2,3', 'Tomasz', 'Białas', 1),
	(3, 'Mirela', '0', 'test@test', 2, '1,2,3', 'Mirela', 'Slotwińska', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
