<?php

namespace App\Model;

use App\Model\Singleton;
use App\Model\User;

class Friend extends Singleton
{
    private $id;
    private $myId;
    private $idFriend;
    private $makeRelasionship;
    private $accepted;
    private static $User = null;


    public function __construct($id, $myId, $idFriend, $makeRelasionship, $accepted)
    {
        $this->id = $id;
        $this->myId = $myId;
        $this->idFriend = $idFriend;
        $this->makeRelasionship = $makeRelasionship;
        $this->accepted = 'non';
    }


    public function sendRequest()
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("INSERT INTO friends(idFriend,myId,accepted) VALUES(?,?,?) ");
            $req->execute([$this->idFriend, $this->myId, $this->accepted]);
            if ($req) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function cancelRequest($id,$myId){
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try{
            $req=$conn->prepare("DELETE FROM friends WHERE idFriend=? AND myId=? AND accepted=?");
            $req->execute([$id,$myId,'non']);
            if($req){
                return true;
            }
        }catch(\Exception $e){
            die('Error '.$e);
        }
    }

    public static function getNumberFriend($id)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE id=?");
            $req->execute([$id]);
            if ($req->rowCount() == 1) {
                $objet = $req->fetch(\PDO::FETCH_OBJ);
                self::$User = new User($objet->id, $objet->nom, $objet->prenom, $objet->typeUser, $objet->adressePers, $objet->adresseClinic, $objet->email, $objet->specialite, $objet->telephone, $objet->password, $objet->description);
                if (self::$User != null) {
                    $req = $conn->prepare("SELECT COUNT(*) AS nomberFriend FROM friends WHERE idFriend=? And accepted=?");
                    $req->execute([$id, 'oui']);
                    $data = $req->fetch(\PDO::FETCH_ASSOC);

                    return $data['nomberFriend'];
                }
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }
    /*
    public static function getNumberFriendP($id)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE id=?");
            $req->execute([$id]);
            if ($req->rowCount() == 1) {
                $objet = $req->fetch(\PDO::FETCH_OBJ);
                self::$User = new User($objet->id, $objet->nom, $objet->prenom, $objet->typeUser, $objet->adressePers, $objet->adresseClinic, $objet->email, $objet->specialite, $objet->telephone, $objet->password, $objet->description);
                if (self::$User != null) {
                    $req = $conn->prepare("SELECT COUNT(*) AS nomberFriend FROM friends WHERE myId=?");
                    $req->execute([$id]);
                    $data = $req->fetch(\PDO::FETCH_ASSOC);

                    return $data['nomberFriend'];
                }
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }*/

    public static function verifyRequest($myid, $idUser)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM friends WHERE idFriend=? AND myId=? AND accepted=?");
            $req->execute([ $idUser,$myid, 'non']);
            if ($req->rowCount() == 1) {
                return true;
            }
        } catch (\Exception $e) {
        }
    }

    public static function getRequest($myid)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT COUNT(myId) AS nomberFriend FROM friends Where idFriend=?  AND accepted=?");
            $req->execute([$myid, 'non']);
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($req) {
                return $data['nomberFriend'];
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function addFriend($id, $myId)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            if (self::verifyIfFriend($id, $myId)) {
                $req = $conn->prepare("UPDATE friends set accepted=? WHERE idFriend=? AND myId=?");
                $req->execute(['oui', $id, $myId]);
                if ($req) {
                    $req = $conn->prepare("INSERT INTO friends(idFriend,myId,accepted) VALUES(?,?,?)");
                    $req->execute([ $myId, $id,'oui']);
                    return true;
                }
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function verifyIfFriend($id, $myid)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT * From friends  WHERE idFriend=? AND myId=? AND accepted=?");
            $req->execute([$myid, $id, 'oui']);
            if ($req->rowCount() == 1) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
        }
    }

    
    public static function verifyIfFriendAccepted($id, $myid)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT count(*) as number From friends  WHERE idFriend=? AND myId=? AND accepted=?");
            $req->execute([$myid,$id ,'non']);
            $data=$req->fetch(\PDO::FETCH_ASSOC);
            if ($data['number'] == 1) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
        }
    }



    public static function getAllRequestFriend($id)
    {
        $inDB = Singleton::getInsDB();
        $conn = $inDB->getConn();
        try {
            $req = $conn->prepare("SELECT * from users INNER JOIN friends on users.id=friends.myId where friends.idFriend=? AND friends.accepted=?");
            $req->execute([$id, 'non']);
            if ($req) {
                return $req;
            }
        } catch (\Exception $e) {
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
