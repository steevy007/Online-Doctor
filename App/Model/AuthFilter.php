<?php
namespace App\Model;
class AuthFilter{
    public static function mustConnect(){
        if(!isset($_SESSION['session'])){
            header('Location:../Pages/Login.php');
        }
    }

    public static function alreadyConnect(){
        if(isset($_SESSION['session']) AND !empty($_SESSION['session'])){
            header('Location:../Pages/Home.php');
        }
    }
}