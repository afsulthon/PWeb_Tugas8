CREATE DATABASE IF NOT EXISTS `crud_upload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crud_upload`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `siswa` (`id`, `nis`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`, `foto`) VALUES
(1, '5025211052', 'Duevano Fairuz Pandya', 'Laki-laki', '081336197912', 'Perumahan GSI, Kedurus', 'duevano.jpg'),
(2, '5025211150', 'Jawahirul Wildan', 'Laki-laki', '085852601479', 'Gebang Putih, Sukolilo', 'jawahirul.jpg'),
(3, '5025211058', 'Nadya Zuhria Amana', 'Perempuan', '089604362868', 'Gebang Putih, Sukolilo', 'nadya.jpg'),
(4, '5025211168', 'Ken Anargya Alkausar', 'Laki-laki', '082226644668', 'Perumdos Blok U', 'ken.jpg');

ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;