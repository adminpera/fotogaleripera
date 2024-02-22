<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotel Hebat</title>
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

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Kamar</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Kamar </li>
          </ol>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
      <div class="container">
		<?php
		include "pengguna/koneksi.php";
		$sql = mysqli_query($mysqli,"SELECT * FROM kamar order by kdkamar ASC");
        $no = 1;
        while ($data= mysqli_fetch_array($sql)){
         ?>
        <div class="row">
          <div class="col-lg-6">
		  <img src="pengguna/gambar/<?php echo $data['gambarkamar']; ?>" style="width: 500px; height:350px">
           <!-- <img src="assets/img/about.jpg" class="img-fluid" alt="">-->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3><?php echo $data['tipekamar']; ?></h3>
            <p class="fst-italic">
              Tipe kamar <b><?php echo $data['tipekamar']; ?></b> memiliki jumlah kamar <b><?php echo $data['jumlah']; ?></b> dengan menyajikan unsur kamar yang mewah dan berkelas. 
			  Anda bisa mendapatkan fasilitas kamar dengan:
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <?php echo $data['nmfasilitas1']; ?></li>
              <li><i class="bi bi-check2-circle"></i> <?php echo $data['nmfasilitas2']; ?></li>
              <li><i class="bi bi-check2-circle"></i> <?php echo $data['nmfasilitas3']; ?></li>
              <li><i class="bi bi-check2-circle"></i> <?php echo $data['nmfasilitas4']; ?></li>
            </ul>
            <p>
             Terima Kasih sudah memilih Hotel Hebat sebagai tempat beristirahat Anda.
            </p>
			  <br>
          </div>
        </div>
		 <?php $no++; } ?>    
      </div>
	
    </section><!-- End About Section -->
	<br><br>
	<hr>

    <!-- ======= Facts Section ======= -->
    <!-- End Facts Section -->

    <!-- ======= Our Skills Section ======= -->
    <!-- End Our Skills Section -->

    <!-- ======= Tetstimonials Section ======= -->
    

      </div>
    </section><!-- End Ttstimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <!--<?php include "menu/newslatter.php"; ?>-->

     
        <!--<?php include "menu/footertop.php"; ?>-->
    </div>

   <?php include "menu/footer.php"; ?>
  </footer>
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