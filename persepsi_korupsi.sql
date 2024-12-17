-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2024 pada 14.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persepsi_korupsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `responden`
--

CREATE TABLE `responden` (
  `id_responden` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `jkelamin` enum('lakilaki','perempuan') NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `pendidikan` enum('sd','smp','sma','d3','s1','s2','s3') NOT NULL,
  `pekerjaan` enum('pns','tni','polri','swasta','wirausaha','pelajar','lain') NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `responden`
--

INSERT INTO `responden` (`id_responden`, `nama`, `nohp`, `jkelamin`, `umur`, `pendidikan`, `pekerjaan`, `layanan`, `tanggal_input`) VALUES
(7, 'SAID SHODIQ MUFADHAL', '081991848420', 'lakilaki', 23, 's1', 'pns', 'layanan5', '2024-12-17 09:21:07'),
(8, 'Zaki', '081991847899', 'perempuan', 32, 's3', 'pelajar', 'layanan5', '2024-12-17 13:38:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `id_responden` int(11) NOT NULL,
  `diskriminasi_1` tinyint(4) NOT NULL CHECK (`diskriminasi_1` between 1 and 4),
  `diskriminasi_2` tinyint(4) NOT NULL CHECK (`diskriminasi_2` between 1 and 4),
  `kecurangan` tinyint(4) NOT NULL CHECK (`kecurangan` between 1 and 4),
  `imbalan_uang` tinyint(4) NOT NULL CHECK (`imbalan_uang` between 1 and 4),
  `imbalan_barang` tinyint(4) NOT NULL CHECK (`imbalan_barang` between 1 and 4),
  `imbalan_fasilitas` tinyint(4) NOT NULL CHECK (`imbalan_fasilitas` between 1 and 4),
  `pungli` tinyint(4) NOT NULL CHECK (`pungli` between 1 and 4),
  `percaloan` tinyint(4) NOT NULL CHECK (`percaloan` between 1 and 4),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `id_responden`, `diskriminasi_1`, `diskriminasi_2`, `kecurangan`, `imbalan_uang`, `imbalan_barang`, `imbalan_fasilitas`, `pungli`, `percaloan`, `created_at`) VALUES
(5, 7, 4, 4, 4, 4, 4, 4, 4, 4, '2024-12-17 09:21:07'),
(6, 8, 2, 3, 1, 4, 3, 2, 4, 2, '2024-12-17 13:38:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indeks untuk tabel `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_responden` (`id_responden`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD CONSTRAINT `survey_responses_ibfk_1` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
