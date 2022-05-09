<?php

use LDAP\Result;

class Destinationdetail{

    private $location;
    

    function __construct($data)
    {
        $this->db = new DataBase("comparoperator");
        $this->location = $data;
    }

    function getImage(){
        $img=$this->db->getPDO()->prepare('SELECT img FROM destionationdetail WHERE location = ? ');
        $img->execute([$this->location]);
        $result=$img->fetch();
        return $result;
    }

    function getTitle(){
        $title=$this->db->getPDO()->prepare('SELECT title FROM destionationdetail WHERE location = ? ');
        $title->execute([$this->location]);
        $result=$title->fetch();
        return $result;


    }

    function getDescription(){
        $title=$this->db->getPDO()->prepare('SELECT description FROM destionationdetail WHERE location = ? ');
        $title->execute([$this->location]);
        $result=$title->fetch();
        return $result;
    }

    function getAll(){
        $title=$this->db->getPDO()->prepare('SELECT * FROM destionationdetail WHERE location = ? ');
        $title->execute([$this->location]);
        $result=$title->fetch();
        return $result;
    }

    function createNewDest(){
          $req = $this->db->getPDO()->prepare('INSERT INTO destionationdetail  (location) VALUE (?)');
        $req->execute([ $this->location]);
    }


}