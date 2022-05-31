
<?php

// include '../Footer/Header.php';
// require './loginQuery.php';

include '../config.php';

// require './login.php';


    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



if(isset($_POST['submit-login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo $username;
    $isSuccess = "";
    $typeofUser = "";

    $sql = "CALL uspInsertLogin('$username','$password')";
   $result = mysqli_query($connect,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $isSuccess = $row['Status'];
            $typeofUser = $row['Type'];
        }
        echo $isSuccess.$typeofUser;
    }
    // $currentUser = $username;
    
    if($isSuccess == 1){
        $_SESSION['currentUser'] = $username;
        if($typeofUser == "student"){
            header("location: ../Student/student.php");
        }
        else{
            header("location:../Teacher/teacher.php?username = {$currentuser}");
        }
    }
    else{
        // echo "adcasdcasdc";
            
           $_SESSION['error'] = 'block';
        
    }
    
}



if(isset($_POST['submit-signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $currentUser = $username;
    $sql = "call uspInsertSignup ('$username','$password')";

    $result = mysqli_query($connect,$sql);
    if($result){
        $_SESSION['currentUser'] = $username;
        header("location: ../Forms/select-form.php");
    }
    else{
        echo mysqli_errno($connect);
    }
}








?>