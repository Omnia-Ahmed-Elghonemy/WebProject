<?php
$conn = new mysqli('localhost', 'root', '', 'furniture_store');

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// نفترض إن id المنتج جاي من الرابط
$id = intval($_GET['id']); 

$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $product['name']; ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/bootstrap.css">

<script src="./js/bootstrap.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/productdetails.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container na">
        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-black" href="#">DEPOT</a>

        <!-- Hamburger Menu -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon navbar-dark"></span>
 

        </button>


        <!-- Menu Links -->
        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarNav"
        >
          <ul class="navbar-nav gap-4">
                    <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="index1.php">SHOP</a></li>
                     <li class="nav-item"><a class="nav-link" href="cart.php">CART</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">REGISTER</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
          </ul>
        </div>

        <!-- Right Icons -->
        <div class="d-flex align-items-center gap-4 nav-icons">
          <span ><a href="cart.php" style="text-decoration: none; color: black;">CART ()</a></span>
          <i class="fa-regular fa-heart "></i>
          <i class="fa-solid fa-bars "></i>
        </div>
      </div>
    </nav>
<div class="product_details">
<div class="container prod">
    <div class="row">
    <div class="left col-12 col-lg-6">
         <img src="images/<?php echo $product['image']; ?>" class="main-img" alt="<?php echo $product['name']; ?>">
    </div>
    <div class="right col-12 col-lg-6">
        <h1><?php echo $product['name'];?></h1>
        <div class="price"><?php echo $product['price'];?></div>
        <div class="stars">
           <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
            <i class="fa-regular fa-star"></i>
            <span class="review-count">(1 CUSTOMER REVIEW)</span>
        </div>
        <p><?php echo $product['description'];?></p>
         <div class="quantity-cart">
                <input type="number" id="productQty" value="1" min="1" class="form-control w-25 d-inline-block">
                <button id="addToCartBtn" class="btn btn-dark">Add to Cart</button>
            </div>
            
        <div class="wishlist">
          <i class="fa-solid fa-heart" style="color: #000000;"></i>
            <span>ADD TO WISHLIST</span>
        </div>
        <div class="details">
            <div>SKU: O23</div>
            <div>Categories: <a href="#">Accessories</a>, <a href="#">Fancies</a></div>
            <div>Tags: <a href="#">Decoration</a>, <a href="#">Modern</a></div>
        </div>
    </div>
    </div>
</div>
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
<script>
function changeImg(el) {
    document.getElementById('mainImg').src = el.src;
}
document.getElementById('addToCartBtn').addEventListener('click', function() {
    const qty = document.getElementById('productQty').value;
    const productId = <?= $product['id'] ?>;

    fetch(`add_to_cart.php?id=${productId}&qty=${qty}&ajax=1`)
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success'){
            alert("Product added to cart!");
            // تحديث أيقونة الكارت في الهيدر إذا موجودة
            const cartTotalEl = document.getElementById('cart-total');
            if(cartTotalEl){
                const current = parseInt(cartTotalEl.innerText.replace('$','')) || 0;
                cartTotalEl.innerText = '$' + (current + (<?= $product['price'] ?> * qty));
            }
        } else {
            alert("Error adding product to cart");
        }
    });
});
</script>


</body>
</html>
