-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2024 pada 14.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `cabang_id` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`cabang_id`, `nama_cabang`) VALUES
(1, 'Voli'),
(2, 'Basket'),
(3, 'Sepak bola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_lomba`
--

CREATE TABLE `hasil_lomba` (
  `id_hasil` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `turnamen_id` int(11) NOT NULL,
  `mendali_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_lomba`
--

INSERT INTO `hasil_lomba` (`id_hasil`, `member_id`, `turnamen_id`, `mendali_id`) VALUES
(1, 1, 4, 1),
(2, 3, 2, 2),
(4, 5, 5, 1),
(5, 4, 5, 1),
(6, 3, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp(),
  `cabang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `join_date`, `cabang_id`) VALUES
(1, 'Won woo', 'woowjeon17@gmail.com', '08564321987', '2023-07-04', 2),
(3, 'Azhalia', 'azhzulfa@gmail.com', '08546765432', '2024-05-05', 1),
(4, 'Jaehyun Jung', 'jahe_yun@upi.edu', '085643321123', '2024-05-01', 3),
(5, 'Heeseung', 'hiseung@gmail.com', '08548987654', '2024-05-04', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mendali`
--

CREATE TABLE `mendali` (
  `mendali_id` int(11) NOT NULL,
  `jenis_mendali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mendali`
--

INSERT INTO `mendali` (`mendali_id`, `jenis_mendali`) VALUES
(1, 'Emas'),
(2, 'Perak'),
(3, 'Perunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `turnamen`
--

CREATE TABLE `turnamen` (
  `turnamen_id` int(11) NOT NULL,
  `nama_turnamen` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `turnamen`
--

INSERT INTO `turnamen` (`turnamen_id`, `nama_turnamen`, `lokasi`) VALUES
(1, 'Turnamen Voli Internasional 2024', 'Stadion Nasional'),
(2, 'Piala Dunia Voli 2024', 'Amerika Serikat'),
(3, 'Kejuaraan Asia Voli 2024', 'Tokyo, Jepang'),
(4, 'NCAA Men\'s Division I Basketball Tournament', 'Amerika Serikat'),
(5, 'Piala AFC U-23 ', 'Thailand');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`cabang_id`);

--
-- Indeks untuk tabel `hasil_lomba`
--
ALTER TABLE `hasil_lomba`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `hasil_lomba_ibfk_1` (`member_id`),
  ADD KEY `hasil_lomba_ibfk_2` (`turnamen_id`),
  ADD KEY `hasil_lomba_ibfk_3` (`mendali_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cabang` (`cabang_id`);

--
-- Indeks untuk tabel `mendali`
--
ALTER TABLE `mendali`
  ADD PRIMARY KEY (`mendali_id`);

--
-- Indeks untuk tabel `turnamen`
--
ALTER TABLE `turnamen`
  ADD PRIMARY KEY (`turnamen_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `cabang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `hasil_lomba`
--
ALTER TABLE `hasil_lomba`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mendali`
--
ALTER TABLE `mendali`
  MODIFY `mendali_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `turnamen`
--
ALTER TABLE `turnamen`
  MODIFY `turnamen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_lomba`
--
ALTER TABLE `hasil_lomba`
  ADD CONSTRAINT `hasil_lomba_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_lomba_ibfk_2` FOREIGN KEY (`turnamen_id`) REFERENCES `turnamen` (`turnamen_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_lomba_ibfk_3` FOREIGN KEY (`mendali_id`) REFERENCES `mendali` (`mendali_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_cabang` FOREIGN KEY (`cabang_id`) REFERENCES `cabang` (`cabang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
