<?php
session_start(); // Start session at the beginning

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dpconnec.php'; // Ensure dpconnec.php contains your database connection logic

    // Sanitize user inputs (better to use prepared statements for security)
    $username = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM userinfo WHERE email='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $username;
            header("location: home.php"); // Redirect upon successful login
        } else {
            $showError = true;
        }
    } else {
        // Error in query execution
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close database connection
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo1.png">
    <title>Login Form Gallery Cafe</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/uf-style.css">
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
    .form-control:focus{
        border: 3px solid black;
    }
    .form-control{
        transition: ease-in 0.1s;
    }
</style>
<body onload="getLocation();">
<div class="uf-form-signin">
    <div class="text-center">
        <a href="index.php"><img src="images/padlock.png" alt="" width="100" height="100"></a>
        <h1 class="h3">User Login</h1>
    </div>
    <form class="sakib" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
        <div class="input-group uf-input-group input-group-lg mb-3">
            <span class="input-group-text fa fa-user" style="color: black;"></span>
            <input type="text" class="form-control" placeholder="Username or Email address" id="email" name="email" required>
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
            <span class="input-group-text fa fa-lock" style="color: black;"></span>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
        </div>

        <div class="d-flex mb-3 justify-content-between">
            <div class="form-check">
                <input type="checkbox" class="form-check-input uf-form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <a href="#">Forgot password?</a>
        </div>
        <div class="d-grid mb-4">
            <button type="submit" class="btn uf-btn-primary btn-lg" onclick="return validateForm()" style="background-color: darkblue;">Login</button>
        </div>

        <div class="d-flex mb-3">
            <div class="dropdown-divider m-auto w-25"></div>
            <small class="text-nowrap text-grey">Or login with</small>
            <div class="dropdown-divider m-auto w-25"></div>
        </div>
        <div class="uf-social-login d-flex justify-content-center">
            <a href="#" class="uf-social-ic" title="Login with Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="uf-social-ic" title="Login with Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="uf-social-ic" title="Login with Google"><i class="fab fa-google"></i></a>
        </div>
        <div class="mt-4 text-center">
            <span class="text-black">Don't have an account?</span>
            <a href="newid.php" >Sign Up</a>
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
        ?>
    </form>
</div>

<!-- JavaScript -->
<!-- Separate Popper and Bootstrap JS -->
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script>
    function validateForm() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (email.trim() === '' || password.trim() === '') {
            alert('Please enter both email/username and password');
            return false;
        }
        return true;
    }

    // Display success alert if PHP variable is set
    <?php if ($showSuccess): ?>
        alert('Login successful! Redirecting...');
    <?php endif; ?>
</script>
</body>
</html>
