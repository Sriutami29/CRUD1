<?php
// memanggil file koneksi dan file proses
include 'koneksi.php';
include 'proses_siswa.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>

    <!-- link style menggunakan bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>
        
        <div class="text-center">
            <h4>Ubah Data Mahasiswa</h4>
            <br>
        </div>
        <div class="col text-start">
            <a class="btn btn-warning" href="index2.php">Kembali</a>
        </div>
        <!-- Membuat card -->
        <div class="card">
            <form method="POST">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-11 text-start">
                            <h4>Form Update Data Mahasiswa</h4>
                        </div>
                        <div class="col-1 text-end">
                            <a class="btn-close" aria-label="Close" href="index2.php"></a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <?php
                            //mendapatkan nis dari url yang dikirim, menggunakan method GET:
                            $nim=$_GET['nim'];
                            //membuat query tampil data siswa berdasarkan nis yang dipilih
                            $query=mysqli_query($koneksi, "select * from mahasiswa where nim='$nim'");
                            while($data=mysqli_fetch_array($query)){
                                //membuat variabel untuk menampung data siswa
                               
                                $nim = $data['nim'];
                                $nama = $data['nama'];
                                $email = $data['email'];
                                $jurusan = $data['jurusan'];
                                $fakultas = $data['fakultas'];
                                $foto = $data['foto'];
                            }
                        ?>
                        <!-- menampilkan data pada inputan dengan mengatur value/ nilai yang telah disimpan dalam variabel: -->
                        <h6>NIM : </h6>
                        <input type="text" name="nim" class="form-control" value="<?= $nim ?>" readonly><br>
                        
                        <h6>Nama : </h6>
                        <input type="text" name="nama" class="form-control" value="<?= $nama ?>" required><br>
                        
                        <h6>E-mail : </h6>
                        <input type="text" name="email" class="form-control" value="<?= $email ?>" required><br>
                        
                        <h6>Jurusan : </h6>
                        <input type="text" name="jurusan" class="form-control" value="<?= $jurusan ?>" required><br>

                        <h6>Fakultas : </h6>
                        <input type="text" name="fakultas" class="form-control" value="<?= $fakultas ?>" required><br>
                        
                        <h6>Foto : </h6>
                        <input type="file" name="foto" class="form-control" value="<?= $foto ?>" required><br>
                        <br>
                        
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!-- membuat tombol update dan akan dikirim ke file proses -->
                    <button class="btn btn-primary" type="submit" name="update-siswa">Ubah</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>