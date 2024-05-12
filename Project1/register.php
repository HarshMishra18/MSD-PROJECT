<?php
// Include the database connection file
include('connection.php');

// Initialize variables to hold form data
$name = $email = $password = $cpassword = $number = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


    // Insert data into the database
    $sql = "INSERT INTO signup (name, email, password, confirm_password , number) VALUES ('$name', '$email', '$password', '$cpassword', '$number')";
    if (mysqli_query($conn, $sql)) {
        // Redirect to success page or perform other actions
        header("Location: success.php");
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
