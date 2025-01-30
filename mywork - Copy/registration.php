<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Establish connection
$con = mysqli_connect($server, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get POST data safely
$name = isset($_POST['name']) ? $_POST['name'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$adhaar = isset($_POST['adhaar']) ? $_POST['adhaar'] : null;
$age = isset($_POST['age']) ? $_POST['age'] : null;

// Validate required fields
if ($name && $gender && $phone && $adhaar && $age) {
    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO `waste warrior info`(`name`, `gender`, `phone`, `adhaar`, `age`) VALUES ('$name','$gender','$phone','$adhaar','$age')";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $gender, $adhaar, $phone, $age);
        if (mysqli_stmt_execute($stmt)) {
            echo "Data submitted successfully";
        } else {
            echo "Query execution failed: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement: " . mysqli_error($con);
    }
} else {
    echo "All fields are required.";
}

// Close the connection
mysqli_close($con);
?>
