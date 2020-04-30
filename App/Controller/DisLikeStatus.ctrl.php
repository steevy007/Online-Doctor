<?php
require_once '../init.php';
use App\Model\Status;
if(!empty($_GET['id_user']) AND !empty($_GET['id_post'])){
    Status::Disike($_GET['id_user'],$_GET['id_post']);
    //var_dump($_SERVER);

    header('Location:'.$_SERVER['HTTP_REFERER']);
}