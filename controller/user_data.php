<?php
    //! Set timezone 
    date_default_timezone_set('Asia/Kolkata'); 
    include_once("./core/database.php");
    include_once("./core/user.php");
    
    //! Instantiate DB & connect
    $database = new database();
    $db = $database->connect();
    $user = new user($db);
    $user->email = $_SESSION['userId'];
    $result = $user->select_user();
    if(!@$result){
        echo "something went wrong";
        session_destroy();
        header("location: login.php");

        die();
        

    }
   
