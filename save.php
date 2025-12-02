<?php
require_once __DIR__ . '/class/Database.php';
require_once __DIR__ . '/class/Utility.php';

$db = new Database();
$pdo = $db->pdo;

$nama    = $_POST['nama'];
$NIM   = $_POST['NIM'];
$prodi     = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$status   = $_POST['status'];

$foto = null;
if (!empty($_FILES['foto']['name'])) {
    $fileType = $_FILES['foto']['type'];
    $fileSize = $_FILES['foto']['size'];

    // validasi tipe file
    $allowedTypes = ['image/jpeg', 'image/png'];
    if (!in_array($fileType, $allowedTypes)) {
        Utility::setFlash("Format file tidak valid! Hanya JPG/PNG yang diperbolehkan.", "error");
        Utility::redirect("create.php");
    }

    // validasi ukuran file (maks 2 MB)
    $maxSize = 2 * 1024 * 1024; // 2 MB
    if ($fileSize > $maxSize) {
        Utility::setFlash("Ukuran file terlalu besar! Maksimal 2 MB.", "error");
        Utility::redirect("create.php");
    }

    // simpan file
    $fileName = time() . "_" . basename($_FILES['foto']['name']);
    $target   = "uploads/" . $fileName;
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        $foto = $target;
    }
}

$stmt = $pdo->prepare("INSERT INTO mahasiswa (nama, NIM, prodi, angkatan, foto, status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$nama, $NIM, $prodi, $angkatan, $foto, $status]);

Utility::setFlash("Data buku berhasil ditambahkan!", "success");
Utility::redirect("mhs.php");
