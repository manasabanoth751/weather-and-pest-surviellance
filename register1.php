<?php
// Retrieve the form data
$userId = $_POST['userId'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$street = $_POST['street'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

// Database connection parameters
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'farmer';

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO farmer (userId, username, email, password, street, city, pincode)
                            VALUES (:userId, :username, :email, :password, :street, :city, :pincode)");

    // Bind the form data to the prepared statement parameters
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':pincode', $pincode);

    // Execute the prepared statement
    $stmt->execute();

    echo 'Registration successful!';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
