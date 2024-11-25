<?php
// Database connection
require_once 'dbconnection.php';

// Validate and sanitize product ID
if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid product ID";
}

$conn->close();
header("Location: admin_dashboard.php");
exit;
?>
