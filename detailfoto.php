<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after the redirect
}
?>
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

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Halaman Awal</a></li>
		  <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#"><b><?php echo $_SESSION['namalengkap']; ?></b></a></li>
              <li><a href="logout.php">Keluar</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
      <div class="container">
		<?php
					include "pengguna/koneksi.php";
					include "pengguna/menu/kalender.php";
					$fotoid = $_GET['id'];
					$query = mysqli_query($mysqli,"SELECT * from ((foto 
					INNER JOIN album ON foto.albumid = album.albumid) 
					INNER JOIN user ON foto.userid= user.userid) WHERE 
					foto.fotoid ='$fotoid'");
					$data = mysqli_fetch_array($query)
					
					
		?>
			  
        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <center><img src="pengguna/gambar/<?php echo $data['lokasifile']; ?> " style="width: 350px; height:350px"></center>
				 <!-- <img src="" 
				 style="width: 200px;">-->
                </div>

              </div>
			  
			  <?php 
				$like=mysqli_query($mysqli,"SELECT COUNT(*) as likefoto FROM ((suka 
				INNER JOIN user ON suka.userid=user.userid) 
				INNER JOIN foto ON suka.fotoid=foto.fotoid)
				WHERE foto.fotoid ='$fotoid' ORDER by suka.likeid"); //output
				$jmllike=mysqli_fetch_array($like);	
				$jmllikefoto=$jmllike['likefoto'];
			   ?>
			   
			  <?php 
				$komen=mysqli_query($mysqli,"SELECT COUNT(*) as komenfoto FROM ((komentar 
				INNER JOIN user ON komentar.userid=user.userid) 
				INNER JOIN foto ON komentar.fotoid=foto.fotoid)
				WHERE foto.fotoid ='$fotoid' ORDER by komentar.komentarid"); //output
				$jmlkomen=mysqli_fetch_array($komen);	
				$jmlkomenfoto=$jmlkomen['komenfoto'];
			   ?>
		
			  <p>
			  <a href="pengguna/like.php" <button type="button" class="btn btn-danger position-relative btn-sm"><i class="bx bx-heart"></i>
			  Like 
			  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
				<?php echo $jmllikefoto; ?>
			  </span>
			 </button> </a>  
			 &nbsp;&nbsp;&nbsp;&nbsp;
			 <a href="pengguna/komentar.php"<button type="button" class="btn btn-primary position-relative btn-sm"><i class="bx bx-chat"></i>
			  Komentar
			  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
				<?php echo $jmlkomenfoto; ?>
			  </span>
			 </button> </a>
			 </p>

			  <b> <?php echo "$data[namalengkap]";?> <i></b>  <?php echo "$data[judulfoto]";?></i>
			  <br>
			  <p> <?php echo "$data[deskripsifoto]";?> </p>
			  <p> Diposting: <?php echo ''.TanggalIndo($data['tanggalunggah']).''; ?> </p>
              <div class="swiper-pagination"></div>
            </div>
			
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Komentar Foto</h3>
			  <?php
			  $query1 = mysqli_query($mysqli,"SELECT * FROM ((komentar 
					INNER JOIN user ON komentar.userid=user.userid) 
					INNER JOIN foto ON komentar.fotoid=foto.fotoid)WHERE 
					foto.fotoid ='$fotoid'
					ORDER by komentar.komentarid Desc LIMIT 3 ");
					$no = 1;
					while ($data1= mysqli_fetch_array($query1)){

			  ?>
					
				 <p> <?php echo "$no). $data1[isikomentar]";?> <i><b>(<?php echo "$data1[namalengkap]";?>,
					 <?php echo ''.TanggalIndo($data1['tanggalkomentar']).''; ?>)</b></i> <br>
				 </p>
				 <?php $no++; } ?> 
            </div>
            <div class="portfolio-description">
 
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Portfolio Section -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

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
  <!-- DataTables -->
<script src="pengguna/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="pengguna/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>

</html>
