<!-- jQuery -->
<script src="<?php echo BASE_URL ?>public/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo BASE_URL ?>public/template/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo BASE_URL ?>public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL ?>public/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $(function () {
    // Menggabungkan widget bridge uibutton dari jQuery UI
    $.widget.bridge('uibutton', $.ui.button);

    // Inisialisasi DataTable untuk example1
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Inisialisasi DataTable untuk example2
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo BASE_URL ?>public/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo BASE_URL ?>public/template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo BASE_URL ?>public/template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo BASE_URL ?>public/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo BASE_URL ?>public/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo BASE_URL ?>public/template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo BASE_URL ?>public/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo BASE_URL ?>public/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo BASE_URL ?>public/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo BASE_URL ?>public/template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo BASE_URL ?>public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>public/template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL ?>public/template/dist/js/demo.js"></script>
