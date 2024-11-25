<?php
// Hash the password using bcrypt
$hashed_password = password_hash('admin123', PASSWORD_BCRYPT);

// Output the hashed password
echo $hashed_password;
?>
