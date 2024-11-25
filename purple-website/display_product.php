<?php
// Include database connection
include('dbconnection.php');

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are any products in the database
if ($result->num_rows > 0) {
    // Loop through the products and display them
    while($row = $result->fetch_assoc()) {
        $productName = $row['name'];
        $productPrice = $row['price'];
        $productImage = $row['image'];

        // Display product details in HTML
        echo '
        <div class="product-item notebooks">
            <div class="product product_filter">
                <div class="product_image">
                    <img src="uploads/' . $productImage . '" alt="' . $productName . '">
                </div>
                <div class="favorite"></div>
                <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                <div class="product_info">
                    <h6 class="product_name"><a href="single.php?product_id=' . $row['id'] . '">' . $productName . '</a></h6>
                    <div class="product_price">$' . number_format($productPrice, 2) . '</div>
                </div>
            </div>
            <div class="red_button add_to_cart_button"><a href="#" onclick="addToCart(\'' . $productName . '\', ' . $productPrice . ')">add to cart</a></div>
        </div>';
    }
} else {
    echo "No products found.";
}

$conn->close();
?>
