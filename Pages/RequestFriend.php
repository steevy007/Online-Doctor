<?php
session_start();
require_once '../App/init.php';

use App\Model\AuthFilter;
use App\Model\Friend;
use App\Model\User;

$req = Friend::getAllRequestFriend($_GET['id']);
$objet = $req->fetchAll(\PDO::FETCH_OBJ);
AuthFilter::mustConnect();
AuthFilter::mustBeAdmin($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | Profile</title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="../Public/CSS/styleP.css">
    <link rel="stylesheet" href="../Public/CSS/styleRequest.css">
    <style>

    </style>
</head>

<body>
    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>

    <div class="work-1">
        <h1 class="text-2">Request | Friend</h1>
    </div>

    <section class="container id_sec mb-4 mt-4">
        <div class="row" id="request_friend">
            <div class="col-md-8 mb-4">
                <?php
                foreach ($objet as $value) {
                    if ($req->rowCount() !== 0) {
                ?>
                        <div class="testimonials">
                            <div class="row mb-2 id_p">
                                <div class="col-md-12 testimonial">
                                    <div class="row ">
                                        <div class="avatar col-md-5">
                                            <a href="#">
                                                <img class="img-circle size_img" src="<?= User::getAvatar($value->email) ?>" alt="Avatar" width="105px">
                                            </a>
                                        </div>

                                        <div class="testimonial-main col-md-7">
                                            <h4><?= $value->nom . ' ' . $value->prenom ?></h4>
                                            <a href="../App/Controller/AcceptedFriend.ctrl.php?id=<?= $value->myId ?>" class="text-success"><i class="fas fa-check fa-2x"></i></a>
                                            <a href="../App/Controller/CancelRequestUser.ctrl.php?id=<?= $value->myId ?>" class="text-danger"><i class="far fa-times-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <?= $req->rowCount()==0?'<h1>Aucune Demande</h1>':'' ?>
            </div>


            <div class="col-md-4 mt-4">
                <h3>Lorem ipsum dolor sit amet.</h3>
            </div>
        </div>

    </section>


    <?php require_once __DIR__ . '/../Partials/enPied.php' ?>

    <?php require_once __DIR__ . '/../Partials/loader.php' ?>

    <?php require_once __DIR__ . '/../Ressources/footer.js.php' ?>
</body>

</html>