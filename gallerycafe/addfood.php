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
    <script>
      function validateForm() {
        var fid = document.forms["foodForm"]["fid"].value;
        var fname = document.forms["foodForm"]["fname"].value;
        var price = document.forms["foodForm"]["price"].value;
        var cuisine = document.forms["foodForm"]["cuisine"].value;
        var des = document.forms["foodForm"]["des"].value;
        var file = document.forms["foodForm"]["uploadfile"].value;
        
        if (fid == "" || isNaN(fid)) {
          alert("Food Id must be a number and cannot be empty");
          return false;
        }
        if (fname == "") {
          alert("Food Name cannot be empty");
          return false;
        }
        if (price == "" || isNaN(price)) {
          alert("Food Price must be a number and cannot be empty");
          return false;
        }
        if (des == "") {
          alert("Food cuisine cannot be empty");
          return false;
        }
        if (des == "") {
          alert("Food Description cannot be empty");
          return false;
        }
        if (file == "") {
          alert("Please select a file to upload");
          return false;
        }
        return true;
      }
    </script>

      <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
      </script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="adminhome.php"><img src="images/food.png" alt="Food logo"></a>
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
            <a class="nav-link" href="adminlogout.php"><h3>Logout</h3></a>
          </li>
        </ul>
        <form class="d-flex">
          <h3 style="color:white; font-family:'Courier New'">Welcome to Gallery Cafe</h3>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="text-center mt-5">
      <h1 style="color:white; background-color:black;">Add Food Items</h1>
    </div>
    <div class="row">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
          <div class="card-body bg-light">
            <div class="container">
              <form id="contact-form" name="foodForm" role="form" method="POST" action="addfood1.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="controls">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label for="form_id">Food Id</label> 
                        <input id="form_id" type="text" name="fid" class="form-control" placeholder="Please enter The Food Id" required="required"> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label for="form_name">Food Name</label> 
                        <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter The Food Name" required="required"> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label for="form_price">Food Price</label> 
                        <input id="form_price" type="text" name="price" class="form-control" placeholder="Please enter The Food Price" required="required"> 
                      </div>
                    </div>
                  <div class="col-md-6">
                      <div class="form-group"> 
                        <label for="form_price">Food cuisine</label> 
                        <input id="form_price" type="text" name="cuisine" class="form-control" placeholder="Please enter The Food cuisine" required="required"> 
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group"> 
                        <label for="form_message">Food Description</label> 
                        <textarea id="form_message" name="des" class="form-control" placeholder="Please enter The Food Description" rows="4" required="required"></textarea> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                        <label for="form_file">Add Food Image</label> 
                        <input id="form_file" type="file" name="uploadfile" class="form-control" placeholder="Food Image" required="required"> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12"> 
                    <input type="submit" class="btn btn-success btn-send pt-2 btn-block" name="upload" value="Add Food"> 
                  </div>
                  <button class="btn btn-primary mt-3" style="background-color:darkblue, width=10px" onclick="refreshPage()">Refresh Page</button>
                  <script>
                    function refreshPage() {
                      window.location.reload();
                    }
                  </script>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h1 style="text-align:center; color:white; background-color:black;">All the food details</h1>

  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Food Name</th>
        <th scope="col">Food Price</th>
        <th scope="col">Food Id</th>
        <th scope="col">Food Cuisine</th>
        <th scope="col">Food Description</th>
        <th scope="col">Food img</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include 'dpconnec.php';
        $sql = "SELECT * FROM items";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['id'];
      ?>
      <tr>
        <td><?php echo $row['titel'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['cuisine'] ?></td>
        <td><?php echo $row['details'] ?></td>
        <td><?php echo $row['img'] ?></td>
        <td><a href='edit.php?id=<?php echo $id ?>'><button type='button' class='btn btn-success'>Edit</button></a></td>
        <td><a href='delet.php?id=<?php echo $id ?>'><button type='button' class='btn btn-success' onclick="return confirmDelete()">Delete</button></a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- Optional JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
