<?php
session_start();
include ('../config/dbcon.php');
include(BASE_PATH . 'admin/includes/header.php');
?>
<!-- HTML Tag -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title> 
    <!-- background image -->
        <style>
            html, body {
                height: 100%;
                margin: 0;
            }
            body {
                background-image: url('assets/dist/img/login_bg2.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                display: flex;
                flex-direction: column;
            }
            .wrapper {
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            .content-wrapper {
                flex: 1;
            }
            .login-container {
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 10px;
                padding: 20px;
            }
            .main-footer {
                margin-top: auto;
                background-color: rgba(255, 255, 255, 0.8); /* Optional: untuk membuat footer sedikit transparan */
            }
    </style>
</head>
<body>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h5>ADMIN LOGIN FORM</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == 'belum_login') {
                                echo '<div class="alert alert-warning">You must login first</div>';
                            } elseif ($_GET['pesan'] == 'session_expired') {
                                echo '<div class="alert alert-warning">Session expired. Please login again</div>';
                            }
                        }
                        ?>
                        <p class="login-box-msg">Sign in to start your session</p>
                        <form action="action/login.php" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="user" required="" placeholder="Username">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" required="" name="pass" placeholder="Password">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div><!-- .container-fluid -->
    </section>
</div>

<?php include(BASE_PATH . 'config/script.php'); ?>
<!-- /.content-wrapper -->
<footer style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center; padding: 10px;">
    <strong>Copyright &copy; 2024 <a href="#">XPHID</a>.</strong>
    Made with Love. All rights reserved.
</footer>

</div>


</body>
</html>


</div>
    