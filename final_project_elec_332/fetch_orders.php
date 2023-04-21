<?php

/* CONNECT TO DB USING PDO */
$servername = "localhost";
$port = '8080/phpmyadmin/i';
$username = "root";
$password = "";
$dbname = "restaurantDB";

try {
    echo "trying";
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Check if a day has been specified in the URL
if (isset($_GET["date"])) {
    $date = $_GET["date"];

    // Prepare a SQL statement to count orders for the specified day
    $stmt = $conn->prepare("SELECT COUNT(*) FROM orders WHERE orderDate = :date");
    $stmt->bindParam(":date", $date);
    $stmt->execute();

    // Fetch the count of orders and display it
    $count = $stmt->fetchColumn();
    echo "There are $count orders on $date";
} else {
    echo "Please specify a day in the URL";
}

// Close connection
$conn = null;
?>
