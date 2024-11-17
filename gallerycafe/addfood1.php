<?php
error_reporting(0);
?>

<?php
  $msg = "";
  
  
  if (isset($_POST['upload'])){
   
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "images/".$filename;
    $foodname=$_POST["fname"];
    $foodid=$_POST["fid"];
    $foodprice=$_POST["price"];
    $fooddis=$_POST["des"];
    $foodcuisine=$_POST["cuisine"];
        
          
    $db = mysqli_connect("localhost", "root", "", "food");
  
        
        $sql = "INSERT INTO items (id,img,price,cuisine,details,titel) VALUES ('$foodid','$folder','$foodprice','$foodcuisine','$fooddis','$foodname')";
  
       
        if (mysqli_query($db, $sql)) {
            // SQL query executed successfully
            if ($filename && move_uploaded_file($tempname, $folder)) {
                // File uploaded successfully
                echo "<div class='alert-success'>Food item added successfully</div>";
            } else {
                // File upload failed
                echo "<div class='alert alert-warning'>Food item added, but file upload failed</div>";
            }
        } else {
            // SQL query failed
            echo "<div class='alert alert-danger'>Failed to add food item</div>";
        }
        
   $result = mysqli_query($db, "SELECT * FROM food");
   header("location: addfood.php");
}

