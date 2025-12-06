<?php
include "connect.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $sql = "DELETE FROM users WHERE id=$id";
    if(mysqli_query($conn, $sql)) {
        header("Location: /WebProject/admin/dashboard.php"); // Redirect to view after deletion
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No ID found!";
}
?>
