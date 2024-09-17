-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Ağu 2022, 09:47:42
-- Sunucu sürümü: 10.4.16-MariaDB
-- PHP Sürümü: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ofis_yonetimv1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `duyuru_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `duyuru_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `duyuru_bitistarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `duyuru_eklemetarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorev`
--

CREATE TABLE `gorev` (
  `id` int(11) NOT NULL,
  `gorev_projeadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `gorev_kullanici` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_durum` int(11) NOT NULL,
  `gorev_firma` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_website` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_tarih` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `bildirim` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istakip`
--

CREATE TABLE `istakip` (
  `id` int(11) NOT NULL,
  `is_adi` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `is_aciklama` text CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `baslangic_saat` timestamp NULL DEFAULT NULL,
  `bitis_saat` timestamp NULL DEFAULT NULL,
  `is_kullanici` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `is_durum` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `musteri_id` int(11) NOT NULL,
  `musteri_sirketadi` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_unvan` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_sektor` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_gsm` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_sabithat` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_internetsitesi` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_aciklama` varchar(900) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_il` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_ilce` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_adres` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_durum` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_kullanici` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_tarih` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_eposta` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `id` int(11) NOT NULL,
  `proje_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `proje_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `proje_durum` int(11) DEFAULT NULL,
  `proje_kullanici` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `proje_baslangicTarih` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `proje_bitisTarih` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `proje_firmaadi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `proje_gsm` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `proje_eposta` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `musteri_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `res_id` int(11) NOT NULL,
  `res_ad` varchar(250) NOT NULL,
  `res_tur` int(11) NOT NULL,
  `res_kullanici` varchar(250) NOT NULL,
  `gorev_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_dogumTarih` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_baslangicTarih` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_telefon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `user_adres` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_mail`, `user_role`, `user_dogumTarih`, `user_baslangicTarih`, `user_telefon`, `user_adres`, `user_adsoyad`, `cinsiyet`) VALUES
(1, 'toretto', '25e150178e6933ed981d0c0eedac1173', 'info@toretto.com.tr', 1, '19-07-2022', '19-07-2022', '0533 220 75 95', 'Cumhuriyet Mah, Cezmi Sokağı No:5B/3, 34210\r\nBüyükçekmece/İstanbul', 'Toretto ', 'erkek');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gorev`
--
ALTER TABLE `gorev`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `istakip`
--
ALTER TABLE `istakip`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`res_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `gorev`
--
ALTER TABLE `gorev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Tablo için AUTO_INCREMENT değeri `istakip`
--
ALTER TABLE `istakip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
