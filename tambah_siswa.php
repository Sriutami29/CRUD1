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
    <title>Tambah Data Mahasiswa</title>

    <!-- link style menggunakan bootstrap 5 -->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Mengatur ukuran tampilan -->
    <div class="container-sm">
        <br>
        
        <div class="text-center">
            <h1>Tambah Data Mahasiswa</h1>
            <br>
        </div>
        <div class="col text-start">
            <a class="btn btn-warning" href="index2.php">Kembali</a>
        </div>
        <!-- Membuat card -->
        <div class="card">
            <form method="POST">
                
                <div class="form-group">
                    <div class="card-body">

                        <?php
                            //Validasi untuk menampilkan alert / pesan pemberitahuan
                            if (isset($_GET['add'])) {
                        
                                if ($_GET['add']=='berhasil'){
                                    echo"<div class='alert alert-success'><strong>Berhasil!</strong> Berhasil Menambah Data Siswa!</div>";
                                }else if ($_GET['add']=='gagal'){
                                    echo"<div class='alert alert-danger'><strong>Gagal!</strong> Gagal Menambah Data Siswa!</div>";
                                }    
                            }  
                        ?> 

                        <!-- Membuat inputan untuk dikirim ke file proses_siswa.php -->
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-id-badge"></i></span>
                        <input type="text" name="nim" class="form-control" placeholder="NIM" aria-label="NIM" aria-describedby="addon-wrapping">
                        </div><br>
                        
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span><br>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="addon-wrapping">
                        </div><br>
                        
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span><br>
                        <input type="text" name="email" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="addon-wrapping">
                        </div><br>
                        
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-graduation-cap"></i></span><br>
                        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" aria-label="Jurusan" aria-describedby="addon-wrapping">
                        </div><br>

                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-graduation-cap"></i></span><br>
                        <input type="text" name="fakultas" class="form-control" placeholder="Fakultas" aria-label="Fakultas" aria-describedby="addon-wrapping">
                        </div><br>

                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-image"></i></span><br>
                        <input type="file" name="foto" class="form-control" placeholder="Foto" aria-label="Foto" aria-describedby="addon-wrapping">
                        </div><br>
                        

        

                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" type="submit" name="add-siswa">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

