<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css">

<title>Register</title>
<style>
  .bg-box {
            width: 100%;
            height: 100vh;
          
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

         
       body {
    font-family: Arial, Helvetica, sans-serif;
    
    margin: 0;
    padding: 0;
     background-image: url("images/bg.jpg"); /* خليه بدون مسافات */
        background-size: cover;
        background-position: center;
                
         background-repeat: no-repeat;  
         height: 100vh;                
        
}

.form-box {
    width: 100%;
    max-width: 420px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 12px;            /* بوردر ريديس */
     box-shadow: 0 5px 20px rgba(0,0,0,0.3); /* شادو على الفورم */

   
}


</style>



</head>
<body>
<div class="container d-flex align-items-center justify-content-center vh-100">
<div class="bg-box  ">
    <div class="form-box  w-50 p-4 border border-3  ">

            <h2 class="text-center mb-3">Register</h2>

      
    <form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="tel" class="form-control" name="phone" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" required>
    </div>

    <button type="submit" class="btn btn-dark w-100" name="submit">Submit</button>
</form>

       
    </div>
</div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $conn = mysqli_connect("localhost","root","","furniture_store");

    if($conn) {
        $name     = mysqli_real_escape_string($conn, $_POST['name']);
        $email    = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
        $address  = mysqli_real_escape_string($conn, $_POST['address']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `users`(`name`, `email`, `password`, `phone`,`address`) 
                  VALUES ('$name', '$email', '$hashed_password', '$phone','$address')";

        if(mysqli_query($conn, $query)) {
            // بعد التسجيل، نرسل المستخدم إلى صفحة insert.php
            header("Location:home.php");
            exit();
        }

        mysqli_close($conn);
    }
}
?>



</body>
</html>
       