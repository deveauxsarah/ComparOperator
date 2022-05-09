<?php 

include "../config/bdd.php";
include '../config/autoload.php';

$message=  $_POST['message'];
$author=$_POST['author'];
$score=$_POST['score'];
$newManager= new Manager();
$toId=$newManager -> getOperatorIdByName($_POST['TO']);
$tourOperatorId=$toId['id'];
var_dump($_POST);
$data=array(
    'message' => $message,
    'author' => $author,
    'tour_operator_id' => $tourOperatorId
);

$to = $newManager->prepDataForTO($_POST['TO']);

$newTourOperator = new TourOperator($to);
$newTourOperator-> updateReview($to["grade_count"],$to["grade_total"],$score,$to['id']);

$newReview = new Review($data);
$newReview -> addReview();