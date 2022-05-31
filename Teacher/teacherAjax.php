<?php

    include '../Login-Signup/loginSignupQuery.php';
    // session_start();
    include "../config.php";  
    // require './user.php'; 
    // $user = "nuredina";
    if(isset($_REQUEST['action'])){
        switch( $_REQUEST['action'] ){
            case "SendMessage":
              $query =  $db->prepare("INSERT INTO chat SET LoginID=?, user=?, message=?");
              $query->execute([20, $_SESSION['currentUser'], $_REQUEST['message']]);
            //   echo 1;
            break;

            case 'getChat';
                $query =  $db->prepare("SELECT * from chat");
                $query->execute();
                $rs = $query->fetchAll(PDO::FETCH_OBJ);
                
                $chat = '';
                $username = "";
                foreach( $rs as $r ){
                    // $chat .= $r->user.' '.$r->message;
                        if($r->user ==  $_SESSION['currentUser']){
                           
                            $chat = "<div class='chat outgoing'><p>".$r->message."</p></div>";
                            
                        }  
                        else{
                            // $username =  "<h4 class='username'>".$user."</h4>";
                            $chat = "<div class='chat incoming'><p>".$r->message."</p></div>";
                        }
                echo $chat;
        }
    }
}



?>