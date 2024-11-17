<?php
session_start();

if (!isset($_SESSION['code']) || !isset($_SESSION['em']) || !isset($_SESSION['cardnum'])) {
    header("location: singin.php");
    exit();
}

$code = $_SESSION['code'];
$email = $_SESSION['em'];
$cardnum = $_SESSION['cardnum'];
$price = $_SESSION['p'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="text-center mt-5">
        <h1>Payment Receipt</h1>
        <p class="lead">Thank you for your payment!</p>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label>Card Number:</label>
                            <input type="text" class="form-control" value="<?php echo $cardnum; ?>" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label>Total Price:</label>
                            <input type="text" class="form-control" value="<?php echo $price; ?>" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label>Payment Code:</label>
                            <input type="text" class="form-control" value="<?php echo $code; ?>" disabled>
                        </div>
                        <div class="text-center mt-4">
                            <a href="home.php" class="btn btn-primary">Return Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
