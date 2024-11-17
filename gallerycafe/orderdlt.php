<?php

$id=$_GET['id'];
$db = mysqli_connect("localhost", "root", "", "food");
$sql="DELETE FROM `orders` WHERE userid=$id";
$result=mysqli_query($db,$sql);
header("location: userorder.php");

?>