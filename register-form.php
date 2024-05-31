<?php
// Check if all required fields are present
if(isset($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'register-form');
    if($conn->connect_error) {
        die("Connection Failed : ".$conn->connect_error);
    } else {
        // Prepare and execute the query

        $stmt = $conn->prepare("INSERT INTO signup(name, email, pass, re_pass) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $pass, $re_pass);
        if ($stmt->execute()) {
            echo "Signuped successful...";
        } else {
            echo "Error: " .$stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Please fill in all required fields.";
}
?>