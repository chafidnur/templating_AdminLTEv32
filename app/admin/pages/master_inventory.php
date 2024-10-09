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

<!-- Add Material Modal -->
<div class="modal fade" id="AddMaterialModal" tabindex="-1" aria-labelledby="AddMaterialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddMaterialModalLabel">Add New Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="addMaterialForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="action" value="addMaterial">
          <div class="form-group">
            <label for="nama_bahanbaku">Nama Bahan Baku</label>
            <input type="text" id="nama_bahanbaku" name="nama_bahanbaku" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="satuan">Satuan</label>
            <select id="satuan" name="satuan" class="form-control" required>
              <option value="">Pilih Satuan</option>
              <option value="kg">kg</option>
              <option value="gram">gram</option>
              <option value="liter">liter</option>
              <option value="lusin">lusin</option>
              <option value="box">box</option>
              <option value="pcs">pcs</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>
          <div class="form-group" id="satuanLainnyaGroup" style="display: none;">
            <label for="satuanLainnya">Satuan Lainnya</label>
            <input type="text" id="satuanLainnya" name="satuanLainnya" class="form-control">
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="image">Gambar Material</label>
            <input type="file" id="image" name="image" class="form-control-file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Material</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Material Modal END -->

<!-- Edit Material Modal -->
<div class="modal fade" id="EditMaterialModal" tabindex="-1" aria-labelledby="EditMaterialModalLabel" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditMaterialModalLabel">Edit Data Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="editMaterialForm" enctype="multipart/form-data">
        <input type="hidden" name="action" value="editMaterial">
        <input type="hidden" name="kode_material" id="edit_kode_material">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama_bahanbaku">Nama Bahan Baku</label>
            <input type="text" id="edit_nama_bahanbaku" name="nama_bahanbaku" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_stock">Stock</label>
            <input type="number" id="edit_stock" name="stock" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_satuan">Satuan</label>
            <select id="edit_satuan" name="satuan" class="form-control" required>
              <option value="">Pilih Satuan</option>
              <option value="kg">kg</option>
              <option value="gram">gram</option>
              <option value="liter">liter</option>
              <option value="lusin">lusin</option>
              <option value="box">box</option>
              <option value="pcs">pcs</option>
              <option value="lainnya">Lainnya</option>
            </select>
          </div>
          <div class="form-group" id="edit_satuan_lainnya_group" style="display: none;">
            <label for="edit_satuan_lainnya">Satuan Lainnya</label>
            <input type="text" id="edit_satuan_lainnya" name="satuan_lainnya" class="form-control">
          </div>
          <div class="form-group">
            <label for="edit_harga">Harga</label>
            <input type="number" id="edit_harga" name="harga" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_image">Image</label>
            <input type="file" id="edit_image" name="image" class="form-control-file">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
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
<!-- Edit Material Modal END -->

<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Master Inventory</li>
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
              <a href="#" data-toggle="modal" data-target="#AddMaterialModal" class="btn btn-primary btn-xn float-right">Tambah Baru</a>
              <h2 style=" width: 100%; border-bottom: 5px solid gray; padding-bottom: 5px;"><b>Master Inventory Information</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Material</th>
                      <th>Gambar Bahan</th>
                      <th>Nama Bahan Baku</th>
                      <th>Stock</th>
                      <th>Satuan</th>
                      <th>Konversi (gr/ml)</th>
                      <th>Harga Beli</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomor = 0;
                    $query = "SELECT * FROM material";
                    $query_run = mysqli_query($con, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $row)
                      {
                        $nomor++;
                        $covertedbase = convertedToBaeUnit($row['stock'], $row['satuan']);
                        ?>
                        <tr>
                          <td><?php echo htmlentities($nomor);?></td>
                          <td><?php echo $row['kode_material']; ?></td>
                          <td>
                            <?php 
                            if (!empty($row['image'])) {
                              echo '<img src="../img_material/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['image']) . '" style="width: 100px; height: auto;">';
                            } else {
                              echo 'No image';
                            }
                            ?>
                          </td>
                          <td><?php echo $row['nama_bahanbaku']; ?></td>
                          <td><?php echo $row['stock']; ?></td>
                          <td><?php echo $row['satuan']; ?></td>
                          <td>
                              <?php echo $covertedbase . ($row['satuan'] === 'liter' || $row['satuan'] === 'ml' ? ' ml' : ' gram'); ?>
                          </td>
                          <td> Rp.<?php echo $row['harga']; ?> / <?php echo $row['satuan']; ?> </td>
                          <td>
                            <button type="button" class="btn btn-warning editMaterialBtn" data-id="<?php echo $row['kode_material']; ?>">
                              <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" class="btn btn-danger deleteMaterialBtn" data-id="<?php echo $row['kode_material']; ?>">
                              <ion-icon name="trash-sharp"></ion-icon>
                            </button>
                          </td>
                        </tr>
                      <?php
                      }
                    }
                    else {
                      ?>
                      <tr>
                        <td colspan="9">Data Record Not Found</td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
            </div><!-- /..card-body -->
          </div><!-- /..card header -->       
        </div><!-- /..col-md-12 -->
      </div><!-- /..row -->
    </div><!-- /..container -->

</div><!-- .container-fluid -->
</section>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<?php
function convertedToBaeUnit($value, $unit) {
  switch ($unit) {
    case 'kg':
      return $value * 1000;
    case 'gram':
      return $value;
    case 'mg':
      return $value / 1000; // 1000 mg = 1 gram
    case 'liter':
      return $value * 1000; // 1 liter = 1000 grams 
    case 'ml':
      return $value; // Sudah dalam ml
    case 'lusin':
      return $value * 12 * 100; // Assuming 1 lusin = 12 pieces, and 1 piece = 100 grams (adjust as needed)
    case 'box':
      return $value * 1000; // Assuming 1 box = 1000 grams (adjust as needed)
    case 'pcs':
      return $value * 100; // Assuming 1 piece = 100 grams (adjust as needed)
    default:
      return $value;
  }
}
?>

<script>
$(document).ready(function() {
  
  //  // Initialize DataTable
  //  $('#example1').DataTable({
  //       "responsive": true,
  //       "lengthChange": false,
  //       "autoWidth": false,
  //       // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
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

    // Function to Validate file & limit upload 5mb        
    function validateFile(fileInput) {
        const file = fileInput.files[0];
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        const maxSize = 5 * 1024 * 1024; // 5MB

        if (!file) {
            return { valid: false, message: 'Pilih file terlebih dahulu.' };
        }

        if (!allowedTypes.includes(file.type)) {
            return { valid: false, message: 'Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.' };
        }

        if (file.size > maxSize) {
            return { valid: false, message: 'Ukuran file maksimal adalah 5MB.' };
        }

        return { valid: true };
    }

    // Handle "Lainnya" option in Satuan dropdown
    $('#satuan').on('change', function() {
        if ($(this).val() === 'lainnya') {
            $('#satuanLainnyaGroup').show();
            $('#satuanLainnya').prop('required', true);
        } else {
            $('#satuanLainnyaGroup').hide();
            $('#satuanLainnya').prop('required', false);
        }
    });

    // Add Material
    $('#addMaterialForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var fileInput = this.querySelector('input[type="file"]');
        var fileValidation = validateFile(fileInput);

        if (!fileValidation.valid) {
            showNotification('error', 'Error!', fileValidation.message);
            return;
        }

        // Handle custom satuan
        if ($('#satuan').val() === 'lainnya') {
            formData.set('satuan', $('#satuanLainnya').val());
        }

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#AddMaterialModal').modal('hide');
                    showNotification('success', 'Sukses!', response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    showNotification('error', 'Gagal!', response.message || 'Terjadi kesalahan saat menambahkan data material.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat menambahkan data material.');
            }
        });
    });

    // Handle "Lainnya" option in Edit Satuan dropdown
    $('#edit_satuan').on('change', function() {
        if ($(this).val() === 'lainnya') {
            $('#edit_satuan_lainnya_group').show();
            $('#edit_satuan_lainnya').prop('required', true);
        } else {
            $('#edit_satuan_lainnya_group').hide();
            $('#edit_satuan_lainnya').prop('required', false);
        }
    });

    // Edit Material
    $('.editMaterialBtn').on('click', function() {
        var kode_material = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "<?php echo BASE_URL ?>admin/action/get_material.php",
            data: {kode_material: kode_material},
            dataType: "json",
            success: function(response) {
                $('#edit_kode_material').val(response.kode_material);
                $('#edit_nama_bahanbaku').val(response.nama_bahanbaku);
                $('#edit_stock').val(response.stock);
                $('#edit_harga').val(response.harga);

                // Handle satuan
                var satuanOptions = ['kg', 'gram', 'liter', 'lusin', 'box', 'pcs'];
                if (satuanOptions.includes(response.satuan)) {
                    $('#edit_satuan').val(response.satuan);
                    $('#edit_satuan_lainnya_group').hide();
                    $('#edit_satuan_lainnya').prop('required', false);
                } else {
                    $('#edit_satuan').val('lainnya');
                    $('#edit_satuan_lainnya').val(response.satuan);
                    $('#edit_satuan_lainnya_group').show();
                    $('#edit_satuan_lainnya').prop('required', true);
                }

                $('#EditMaterialModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat mengambil data material.');
            }
        });
    });

    $('#editMaterialForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        // Handle custom satuan
        if ($('#edit_satuan').val() === 'lainnya') {
            formData.set('satuan', $('#edit_satuan_lainnya').val());
        }

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                $('#EditMaterialModal').modal('hide');
                if (response.status === 'success') {
                    showNotification('success', 'Sukses!', response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    showNotification('error', 'Gagal!', response.message || 'Terjadi kesalahan saat memperbarui data material.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat memperbarui data material.');
            }
        });
    });

    // Delete Material
    $('.deleteMaterialBtn').on('click', function() {
        var kode_material = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data material akan dihapus permanen!",
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
                    data: {action: 'deleteMaterial', kode_material: kode_material},
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            showNotification('success', 'Terhapus!', response.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            showNotification('error', 'Gagal!', response.message || 'Terjadi kesalahan saat menghapus data material.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        showNotification('error', 'Error!', 'Terjadi kesalahan saat menghapus data material.');
                    }
                });
            }
        });
    });
});
</script>

<?php include(BASE_PATH . 'config/script.php'); ?>
<?php include(BASE_PATH . 'admin/includes/footer.php'); ?>