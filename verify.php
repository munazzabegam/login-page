<?php

include ("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM login WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
        header("Location: home.php");
    } else {
        echo "Incorrect username or password";
    }
    $conn->close();
}
?>
