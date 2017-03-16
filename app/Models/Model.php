<?php
namespace app\Models;

use app\Models\DB;

class Model extends DB
{
    public $table;


    static function load($name){
        require $name.".php";
        return new $name();
    }

    public function list(){
        try{
            $res=$this->db->query("select * from ".$this->table);
            return $res;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    /**
     * @param $id
     * @return objet charger de la base de données
     */

    public function find($id){
        try{
            $sql="select * from ".$this->table." where id=:id";
            $res=$this->db->prepare($sql);
            $res->execute(array('id'=>$id));
            $data=$res->fetch(\PDO::FETCH_ASSOC);
            foreach ($data as $i=>$v){
                $this->$i=$v;
            }
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }
    

    public function save($data){
        $sql="insert into ".$this->table."(";
            foreach ($data as $i=>$v){
                $sql.="$i,";
            }
        $sql=substr($sql,0,-1);
        $sql.=") values (";
        foreach ($data as $i=>$v){
            $sql.=":$i,";
        }
        $sql=substr($sql,0,-1);
        $sql.=")";
        try{
        $res=$this->db->prepare($sql);
        $res->execute($data);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    public function edit($data){
        $sql="update ".$this->table." set ";
        foreach($data as $i=>$v){
            $sql.="$i=:$i,";
        }
        $sql=substr($sql,0,-1);
        $sql.=" where id=".$this->id;

        try{
            $res=$this->db->prepare($sql);
            $res->execute($data);
            header('location:ajout_article.php');
        }catch (\PDOException $e){
            echo $e->getMessage().'<br/>'.$sql;
        }

    }

    public function delete($id)
    {
        $sql="delete from ".$this->table." where id=:id";
        try{
            $res=$this->db->prepare($sql);
            $res->execute(array('id'=>$id));
            header('location:ajout_article.php');
        }catch (\PDOException $e){
            echo $e->getMessage().'<br/>'.$sql;
        }

    }

}