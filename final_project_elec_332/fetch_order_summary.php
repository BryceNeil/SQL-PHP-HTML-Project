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
    $sql = "SELECT customer.firstName, customer.lastName, orders.item, orders.price, orders.tip, deliveryPerson.lastInitial
        FROM orders
        JOIN customer ON orders.customerName = customer.email
        JOIN deliveryPerson ON orders.delivery = deliveryPerson.id
        WHERE orders.orderDate = :date";


    
    // Prepare a SQL statement to count orders for the specified day
    // $stmt = $conn->prepare($sql);
    $stmt = $conn->prepare("SELECT customer.firstName, customer.lastName, orders.item, orders.price, orders.tip, employee.lastInitial
    FROM orders
    JOIN customer ON orders.customerName = customer.email
    JOIN deliveryPerson ON orders.delivery = deliveryPerson.id
    JOIN employee ON deliveryPerson.id = employee.id
    WHERE orders.orderDate = :date");


    $stmt->bindParam(":date", $date);
    $stmt->execute();

    // Fetch all the rows from the result set into an array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //echo ($rows);
    // Check if the array is not empty
    if (!empty($rows)) {
        echo "<table>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Item</th><th>Price</th><th>Tip</th><th>Delivery Person</th></tr>";
        foreach ($rows as $row) {
            echo "<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td><td>" . $row['item'] . "</td><td>" . $row['price'] . "</td><td>" . $row['tip'] . "</td><td>" . $row['lastInitial'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No orders found for the specified date.";
    }
}
    

// Close connection
$conn = null;
?>
