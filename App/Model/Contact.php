<?php
namespace App\Model;
use App\Model\Singleton;

class Contact extends Singleton{
    protected $Full_name;
    protected $Email;
    protected $Subject;
    protected $Message;

    public function __construct($Full_name,$Email,$Subject,$Message)
    {
        $this->Full_name=$Full_name;
        $this->Email=$Email;
        $this->Subject=$Subject;
        $this->Message=$Message;
    }

    

    /**
     * Get the value of Full_name
     */ 
    public function getFull_name()
    {
        return $this->Full_name;
    }

    /**
     * Set the value of Full_name
     *
     * @return  self
     */ 
    public function setFull_name($Full_name)
    {
        $this->Full_name = $Full_name;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Subject
     */ 
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * Set the value of Subject
     *
     * @return  self
     */ 
    public function setSubject($Subject)
    {
        $this->Subject = $Subject;

        return $this;
    }

    /**
     * Get the value of Message
     */ 
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * Set the value of Message
     *
     * @return  self
     */ 
    public function setMessage($Message)
    {
        $this->Message = $Message;

        return $this;
    }

    /**
     * Fonction Permettant de faire contact
     */
    public function faireContact(){
        $ins=Parent::getInsDB();
        $BDD=$ins->getConn();
        try{
            $req=$BDD->prepare("INSERT INTO contacts(name,email,subject,message,send_at) VALUES(?,?,?,?,NOW())");
            $req->execute([$this->Full_name,$this->Email,$this->Subject,$this->Message]);
        }catch(\Exception $e){
            die('Error '.$e);
        }
    }

}