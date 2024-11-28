<?php
$host = 'localhost';
$db = 'restaurant';
$user = 'root';
$pass = '';

// Connect to MySQL database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert reservation into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $contact = $_POST['contact'];
    $reservation_time = $_POST['reservation_time'];
    $table_number = $_POST['table_number'];

    $conn->query("INSERT INTO reservations (customer_name, contact, reservation_time, table_number) 
                  VALUES ('$customer_name', '$contact', '$reservation_time', $table_number)");

    echo "Reservation made successfully!";
}
?>
