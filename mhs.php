<?php
require_once __DIR__ . '/class/Database.php';
require_once __DIR__ . '/class/Utility.php';

$db = new Database();
$pdo = $db->pdo;

// ambil data mahasiswa
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #eef2f7;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border: none;
    }
    .table thead {
      background: #0d6efd;
      color: white;
    }
    .table tbody tr:hover {
      background-color: #f1f5ff;
      transition: 0.2s;
    }
    .btn-sm i {
      margin-right: 4px;
    }
  </style>
</head>
<body class="container py-4">

  <?php Utility::showFlash(); ?>

  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="m-0"> Daftar Mahasiswa</h5>
      <a href="create.php" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle"></i> Tambah
      </a>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Angkatan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($mahasiswa as $mhs): ?>
          <tr>
            <td><?= $mhs['nama'] ?></td>
            <td><?= htmlspecialchars($mhs['NIM']) ?></td>
            <td><?= $mhs['prodi'] ?></td>
            <td><?= htmlspecialchars($mhs['angkatan']) ?></td>
            <td>
              <?php if ($mhs['foto']): ?>
                <img src="<?= $mhs['foto'] ?>" width="50" class="rounded-circle border">
              <?php else: ?>
                <span class="text-muted">Tidak ada</span>
              <?php endif; ?>
            </td>
            <td>
              <span class="badge bg-<?= $mhs['status']=='available'?'success':'secondary' ?>">
                <?= ucfirst($mhs['status']) ?>
              </span>
            </td>
            <td>
              <a href="edit.php?id=<?= $mhs['id'] ?>" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit
              </a>
              <a href="delete.php?id=<?= $mhs['id'] ?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Hapus data ini?')">
                <i class="bi bi-trash"></i> Delete
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

