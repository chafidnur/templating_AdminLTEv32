<?php
function check_session() {
    if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
        echo "<script>
            Swal.fire({
                title: 'Akses Ditolak',
                text: 'Anda harus login terlebih dahulu.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='../index.php?pesan=belum_login';
                }
            });
        </script>";
        exit();
    }

    $current_time = time();
    $last_activity = $_SESSION['last_activity'];
    $expire_time = $_SESSION['expire_time'];

    if (($current_time - $last_activity) > $expire_time) {
        session_unset();
        session_destroy();
        echo "<script>
            Swal.fire({
                title: 'Sesi Berakhir',
                text: 'Sesi Anda telah berakhir. Silakan login kembali.',
                icon: 'info',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href='../index.php?pesan=session_expired';
                }
            });
        </script>";
        exit();
    }

    $_SESSION['last_activity'] = $current_time;
}