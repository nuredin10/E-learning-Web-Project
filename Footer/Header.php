<?php

include_once '../Login-Signup/loginSignupQuery.php';

if(isset($_POST['logout'])){
    // echo "asdcasdcadcadscasdcasdc";
    header("location: ../Login-Signup/login.php");
}

?>
    <link rel="stylesheet" href="header.css">
    <style>
        .myAccount-wrapper {
            width: 150px;
            height: 150px;
            border-radius: 4px;
            border: 1px solid #9b9a9a;
            background-color: #f8f8f8;
            position: absolute;
            z-index: 1;
            float: right;
            display: flex;
            justify-content: flex-end;
            margin-top: 2%;
            /* position: relative; */
            /* left: -1%; */
            /* padding-left: -60%; */
            /* padding-top: 1%; */
            
        }
        .myAccount-wrapper p{
            margin-left: 30%;
            margin-top: 7%;
            font-size: 18px;
        }
        .myAccount-wrapper form{
            margin-left: -0%;
        }
        .myAccount-wrapper p:hover{
            background-color: gray;
        }
        .myAccount-wrapper hr{
            /* width: 100%; */
            margin-left: 5px;
        }
        .username{
            /* margin-left: 30px; */
            
        }
        .logout{
            margin-top: 10%;
        }
        
    </style>

<body>
    <div class="header">
        <div class="logo-wrapper">
            <p><img src="" alt="logo"></p>
        </div>
        <nav class="nav-wrapper">
            <ul class="main-nav">
                <li><a href="../Home-page/Home-page.php">Home</a></li>
                <li><a href="../Course-list/course-list.php">Courses</a></li>
                <li><a href="../Category/courses.php">Category</a></li>
                <li><a href="../About-us/About-us.php">About us</a></li>
                <!-- <li> <button id="login">Login</button></li> -->
                <li>
                    <div>
                        <button id="my-account">Account</button>
                        <div class="myAccount-wrapper">
                            
                            <?php
                            
                                echo "<p class='username'>".$_SESSION['currentUser']."</p> <hr>";
                            ?>
                            <p>My Profile</p>
                            <p>Settings</p>
                            <form method="post">
                                 <button  name='logout' class="logout">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>

            </ul>

        </nav>


    </div>

    <script src="../jquery.js"></script>
    <!-- <script src="./Header.js"></script> -->
    <script>
        // loginButton = document.getElementById("submit-login");
        accountButton = document.getElementById("my-account");
        myAccountWrapper = document.querySelector(".myAccount-wrapper");
        $(".myAccount-wrapper").css({"display":  "none"});
        accountButton.onclick = () => {
            if($(".myAccount-wrapper").css("display")=="none" ){
                $(".myAccount-wrapper").css({"display":  "block"});
            }
            else{
                $(".myAccount-wrapper").css({"display":  "none"});
            }
        }   
    </script>
</body>

</html>