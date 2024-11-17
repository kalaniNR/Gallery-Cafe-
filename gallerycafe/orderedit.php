<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
    <title>Admin order</title>
  </head>
  <body>

  <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "food");

  // Check if the id parameter is set
  if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * from orders WHERE id=$id";
      $res = mysqli_query($db, $sql);

      // Fetch order details
      while($row = mysqli_fetch_array($res)){
          $sta = $row['state'];
          $int = (int)$row['paidprice'];
          $pri = $row['price'] + $int;
          $item = $row['foodname'];
      }
  }

  // Update the order state if the form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['des'])) {
      $newState = $_POST['des'];
      $sql = "UPDATE orders SET state='$newState' WHERE id=$id";
      if (mysqli_query($db, $sql)) {
          // Redirect to the same page with a success flag
          header("Location: ".$_SERVER['PHP_SELF']."?id=".$id."&success=1");
          exit;
      }
  }

  // Check if there is a success flag in the URL
  $success = isset($_GET['success']) ? $_GET['success'] : 0;
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="adminhome.php"><img src="images/food.png" alt="Girl in a jacket"></a>
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
            <a class="nav-link" href="adminlogout.php"><h3>Logout</h3></a>
          </li>
        </ul>
        <form class="d-flex">
          <h3>Welcome Gallery Cafe</h3>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="text-center mt-5">
      <h1>Edit Food Item</h1>
    </div>
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
                        <label for="form_name">Food Name: <?php echo $item; ?></label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname">Food Price: <?php echo $pri; ?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="form_message">Food States</label>
                        <input value="<?php echo $sta; ?>" id="form_message" name="des" class="form-control" rows="4" data-error="Please, leave us a message.">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send pt-2 btn-block" name="upload" value="Edit Food">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> <!-- /.8 -->
      </div> <!-- /.row-->
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Display success alert if the update was successful -->
  <?php if ($success) : ?>
  <script>
    alert('Order Edit successfully!');
  </script>
  <?php endif; ?>

  </body>
</html>
