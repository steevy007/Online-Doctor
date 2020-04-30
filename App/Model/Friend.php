<?php
namespace App\Model;
use App\Model\Singleton;
use App\Model\User;
class Friend extends Singleton{
    private $id;
    private $myId;
    private $idFriend;
    private $makeRelasionship;
    private $accepted;
    private static $User=null;
    public static function getNumberFriend($id){
        $inDB=Singleton::getInsDB();
        $conn=$inDB->getConn();
        try{
            $req=$conn->prepare("SELECT * FROM users WHERE id=?");
            $req->execute([$id]);
            if($req->rowCount()==1){
                $objet=$req->fetch(\PDO::FETCH_OBJ);
               self::$User=new User($objet->id,$objet->nom,$objet->prenom,$objet->typeUser,$objet->adressePers,$objet->adresseClinic,$objet->email,$objet->specialite,$objet->telephone,$objet->password,$objet->description);
                if(self::$User!=null){
                    $req=$conn->prepare("SELECT COUNT(myId) AS nomberFriend FROM friends WHERE accepted=?");
                    $req->execute(['oui']);
                    $data=$req->fetch(\PDO::FETCH_ASSOC);
                    
                    return $data['nomberFriend'];
                }
            }
        }catch(\Exception $e){
            die('Error '.$e);
        }
    }

    public static function getRequest($myid){
        $inDB=Singleton::getInsDB();
        $conn=$inDB->getConn();
        try{
            $req=$conn->prepare("SELECT COUNT(myId) AS nomberFriend FROM friends WHERE accepted=?");
            $req->execute(['non']);
            $data=$req->fetch(\PDO::FETCH_ASSOC);
            if($req){
                return $data['nomberFriend'];
            }
        }catch(\Exception $e){
            die('Error '.$e);
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idFriend
     */ 
    public function getIdFriend()
    {
        return $this->idFriend;
    }

    /**
     * Set the value of idFriend
     *
     * @return  self
     */ 
    public function setIdFriend($idFriend)
    {
        $this->idFriend = $idFriend;

        return $this;
    }

    /**
     * Get the value of makeRelasionship
     */ 
    public function getMakeRelasionship()
    {
        return $this->makeRelasionship;
    }

    /**
     * Set the value of makeRelasionship
     *
     * @return  self
     */ 
    public function setMakeRelasionship($makeRelasionship)
    {
        $this->makeRelasionship = $makeRelasionship;

        return $this;
    }
}