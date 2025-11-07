-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2025 at 05:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundsnack`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id_artist` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `biography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id_artist`, `name`, `biography`) VALUES
(2, 'Airbag', 'creo q eso va en el auto #YAY!'),
(4, 'Miranda!', 'Miranda! es un dúo argentino de pop formado en 2001 integrado por Ale Sergi y Juliana Gattas.'),
(5, 'Bad Bunny', 'Bad Bunny nació en San Juan, Puerto Rico, el 10 de marzo de 1994. Es compositor y cantante de música urbana, sobre todo trap y reggaetón.'),
(6, 'Lady Gaga', 'Stefani Joanne Angelina Germanotta, conocida por su nombre artístico Lady Gaga, es una cantante, compositora, productora, bailarina, actriz, activista y diseñadora de moda estadounidense.'),
(16, 'Paramore', 'weeeeeee'),
(17, 'Girls Generation', 'Girls Generation; también conocido como SNSD, es un girl group surcoreano formado por el sello discográfico SM Entertainment en 2007. El grupo está compuesto por ocho miembros: Taeyeon, Sunny, Tiffany, Hyoyeon, Yuri, Sooyoung, Yoona y Seohyun.'),
(18, 'Soda Stereo', 'Soda Stereo es​ una banda de rock argentina formada en 1982 originalmente por el cantante y guitarrista Gustavo Cerati, el bajista Zeta Bosio y el baterista Charly Alberti.​');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id_song` smallint(5) UNSIGNED NOT NULL,
  `id_artist` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `duration` decimal(4,2) DEFAULT NULL,
  `genre` varchar(50) NOT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id_song`, `id_artist`, `title`, `album`, `duration`, `genre`, `video`) VALUES
(7, 2, 'Algo Personal', 'Libertad', 3.45, 'Rock', 'https://youtu.be/xl9TOQgw8pE?si=JYe_TIrgHTIYj4K6'),
(8, 2, 'La Moda del Montón', 'Libertad', 4.01, 'Rock', 'https://youtu.be/V-Q8McPur38?si=4YNu9YkGyAsUz4eo'),
(9, 2, 'Mi Sensación', 'Una Hora a Tokyo', 3.57, 'Rock', 'https://youtu.be/35JNhNQEjt8?si=cBH_tNHFSh_KFSUz'),
(10, 4, 'Don', 'El Disco de tu Corazón', 3.50, 'Pop', 'https://youtu.be/eap0G9ldKc0?si=J9yg7-MplwPrQH3H'),
(11, 4, 'Perfecta', 'El Disco de tu Corazón', 3.40, 'Pop', 'https://youtu.be/a3hOeU7w59o?si=QdBfy1Ny5KKnYhkQ'),
(12, 4, 'Yo te diré', 'Sin Restricciones', 3.30, 'Pop', 'https://youtu.be/y6-H9HMb9qM?si=8Ji_yi1T-aTZZhXl'),
(13, 5, 'Dakiti', 'El Último Tour del Mundo', 3.25, 'Reggaetón', 'https://youtu.be/TmKh7lAwnBI'),
(14, 5, 'Tití Me Preguntó', 'Un Verano Sin Ti', 4.00, 'Reggaetón', 'https://youtu.be/Cr8K88UcO0s?si=3oBrHaRo62aPtF3Q'),
(15, 5, 'Amorfoda', 'Grandes Éxitos', 3.45, 'Reggaetón', 'https://youtu.be/kLpH1nSLJSs?si=vzG54BkEJfCVF5uc'),
(16, 6, 'Poker Face', 'The Fame', 3.58, 'Pop', 'https://youtu.be/bESGLojNYSo'),
(17, 6, 'Bad Romance', 'The Fame Monster', 4.54, 'Pop', 'https://youtu.be/qrO4YZeyl0I'),
(18, 6, 'Abracadabra', 'Mayhem', 3.43, 'Electropop', 'https://www.youtube.com/watch?v=vBynw9Isr28'),
(28, 16, 'This Is Why', 'This Is Why', 3.00, 'Rock alternativo, Post-punk, New wave, Dance punk,', 'https://youtu.be/xIYJ7VaSxYY'),
(29, 17, 'Lion Heart', 'Lion Heart', 3.99, 'Pop', 'https://youtu.be/nVCubhQ454c'),
(30, 17, 'Mister Mister', 'Mister Mister', 3.44, 'Pop', 'https://youtu.be/Z8j_XEn9b_8'),
(31, 18, 'Sobredosis de TV', 'Soda Stereo', 4.11, 'New wave, post-punk', 'https://youtu.be/AtQSF-JVR7o');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'webadmin', '$2y$10$3NbNAqg6Sd.oXEHcTv8cB..Czx2YC2GNQ0429UYK9VmW4SmLxXNQm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id_artist`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`),
  ADD KEY `fk_songs_artist` (`id_artist`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id_artist` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_songs_artist` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id_artist`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
