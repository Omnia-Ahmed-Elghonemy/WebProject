<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/home.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand fw-bold fs-3" href="#">DEPOT</a>

      <!-- Hamburger Menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu Links -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav gap-4">
          <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="productdetails2">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="#">SHOP</a></li>
          <li class="nav-item"><a class="nav-link" href="#">PORTFOLIO</a></li>
          <li class="nav-item"><a class="nav-link" href="#">BLOG</a></li>
          <li class="nav-item"><a class="nav-link" href="#">ELEMENTS</a></li>
        </ul>
      </div>

      <!-- Right Icons -->
      <div class="d-flex align-items-center gap-4 nav-icons">
        <span class="text-white">CART ($0)</span>
        <i class="fa-regular fa-heart text-white"></i>
        <i class="fa-solid fa-bars text-white"></i>
      </div>
    </div>
  </nav>
  <section class="hero-section d-flex align-items-center justify-content-center text-center">
    <div class="container">
      <h1 class="hero-title">WE CARRY ONLY THE FINEST</h1>
      <p class="hero-subtitle">ITEMS AVAILABLE</p>
    </div>
  </section>
  <section class="products py-5">
    <div class="container">
      <div class="row text-center g-5">
        <!-- Product 1 -->
        <div class="col-md-4">
          <img src="./images/goldwallclock.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">GOLD WALL CLOCK</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="price">$250</p>
        </div>

        <!-- Product 2 -->
        <div class="col-md-4">
          <img src="./images/black alarm clock.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">BLACK ALARM CLOCK</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="price">$250</p>
        </div>

        <!-- Product 3 -->
        <div class="col-md-4">
          <img src="./images/anigram rooster.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">ANIGRAM ROOSTER</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="price">$210</p>
        </div>

        <!-- Product 4 -->
        <div class="col-md-4">
          <img src="./images/kumdinu.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">WHITE WALL CLOCK</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="price">$250</p>
        </div>

        <!-- Product 5 -->
        <div class="col-md-4">
          <img src="./images/flash.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">FLASH</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <p class="price">$135</p>
        </div>

        <!-- Product 6 -->
        <div class="col-md-4">
          <img src="./images/brown share.jpg" class="product-img" alt="" />
          <h6 class="product-title mt-3">BROWN CHAIR</h6>
          <div class="stars mb-1">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <p class="price">$460</p>
        </div>
      </div>
    </div>
  </section>
  <section class="powerful-concept">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 d-flex justify-content-center text-center">
          <div class="concept-content">
            <h2 class="section-title">MOST POWERFUL CONCEPT</h2>
            <p class="concept-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
              ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus
              et magnis dis parturient montes, nascetur ridiculus mus.
            </p>
            <button class="purchase-btn">PURCHASE</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer pt-5 pb-3 mt-5">
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

      <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>