<?php
session_start();
require_once '../init.php';
use App\Model\Status;
if(!empty($_GET['id_user']) AND !empty($_GET['id_post']) AND !empty($_GET['id_p'])){
    Status::Like($_GET['id_user'],$_GET['id_post']);
    $id=$_SESSION['identifiant'] ;
    header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profil/$id");
}