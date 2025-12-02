<?php
require_once __DIR__ . '/class/Database.php';
require_once __DIR__ . '/class/Utility.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = new Database();
    $pdo = $db->pdo;

    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $NIM      = $_POST['NIM'];
    $prodi    = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $status   = $_POST['status'];

    // Ambil data lama (agar tahu foto lama)
    $stmt = $pdo->prepare("SELECT foto FROM mahasiswa WHERE id=?");
    $stmt->execute([$id]);
    $oldData = $stmt->fetch(PDO::FETCH_ASSOC);

    $foto = $oldData['foto']; // default: tidak ganti foto

    // Jika user upload foto baru
    if (!empty($_FILES['foto']['name'])) {

        // Validasi tipe foto
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($_FILES['foto']['type'], $allowedTypes)) {
            Utility::setFlash("Format file tidak valid!", "error");
            Utility::redirect("edit.php?id=$id");
        }

        // Validasi ukuran
        if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            Utility::setFlash("Ukuran file terlalu besar!", "error");
            Utility::redirect("edit.php?id=$id");
        }

        // Proses upload
        $fileName = time() . "_" . basename($_FILES['foto']['name']);
        $target   = "uploads/" . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
            // Hapus foto lama jika ada
            if (!empty($oldData['foto']) && file_exists($oldData['foto'])) {
                unlink($oldData['foto']);
            }

            $foto = $target; // simpan foto baru
        }
    }

    // Update database
    $stmt = $pdo->prepare("
        UPDATE mahasiswa 
        SET nama=?, NIM=?, prodi=?, angkatan=?, foto=?, status=? 
        WHERE id=?
    ");

    $stmt->execute([$nama, $NIM, $prodi, $angkatan, $foto, $status, $id]);

    Utility::setFlash("Data mahasiswa berhasil diperbarui!", "success");
    Utility::redirect("mhs.php");

} else {
    Utility::redirect("mhs.php");
}
