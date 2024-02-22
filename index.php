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
   <?php include "menu/header.php"; ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".filter-app">Keluarga</li>
              <li data-filter=".filter-card">Hobi</li>
              <li data-filter=".filter-web">Sekolah</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
		 
		 <?php
			include "pengguna/koneksi.php";
			$sql = mysqli_query($mysqli,"SELECT * from ((foto 
					INNER JOIN album ON foto.albumid = album.albumid) 
					INNER JOIN user ON foto.userid= user.userid) where 
					album.namaalbum='Keluarga' ORDER by foto.fotoid ASC");
			
			while ($data= mysqli_fetch_array($sql)){
         ?>
          <div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
		 
            <div class="portfolio-item">
             
			  <img src="pengguna/gambar/<?php echo $data['lokasifile']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><?php echo $data['judulfoto']; ?></h3>
                <div>
                  <a href="pengguna/gambar/<?php echo $data['lokasifile']; ?>" 
				  data-gallery="portfolioGallery" class="portfolio-lightbox" 
				  title="<?php echo $data['deskripsifoto']; ?>"><i class="bx bx-search"></i></a>
				  
                  <a href="detailfoto.php?id=<?php echo $data['fotoid']?>" title="Detail Foto"><i class="bx bx-detail"></i></a>
                </div>
              </div>
            </div>
          </div>
		   <?php } ?>
		
		
		  <?php
			include "pengguna/koneksi.php";
			$sql1 = mysqli_query($mysqli,"SELECT * from ((foto 
					INNER JOIN album ON foto.albumid = album.albumid) 
					INNER JOIN user ON foto.userid= user.userid) where 
					album.namaalbum='Sekolah' ORDER by foto.fotoid ASC");
		
			while ($data1= mysqli_fetch_array($sql1)){
          ?>
          <div class="col-lg-4 col-md-6 portfolio-wrap filter-web">
            <div class="portfolio-item">
               <img src="pengguna/gambar/<?php echo $data1['lokasifile']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><?php echo $data1['judulfoto']; ?></h3>
                <div>
                  <a href="pengguna/gambar/<?php echo $data1['lokasifile']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $data1['deskripsifoto']; ?>"><i class="bx bx-search"></i></a>
                  <a href="detailfoto.php?id=<?php echo $data1['fotoid']?>" title="Detail Foto"><i class="bx bx-detail"></i></a> 
                </div>
              </div>
            </div>
          </div>
		 <?php } ?>
		 
		   <?php
			include "pengguna/koneksi.php";
			$sql2 = mysqli_query($mysqli,"SELECT * from ((foto 
					INNER JOIN album ON foto.albumid = album.albumid) 
					INNER JOIN user ON foto.userid= user.userid) where 
					album.namaalbum='Hobi' ORDER by foto.fotoid ASC");
			while ($data2= mysqli_fetch_array($sql2)){
          ?>
		  
          <div class="col-lg-4 col-md-6 portfolio-wrap filter-card">
            <div class="portfolio-item">
             <img src="pengguna/gambar/<?php echo $data2['lokasifile']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><?php echo $data2['judulfoto']; ?></h3>
                <div>
                  <a href="pengguna/gambar/<?php echo $data2['lokasifile']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $data2['deskripsifoto']; ?>"><i class="bx bx-search"></i></a>
                  <a href="detailfoto.php?id=<?php echo $data2['fotoid']?>" title="Detail Foto"><i class="bx bx-detail"></i></a>
                </div>
              </div>
            </div>
          </div>
		<?php  } ?>
		
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
<br>
<br>
<br>
<br>
<br>
<br>
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
