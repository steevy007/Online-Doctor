<?php
session_start();
require_once '../App/init.php';

use App\Model\User;
use App\Model\Singleton;
use App\Model\Friend;

if (isset($_GET['id']) and  !empty($_GET['id']) and is_numeric($_GET['id'])) {
    $dataReq = Friend::getAllFriendList($_GET['id']);
} else {
    header("Location:http://localhost/Online Doctor/Pages/Profile.php?id=308");
    //http://localhost/Online%20Doctor/Pages/ListUserFriend.php?id=2
}
$data = $dataReq->fetchAll(\PDO::FETCH_ASSOC);
$nbre_total_articles = $dataReq->rowCount();
$nbre_articles_par_page = 16;
$nbre_pages_max_gauche_et_droite = 2;
$last_page = ceil($nbre_total_articles / $nbre_articles_par_page);
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page_num = $_GET['page'];
} else {
    $page_num = 1;
}

if ($page_num < 1) {
    $page_num = 1;
} else if ($page_num > $last_page) {
    $page_num = $last_page;
}

$limit = 'LIMIT ' . ($page_num - 1) * $nbre_articles_par_page . ',' . $nbre_articles_par_page;

$pagination = '';
$pagination = '';

if ($last_page != 1) {
    if ($page_num > 1) {
        $previous = $page_num - 1;
        $pagination .= '<li class="prev "><a href="../Pages/ListUser.php?page=' . $previous . '">&lt;</a></li>';
        //$pagination .= '<a href="../Pages/ListUser.php?page='.$previous.'">Précédent</a> &nbsp; &nbsp;';

        for ($i = $page_num - $nbre_pages_max_gauche_et_droite; $i < $page_num; $i++) {
            if ($i > 0) {
                $pagination .= '<li><a href="../Pages/ListUser.php?page=' . $i . '">' . $i . '</a></li>';
                //$pagination .= '<a href="../Pages/ListUser.php?page='.$i.'">'.$i.'</a> &nbsp;';
            }
        }
    }
    $pagination .= '<li class="active"><a href="#">' . $page_num . '</a></li>';
    //$pagination .= '<span class="active">'.$page_num.'</span>&nbsp;';

    for ($i = $page_num + 1; $i <= $last_page; $i++) {
        $pagination .= '<li><a href="../Pages/ListUser.php?page=' . $i . '">' . $i . '</a></li>';
        //$pagination .= '<a href="../Pages/ListUser.php?page='.$i.'">'.$i.'</a> ';

        if ($i >= $page_num + $nbre_pages_max_gauche_et_droite) {
            break;
        }
    }

    if ($page_num != $last_page) {
        $next = $page_num + 1;
        $pagination .= '<li class="next"><a href="../Pages/ListUser.php?page=' . $next . '">&gt;</a></li>';
        // $pagination .= '<a href="../Pages/ListUser.php?page='.$next.'">Suivant</a> ';
    }
}
$inDB = Singleton::getInsDB();
$conn = $inDB->getConn();
$pureData = [];
try {
    $sql = $conn->prepare("SELECT * FROM users INNER JOIN friends WHERE users.id=friends.idFriend AND friends.myId=? ORDER BY idFriend ASC $limit");
    $sql->execute([$_GET['id']]);
    $pureData = $sql->fetchAll(\PDO::FETCH_ASSOC);
} catch (\Exception $e) {
}
//var_dump($pureData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | List User </title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="/../Public/CSS/styleP.css">
</head>

<body>


    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>


    <div class="work-1">
        <h1 class="text-2">Liste Amis de <?= Friend::getFullNameUser($_GET['id']) ?></h1>
    </div>


    <div class="container mb-4 mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-8 ">
                <form action="" class="form-s">
                    <input type="search" class="inp-s">
                    <i class="fa fa-search"></i>
                </form>
            </div>
        </div>
    </div>

    <section>
        <div class="container mb-4 mt-4">
            <?php
            foreach (array_chunk($pureData, 4) as $data_users) {
            ?>
                <div class="row">
                    <?php

                    foreach ($data_users as $user) {
                        if (true) {
                    ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <?php

                                if ($sql->rowCount() != 0) { ?>
                                    <div class="our-team">
                                        <div class="picture">
                                            <img class="img-fluid im" src="<?= User::getAvatar($user['email']) ?>">
                                        </div>
                                        <div class="team-content">
                                            <h4 class="name"><?= $user['nom'] . ' ' . $user['prenom'] ?></h4>
                                            <h4 class="title"><?= $user['typeUser'] == 'Medecin' ? '<i class="fas fa-user-md fa-2x text-dark"></i> &nbsp ' . $user['specialite'] : '<i class="fas fa-user-circle fa-2x text-muted"></i> &nbsp Simple User' ?></h4>
                                        </div>
                                        <ul class="social">
                                            <li><a href="../Pages/Profile.php?id=<?= $user['idFriend'] ?>" class="far fa-eye" aria-hidden="true"></a></li>
                                            <li><a href="https://codepen.io/collection/XdWJOQ/" class="fas fa-user-friends" aria-hidden="true"></a></li>
                                        </ul>
                                    </div>
                                    <?php
                                }?>
                            </div>
                <?php
                                }
                            }
                        }

                ?>
                <?= $sql->rowCount()==0?' <h4><i class="fab fa-creative-commons-zero"></i> &nbsp; Pas D\'Amis</h4>':'' ?>
                </div>
            <?php
            
            ?>
        </div>
    </section>

    <?php
        if($sql->rowCount()>1){
    ?>

    <div class="container mb-2 mt-2">
        <div class="row">
            <div class="col col-sm-4 offset-sm-4">
                <div class="pagination">
                    <ul>
                        <?= $pagination ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <?php require_once __DIR__ . '/../Partials/enPied.php' ?>

    <?php require_once __DIR__ . '/../Partials/loader.php' ?>

    <?php require_once __DIR__ . '/../Ressources/footer.js.php' ?>
    <script src="/../Public/JS/status.js"></script>
    <script src="/../Public/JS/postStat.js"></script>
    <script src="/../Public/JS/TraitEditProfil.js"></script>
    <script src="/../Public/JS/paginationScript.js"></script>
</body>

</html>