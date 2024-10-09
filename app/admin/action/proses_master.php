<?php
session_start();
    include('../../config/dbcon.php');

header('Content-Type: application/json');

###############################################################################################################
// Fungsi UMUM 
function sanitize_input($data) {
    global $con;
    return mysqli_real_escape_string($con, trim($data));
}
// Function to send JSON response
function sendJsonResponse($success, $message, $data = null) {
    $response = [
        'success' => $success,
        'message' => $message,
        'data'    => $data
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
// Function to generate new customer code
function generate_customer_code($con) {
    $query      = "SELECT MAX(CAST(SUBSTRING(kode_customer, 4) AS UNSIGNED)) as max_id FROM customer";
    $result     = mysqli_query($con, $query);
    $row        = mysqli_fetch_assoc($result);
    $next_id    = ($row['max_id'] ?? 0) + 1;
    return 'CUS' . str_pad($next_id, 4, '0', STR_PAD_LEFT);
}

// Function to generate new supplier code
function generate_supplier_code($con) {
    $query      = "SELECT MAX(CAST(SUBSTRING(kode_supplier, 4) AS UNSIGNED)) as max_id FROM supplier";
    $result     = mysqli_query($con, $query);
    $row        = mysqli_fetch_assoc($result);
    $next_id    = ($row['max_id'] ?? 0) + 1;
    return 'SUP' . str_pad($next_id, 4, '0', STR_PAD_LEFT);
}

// Function to generate new product code
function generate_produk_code($con) {
    $query      = "SELECT MAX(CAST(SUBSTRING(kode_produk, 4) AS UNSIGNED)) as max_id FROM produk";
    $result     = mysqli_query($con, $query);
    $row        = mysqli_fetch_assoc($result);
    $next_id    = ($row['max_id'] ?? 0) + 1;
    return 'PRD' . str_pad($next_id, 4, '0', STR_PAD_LEFT);
}
// Function to generate new material code
function generate_material_code($con) {
        $query      = "SELECT MAX(CAST(SUBSTRING(kode_material, 4) AS UNSIGNED)) as max_id FROM material";
        $result     = mysqli_query($con, $query);
        $row        = mysqli_fetch_assoc($result);
        $next_id    = ($row['max_id'] ?? 0) + 1;
        return 'MTR' . str_pad($next_id, 4, '0', STR_PAD_LEFT);
    }

// Function to Validate File img & File max size 5mb
function validateFile($file) {
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if (!isset($file) || $file['error'] != 0) {
        return ['valid' => false, 'message' => 'Pilih file terlebih dahulu atau terjadi kesalahan saat upload.'];
    }

    if (!in_array($file['type'], $allowedTypes)) {
        return ['valid' => false, 'message' => 'Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.'];
    }

    if ($file['size'] > $maxSize) {
        return ['valid' => false, 'message' => 'Ukuran file maksimal adalah 5MB.'];
    }

    return ['valid' => true];
}
###############################################################################################################

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? sanitize_input($_POST['action']) : '';

################### MASTER SETTINGS -> MASTER DATA ##################
    switch($action){
#---------------------> Add Customer <------------------------------#  
    case 'addCustomer':
        $nama           = sanitize_input($_POST['nama']);
        $email          = sanitize_input($_POST['email']);
        $username       = sanitize_input($_POST['username']);
        $password       = password_hash(sanitize_input($_POST['password']), PASSWORD_DEFAULT);
        $telp           = sanitize_input($_POST['telp']);
        $alamat_cust    = sanitize_input($_POST['alamat_cust']);

        // Check if username or email already exists
        $check_query    = "SELECT * FROM customer WHERE username = ? OR email = ?";
        $check_stmt     = mysqli_prepare($con, $check_query);
                          mysqli_stmt_bind_param($check_stmt, "ss", $username, $email);
                          mysqli_stmt_execute($check_stmt);
        $result         = mysqli_stmt_get_result($check_stmt);

        if (mysqli_num_rows($result) > 0) {
            $existing_user = mysqli_fetch_assoc($result);
            if ($existing_user['username'] == $username) {
                echo json_encode(['status' => 'error', 'message' => 'Username sudah digunakan.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Email sudah digunakan.']);
            }
            exit();
        }

        mysqli_stmt_close($check_stmt);

        // If username and email are unique, proceed with insertion
        $kode_customer = generate_customer_code($con);
        
        $query = "INSERT INTO customer (kode_customer, nama, email, username, password, telp, alamat_cust) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt  = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $kode_customer, $nama, $email, $username, $password, $telp, $alamat_cust);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Customer berhasil ditambahkan.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan customer: ' . mysqli_error($con)]);
        }
        
        mysqli_stmt_close($stmt);
        exit();
    break;
#---------------------> Update Customer <------------------------------#  
    case 'editCustomer':
        $kode_customer  = sanitize_input($_POST['kode_customer']);
        $nama           = sanitize_input($_POST['nama']);
        $email          = sanitize_input($_POST['email']);
        $username       = sanitize_input($_POST['username']);
        $telp           = sanitize_input($_POST['telp']);
        $alamat_cust    = sanitize_input($_POST['alamat_cust']);

        // Check if username or email already exists (excluding the current customer)
        $check_query    = "SELECT * FROM customer WHERE (username = ? OR email = ?) AND kode_customer != ?";
        $check_stmt     = mysqli_prepare($con, $check_query);
                          mysqli_stmt_bind_param($check_stmt, "sss", $username, $email, $kode_customer);
                          mysqli_stmt_execute($check_stmt);
        $result         = mysqli_stmt_get_result($check_stmt);

        if (mysqli_num_rows($result) > 0) {
            $existing_user = mysqli_fetch_assoc($result);
            if ($existing_user['username'] == $username) {
                echo json_encode(['status' => 'error', 'message' => 'Username sudah digunakan.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Email sudah digunakan.']);
            }
            exit();
        }

        mysqli_stmt_close($check_stmt);

        // If username and email are unique, proceed with update
        $query = "UPDATE customer SET nama=?, email=?, username=?, telp=?, alamat_cust=? WHERE kode_customer=?";
        
        $stmt  = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $nama, $email, $username, $telp, $alamat_cust, $kode_customer);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Customer berhasil diperbarui.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui customer: ' . mysqli_error($con)]);
        }
        
        mysqli_stmt_close($stmt);
        exit();
    break;
#---------------------> Delete Customer <------------------------------#  
case 'deleteCustomer':
    $kode_customer = sanitize_input($_POST['kode_customer']);
    
    $query = "DELETE FROM customer WHERE kode_customer=?";
    
    $stmt  = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_customer);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Customer berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus customer: ' . mysqli_error($con)]);
    }

    mysqli_stmt_close($stmt);
    exit();
break;

#---------------------> Add Supplier <------------------------------#  
case 'addSupplier':
    $nama           = sanitize_input($_POST['nama']);
    $email          = sanitize_input($_POST['email']);
    $telp           = sanitize_input($_POST['telp']);
    $alamat_supplier = sanitize_input($_POST['alamat_supplier']);

    // Check if email already exists
    $check_query    = "SELECT * FROM supplier WHERE email = ?";
    $check_stmt     = mysqli_prepare($con, $check_query);
                      mysqli_stmt_bind_param($check_stmt, "s", $email);
                      mysqli_stmt_execute($check_stmt);
    $result         = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email sudah digunakan.']);
        mysqli_stmt_close($check_stmt);
        exit();
    }

    mysqli_stmt_close($check_stmt);

    // If email is unique, proceed with insertion
    $kode_supplier = generate_supplier_code($con);
    
    $query = "INSERT INTO supplier (kode_supplier, nama, email, telp, alamat_supplier) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt  = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $kode_supplier, $nama, $email, $telp, $alamat_supplier);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Supplier berhasil ditambahkan.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan supplier: ' . mysqli_error($con)]);
    }
    
    mysqli_stmt_close($stmt);
    exit();
break;

#---------------------> Edit Supplier <------------------------------#  
case 'editSupplier':
    $kode_supplier  = sanitize_input($_POST['kode_supplier']);
    $nama           = sanitize_input($_POST['nama']);
    $email          = sanitize_input($_POST['email']);
    $telp           = sanitize_input($_POST['telp']);
    $alamat_supplier = sanitize_input($_POST['alamat_supplier']);

    // Check if email already exists for other suppliers
    $check_query    = "SELECT * FROM supplier WHERE email = ? AND kode_supplier != ?";
    $check_stmt     = mysqli_prepare($con, $check_query);
                      mysqli_stmt_bind_param($check_stmt, "ss", $email, $kode_supplier);
                      mysqli_stmt_execute($check_stmt);
    $result         = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email sudah digunakan oleh supplier lain.']);
        mysqli_stmt_close($check_stmt);
        exit();
    }

    mysqli_stmt_close($check_stmt);

    // If email is unique or unchanged, proceed with update
    $query = "UPDATE supplier SET nama = ?, email = ?, telp = ?, alamat_supplier = ? 
            WHERE kode_supplier = ?";
    
    $stmt  = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $nama, $email, $telp, $alamat_supplier, $kode_supplier);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Data supplier berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data supplier: ' . mysqli_error($con)]);
    }
    
    mysqli_stmt_close($stmt);
    exit();
break;

#---------------------> Delete Supplier <------------------------------#
case 'deleteSupplier':
    $kode_supplier = sanitize_input($_POST['kode_supplier']);

    $query = "DELETE FROM supplier WHERE kode_supplier = ?";
    
    $stmt  = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_supplier);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Supplier berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus supplier: ' . mysqli_error($con)]);
    }
    
    mysqli_stmt_close($stmt);
    exit();
break;

################ MASTER SETTINGS -> MASTER INVENTORY MATERIAL ###########
#---------------------> Add Material <---------------------------------#
case 'addMaterial':
    $nama_bahanbaku = sanitize_input($_POST['nama_bahanbaku']);
    $stock          = sanitize_input($_POST['stock']);
    $satuan         = sanitize_input($_POST['satuan']);
    $harga          = sanitize_input($_POST['harga']);

    // Check if material with the same name already exists
    $check_query    = "SELECT * FROM material WHERE nama_bahanbaku = ?";
    $check_stmt     = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $nama_bahanbaku);
    mysqli_stmt_execute($check_stmt);
    $result         = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Nama bahan baku sudah ada.']);
        exit();
    }

    mysqli_stmt_close($check_stmt);

    // Generate new material code
    $kode_material = generate_material_code($con);

    // Handle image upload
    $fileValidation = validateFile($_FILES['image']);
    if (!$fileValidation['valid']) {
        echo json_encode(['status' => 'error', 'message' => $fileValidation['message']]);
        exit();
    }
    
    $image        = $_FILES['image'];
    $image_name   = $image['name'];
    $target_dir   = "../img_material/";
    $target_file  = $target_dir . $image_name;

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $query    = "INSERT INTO material (kode_material, nama_bahanbaku, stock, satuan, harga, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt     = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssds", $kode_material, $nama_bahanbaku, $stock, $satuan, $harga, $image_name);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Material berhasil ditambahkan.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan material: ' . mysqli_error($con)]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar.']);
    }

    exit();
break;

#---------------------> Update Material <------------------------------# 
case 'editMaterial':
    $kode_material      = sanitize_input($_POST['kode_material']);
    $nama_bahanbaku     = sanitize_input($_POST['nama_bahanbaku']);
    $stock              = sanitize_input($_POST['stock']);
    $satuan             = sanitize_input($_POST['satuan']);
    $harga              = sanitize_input($_POST['harga']);

    $update_image       = false;
    $image_name         = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileValidation = validateFile($_FILES['image']);
        if (!$fileValidation['valid']) {
            echo json_encode(['status' => 'error', 'message' => $fileValidation['message']]);
            exit();
        }
        
        $image          = $_FILES['image'];
        $image_name     = time() . '_' . $image['name'];
        $target_dir     = "../img_material/";
        $target_file    = $target_dir . $image_name;

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $update_image   = true;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar baru.']);
            exit();
        }
    }

    if ($update_image) {
        $query  = "UPDATE material SET nama_bahanbaku = ?, stock = ?, satuan = ?, harga = ?, image = ? WHERE kode_material = ?";
        $stmt   = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssdss", $nama_bahanbaku, $stock, $satuan, $harga, $image_name, $kode_material);
    } else {
        $query  = "UPDATE material SET nama_bahanbaku = ?, stock = ?, satuan = ?, harga = ? WHERE kode_material = ?";
        $stmt   = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssds", $nama_bahanbaku, $stock, $satuan, $harga, $kode_material);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Material berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui material: ' . mysqli_error($con)]);
    }
    mysqli_stmt_close($stmt);
    exit();
break;

#---------------------> Delete Material <------------------------------# 
case 'deleteMaterial':
    $kode_material      = sanitize_input($_POST['kode_material']);

    // Ambil nama file gambar dari database
    $get_image_query    = "SELECT image FROM material WHERE kode_material = ?";
    $get_image_stmt     = mysqli_prepare($con, $get_image_query);
                          mysqli_stmt_bind_param($get_image_stmt, "s", $kode_material);
                          mysqli_stmt_execute($get_image_stmt);
    $result             = mysqli_stmt_get_result($get_image_stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_name = $row['image'];
        $image_path = "../img_material/" . $image_name;

        // Hapus file gambar jika ada
        if (file_exists($image_path)) {
            if (!unlink($image_path)) {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus gambar dari direktori.']);
                exit();
            }
        }

        // Hapus data dari database
        $delete_query   = "DELETE FROM material WHERE kode_material = ?";
        $delete_stmt    = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "s", $kode_material);

        if (mysqli_stmt_execute($delete_stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Material dan gambar berhasil dihapus.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus material: ' . mysqli_error($con)]);
        }

        mysqli_stmt_close($delete_stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Material tidak ditemukan.']);
    }

    mysqli_stmt_close($get_image_stmt);
    exit();
break;

################ MASTER SETTINGS -> MASTER PRODUK ###########
#---------------------> Add Produk <------------------------------------#
case 'addProduct':
    $nama_produk        = sanitize_input($_POST['nama_produk']);
    $deskripsi          = sanitize_input($_POST['deskripsi']);
    $harga              = sanitize_input($_POST['harga']);

    // Generate new product code
    $kode_produk        = generate_produk_code($con);

    // Validator img type
    $fileValidation = validateFile($_FILES['image']);
        if (!$fileValidation['valid']) {
            echo json_encode(['status' => 'error', 'message' => $fileValidation['message']]);
        exit();
    }
    
        $image = $_FILES['image'];
        $image_name     =  $image['name'];
        $target_dir     = "../img_produk/";
        $target_file    = $target_dir . $image_name;

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        
        $query  = "INSERT INTO produk (kode_produk, nama_produk, image, deskripsi, harga) VALUES (?, ?, ?, ?, ?)";
        $stmt   = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssd", $kode_produk, $nama_produk, $image_name, $deskripsi, $harga);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['status' => 'success', 'message' => 'Produk berhasil ditambahkan.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan produk: ' . mysqli_error($con)]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah gambar.']);
    }
    exit();
    break;
        
#---------------------> Update Produk <---------------------------------#
case 'editProduct':
    $kode_produk = sanitize_input($_POST['kode_produk']);
    $nama_produk = sanitize_input($_POST['nama_produk']);
    $deskripsi   = sanitize_input($_POST['deskripsi']);
    $harga       = sanitize_input($_POST['harga']);

    $response = array();

    if ($_FILES['image']['size'] > 0) {
        $fileValidation = validateFile($_FILES['image']);

        if (!$fileValidation['valid']) {
            echo json_encode(['status' => 'error', 'message' => $fileValidation['message']]);
            exit;
            }

        $image = $_FILES['image'];
        $image_name = $image['name'];
        $target_dir = "../img_produk/";
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $query = "UPDATE produk SET nama_produk=?, image=?, deskripsi=?, harga=? WHERE kode_produk=?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssds", $nama_produk, $image_name, $deskripsi, $harga, $kode_produk);
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal mengunggah gambar.');
            echo json_encode($response);
            break;
        }
    } else {
        $query  = "UPDATE produk SET nama_produk=?, deskripsi=?, harga=? WHERE kode_produk=?";
        $stmt   = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssds", $nama_produk, $deskripsi, $harga, $kode_produk);
    }

    if (mysqli_stmt_execute($stmt)) {
        $response = array('status' => 'success', 'message' => 'Produk berhasil diperbarui.');
    } else {
        $response = array('status' => 'error', 'message' => 'Gagal memperbarui produk: ' . mysqli_error($con));
    }
    
    mysqli_stmt_close($stmt);
    echo json_encode($response);
    break;
#---------------------> Delete Produk <---------------------------------#
case 'deleteProduct':
    $kode_produk = sanitize_input($_POST['kode_produk']);
    
    // First, get the image filename
    $query  = "SELECT image FROM produk WHERE kode_produk = ?";
    $stmt   = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_produk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $image_to_delete = "../img_produk/" . $row['image'];
        
        // Delete the product from the database
        $delete_query = "DELETE FROM produk WHERE kode_produk = ?";
        $delete_stmt = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($delete_stmt, "s", $kode_produk);
        
        if (mysqli_stmt_execute($delete_stmt)) {
            // If database deletion is successful, try to delete the image file
            if (file_exists($image_to_delete)) {
                unlink($image_to_delete);
            }
            $response = array('status' => 'success', 'message' => 'Produk berhasil dihapus.');
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal menghapus produk: ' . mysqli_error($con));
        }
        mysqli_stmt_close($delete_stmt);
    } else {
        $response = array('status' => 'error', 'message' => 'Produk tidak ditemukan.');
    }
    mysqli_stmt_close($stmt);
    echo json_encode($response);
    break;



############################## DEFAULT; ##############################
default:
    $response = array('status' => 'error', 'message' => 'Aksi tidak valid.');
    echo json_encode($response);
    break;
############################## SWITCH END; ############################## 
}
############################## SWITCH END; ############################## 
}?>