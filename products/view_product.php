<?php
include "connect.php";
$result = mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            font-family: Arial;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
   
        }
        th, td {
                padding:12px;
    border-bottom:1px solid #ddd;
    text-align:center;

        }
        th { background: #f4f4f4; }
        .edit{
    background:green;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    margin-top: 5x;
}
.action {
    display: flex;
    justify-content: center; 
    gap: 10px; 
}
.action a {
    display: inline-block; 
}

.delete{
    background:red;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
}
        .add { margin: 20px; padding: 10px 15px; background: purple; color: white; text-decoration: none; display: inline-block; }
</style>
</head>
<body>
    <div class ="head" style="display: flex; justify-content: space-between; align-items: center; margin: 20px 50px;">
        <h2>Product List</h2>
<a href="add_product.php" class="add">Add Product</a>
    </div>
    <div>
<table >
<tr>
<th>ID</th>
<th>Image</th>
<th>Name</th>
<th>Description</th>
<th>price</th>
<th>Actions</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td>
<img src="uploads/<?= $row['image'] ?>" width="60">
</td>
<td><?= $row['name'] ?></td>
<td><?= $row['description'] ?></td>
<td><?= $row['price'] ?></td>
<td>
    <div class="action">
<a class="edit" href="edit_product.php?id=<?= $row['id']; ?>">EDIT</a>
<a class="delete" href="delete_product.php?id=<?= $row['id']; ?>">DELETE</a>
</div>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>
