<?php
session_start();
error_reporting(0);
include("controllers/Login.php");
include("lib/functions.php");
$obj = new LoginController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["sandi"];
    $dat = $obj->login_validation($username, $password);
    $msg = getJSON($dat);
}
$theme = setTheme();
getHeaderLogin($theme);
?>

<div class="min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #f0f4ff 0%, #e6f9ff 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-lg rounded-3" style="background-color: #ffffff;">
                    <div class="card-body p-5">
                        <!-- Logo or Brand Name -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-pastel-blue">Welcome Back</h3>
                            <p class="text-muted">Please sign in to continue</p>
                        </div>

                        <?php 
                        if ($msg <> null) { 
                            echo '<div class="alert alert-success border-0 rounded-3 shadow-sm" id="message_success">
                                    <i class="fas fa-check-circle me-2"></i>Login Success
                                  </div>';
                            echo '<meta http-equiv="refresh" content="1;url='.base_url().'index.php">';
                        } elseif ($msg === false) {
                            echo '<div class="alert alert-danger border-0 rounded-3 shadow-sm" id="message_error">
                                    <i class="fas fa-exclamation-circle me-2"></i>Login Gagal
                                  </div>'; 
                        }
                        ?>

                        <form id="login-form" method="POST">
                            <div class="mb-4">
                                <label for="username" class="form-label text-muted small fw-bold">USERNAME</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-transparent">
                                        <i class="fas fa-user text-pastel-blue"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0 ps-0" 
                                           id="username" name="username" required 
                                           placeholder="Enter your username">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="sandi" class="form-label text-muted small fw-bold">PASSWORD</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-transparent">
                                        <i class="fas fa-lock text-pastel-blue"></i>
                                    </span>
                                    <input type="password" class="form-control border-start-0 ps-0" 
                                           id="sandi" name="sandi" required
                                           placeholder="Enter your password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-pastel-blue w-100 py-2 mb-4 rounded-3">
                                Sign In
                            </button>

                            <p class="text-center mb-0">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="register.php" class="text-pastel-blue text-decoration-none ms-1">Sign up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
getFooterLogin($theme, '
<style>
/* Custom Pastel Colors */
.text-pastel-blue {
    color: #89c2d9;
}

.bg-pastel-blue {
    background-color: #89c2d9;
}

.btn-pastel-blue {
    background-color: #89c2d9;
    border-color: #89c2d9;
    color: #ffffff;
}

.btn-pastel-blue:hover {
    background-color: #61a5c2;
    border-color: #61a5c2;
}

/* Form Styling */
.form-control:focus {
    border-color: #89c2d9;
    box-shadow: 0 0 0 0.2rem rgba(137, 194, 217, 0.25);
}

.input-group-text {
    border-right: none;
}

.form-control {
    border-left: none;
}

/* Card Styling */
.card {
    border-radius: 16px;
}

/* Alert Styling */
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

/* Background Gradient */
body {
    background: linear-gradient(135deg, #f0f4ff 0%, #e6f9ff 100%);
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
');
?>