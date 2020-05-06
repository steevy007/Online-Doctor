<?php
session_start();
require_once '../App/init.php';

use App\Model\AuthFilter;
use App\Model\User;
use App\Model\Friend;
//use App\Model\Status;
//include '../App/Controller/getStatus.ctrl.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $objet = User::getUser($_GET['id']);
    $_SESSION['identifiant'] = $_GET['id'];
    if (empty($objet)) {
        header('Location:/../../Pages/Profile.php?id=' . $_SESSION['session']['id'] . '');
        $_SESSION['identifiant'] = [];
    }
} else {
    header('Location:/../../Pages/Home.php');
}
AuthFilter::mustConnect();

?>
<style>
    comment-container {
        width: 60%;
        margin: 2rem auto;
    }

    a {
        color: #c40030;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    .v-btn {
        align-items: center;
        border-radius: 2px;
        display: inline-flex;
        height: 36px;
        flex: 0 0 auto;
        font-size: 14px;
        font-weight: 700;
        justify-content: center;
        margin: 6px 8px;
        min-width: 88px;
        outline: 0;
        text-transform: uppercase;
        text-decoration: none;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1), color 1ms;
        position: relative;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 0 16px;
    }

    .v-btn:before {
        border-radius: inherit;
        color: inherit;
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        opacity: 0.12;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
        width: 100%;
    }

    .v-btn:focus,
    .v-btn:hover {
        position: relative;
    }

    .v-btn:focus:before,
    .v-btn:hover:before {
        background-color: currentColor;
    }

    .v-btn__content {
        align-items: center;
        border-radius: inherit;
        color: inherit;
        display: flex;
        flex: 1 0 auto;
        justify-content: center;
        margin: 0 auto;
        position: relative;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
        white-space: nowrap;
        width: inherit;
    }

    .v-btn:not(.v-btn--depressed):not(.v-btn--flat) {
        will-change: box-shadow;
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14),
            0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    .v-btn:not(.v-btn--depressed):not(.v-btn--flat):active {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.2),
            0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12);
    }

    .avatar {
        width: 50px;
        height: 50px;
        margin-left: 0px;
        border-radius: 50%;
    }

    .v-avatar {
        align-items: center;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        position: relative;
        text-align: center;
        vertical-align: middle;
    }

    .v-avatar img {
        border-radius: 50%;
        display: inline-flex;
        height: inherit;
        width: inherit;
        object-fit: cover;
    }

    .v-card {
        text-decoration: none;
    }

    .v-card> :first-child:not(.v-btn):not(.v-chip) {
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
    }

    .v-card> :last-child:not(.v-btn):not(.v-chip) {
        border-bottom-left-radius: inherit;
        border-bottom-right-radius: inherit;
    }

    .v-sheet {
        display: block;
        border-radius: 2px;
        position: relative;
    }

    .v-dialog__container {
        display: inline-block;
        vertical-align: middle;
    }

    .elevation-2 {
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14),
            0 1px 5px 0 rgba(0, 0, 0, 0.12) !important;
    }

    *,
    :after,
    :before {
        box-sizing: inherit;
    }

    :after,
    :before {
        text-decoration: inherit;
        vertical-align: inherit;
    }

    * {
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }

    a:active,
    a:hover {
        outline-width: 0;
    }

    button {
        font: inherit;
        overflow: visible;
        text-transform: none;
        background-color: transparent;
        border-style: none;
        color: inherit;
    }

    [type="button"]::-moz-focus-inner,
    button::-moz-focus-inner {
        border-style: 0;
        padding: 0;
    }

    [type="button"]::-moz-focus-inner,
    button:-moz-focusring {
        outline: 0;
        border: 0;
    }

    button,
    html [type="button"] {
        -webkit-appearance: button;
    }

    img {
        border-style: none;
    }

    ::-ms-clear,
    ::-ms-reveal {
        display: none;
    }

    .headline {
        font-weight: 400;
        letter-spacing: normal !important;
        font-size: 24px !important;
        line-height: 32px !important;
    }

    .title {
        font-size: 20px !important;
        font-weight: 700;
        line-height: 1 !important;
        letter-spacing: 0.02em !important;
    }

    .caption {
        font-weight: 400;
        font-size: 12px !important;
    }

    .theme--light.v-btn {
        color: rgba(0, 0, 0, 0.87);
    }

    .theme--light.v-btn:not(.v-btn--icon):not(.v-btn--flat) {
        background-color: #f5f5f5;
    }

    .theme--light .v-card {
        box-shadow: rgba(0, 0, 0, 0.11) 0 15px 30px 0px,
            rgba(0, 0, 0, 0.08) 0 5px 15px 0 !important;
    }

    .theme--light.application .v-card {
        box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11),
            0 5px 15px 0 rgba(0, 0, 0, 0.08) !important;
        color: #102c3c !important;
    }

    .theme--light.v-card,
    .theme--light.v-sheet {
        background-color: #fff;
        border-color: #fff;
        color: rgba(0, 0, 0, 0.87);
    }

    a,
    a:hover {
        text-decoration: none !important;
    }

    .wrapper {
        overflow: auto;
    }

    .answers {
        padding-left: 64px;
    }

    .comment {
        overflow-y: auto;
        margin-left: 32px;
        margin-right: 16px;
    }

    .comment p {
        font-size: 14px;
        margin-bottom: 7px;
    }

    .displayName {
        margin-left: 24px;
    }

    .actions {
        display: flex;
        flex: 1;
        flex-direction: row;
        justify-content: flex-end;
    }

    .google-span[data-v-35838f51] {
        font-size: 14px;
        color: rgba(0, 0, 0, 0.54);
    }

    .google-button[data-v-35838f51] {
        background-color: #fff;
        height: 40px;
        margin: 0;
    }

    .headline {
        margin-left: 32px;
    }

    .sign-in-wrapper {
        margin-top: 16px;
        margin-left: 32px;
    }


    .error-message {
        font-style: oblique;
        color: #c40030;
    }

    ::-moz-selection,
    ::selection {
        background-color: #b3d4fc;
        color: #000;
        text-shadow: none;
    }

    .card,
    .card {
        padding: 32px 16px;
        margin-bottom: 32px;
        display: flex;
        flex-direction: column;
    }

    .application a,
    [type="button"],
    button {
        cursor: pointer;
    }

    @media screen and (max-width: 640px) {
        .comment-container {
            width: 90%;
        }

        .comments {
            padding: 32px;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | Profile</title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="/../Public/CSS/styleP.css">
</head>

<body>

    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>

    <div class="work">
        <h1 class="text-1">Mon profil</h1>
    </div>

    <section class="ftco-section  bg-light">
        <div class="container0">
            <div class="row">
                <div class="col-md-8 pb-4">


                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="card-title mb-4">
                                            <div class="d-flex justify-content-start">

                                                <div class="image-container">
                                                    <img src="<?= user::getAvatar($objet->email) ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-circle" alt="Image Profil" />

                                                </div>
                                                <div class="userData ml-3">
                                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                                        <?= ucfirst($objet->nom) . ' ' . ucfirst($objet->prenom) ?>
                                                        <span class="en"><i><?= $objet->typeUser == 'Medecin' ? '(' . $objet->specialite . ')' : '(Simple User)' ?></i></span>
                                                    </h2>
                                                    <h6 class="d-block">&nbsp;
                                                        <a href="https://wa.me/<?= substr($objet->telephone, 4, 10) ?>"><i class="fab fa-whatsapp fa-2x"></i></a>&nbsp;
                                                        <a href="mailto:<?= $objet->email ?>"><i class="fas fa-at fa-2x"></i></a>
                                                    </h6>
                                                    <h6 class="d-block ">
                                                      <?php //= Friend::getNumberFriend($objet->id) === 0 ? 'Aucune Relation &nbsp; <a class="btn btn-outline-primary btn-sm">Faire Des Relation</a>' : $_SESSION['session']['id']==$objet->id?Friend::getNumberFriendP($objet->id) . ' Contact  <a class="btn btn-outline-primary btn-sm">Visualiser</a> ':Friend::getNumberFriend($objet->id) . ' Contact  <a class="btn btn-outline-primary btn-sm">Visualiser</a> ' */?>
                                                      <?php
                                                     // echo $objet->id.' '.$_SESSION['session']['id'];
                                                        if($objet->id==$_SESSION['session']['id']){
                                                            if(Friend::getNumberFriend($_SESSION['session']['id']) == 0 ){
                                                               echo 'Aucune Relation &nbsp; <a class="btn btn-outline-primary btn-sm">Faire Des Relation</a>' ;
                                                            }else{
                                                                echo Friend::getNumberFriend($_SESSION['session']['id']).' Amis <a class="btn btn-outline-primary btn-sm">Visualiser</a> ';
                                                            }
                                                        }else{
                                                            if(Friend::getNumberFriend($objet->id) == 0){
                                                                echo 'Aucune Relation &nbsp; <a class="btn btn-outline-primary btn-sm">Faire Des Relation</a>' ;
                                                            }else{
                                                                echo Friend::getNumberFriend($objet->id).' Amis <a class="btn btn-outline-primary btn-sm">Visualiser</a> ';
                                                            }
                                                        }
                                                      ?>
                                                    </h6>


                                                    <h6>
                                                        <?php
                                                        if ($_GET['id'] == $_SESSION['session']['id']) {

                                                        ?>
                                                            <a href="../Pages/RequestFriend?id=<?= $objet->id ?>" class="btn btn-outline-info mt-2"><i class="fab fa-meetup"></i>
                                                                <span><?= Friend::getRequest($objet->id) ?></span> Friend
                                                                Request</a>
                                                        <?php
                                                        }

                                                        ?>
                                                        <?php
                                                        if ($_SESSION['session']['id'] != $objet->id) {
                                                            if (Friend::verifyRequest($_SESSION['session']['id'], $objet->id)) {

                                                        ?>
                                                                <a href="" class="btn btn-outline-info mt-2"><i class="fas fa-plus"></i>
                                                                    Annuler Demande</a>
                                                                <?php
                                                            } else {
                                                                if (Friend::verifyIfFriend($objet->id, $_SESSION['session']['id']) === true) {
                                                                    // echo $objet->id .' '. $_SESSION['session']['id'];
                                                                ?>
                                                                    <a href="../App/Controller/sendRequest.ctrl.php?myId=<?= $_SESSION['session']['id'] ?>&id_user=<?= $objet->id ?>" class="btn btn-outline-info mt-2"><i class="fas fa-plus"></i>
                                                                        Suivre</a>
                                                        <?php
                                                                }else{
                                                                    echo 'Connecte';
                                                                }
                                                            }
                                                        }
                                                        ?>


                                                    </h6>

                                                </div>
                                                <div class="ml-auto">
                                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Bio</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ml-1" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Nom Complet</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                <?= ucfirst($objet->nom) . ' ' . ucfirst($objet->prenom) ?>
                                                            </div>
                                                        </div>
                                                        <hr />

                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Adresse</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                <?= ucfirst($objet->adressePers) ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($objet->typeUser == 'Medecin') {
                                                        ?>
                                                            <hr />


                                                            <div class="row">
                                                                <div class="col-sm-3 col-md-2 col-5">
                                                                    <label style="font-weight:bold;">Hopital </label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    <?= ucfirst($objet->adresseClinic) ?>
                                                                </div>
                                                            </div>
                                                        <?php

                                                        }
                                                        ?>

                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Email</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                <a href="<?= $objet->email ?>"><?= $objet->email ?></a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($objet->typeUser == 'Medecin') {
                                                        ?>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-3 col-md-2 col-5">
                                                                    <label style="font-weight:bold;">Specialite</label>
                                                                </div>
                                                                <div class="col-md-8 col-6">
                                                                    <?= ucfirst($objet->specialite) ?>
                                                                </div>
                                                            </div>
                                                        <?php

                                                        }
                                                        ?>
                                                        <hr />
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-2 col-5">
                                                                <label style="font-weight:bold;">Telephone</label>
                                                            </div>
                                                            <div class="col-md-8 col-6">
                                                                <?= $objet->telephone ?>
                                                            </div>
                                                        </div>
                                                        <hr />

                                                    </div>
                                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">

                                                        <div class="col-md-12 pt-4">
                                                            <div class="why-edit-box">
                                                                <h3>Biographie</h3>
                                                                <p><?= $objet->description ?></p>
                                                                <img src="https://www.researchedit.org/public/images/book-icon.png" alt="Book Icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="col-md-4 " id="post_load">
                    <div class="row po">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <form id="formu" accept-charset="UTF-8" action="../App/Controller/PostStatus.ctrl.php" method="POST">
                                                    <textarea class="form-control counted" id="text" <?= $objet->id !== $_SESSION['session']['id'] ? 'disabled' : '' ?> <?= $objet->id !== $_SESSION['session']['id'] ? 'title="vous ne pouvez pas poster de status"' : 'title="Poster votre status"' ?> name="text" placeholder="Type in your message" rows="5" style="margin-bottom:10px;"></textarea>
                                                    <h6 class="pull-right" id="counter">150 characters remaining</h6>
                                                    <input id="submit" class="btn btn-info " type="submit" <?= $objet->id !== $_SESSION['session']['id'] ? 'disabled' : '' ?> value="Post
                                                        New Message" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row post" id="post-s">
                        <div class="col-md-12">
                            <div class="list-post">
                                <div class="row" id="listing">

                                    <?php
                                    include '../App/Controller/getStatus.ctrl.php';
                                    //$result = Status::getMyStatus($_GET['id']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </section>

    <?php require_once __DIR__ . '/../Partials/enPied.php' ?>

    <?php require_once __DIR__ . '/../Partials/loader.php' ?>

    <?php require_once __DIR__ . '/../Ressources/footer.js.php' ?>
    <script src="../Public/JS/status.js"></script>
    <script src="../Public/JS/postStat.js"></script>
    <script src="../Public/JS/TraitPostStatus.js"></script>
    <?php
    if (isset($_GET['id']) and isset($_GET['request'])) {
        if ($_GET['request'] == 'true') {
            echo "<script>alertify.success('Demande Envoye !!!');</script>";
        }
    } else if (isset($_GET['id']) and isset($_GET['request'])) {
        if ($_GET['request'] == 'false') {
            echo "<script>alertify.error('Desole veuillez essayer a nouveau');</script>";
        }
    } else if (isset($_GET['id']) and isset($_GET['isFriend'])) {
        if ($_GET['isFriend'] == 'true') {
            echo "<script>alertify.success('Vous Etes Maintenant connecte');</script>";
        }
    }
    //echo $_GET['request'];
    ?>

</body>

</html>