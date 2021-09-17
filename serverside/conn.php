<?php

Class dbh{
    private $host = "localhost";
    private $dbname = "kutuphane";
    private $user = "root";
    private $pass = "";
    private $db;

    public function __construct()
    {
        try{

            $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->pass);
            $this->db->query("SET NAMES UTF8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex){
            echo "Bir hata ile karşılaşıldı:<br>".$ex->getMessage();
        }
    }
    public function getRows($query,$param = []){
        if(!empty($param)){
            $stmt = $this->db->prepare($query);
            $stmt->execute($param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

?>