<?php
require_once __DIR__ . '/class/Utility.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #eef2f7;
      font-family: 'Segoe UI', sans-serif;
    }
    .card-custom {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: none;
    }
    .card-header {
      background: #0d6efd;
      color: white;
      font-weight: bold;
      border-radius: 12px 12px 0 0;
    }
    .btn i {
      margin-right: 6px;
    }
  </style>
</head>

<body class="container py-4">

  <h3 class="mb-4 fw-bold"> + Tambah Mahasiswa</h3>
  <?php Utility::showFlash(); ?>

  <div class="card card-custom">
    <div class="card-header">
      <h5 class="m-0"> Tambah Mahasiswa</h5>
    </div>
    <div class="card-body">
      <form action="save.php" method="post" enctype="multipart/form-data" class="row g-3">

        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">NIM</label>
          <input type="number" name="NIM" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Prodi</label>
          <input type="text" name="prodi" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Angkatan</label>
          <input type="number" name="angkatan" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Status</label>
          <select name="status" class="form-select" required>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Foto</label>
          <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png" required>
        </div>

        <div class="col-12 mt-3">
          <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-save"></i> Simpan
          </button>
          <a href="mhs.php" class="btn btn-outline-secondary px-4">
            <i class="bi bi-x-circle"></i> Batal
          </a>
        </div>

      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
