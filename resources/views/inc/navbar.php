<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link">
            <i class="far fa-calendar-alt"></i>
            <span id="current-date"></span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link">|</span>
      </li>
      <li class="nav-item">
          <a class="nav-link">
              <i class="far fa-clock"></i>
              <span id="current-time"></span>
          </a>
      </li>
    </ul>
    <script>
      function updateDateTime() {
          const now = new Date();
          
          // Update tanggal
          const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
          
          // Update waktu
          document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
      }
  
      // Perbarui setiap detik
      setInterval(updateDateTime, 1000);
  
      // Panggil sekali saat halaman dimuat
      updateDateTime();
  </script>
  </nav>
  <!-- /.navbar -->
