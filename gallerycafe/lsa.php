<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['price'])) {
    header("location: singin.php");
}

$hi = $_SESSION['price'];
$int = (int)$hi;
$x = $int * 0.2;
$z = (int)($int - $x);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta and Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Online Payment</title>
    
    <script>
    function validateForm() {
        var cardnum = document.forms["paymentForm"]["cardnum"].value;
        var email = document.forms["paymentForm"]["email"].value;
        var password = document.forms["paymentForm"]["password"].value;

        var cardnumPattern = /^[0-9]{16}$/;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (!cardnumPattern.test(cardnum)) {
            alert("Please enter a valid 16-digit card number.");
            return false;
        }

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (password == "") {
            alert("Password is required.");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
<div class="container">
    <div class="text-center mt-5">
        <h1>Payment</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <form method="POST" enctype="multipart/form-data" name="paymentForm" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank Card Number</label>
                                    <input type="text" name="cardnum" class="form-control" placeholder="Please enter Your Card Number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Please enter Your email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Please enter password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Total Price</label>
                                    <input value="<?php echo $z; ?>" type="text" disabled class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-block" name="upload" value="Payment">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="home.php" class="btn btn-success">Home</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = rand(1000, 10000);
    $_SESSION['code'] = $code;
    $_SESSION['p'] = $z;

    $db = mysqli_connect("localhost", "root", "", "food");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    $cname = mysqli_real_escape_string($db, $_POST['cardnum']);
    $maskedCardNum = substr($cname, 0, 4) . str_repeat('*', 8) . substr($cname, -4);
    $_SESSION['cardnum'] = $maskedCardNum;

    $sql = "SELECT * FROM `save` WHERE email='$username' AND accountnum='$cname'";
    $result = mysqli_query($db, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Email sending simulation (for now)
            echo "Mail would be sent here with code: $code";
            // Uncomment for actual mail functionality
            /*
            $to_email = $username;
            $subject = "Gallery Cafe Payment Code";
            $body = "Your code is: " . $code;
            $headers = "From: gallerycafe@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                echo "<script> location.href='receipt.php'; </script>";
            } else {
                echo "Email sending failed...";
            }
            */
        } else {
            echo "Invalid email or card number.";
        }
    } else {
        echo "Error: " . mysqli_error($db);
    }

    mysqli_close($db);
}
?>
