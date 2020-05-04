<?php
require_once '../init.php';
use App\Model\Status;
if(!empty($_GET['id_user']) AND !empty($_GET['id_post'])){
    Status::Disike($_GET['id_user'],$_GET['id_post']);
    $id=$_GET['id'];

    header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=.$id.");
}