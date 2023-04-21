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

/* RETREIVE DATE FROM THE ADD CUSTOMER PAGE USING $_POST */
$email = $_POST['email'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$street = $_POST['street'];
$unit = $_POST['unit'];
$city = $_POST['city'];
$postalcode = $_POST['postalcode'];

/* INSET DATA INTO CUSTOMER TABLE USING PDO PREPARED STAMENTS */
$stmt = $conn->prepare("INSERT INTO customer (firstName, lastName, phoneNum, email, street, city, postalCode) VALUES (:firstName, :lastName, :phoneNum, :email, :street, :city, :postalCode)");
$stmt->bindParam(':firstName', $fname);
$stmt->bindParam(':lastName', $lname);
$stmt->bindParam(':phoneNum', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':street', $street);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':postalCode', $postalcode);
$stmt->execute();

// $sql = "INSERT INTO employee (email, phone, fname, lname, street, unit, city, postalcode)
// VALUES ('$email', '$phone', '$fname', '$lname', '$street', '$unit', '$city', '$postalcode')";

// if ($conn->query($sql) === TRUE) {
//     echo "New customer added successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


/* CLOSE DATABASE CONNECTION */
$conn = null;



?>