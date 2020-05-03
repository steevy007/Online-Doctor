<?php
namespace App\Model;
session_start();
use App\Model\Singleton;
class Authentification extends Singleton{
    private $email;
    private $password;
    public static $Message;

    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

    public function Authentifier(){
        $ins=parent::getInsDB();
        $conn=$ins->getConn();
            try{
                $req=$conn->prepare("Select * from users where email=? ");
                $req->execute([$this->email]);
                    if($req->rowCount()){
                        if(self::verifyActive()==true){
                        while($objet=$req->fetch(\PDO::FETCH_OBJ)){
                       $DBPassword=$objet->password;
                       if(password_verify($this->password,$DBPassword)){
                            $_SESSION['session']['id']=$objet->id;
                            $_SESSION['session']['email']=$objet->email;    
                            $_SESSION['session']['typeUser']=$objet->typeUser;     
                       }else{
                           self::$Message='password incorrect';
                       }
                    }
                }else{
                    self::$Message='Compte Inactive';
                }
                    }else{
                        self::$Message='Email incorrect';
                    }    
                
            }catch(\Exception $e){
                die('Error :'.$e);
            }
    }

    private function verifyActive(){
        $ins=parent::getInsDB();
        $conn=$ins->getConn();
        try{
            $req=$conn->prepare("Select * from users where email=? AND etat=? ");
            $req->execute([$this->email,'Active']);
            if($req->rowCount()==1){
                return true;
            }else{
                return false;
            }
        }catch(\Exception $e){
            die('Error :'.$e);
        }
    } 

    public static function logout(){
        session_destroy();
    }
}