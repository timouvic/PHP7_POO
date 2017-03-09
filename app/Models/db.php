<?php
namespace app\Models;
class DB
{
    public $db='cifop_php7';
    public function __construct()
    {
        try{
                    $cnx = new \PDO("mysql:host=127.0.0.1;dbname=".$this->db,"root", "");
                    $cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e){
                    echo 'ERROR: ' . $e->getMessage();
                }

        $this->db=$cnx;
    }
}
