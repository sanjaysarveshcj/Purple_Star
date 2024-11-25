<?php
session_start();
include('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($conn, $_POST['repeat_password']);

    if ($password !== $repeat_password) {
        echo "<script>alert('Passwords do not match');</script>";
        exit();
    }

    // Check if email already exists for user or admin
    $check_user_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_admin_sql = "SELECT * FROM admins WHERE email = '$email'";

    $check_user_result = mysqli_query($conn, $check_user_sql);
    $check_admin_result = mysqli_query($conn, $check_admin_sql);

    if (mysqli_num_rows($check_user_result) > 0) {
        echo "<script>alert('Email already registered as a user');</script>";
        exit();
    }

    if (mysqli_num_rows($check_admin_result) > 0) {
        echo "<script>alert('Email already registered as an admin');</script>";
        exit();
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $insert_user_sql = "INSERT INTO users (full_name, email, password) VALUES ('$fullname', '$email', '$hashed_password')";
    if (mysqli_query($conn, $insert_user_sql)) {
        echo "<script>alert('User registered successfully');</script>";
        header("Location: login.php");
        exit();
    } else {
        echo "<script>alert('Error registering user');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="register-form">
            <h2>Register</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" name="fullname" placeholder="Full Name" required />
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required />
                </div>
                <div class="input-group">
                    <input type="password" name="repeat_password" placeholder="Repeat Password" required />
                </div>
                <button type="submit" name="register" class="btn">Register</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
