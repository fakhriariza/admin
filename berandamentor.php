<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Mentor</title>
	  <!-- Load file CSS Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Load file library jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Load file library Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Load file library JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="style_beranda.css">
</head>
<body>
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
    <h1>Halaman Mentor</h1>
    <p>Halo <b><?php echo $_SESSION['email']; ?></p>
    <a href="modul.php" class="btn btn-primary" role="button">Edit Modul</a>
    </body>
    
  <a href="logout.php" class="btn btn-primary" role="button">Logout</a>
    </body>
</html>
<?php
  ob_end_flush();
?>
 