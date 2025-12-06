<?php
include "connect.php";

//if form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'] ?? ''; 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, address, phone, password) VALUES ('$name', '$email', '$address', '$phone', '$hashed_password')";
    if(mysqli_query($conn, $sql)) {
        header("Location:/WebProject/admin/dashboard.php"); // redirect to dashboard after successful addition
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <style>
        form { width: 400px; margin: 50px auto; font-family: Arial; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background: purple; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Add New User</h2>

<form method="post" action="">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="address" placeholder="Address" required></textarea>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="password" name="password" placeholder="Password" required>
    <br>
    <input type="submit" name="submit" value="Add User">
</form>

</body>
</html>
