<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
?>
 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksitenant.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tb_tenant WHERE id='$id'";
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
          echo "<script>alert('Data tidak ditemukan pada database');window.location='tenant.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='tenant.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Update Data Tenant</title>
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
        <h1>Edit Tenant <?php echo $data['nama_produk']; ?></h1>
      <center>
      <form method="POST" action="proses_edittenant.php" enctype="multipart/form-data" <section class="container">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama Tenant" required/>
        </div>
        <div class="form-group">
            <label>Owner</label>
            <input type="text" name="owner" class="form-control" value="<?php echo $data['owner']; ?>" placeholder="Masukan Nama Owner" required/>
        </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="10" placeholder="Masukan Keterangan" required><?php echo $data['isi']; ?></textarea>

        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Alamat Tenant" required/>
        </div>
         <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>" placeholder="Masukan Nomor Telepon Tenant" required/>
        </div>
        <div class="form-group">
            <label>Foto</label>
             <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: black">Abaikan jika tidak merubah foto</i>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>