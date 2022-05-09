<?php

class Manager
{
    private $bdd;

    function __construct()
    {
        $this->db = new DataBase("comparoperator");

    }

    
    function getAllDestination()
    {
        $req=$this->db->getPDO()->prepare('SELECT * FROM destination');
        $req->execute([]);
        $AllDest=$req->fetchAll(); 
        return $AllDest;
    }

    function getDestinationNames()
    {
        $allNames=[];
        $AllDest= $this->getAllDestination();
        foreach ($AllDest as $value) {
            foreach ($value as $names => $name) {
               if ($names==='location' && !in_array($name,$allNames))
                array_push($allNames,$name);
            }
            
            
        }
        return $allNames;
    }

    function createReview()
    {

    }


    function getReviewByOperatorId()
    {

    }



    function getAllOperator()
    {

    }



    function createTourOperator($newTOInfo)
    {
        if ($newTOInfo['premium']=='on') {
            $newTOInfo['premium']=1;
        }else {
            $newTOInfo['premium']=0;
        }
        
        $value=array(
            'name' => $newTOInfo['name'],
            'link' => $newTOInfo['link'],
            'is_premium' => $newTOInfo['premium']
        );
        $newTO = new TourOperator($value);
        $newTO->AddNewTO();

    }

    function  nameUniformation($name)
    {
        $result = strtolower($name);
        return $result;
    }



    function createDestination($newDestinationInfo)
    {
        return $newDestinationInfo;
    }
    

    function getTOInfoByMethod($name,$methode){ // avoir toutes les info du TO grace au nom de la destination ou du TO suivant la methode
        switch ($methode) {
            case 'destination':
                $result = [];
                $req=$this->db->getPDO()->prepare('SELECT tour_operator_id FROM destination WHERE location = ? ' );
                $req -> execute([$name]);
                $operatorId = $req->fetchAll();
                // return $operatorId;

                foreach ($operatorId as $key => $value) {
                    $req1=$this->db->getPDO()->prepare('SELECT * FROM tour_operator WHERE id = ?' );
                    $req1 -> execute([$value[0]]);
                    $name = $req1->fetch();
                    array_push($result,$name);
                }
                return $result;
             break;

            case 'TO':
                $req=$this->db->getPDO()->prepare('SELECT * FROM tour_operator WHERE name = ? ' );
                $req -> execute([$name]);
                $result=$req->fetch();
                return $result;
            break;
            default:
                # code...
                break;
        }
    }

    function getTONamesByDest($names) //// avoir le nom du TO grace au nom de la destination
    {
        $TO=$this->getTOInfoByMethod($names,'destination');
        $result = [];
        foreach ($TO as $key => $value) {
            array_push($result,$value['name']);
        }
        return $result;
    }
    function getAllTONames() //// avoir le nom du TO grace au nom de la destination
    {
        $TOs=$this->db->getPDO()->prepare('SELECT name FROM tour_operator ');
        $TOs->execute([]);
        $result=$TOs->fetchAll();
        $endresult = [];
        foreach ($result as $key => $value) {
            array_push($endresult,$value['name']);
        }
        return $endresult;

        
    }
    function prepDataForTO($names) // passer le TO depuis la db dans la classe TO
    {
  
        $TO=$this->getTOInfoByMethod($names,'TO');
        return $TO;    
    }

   

    function updatePremium($updateP)
    {
        if ($updateP['TOPremium']=='on') {
            $updateP['TOPremium']=1;
        }else {
            $updateP['TOPremium']=0;
        }
        $TO=$this->getTOInfoByMethod($updateP['TOname'],'TO');
        $updateP = array(
            'id'=>$TO['id'],
            'name'=>$TO['name'],
            'link'=>$TO['link'],
            'grade_count'=>$TO['link'],
            'grade_total'=>$TO['grade_total'],
            'is_premium'=>$updateP['TOPremium']
        );
        $newTO = new TourOperator($updateP);
        $newTO->updatePremium();

    }

    function getOperatorIdByName($toName)
    {
        $req=$this->db->getPDO()->prepare('SELECT id FROM tour_operator WHERE name  = ?' );
        $req -> execute([$toName]);
        $result=$req->fetch();
        return $result;

    }

    function prepDataForDest($name,$TOid) // passer le TO depuis la db dans la classe TO
    {   
        
        $req=$this->db->getPDO()->prepare('SELECT * FROM destination WHERE location  = ? AND  	tour_operator_id ='.$TOid );
                $req -> execute([$name]);
                $result=$req->fetch();
        return $result;

    }



    function creatNewOffer($newOffer){
        
        if (!($this->isDestinationKnown($newOffer['destName']))) {
            $newDetail= new Destinationdetail($newOffer['destName']);
            $newDetail-> createNewDest();
        }else{

        }

        $TOinfo=$this->getTOInfoByMethod($newOffer['TOname'],'TO');
            $newarray = array(
                'location'=>$newOffer['destName'],
                'price'=>$newOffer['destPrice'],
                'tour_operator_id'=>$TOinfo['id']
            );
        
            $newDest= new Destination($newarray);
            $newDest-> createNewDest();


    }

    function isDestinationKnown($destination){
        $req=$this->db->getPDO()->prepare('SELECT location FROM destionationdetail ' );
        $req->execute();
        $fetched=$req->fetchAll();
        foreach ($fetched as $key => $value) {
            if (in_array($destination,$value)) {
                return true;
            }
        }
        return false;
        
    }

    

    function preparDataForReview($TOid){
        $req=$this->db->getPDO()->prepare('SELECT * FROM review WHERE  tour_operator_id='.$TOid );
        $req->execute();
        $fetched=$req->fetchAll();
        
        return $fetched;

    }




}
