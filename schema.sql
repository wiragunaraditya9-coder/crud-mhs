
CREATE DATABASE IF NOT EXISTS crud_mhs;
USE crud_mhs;

CREATE TABLE mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  NIM INT NOT NULL,
  prodi VARCHAR (50) NOT NULL,
  angkatan INT NOT NULL,
  foto VARCHAR(255) NOT NULL,
  status ENUM('available','unavailable') DEFAULT 'available'
);
