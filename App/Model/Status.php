<?php

namespace App\Model;

use App\Model\Singleton;

class Status
{
    private $id;
    private $id_user;
    private $text_post;
    private $nb_like;

    public function __construct($id, $id_user, $text_post)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->text_post = $text_post;
    }

    public function postStatus()
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("INSERT INTO posts(id_user,text_post) VALUES(?,?)");
            $req->execute([$this->id_user, $this->text_post]);
            if ($req) {
                return true;
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function getMyStatus($id_user)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT * FROM posts WHERE id_user=? ORDER BY id DESC");
            $req->execute([$id_user]);
            if ($req) {
                return $req;
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function getNbLike($id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT count($id_post) as nb_like FROM like_status WHERE id_post=?");
            $req->execute([$id_post]);
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($req) {
                return $data['nb_like'];
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    
    public static function getDisLike($id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT count($id_post) as nb_dislike FROM dislike WHERE id_post=?");
            $req->execute([$id_post]);
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            if ($req) {
                return $data['nb_dislike'];
            }
        } catch (\Exception $e) {
            die('Error ' . $e);
        }
    }

    public static function Like($id, $id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            if (!self::verifyLike($id, $id_post)) {
                if (!self::verifyDisLike($id, $id_post)) {
                    $req = $conn->prepare("INSERT INTO like_status(id_post,id_user) VALUES(?,?)");
                    $req->execute([$id_post, $id]);
                }else{
                    try{
                        $req=$conn->prepare("DELETE FROM dislike WHERE id_post=?");
                        $req->execute([$id_post]);
                        if($req){
                            self::Like($id,$id_post);
                        }
                    }catch(\Exception $e){

                    }
                }
            }else{
                try{
                    $req=$conn->prepare("DELETE FROM like_status WHERE id_post=?");
                    $req->execute([$id_post]);
                }catch(\Exception $e){

                }
            }
        } catch (\Exception $e) {
        }
    }


    public static function Disike($id, $id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            if (!self::verifyDisLike($id, $id_post)) {
                if (!self::verifyLike($id, $id_post)) {
                    $req = $conn->prepare("INSERT INTO dislike(id_post,id_user) VALUES(?,?)");
                    $req->execute([$id_post, $id]);
                }else{
                    try{
                        $req=$conn->prepare("DELETE FROM like_status WHERE id_post=?");
                        $req->execute([$id_post]);
                        if($req){
                            self::Disike($id,$id_post);
                        }
                    }catch(\Exception $e){

                    }
                }
            }else{
                try{
                    $req=$conn->prepare("DELETE FROM dislike WHERE id_post=?");
                    $req->execute([$id_post]);
                }catch(\Exception $e){

                }
            }
        } catch (\Exception $e) {
        }
    }

    public static function verifyLike($id, $id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT count(id_user) as isLike FROM like_status WHERE id_user=? AND id_post=?");
            $req->execute([$id, $id_post]);
            $isLike = $req->fetch(\PDO::FETCH_ASSOC);
            if ($isLike['isLike'] == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
        }
    }

    public static function verifyDisLike($id, $id_post)
    {
        $insDB = Singleton::getInsDB();
        $conn = $insDB->getConn();
        try {
            $req = $conn->prepare("SELECT count(id_user) as isDisLike FROM dislike WHERE id_user=? AND id_post=?");
            $req->execute([$id, $id_post]);
            $isLike = $req->fetch(\PDO::FETCH_ASSOC);
            if ($isLike['isDisLike'] == 1) {
                return true;
            } else {
                return false;
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
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of text_post
     */
    public function getText_post()
    {
        return $this->text_post;
    }

    /**
     * Set the value of text_post
     *
     * @return  self
     */
    public function setText_post($text_post)
    {
        $this->text_post = $text_post;

        return $this;
    }

    /**
     * Get the value of nb_like
     */
    public function getNb_like()
    {
        return $this->nb_like;
    }

    /**
     * Set the value of nb_like
     *
     * @return  self
     */
    public function setNb_like($nb_like)
    {
        $this->nb_like = $nb_like;

        return $this;
    }

    /**
     * Get the value of nb_dislike
     */
    public function getNb_dislike()
    {
        return $this->nb_dislike;
    }

    /**
     * Set the value of nb_dislike
     *
     * @return  self
     */
    public function setNb_dislike($nb_dislike)
    {
        $this->nb_dislike = $nb_dislike;

        return $this;
    }

    /**
     * Get the value of post_at
     */
    public function getPost_at()
    {
        return $this->post_at;
    }

    /**
     * Set the value of post_at
     *
     * @return  self
     */
    public function setPost_at($post_at)
    {
        $this->post_at = $post_at;

        return $this;
    }
}
