<?php
session_start();
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($username == "admin" && $password == "123") {
        $_SESSION['username'] = $username;
        $_SESSION['login_success'] = true; // Set session variable for login success
        header("Location: adminhome.php");
        exit(); 
    } else {
        $showError = true;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo1.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
    <title>Login Form Gallery Cafe</title>
</head>
<style>
    body {
        background-color: #2c3e50; /* Dark navy background */
    }
    .uf-form-signin {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ecf0f1; /* Light grey background for the form */
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
    }
    .uf-form-signin h1 {
        color: #34495e; /* Deep grey heading color */
    }
    .form-check-label {
        color: #7f8c8d; /* Soft grey for labels */
    }
    .btn-uf-btn-primary {
        background-color: #2980b9; /* Bright blue for the button */
        border-color: #2980b9;
        color: white;
    }
    .btn-uf-btn-primary:hover {
        background-color: #3498db; /* Lighter blue for hover */
        border-color: #3498db;
    }
    .input-group-text {
        background-color: #34495e; /* Deep grey input group icon background */
        color: white;
    }
    a {
        color: #2980b9; /* Blue link color */
    }
    a:hover {
        color: #3498db; /* Lighter blue on hover */
    }
    .text-white {
        color: #34495e; /* Make headings soft grey instead of white */
    }
    .alert {
        background-color: #e74c3c; /* Red for error messages */
        color: white;
    }
    .uf-social-ic {
        color: #34495e; /* Grey for social icons */
    }
    .uf-social-ic:hover {
        color: #2980b9; /* Blue for hover on social icons */
    }
</style>
<body>
<div class="uf-form-signin">
    <div class="text-center">
        <a href="index.php"><img src="images/padlock.png" alt="" width="100" height="100"></a>
        <h1 class="text-black h3">Admin Login</h1>
    </div>
    <form class="mt-4" action="" method="POST">
        <div class="input-group uf-input-group input-group-lg mb-3">
            <span class="input-group-text fa fa-user" style="color: black;"></span>
            <input type="text" class="form-control" placeholder="Username or Email address" id="email" name="email">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
            <span class="input-group-text fa fa-lock" style="color: black;"></span>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        </div>
        <div class="d-flex mb-3 justify-content-between">
            <div class="form-check">
                <input type="checkbox" class="form-check-input uf-form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label text-black" for="exampleCheck1">Remember Me</label>
            </div>
        </div>
        <div class="d-grid mb-4">
            <button type="submit" class="btn uf-btn-primary btn-lg" style="background-color: darkblue;">Login</button>
        </div>
        <?php
        if ($showError) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Email or Password are Wrong</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
        
        // Show login success alert
        if (isset($_SESSION['login_success'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Login Successful</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            unset($_SESSION['login_success']); // Remove the session variable after displaying the alert
        }
        ?>
    </form>
</div>

<!-- JavaScript -->
<!-- Separate Popper and Bootstrap JS -->
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>
