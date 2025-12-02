<?php
require_once __DIR__ . '/class/Database.php';
$db = new Database();
$pdo = $db->pdo;

$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->execute([$id]);
$mhs = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f5f5;
    }
    .box {
      background: white;
      padding: 25px;
      border-radius: 8px;
      border: 1px solid #ddd;
      max-width: 800px;
      margin: auto;
    }
    h3 {
      font-weight: 600;
    }
  </style>
</head>

<body class="container py-4">

  <div class="box">
    <h3 class="mb-4">✏️ Edit Mahasiswa</h3>

    <form action="update.php" method="post" enctype="multipart/form-data" class="row g-3">

      <input type="hidden" name="id" value="<?= $mhs['id'] ?>">

      <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $mhs['nama'] ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">NIM</label>
        <input type="number" name="NIM" class="form-control" value="<?= htmlspecialchars($mhs['NIM']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Prodi</label>
        <input type="text" name="prodi" class="form-control" value="<?= $mhs['prodi'] ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Angkatan</label>
        <input type="number" name="angkatan" class="form-control" value="<?= htmlspecialchars($mhs['angkatan']) ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
          <option value="available" <?= $mhs['status']=='available'?'selected':'' ?>>Available</option>
          <option value="unavailable" <?= $mhs['status']=='unavailable'?'selected':'' ?>>Unavailable</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Foto Lama</label><br>
        <?php if ($mhs['foto']): ?>
          <img src="<?= $mhs['foto'] ?>" class="img-thumbnail" width="120">
        <?php else: ?>
          <span class="text-muted">Tidak ada foto</span>
        <?php endif; ?>
      </div>

      <div class="col-md-12">
        <label class="form-label">Ganti Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
      </div>

      <div class="col-12 mt-3">
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="mhs.php" class="btn btn-secondary">Batal</a>
      </div>

    </form>
  </div>

</body>
</html>
