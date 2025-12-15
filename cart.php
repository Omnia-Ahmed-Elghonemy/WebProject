<?php
include "db.php";

$user_id = 1;

$query = "
SELECT cart.id AS cart_id, cart.qty, products.name, products.price, products.image
FROM cart
JOIN products ON cart.product_id = products.id
WHERE cart.user_id = $user_id
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* ===== العام ===== */
    body {
      margin: 0;
      font-family: monospace;
      padding: 0;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.5);

    }

    /* ===== Header ===== */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: black;
      color: white;
      padding: 15px 40px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      top: 0;
      width: 100%;
      z-index: 10;
      box-sizing: border-box;
    }

    .logo p {
      font-size: 30px;
      letter-spacing: 2px;
      font-weight: bold;
      margin: 0;
      color: white;

    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 25px;
      justify-content: center;
    }

    nav ul li {
      position: relative;
    }

    nav ul li a {
      text-decoration: none;
      font-size: 16px;
      padding-left: 20px;
      color: white;
      transition: 0.3s;
    }

    nav ul li:hover>a {
      color: #FFD700;
    }

    nav ul li ul {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: #000;
      padding: 10px 0;
      min-width: 150px;
    }

    nav ul li ul li {
      display: block;
    }

    nav ul li ul li a {
      color: #fff;
      padding: 10px 20px;
      display: block;
    }

    nav ul li:hover ul {
      display: block;
    }
.nav-icons i {
  font-size: 18px;
  cursor: pointer;
  color: white;
}
    /* زر السلة */
    .cart {
      font-weight: bold;
      font-family: monospace;
      cursor: pointer;
      margin-left: 20px;
      margin-right: 40px;
    }

    /* أيقونة القائمة الجانبية */
    .menu-icon {
      display: block;
      font-size: 28px;
      cursor: pointer;
      margin-left: 20px;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      right: -400px;
      /* مخفي خارج الشاشة */
      width: 300px;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      color: #fff;
      padding: 40px 20px;
      transition: right 0.4s ease;
      z-index: 2000;
      text-align: center;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.5);
      overflow-y: auto;
    }

    .sidebar.active {
      right: 0;
      /* يظهر عند تفعيل الكلاس */
    }

    .sidebar h3 {
      margin-top: 0;
      font-size: 24px;
      color: #FFD700;
      /* ذهبي */
    }

    .sidebar p {
      margin: 15px 0;
      font-size: 14px;
      line-height: 1.5;
      color: #ccc;
    }

    /* Close button */
    .sidebar .closebtn {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 25px;
      cursor: pointer;
      color: #fff;
    }

    /* Social icons */
    .sidebar .socials {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      gap: 15px;
    }

    .sidebar .socials a {
      color: #fff;
      font-size: 20px;
      transition: color 0.3s;
    }

    .sidebar .socials a:hover {
      color: #FFD700;
      /* ذهبي عند المرور */
    }

    /* جدول وعربة التسوق */
    .table {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      text-align: center;
    }

    h2,
    table,
    p,
    h4,
    button,
    a {
      margin-bottom: 20px;
    }

    .cart-summary {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-size: 26px;
    }

    .cart-summary p {
      margin: 10px 0;
      color: #555;
    }

    .cart-summary h4 {
      margin: 20px 0;
      color: #222;
    }

    .cart-summary .btn {
      width: 90%;
      margin: 10px 0;
      padding: 12px 0;
      font-size: 22px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cart-summary .btn-primary {
      background-color: #007bff;
      color: #fff;
      border: none;
    }

    .cart-summary .btn-primary:hover {
      background-color: #0056b3;
    }

    .cart-summary .btn-secondary {
      background-color: #f1f1f1;
      color: #333;
      border: 1px solid #ccc;
    }

    .cart-summary .btn-secondary:hover {
      background-color: #e7dfdfff;
    }

    .cart-summary .btn-secondary a {
      text-decoration: none;
      color: inherit;
    }

    .slide-out {
      animation: slideOut 0.5s forwards;
    }


    .confetti-piece {
      position: fixed;
      width: 8px;
      height: 8px;
      z-index: 2000;
      animation: confettiFall 1.5s linear forwards;
    }


    /* محتوى بعد الهيدر */
    .content {
      margin-top: 90px;
    }
  </style>

<body>
  <header>
   <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <span style="font-size:30px; letter-spacing:2px; font-weight:bold; margin-left: 200px; margin-right: 350px;">DEPOT</span>
    </a>

    <!-- زر الهامبرغر للشاشات الصغيرة -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- قائمة الروابط -->
     <div class="collapse navbar-collapse mx-auto" id="navbarContent">
      <ul class="navbar-nav" > <!-- mx-auto لتوسيط القائمة -->
                          <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="index1.php">SHOP</a></li>
                     <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
         <li class="nav-item">
              <a class="nav-link active "  href="cart.php" style="margin-left: 200px;">CART($<span id="total">0</span>)
            </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="sidebar" id="sidebar">
      <span class="closebtn" onclick="closeSidebar()">×</span>
      <h3>Welcome!</h3>
      <p>Advertising is the way great brands get to be great brands.</p>
      <p>We Are Awesome — Follow Us</p>

      <div class="socials">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
    <div class="menu-icon" onclick="toggleSidebar()">&#9776;</div>

  </header>
  <h2 style=" text-align: center; margin-top: 30px; font-size: 25px;">Shopping Cart</h2>
  <table class="table table-bordered" id="cartTable" style="width: 100%; text-align: center;">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th style="text-align: center;">Qty</th>
        <th>Subtotal</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr data-cart-id="<?= $row['cart_id'] ?>">
          <td><img src="images/<?= htmlspecialchars($row['image']) ?>" width="60" class="img-thumbnail"></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td>$<?= number_format($row['price'], 2) ?></td>
          <td class="qty">
            <button class="btn btn-sm btn-light" onclick="changeQty(<?= $row['cart_id'] ?>, 'decrease')">-</button>
            <span class="qty-number" style="font-size: 22px;"><?= $row['qty'] ?></span>
            <button class="btn btn-sm btn-light" onclick="changeQty(<?= $row['cart_id'] ?>, 'increase')">+</button>
          </td>


          <td>$<?= number_format($row['price'] * $row['qty'], 2) ?></td>
          <td>
            <a href="remove.php?id=<?= $row['cart_id'] ?>" class="btn btn-danger btn-sm">❌</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>


  <div class="cart-summary">
    <p>Subtotal: $<span id="subtotal">0</span></p>
    <p>Tax (10%): $<span id="tax">0</span></p>
    <p>Shipping: $<span id="shipping">5</span></p>
    <h4>Total: $<span id="total">0</span></h4>
    <button id="checkoutBtn" class="btn btn-primary">Proceed to Checkout</button>
    <button class="btn btn-secondary"> <a href="index.php">Continue Shopping</a></button>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById("sidebar").classList.toggle("active");
    }

    document.addEventListener("click", function(e) {
      const sidebar = document.getElementById("sidebar");
      const menuIcon = document.querySelector(".menu-icon");
      if (sidebar.classList.contains("active") && !sidebar.contains(e.target) && !menuIcon.contains(e.target)) {
        sidebar.classList.remove("active");
      }
    });

    const sidebar = document.getElementById('sidebar');

    function openSidebar() {
      sidebar.classList.add('active');
    }

    function closeSidebar() {
      sidebar.classList.remove('active');
    }

    // ===== حساب ملخص السلة =====
    function calculateSummary() {
      let subtotal = 0;
      document.querySelectorAll("#cartTable tbody tr").forEach(row => {
        const rowSubtotal = parseFloat(row.cells[4].textContent.replace('$', '')) || 0;
        subtotal += rowSubtotal;
      });

      const tax = subtotal * 0.1;
      const shipping = subtotal > 0 ? 5 : 0;
      const total = subtotal + tax + shipping;

      document.getElementById("subtotal").textContent = subtotal.toFixed(2);
      document.getElementById("tax").textContent = tax.toFixed(2);
      document.getElementById("shipping").textContent = shipping.toFixed(2);
      document.getElementById("total").textContent = total.toFixed(2);
    }


    // ===== بعد تحميل الصفحة =====
    window.addEventListener("DOMContentLoaded", calculateSummary);

    // ===== Checkout Button =====
    document.getElementById("checkoutBtn").addEventListener("click", function() {
      const total = document.getElementById("total").textContent;
      if (total == 0) {
        alert("Cart is empty!");
        return;
      }
      alert(`Payment successful! Total: $${total}`);

      // مسح السلة مؤقتاً من الصفحة
      const tbody = document.querySelector("#cartTable tbody");
      tbody.innerHTML = "";
      calculateSummary();

      // Confetti effect
      for (let i = 0; i < 50; i++) {
        const c = document.createElement("div");
        c.className = "confetti-piece";
        c.style.backgroundColor = `hsl(${Math.random()*360},100%,50%)`;
        c.style.left = Math.random() * window.innerWidth + "px";
        c.style.top = Math.random() * -200 + "px";
        document.body.appendChild(c);
        setTimeout(() => c.remove(), 1500);
      }
    });

    // ===== تعديل الكمية لكل منتج =====
    function changeQty(cart_id, action) {
      const formData = new FormData();
      formData.append('cart_id', cart_id);
      formData.append('action', action);

      fetch('update_cart.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            const row = document.querySelector(`#cartTable tr[data-cart-id='${cart_id}']`);

            // تحديث الكمية بدون حذف الأزرار
            row.querySelector(".qty-number").textContent = data.qty;

            // تحديث العمود الفرعي subtotal للصف
            const price = parseFloat(row.cells[2].innerText.replace("$", ""));
            row.cells[4].textContent = "$" + (price * data.qty).toFixed(2);

            // تحديث الملخص الكلي
            calculateSummary();
          } else {
            alert('Error updating cart: ' + data.message);
          }
        });
    }
  </script>


</body>

</html>