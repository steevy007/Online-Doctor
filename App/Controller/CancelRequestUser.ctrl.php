<?php
session_start();
require_once '../init.php';
use App\Model\Friend;
if(isset($_GET['id']) AND !empty($_GET['id']) AND is_numeric($_GET['id'])){
    if(Friend::cancelRequestUser($_SESSION['session']['id'],$_GET['id'])){
        header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profil/$_GET[id]/Cancel/true");
    }
}