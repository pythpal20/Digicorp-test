# Digicorp-test
Live coding test at Digicorp 
Using PHP Native
Database : tb_token
Field : 
1. id - INT - Primary Key
2. user - varchar (128) - Not null
3. tokens - text - Not null

# Query 
#Eksekusi terlebih dahulu query ini untuk database soal no 1

CREATE DATABASE `tb_token`;
USE DATABASE `tb_token`;

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user` varchar(128) NOT NULL,
  `tokens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
