<?php 
session_start(); // Start the session
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $selected = !empty($_POST['booking']) ? $_POST['booking'] : null;
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($date) || empty($selected) || empty($message)) {
        die("All fields are required.");
    }

    $dbsz = mysqli_connect("localhost", "root", "", "food");

    if (!$dbsz) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $si = "INSERT INTO bookinginfo (name, email, date, service, massage) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($dbsz, $si);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $date, $selected, $message);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['booking_confirmed'] = true;
        } else {
            die("Error inserting data: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    } else {
        die("SQL statement preparation failed: " . mysqli_error($dbsz));
    }

    mysqli_close($dbsz);

    header("Location: home.php");
    exit();
}
?>
