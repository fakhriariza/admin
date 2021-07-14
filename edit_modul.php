<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
?>
 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksimodul.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tbl_modul WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='modul.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='modul.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Update Modul</title>
     <!-- Load file CSS Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Load file library jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Load file library Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Load file library JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
      <style type="text/css">
      * {
        font-family: "Montserrat";
     }
       label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 80%;
    }
    input {
      padding: 6px;
      width: 100%;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 80%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
     
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Modul <?php echo $data['nama_produk']; ?></h1>
      <center>
      <form method="POST" action="proses_editmodul.php" enctype="multipart/form-data" <section class="container">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" placeholder="Masukan Judul Modul" required/>
        </div>
        <div class="form-group">
            <label>Tanggal Posting</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" placeholder="Masukan Tanggal" required/>
        </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="10" placeholder="Masukan Isi Modul" required><?php echo $data['isi']; ?></textarea>
        </div>
        <div class="form-group">
            <label>https://www.youtube.com/watch?v=</label>
            <input type="text" name="url_youtube" class="form-control" value="<?php echo $data['url_youtube']; ?>" placeholder="Masukan Kode Terakhir Video" required/>
        </div>
         <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" placeholder="Masukan Nama Penulis" required/>
        </div>
        <div class="form-group">
            <label>Thumbnail</label>
             <img src="gambar/<?php echo $data['thumbnail']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="thumbnail" />
          <i style="float: left;font-size: 11px;color: black">Abaikan jika tidak merubah foto</i>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>