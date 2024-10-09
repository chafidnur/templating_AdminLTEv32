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

<!-- Add Customer Modal -->
<div class="modal fade" id="AddCustomerModal" tabindex="-1" aria-labelledby="AddCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddCustomerModalLabel">Tambahkan Data Customer Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="addCustomerForm">
        <input type="hidden" name="action" value="addCustomer">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Customer</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Input Nama Customer..." required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Input Email..." required>
          </div>
          <div class="row"> <!--1 Row 2 Field -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Input Username..." required>
              </div> 
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Input Password..." required>
              </div> 
            </div>
          </div>
          <div class="form-group">
            <label for="telp">No. Telp</label>
            <input type="text" id="telp" name="telp" class="form-control" placeholder="Input No. Telp..." required>
          </div>
          <div class="form-group">
            <label for="alamat_cust">Alamat</label>
            <input type="text" id="alamat_cust" name="alamat_cust" class="form-control" placeholder="Input Alamat..." required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
          <button type="submit" id="addCustomerbtn" class="btn btn-primary">SAVE</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal fade" id="EditCustomerModal" tabindex="-1" aria-labelledby="EditCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditCustomerModalLabel">Edit Data Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="editCustomerForm">
        <input type="hidden" name="action" value="editCustomer">
        <input type="hidden" name="kode_customer" id="edit_kode_customer">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama">Nama Customer</label>
            <input type="text" id="edit_nama" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_username">Username</label>
            <input type="text" id="edit_username" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_telp">No. Telp</label>
            <input type="text" id="edit_telp" name="telp" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_alamat_cust">Alamat</label>
            <input type="text" id="edit_alamat_cust" name="alamat_cust" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
          <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Customer Modal -->
<div class="modal fade" id="DeleteCustomerModal" tabindex="-1" aria-labelledby="DeleteCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteCustomerModalLabel">Delete Data Customer Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST"> <!-- FUNCTION DELETE DATA -->
      <div class="modal-body">
        <input type="hidden" name="action" value="deleteCustomer">
        <input type="hidden" name="deleteCustomerid" id="delete_kode_customer">
        <p>
          Are you sure you want to delete this customer data?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" name="deleteCustomerbtn" class="btn btn-danger">YES, DELETE!</button>
    </form>
      </div>
    </div>
  </div>
</div>


<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Master Customer</li>
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
              <a href="#" data-toggle="modal" data-target="#AddCustomerModal" class="btn btn-primary btn-xn float-right">Tambah Baru</a>
              <h2 style=" width: 100%; border-bottom: 5px solid gray; padding-bottom: 5px;"><b>Master Customer Information</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Customer</th>
                    <th>Nama Customer</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $nomor = 0;  ######## Penomoran Tabel HTML #######
                      $query = "SELECT * FROM customer";
                      $query_run = mysqli_query($con, $query);
                          if(mysqli_num_rows($query_run) > 0)
                          {
                            foreach($query_run as $row)
                            {
                              $nomor++;
                    ?>
                    <!-- Tampilan Tabel -->
                               <tr>
                                  <td><?php echo htmlentities ($nomor);?></td>
                                  <td><?php echo $row['kode_customer']; ?></td>
                                  <td><?php echo $row['nama']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['username']; ?></td>
                                  <td><?php echo $row['telp']; ?></td>
                                  <td><?php echo $row['alamat_cust']; ?></td>
                                  <td>
                                    <button type="button" class="btn btn-warning editCustomerbtn" data-id="<?php echo $row['kode_customer']; ?>">
                                      <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <button type="button" class="btn btn-danger deleteCustomerbtn" data-id="<?php echo $row['kode_customer']; ?>">
                                      <ion-icon name="trash-sharp"></ion-icon>
                                    </button>
                                  </td>
                                </tr>
                            <?php
                                }
                              }
                              else{
                            ?>
                                <tr>
                                  <td colspan="8">Data Record Not Found</td>
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

<!-- Include Javascript JQuerry Function -->
<?php include(BASE_PATH . 'config/script.php'); ?>

<!-- Javascript Function -->
<script>
$(document).ready(function() {
    // Function to show SweetAlert2 notification
    function showNotification(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            timer: 3000,
            showConfirmButton: false
        });
    }
//-------------------------------------------------------//
    // Add Customer
    $('#addCustomerForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#AddCustomerModal').modal('hide');
                    showNotification('success', 'Sukses!', response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    showNotification('error', 'Gagal!', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat menambahkan data customer.');
            }
        });
    });
//-------------------------------------------------------//
    // Edit Customer Action
    $('.editCustomerbtn').on('click', function() {
        var kode_customer = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "<?php echo BASE_URL ?>admin/action/get_customer.php",
            data: {kode_customer: kode_customer},
            dataType: "json",
            success: function(response) {
                $('#edit_kode_customer').val(response.kode_customer);
                $('#edit_nama').val(response.nama);
                $('#edit_email').val(response.email);
                $('#edit_username').val(response.username);
                $('#edit_telp').val(response.telp);
                $('#edit_alamat_cust').val(response.alamat_cust);
                $('#EditCustomerModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat mengambil data customer.');
            }
        });
    });
    // Edit Customer Modal Form
    $('#editCustomerForm').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#EditCustomerModal').modal('hide');
                showNotification('success', 'Sukses!', response.message);
                setTimeout(function() {
                    location.reload();
                }, 3000);
            } else {
                showNotification('error', 'Gagal!', response.message);
            }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat memperbarui data customer.');
            }
        });
    });
//-------------------------------------------------------//
    // Delete Customer
    $('.deleteCustomerbtn').on('click', function() {
        var kode_customer = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data customer akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo BASE_URL ?>admin/action/proses_master.php",
                    data: {action: 'deleteCustomer', kode_customer: kode_customer},
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            showNotification('success', 'Terhapus!', 'Data customer berhasil dihapus.');
                        } else {
                            showNotification('error', 'Gagal!', 'Terjadi kesalahan saat menghapus data customer.');
                        }
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        showNotification('error', 'Error!', 'Terjadi kesalahan saat menghapus data customer.');
                    }
                });
            }
        });
    });
});
</script>
<!---------- END JAVASCRIPT MODAL ---------------!>
<?php include(BASE_PATH . 'admin/includes/footer.php'); ?>