-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 01.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `foto`) VALUES
(22, 'admin', '6dde7deb200847809f1b72b6fad7e8b2', 'fuck.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `jenis` text NOT NULL,
  `pengarang` text NOT NULL,
  `penerbit` text NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `jenis`, `pengarang`, `penerbit`, `isbn`, `jumlah`) VALUES
(37, 'Sebuah Seni untuk Bersikap Bodo Amat', 'Non Fiksi', 'Mark Manson', 'Gramedia Widiasarana Indonesia', '9786024526986', 1),
(38, 'Koala Kumal', 'Fiksi', 'Raditya Dika', 'Gagas Media', '9782121871298', 1),
(39, 'Satwa Terancam Bahaya', 'Non Fiksi', 'Jen Green', 'Pakar Raya', '4536789802615', 1),
(40, 'Rapijali', 'Fiksi', 'Dee Lestari', 'Bentang Pustaka', '9786022917724', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_pinjam`
--

CREATE TABLE `buku_pinjam` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `npm` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `judul` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_pinjam`
--

INSERT INTO `buku_pinjam` (`id`, `tanggal`, `npm`, `nama`, `judul`, `jumlah`) VALUES
(72, '2023-03-20', '202110715098', 'Arin Novita Dewi', 'Koala Kumal', 1),
(78, '2023-04-03', '202110715045', 'Gilang M.R. Iwa Kusumah', 'Sebuah Seni untuk Bersikap Bodo Amat', 1),
(79, '2023-04-02', '202110715089', 'Nanda Eka', 'Satwa Terancam Bahaya', 1),
(81, '2023-04-02', '202110715076', 'Aditya Dwi Cahyo', 'Rapijali', 1),
(82, '0000-00-00', '202110715045', 'Gilang M.R. Iwa Kusumah', 'Sebuah Seni untuk Bersikap Bodo Amat', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `semester` text NOT NULL,
  `jurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama`, `jenis`, `semester`, `jurusan`) VALUES
(1, '202110715045', 'Gilang M.R. Iwa Kusumah', 'Laki-Laki', '4', 'Informatika'),
(2, '202110715098', 'Arin Novita Dewi', 'Perempuan', '4', 'Informatika'),
(3, '202110715089', 'Nanda Eka', 'Perempuan', '4', 'Informatika'),
(33, '202110715076', 'Aditya Dwi Cahyo', 'Laki-Laki', '4', 'Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku_pinjam`
--
ALTER TABLE `buku_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `buku_pinjam`
--
ALTER TABLE `buku_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
