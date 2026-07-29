-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Tem 2026, 19:15:12
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `customers_database`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminUSERNAME` varchar(255) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`adminID`, `adminUSERNAME`, `adminPASSWORD`) VALUES
(1, 'baranbsrn', '$2y$10$2fom6ipTUZ5jk1JuB.eWFueEHSPryLA92423mahHTfXsNd140bcmi'),
(9, 'baranbsrn7', '$2y$10$zSNA.TbjvYgIe5ol1.7YYO6O.3eMWzJYlRNyLUlAMgPAUU9Fex.LS'),
(11, 'baran222', '$2y$10$/zoARuwQgV0e6Szc3VkXb.BDsmFHU.w7bWu3d4bOmUWf5p8X2LGLW'),
(13, 'baran123', '$2y$10$dUAfzy9VdIUAgw8RnFQAUezPW27O7KIME2OhaKwALg29af8dhTFBi'),
(14, 'baran123456', '$2y$10$YRint18EtoZ6nll.8O.W6OJjD4Bl7e.mT5fLMPDM4NlsOB3.GOIqK'),
(15, 'Baranbasaran', '$2y$10$J.868HU/Py.IkFQdpfmI6u7dol7WPDTZL4YbTxlMmfXH3pr3TlZCe');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerNAME` varchar(50) NOT NULL,
  `customerSURNAME` varchar(50) NOT NULL,
  `companyNAME` varchar(100) NOT NULL,
  `customerEMAIL` varchar(100) NOT NULL,
  `customerPHONE` varchar(11) NOT NULL,
  `customerCITY` varchar(50) NOT NULL,
  `customerSTATUS` varchar(20) NOT NULL,
  `registerDATE` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `customers`
--

INSERT INTO `customers` (`customerID`, `customerNAME`, `customerSURNAME`, `companyNAME`, `customerEMAIL`, `customerPHONE`, `customerCITY`, `customerSTATUS`, `registerDATE`) VALUES
(2, 'Baran', 'Başaran', 'gelişim üni', 'baranbsrn10@gmail.com', '05056926364', 'istanbul', 'Active', '2026-07-27 15:36:51'),
(6, 'Ahmet', 'Yılmaz', 'A Firması', 'baranbsrn10@gmail.com', '05356874543', 'Bursa', 'Active', '2026-07-27 14:39:19'),
(7, 'Mehmet', 'YILDIZ', 'B firması', 'mehmetyildiz@gmail.com', '05428345629', 'İzmir', 'Active', '2026-07-27 14:41:53'),
(8, 'zeynep ', 'başaran', 'gelişim üni', 'zeynepbsrn@gmail.com', '0534569823', 'istanbul', 'Active', '2026-07-28 15:36:28'),
(9, 'ali ', 'çınar', 'C firması', 'cinarali@gmail.com', '05329836452', 'İstanbul', 'Active', '2026-07-28 15:37:36');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
