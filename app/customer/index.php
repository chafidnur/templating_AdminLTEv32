<!DOCTYPE html>
<html lang="en">

<?php 
    include('../config/dbcon.php');
    include(BASE_PATH . 'user/includes/header.php');
?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Melayani Pesanan Catering</h1>
            <p>Kami melayani pesanan catering dalam & luar kota kudus, dengan harga terjangkau & kualitas memukau.</p>
            <div class="d-flex">
              <a href="<?php echo BASE_URL ?>user/login_customer.php" style="font-weight: bold;" class="btn-get-started">Pesan Sekarang</a>
              <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Tonton Video Profile</span></a> -->
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo BASE_URL ?>user/assets/img/hero-img1.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
<!--     <section id="clients" class="clients section">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="user/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="user/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section> -->
    <!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Selamat datang di <strong>e-Catering</strong>, penyedia layanan catering terkemuka yang berdedikasi untuk menghadirkan pengalaman kuliner terbaik untuk setiap acara Anda. Dengan pengalaman bertahun-tahun di industri kuliner, kami bangga menyajikan makanan lezat dan layanan profesional yang dapat diandalkan.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Pernikahan</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Ulang Tahun</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Pertemuan</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Acara Lainnya.</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p><strong>Misi Kami</strong> adalah untuk menciptakan kenangan yang tak terlupakan melalui hidangan yang lezat dan presentasi yang menawan. Kami memahami bahwa setiap acara adalah unik, oleh karena itu kami berkomitmen untuk menyediakan menu yang disesuaikan dengan kebutuhan dan preferensi Anda.</p>
            <p>Terima kasih telah mempercayakan <strong>Catering Kami</strong> sebagai mitra kuliner Anda. Kami menantikan kesempatan untuk melayani Anda dan membuat acara Anda menjadi lebih istimewa.</p>
          </div>

        </div>

      </div>

    </section>
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Layanan Kami</h2>
      </div><!-- End Section Title -->

      <div class="container" style="margin-top: 0px;">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-gift fill icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">Catering Pernikahan</a></h4>
              <p>Menyediakan berbagai macam hidangan untuk acara pernikahan. Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk memastikan setiap hidangan yang kami sajikan tidak hanya lezat tetapi juga sehat.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-cake2 fill icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">Ulang Tahun</a></h4>
              <p>Menyediakan berbagai macam hidangan untuk acara ulang tahun. Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk memastikan setiap hidangan yang kami sajikan tidak hanya lezat tetapi juga sehat.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-person-raised-hand icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">Pertemuan</a></h4>
              <p>Menyediakan berbagai macam hidangan untuk acara pertemuan. Kami hanya menggunakan bahan-bahan segar dan berkualitas tinggi untuk memastikan setiap hidangan yang kami sajikan tidak hanya lezat tetapi juga sehat.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-menu-up icon"></i></div>
              <h4><a href="service-details.php" class="stretched-link">Lainnya</a></h4>
              <p>Kami menawarkan berbagai paket catering yang dapat disesuaikan dengan kebutuhan dan anggaran Anda. Mulai dari prasmanan, set menu, hingga paket VIP, semuanya bisa Anda pilih sesuai dengan konsep Anda.</p>
            </div>
          </div>
          <!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
   <!--  <section id="call-to-action" class="call-to-action section">

      <img src="user/assets/img/cta-bg.jpg" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Call To Action</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>

    </section> -->
    <!-- /Call To Action Section -->
    <!-- Portfolio Section -->
    <section id="menu" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Menu</h2>
        <p>Kami adalah penyedia jasa catering pernikahan yang berdedikasi untuk menghadirkan pengalaman gastronomi tak terlupakan bagi Anda dan para tamu.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-app">Makanan</li>
            <li data-filter=".filter-product">Minuman</li>
            <li data-filter=".filter-branding">Dessert</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/ayambakar.png" class="img-fluid" alt="">
              <div class="portfolio-info" style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Ayam Bakar</h4>
                <p>Ayam Bakar kami adalah hidangan istimewa yang sempurna untuk melengkapi setiap acara spesial Anda. Dimasak dengan keahlian tinggi dan bahan-bahan terbaik, Ayam Bakar kami menghadirkan cita rasa autentik yang menggugah selera.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/ayambakar.png" title="Ayam Bakar" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/jusjeruk.png" class="img-fluid" alt="">
              <div class="portfolio-info" style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Jus Jeruk</h4>
                <p>Jus Jeruk kami dibuat dari jeruk segar yang dipetik langsung dari kebun terbaik. Kami memastikan setiap jeruk yang digunakan memiliki kualitas terbaik untuk memberikan rasa dan nutrisi yang optimal.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/jusjeruk.png" title="Jus Jeruk" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/pudding.png" class="img-fluid" alt="">
              <div class="portfolio-info" style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Puding</h4>
                <p>Kami menggunakan bahan-bahan terbaik seperti susu segar, gula murni, dan buah-buahan pilihan untuk menciptakan puding yang tidak hanya lezat tetapi juga sehat. Setiap gigitan puding kami menawarkan tekstur lembut dan rasa yang memanjakan.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/pudding.png" title="Puding" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/ikanbakar.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Ikan Bakar</h4>
                <p>Kami hanya menggunakan ikan segar yang dipilih dengan cermat untuk memastikan kualitas dan rasa terbaik. Setiap ikan dipersiapkan dengan teliti untuk mempertahankan kesegaran dan tekstur yang sempurna.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/ikanbakar.png" title="Ikan Bakar" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/jusjambu.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Jus Jambu</h4>
                <p>Nikmati segar dan kaya akan nutrisi dengan Jus Jambu kami, minuman alami yang menawarkan cita rasa manis dan segar dari buah jambu segar. Dipadukan dengan teknik penyajian yang mempertahankan keaslian rasanya, jus jambu kami adalah pilihan ideal untuk memberikan penyegaran sehat di setiap waktu.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/churros.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Churros</h4>
                <p>Nikmati kelezatan dari Churros kami, camilan klasik yang menggugah selera dengan tekstur renyah di luar dan lembut di dalam.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/churros.png" title="Churros" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/ayamgoreng.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Ayam Goreng</h4>
                <p>Ayam kami digoreng hingga kulitnya berwarna keemasan dengan tekstur yang renyah, sementara dagingnya tetap empuk dan juicy di setiap gigitannya.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/ayamgoreng.png" title="Ayam Goreng" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/jusmangga.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Jus Mangga</h4>
                <p>Kami hanya menggunakan mangga-mangga segar yang dipetik saat matang penuh untuk menghasilkan jus mangga yang berkualitas tinggi. Ini memastikan setiap tegukan penuh dengan cita rasa mangga yang lezat dan manfaat nutrisi yang maksimal.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/jusmangga.png" title="Jus Mangga" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="<?php echo BASE_URL ?>user/assets/img/menu/cupcake.png" class="img-fluid" alt="">
              <div class="portfolio-info"style="color: white; background-color: rgba(0, 0, 0, 0.5);">
                <h4 style='color: white;'>Cupcake</h4>
                <p>Cupcake kami adalah karya seni yang tidak hanya menggugah selera tetapi juga memanjakan mata. Setiap cupcake adalah perpaduan sempurna antara tekstur lembut dan rasa yang memikat, membuatnya cocok untuk berbagai acara dan kesempatan istimewa.</p>
                <a href="<?php echo BASE_URL ?>user/assets/img/menu/cupcake.png" title="Cupcake" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?php echo BASE_URL ?>portfolio-details.php" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section>
    <!-- /Portfolio Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak kami</h2>
        <p>Silakan hubungi kami melalui informasi kontak di bawah ini untuk pertanyaan, permintaan, atau konsultasi lebih lanjut. </p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Jalan Sunan Muria No. 1 Kota Kudus , Jawa Tengah , Indonesia.</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Hubungi Kami</h3>
                  <p>+62812-3456-7890</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email kami</h3>
                  <p>Cateringinaja@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d990.4302250145868!2d110.84384777227719!3d-6.803767938364969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1719304913520!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>


  <?php include(BASE_PATH . 'user/includes/footer.php'); ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?php echo BASE_URL ?>user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo BASE_URL ?>user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo BASE_URL ?>user/assets/js/main.js"></script>

</body>

</html>