<?php

namespace App\Model;

use App\Model\Singleton;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $personnalAdress;
    private $clinicalAdress;
    private $email;
    private $speciality;
    private $phoneNumber;
    private $password;
    private $description;
    private $verify;
    private $typeUser;


    public function __construct($id, $firstName, $lastName, $typeUser, $personnalAdress, $clinicalAdress, $email, $speciality, $phoneNumber, $password, $description)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->typeUser = $typeUser;
        $this->phoneNumber = $phoneNumber;
        $this->personnalAdress = $personnalAdress;
        $this->clinicalAdress = $clinicalAdress;
        $this->email = $email;
        $this->speciality = $speciality;
        $this->password = $password;
        $this->description = $description;
        $this->verify = 'active';
    }

    public static function addUser($email)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("
                INSERT INTO users(nom,prenom,adressePers,adresseClinic,email,specialite,telephone,password,description,typeUser,Created_at)
                SELECT nom,prenom,adressePers,adresseClinic,email,specialite,telephone,password,description,typeUser,Created_at  FROM inscriptions
                WHERE email=?              
            ");
            $req->execute([$email]);
            $req = $conn->prepare("UPDATE inscriptions set verifier=?");
            $req->execute(['oui']);
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public function editUser($id)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("UPDATE users SET nom=?,prenom=?,adressePers=?,adresseClinic=?,specialite=?,telephone=?,description=? WHERE id=?");
            $req->execute([$this->firstName, $this->lastName, $this->personnalAdress, $this->clinicalAdress, $this->speciality, $this->phoneNumber, $this->description, $id]);
            if ($req) {
                return true;
            }
        } catch (\Exception $e) {
            die('Error :' . $e);
        }
    }

    public static function editPassword($id, $password)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("UPDATE users SET password=? WHERE id=?");
            $req->execute([$password, $id]);
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function verifyPassword($id, $password)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT password FROM users WHERE id=?");
            $req->execute([$id]);
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($req->rowCount() == 1) {
                $passwBase = $data['password'];
                if (password_verify($password, $passwBase)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (\Exception $e) {
            die('Error :' . $e);
        }
    }

    public static function verifyNumber($number)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE telephone=?");
            $req->execute(['+509' . $number]);
            if ($req->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die('Error :' . $e);
        }
    }


    public static function verifyEmail($email)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE email=?");
            $req->execute([$email]);
            if ($req->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die('Error :' . $e);
        }
    }

    public static function getUser($id)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE id=?");
            $req->execute([$id]);
            if ($req->rowCount() == 1) {
                return $req->fetch(\PDO::FETCH_OBJ);
                //echo print_r( $req->fetch(\PDO::FETCH_OBJ));
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function getAllUser()
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE etat=?");
            $req->execute(['Active']);
            if ($req) {
                return $req;
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function Search($query)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM users WHERE nom=? OR prenom=? OR specialite=?");
            $req->execute([$query,$query,$query]);
            if($req){
                return $req;
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function getAvatar($email)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode("https://www.pngitem.com/pimgs/m/78-786314_computer-user-icon-peolpe-avatar-group-people-avatar.png") . "&s=" . 40;
    }


    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * Get the value of personnalAdress
     */
    public function getPersonnalAdress()
    {
        return $this->personnalAdress;
    }

    /**
     * Set the value of personnalAdress
     *
     * @return  self
     */
    public function setPersonnalAdress($personnalAdress)
    {
        $this->personnalAdress = $personnalAdress;

        return $this;
    }

    /**
     * Get the value of clinicalAdress
     */
    public function getClinicalAdress()
    {
        return $this->clinicalAdress;
    }

    /**
     * Set the value of clinicalAdress
     *
     * @return  self
     */
    public function setClinicalAdress($clinicalAdress)
    {
        $this->clinicalAdress = $clinicalAdress;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of speciality
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Set the value of speciality
     *
     * @return  self
     */
    public function setSpeciality($speciality)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Get the value of verify
     */
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * Set the value of verify
     *
     * @return  self
     */
    public function setVerify($verify)
    {
        $this->verify = $verify;

        return $this;
    }

    /**
     * Get the value of typeUser
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * Set the value of typeUser
     *
     * @return  self
     */
    public function setTypeUser($typeUser)
    {
        $this->typeUser = $typeUser;

        return $this;
    }
}
