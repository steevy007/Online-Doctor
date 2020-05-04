<?php
require_once '../init.php';
use App\Model\Friend;
if(!empty($_GET['myId']) AND !empty($_GET['id_user'])){
    $object=new Friend("",$_GET['myId'],$_GET['id_user'],"","");
    //$object->sendRequest();
    if($object->sendRequest()==true){
        header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$_GET[id_user]&request=true");
    }else{
        header("Location:https://online-doctorapp.000webhostapp.com/Pages/Profile.php?id=$_GET[id_user]&request=false");
    }
}