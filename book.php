<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="book">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
</head>

<body>
    <style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
}

button {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

button.btn-primary {
    background-color: #007bff;
    color: #fff;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

button.btn-success {
    background-color: #28a745;
    color: #fff;
}

button.btn-success:hover {
    background-color: #218838;
}

/* Cart Section Styles */
.cart-items-container {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
    background-color: #f8f9fa;
}
.cart-item{
	align-items: center;
    justify-content: space-between;
}
.order-summary {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    background-color: #f8f9fa;
}

.order-summary h4 {
    font-size: 20px;
    margin-bottom: 10px;
}

.product-price, .total-price {
    font-size: 18px;
}

.total-price strong {
    color: #333;
}

/* Booking Section Styles */
#booking1 {
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f8f9fa;
    padding: 20px;
}

form#bookingForm .form-group {
    margin-bottom: 15px;
}

form#bookingForm label {
    font-weight: bold;
}

form#bookingForm input,
form#bookingForm textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
}

form#bookingForm textarea {
    resize: none;
}

form#bookingForm input:focus,
form#bookingForm textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-items-container, .order-summary, #booking1 {
        padding: 10px;
    }

    button {
        font-size: 14px;
        padding: 8px 16px;
    }

    h2 {
        font-size: 20px;
    }
}


    </style>

<div class="super_container">

	<!-- Header -->
     

	<?php
    include 'include/navbar.php';
    ?>

		<!-- Main Navigation -->

		

	</header>


	<!-- Hamburger Menu -->

	
    <div class="container contact_container">
        <div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
					</ul>
				</div>

			</div>
		</div>
    
       <!-- Cart Section -->
<div class="row">
    <div class="col">
        <div class="container mt-5">
            <h2>Your Cart</h2>
            <div class="row">
                <!-- Cart Items - col-md-8 -->
                <div class="col-md-8">
                    <div id="cart-items-container" class="cart-items-container">
                        <!-- Dynamically generated cart items will be injected here -->
                    </div>
                </div>

                <!-- Order Summary - col-md-4 -->
                <div class="col-md-4">
                    <div class="order-summary">
                        <h4>Order Summary</h4>
                        <p class="total-price"><strong>Total: $0.00</strong></p>
                        <!-- Checkout Button -->
                        <button id="checkoutButton" class="btn btn-primary mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Section -->
        <div class="container mt-5" id="booking1" style="display:none;">
            <h2>Booking Details</h2>
            <div class="row">
                <!-- Booking Form - col-md-8 -->
                <div class="col-md-8">
                <form id="bookingForm" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                    </div>
                    <button id="proceedToPayButton" type="submit" class="btn btn-success mt-3" aria-label="Proceed to payment">Proceed to Pay</button>                </form>

                </div>

                <!-- Order Summary - col-md-4 -->
                <div class="col-md-4">
                    <div class="order-summary">
                        <h4>Order Summary</h4>
                        <p class="fin-total-price"><strong>Total: $0.00</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    </div>
</div>

        
        <!-- Add some styles -->
       
    

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="POST">
                    <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                        <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                        <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	 <!-- Footer Start -->
	 <?php include 'include/footer.php';  ?>
    <!-- Footer End -->


</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/contact_custom.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    document.getElementById('proceedToPayButton').onclick = function(e) {
        e.preventDefault();
        
        // Fetch Order ID from the server-side endpoint
        fetch('create_order.php', {
            method: 'POST',
        })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                // Create Razorpay options
                const options = {
                    key: "CYQyLn45gM8JHIogWDMO0By6", // Replace with your Razorpay API key
                    amount: data.amount, // Amount in the smallest unit (e.g., paise)
                    currency: "INR",
                    name: "Your Company Name",
                    description: "Purchase Description",
                    order_id: data.id, // Order ID from Razorpay
                    handler: function(response) {
                        // Handle payment success
                        alert("Payment ID: " + response.razorpay_payment_id);
                        alert("Order ID: " + response.razorpay_order_id);
                        alert("Signature: " + response.razorpay_signature);

                        // Redirect to server-side endpoint to verify payment
                        fetch('verify_payment.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(response)
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                alert('Payment verified successfully!');
                            } else {
                                alert('Payment verification failed.');
                            }
                        });
                    },
                    prefill: {
                        name: "John Doe",
                        email: "johndoe@example.com",
                        contact: "9999999999",
                    },
                    theme: {
                        color: "#3399cc"
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            } else {
                alert('Failed to fetch Razorpay order ID.');
            }
        });
    };
</script>












<script>
// Replace these values with your Razorpay Key ID and the actual order amount in smallest currency unit (e.g., paisa for INR).



	// cartitem
function loadCartItems() {
    const savedCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    const cartItemsContainer = document.getElementById("cart-items-container");

    cartItemsContainer.innerHTML = '';

    let totalPrice = 0; // Initialize total price

    if (savedCartItems.length === 0) {
            cartItemsContainer.innerHTML = "<p>No items in the cart.</p>";
        } else {
            savedCartItems.forEach((item, index) => {
                totalPrice += item.price;

                const cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");
                cartItem.innerHTML = `
                    <div class="cart-item-content d-flex">
                        <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                        <div class="cart-item-details">
                            <p class="product-name">${item.name}</p>
                            <p class="product-description">${item.description}</p>
                            <p class="product-price">$${item.price.toFixed(2)}</p>
                        </div>
                    </div>
                    <button class="btn btn-danger remove-item" onclick="removeItem(${index})">Remove</button>
                `;
                cartItemsContainer.appendChild(cartItem);
            });
        }

        // Update total price dynamically
        document.querySelector(".total-price").textContent = `Total: $${totalPrice.toFixed(2)}`;
        document.querySelector(".fin-total-price").textContent = `Total: $${totalPrice.toFixed(2)}`;

    }

function removeItem(index) {
    const savedCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    savedCartItems.splice(index, 1); // Remove item at the specified index
    localStorage.setItem("cartItems", JSON.stringify(savedCartItems)); // Update localStorage
    loadCartItems(); // Reload the cart items to reflect the removal
}

// Call the function to load cart items when the page loads
if (window.location.pathname.includes("book.php")) {
    loadCartItems();
}

<!-- JavaScript to Toggle Sections -->

    document.getElementById('checkoutButton').addEventListener('click', function () {
        // Hide the cart section
        document.querySelector('.container.mt-5').style.display = 'none';

        // Show the booking section
        document.getElementById('booking1').style.display = 'block';
    });

    document.getElementById('proceedToPayButton').addEventListener('click', function () {
        alert('Proceeding to payment...');
        // Add logic for payment gateway integration
    });
</script>

</body>

</html>
