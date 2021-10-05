-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 08.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nm_admin` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Admin', 'jwd', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `jeniskelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(40) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('C001', 'Byun Baekhyun', 'Pria', 'Bogor', 'Tidak Meminjam', '-'),
('d001', 'Do Kyungsoo', 'Pria', 'Malang', 'Tidak Meminjam', 'd001.jpg'),
('hd11', 'Kim Junmyeon', 'Pria', 'Jakarta', 'Tidak Meminjam', '-'),
('hiii', 'Kim Jongin', 'Pria', 'Korea', 'Tidak Meminjam', 'hiii.jpg'),
('J001', 'Oh Sehun', 'Pria', 'Bandung', 'Tidak Meminjam', '-'),
('neli', 'Neli Alvionita', 'Wanita', 'Mojokerto', 'Tidak Meminjam', 'neli.jpg'),
('pcy', 'Park Chanyeol', 'Pria', 'Surabaya', 'Tidak Meminjam', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judul`, `penulis`, `penerbit`, `tahun`) VALUES
('b002', 'Yasa', 'Ega Dyp', 'Belia Bentang', 2020),
('b022', 'Game Over Club \"Fallin In Love\"', 'sirhayani', 'Pastel Books', 2020),
('b033', 'Game Over Club \'Bull\'s Eye\'', 'sirhayani', 'Pastel Books', 2020),
('melo', 'Melodylan 2', 'asriaci', 'coconut books', 2020),
('nnnn', 'Match Point', 'Saufina', 'PT Gramedia Pustaka Utama', 2018),
('pnc', 'Pancarona', 'Erisca Febriani', 'coconut books', 2020),
('ss', 'Seperti Hujan Yang Jatuh Ke Bumi', 'Boy Candra', 'Media Kita', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkembali`
--

CREATE TABLE `tbkembali` (
  `idkembali` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tanggalkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbkembali`
--

INSERT INTO `tbkembali` (`idkembali`, `idanggota`, `idbuku`, `tanggalkembali`) VALUES
('k001', 'hiii', 'b022', '2021-08-07'),
('k002', 'hd11', 'b022', '2021-09-03'),
('k003', 'pcy', 'melo', '2021-09-11'),
('k004', 'C001', 'b002', '2021-09-11'),
('k005', 'pcy', 'b002', '2021-08-22'),
('k008', 'hiii', 'b002', '2021-09-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpinjam`
--

CREATE TABLE `tbpinjam` (
  `idpinjam` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `idanggota` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpinjam`
--

INSERT INTO `tbpinjam` (`idpinjam`, `idbuku`, `tanggalpinjam`, `idanggota`) VALUES
('p001', 'ss', '2021-08-14', 'neli'),
('p008', 'nnnn', '2021-08-06', 'neli'),
('p011', 'melo', '2021-08-05', 'd001'),
('p017', 'nnnn', '2021-09-24', 'hiii'),
('po15', 'b002', '2021-08-13', 'C001'),
('po16', 'b002', '2021-09-30', 'C001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indeks untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indeks untuk tabel `tbkembali`
--
ALTER TABLE `tbkembali`
  ADD KEY `idanggota` (`idanggota`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indeks untuk tabel `tbpinjam`
--
ALTER TABLE `tbpinjam`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `idanggota` (`idanggota`),
  ADD KEY `idbuku` (`idbuku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbkembali`
--
ALTER TABLE `tbkembali`
  ADD CONSTRAINT `tbkembali_ibfk_1` FOREIGN KEY (`idanggota`) REFERENCES `tbanggota` (`idanggota`),
  ADD CONSTRAINT `tbkembali_ibfk_2` FOREIGN KEY (`idbuku`) REFERENCES `tbbuku` (`idbuku`);

--
-- Ketidakleluasaan untuk tabel `tbpinjam`
--
ALTER TABLE `tbpinjam`
  ADD CONSTRAINT `tbpinjam_ibfk_1` FOREIGN KEY (`idanggota`) REFERENCES `tbanggota` (`idanggota`),
  ADD CONSTRAINT `tbpinjam_ibfk_2` FOREIGN KEY (`idbuku`) REFERENCES `tbbuku` (`idbuku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
