<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Galeri Foto</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="pengguna/gambar/logomuse.png" rel="icon">
  <link href="pengguna/gambar/logomuse.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna - v4.8.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><span>SMK MUSE</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

     
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          
          <h4 align="center"> Registrasi User</h4>
          <div class="col-lg-12" align="center">
		  <!-- ======= Proses Registrasi ======= -->
           <?php
            include "pengguna/koneksi.php";;
			session_start(); 
			if (isset($_SESSION['username'])) {
				header("Location: login.php");
				exit();
			}
			 
			if (isset($_POST['login'])) {
				$userid = $_POST['userid'];
				$username = $_POST['username'];
				$password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
				$cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256
				$email = $_POST['email'];
				$namalengkap = $_POST['namalengkap'];
				$alamat = $_POST['alamat'];
				
				if ($password == $cpassword) {
					$sql = "SELECT * FROM user WHERE email='$email'";
					$result = mysqli_query($mysqli, $sql);
					if (!$result->num_rows > 0) {
						$sql = "INSERT INTO user (userid, username, password, email, namalengkap, alamat)
								VALUES ('$userid', '$username', '$password', '$email', '$namalengkap', '$alamat')";
						$result = mysqli_query($mysqli, $sql);
						if ($result) {
							echo "<script>window.alert('Selamat, registrasi berhasil!');window.location=('login.php')</script>";
							$username = "";
							$email = "";
							$namalengkap = "";
							$_POST['password'] = "";
							$_POST['cpassword'] = "";
						} else {
							echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
						}
					} else {
						echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
					}
				} else {
					echo "<script>alert('Password Tidak Sesuai')</script>";
				}
			}
		

              $query = mysqli_query($mysqli,"select max(userid) as maxID from user");
              $data = mysqli_fetch_array($query);
              $idMax = $data['maxID'];
              $noUrut = (int) substr($idMax,3,8);
              $noUrut++;
              $kodebaru ="USR".sprintf("%08s",$noUrut);
             ?>

             <form action="" method="post">
                
              <input type="text" class="form-control" name="userid" value="<?php echo $kodebaru;?>" hidden>

               <div class="col-lg-5">
               <input type="text" class="form-control" placeholder="Username" name="username" required>
               </div> <br>

               <div class="col-lg-5">
               <input type="password" name="password" class="form-control" placeholder="Password" required>
               </div><br>
			   
			   <div class="col-lg-5">
               <input type="password" name="cpassword" class="form-control" placeholder="Konfirmasi Password" required>
               </div><br>
               
               <div class="col-lg-5">
               <input type="email" name="email" class="form-control" placeholder="Email" required>
               </div><br>

               <div class="col-lg-5">
               <input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" required>
               </div><br>

               <div class="col-lg-5">
               <textarea name="alamat" class="form-control" rows="4" cols="50" placeholder="Alamat" required></textarea>
               </div><br>

               <div class="col-lg-5">
               <input type="submit" name="login" class="btn btn-primary btn-sm" value="Masuk" />
               <input type="reset" name="reset" class="btn btn-danger btn-sm" value="Batal" />
              &nbsp;&nbsp; <i>Anda sudah punya Akun? Klik</i><a href="login.php"><b><i> Login</b></i>
               </div>

            </form>
          </div>
        </div>
      </div>

    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->

  <?php include "menu/footer.php"; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>