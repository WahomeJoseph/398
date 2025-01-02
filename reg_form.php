<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign";

// create connection
$connection  = mysqli_connect($servername, $username, $password, $dbname);
// check connection
if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $project = $_POST['project'];
    $description = $_POST['description'];

    $query = "insert into contact(name, email, phone, project, description) values
    ('$name', '$email', '$phone', '$project', '$description')";

    if (mysqli_query($connection, $query)) {
        header('location: index.php');
        echo "Message sent successfully";
        exit();
    } else {
        echo 'Error: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
