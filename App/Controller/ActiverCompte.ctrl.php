<?php
require_once '../init.php';
use App\Model\User;
if(isset($_GET['email']) AND isset($_GET['token'])){
    $email=$_GET['email'];
    if(!empty($_GET['email'])){
        if(User::verifyEmail($email)==true){
            User::addUser($email);
            header('Location:../../../../Pages/Login.php?verify=true');
        }else{
            header('Location:Location:../../../../Pages/Home.php');
        }
      
    }
}else{
    header('Location:../../../../Pages/Home.php');
}

