<?php

    include '../config.php';

    if(isset($_POST['student-register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phoneno'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $department = $_POST['department'];
        $password = $_POST['password'];

        $sql = "call uspInsertStudent ('$firstname','$lastname','$address','$birthday','$email','$phone','$username','$password','$department')";
        $result = mysqli_query($connect,$sql);
        if($result){
            header("location: ../Student/student.php");
        }
        else{
            echo "error";
        }
    
    }

    if(isset($_POST['teacher-register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phoneno'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        // $department = $_POST['department'];
        $highschool = $_POST['highschool'];
        $collegename = $_POST['collegeName'];
        $degree =$_POST['degree'];
        $department = $_POST['department'];
        $password = $_POST['password'];

        $sql = "call uspInsertInstructor ('$firstname','$lastname','$address','$birthday','$email','$phone','$username','$password','$department','$highschool','$degree','$collegename')";
        $result = mysqli_query($connect,$sql);
        if($result){
            header("location: ../Teacher/teacher.php");
        }
        else{
            echo "error";
        }
        // echo "asdcasdc";
    }

?>