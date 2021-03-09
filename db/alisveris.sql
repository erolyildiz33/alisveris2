-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Mar 2021, 23:44:56
-- Sunucu sürümü: 5.7.31-log
-- PHP Sürümü: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `alisveris`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `password`, `ip`) VALUES
(1, 'Erol YILDIZ', 'a@a', '1234', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `ustmenu` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT '0',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `ustmenu`, `title`, `rank`, `isActive`, `createdAt`) VALUES
(1, 0, 'Giyim', 0, 0, '2021-02-09 15:09:36'),
(3, 0, 'Baska', 2, 0, '2021-02-09 16:40:26'),
(4, 1, 'pantolon', 0, 1, '2021-02-09 15:36:45'),
(6, 3, 'Video', 0, 1, '2021-02-11 09:11:22'),
(7, 5, 'Uzuun Ceket', 1, 1, '2021-02-12 11:34:45'),
(10, 5, 'kısa ceket', 0, 0, '2021-02-12 15:24:05'),
(12, 0, 'Şükrü', 1, 1, '2021-02-18 11:05:46'),
(16, 14, 'ornek', 0, 1, '2021-02-18 11:15:16'),
(17, 12, 'deneme', 0, 1, '2021-02-18 11:17:36'),
(18, 1, 'deneme2', 1, 1, '2021-02-18 11:18:03'),
(24, 13, 'deneme', 1, 1, '2021-03-04 15:30:03'),
(25, 23, 'deneme', 1, 1, '2021-03-04 15:30:35'),
(26, 23, 'asdsad', 2, 1, '2021-03-04 15:31:42'),
(28, 27, 'dasdsa', 0, 1, '2021-03-04 15:32:14'),
(29, 1, 'yeni', 2, 0, '2021-03-04 15:42:01'),
(32, 29, 'deneme', 0, 1, '2021-03-04 16:58:11'),
(33, 0, 'yeni-2', 3, 1, '2021-03-05 10:06:27'),
(34, 32, 'aaa', 0, 1, '2021-03-08 13:21:24'),
(35, 34, 'asdsad', 0, 1, '2021-03-08 13:21:43'),
(36, 0, 'deneme', 4, 1, '2021-03-08 23:31:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `logo` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icon` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `info` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `facebook` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `instagram` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `youtube` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `twitter` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `config`
--

INSERT INTO `config` (`id`, `title`, `logo`, `icon`, `info`, `mail`, `facebook`, `instagram`, `youtube`, `twitter`) VALUES
(1, 'eTicaret Sitesi-update', '', '', 'mersin', 'admin@admin.com', 'face', 'instag', 'youtube', 'twitter');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `master` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `product_id`, `path`, `master`) VALUES
(1, 1, 'assets/upload/products/prod-12.jpg', 0),
(2, 1, 'assets/upload/products/prod-21.jpg', 0),
(3, 1, 'assets/upload/products/prod-22.jpg', 0),
(4, 1, 'assets/upload/products/prod-3.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `options`
--

INSERT INTO `options` (`id`, `name`, `slug`) VALUES
(6, 'Numara', 'numara'),
(7, 'Boy', 'boy'),
(8, 'En', 'en'),
(9, 'Kilo', 'kilo'),
(12, 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(254) NOT NULL,
  `title` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `subtitle` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `tag` varchar(254) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `complete` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `category`, `title`, `subtitle`, `description`, `price`, `discount`, `tag`, `complete`, `active`, `date`) VALUES
(1, 1, 'ürün adı', 'açıklama', 'uzun açıklama', 30, 20, NULL, 1, 0, '2021-03-08 21:31:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(11) NOT NULL,
  `option_id` int(20) NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `name`) VALUES
(2, 6, '33'),
(3, 6, '34'),
(4, 6, '35'),
(5, 6, '36'),
(6, 6, '32');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
