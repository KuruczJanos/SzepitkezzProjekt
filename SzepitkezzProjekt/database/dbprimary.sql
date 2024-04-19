-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 11. 19:42
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `dbprimary`
--
CREATE DATABASE IF NOT EXISTS `dbprimary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbprimary`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ads`
--

CREATE TABLE `ads` (
  `AdAz` int(15) UNSIGNED NOT NULL COMMENT 'Hírdetés azonosító',
  `StoreName` varchar(50) DEFAULT NULL COMMENT 'Felhasználó teljes neve',
  `StoreEmail` varchar(80) DEFAULT NULL COMMENT 'Felhasználó email címe',
  `StoreMobile` bigint(11) UNSIGNED DEFAULT NULL COMMENT 'Felhasználó telefonszáma',
  `ServiceType` varchar(30) DEFAULT NULL COMMENT 'Szolgáltatás neve',
  `StoreAddress` varchar(50) DEFAULT NULL COMMENT 'Szolgáltatás helye',
  `UserAz` smallint(15) UNSIGNED NOT NULL COMMENT 'Felhasználó azonosító',
  `StoreDescription` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `StoreImageURL` varchar(100) DEFAULT NULL,
  `LastModifyDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ads`
--

INSERT INTO `ads` (`AdAz`, `StoreName`, `StoreEmail`, `StoreMobile`, `ServiceType`, `StoreAddress`, `UserAz`, `StoreDescription`, `StoreImageURL`, `LastModifyDate`) VALUES
(23, 'Fodrászat minta', 'FodraszMintaVaros@gmail.com', 36205587441, 'Fodrász', '1234 Minta Város, Próba utca 12', 23, 'Fodrászat minta hirdetés feltöltése', '../img/ads/66168f1624dab_fodraszatMinta.png', '2024-04-10 15:07:34'),
(24, 'KozmetikusMinta', 'kozmetikus@gmail.com', 3670123456789, 'Kozmetikus', '1155 Budapest Kozmetikus utca 1', 23, 'Kozmetikus hirdetés feltöltve', '../img/ads/6618168fa97c5_kozmetikusminta.jpg', '2024-04-11 18:57:51'),
(25, 'Barber Budapest', 'barber.budapest@example.com', 36303556478, 'Barber', '1114 Budapest Minta Tér 2', 23, 'Budapest legmodernebb barber shopja várja szépülni vágyó vendégeit a belváros szivében.  ', '../img/ads/661816bf78e6e_barberMinta.jpg', '2024-04-11 18:58:39'),
(26, 'SzempillásMinta', 'szemplla@gmail.com', 36302154778, 'Szempillás', '5584 Kazincbarcika szempilla utca 2', 23, 'Szempillas hirdetés feltöltve', '../img/ads/6618171048219_szempillas.png', '2024-04-11 19:00:00'),
(27, 'KormosMinta', 'kormosminta@gmail.com', 36504789985, 'Műkörmös', '8000 Székesfehérvár Pesti út 80', 23, 'mukormos minta hirdetés', '../img/ads/66181753afa73_kormosminta.jpg', '2024-04-11 19:01:07'),
(28, 'masszorMinta', 'masszorMinta@gmail.com', 36782584569, 'Masszőr', '9874 MasszorVáros Károly tér 12', 23, 'masszorMinta hirdetés feltöltve', '../img/ads/661817921e444_masszorminta.jpg', '2024-04-11 19:02:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `services`
--

CREATE TABLE `services` (
  `ServiceAz` int(15) UNSIGNED NOT NULL COMMENT 'Szolgáltatás azonoítója',
  `ServiceName` varchar(30) DEFAULT NULL COMMENT 'Szolgáltatás neve',
  `ServiceImgURL` varchar(1000) NOT NULL COMMENT 'Szolgáltatás Content Kép'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `services`
--

INSERT INTO `services` (`ServiceAz`, `ServiceName`, `ServiceImgURL`) VALUES
(2, 'Fodrász', '../img/content/fodrasz.jpg'),
(4, 'Kozmetikus', '../img/content/kozmetikus.jpg'),
(5, 'Műkörmös', '../img/content/korom.jpg'),
(6, 'Masszőr', '../img/content/masszor.png'),
(7, 'Smink tetováló', '../img/content/smink.jpg'),
(8, 'Szempillás', '../img/content/szempilla.jpg'),
(9, 'Szépségterapeuta', '../img/content/szalon.jpg'),
(10, 'Barber', '../img/content/barber.jpg'),
(11, 'Manikűr/Pedikűr', '../img/content/manikur.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `subscribes`
--

CREATE TABLE `subscribes` (
  `subAz` int(255) NOT NULL,
  `subEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Feliratkozások emailre';

--
-- A tábla adatainak kiíratása `subscribes`
--

INSERT INTO `subscribes` (`subAz`, `subEmail`) VALUES
(1, 'kuruczjanoshivatalos@gmail.com'),
(3, 'gggg@gggg.com'),
(4, 'hasbullah@gmail.com'),
(5, 'janika@gmail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `UserAz` smallint(15) UNSIGNED NOT NULL COMMENT 'Felhasználó azonosítója',
  `UserName` varchar(20) DEFAULT NULL COMMENT 'Belépési felhasználónév',
  `UserPassword` varchar(25) DEFAULT NULL COMMENT 'Belépési jelszó',
  `UserEmail` varchar(80) DEFAULT NULL COMMENT 'Felhasználó email címe',
  `UserMobile` bigint(11) UNSIGNED DEFAULT NULL COMMENT 'Felhasználó telefonszáma',
  `UserFullName` varchar(50) DEFAULT NULL COMMENT 'Felhasználó teljes neve',
  `Type` int(1) DEFAULT NULL COMMENT 'Felhasználó 0, Admin 1',
  `UserPhoto` varchar(255) DEFAULT NULL,
  `ResetCode` varchar(15) NOT NULL COMMENT 'Jelszó változtatás kódja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`UserAz`, `UserName`, `UserPassword`, `UserEmail`, `UserMobile`, `UserFullName`, `Type`, `UserPhoto`, `ResetCode`) VALUES
(1, 'Kurucz', '186332', 'kuruczjanos@gmail.com', 6303273051, 'Kurucz János', 1, '', ''),
(2, 'Meggyesi', '123456789', 'meggyesireka@gmail.com', 6222222222, 'Meggyesi Réka', 1, '', ''),
(23, 'szolgaltatas', 'szolgaltatasok', 'szolgaltatasok@gmail.com', 36703254455, 'Szolgáltatások Bemutatása', 0, '../img/users/66168d2dcfd54_szolgaltatasokminta.jpg', 'PZLOIYXHXWOdtj4'),
(24, 'Admin1', 'admin', 'admin@szepitkezz.com', 36705727086, 'Admin Szépitkezz', 1, '../img/users/661818388bb7b_admin.jpg', 'o6HlY7WcQzTnqMn');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`AdAz`),
  ADD KEY `UserFullName` (`StoreName`),
  ADD KEY `UserEmail` (`StoreEmail`),
  ADD KEY `UserMobile` (`StoreMobile`),
  ADD KEY `ServiceName` (`ServiceType`),
  ADD KEY `UserAz` (`UserAz`);

--
-- A tábla indexei `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceAz`),
  ADD KEY `ServiceName` (`ServiceName`);

--
-- A tábla indexei `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`subAz`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserAz`),
  ADD KEY `UserEmail` (`UserEmail`,`UserMobile`,`UserFullName`),
  ADD KEY `UserMobile` (`UserMobile`,`UserFullName`),
  ADD KEY `UserFullName` (`UserFullName`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ads`
--
ALTER TABLE `ads`
  MODIFY `AdAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Hírdetés azonosító', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `services`
--
ALTER TABLE `services`
  MODIFY `ServiceAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Szolgáltatás azonoítója', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `subAz` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `UserAz` smallint(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Felhasználó azonosítója', AUTO_INCREMENT=25;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`ServiceType`) REFERENCES `services` (`ServiceName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_5` FOREIGN KEY (`UserAz`) REFERENCES `users` (`UserAz`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
