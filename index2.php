<?php
// memanggil file koneksi dan file proses
require 'koneksi.php';
include 'proses_siswa.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media print {
        .col, .m-0, .opsi, .kkk, .card-footer, .sss {
            display : none;
        }   
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- link style menggunakan bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-danger">
    
    <!-- mengatur ukuran halaman website -->
    <div class="container-sm">
        <br>
        <h1 class="text-center">
            Daftar Mahasiswa
        </h1>
        <h1>
        <!-- membuat tombol untuk mengarahkan ke halaman input data siswa -->
        <div class="col text-warning">
            <a class="btn btn-warning" href="tambah_siswa.php">Tambah Data Mahasiswa</a> <a class="btn btn-warning" href="logout.php">Logout</a>
        </div>
    </h1>
    <h1>

         <!-- membuat tombol untuk mengarahkan ke halaman logout -->
         <div class="col text-warning">
                    
         </div>
    </h1>
    <h1>
         <!-- membuat tombol untuk mengarahkan ke halaman print -->  
         <div class="col text-warning">
                    <a class="btn btn-warning" href="print.php">Print</a>
          </div>   
    </h1>

        <!-- membuat tampilan card -->
        <div class="card">
            <!-- card header: -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-danger">Data Mahasiswa</h4>
            </div>
            <!-- card body -->
            <div class="card-body">
                <!-- membuat alert untuk menampilkan pesan (berhasil atau gagal)-->
                <?php
                    if (isset($_GET['hapus'])) {
                                            
                        if ($_GET['hapus']=='berhasil'){
                            echo"<div class='alert alert-info'><strong>Berhasil!</strong> Berhasil Menghapus Data Mahasiswa!</div>";
                        }else if ($_GET['hapus']=='gagal'){
                            echo"<div class='alert alert-info'><strong>Gagal!</strong> Gagal Menghapus Data Mahasiswa!</div>";
                        }    
                    }  
                    if (isset($_GET['update'])) {
                                            
                        if ($_GET['update']=='berhasil'){
                            echo"<div class='alert alert-info'><strong>Berhasil!</strong> Berhasil Mengubah Data Mahasiswa!</div>";
                        }else if ($_GET['update']=='gagal'){
                            echo"<div class='alert alert-info'><strong>Gagal!</strong> Gagal Mengubah Data Mahasiswa!</div>";
                        }    
                    }  
                ?>
                
                <!-- membuat tabel untuk menampilkan data dari database -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- membuat tabel header unuk nama kolom -->
                            <th scope="col">No</th>
                            
                            <th scope="col">Nama</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Foto</th>
                            <th scope="col" class="opsi">Opsi</th>
                        </tr>
                    </thead>
                    <!-- tbody untuk menampilkan data dari database -->
                    <tbody>
                        <?php 
                        // membuat query untuk menampilkan data
                        $query = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
                        // membuat variabel $no untuk membuat nomor urut data
                        $no = 1;
                        // membuat variabel $count untuk menghitung jumlah data
                        $count = mysqli_num_rows($query);
                        // perulangan while, digunakan untuk menampilkan data dengan mysqli_fetch_assoc
                        while ($data = mysqli_fetch_assoc($query)) 
                        {
                            // menyimpan data dalam bentuk variabel agar mudah saat pemanggilan
                            $nim = $data['nim'];
                            $nama = $data['nama'];
                            $email = $data['email'];
                            $jurusan = $data['jurusan'];
                            $fakultas = $data['fakultas'];
                            $foto = $data['foto'];
                            
                        ?>
                        <tr>
                            <!-- menampilkan data pada tabel dengan memanggil variabel -->
                            <td><?= $no++ ?></td>                            
                            
                            <td><?= $nama ?></td>
                            <td><?= $email ?></td>
                            <td><?= $jurusan ?></td>
                            <td><?= $fakultas ?></td>
                            <td>
                            <?php 
							if ($data['foto'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:80px;height:100px;">
							<?php }else{ ?>
								<img src="foto/<?php echo $data['foto']; ?>" style="width:80px;height:100px;">
							<?php } ?>
                            </td>
                            <td class="kkk"> 
                                <!-- Membuat form untuk mengirim nis, yang digunakan untuk proses update dan delete -->
                                <form method="Post">
                                    <input type="hidden" name="nim" value="<?= $nim ?>">
                                    <a class="btn btn-primary" href="update_siswa.php?nim=<?= $nim ?>">Ubah</a>
                                    <button name="delete-siswa" class="btn btn-info">Hapus</button>
                                </form>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h6 class="sss">Jumlah Data Siswa : <?php echo $count; ?></h6>
      

</body>

</html>