<?php
include "connect.php";
session_start();

// protect dashboard access
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }

// count users
$user_count = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users")
)['total'];

// count products
$product_count = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM products")
)['total'];

// fetch data
$users = mysqli_query($conn, "SELECT * FROM users");
$products = mysqli_query($conn, "SELECT * FROM products");

// search
$search = '';
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $users = mysqli_query($conn, "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'");
    $products = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#f5f6fa;
}

.header{
    background: linear-gradient(90deg,#6a11cb,#2575fc);
    color:white;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.header h2{
    margin:0;
}

.logout{
    background:#fff;
    color:#6a11cb;
    padding:10px 18px;
    border-radius:20px;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;
}

.logout:hover{
    background:#6a11cb;
    color:#fff;
}

.stats{
    display:flex;
    gap:20px;
    justify-content:center;
    margin:20px 0;
}

.stat-box{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
    text-align:center;
    width:200px;
}

.container{
    width:90%;
    margin:20px auto;
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

.add{
    background:#6a11cb;
    color:#fff;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;
    font-weight:bold;
    margin-bottom:10px;
    display:inline-block;
}

.add:hover{opacity:0.8;}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th, td{
    padding:12px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

th{
    background:#f1f3f6;
    font-weight:bold;
}

tr:hover{
    background:#f9f9ff;
}

.edit{
    background:#2ecc71;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    margin-right:5px;
}

.delete{
    background:#e74c3c;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
}

.edit:hover, .delete:hover{opacity:0.8;}

.actions{
    display:flex;
    justify-content:center;
    gap:10px;
}

img{
    border-radius:8px;
}
.search-box{
    text-align:center;
    margin-bottom:20px;
}
.search-box input{
    padding:8px;
    width:250px;
}
.search-box input[type="submit"]{
    padding:8px 15px;
    background:#6a11cb;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
.search-box input[type="submit"]:hover{
    opacity:0.8;
}
</style>
</head>
<body>

<div class="header">
    <h2>Admin Dashboard</h2>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="stats">
    <div class="stat-box">
        <h3>Total Users</h3>
        <p><?= $user_count ?></p>
    </div>
    <div class="stat-box">
        <h3>Total Products</h3>
        <p><?= $product_count ?></p>
    </div>
</div>

<!-- Search -->
<div class="search-box">
    <form method="GET">
        <input type="text" name="search" placeholder="Search users or products" value="<?= htmlspecialchars($search) ?>">
        <input type="submit" value="Search">
    </form>
</div>

<!-- Users Table -->
<div class="container">
    <h3>Users</h3>
    <a href="users/add_user.php" class="add">Add User</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>password</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($users)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['password'] ?></td>
            <td class="actions">
                <a class="edit" href="users/edit_user.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="delete" href="users/delete_user.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<!-- Products Table -->
<div class="container">
    <h3>Products</h3>
    <a href="products/add_product.php" class="add">Add Product</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($products)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><img src="images/<?= $row['image'] ?>" width="60"></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['price'] ?></td>
            <td class="actions">
                <a class="edit" href="products/edit_product.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="delete" href="products/delete_product.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
