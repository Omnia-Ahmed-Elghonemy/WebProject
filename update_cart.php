<?php
include "db.php";

if(isset($_POST['cart_id']) && isset($_POST['action'])) {
    $cart_id = intval($_POST['cart_id']);
    $action = $_POST['action'];

    // جلب الكمية الحالية
    $query = "SELECT qty FROM cart WHERE id = $cart_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $qty = $row['qty'];

    // تعديل الكمية
    if($action === "increase") {
        $qty++;
    } elseif($action === "decrease" && $qty > 1) {
        $qty--;
    }

    // تحديث الداتابيز
    $update = "UPDATE cart SET qty = $qty WHERE id = $cart_id";
    if(mysqli_query($conn, $update)){
        echo json_encode(['status'=>'success', 'qty'=>$qty]);
    } else {
        echo json_encode(['status'=>'error', 'message'=>mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status'=>'error', 'message'=>'Invalid data']);
}

$conn->close();
?>
