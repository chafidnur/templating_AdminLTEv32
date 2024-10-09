<?php
session_start();
  include('../../config/dbcon.php');
  include(BASE_PATH . 'admin/action/session_check.php');
  include(BASE_PATH . 'admin/includes/header.php');
  include(BASE_PATH . 'admin/includes/topbar.php');
  include(BASE_PATH . 'admin/includes/sidebar.php');
?>
<!-- Check Session -->
<?php check_session(); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Add New Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addOrderModalLabel">Tambah Pesanan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addOrderForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="customer">Customer</label>
            <select class="form-control" id="customer" name="customer" required>
              <option value="">Pilih Customer</option>
              <!-- PHP code to populate options from customer table -->
            </select>
          </div>
          <div class="form-group">
            <label for="invoice">Invoice</label>
            <input type="text" class="form-control" id="invoice" name="invoice" readonly>
          </div>
          <div class="form-group">
            <label for="products">Produk</label>
            <select class="form-control" id="products" name="products[]" multiple required>
              <!-- PHP code to populate options from product table -->
            </select>
          </div>
          <div class="form-group">
            <label for="orderDate">Tanggal Pesanan</label>
            <input type="date" class="form-control" id="orderDate" name="orderDate" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add New Order Modal END -->


<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Transaksi</a></li>
              <li class="breadcrumb-item active">Transaksi Produksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header Start -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">  
          <div class="card">
            <div class="card-header">
            <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Tambah Baru</a>
            <h2 style=" width: 100%; border-bottom: 5px solid gray; padding-bottom: 5px;"><b>Master Transaksi Produksi</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Invoice</th>
                    <th>Kode Customer</th>
                    <th>Nama Customer</th>
                    <th>Status Pesanan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $nomor = 0;  ######## Penomoran Tabel HTML #######
                      $query = " SELECT produksi.invoice, 
                                        produksi.status, 
                                        produksi.tanggal, 
                                        customer.kode_customer, 
                                        customer.nama
                                  FROM produksi JOIN customer     
                                  ON produksi.kode_customer = customer.kode_customer;";
                                      
                      $query_run = mysqli_query($con, $query);
                          if(mysqli_num_rows($query_run) > 0)
                          {
                            foreach($query_run as $row)
                            {
                              $nomor++;
                              ?>
                               <tr>
                                  <td><?php echo htmlentities ($nomor);?></td>
                                  <td><?php echo $row['invoice']; ?></td>
                                  <td><?php echo $row['kode_customer']; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['tanggal']; ?></td>
                                  <td>
                                    <button type="button" class="btn btn-success btn-sm terima-btn" data-id="#">TERIMA</button>
                                    <button type="button" class="btn btn-danger btn-sm tolak-btn" data-id="#">TOLAK</button>
                                    <button type="button" class="btn btn-warning btn-sm detail-btn" data-id="#">Detail Pesanan</button>
                                    <button type="button" class="btn btn-warning btn-sm detail-btn" data-id="#">Detail Transaksi</button>
                                  </td>
                                </tr>
                            <?php
                                }
                              }
                              else{
                                ?>
                                <tr>
                                  <td>Data Record Not Found</td>
                                </tr>
                                <?php
                              }
                            ?>
                  </tbody>
              </table>
            </div><!-- /..card-body -->
          </div><!-- /..card -->       
        </div><!-- /..col-md-12 -->
      </div><!-- /..row -->
    </div><!-- /..container -->

</div><!-- .container-fluid -->
</section>
</div>

<script>
$(document).ready(function() {
  // Handle TERIMA button
  $('.terima-btn').click(function() {
    var orderId = $(this).data('id');
    Swal.fire({
      title: 'Terima Pesanan?',
      text: "Pesanan akan diterima dan diproses.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, terima!'
    }).then((result) => {
      if (result.isConfirmed) {
        // AJAX call to update order status
        $.ajax({
          url: 'update_order_status.php',
          method: 'POST',
          data: { id: orderId, status: 'diterima' },
          success: function(response) {
            Swal.fire(
              'Diterima!',
              'Pesanan telah diterima.',
              'success'
            ).then(() => {
              location.reload();
            });
          }
        });
      }
    });
  });

  // Similar handlers for TOLAK and Detail Pesanan buttons

  // Handle Tambah Baru
  $('#addOrderForm').submit(function(e) {
    e.preventDefault();
    // AJAX call to save new order
    $.ajax({
      url: 'save_new_order.php',
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        Swal.fire(
          'Berhasil!',
          'Pesanan baru telah ditambahkan.',
          'success'
        ).then(() => {
          $('#addOrderModal').modal('hide');
          location.reload();
        });
      }
    });
  });

  // Generate invoice number
  $('#customer').change(function() {
    var customerId = $(this).val();
    var today = new Date();
    var dateString = today.getFullYear() + '' + (today.getMonth()+1).toString().padStart(2, '0') + '' + today.getDate().toString().padStart(2, '0');
    var invoiceNumber = 'INV_' + customerId.substring(0, 2) + '_' + dateString + '_DITERIMA';
    $('#invoice').val(invoiceNumber);
  });
});
</script>

<?php include(BASE_PATH . 'config/script.php'); ?>
<?php include(BASE_PATH . 'admin/includes/footer.php'); ?>