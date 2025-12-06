<?php
include "connect.php";
$id = $_GET['id'];
$product = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM products WHERE id=$id")
);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    // Check if a new image is uploaded
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$image);

        // Update all data including the image
        $sql = "UPDATE products SET 
                name='$name',
                description='$desc',
                price='$price',
                image='$image'
                WHERE id=$id";
    } else {
        // Update data without changing the image
        $sql = "UPDATE products SET 
                name='$name',
                description='$desc',
                price='$price'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header("Location: /WebProject/admin/dashboard.php");
    exit();
}
?>
<Doctype html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        form { width: 400px; margin: 50px auto; font-family: Arial; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background:green; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
<form method="post">
    <p>Current Image:</p>
<img src="uploads/<?= $product['image'] ?>" width="100">
<input type="file" name="image">
<br> <br>
<input type="text" name="name" value="<?= $product['name'] ?>">
<textarea name="description"><?= $product['description'] ?></textarea>
<input type="number" step="0.01" name="price" value="<?= $product['price'] ?>">
<input type="submit" name="submit" value="Update">



</form>
</body>
</html>
