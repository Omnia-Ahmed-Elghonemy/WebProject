<?php
session_start();
$conn = mysqli_connect("localhost","root","","store_info");

// لما الصفحة تفتح عادي بدون POST.. مفيش لوجين
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]);

    // query
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // check password hash
        if (password_verify($password, $user["password"])) {

            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $user["email"];

            if ($remember) {
                setcookie("remember_email", $user["email"], time() + (86400 * 7));
            }

            header("Location: home.php");
            exit();

        } else {
            $_SESSION["error"] = "Incorrect password";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION["error"] = "Email not found";
        header("Location: login.php");
        exit();
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>

<style>
    body {
        background-image: url("image/bg.jpg");  
        background-size: cover;
        background-position: center;
                
         background-repeat: no-repeat;  
         height: 100vh;                
         margin: 0;
    }

    .login-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        width: 380px;
        padding: 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.15);
    }
    /* دايرة الأيقونة */
.login-icon-container {
    width: 120px;       /* حجم أكبر للصورة */
    height: 120px;
    margin: 0 auto;
    border-radius: 50%;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border: 3px solid #000; */  /* شلنا البوردر */
    box-shadow: 0 4px 12px rgba(0,0,0,0.3); /* ممكن تسيبيه لو تحبي ظل */
}

.login-icon-container img {
    width: 170px;
    height: 170px;
   border-radius: 50%;
    object-fit: cover;
}


/* كلمة Login تحت الأيقونة */
.login-title {
    text-align: center;
    margin-top: 15px;
    font-family: Arial, sans-serif;
    font-weight: bold;
    font-size: 24px;
    color: #333;
}


    button {
        width: 100%;
        padding: 12px;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }
    button:hover {
    background-color: #333; /* يغيّر اللون عند المرور */
     
    box-shadow: 0 4px 12px rgba(0,0,0,0.3); /* ظل خفيف */
}
</style>

</head>
<body>

<div class="login-container">
    <form class="login-box" method="POST" action="login.php">

   <div class="text-center mb-4">
    <div class="login-icon-container">
        <img src="image/login_icon.jpg" alt="Login Icon">
    </div>
    <h2 class="login-title">Login</h2>
</div>

    


           <!-- error message -->
    <?php
    if (isset($_SESSION["error"])) {
        echo '<div class="alert alert-danger text-center">'.$_SESSION["error"].'</div>';
        unset($_SESSION["error"]);
    }
    ?>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Remember me</label>
        </div>

        <button type="submit" class="w-100">Sign In</button>

    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
