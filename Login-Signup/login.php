<?php

    include '../Footer/Header.php';
    // require './loginQuery.php';

    include '../config.php';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../Footer/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>  
    <div class="login-wrapper">
        <div class="login-image-wrapper">
            <img src="login.svg" alt="">
        </div>
        <div class="login-form-wrapper">
            <h1>Login</h1>
            <form action="loginSignupQuery.php" method="post" class="login-form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="username here" value="" required autofocus>
                <!-- <input type="text" name="email" id="email" required> -->
                <!-- <p id="incorrect-email" class="incorrect"></p> -->
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <i class="fas fa-eye toggle"></i>
                <div>
                    <input type="checkbox" id="remember-me" name="remember-me" value="remember">
                    <label style="margin-top: -0px; margin-left: 5px;" for="remember-me">Remember me</label>
                    <a href="#">forgot password?</a>
                </div>
                <p class="incorrect-email-pass incorrect">Incorrect Username or Password</p>
                <input type="submit" name="submit-login" id="submit-login" value="Login">
                <p>Not registerd yet? <a href="./signup.php">Create an account</a></p>
            </form>
        </div>
    </div>
    
    <script src="jquery.js"></script>
    <script src="login.js"></script>

    <?php

        include '../Footer/footer.php';

?>
</body>
</html>


