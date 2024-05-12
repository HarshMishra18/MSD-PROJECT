<?php
// Establish database connection
$db_host = 'localhost';
$db_user = 'Harsh';
$db_password = '1234';
$db_name = 'mishraji';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'number' field is set in the $_POST array
    if(isset($_POST['number'])) {
        $name = $_POST['name'];
        $number = $_POST['number']; // Assuming the 'number' field exists in your form
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // Perform any necessary validation here...

        // Escape user inputs to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $name);
        $number = mysqli_real_escape_string($conn, $number);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $cpassword = mysqli_real_escape_string($conn, $cpassword);

        // Insert data into the database
        $sql = "INSERT INTO signup (name, number, email, password, confirm_password) VALUES ('$name', '$number', '$email', '$password', '$cpassword')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error:  field is not set in the form data.";
    }
}

// Close the database connection
$conn->close();
?>
