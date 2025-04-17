<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Welcome</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">SMK Informatika Utama</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#team">Team</a></li>
        </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1> Selamat Datang di</h1>
            <h1> SiLapor </h1>
            <p>Dengan SiLapor, setiap kegiatan sekolah dapat ter-dokumentasikan dengan baik.</p>
            <div class="d-flex">
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      <div class="d-flex justify-center py-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-get-started">Dashboard</a>
                        @else
                        <a href="{{ url('/spesifikasi-laporan') }}" class="btn-get-started">Buat Laporan!</a>
                        @endauth
                    </div>
            </div>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Upload Informasi Kegiatan</a></h4>
              <p>Bagikan berita dan dokumentasi acara sekolah.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Lihat dan Pantau Kegiatan</a></h4>
              <p>Akses informasi tentang acara yang sudah berlangsung atau yang akan datang.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Komentar & Interaksi</a></h4>
              <p>Berikan tanggapan dan apresiasi terhadap kegiatan yang diposting.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>About Us<br></span>
        <h2>About</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200" style="position: relative; top: 50px;">
            <h3 class="mb-4">SiLapor adalah sebuah sistem informasi yang dirancang untuk memudahkan sekolah dalam mengelola dan membagikan informasi kegiatan secara digital. Dengan Aplikasi ini, sekolah dapat dengan mudah mendokumentasikan serta mengakses berbagai aktivitas sekolah secara terorganisir. Dan juga dapat berinteraksi dengan berbagai aktivitas yang telah berlangsung.</h3>
        </div>        
        
        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <h3>Tujuan Aplikasi</h3>
        </div>
        
        <style>
          ul {
            list-style: none; /* Menghilangkan bullet point */
            padding-left: 0; /* Menghilangkan padding bawaan */
          }
        
          li {
            display: flex;
            align-items: center; /* Menjaga teks sejajar dengan ikon */
            gap: 8px; /* Memberikan jarak antara ikon dan teks */
          }
        </style>
        
        <ul>
          <li><i class="bi bi-check2-all"></i> <span>Menyediakan platform yang terstruktur untuk publikasi kegiatan sekolah.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Mempermudah akses informasi bagi seluruh warga sekolah.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Meningkatkan keterlibatan siswa dan guru dalam dokumentasi acara sekolah.</span></li>
          <li><i class="bi bi-check2-all"></i> <span>Membangun arsip digital kegiatan sekolah yang dapat diakses kapan saja.</span></li>
        </ul>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->


    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Supported By</span>
        <h2>Support By</h2>
        <p>Sekolah Binaan :</p>
      </div><!-- End Section Title -->

      <div class="container">

        <style>
          .member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            min-height: 340px; /* Menyamakan tinggi semua kotak */
          }
        
          .member .pic {
            width: 120px; /* Ukuran gambar seragam */
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 10px;
          }
        
          .member .pic img {
            width: 100%;
            height: auto;
            object-fit: contain;
          }
        
          .member-info {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px; /* Memberikan jarak antar elemen */
          }
        
          .member-info h4 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
          }
        
          .member-info span {
            font-size: 14px;
            color: #777;
            display: block; /* Supaya tidak sejajar dengan ikon sosial */
          }
        
          .social {
            margin-top: 10px; /* Menambahkan jarak agar tidak bertabrakan */
            display: flex;
            gap: 10px; /* Jarak antar ikon */
          }
        
          .social a {
            font-size: 18px;
            color: #555;
            transition: 0.3s;
          }
        
          .social a:hover {
            color: #007bff;
          }
        </style>
        
        <div class="row gy-5">
          
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic">
                <img src="assets/img/team/logoybm.png" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>YBM PLN</h4>
                <span>Yayasan Baitul Maal PLN</span>
                <div class="social">
                  <a href="https://twitter.com/ybmpln"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://www.facebook.com/ybmpln"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/ybmpln"><i class="bi bi-instagram"></i></a>
                  <a href="https://id.linkedin.com/company/ybmpln"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->
        
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic">
                <img src="assets/img/team/pln.png" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>PLN</h4>
                <span>Perusahaan Listrik Negara</span>
                <div class="social">
                  <a href="https://twitter.com/_pln_id"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://www.facebook.com/ptpln"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/pln_id"><i class="bi bi-instagram"></i></a>
                  <a href="https://id.linkedin.com/company/ptpln-persero"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->
        
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="pic">
                <img src="assets/img/team/icon1.png" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Icon+</h4>
                <span>PT Indonesia Comnets Plus</span>
                <div class="social">
                  <a href="https://twitter.com/PLPID"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://www.facebook.com/indonesiacomnetsplus"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/pln.iconplus"><i class="bi bi-instagram"></i></a>
                  <a href="https://id.linkedin.com/company/plniconplus"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->
        
        </div>
        

      </div>

    </section><!-- /Team Section -->

   

  </main>

  <footer id="footer" class="footer">


    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">eNno</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>