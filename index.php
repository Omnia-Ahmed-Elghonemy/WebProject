<?php
include "db.php";

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Products Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <style>
    body {
      margin: 0;
      font-family: monospace;
    }

    /* ===== Header ===== */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      padding: 15px 40px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-sizing: border-box;
      margin-bottom: 0px;
    }


    .This-page {
      color: #747474;
    }

    .logo img {
      height: 60px;
      margin-right: 10px;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 25px;
    }

    nav ul li {
      position: relative;
    }

    nav ul li a {
      text-decoration: none;

      font-size: 16px;
      padding-left: 20px;
      color: #333;
      transition: 0.3s;
    }

    nav ul li:hover>a {
      color: #000;
    }

    /* Dropdown */
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

    .cart {
      font-weight: bold;
      font-family: monospace;
      cursor: pointer;
      margin-left: 20px;
      margin-right: 40px;
    }

    /* ===== Sidebar Menu ===== */
    .menu-icon {
      display: none;
      font-size: 25px;
      cursor: pointer;
    }

    .sidebar {
      position: fixed;
      top: 0;
      right: -400px;
      width: 400px;
      height: 100%;
      background: #000;
      color: #919090;
      padding: 40px 20px;
      transition: 0.3s;
      z-index: 2000;
      text-align: center;

    }

    .sidebar.active {
      right: 0;
    }

    .sidebar h3 {
      margin-top: 0;

    }

    .sidebar p {

      padding-top: 400px;

    }

    .menu-icon {
      display: block;
      font-size: 28px;
      cursor: pointer;
      margin-left: 20px;
    }




    /* ===== Content Placeholder ===== */
    .content {
      margin-top: 90px;

    }

    .breadcrumb {
      background: #f9f9f9;
      padding: 15px 40px;
      height: 100px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #777777;
      padding-top: 40px;
    }

    .breadcrumb span {
      cursor: pointer;
      padding-right: 10px;
      padding-left: 10px;
      transition: 0.3s;
    }

    .breadcrumb span:hover {
      color: #000;
    }

    .breadcrumb .no-hover {
      cursor: default;
      color: #777777;
    }

    .breadcrumb .no-hover:hover {
      color: #777777;
    }

    .filter-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background: #fff;

    }

    .categories {
      display: flex;
      gap: 20px;
      margin: 20px 0;
      font-size: 14px;
    }

    .categories a {
      text-decoration: none;
      color: #777;
      transition: 0.3s;
    }

    .categories a:hover {
      color: #000;
    }

    .categories a.selected {
      color: #000;
      font-weight: 600;
    }

    header .cart {
      text-decoration: none;
      color: #3f3f3f;
      font-weight: bold;
    }

    .filter {
      position: relative;
      display: inline-block;
    }

    .filter-btn {
      cursor: pointer;
      color: #333;
      font-weight: bold;
    }

    .filter-dropdown {
      min-width: 250px;
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      background: #000000;
      color: #555555;
      padding: 15px;
      border: 1px solid #ccc;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      z-index: 999;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      font-size: 12px;
      width: 400px;
    }

    .filter-dropdown h4 {
      letter-spacing: 1px;
      color: aliceblue;
      font-size: 16px;
    }

    .filter-dropdown.show {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .filter-price li {
      cursor: pointer;
    }

    .products {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 25px;
      margin: 40px;
    }

    .product {
      text-align: center;
      font-family: Arial, sans-serif;
    }

    .image-container {
      position: relative;
      overflow: hidden;
    }

    .image-container img {
      width: 100%;
      display: block;
    }

    .overlay {
      position: absolute;
      bottom: -100%;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: bottom 0.3s;
    }

    .image-container:hover .overlay {
      bottom: 0;
    }

    .overlay .heart {
      font-size: 20px;
    }

    h3 {
      font-size: 16px;
      margin: 10px 0 5px;
    }

    .rating span {
      font-size: 18px;
      cursor: pointer;
      color: #ccc;
      transition: color 0.3s;
    }

    .rating span.active {
      color: gold;
    }


    .price {
      color: #777;
      margin-top: 5px;
      transition: 0.3s;
    }

    .product:hover .price {
      color: rgb(0, 0, 0);
    }

    .product:hover .price::before {
      content: "Add to cart  ";
      color: rgb(0, 0, 0);

    }

    .product:hover .price {
      content: none;

    }

    .footer {
      background: #000000;

      padding: 50px 20px 20px;
      padding-left: 50px;
      font-family: Arial, sans-serif;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
      margin-bottom: 30px;
    }

    .footer-column h3 {
      font-size: 18px;
      margin-bottom: 15px;
      color: #ffffff;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-column ul li {
      margin-bottom: 10px;
      font-size: 13px;
      color: #ffffff;
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .footer-column ul li::before {
      content: "➔";
      position: absolute;
      left: -10px;
      opacity: 0;
      transition: all 0.3s ease;
    }

    .footer-column ul li:hover {

      transform: translateX(10px);
    }

    .footer-column ul li:hover::before {
      opacity: 1;
      left: -25px;
    }

    .footer-bottom {

      font-size: 14px;
      color: #888;
      padding-top: 15px;
      border-top: 1px solid #585858;
    }
  </style>
</head>

<body>

  <header>

    <div class="logo">
      <p style="font-size: 30px; letter-spacing: 2px; font-weight: bold;">DEPOT</p>
    </div>

    <nav>
      <ul>
        <li><a href="#">Home</a>
          <ul>
            <li><a href="#">Home 1</a></li>
            <li><a href="#">Home 2</a></li>
          </ul>
        </li>
        <li><a href="#">Pages</a>
          <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </li>
        <li><a href="#" class="This-page">Shop</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Elements</a></li>
      </ul>
    </nav>

    <a href="cart.php" class="cart">Cart (<span id="cart-total">0$</span>)</a>

    <div class="menu-icon" onclick="toggleSidebar()">&#9776;</div>

  </header>

  <div class="sidebar" id="sidebar">
    <h3>Welcome</h3>
    <p>Advertising is the way great brands get to be great brands.</p>
    <p>We Are Awesome Follow Us</p>
  </div>


  <div class="content">

    <div class="breadcrumb">
      <span>Home</span> /
      <span>Shop List</span> /
      <span class="no-hover">With Filter</span>
    </div>
    <div class="filter-bar">
      <div class="categories">
        <a href="#">All</a>
        <a href="#">Accessories</a>
        <a href="#">Decoration</a>
        <a href="#">Hardwoods</a>
        <a href="#">Fancies</a>
      </div>

      <div class="filter">
        <span class="filter-btn">Filter ▼</span>
        <div class="filter-dropdown">
          <div>
            <h4>Sort By</h4>
            <p>Default</p>
            <p>Popularity</p>
            <p>Average rating</p>
            <p>Newness</p>

          </div>
          <div>
            <h4>Price Range</h4>

            <ul class="filter-price">
              <li data-min="0" data-max="9999">All</li>
              <li data-min="0" data-max="50">$0 - $50</li>
              <li data-min="50" data-max="100">$50 - $100</li>
              <li data-min="100" data-max="9999">$100+</li>
            </ul>
            >
          </div>
        </div>
      </div>



    </div>

    <div class="products">

      <?php while ($row = mysqli_fetch_assoc($result)): ?>

        <div class="product" data-price="<?= $row['price'] ?>">

          <div class="image-container">
            <img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">

            <div class="overlay">
              <span>Quick Look</span>
              <span class="heart">♡</span>
            </div>
          </div>

          <h3><?= $row['name'] ?></h3>

          <div class="rating">
            <span data-value="1">&#9734;</span>
            <span data-value="2">&#9734;</span>
            <span data-value="3">&#9734;</span>
            <span data-value="4">&#9734;</span>
            <span data-value="5">&#9734;</span>
          </div>
          <!-------------------------------------------->
          <div class="price" onclick="addToCart(<?= $row['price'] ?>)">
            <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="price-link" style="cursor: pointer; color: black; text-decoration: none; opacity: .6;">
              <?= $row['price'] ?>$
            </a>
          </div>

        </div>

      <?php endwhile; ?>

    </div>

    <footer class="footer">
      <div class="footer-container">
        <div class="footer-column">
          <h3>Customer Service</h3>
          <ul>
            <li>Help & Contact Us</li>
            <li>Returns & Refunds</li>
            <li>Online Stores</li>
            <li>Terms & Conditions</li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Company</h3>
          <ul>
            <li>What We Do</li>
            <li>Available Services</li>
            <li>Latest Posts</li>
            <li>FAQs</li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Social Media</h3>
          <ul>
            <li>Twitter</li>
            <li>Instagram</li>
            <li>Tumblr</li>
            <li>Pinterest</li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Profile</h3>
          <ul>
            <li>My Account</li>
            <li>Checkout</li>
            <li>Order Tracking</li>
            <li>Help & Support</li>
          </ul>
        </div>


      </div>

      <div class="footer-bottom">
        © 2021 Qode Interactive, All Rights Reserved
      </div>
    </footer>

</body>

<script>
  function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
  }

  document.addEventListener("click", function(e) {
    const sidebar = document.getElementById("sidebar");
    const menuIcon = document.querySelector(".menu-icon");

    if (sidebar.classList.contains("active") &&
      !sidebar.contains(e.target) &&
      !menuIcon.contains(e.target)) {
      sidebar.classList.remove("active");
    }
  });
  const filterBtn = document.querySelector(".filter-btn");
  const filterDropdown = document.querySelector(".filter-dropdown");

  filterBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    filterDropdown.classList.toggle("show");
  });

  document.addEventListener("click", () => {
    filterDropdown.classList.remove("show");
  });

  filterDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  const categoryLinks = document.querySelectorAll(".categories a");

  categoryLinks.forEach(link => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      categoryLinks.forEach(l => l.classList.remove("selected"));
      link.classList.add("selected");
    });
  });


  document.querySelectorAll('.rating').forEach(rating => {
    const stars = rating.querySelectorAll('span');
    stars.forEach(star => {
      star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        stars.forEach(s => {
          if (s.getAttribute('data-value') <= value) {
            s.innerHTML = '&#9733;'; // نجمة مليانة
            s.classList.add('active');
          } else {
            s.innerHTML = '&#9734;'; // نجمة فاضية
            s.classList.remove('active');
          }
        });
      });
    });
  });

  document.querySelectorAll('.filter-price li').forEach(filter => {
    filter.addEventListener('click', () => {
      const min = parseInt(filter.getAttribute('data-min'));
      const max = parseInt(filter.getAttribute('data-max'));

      document.querySelectorAll('.product').forEach(product => {
        const price = parseInt(product.getAttribute('data-price'));
        if (price >= min && price <= max) {
          product.style.display = "block";
        } else {
          product.style.display = "none";
        }
      });
    });
  });

  let cartTotal = 0;

  function addToCart(event, productId) {
    event.stopPropagation();
    event.preventDefault();

    fetch(`add_to_cart.php?id=${productId}`)
      .then(response => response.text())
      .then(() => {
        let toast = document.createElement("div");
        toast.innerText = "Added to cart!";
        toast.style.position = "fixed";
        toast.style.top = "20px";
        toast.style.right = "20px";
        toast.style.background = "black";
        toast.style.color = "white";
        toast.style.padding = "10px 20px";
        toast.style.borderRadius = "8px";
        toast.style.zIndex = "9999";
        document.body.appendChild(toast);

        setTimeout(() => { toast.remove(); }, 2000);
      });
  }
</script>


</body>

</html>