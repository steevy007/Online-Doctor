<?php
session_start();
require_once '../init.php';
use App\Model\Friend;
if(isset($_GET['id'])){
    if(!empty($_GET['id'])){
        if(Friend::addFriend($_SESSION['session']['id'],$_GET['id'])){
            header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$_GET[id]&isFriend=true");
        }
    }
}