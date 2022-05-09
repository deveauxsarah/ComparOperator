<?php
include "../config/bdd.php";
include '../config/autoload.php';

$toName = $_POST['TOName'];
$toLink = $_POST['TOLink'];

if ($_POST['TOPremium']=='on') {
    $toPremium=$_POST['TOPremium'];
}else{
    $toPremium = 'off';
}
var_dump($toPremium);



if(

    isset($toName) && !empty($toName) &&
    isset($toLink) && !empty($toLink) &&
    isset($toPremium) && !empty($toPremium)

){
    $newTO = array(
        "name" => $toName,
        "link" => $toLink,

        "premium" => $toPremium
    );
    
    $TO = new manager();
    $TO -> createTourOperator($newTO);

    header('Location:../admin.php');


}


