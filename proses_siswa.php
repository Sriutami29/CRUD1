<?php
//proses update data siswa
if(isset($_POST['update-siswa'])){
    
    $nim   = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $fakultas = $_POST['fakultas'];
    $foto = $_POST['foto'];
    

 

    $update = mysqli_query($koneksi, "Update mahasiswa set  nama='$nama', email='$email', jurusan='$jurusan', fakultas='$fakultas',foto='$foto'  where nim=$nim");

    if($update){
        echo 'Berhasil';
        header("location:index2.php?update=berhasil");
    } else {
        echo 'Gagal';
        header("location:index2.php?update=gagal");
    };
  

}

//proses insert data siswa
if(isset($_POST['add-siswa'])){
        
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];
        $fakultas = $_POST['fakultas'];
        $foto = $_POST['foto'];
  
        $input = mysqli_query($koneksi,"insert into mahasiswa
                                        values ('$nim','$nama','$email','$jurusan','$fakultas','$foto')");
    
        if($input){
            echo 'Berhasil';
            header("location:tambah_siswa.php?add=berhasil");
        } else {
            echo 'Gagal';
            header("location:tambah_siswa.php?add=gagal");
        };
      
   
}

//proses hapus data siswa
if(isset($_POST['delete-siswa'])){
    $nim = $_POST['nim'];

    $hapus = mysqli_query($koneksi,"delete from mahasiswa where nim='$nim'");

    if($hapus){
        echo 'Berhasil';
        header("location:index2.php?hapus=berhasil");
    } else {
        echo 'Gagal';
        header("location:index2.php?hapus=gagal");
    };
  
}
        