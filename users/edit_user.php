<?php
include "connect.php"; 

// Check if ID is provided
if(!isset($_GET['id'])) {
    die("No user ID provided.");
}

$id = $_GET['id'];

// fetch user data
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
    die("User not found.");
}
$user = mysqli_fetch_assoc($result);
//if form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    $update_sql = "UPDATE users SET 
        name='$name', 
        email='$email', 
        address='$address', 
        phone='$phone' 
        WHERE id=$id";

    if(mysqli_query($conn, $update_sql)) {
        header("Location: /WebProject/admin/dashboard.php"); //redirect to user list after successful update
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        form { width: 400px; margin: 50px auto; font-family: Arial; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background: #28a745; color: white; border: none; cursor: pointer; padding: 10px; font-weight: bold; border-radius: 5px; }
        input[type="submit"]:hover { background: #218838; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Edit User</h2>

<form method="post" action="">
    <input type="text" name="name" value="<?= $user['name']; ?>" required>
    <input type="email" name="email" value="<?= $user['email']; ?>" required>
    <textarea name="address" required><?= $user['address']; ?></textarea>
    <input type="text" name="phone" value="<?= $user['phone']; ?>" required>
    <input type="submit" name="submit" value="Update User">
</form>

</body>
</html>
