-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jun 2020 pada 04.19
-- Versi server: 10.3.23-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildweb_sadam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL COMMENT 'Nama',
  `nis/nisn` varchar(10) DEFAULT NULL COMMENT 'NIS/NISN',
  `jk` varchar(10) DEFAULT NULL COMMENT 'Jenis Kelamin',
  `jurusan` varchar(60) DEFAULT NULL COMMENT 'Jurusan',
  `ektrakurikuler` varchar(70) DEFAULT NULL COMMENT 'Bidang Ektrakurikuler Di Pilih',
  `seni` varchar(1) DEFAULT NULL COMMENT 'Kesenian',
  `kwn` varchar(1) DEFAULT NULL COMMENT 'Kewarganegaran',
  `pj` varchar(1) DEFAULT NULL COMMENT 'Pendidikan Jasmani',
  `mtk` varchar(1) DEFAULT NULL COMMENT 'Matematika',
  `bi` varchar(1) DEFAULT NULL COMMENT 'Bahasa Indonesia',
  `bpi` varchar(15) DEFAULT NULL COMMENT 'Pengembangan IPTEK',
  `bo` varchar(15) DEFAULT NULL COMMENT 'Olahraga',
  `bksb` varchar(15) DEFAULT NULL COMMENT 'Kelompok Seni Budaya (FLS2N)',
  `bpks` varchar(15) DEFAULT NULL COMMENT 'Pembinaan Akhlak, Kedispilinan Kebangsan Dan Sosial',
  `kesesuaian` varchar(15) DEFAULT NULL COMMENT 'Kesesuaian'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_training`
--

INSERT INTO `data_training` (`id`, `nama`, `nis/nisn`, `jk`, `jurusan`, `ektrakurikuler`, `seni`, `kwn`, `pj`, `mtk`, `bi`, `bpi`, `bo`, `bksb`, `bpks`, `kesesuaian`) VALUES
(1, 'Syarifah maulia', '8328', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'D', 'C', 'A', 'A', 'Tinggi', 'Sanggat Tinggi', 'Tinggi', 'Rendah', 'Sesuai'),
(2, 'Yola yunita putri', '2039928', 'Perempuan', 'Ilmu Sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'A', 'A', 'A', 'A', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(3, 'Ayu Trisna Yustika', '8372', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'C', 'B', 'Tinggi', 'Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(4, 'vivi enggraini sabita', '0028284859', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'B', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Rendah', 'Sesuai'),
(5, 'Muhammad rizky said', '8306', 'Laki Laki', 'Ilmu Sosial', 'Bidang Olahraga', 'B', 'B', 'B', 'B', 'A', 'Tinggi', 'Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(6, 'Irna Wahyuni', '8225', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'B', 'A', 'A', 'B', 'Rendah', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(7, 'zenobia al hummairha', '0026159786', 'Perempuan', 'Ilmu Sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'C', 'B', 'C', 'C', 'B', 'Tinggi', 'Rendah', 'Rendah', 'Tinggi', 'Tidak Sesuai'),
(8, 'rosmi sari', '8310', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'B', 'B', 'B', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Sanggat Tinggi', 'Sesuai'),
(9, 'Rangga Aulia Rahman', '8295', 'Laki Laki', 'Ilmu Alam', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'B', 'A', 'B', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(10, 'Raja muhammad yasin', '8147', 'Laki Laki', 'Ilmu Sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'B', 'A', 'B', 'B', 'Sanggat Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(11, 'Sofiya Khairunnisa', '0024634795', 'Perempuan', 'Ilmu Alam', 'Bidang Olahraga', 'B', 'B', 'A', 'C', 'A', 'Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Tinggi', 'Sesuai'),
(12, 'Aditya', '0022410039', 'Laki Laki', 'Ilmu Sosial', 'Bidang Olahraga', 'B', 'A', 'A', 'B', 'B', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sesuai'),
(13, 'Desty ', '8299', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'B', 'D', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(14, 'Rahul Roy', '8291', 'Laki Laki', 'Ilmu Sosial', 'Bidang Olahraga', 'C', 'D', 'C', 'D', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Tidak Sesuai'),
(15, 'Ridho', '8201', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'A', 'A', 'A', 'B', 'B', 'Sanggat Rendah', 'Tinggi', 'Rendah', 'Sanggat Tinggi', 'Sesuai'),
(16, 'Nayla mirratil arsy', '8277', 'Perempuan', 'Ilmu Alam', 'Bidang Pengembangan IPTEK', 'B', 'B', 'B', 'A', 'A', 'Tinggi', 'Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(17, 'Arief Pratama Yudha', '8255', 'Laki Laki', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'B', 'B', 'B', 'B', 'Rendah', 'Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sesuai'),
(18, 'Nadilla Dwi Farani', '8273', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'B', 'B', 'B', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(19, 'Yeyen', '8279', 'Perempuan', 'Ilmu Sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'C', 'C', 'D', 'C', 'B', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sesuai'),
(20, 'Pretty ardiani', '8350', 'Perempuan', 'Ilmu Alam', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'A', 'B', 'B', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(21, 'Doni trinsyah', '8211', 'Laki Laki', 'Ilmu Sosial', 'Bidang Pengembangan IPTEK', 'A', 'A', 'A', 'A', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(22, 'Nuraini', '8322', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'B', 'B', 'Sanggat Tinggi', 'Rendah', 'Rendah', 'Tinggi', 'Sesuai'),
(23, 'Amylian Utami', '8399', 'Perempuan', 'Ilmu Sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'A', 'B', 'C', 'C', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(24, 'Rika', '8232', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'C', 'C', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Sanggat Tinggi', 'Tinggi', 'Sesuai'),
(25, 'Farhan ramadhinata', '8698', 'Laki Laki', 'Ilmu Sosial', 'Bidang Olahraga', 'B', 'C', 'B', 'C', 'D', 'Rendah', 'Sanggat Tinggi', 'Rendah', 'Tinggi', 'Tidak Sesuai'),
(26, 'Dicky yongki', '8321', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'A', 'B', 'B', 'C', 'B', 'Rendah', 'Sanggat Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(27, 'Ajay', '0020697626', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'B', 'B', 'B', 'B', 'B', 'Tinggi', 'Sanggat Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(28, 'Sandy', '8202', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'B', 'B', 'B', 'C', 'B', 'Tinggi', 'Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(29, 'Serghie', '8213', 'Laki Laki', 'Ilmu Sosial ', 'Bidang Olahraga', 'B', 'B', 'B', 'B', 'B', 'Tinggi', 'Sanggat Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(30, 'Mreihan tardiansyah', '0023475084', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'C', 'B', 'A', 'B', 'A', 'Tinggi', 'Sanggat Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(31, 'Tamara Aurellia Ng', '8774', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'B', 'A', 'Tinggi', 'Rendah', 'Rendah', 'Tinggi', 'Sesuai'),
(32, 'Gilang panca amanda', '8236', 'Laki Laki', 'Ilmu Sosial', 'Bidang Olahraga', 'A', 'B', 'A', 'A', 'B', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(33, 'Cindy Safira Mentari', '8187', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'A', 'B', 'B', 'Rendah', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(34, 'HIDAYAH SARI', '8266', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'C', 'C', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(35, 'AJENG KASANTRI ZAKIRA', '0023838232', 'Perempuan', 'Ilmu Sosial', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'B', 'B', 'B', 'A', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(36, 'ade anggi suwita', '8433', 'Perempuan', 'ilmu sosial', 'Bidang Olahraga', 'B', 'B', 'C', 'C', 'B', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(37, 'lina oktafiani', '8522', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'B', 'B', 'B', 'C', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(38, 'RIAN HIDAYAT', '8378', 'Laki Laki', 'ilmu sosial', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'C', 'B', 'B', 'A', 'Tinggi', 'Tinggi', 'Rendah', 'Rendah', 'Sesuai'),
(39, 'rahmat maulana', '8445', 'Laki Laki', 'ilmu sosial', 'Bidang Olahraga', 'C', 'C', 'B', 'B', 'C', 'Tinggi', 'Rendah', 'Tinggi', 'Rendah', 'Tidak Sesuai'),
(40, 'adri yeti', '8234', 'Perempuan', 'Ilmu Sosial', 'Bidang Pengembangan IPTEK', 'B', 'C', 'B', 'B', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(41, 'neli liana', '8125', 'Perempuan', 'Ilmu Alam', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'B', 'A', 'A', 'B', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai'),
(42, 'siti z nur', '8743', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'C', 'B', 'A', 'B', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(43, 'Veny novita', '8665', 'Perempuan', 'Ilmu Sosial', 'Bidang Olahraga', 'B', 'A', 'C', 'C', 'A', 'Tinggi', 'Rendah', 'Tinggi', 'Rendah', 'Sesuai'),
(44, 'Feri aditya', '8186', 'Laki Laki', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'B', 'A', 'C', 'C', 'B', 'Rendah', 'Tinggi', 'Tinggi', 'Rendah', 'Sesuai'),
(45, 'Eva nurjanah', '8084', 'Perempuan', 'Ilmu Alam', 'Bidang Kelompok Seni Budaya (FLS2N)', 'A', 'C', 'B', 'C', 'B', 'Rendah', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(46, 'Rilah subardini', '8787', 'Perempuan', 'Ilmu Sosial', 'Bidang Pengembangan IPTEK', 'A', 'A', 'A', 'A', 'B', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(47, 'paulo pasaribu', '8356', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'A', 'C', 'C', 'A', 'B', 'Tinggi', 'Sanggat Tinggi', 'Rendah', 'Tinggi', 'Sesuai'),
(48, 'risa selvia', '8424', 'Perempuan', 'Ilmu Alam', 'Bidang Pembinaan Akhlak, Kedispilinan Kebangsan dan Sosial', 'B', 'B', 'B', 'C', 'A', 'Tinggi', 'Tinggi', 'Tinggi', 'Tinggi', 'Sesuai'),
(49, 'FERDI AGUSTIAWAN', '8012', 'Laki Laki', 'Ilmu Alam', 'Bidang Pengembangan IPTEK', 'B', 'B', 'C', 'B', 'B', 'Rendah', 'Rendah', 'Rendah', 'Rendah', 'Tidak Sesuai'),
(50, 'm.maulana', '8505', 'Laki Laki', 'Ilmu Alam', 'Bidang Olahraga', 'B', 'A', 'C', 'B', 'B', 'Tinggi', 'Rendah', 'Rendah', 'Tinggi', 'Sesuai'),
(51, 'aida yuliati', '8478', 'Perempuan', 'Ilmu Sosial', 'Bidang Olahraga', 'A', 'A', 'B', 'A', 'D', 'Tinggi', 'Rendah', 'Tinggi', 'Tinggi', 'Sesuai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user` varchar(10) NOT NULL COMMENT 'Username',
  `pass` varchar(10) DEFAULT NULL COMMENT 'Password',
  `nama` varchar(25) DEFAULT NULL COMMENT 'Nama Lengkap'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user`, `pass`, `nama`) VALUES
('admin', 'admin', 'Nama Admin 2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
