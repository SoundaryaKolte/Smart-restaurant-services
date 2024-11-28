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

// Insert order into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $table_number = $_POST['table_number'];
    $menu_item = $_POST['menu_item'];
    $quantity = $_POST['quantity'];

    // Get item price
    $result = $conn->query("SELECT price FROM menu WHERE id = $menu_item");
    $item = $result->fetch_assoc();
    $total_price = $item['price'] * $quantity;

    // Insert into orders table
    $conn->query("INSERT INTO orders (customer_name, table_number, total_price) 
                  VALUES ('$customer_name', $table_number, $total_price)");

    echo "Order placed successfully!";
}
?>
