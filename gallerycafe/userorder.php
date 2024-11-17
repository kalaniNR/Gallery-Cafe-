<?php
session_start();

// Redirect if not logged in
if(!isset($_SESSION['email'])){
    header("location: signin.php"); // Corrected from 'singin.php' to 'signin.php'
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/logo1.png" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div class="preloader">
        <div class="wrapper-triangle"></div>
    </div>
    <div class="page">
        <!-- Page Header-->
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner-outer">
                        <div class="rd-navbar-inner">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand"><a class="brand" href="home.php"><img class="brand-logo-dark" src="images/food1lofo2.png" alt="" width="17" height="6"/></a></div>
                            </div>
                            <div class="rd-navbar-right rd-navbar-nav-wrap">
                                <div class="rd-navbar-aside">
                                    <ul class="rd-navbar-contacts-2">
                                        <li>
                                            <div class="unit unit-spacing-xs">
                                                <div class="unit-left"><span class="fa-solid fa-user"></span></div>
                                                <div class="unit-body">
                                                    <a class="account" href="#">
                                                        <?php
                                                        $sakib = $_SESSION['email'];
                                                        include 'dpconnec.php';
                                                        $sql = "SELECT * FROM userinfo WHERE email='$sakib'";
                                                        $result = mysqli_query($conn, $sql);

                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo " ";
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
                                        $sql = "SELECT * FROM `cart` WHERE userid='$myid'";
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
                                        <li>
                                            <div class="unit unit-spacing-xs">
                                                
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </div>
                                <div class="rd-navbar-main">
                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="home.php">Home</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="new.php"><span class="fas fa-shopping-cart"></span><sup><?php echo $number; ?></sup> </a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.php">Contacts</a></li>
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="userorder.php">Order</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Food Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Paid Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = mysqli_connect("localhost", "root", "", "food");
                $sql = "SELECT * FROM `orders` WHERE id='$myid'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['foodname']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['paidprice']; ?></td>
                        <?php if($row['state'] == "Cooking") { ?>
                            <td><a href='orderdlt.php?id=<?php echo $id; ?>'><button type='button' class='btn btn-success'>Cancel</button></a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Page Footer-->
        <footer class="section footer-modern context-dark footer-modern-2">
            <div class="footer-modern-line">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-md-12 col-lg-4">
                            <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">What We Offer</span></h5>
                            <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                                <li><a href="#">Pizzas</a></li>
                                <li><a href="#">Burgers</a></li>
                                <li><a href="#">Salads</a></li>
                                <li><a href="#">Drinks</a></li>
                                <li><a href="#">Seafood</a></li>
                                <li><a href="#">Drinks</a></li>
                            </ul>
                        </div>

                        <div class="col-md-12 col-lg-4 col-xl-3">
                            <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Information</span></h5>
                            <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                                <li><a href="#">Latest News</a></li>
                                <li><a href="#">Our Menu</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="contacts.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
