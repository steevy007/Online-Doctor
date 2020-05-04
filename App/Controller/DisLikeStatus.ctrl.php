<?php
require_once '../init.php';
session_start();
use App\Model\Status;
if(!empty($_GET['id_user']) AND !empty($_GET['id_post']) AND !empty($_GET['id_p'])){
    Status::Disike($_GET['id_user'],$_GET['id_post']);
    $id=$_SESSION['identifiant'] ;
    header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$id");
}