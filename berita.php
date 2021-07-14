<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<?php
  include('koneksiberita.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Data Berita</title>
        <!-- Load file CSS Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Load file library jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Load file library Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Load file library JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
  </head>
  <div class="container">
    <br>
    <h4>Daftar Data Berita</h4>
  <body>
   <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Judul Berita</th>
            <th>Tanggal Posting</th>
            <th>Penulis</th>
            <th colspan='2'>Aksi</th>
            </tr>
        </thead>
      <?php
      // jalankan query untuk menampilkan semua data
      $query = "SELECT * FROM tb_berita ORDER BY id desc";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_array($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
           <td style="text-align: center;"><img src="gambar/<?php echo $row['foto']; ?>" style="width: 50px;"></td>
          <td><?php echo $row['judul_berita']; ?></td>
          <td><?php echo $row['tanggal_posting']; ?></td>
          <td><?php echo $row['penulis'];?></td>
         <td>
        <a href="edit_berita.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" role="button">Update</a>
        <a href="proses_hapusberita.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn btn-danger" role="button">Delete</a>
            </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </body>
    </div>
    </table>
    <a href="tambah_berita.php" class="btn btn-primary" role="button">Tambah Data</a>
    <a href="beranda.php" class="btn btn-primary" role="button">Ke Beranda</a>
  </body>
</html>