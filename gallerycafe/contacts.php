<?php
session_start();

// Redirect if the session 'email' is not set
if (!isset($_SESSION['email'])) {
    header("location: signin.php");
    exit;
}

// Display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Contacts</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<div class="preloader"></div>
<div class="page">
    <header class="section page-header">
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-modern">
                <div class="rd-navbar-inner-outer">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <div class="rd-navbar-brand"><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/food1lofo2.png" alt="" width="198" height="66"/></a></div>
                        </div>
                        <div class="rd-navbar-right rd-navbar-nav-wrap">
                            <div class="rd-navbar-aside">
                                <ul class="rd-navbar-contacts-2">
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="fa-solid fa-user"></span></div>
                                            <div class="unit-body">
                                                <a class="account" href="">
                                                    <?php
                                                    $sakib = $_SESSION['email'];
                                                    include 'dpconnec.php';
                                                    $sql = "SELECT * FROM userinfo WHERE email='$sakib'";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo $row['fastname'] . " " . $row['lastname'];
                                                        $myid = $row['userid'];
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                    $number = 0;
                                    $db = mysqli_connect("localhost", "root", "", "food");
                                    $sql = "SELECT * FROM cart WHERE userid='$myid'";
                                    $result = mysqli_query($db, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $number++;
                                    }
                                    ?>
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="fa-solid fa-phone"></span></div>
                                            <div class="unit-body"><a class="phone" href="tel:#">0741042068</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="rd-navbar-main">
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="home.php">Home</a></li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="new.php"><span class="fas fa-shopping-cart"></span><sup><?php echo $number; ?></sup></a></li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="contacts.php">Contacts</a></li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="userorder.php">Order</a></li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title" style="color:black;">Contacts</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/kal.jpg);"></div>
        </div>
    </section>

    <section class="section section-lg bg-default text-md-left">
        <div class="container">
            <div class="row row-60 justify-content-center">
                <div class="col-lg-8">
                    <h4 class="text-spacing-25 text-transform-none">Get in Touch</h4>
                    <form class="rd-form rd-mailform" action="contacts.php" method="post">
                        <div class="row row-20 gutters-20">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required" required>
                                    <label class="form-label" for="contact-your-name-5">Your Name*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required" required>
                                    <label class="form-label" for="contact-email-5">Your E-mail*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <input class="form-input" id="contact-phone-5" type="text" name="phone" data-constraints="@Numeric" required>
                                    <label class="form-label" for="contact-phone-5">Your Phone*</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-message-5">Message</label>
                                    <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="button button-secondary button-winona" type="submit">Contact us</button>
                    </form>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];

                        $conn = mysqli_connect("localhost", "root", "", "food");

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "INSERT INTO contacts (name, email, phone, massage) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);

                        if (mysqli_stmt_execute($stmt)) {
                            echo "alert(Message sent successfully)";
                        } else {
                            echo "<p>Error: " . mysqli_error($conn) . "</p>";
                        }

                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="section footer-modern context-dark footer-modern-2">
        <div class="footer-modern-line">
            <div class="container">
                <div class="row row-50">
                    <div class="col-md-6 col-lg-4">
                        <h5 class="footer-modern-title">What We Offer</h5>
                        <ul class="footer-modern-list">
                            <li><a href="#">Pizzas</a></li>
                            <li><a href="#">Burgers</a></li>
                            <li><a href="#">Salads</a></li>
                            <li><a href="#">Drinks</a></li>
                            <li><a href="#">Seafood</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h5 class="footer-modern-title">Information</h5>
                        <ul class="footer-modern-list">
                            <li><a href="#">Latest News</a></li>
                            <li><a href="#">Our Menu</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Order Online</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-xl-5">
                        <h5 class="footer-modern-title">Contacts</h5>
                        <ul class="footer-modern-contacts">
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa-solid fa-phone"></span></div>
                                    <div class="unit-body"><a class="phone" href="tel:#">0741042068</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="unit unit-spacing-xs">
                                    <div class="unit-left"><span class="icon fa-solid fa-envelope"></span></div>
                                    <div class="unit-body"><a class="email" href="mailto:#">gallerycafe@gmail.com</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- JavaScripts-->
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>