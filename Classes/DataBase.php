<?php

class DataBase
{
    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;
    private $db;

    public function __construct($db_name, $db_user = "root", $db_password = "", $db_host = "localhost")
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        if ($this->db === null) {
            require(__DIR__ . '/../config/bdd.php');
            $this->db = $db;
        }
        return $this->db;
    }

    public function query($statement)
    {
        $request = $this->getPDO()->query($statement);
        $datas = $request->fetchAll();
        return $datas;
    }

    public function prepare($statement, $values, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($values);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }
}
