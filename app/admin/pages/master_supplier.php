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

<!-- Add Supplier Modal -->
<div class="modal fade" id="AddSupplierModal" tabindex="-1" aria-labelledby="AddSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddSupplierModalLabel">Tambahkan Data Supplier Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="addSupplierForm">
        <input type="hidden" name="action" value="addSupplier">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Supplier</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Input Nama Supplier..." required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Input Email..." required>
          </div>
          <div class="form-group">
            <label for="telp">No. Telp</label>
            <input type="text" id="telp" name="telp" class="form-control" placeholder="Input No. Telp..." required>
          </div>
          <div class="form-group">
            <label for="alamat_supplier">Alamat</label>
            <input type="text" id="alamat_supplier" name="alamat_supplier" class="form-control" placeholder="Input Alamat..." required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
          <button type="submit" id="addSupplierbtn" class="btn btn-primary">SAVE</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Supplier Modal -->
<div class="modal fade" id="EditSupplierModal" tabindex="-1" aria-labelledby="EditSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditSupplierModalLabel">Edit Data Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="editSupplierForm">
        <input type="hidden" name="action" value="editSupplier">
        <input type="hidden" name="kode_supplier" id="edit_kode_supplier">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama">Nama Supplier</label>
            <input type="text" id="edit_nama" name="nama" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_telp">No. Telp</label>
            <input type="text" id="edit_telp" name="telp" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_alamat_supplier">Alamat</label>
            <input type="text" id="edit_alamat_supplier" name="alamat_supplier" class="form-control" required>
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

<!-- Delete Supplier Modal -->
<div class="modal fade" id="DeleteSupplierModal" tabindex="-1" aria-labelledby="DeleteSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteSupplierModalLabel">Delete Data Supplier Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="action" value="deleteSupplier">
        <input type="hidden" name="deleteSupplierId" id="delete_kode_supplier">
        <p>
          Are you sure you want to delete this supplier data?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" name="deleteSupplierbtn" class="btn btn-danger">YES, DELETE!</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Supplier</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Master Supplier</li>
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
              <a href="#" data-toggle="modal" data-target="#AddSupplierModal" class="btn btn-primary btn-xn float-right">Tambah Baru</a>
              <h2 style=" width: 100%; border-bottom: 5px solid gray; padding-bottom: 5px;"><b>Master Supplier Information</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $nomor = 0;
                    $query = "SELECT * FROM supplier";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $row)
                      {
                        $nomor++;
                  ?>
                  <tr>
                    <td><?php echo htmlentities($nomor); ?></td>
                    <td><?php echo $row['kode_supplier']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telp']; ?></td>
                    <td><?php echo $row['alamat_supplier']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning editSupplierbtn" data-id="<?php echo $row['kode_supplier']; ?>">
                        <ion-icon name="create-outline"></ion-icon>
                      </button>
                      <button type="button" class="btn btn-danger deleteSupplierbtn" data-id="<?php echo $row['kode_supplier']; ?>">
                        <ion-icon name="trash-sharp"></ion-icon>
                      </button>
                    </td>
                  </tr>
                  <?php
                      }
                    }
                    else
                    {
                  ?>
                  <tr>
                    <td colspan="7">Data Record Not Found</td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->       
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
</section>
</div>

<!-- Include Javascript JQuerry Function -->
<?php include (BASE_PATH . 'config/script.php'); ?>

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

    // Add Supplier
    $('#addSupplierForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#AddSupplierModal').modal('hide');
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
                showNotification('error', 'Error!', 'Terjadi kesalahan saat menambahkan data supplier.');
            }
        });
    });

    // Edit Supplier Action
    $('.editSupplierbtn').on('click', function() {
        var kode_supplier = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "<?php echo BASE_URL ?>admin/action/get_supplier.php",
            data: {kode_supplier: kode_supplier},
            dataType: "json",
            success: function(response) {
                $('#edit_kode_supplier').val(response.kode_supplier);
                $('#edit_nama').val(response.nama);
                $('#edit_email').val(response.email);
                $('#edit_telp').val(response.telp);
                $('#edit_alamat_supplier').val(response.alamat_supplier);
                $('#EditSupplierModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat mengambil data supplier.');
            }
        });
    });

    // Edit Supplier Modal Form
    $('#editSupplierForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#EditSupplierModal').modal('hide');
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
                showNotification('error', 'Error!', 'Terjadi kesalahan saat memperbarui data supplier.');
            }
        });
    });

    // Delete Supplier
    $('.deleteSupplierbtn').on('click', function() {
        var kode_supplier = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data supplier akan dihapus permanen!",
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
                    data: {action: 'deleteSupplier', kode_supplier: kode_supplier},
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            showNotification('success', 'Terhapus!', 'Data supplier berhasil dihapus.');
                        } else {
                            showNotification('error', 'Gagal!', 'Terjadi kesalahan saat menghapus data supplier.');
                        }
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        showNotification('error', 'Error!', 'Terjadi kesalahan saat menghapus data supplier.');
                    }
                });
            }
        });
    });

    // // Initialize DataTables
    // $('#example1').DataTable({
    //     "responsive": true,
    //     "lengthChange": false,
    //     "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Form validation for Add Supplier
    $('#addSupplierForm').validate({
        rules: {
            nama: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            telp: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            alamat_supplier: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            nama: {
                required: "Nama supplier harus diisi",
                minlength: "Nama supplier minimal 3 karakter"
            },
            email: {
                required: "Email harus diisi",
                email: "Format email tidak valid"
            },
            telp: {
                required: "Nomor telepon harus diisi",
                digits: "Hanya angka yang diperbolehkan",
                minlength: "Nomor telepon minimal 10 digit",
                maxlength: "Nomor telepon maksimal 15 digit"
            },
            alamat_supplier: {
                required: "Alamat harus diisi",
                minlength: "Alamat minimal 5 karakter"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    // Form validation for Edit Supplier
    $('#editSupplierForm').validate({
        rules: {
            nama: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            telp: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            alamat_supplier: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            nama: {
                required: "Nama supplier harus diisi",
                minlength: "Nama supplier minimal 3 karakter"
            },
            email: {
                required: "Email harus diisi",
                email: "Format email tidak valid"
            },
            telp: {
                required: "Nomor telepon harus diisi",
                digits: "Hanya angka yang diperbolehkan",
                minlength: "Nomor telepon minimal 10 digit",
                maxlength: "Nomor telepon maksimal 15 digit"
            },
            alamat_supplier: {
                required: "Alamat harus diisi",
                minlength: "Alamat minimal 5 karakter"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
<!---------- END JAVASCRIPT ---------------!>
<?php include(BASE_PATH . 'admin/includes/footer.php'); ?>