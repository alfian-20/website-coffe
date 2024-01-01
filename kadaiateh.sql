-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2023 pada 12.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadaiateh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datacostumer`
--

CREATE TABLE `datacostumer` (
  `id` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(2000) NOT NULL,
  `namabarang` varchar(2000) NOT NULL,
  `harga` varchar(500) NOT NULL,
  `buktipembayaran` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datacostumer`
--

INSERT INTO `datacostumer` (`id`, `nama`, `hp`, `email`, `alamat`, `namabarang`, `harga`, `buktipembayaran`, `status`) VALUES
(23, 'Rezi', '082185430167', 'Subarang', 'rezi', 'Thai tea', '15000', 'Melalui Whatsapp', 'Selesai'),
(24, 'Rezi', '082185430167', 'Subarang', 'rezi', 'Espresso', '20000', 'Melalui Whatsapp', 'Menunggu'),
(25, 'Rezi', '082185430167', 'Subarang', 'rezi', 'Green Tea', '17000', 'Melalui Whatsapp', 'Menunggu'),
(26, 'Rezi', '082185430167', 'Subarang', 'rezi', 'Milk Tea', '12000', 'Melalui Whatsapp', 'Menunggu'),
(27, 'Alfian', '081278654426', 'palak aneh', 'alfian', 'Milk Cofee', '15000', 'Melalui Whatsapp', 'Menunggu'),
(28, 'Alfian', '081278654426', 'palak aneh', 'alfian', 'Latte', '15000', 'Melalui Whatsapp', 'Menunggu'),
(29, 'Alfian', '081278654426', 'palak aneh', 'alfian', 'Mocha', '22000', 'Melalui Whatsapp', 'Menunggu'),
(30, 'Burhan', '082567254432', 'kurai taji', 'burhan', 'Americano', '25000', 'Melalui Whatsapp', 'Menunggu'),
(31, 'Burhan', '082567254432', 'kurai taji', 'burhan', 'Espresso', '20000', 'Melalui Whatsapp', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datauser`
--

CREATE TABLE `datauser` (
  `id` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `alamat` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datauser`
--

INSERT INTO `datauser` (`id`, `nama`, `hp`, `email`, `username`, `password`, `alamat`) VALUES
(4, 'admin', '082185430167', 'reziadmin@gmail.com', 'admin', 'admin', ''),
(5, 'Rezi', '082185430167', 'rezipernad12@gmail.com', 'rezi', 'rezi123', 'Subarang'),
(6, 'Alfian', '081278654426', 'alfiancokes@gmail,com', 'alfian', 'alfiian123', 'palak aneh'),
(7, 'Burhan', '082567254432', 'burhan@gmail.com', 'burhan', 'burhan123', 'kurai taji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(25) NOT NULL,
  `kodeproduk` varchar(500) NOT NULL,
  `namaproduk` varchar(500) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `jenis` varchar(5000) NOT NULL,
  `harga` int(255) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kodeproduk`, `namaproduk`, `deskripsi`, `jenis`, `harga`, `images`) VALUES
(18, 'R001', 'Espresso', 'Nescaffe Espresso 29ml', 'coffe', 20000, 'WhatsApp Image 2023-12-31 at 12.11.51_fc3dd9e3.jpg'),
(19, 'R002', 'Milk Cofee', 'Macchiato - 35 ml steamed milk', 'coffe', 15000, 'WhatsApp Image 2023-12-31 at 17.26.45_8656e6c7.jpg'),
(20, 'R003', 'Latte', 'Latte Coffe 250ml', 'coffe', 15000, 'latte.jpg'),
(21, 'R004', 'Mocha', 'Mocha - Espresso Milk Choco', 'coffe', 22000, 'mocha.jpg'),
(22, 'R005', 'Americano', 'Americano coffe Espresso 50ml', 'coffe', 25000, 'amerikano.jpg'),
(23, 'R011', 'Milk Tea', 'Milk Tea Original 250ml', 'tea', 12000, 'teh susu.jpg'),
(24, 'R012', 'Thai tea', 'Thailand Original Tea 250ml', 'tea', 15000, 'thai tea.jpg'),
(25, 'R013', 'Green Tea', 'Green Tea Original 250ml', 'tea', 17000, 'green tea.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `useraccount`
--

INSERT INTO `useraccount` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin'),
(5, 'rezi', 'rezi123'),
(6, 'alfian', 'alfiian123'),
(7, 'burhan', 'burhan123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datacostumer`
--
ALTER TABLE `datacostumer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datacostumer`
--
ALTER TABLE `datacostumer`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `datauser`
--
ALTER TABLE `datauser`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
