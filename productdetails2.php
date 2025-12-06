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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
      padding-top: 80px;
}

.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  background: transparent;
background-color: #fff;
color: black;
height: 100px;
}
.navbar-light .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='black' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/ %3E%3C/svg%3E");
}
.navbar .nav-link {
  color: rgb(0, 0, 0) !important;
  font-size: 14px;
  letter-spacing: 2px;
  font-weight:600;
}

.nav-icons i {
  font-size: 18px;
  cursor: pointer;
  color: #000;
}
.prod {
    display: flex;

    margin: auto;
   
    
    padding: 20px;
     justify-content: center;
    align-items: center;
}
.product_details{
background-color: #fafafa;
width: 100%;
height: 90vh;
   display: flex;
    align-items: center;
}
.left {
    display: flex;
    padding-right: 20px;
    justify-content: center;
    align-items: center;
}
.stars{
    margin-top: 20px;
}

.main-img {
    width: 90%;
    margin-bottom: 10px;
}
.thumbnails img {
    width: 60px;
    margin: 5px;
    cursor: pointer;
    border: 1px solid #ccc;
    display: block;
}
h1 {
    font-size: 24px;
    margin-bottom: 10px;
}
.price {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    margin-top: 20px;
}
.stars{
    font-size: 15px;
}
.review-count {
    color: #777;
    font-size: 12px;
    margin-left: 5px;
}
p {
    line-height: 1.5;
    color: #555;
}
.quantity-cart {
    display: flex;
    margin: 15px 0;
}
.quantity-cart input {
    width: 100px;
    padding: 5px;
    border: 1px solid #ccc;
    text-align: center;
    
}
.quantity-cart button {
    background: #000;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
   font-weight: bold;
}
.wishlist {
    margin: 10px 0;
    display: flex;
    align-items: center;
    cursor: pointer;
}
.wishlist span {
    margin-left: 5px;
}
.details {
    font-size: 14px;
    color: #555;
}
.details a {
    color: #777;
    text-decoration: none;
}
.details a:hover {
    text-decoration: underline;
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
}</style>
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
            <li class="nav-item"><a class="nav-link" href="#">PAGES</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php">SHOP</a></li>
            <li class="nav-item"><a class="nav-link" href="#">PORTFOLIO</a></li>
            <li class="nav-item"><a class="nav-link" href="#">BLOG</a></li>
            <li class="nav-item"><a class="nav-link" href="#">ELEMENTS</a></li>
          </ul>
        </div>

        <!-- Right Icons -->
        <div class="d-flex align-items-center gap-4 nav-icons">
          <span ><a href="cart.php" style="text-decoration: none; color: black;">CART ($0)</a></span>
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
