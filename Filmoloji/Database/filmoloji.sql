-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 May 2024, 00:38:13
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
-- Veritabanı: `filmoloji`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL,
  `film_adi` varchar(255) NOT NULL,
  `film_aciklama` text DEFAULT NULL,
  `film_resim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`film_id`, `film_adi`, `film_aciklama`, `film_resim`) VALUES
(13, 'Deadpool', 'Eski bir özel kuvvetler görevlisi olan Wade Wilson ordudan ayrıldıktan sonra kendi çöplüğünde, kendi kurallarına göre takılan, kötünün iyisi bir adamdır. Hayatına yeni giren Vanessa ile harika bir uyumu varken bir şeylerin tam da yolunda gittiğni düşünürken, kanser olduğu gerçeğiyle yüz yüze kalır.', 'img/Deadpool.jpg'),
(14, 'DAĞ 2', 'Teröristlerin elinden kurtulmayı başaran iki arkadaş Oğuz ve Bekir, 6 yıl sonra özel bir görev için Özel Kuvvetler 8. Muharebe Arama Kurtarma Timi\'ne katılır. Timin özel görevi ise Kuzey Irak\'ta bir terör örgütü tarafından kaçırılan gazeteci Ceyda Balaban\'ı kurtarmaktır. Ancak bu sefer düşman geçmişteki gibi bir tane değildir. MAK\'ın karşısında bu acımasız coğrafyada birbiriyle çatışan birden fazla kuvvet vardır ve işler bu sefer hiç olmadığı kadar zordur. Gişede başarı kazanan Dağ filminin ardından gelen devam filmi Dağ 2 filminde yine başrolleri Çağlar Ertuğrul ve Ufuk Bayraktar paylaşırken Alper Çağlar da filmin yönetmenliğini ve senaristliğini üstleniyor.', 'img/Dağ2.jpg'),
(15, 'İSTANBUL İÇİN SON ÇAĞRI', 'New York havalimanında bavulu başkası ile karışınca kendisini zor bir durumun içinde bulur. Bu sırada yolu Mehmet ile kesişen Serin, onunla birlikte kaybolan valizinin peşinde düşer. Bu süreçte Serin ve Mehmet, New York\'ta aşk, evlilik ve sadakat üzerine bir keşfe çıkarlar.', 'img/istanbul.jpg'),
(16, 'İRONMAN 3', 'Tony Stark, Avengers filminde yaşanan New York olayından sonra psikolojik olarak sorunlar yaşamaktadır ve kendi içerisinde zorlu bir mücadeleye girmiştir. Geçirdiği bu zorlu dönemde Mandarin adında korkunç bir terörist tarafından hayatına darbe alacak ve kendisini tekrar toparlaması gerekecektir.', 'img/IronMan3.jpg'),
(17, 'G.O.R.A', 'Tüccarlik yapan iyi niyetli Arif, uzaylilar tarafindan kaçirilir. Tutsak olan Arif kaçip dünyaya dönmek ister, fakat karsisinda dünyalilardan nefret eden Komutan Logar vardir.', 'img/gORA.jpg'),
(18, 'A.R.O.G', 'Filmde, G.O.R.A gezegeninde tutsak olan Arif\'e büyük kin besleyen Komutan Logar, onu zaman makinesiyle bir milyon yıl öncesine gönderir. Taş Devri insanları, dinozorlar ve prehistorik kuşların yer aldığı komedide Arif\'in komik serüvenleri tüm hızıyla devam etmekte.', 'img/Arog.jpg'),
(19, 'İnek Şaban', 'Karpuz satarak yasamini kazanan Saban\'in sevgilisi Ayse evlenebilmesi için baslik parasina ihtiyaci vardir. Onu biriktirmek için Almanya\'ya gitmeye karar verir. Fenerbahçe\'nin Saban\'a benzeyen ünlü kalecisi Bülent takimini yüzüstü birakip Amerika\'ya kaçar. Takimin yöneticileri Almanya\'ya gitmek üzere havaalanina giden Saban\'ı Bülent zannederek kaçirirlar. Saban kimseye derdini anlatamaz.', 'img/İnek_Şaban.jpg'),
(20, 'Vizontele', 'Film, 1974 yılının başlarında Hakkâri\'ye televizyon gelmesini anlatmaktadır. Burası, her şeyin haberinin en son ulaştığı yerlerden birisidir ve bunu duyan ahali, televizyonun yani \'\'vizontele\'\'nin nasıl bir şey olduğunu çok merak eder. TRT tarafından oraya sürgün gönderilen memurlar, alıcıyı kurmadan geri dönerler. Belediye Başkanı Nazmi, bu işin üstesinden gelmek için şehrin delisi olarak bilinen Emin\'den yardım alır. Emin, aslında deli olmayan, teknolojik aletlere pek ilgisi olan, bütün radyoları tamir eden ve ilginç bir yaşantıya sahip olan bir karakterdir.', 'img/Vizontele.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_secimleri`
--

CREATE TABLE `kullanici_secimleri` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `film` varchar(255) NOT NULL,
  `koltuk` int(11) NOT NULL,
  `saat` time NOT NULL,
  `satin_alma_saati` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `resim_adi` varchar(255) NOT NULL,
  `resim_yolu` varchar(255) NOT NULL,
  `baslik` varchar(255) DEFAULT NULL,
  `aciklama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `resim_adi`, `resim_yolu`, `baslik`, `aciklama`) VALUES
(15, 'Slider 1', 'img/1.jpg', 'Slider 1 Başlık', 'Slider 1 Açıklama'),
(16, 'Slider 2', 'img/2.jpg', 'Slider 2 Başlık', 'Slider 2 Açıklama'),
(18, 'Slider3', 'img/3.jpg', 'Slider3', 'Slider3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`film_id`);

--
-- Tablo için indeksler `kullanici_secimleri`
--
ALTER TABLE `kullanici_secimleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_secimleri`
--
ALTER TABLE `kullanici_secimleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
