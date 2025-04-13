<?php
include("controllers/Login.php");
include("lib/functions.php");
$obj = new LoginController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    
    if ($password === $confirmpassword) {
        $dat = $obj->addUsers($username, $nama, $password);
        $msg = getJSON($dat);
    } else {
        $msg = "no";
    }
}
$theme = setTheme();
getHeaderLogin($theme);
?>

<style>
:root {
    --primary-blue: #89CFF0;
    --secondary-blue: #A7C7E7;
    --light-blue: #F0F8FF;
    --text-color: #2B547E;
}

.custom-container {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--light-blue) 0%, var(--secondary-blue) 100%);
    padding: 20px;
}

.custom-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    width: 100%;
    max-width: 450px;
    border: none;
}

.form-title {
    color: var(--text-color);
    font-weight: 600;
    margin-bottom: 1.5rem;
    font-size: 1.8rem;
}

.custom-form-group {
    margin-bottom: 1.2rem;
}

.custom-form-group label {
    color: var(--text-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.custom-input {
    border: 2px solid var(--secondary-blue);
    border-radius: 8px;
    padding: 0.8rem;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 0.2rem rgba(137, 207, 240, 0.25);
}

.custom-btn {
    background-color: var(--primary-blue);
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    padding: 0.8rem;
    transition: all 0.3s ease;
    margin-top: 1rem;
}

.custom-btn:hover {
    background-color: var(--secondary-blue);
    transform: translateY(-2px);
}

.custom-alert {
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1.5rem;
}
</style>

<div class="custom-container d-flex justify-content-center align-items-center">
    <div class="custom-card">
        <h4 class="form-title text-center">Register</h4>
        <?php 
            if ($msg === true) { 
                echo '<div class="custom-alert alert alert-success" id="message_success">
                        <i class="fas fa-check-circle me-2"></i>Register Success
                      </div>';
                echo '<meta http-equiv="refresh" content="1;url=' . base_url() . 'index.php">';
            } elseif ($msg === false) {
                echo '<div class="custom-alert alert alert-danger" id="message_error">
                        <i class="fas fa-exclamation-circle me-2"></i>Register Gagal
                      </div>'; 
            } elseif ($msg === "no") {
                echo '<div class="custom-alert alert alert-danger" id="message_error">
                        <i class="fas fa-exclamation-circle me-2"></i>Password dan Confirm password harus sama
                      </div>';
            }
        ?>
        <form id="login-form" method="POST">
            <div class="custom-form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control custom-input" id="nama" name="nama" required>
            </div>
            <div class="custom-form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control custom-input" id="username" name="username" required>
            </div>
            <div class="custom-form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control custom-input" id="password" name="password" required>
            </div>
            <div class="custom-form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" class="form-control custom-input" id="confirmpassword" name="confirmpassword" required>
            </div>
            <button type="submit" class="custom-btn btn-block w-100">Register</button>
        </form>
    </div>
</div>

<?php
getFooterLogin($theme, '');
?>