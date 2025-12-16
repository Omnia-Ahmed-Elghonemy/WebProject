<?php
include "connect.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "images/".$image);

    $sql = "INSERT INTO products (image, name, description, price)
            VALUES ('$image', '$name', '$desc', '$price')";

    if(mysqli_query($conn,$sql)){
        header("Location: /furniture/dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <style>
        form { width: 400px; margin: 50px auto; font-family: Arial; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background: purple; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<form method="post" enctype="multipart/form-data">
<input type="file" name="image" required>
<input type="text" name="name" placeholder="Product Name" required>
<textarea name="description" placeholder="Description" required></textarea>
<input type="number" step="0.01" name="price" placeholder="price" required>
<input type="submit" name="submit" value="Add Product">
</form>
</body>
</html>
