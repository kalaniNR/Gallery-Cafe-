<?php
$ok = false;
$exists = false;
$exists1 = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'dpconnec.php';
  $name = $_POST["firstname"];
  $lname = $_POST["lastname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];


  $existSql = "SELECT * FROM userinfo WHERE email = '$email'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $exists = true;
  } else {
    if ($password == $cpassword) {
      $usid = (rand(10, 100));
      $sql = "INSERT INTO userinfo (userid, fastname, lastname, email, phone, address, password, cpassword)
                    VALUES ('$usid', '$name', '$lname', '$email', '$phone', '$address', '$password', '$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $ok = true;
      }
    } else {
      $exists1 = true;
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/logo1.png">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/uf-style.css">
  <title>Register Form Gallery Cafe</title>
</head>
<style>
  body {
    background-color: #2c3e50;
  }

  .uf-form-signin {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ecf0f1;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }

  .uf-form-signin h1 {
    color: #34495e;
  }

  .form-check-label {
    color: #7f8c8d;
  }

  .btn-uf-btn-primary {
    background-color: #2980b9;
    border-color: #2980b9;
    color: white;
  }

  .btn-uf-btn-primary:hover {
    background-color: #3498db;
    border-color: #3498db;
  }

  .input-group-text {
    background-color: #34495e;
    color: white;
  }

  a {
    color: #2980b9;
  }

  a:hover {
    color: #3498db;
  }

  .text-white {
    color: #34495e;
  }

  .alert {
    background-color: #e74c3c;
    color: white;
  }

  .uf-social-ic {
    color: #34495e;
  }

  .uf-social-ic:hover {
    color: #2980b9;
  }
</style>

<body>

  <div class="uf-form-signin">
    <div class="text-center">
      <a href="index.php"><img src="images/padlock.png" alt="" width="100" height="100"></a>
      <h1 class="text-black h3">Account Register</h1>
    </div>
    <form class="mt-4" action="" method="POST">
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-user" style="color: black;"></span>
        <input type="text" class="form-control" placeholder="Your First Name" id="name" name="firstname" required>
      </div>

      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-user" style="color: black;"></span>
        <input type="text" class="form-control" placeholder="Your Last Name" id="name" name="lastname" required>
      </div>

      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-envelope" style="color: black;"></span>
        <input type="text" class="form-control" placeholder="Email address" id="email" name="email" required>
      </div>
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-phone" style="color: black;"></span>
        <input type="text" class="form-control" placeholder="Your phone" id="phone" name="phone" required>
      </div>

      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-address-book" style="color: black;"></span>
        <input type="text" class="form-control" placeholder="Your Address" id="phone" name="address" required>
      </div>

      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-lock" style="color: black;"></span>
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
      </div>
      <div class="input-group uf-input-group input-group-lg mb-3">
        <span class="input-group-text fa fa-lock" style="color: black;"></span>
        <input type="password" class="form-control" placeholder="Password confirmation" id="cpassword" name="cpassword"
          required>
      </div>
      <div class="d-grid mb-4">
        <button type="submit" class="btn uf-btn-primary btn-lg" style="background-color: darkblue;">Sign Up</button>
      </div>
      <div class="mt-4 text-center">
        <span class="text-black">Already a member?</span>
        <a href="singin.php">Login</a>
      </div>
      <?php
      if ($exists) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Email Already Exists</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
      }
      if ($ok) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Account is created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';

        echo '<script>
        setTimeout(function() {
            window.location.href = "singin.php";
        }, 3000); // 3000ms = 3 seconds
        </script>';
      }
      if ($exists1) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Not Success!</strong> Your Account is Not created.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
          </div>';
      }
      ?>
    </form>
  </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>