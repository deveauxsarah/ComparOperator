<?php

Class Review
{
    private $id;
    private $message;
    private $author;
    private $tourOperatorId;
 

    function __construct($data)
    {
        $this->hydrate($data);
        $this->db = new DataBase("comparoperator");

    }

    function hydrate($data){

        $this->id = $data['id'] ?? null;
        $this->message = $data['message'];
        $this->author = $data['author'];
        $this->tourOperatorId = $data['tour_operator_id'];

    }

    function getId()
    {
        return $this->id;
    }
    
    function getMessage()
    {
        return $this->message;

    }
    
    function getAuthor()
    {
        return $this->author;

    }
    
    function getTourOperatorId()
    {
        return $this->tourOperatorId;

    }
    function addReview()
    {
        $req = $this->db->getPDO()->prepare('INSERT INTO review (message ,author,tour_operator_id) VALUE (?,?,?)');
        $req->execute([
            $this->message ,
            $this ->author,
            $this->tourOperatorId
        ]);
    }

 

    
}
