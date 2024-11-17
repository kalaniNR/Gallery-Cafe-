<?php
session_start();
$username = $_SESSION['username'];

if (!$username) {
    header("location: adminlogin.php");
    exit;
}

// Database connection
$db = mysqli_connect("localhost", "root", "", "food");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Functions to get totals
function getTotal($db, $table) {
    $sql = "SELECT COUNT(*) as total FROM `$table`";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function getTotalMoney($db) {
    $sql = "SELECT price, paidprice FROM `orders`";
    $result = mysqli_query($db, $sql);
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $total += $row['price'] + (int)$row['paidprice'];
    }
    return $total;
}

$sum = getTotal($db, 'contacts');
$usum = getTotal($db, 'userinfo');
$osum = getTotal($db, 'orders');
$bsum = getTotal($db, 'bookinginfo');
$isum = getTotal($db, 'items');
$tosum = getTotalMoney($db);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Home</title>
    <style>
      body {
        background-color: black;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="adminhome.php"><img src="images/food.png" alt="Gallery Cafe"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="adminhome.php"><h3>Home</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addfood.php"><h3>Menu</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php"><h3>Orders</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tablebooking.php"><h3>Booking</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admincontact.php"><h3>Contact</h3></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php"><h3>Logout</h3></a>
            </li>
          </ul>
          <form class="d-flex">
            <h3>Welcome Gallery Cafe</h3>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Contact</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Contacts</p>
                <h4 class="mb-0"><?php echo $sum; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Users</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo $usum; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Orders</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Orders</p>
                <h4 class="mb-0"><?php echo $osum; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Table Booking</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Booking Table</p>
                <h4 class="mb-0"><?php echo $bsum; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Menus</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Menus</p>
                <h4 class="mb-0"><?php echo $isum; ?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Money</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Money</p>
                <h4 class="mb-0"><?php echo $tosum; ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
