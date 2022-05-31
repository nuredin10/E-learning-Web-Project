<?php

    include '../Footer/Header.php';

?>

    <link rel="stylesheet" href="../Footer/header.css">
    <link rel="stylesheet" href="signup.css">
    <!-- <link rel="stylesheet" href="../Footer/header.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


<body>
      
    <div class="signup-wrapper">
        <div class="signup-image-wrapper">
            <img src="login.svg" alt="">
        </div>
        <div class="signup-form-wrapper">
            <h1>Signup</h1>
            <form method="post" action="loginSignupQuery.php" class="signup-form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <p class="incorrect-email incorrect"></p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
                <i class="fas fa-eye toggle"></i>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" required>
                <i class="fas fa-eye toggle"></i>
                <p class="incorrect-password incorrect"></p>
                <div>
                    <input type="checkbox" id="agree-to-terms" name="agree-to-terms" value="agree-to-terms">
                    <label style="margin-top: -0px; margin-left: 5px;" for="agree-to-terms">I agree to the <a href="#">Terms of user</a></label>
                    
                </div>
                
                <input type="submit" name="submit-signup" id="submit-signup" value="Signup">
                <p>Already have an account? <a href="./login.php">Login</a></p>
            </form>
        </div>
    </div>
    <script src="./jquery.js"></script>
    <script src="./signup.js"></script>
    
    <?php

        include '../Footer/footer.php';

?>
</body>
</html>