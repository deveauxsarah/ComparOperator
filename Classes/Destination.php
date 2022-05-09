<?php

use LDAP\Result;

class Destination
{
    private $id;
    private $location;
    private $price;
    private $tourOperatorId;
    

    function __construct($data)
    {
        $this->db = new DataBase("comparoperator");
        $this->hydrate($data);

    }
    function hydrate($data) {

           $this->id = $data['id'] ?? null;
           $this->location = $data['location'] ;
           $this->price = $data['price'] ;
           $this->tourOperatorId = $data['tour_operator_id'] ;

    }
    // public function toSql() {
    //     return array(
    //         'id' => $this->id,
    //         'location' => $this->location,
    //         'price' => $this->price,
    //         'tour_operator_id' => $this->tourOperatorId
            
    //     );
    // }

    function getId()
    {
        return $this->id;
    }


    function getLocation()
    {
        return $this->location;
    }


    function getPrice()
    {
        return $this->price;

    }


    function getTourOperatorId()
    {
        return $this->tourOperatorId;

    }

    function createNewDest()
    {
        $req = $this->db->getPDO()->prepare('INSERT INTO destination (location,price,tour_operator_id) VALUE (?,?,?)');
        $req->execute([
            $this->location,
            $this ->price,
            $this->tourOperatorId
        ]);
    }
    




    
    
};

