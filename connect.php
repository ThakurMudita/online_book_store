<?php
// Establish MySQL connection
$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = md5($password);

    // Prepare a SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
    $result = mysqli_query($conn, $sql);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Login successful
        echo "Login successful!";
        // You can redirect the user to a dashboard page here
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}

// Close the connection
mysqli_close($conn);
?>
