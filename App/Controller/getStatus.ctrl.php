<?php
session_start();
require_once __DIR__ . '../../init.php';
use App\Model\Status;
use App\Model\User;

$objet = User::getUser($_SESSION['identifiant']);
$result = Status::getMyStatus($_SESSION['identifiant']);
if ($result->rowCount() != 0) {
    $data = $result->fetchAll(\PDO::FETCH_OBJ);
    foreach ($data as $value) {
    

?>


        <div class="col-md-12">
            <div class="card v-card v-sheet theme--light elevation-2">
                <div class="header">
                    <div class="v-avatar avatar" style="height: 50px; width: 50px;"><img src="<?= User::getAvatar($objet->email) ?>"></div>
                    <span class="displayName title"> <?= $objet->nom[0] . $objet->prenom[0] ?> </span> <span class="displayName caption"><?= $value->post_at ?></span>
                </div>
                <!---->
                <br>
                <div class="wrapper comment">
                    <p><?= $value->text_post ?></p>
                </div>
                <div class="actions">
                    <!---->
                    <!---->
                    <!---->
                </div>
                <div class="text-right">
                    <a  href="../App/Controller/LikeStatus.ctrl.php?id_p=<?= $_SESSION['identifiant'] ?>&id_user=<?= $_SESSION['session']['id'] ?>&id_post=<?= $value->id ?>" style="color:green" class="text-secondaire" id="s_like"><span><?= Status::getNbLike($value->id) ?></span>&nbsp;<i class="far fa-thumbs-up "  ></i></a>
                    <a href="../App/Controller/DisLikeStatus.ctrl.php?id_p=<?= $_SESSION['identifiant'] ?>&id_user=<?= $_SESSION['session']['id'] ?>&id_post=<?= $value->id ?>" style="color:red" class="text-secondaire"><span><?= Status::getDisLike($value->id) ?></span>&nbsp;<i class="far fa-thumbs-down " id="dislike"></i></a>
                    </div>
            
                <div class="v-dialog__container" style="display: block;"></div>
            </div>
        </div>
        <script src="../Public/JS/TraitLikeStatus.js"></script>

    <?php
    }
} else {
    ?>
    <div class="col-md-12">
        <h1>Aucun Status</h1>
    </div>
<?php
}
?>
