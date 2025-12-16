<?php
$conn = mysqli_connect("localhost", "root", "", "furniture_store");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM products LIMIT 6, 1000";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <style>
    body {
      margin: 0;

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
      padding-left: 40px;
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
      margin-left: 150px;
      
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
      float: right;
      right: 10px;
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

    /*.products {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 25px;
      margin: 40px;
    }*/

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

    .footer{
    margin-top: 100px;
 background-color: #1e1d1d;
 color: white;
 width: 100%;
}
.footer-link {
  color:white;
  text-decoration: none;
  display: block;
  margin-bottom: 8px;
  transition: 0.3s;
}

.footer-link:hover {
  color: #e74c3c;
  padding-left: 5px;
}

.footer-icon {
  color: #bdc3c7;
  font-size: 1.2rem;
  transition: 0.3s;
}

.footer-icon:hover {
  color: #e74c3c;
  transform: translateY(-3px);
}
  </style>
</head>

<body>

  <header>
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <p style="font-size: 30px; letter-spacing: 2px; font-weight: bold; margin:0;">DEPOT</p>
      </a>

     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php">SHOP</a></li>
          <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
        </ul>
      </div>

    
      <a href="cart.php" class="cart  " >Cart (<span id="cart-total">0$</span>)</a>
    </div>
  </nav>
</header>

  <div class="sidebar" id="sidebar">
    <h3>Welcome</h3>
    <p>Advertising is the way great brands get to be great brands.</p>
    <p>We Are Awesome Follow Us</p>
  </div>


  <div class="content">

    <div class="breadcrumb">
      <a href="home.php" style="text-decoration:none; color:#747474;">Home</a> /
      <span>Shop List</span> /
      <span class="no-hover">With Filter</span>
    </div>
    <!-- <div class="filter-bar">
      <div class="categories">
        <a href="#">All</a>
        <a href="#">Accessories</a>
        <a href="#">Decoration</a>
        <a href="#">Hardwoods</a>
        <a href="#">Fancies</a>
      </div> -->

      <div class="filter ">
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

    <div class="products row g-4 mt-5 me-2 ms-2 ">

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
         <div class="product col-12 col-md-6 col-lg-3" data-price="<?= $row['price'] ?>">
        <a href="productdetails2.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
 
        
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

          <div class="price" onclick="addToCart(<?= $row['price'] ?>)">
            <?= $row['price'] ?>$
          </div>
      </a>
        </div>
      <?php endwhile; ?>
    </div>


   <footer class="footer pt-5 pb-3 " style="width:100%;">
      <div class="container">
        <div class="row text-center text-md-start">
          <div class="col-12 col-sm-6 col-md-3 mb-4 footer-col">
            <h5 class="footer-title">CUSTOMER SERVICE</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="footer-link">Help & Contact Us</a></li>
              <li><a href="#" class="footer-link">Returns & Refunds</a></li>
              <li><a href="#" class="footer-link">Online Stores</a></li>
              <li><a href="#" class="footer-link">Terms & Conditions</a></li>
            </ul>
          </div>

          <div class="col-12 col-sm-6 col-md-3 mb-4 footer-col">
            <h5 class="footer-title">COMPANY</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="footer-link">What We Do</a></li>
              <li><a href="#" class="footer-link">Available Services</a></li>
              <li><a href="#" class="footer-link">Latest Posts</a></li>
              <li><a href="#" class="footer-link">FAQs</a></li>
            </ul>
          </div>

          <div class="col-12 col-sm-6 col-md-3 mb-4 footer-col">
            <h5 class="footer-title">SOCIAL MEDIA</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="footer-link">Twitter</a></li>
              <li><a href="#" class="footer-link">Instagram</a></li>
              <li><a href="#" class="footer-link">Tumblr</a></li>
              <li><a href="#" class="footer-link">Pinterest</a></li>
            </ul>
          </div>

          <div class="col-12 col-sm-6 col-md-3 mb-4 footer-col">
            <h5 class="footer-title">PROFILE</h5>
            <ul class="list-unstyled">
              <li><a href="#" class="footer-link">My Account</a></li>
              <li><a href="#" class="footer-link">Checkout</a></li>
              <li><a href="#" class="footer-link">Order Tracking</a></li>
              <li><a href="#" class="footer-link">Help & Support</a></li>
            </ul>
          </div>
        </div>

        <div
          class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center pt-3"
        >
          <p class="m-0 footer-copy" style="color: #bdc3c7">
            &copy; 2021 Code Interactive | All Rights Reserved
          </p>
          <div class="social-links d-flex align-items-center gap-3">
            <span class="follow-text" style="color: #bdc3c7">Follow Us</span>
            <a href="#" class="footer-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="footer-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="footer-icon"><i class="fab fa-tumblr"></i></a>
            <a href="#" class="footer-icon"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>
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

  function addToCart(price) {
    cartTotal += price;
    document.getElementById("cart-total").innerText = cartTotal + "$";


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

    setTimeout(() => {
      toast.remove();
    }, 2000);
  }
</script>


</body>

</html>