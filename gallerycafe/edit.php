<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
    <title>Admin Menu</title>
  </head>
  <body>

  <?php
  $id = $_GET['id'];
  $db = mysqli_connect("localhost", "root", "", "food");

  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $foodid = "";
  $foodname = "";
  $foodprice = "";
  $foodcuisine = "";
  $fooddis = "";
  $foodimg = "";

  $sql = "SELECT * FROM items WHERE id=$id";
  $res = mysqli_query($db, $sql);

  if ($res && mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
      $foodid = $row['id'];
      $foodname = $row['titel'];
      $foodprice = $row['price'];
      $foodcuisine = $row['cuisine'];
      $fooddis = $row['details'];
      $foodimg = $row['img'];
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
   <a class="navbar-brand" href="adminhome.php"><img src="images/food.png" alt="Store Logo"></a>
    
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
            <form id="contact-form" role="form" method="POST" enctype="multipart/form-data">
              <div class="controls">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Food Id</label>
                      <input value="<?php echo htmlspecialchars($foodid); ?>" id="form_id" type="text" name="fid" class="form-control" placeholder="Enter food Id" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Food Name</label>
                      <input value="<?php echo htmlspecialchars($foodname); ?>" id="form_name" type="text" name="fname" class="form-control" placeholder="Enter food name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_price">Food Price</label>
                      <input value="<?php echo htmlspecialchars($foodprice); ?>" id="form_price" type="text" name="price" class="form-control" placeholder="Enter food price" required>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_name">Food Cuisine</label>
                      <input value="<?php echo htmlspecialchars($foodcuisine); ?>" id="form_cuisine" type="text" name="cuisine" class="form-control" placeholder="Enter food cuisine" required>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="form_description">Food Description</label>
                      <textarea id="form_description" name="des" class="form-control" placeholder="Enter food description" rows="4" required><?php echo htmlspecialchars($fooddis); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img src="<?php echo htmlspecialchars($foodimg); ?>" alt="Food Image" width="161" height="162"/>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_image">Add Food Image</label>
                      <input id="form_image" type="file" name="uploadfile" class="form-control" placeholder="Upload new image">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block" name="upload" value="Edit Food">
                  </div>
                </div>
              </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $foodid = $_POST["fid"];
                $foodname = $_POST["fname"];
                $foodprice = $_POST["price"];
                $foodcuisine = $_POST["cuisine"];
                $fooddis = $_POST["des"];
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];

                if ($filename) {
                    $folder = "images/" . $filename;
                } else {
                    $folder = $foodimg;
                }

                $sql = "UPDATE items SET img='$folder', price='$foodprice',cuisine='$foodcuisine', details='$fooddis', titel='$foodname' WHERE id='$foodid'";

                if (mysqli_query($db, $sql)) {
                    if ($filename && move_uploaded_file($tempname, $folder)) {
                        echo "<div class='alert alert-success'>Image uploaded successfully</div>";
                    } elseif (!$filename) {
                        echo "<div class='alert alert-success'>Food item updated successfully</div>";
                    } else {
                        echo "<div class='alert alert-warning'>Failed to upload new image</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($db) . "</div>";
                }
            }
            mysqli_close($db);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
