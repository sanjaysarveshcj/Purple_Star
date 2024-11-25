<?php
// Database connection
require_once 'dbconnection.php';

// Form data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['product_image'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image'];

    // Handle image upload
    $image_name = time() . '_' . basename($product_image['name']);
    $target_dir = "uploads/";
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($product_image['tmp_name'], $target_file)) {
        // Insert new product into the database
        $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $product_name, $product_price, $image_name);
        if ($stmt->execute()) {
            echo "Product added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}

$conn->close();
header("Location: admin_dashboard.php");
exit;
?>
