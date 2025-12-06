<?php
// Include the database connection file
include 'connect.php';
// Fetch user data from the database
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        
            table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            font-family: Arial;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        
        }
        .add-user-btn {
        display: inline-block;    
    padding: 10px 20px;         
    background-color: #6a0dad;   
    color: white;                
    font-weight: bold;           
    text-decoration: none;      
    border-radius: 8px;         
    box-shadow: 0 4px 6px rgba(0,0,0,0.2); 
    transition: 0.3s; 
    align-items: end;
    
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th { background: #f4f4f4; }
        .edit { background: green; color: white; padding: 5px 10px; text-decoration: none; }
        .delete { background: red; color: white; padding: 5px 10px; text-decoration: none; }
        .add { margin: 20px; padding: 10px 15px; background: purple; color: white; text-decoration: none; display: inline-block; }
        
    </style>

    </style>
</head>
<body>
    <div class ="head" style="display: flex; justify-content: space-between; align-items: center; margin: 20px 50px;">
        <h2>User List</h2>
        <a href ="add_user.php" class="add-user-btn">Add New User</a>
    </div>
    <!-- Display user data in a table -->
    <div style="text-align: center;">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <!-- Loop through each user and display their details -->
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['address']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td>
            <a class="edit" href="edit_user.php?id=<?= $row['id']; ?>">EDIT</a>
            <a class="delete" href="delete_user.php?id=<?= $row['id']; ?>">DELETE</a>
        </td>
    </tr>
    <?php } ?>
    </table>
    </div>


</body>
</html>

