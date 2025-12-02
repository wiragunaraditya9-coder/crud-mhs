<?php
require_once __DIR__ . '/class/Database.php';
require_once __DIR__ . '/class/Utility.php';

$db = new Database();
$pdo = $db->pdo;

$id = $_GET['id'] ?? null;
if (!$id) {
    Utility::setFlash("ID tidak ditemukan!", "error");
    Utility::redirect("mhs.php");
}

// hapus data
$stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);

// 🔔 Tambahkan flash message di sini
Utility::setFlash("Data buku berhasil dihapus!", "success");
Utility::redirect("mhs.php");
