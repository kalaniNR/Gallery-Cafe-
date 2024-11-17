<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: singin.php");
    exit;
}

$code = $_SESSION['code'];
$username = $_SESSION['em'];
$z = $_SESSION['p'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userCode = $_POST['code'];
    $userCodeInt = (int)$userCode;
    $sessionCodeInt = (int)$code;

    if ($userCodeInt === $sessionCodeInt) {
        $db = mysqli_connect("localhost", "root", "", "food");
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM `save` WHERE email='$username'";
        $result = mysqli_query($db, $sql);
        
        if ($result) {
            $row = mysqli_fetch_array($result);
            $pre = $row['amount'];
            $in = (int)$pre;

            if ($in >= $z) {
                $newBalance = $in - $z;
                $sqlUpdate = "UPDATE `save` SET `amount`='$newBalance' WHERE `email`='$username'";
                if (mysqli_query($db, $sqlUpdate)) {
                    $to_email = $username;
                    $subject = "Gallery Cafe Payment Done";
                    $body = "Your new balance is " . $newBalance;
                    $headers = "From: gallerycafe@gmail.com";
                    
                    if (mail($to_email, $subject, $body, $headers)) {
                        echo '<script>alert("Payment is complete. An email has been sent.")</script>';
                    } else {
                        echo '<script>alert("Payment is complete. However, email sending failed.")</script>';
                    }
                    include 'cashdel.php';
                } else {
                    echo '<script>alert("Failed to update the balance in the database.")</script>';
                }
            } else {
                echo '<script>alert("Insufficient balance.")</script>';
            }
        } else {
            echo '<script>alert("User not found.")</script>';
        }

        mysqli_close($db);
    } else {
        echo '<script>alert("Code is incorrect.")</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Code</title>
</head>
<body>
<div class="row">
    <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
                <div class="container">
                    <form id="contact-form" role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Enter Your Code</label>
                                        <input id="form_name" type="text" name="code" class="form-control" placeholder="Please enter your code" required="required" data-error="Code is required.">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block" name="upload" value="Payment">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="text-align:center;">
            <a href="home.php"><input type="button" class="btn btn-success btn-send pt-2 btn-block" value="Home"></a>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
