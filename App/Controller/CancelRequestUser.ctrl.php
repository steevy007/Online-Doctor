<?php
session_start();
require_once '../init.php';
use App\Model\Friend;
if(isset($_GET['id']) AND !empty($_GET['id']) AND is_numeric($_GET['id'])){
    if(Friend::cancelRequestUser($_GET['id'],$_SESSION['session']['id'])){
        header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$_GET[id]&cancelRequest=true");
    }
}