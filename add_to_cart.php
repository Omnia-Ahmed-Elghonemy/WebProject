<?php
include "db.php";

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $user_id = 1; // مؤقتًا، بعدين تحط session أو login

    // الكمية القادمة من GET أو POST، إذا مش موجودة خليها 1
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

    // تحقق إذا المنتج موجود بالفعل في الكارت
    $check = mysqli_query($conn, "SELECT * FROM cart WHERE product_id = $product_id AND user_id = $user_id");

    if (mysqli_num_rows($check) > 0) {
        // زوّد الكمية الموجودة
        mysqli_query($conn, "UPDATE cart SET qty = qty + $qty WHERE product_id = $product_id AND user_id = $user_id");
    } else {
        // ضيف المنتج جديد
        mysqli_query($conn, "INSERT INTO cart (product_id, qty, user_id) VALUES ($product_id, $qty, $user_id)");
    }

    // لو الطلب جاء من AJAX (مثلاً من صفحة المنتج المفرد)
    if (isset($_GET['ajax'])) {
        echo json_encode(['status' => 'success', 'qty' => $qty]);
        exit();
    }

    // إعادة التوجيه للصفحة الرئيسية للكارت
    header("Location: cart.php");
    exit();
}
?>
