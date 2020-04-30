<?php
session_start();
require_once '../App/init.php';

use App\Model\AuthFilter;
use App\Model\User;
$objet=User::getUser($_SESSION['session']['id']);
AuthFilter::mustConnect();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Doctor | Edit Profile</title>
    <?php require_once __DIR__ . '/../Ressources/head.css.php' ?>
    <link rel="stylesheet" href="/../Public/CSS/styleP.css">
</head>

<body>

    <?php require_once __DIR__ . '/../Partials/enTete.php' ?>

    <div class="work">
        <h1 class="text-1">Editer Mon profil</h1>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">

                    <form action="../App/Controller/Edit_profil.ctrl.php" id="form" class="p-5 bg-white" method="POST">

                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" value="<?= $objet->nom ?>" class="form-control" placeholder="Sanon" data-parsley-required>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="prenom">Prenom</label>
                                <input type="text" id="prenom" name="prenom" value="<?= $objet->prenom ?>" class="form-control" placeholder="Sanon" data-parsley-required>
                            </div>
                        </div>

                        
                        <div class="row form-group mb-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="AdressePersonnel">Type Utilisateur</label>
                                <input type="text" name="typeUser" id="typeUser" value="<?= $objet->typeUser ?>" class="form-control" placeholder="Delmas 40B" data-parsley-trigger="blur" data-parsley-required>
                            </div>
                        </div>

                        <div class="row form-group mb-5">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="AdressePersonnel">Adresse Personnel</label>
                                <input type="text" id="adressePers" name="adressePers" value="<?= $objet->adressePers ?>" class="form-control" placeholder="Delmas 40B" data-parsley-trigger="blur" data-parsley-minlength="10" data-parsley-required>
                            </div>
                        </div>

                        <div class="row form-group mb-5" id="b-adresseClinic">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Adresse Clinic</label>
                                <input type="text" id="adresseClinic" name="adresseClinic" value="<?= $objet->adresseClinic ?>" class="form-control" data-parsley-trigger="blur" data-parsley-minlength="10" placeholder="Delmas 40B">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="telephone">Telephone</label>
                                <input type="tel" id="tel" name="tel" class="form-control" value="<?= substr($objet->telephone,4,10) ?>" placeholder="000000" data-parsley-trigger="blur" data-parsley-maxlength="8" data-parsley-required>
                            </div>
                        </div>

                        <div class="row form-group mb-5" id="b-speciality">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="Speciality">Specialite</label>
                                <select name="speciality" id="speciality" class="form-control" >
                                    <option value="Gunecologue" <?= $objet->specialite=='Gunecologue'?'selected':'' ?>>Gunecologue</option>
                                    <option value="Chirurgien"  <?= $objet->specialite=='Chirurgien'?'selected':'' ?>>Chirurgien</option>
                                    <option value="Dentiste" <?= $objet->specialite=='Dentiste'?'selected':'' ?>>Dentiste</option>
                                    <option value="Anestesiste" <?= $objet->specialite=='Anestesiste'?'selected':'' ?>>Anestesiste</option>
                                    <option value="Pediatre" <?= $objet->specialite=='Pediatre'?'selected':'' ?>>Pediatre</option>
                                    <option value="Urologue" <?= $objet->specialite=='Urologue'?'selected':'' ?>>Urologue</option>
                                    <option value="Cardiologue" <?= $objet->specialite=='Cardiologue'?'selected':'' ?>>Cardiologue</option>
                                    <option value="Generaliste" <?= $objet->specialite=='Generaliste'?'selected':'' ?>>Generaliste</option>
                                    <option value="Ophtalmologue"  <?= $objet->specialite=='Ophtalmologue'?'selected':'' ?>>Ophtalmologue</option>
                                    <option value="Pneumologue"  <?= $objet->specialite=='Pneumologue'?'selected':'' ?>>Pneumologue</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" class="form-control" value="<?= $objet->id ?>" placeholder="000000" data-parsley-trigger="blur" data-parsley-maxlength="8">
                                

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="telephone">Ancien Password</label>
                                <input type="password" id="AncP" name="AncP" class="form-control" placeholder="000000" data-parsley-trigger="blur" data-parsley-maxlength="8">
                                <span class="text-info" id="spa"><i>*** Si vous ne voulez pas modifier votre password ignorez ce champ ***</i></span>
                            </div>
                        </div>

                        <div class="row form-group mb-5" id="zonePass">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="password">Nouveau Password</label>
                                <input type="password" id="password" name="password"  class="form-control" data-equalto="#Cpassword" data-parsley-maxlength="8" data-parsley-trigger="blur">
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="Cpassword">Confirm Password</label>
                                <input type="password" id="Cpassword" name="Cpassword"  class="form-control" data-equalto="#password" data-parsley-maxlength="8" data-parsley-trigger="blur">
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-md-12">
                                <h3>Pitch</h3>
                            </div>
                            <div class="col-md-12 mb-3 mb-md-0">
                                <textarea name="pitch" id="pitch" class="form-control"  id="" cols="30" rows="5" data-parsley-minlength="10"><?= $objet->description ?></textarea>
                            </div>
                        </div>

                        <div class="alert alert-warning" id="err" role="alert">
                            This is a warning alert—check it out!
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 text-right">
                                <input type="submit" name="submit" id="submit" value="Modifier" class="btn btn-primary  py-2 px-5">
                                <a href="" class="btn btn-outline-warning">Annuler</a>
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#"><span class="__cf_email__" data-cfemail="671e081215020a060e0b2703080a060e094904080a">[email&#160;protected]</span></a></p>

                    </div>

                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                        <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
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
    <script src="../Public/JS/TraitEditProfil.js"></script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>