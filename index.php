<?php
include('templates/header.php');
?>

<main>
  <div class="container mt-5 py-5">
    <a href="tambah.php" class="btn btn-primary mb-3">
      <i class="fas fa-plus me-2"></i>Tambah Data
    </a>
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Data Siswa</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('koneksi_db.php');
              $query = $pdo->prepare("SELECT * FROM siswa");
              $query->execute();
              $no = 1;
              while ($row = $query->fetch()) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td class="text-center">
                    <img src="uploads/<?php echo $row['foto']; ?>" width="100">
                  </td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['jenis_kelamin']; ?></td>
                  <td><?php echo $row['no_telp']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td class="text-center">
                    <a href="ubah.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i> Ubah
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                      <i class="fas fa-trash"></i> Hapus
                    </a>
                </tr>
              <?php
              }
              if ($query->rowCount() == 0) {
              ?>
                <tr>
                  <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include('templates/footer.php');
?>