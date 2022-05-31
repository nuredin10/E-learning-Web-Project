<?php

    // $dbhost = "localhost";
    // $dbname = "e learning";
    // $dbuser = "root";
    // $dbpass = "";

    $db = new PDO("mysql:host=localhost;dbname=e_learning", "root", "");
    
    // try{
    // $db = new PDO("mysql:dbhost = $dbhost;dbname = $dbname", "$dbuser", "$dbpass");
    // }
    // catch(PDOException $e){
    //     echo $e->getMessage();
    // }
    
    // $user = 'anna';


    

    $connect = mysqli_connect("localhost","root","","e_learning") or die("connection error".mysqli_connect_error());
    // $db = new PDO("mysql:host=localhost;dbname=e learning", "root", "");
    
?>