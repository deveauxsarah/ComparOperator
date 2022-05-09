<?php
include "../config/bdd.php";
include '../config/autoload.php';

$TOname = $_POST['TOname'];
$destPrice = $_POST['destPrice'];

if (!empty($_POST['DestName'])&& $_POST['DestName'] != ' ' ) {
    $destName=$_POST['DestName'];
}else{
    $destName=$_POST['selectDest'];
}

if(

    isset($TOname) && !empty($TOname) &&
    isset($destPrice) && !empty($destPrice) &&
    isset($destName) && !empty($destName)

){

$newOffer =array(
    'TOname'=>$TOname,
    'destPrice'=>$destPrice,
    'destName'=>$destName
);

$offer = new Manager();
$offer-> creatNewOffer($newOffer);


header('Location:../admin.php');

}else{
    header('Location:../admin.php?ID=NoOffer');
}