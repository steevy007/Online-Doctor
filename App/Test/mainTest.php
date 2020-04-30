<?php
require_once('../init.php');
use App\Model\Singleton;
use Faker\Factory;
$inDB=Singleton::getInsDB();
$conn=$inDB->getConn();
$facker=Factory::create();
$req='';

for($i=0;$i<100;$i++){
    $req=$conn->prepare("INSERT INTO users(nom,prenom,adressePers,email,telephone,password,description,typeUser,Etat)
                        VALUES(?,?,?,?,?,?,?,?,?)");
    $req->execute([
        $facker->firstName($gender = null|'male'|'female'),
        $facker->lastName,
        $facker->address,
        //$facker->address,
        $facker->email,
        //$facker->randomElement($array = array ('Urologue','Pediatre','Generaliste','Anestesiste','Dentiste')),
        '+50912345678',
        password_hash('12345678',PASSWORD_BCRYPT),
        $facker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'Client',
        'Active'
    ]);
}
if($req){
    echo 'insertion reussi';
}
