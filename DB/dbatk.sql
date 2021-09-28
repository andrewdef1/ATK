-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 03:18 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbatk`
--

-- --------------------------------------------------------

--
-- Table structure for table `atk_keluar`
--

CREATE TABLE IF NOT EXISTS `atk_keluar` (
  `id_keluar` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `kode_atk` int(40) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `divisi_penerima` text,
  `satuan` text NOT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `atk_keluar`
--

INSERT INTO `atk_keluar` (`id_keluar`, `tgl`, `kode_atk`, `jumlah`, `divisi_penerima`, `satuan`) VALUES
(1, '2015-11-20', 1, 2, 'IT', 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `atk_masuk`
--

CREATE TABLE IF NOT EXISTS `atk_masuk` (
  `id_masuk` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `kode_atk` varchar(40) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`id_masuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `atk_masuk`
--

INSERT INTO `atk_masuk` (`id_masuk`, `tgl`, `kode_atk`, `jumlah`, `satuan`) VALUES
(1, '2015-11-20', '1', '10', 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `data_atk`
--

CREATE TABLE IF NOT EXISTS `data_atk` (
  `kode_atk` int(12) NOT NULL AUTO_INCREMENT,
  `nama_atk` text NOT NULL,
  `jenis_atk` text NOT NULL,
  `masuk` varchar(10) NOT NULL,
  `keluar` varchar(10) NOT NULL,
  `stok_tersedia` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_atk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_atk`
--

INSERT INTO `data_atk` (`kode_atk`, `nama_atk`, `jenis_atk`, `masuk`, `keluar`, `stok_tersedia`) VALUES
(1, 'Pensil', 'tulis', '10', '2', '8');

-- --------------------------------------------------------

--
-- Table structure for table `data_distribusi`
--

CREATE TABLE IF NOT EXISTS `data_distribusi` (
  `kode_distribusi` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `kode_nota` int(12) NOT NULL,
  `divisi_penerima` text NOT NULL,
  `kode_atk` int(12) NOT NULL,
  `nama_atk` text NOT NULL,
  `jenis_atk` text NOT NULL,
  `jumlah` int(12) NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`kode_distribusi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_distribusi`
--

INSERT INTO `data_distribusi` (`kode_distribusi`, `tgl`, `kode_nota`, `divisi_penerima`, `kode_atk`, `nama_atk`, `jenis_atk`, `jumlah`, `satuan`) VALUES
(1, '2015-11-20', 1, '[--PILIH--]', 1, 'Pensil', 'tulis', 2, 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `data_nota`
--

CREATE TABLE IF NOT EXISTS `data_nota` (
  `kode_nota` int(20) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `divisi` text NOT NULL,
  `kode_atk` int(12) NOT NULL,
  `nama_atk` text NOT NULL,
  `jumlah` int(12) NOT NULL,
  `satuan` text NOT NULL,
  PRIMARY KEY (`kode_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_nota`
--

INSERT INTO `data_nota` (`kode_nota`, `tgl`, `divisi`, `kode_atk`, `nama_atk`, `jumlah`, `satuan`) VALUES
(1, '2015-11-20', 'IT', 1, 'Pensil', 2, 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `login_hash` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`, `login_hash`) VALUES
('admin', 'c4ca4238a0b923820dcc509a6f75849b', 'administrator'),
('andrew', 'd3d9446802a44259755d38e6d163e820', 'administrator'),
('gudang', 'c4ca4238a0b923820dcc509a6f75849b', 'gudang'),
('mdf', 'cfcd208495d565ef66e7dff9f98764da', 'gudang'),
('pimpinan', 'c4ca4238a0b923820dcc509a6f75849b', 'pimpinan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
