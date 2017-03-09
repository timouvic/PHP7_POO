<?php
namespace app\Models;
class User extends Model
{
    var $table="user";
    protected $mail;
    protected $login;
    protected $pwd;


    /**
     * convert object to string
     */
    public function __toString()
    {
        return $this->mail.' '.$this->login;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    public function connect($motcle,$pwd){
        $sql="select id from user where (mail=:mail or login=:login) and pwd=:pwd";
        try{
            $res=$this->db->prepare($sql);
            $res->execute(array(
                'mail'=>$motcle,
                'login'=>$motcle,
                'pwd'=>$pwd,
            ));
            $obj=$res->fetch();
            $_SESSION['user']=$obj['id'];
            header('location:profile.php');
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }


}