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

<!-- Add Product Modal -->
<div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddProductModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="addProductForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="action" value="addProduct">
          <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="image">Gambar Produk</label>
            <input type="file" id="image" name="image" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Description</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Product Modal END -->

<!-- Edit Product Modal -->
<div class="modal fade" id="EditProductModal" tabindex="-1" aria-labelledby="EditProductModalLabel" aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditProductModalLabel">Edit Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo BASE_URL ?>admin/action/proses_master.php" method="POST" id="editProductForm" enctype="multipart/form-data">
        <input type="hidden" name="action" value="editProduct">
        <input type="hidden" name="kode_produk" id="edit_kode_produk">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_nama_produk">Nama Produk</label>
            <input type="text" id="edit_nama_produk" name="nama_produk" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="edit_image">Image</label>
            <input type="file" id="edit_image" name="image" class="form-control-file">
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
          </div>
          <div class="form-group">
            <label for="edit_deskripsi">Deskripsi</label>
            <textarea id="edit_deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="edit_harga">Harga</label>
            <input type="number" id="edit_harga" name="harga" class="form-control" required>
            <small class="form-text text-muted">Masukkan nominal angka, contoh: 100000</small>
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
<!-- Edit Product Modal END -->

<!-- Inventory Settings Modal -->
<div class="modal fade" id="InventorySettingsModal" tabindex="-1" aria-labelledby="InventorySettingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InventorySettingsModalLabel">Pengaturan Bahan Baku Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="inventorySettingsForm">
          <input type="hidden" id="kode_produk" name="kode_produk">
          <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" readonly>
          </div>
          <div class="form-group">
            <label>Bahan Baku</label>
            <div id="materialList">
              <!-- Bahan baku akan ditambahkan di sini secara dinamis -->
            </div>
            <button type="button" class="btn btn-success mt-2" id="addMaterial">Tambah Bahan Baku</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="saveInventorySettings">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>
<!-- Inventory Settings Modal END -->

<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Master Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Master Produk</li>
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
              <a href="#" data-toggle="modal" data-target="#AddProductModal" class="btn btn-primary btn-xn float-right">Tambah Baru</a>
              <h2 style=" width: 100%; border-bottom: 5px solid gray; padding-bottom: 5px;"><b>Master Product Information</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Image</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $nomor = 0;  ######## Penomoran Tabel HTML #######
                      $query = "SELECT * FROM produk";
                      $query_run = mysqli_query($con, $query);
                          if(mysqli_num_rows($query_run) > 0)
                          {
                            foreach($query_run as $row)
                            {
                              $nomor++;
                              ?>
                               <tr>
                                  <td><?php echo htmlentities ($nomor);?></td>
                                  <td><?php echo $row['kode_produk']; ?></td>
                                  <td><?php echo $row['nama_produk']; ?></td>
                                  <td>
                                    <?php 
                                      if (!empty($row['image'])) {
                                        echo '<img src="../img_produk/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['image']) . '" style="width: 100px; height: auto;">';
                                      } else {
                                        echo 'No image';
                                      }
                                    ?>
                                  </td>
                                  <td><?php echo $row['deskripsi']; ?></td>
                                  <td>Rp. <?php echo $row['harga']; ?> /porsi</td>
                                  <td>
                                    <button type="button" class="btn btn-warning editProductBtn" data-id="<?php echo $row['kode_produk']; ?>">
                                      <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <button type="button" class="btn btn-danger deleteProductBtn" data-id="<?php echo $row['kode_produk']; ?>">
                                      <ion-icon name="trash-sharp"></ion-icon>
                                    </button>
                                    <button type="button" class="btn btn-info inventorySettingsBtn" data-id="<?php echo $row['kode_produk']; ?>">
                                      <ion-icon name="settings-outline"></ion-icon>
                                    </button>
                                  </td>
                                </tr>
                            <?php
                                }
                              }
                              else{
                                ?>
                                <tr>
                                  <td colspan="7">Data Record Not Found</td>
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

    // Add Product
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var fileInput = this.querySelector('input[type="file"]');
        var fileValidation = validateFile(fileInput);

        if (!fileValidation.valid) {
            showNotification('error', 'Error!', fileValidation.message);
            return;
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
                    $('#AddProductModal').modal('hide');
                    showNotification('success', 'Sukses!', response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    showNotification('error', 'Gagal!', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat menambahkan data produk.');
            }
        });
    });

    // Edit Product
    $('.editProductBtn').on('click', function() {
        var kode_produk = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "<?php echo BASE_URL ?>admin/action/get_product.php",
            data: {kode_produk: kode_produk},
            dataType: "json",
            success: function(response) {
                $('#edit_kode_produk').val(response.kode_produk);
                $('#edit_nama_produk').val(response.nama_produk);
                $('#edit_deskripsi').val(response.deskripsi);
                $('#edit_harga').val(response.harga);
                $('#EditProductModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showNotification('error', 'Error!', 'Terjadi kesalahan saat mengambil data produk.');
            }
        });
    });

    $('#editProductForm').on('submit', function(e) {
    e.preventDefault();
    console.log('Submitting form...');
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            console.log('Response:', response);
            $('#EditProductModal').modal('hide');
            if (response.status === 'success') {
                showNotification('success', 'Sukses!', response.message);
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                showNotification('error', 'Gagal!', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);
            showNotification('error', 'Error!', 'Terjadi kesalahan saat memperbarui data produk.');
        }
    });
});
    // Delete Product
    $('.deleteProductBtn').on('click', function() {
        var kode_produk = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data produk akan dihapus permanen!",
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
                    data: {action: 'deleteProduct', kode_produk: kode_produk},
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            showNotification('success', 'Terhapus!', response.message);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            showNotification('error', 'Gagal!', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        showNotification('error', 'Error!', 'Terjadi kesalahan saat menghapus data produk.');
                    }
                });
            }
        });
    });

    // Setting bahan baku produk
    let globalMaterials = [];
    // Setting bahan baku produk
    $('.inventorySettingsBtn').on('click', function() {
    const kode_produk = $(this).data('id');
    $('#kode_produk').val(kode_produk);

    $.ajax({
        url: '<?php echo BASE_URL ?>admin/action/get_product_materials.php',
        method: 'GET',
        data: { kode_produk: kode_produk },
        dataType: 'json',
        success: function(response) {
            $('#nama_produk').val(response.product.nama_produk);
            $('#materialList').empty();

            // Add initial material field
            addMaterialField();

            // Populate material options
            populateMaterialOptions(response.materials);

            $('#InventorySettingsModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error('XHR:', xhr);
            console.error('Status:', status);
            console.error('Error:', error);
            showNotification('error', 'Error!', 'Gagal memuat data bahan baku produk.');
        }
    });
});

function populateMaterialOptions(materials) {
    const materialOptions = materials.map(material => 
        `<option value="${material.kode_material}" data-satuan="${material.satuan}">${material.nama_bahanbaku} (${material.satuan})</option>`
    ).join('');

    $('.material-select').html('<option value="">Pilih Bahan Baku</option>' + materialOptions);
}

function addMaterialField() {
    const materialCount = $('.material-item').length;
    const newField = `
        <div class="row mb-2 material-item">
            <div class="col-md-4">
                <select class="form-control material-select" name="materials[${materialCount}][kode_material]" required>
                    <option value="">Pilih Bahan Baku</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control material-quantity" name="materials[${materialCount}][jumlah]" placeholder="Jumlah" required>
            </div>
            <div class="col-md-3">
                <select class="form-control material-unit" name="materials[${materialCount}][satuan]" required>
                    <option value="">Satuan</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-material">Hapus</button>
            </div>
        </div>
    `;
    $('#materialList').append(newField);

    // Populate material options for the new field
    const materialOptions = $('.material-select').first().html();
    $('.material-select').last().html(materialOptions);
}
// Panggil fungsi ini dengan data materials
populateMaterialOptions(response.materials);

if (response.product_materials.length === 0) {
    addMaterialField();
} else {
    response.product_materials.forEach(material => {
        addMaterialField(material);
    });
}

function addMaterialField(material = null) {
    const materialCount = $('.material-item').length;
    const newField = `
        <div class="row mb-2 material-item">
            <div class="col-md-4">
                <select class="form-control material-select" name="materials[${materialCount}][kode_material]" required>
                    <option value="">Pilih Bahan Baku</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control material-quantity" name="materials[${materialCount}][jumlah]" placeholder="Jumlah" required value="${material ? material.jumlah : ''}">
            </div>
            <div class="col-md-3">
                <select class="form-control material-unit" name="materials[${materialCount}][satuan]" required>
                    <option value="">Satuan</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-material">Hapus</button>
            </div>
        </div>
    `;
    $('#materialList').append(newField);
    
    const $newRow = $('#materialList').children().last();
    const $materialSelect = $newRow.find('.material-select');
    const $unitSelect = $newRow.find('.material-unit');
    
    // Populate material options
    populateMaterialOptions(globalMaterials); // Pastikan globalMaterials tersedia
    
    if (material) {
        $materialSelect.val(material.kode_material).trigger('change');
        $newRow.find('.material-quantity').val(material.jumlah);
        $unitSelect.val(material.satuan);
    }
}

$(document).on('change', '.material-select', function() {
    const selectedOption = $(this).find('option:selected');
    const baseSatuan = selectedOption.data('satuan');
    const unitSelect = $(this).closest('.material-item').find('.material-unit');
    
    unitSelect.empty();
    if (baseSatuan === 'kg') {
        unitSelect.append('<option value="kg">kg</option>');
        unitSelect.append('<option value="gr">gr</option>');
    } else if (baseSatuan === 'liter') {
        unitSelect.append('<option value="liter">liter</option>');
        unitSelect.append('<option value="ml">ml</option>');
    } else {
        unitSelect.append(`<option value="${baseSatuan}">${baseSatuan}</option>`);
    }
});

$('#addMaterial').on('click', addMaterialField);

$(document).on('click', '.remove-material', function() {
    $(this).closest('.material-item').remove();
});

$('#saveInventorySettings').on('click', function() {
    const formData = $('#inventorySettingsForm').serialize();
    
    $.ajax({
        url: '<?php echo BASE_URL ?>admin/action/save_product_materials.php',
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                showNotification('success', 'Sukses!', 'Pengaturan bahan baku berhasil disimpan.');
                $('#InventorySettingsModal').modal('hide');
            } else {
                showNotification('error', 'Error!', response.message);
            }
        },
        error: function() {
            showNotification('error', 'Error!', 'Gagal menyimpan pengaturan bahan baku.');
        }
    });
});
// script end   
});
</script>

<?php include(BASE_PATH . 'config/script.php'); ?>
<?php include(BASE_PATH . 'admin/includes/footer.php'); ?>